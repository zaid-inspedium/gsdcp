<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LitterInspection;
use Auth;
use App\Traits\UserActivityLog;
use App\Dog;
use App\User;
use App\Cities;
use App\StudCertificate;
use App\DogOwner;
use App\Kennel;
use App\ProjectSetting;

class LitterInspectionController extends Controller
{
    use UserActivityLog;
    public $module_name = "litter_inspection";

    function __construct()
    {
         $this->middleware('permission:litter_inspection-list', ['only' => ['index']]);
         $this->middleware('permission:litter_inspection-create', ['only' => ['create','store']]);
         $this->middleware('permission:litter_inspection-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:litter_inspection-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $check_users = ProjectSetting::where('option_name','=','show_all_records')->first();
        $allowed_users = explode (",", $check_users->option_value);  

        //making status expired of pending litters whose dates passed or reached.
        $curr_date = date('Y-m-d');
        $litter = LitterInspection::where('status','=','1')->get();
        foreach($litter as $inspect){
            if($inspect->valid_till <= $curr_date){
                $lit = LitterInspection::find($inspect->id);
				$lit->status = '3';
				$lit->save();
            }
        }
        $this->saveActivity('Litter Inspection List',$this->module_name);

        if(in_array($user->user_type_id, $allowed_users)){
            //if user role is one of the allowed user role set by admin
            $litter_inspect = LitterInspection::orderBy('id', 'DESC')->paginate('50');
            return view('litter_inspect.index',compact('litter_inspect'));

        }else{
            //show record of logged user only
            $litter_inspect = LitterInspection::where('created_by','=',$user->id)
                                                ->orderBy('id', 'DESC')
                                                ->paginate('50');

            return view('litter_inspect.index',compact('litter_inspect'));

        }
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function breeder_info(Request $request){
        $select = $request->get('select');
		$value = $request->get('value');
        $dependent = $request->get('dependent');
        
        $kennel_count = Kennel::select('kennel_name','prefix','suffix')
                      ->where('owner_id','=',$value)
                      ->count();
        if($kennel_count == 0){
            $kennel = "";
        }else{

            $kennel = Kennel::select('kennel_name','prefix','suffix')
                      ->where('owner_id','=',$value)
                      ->first();
            $kennel = $kennel->kennel_name;
        }

        $user_city = User::select('id','city')
                        ->where('id','=',$value)
                        ->first();

        $output = '
        <div class="col-sm-4" style="width:750px;">
        <label for="">City</label>
        <select class="form-control select2 selectpicker" data-live-search="true" id="city_id" name="city_id">
            <option value="'.$user_city->city.'" >'.$user_city->user_city->city.'</option>
        </select>
        </div>
        <div class="col-sm-4" style="margin-left:250px; margin-top:-70px;">
        <label for="">Kennel</label>
        <input type="text" value="'.$kennel.'" class="form-control" id="kennel_id" name="kennel_id" readonly/>
        </div>';
        
        echo $output;

    }

    public function breeder_dam(Request $request){

        $select = $request->get('select');
		$value = $request->get('value');
        $dependent = $request->get('dependent');
        
        $dogowners = DogOwner::select('dog_id')
                                        ->where('owner_id','=',$value)
                                        ->get();

        $dam = Dog::select('id','dog_name')
            ->whereIn('id',$dogowners)
            ->where('status','=','Active')
            ->Orderby('dog_name','ASC')
            ->get();
        
            
        $output = '<option value="">Select Dam</option>';
		foreach ($dam as $dog) {
			$output .= '<option value="'.$dog->id.'">'.$dog->dog_name.'</option>';
		}
		echo $output;

    }

    public function checkcertificate(Request $request){
        $select = $request->get('select');
		$value = $request->get('value');
        $dependent = $request->get('dependent');
        $stud= $request->get('stud');

        $certificate_count = StudCertificate::where('sire','=',$stud)
                        ->where('dam','=',$value)
                        ->count();
        if($certificate_count == 0){
            
            $output = '<h5 style="color:red;">No Stud Certificate Found</h5>';
            $output .= '<script type="text/javascript">
                          document.getElementById("btnsubmit").disabled = true 
                        </script>';

        }else{

            $certificate_count = StudCertificate::select('mating_date')
                        ->where('sire','=',$stud)
                        ->where('dam','=',$value)
                        ->latest('id')
                        ->first();

            $output = '<input type="date" class="form-control" value="'.$certificate_count->mating_date.'" id="mating_date" name="mating_date" readonly/>';
            $output .= '<script type="text/javascript">
                            document.getElementById("btnsubmit").disabled = false 
                        </script>';

        }
        echo $output;
    }


    public function create()
    {
        $user = Auth::user();
        $check_users = ProjectSetting::where('option_name','=','show_all_dogs')->first();
        $allowed_users = explode (",", $check_users->option_value);  

        if(in_array($user->user_type_id, $allowed_users)){
        //if user role is one of the allowed user role set by admin

                $breeders = User::select('id','first_name','last_name','membership_no')
                ->where('status','=','Active')
                ->Orderby('first_name','ASC')
                ->get();
            
                $dam = Dog::select('id','dog_name')
                    ->where('status','=','Active')
                    ->where('sex','=','Female')
                    ->Orderby('dog_name','ASC')
                    ->get();

                $kennel = "";
                $user = Auth::user();
               
        }else{
             //if logged in user is member

                $breeders = User::select('id','first_name','last_name','city','membership_no')
                    ->where('status','=','Active')
                    ->where('id','=',$user->id)
                    ->Orderby('first_name','ASC')
                    ->first();

                $dogowners = DogOwner::select('dog_id')
                                        ->where('owner_id','=',$breeders->id)
                                        ->get();
                
                $dam = Dog::select('id','dog_name')
                    ->whereIn('id',$dogowners)
                    ->where('status','=','Active')
                    ->Orderby('dog_name','ASC')
                    ->get();

                $kennel = Kennel::select('kennel_name','prefix','suffix')
                    ->where('owner_id','=',$breeders->id)
                    ->first();
                
                $user = $breeders;
           
        }

                $sire = Dog::select('id','dog_name')
                            ->where('status','=','Active')
                            ->where('sex','=','Male')
                            ->Orderby('dog_name','ASC')
                            ->get();


                $cities = Cities::where('status','=','Active')
                            ->Orderby('city','ASC')
                            ->get();
                
        return view('litter_inspect.create',compact('dam','sire','breeders','cities','kennel','user','allowed_users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'sire_id' => 'required',
            'dam_id' => 'required',
            'breeder_id' => 'required',
            'city_id' => 'required',
            'address' => 'required',
            'mating_date' => 'required',
            'whelping_date' => 'required',
            'puppies_born' => 'required'
        ]);
        $check_option = ProjectSetting::where('option_name','=','litter_inspection_request_time')->first();
        $start  = date_create(); // Current time and date
        $end 	= date_create($request->whelping_date); 
        $diff  	= date_diff($start, $end);
        $allowed_time = $check_option->option_value; 
        $whelping_date_diff = $diff->d;

        if($whelping_date_diff > $allowed_time){
            return redirect()
                    ->route('LitterInspections.create')
                    ->with('danger','Failed to Save! This request is overdue.Please contact your Group Breed Warden');

        }else{
                $certificate_count = StudCertificate::where('sire','=',$request->sire_id)
                        ->where('dam','=',$request->dam_id)
                        ->count();
                if($certificate_count == 0){
                    return redirect()
                            ->route('LitterInspections.create')
                            ->with('danger','Failed to Save! Stud Certificate Not Found of Sire and Dam As A Pair');
                }else{
                    LitterInspection::create($request->all());
                    $this->saveActivity('Litter Inspection Request',$this->module_name,"Create new record");

                    return redirect()->route('LitterInspections.index')
                                    ->with('success','Record created successfully.');
                }

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
                    
        

        $dam = Dog::select('id','dog_name')
                    ->where('status','=','Active')
                    ->where('sex','=','Female')
                    ->Orderby('dog_name','ASC')
                    ->get();

        

        $user = Auth::user();
        $litter_inspect = LitterInspection::where('id',$id)->first();
        return view('litter_inspect.edit',compact('litter_inspect','user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'sire_id' => 'required',
            'dam_id' => 'required',
            'breeder_id' => 'required',
            'city_id' => 'required',
            'address' => 'required',
            'status' => 'required'
        ]);

        $images_name = array();
        $images = request()->images;
        foreach($images as $img){

            $fileName = time().'.'.$img->getClientOriginalName();
            $img->move(public_path('litter_images'), $fileName);
            $images_name[] = $fileName;
        }
        $image_List = implode(',', $images_name); 

        $inspect = LitterInspection::find($id);
        $inspect->puppies_born = $request->input('puppies_born');
        $inspect->male_puppies = $request->input('male_puppies');
        $inspect->female_puppies = $request->input('female_puppies');
        $inspect->expired_puppies = $request->input('expired_puppies');
        $inspect->dam_condition = $request->input('dam_condition');
        $inspect->puppy_condition = $request->input('puppy_condition');
        $inspect->uniformity_size = $request->input('uniformity_size');
        $inspect->special_recommendation = $request->input('special_recommendation');
        $inspect->special_feature = $request->input('special_feature');
        $inspect->images = $image_List;
        $inspect->status = $request->input('status');
        $inspect->remarks = $request->input('remarks');
        $inspect->updated_by = $request->input('updated_by');
        $inspect->save();

        $this->saveActivity('Update Litter Inspection Request',$this->module_name,"Remarks:  ".$request->input('special_recommendation')." ");
        return redirect()->route('LitterInspections.index')
            ->with('success','Record updated successfully');
    }

    // sahahmir work
    public function second()
    {
        // $inspection = DB::select(DB::raw("SELECT * FROM litter_inspect
        //     LEFT JOIN users ON users.id = litter_inspect.user_id
        //     LEFT JOIN cities ON cities.id = litter_inspect.city
        //     LEFT JOIN kennels ON kennels.owner_id = litter_inspect.user_id
        //     WHERE litter_inspect.id = '".$id."' "));
        $dogs = Dog::get();
            return view('litter_inspect/second_create');
    }
    //2:35

    public function check(request $request){
        $curr_date = date("Y-m-d");
        if($curr_date == $request->check_date){
            $user = Auth::user();
            if($user->user_type_id == '1'){
                $cities = Cities::where('id','=',$user->city)
                                 ->get();
                $kennel = Kennel::select('kennel_name','prefix','suffix')
                                ->where('owner_id','=',$user->id)
                                ->get();
                $dam = Dog::select('dogs.id','dog_name')
                                ->where('status','=','Active')
                                ->where('dog_owners.owner_id',$user->id)
                                ->leftjoin('dog_owners','dog_owners.dog_id','=','dogs.id')
                                ->where('sex','=','Female')
                                ->Orderby('dog_name','ASC')
                                ->get();
                    if(count($dam) == 0){
                    $dam1 = Dog::select('id','dog_name')
                                ->where('status','=','Active')
                                ->where('sex','=','Female')
                                ->Orderby('dog_name','ASC')
                                ->get();
                    }
                    else{
                        $dam1 = array();
                    }
                $sire = Dog::select('dogs.id','dog_name')
                            ->where('status','=','Active')
                            ->where('dog_owners.owner_id',$user->id)
                            ->leftjoin('dog_owners','dog_owners.dog_id','=','dogs.id')
                            ->where('sex','=','Male')
                            ->Orderby('dog_name','ASC')
                            ->get();
                if(count($sire) == 0){
                    $sire1 = Dog::select('id','dog_name')
                                    ->where('status','=','Active')
                                    ->where('sex','=','Male')
                                    ->Orderby('dog_name','ASC')
                                    ->get();
                }else{
                    $sire1 = array();
                }
                $breeders = array();
                            return view('litter_inspect/first_create', compact('dam','dam1','sire1','sire','user','breeders','cities','kennel'));
                }else{
                    $sire = Dog::select('id','dog_name')
                                    ->where('status','=','Active')
                                    ->where('sex','=','Male')
                                    ->Orderby('dog_name','ASC')
                                    ->get();
                                    $dam = Dog::select('id','dog_name')
                                    ->where('status','=','Active')
                                    ->where('sex','=','Female')
                                    ->Orderby('dog_name','ASC')
                                    ->get();
                                    $cities = Cities::get();
                                    $breeders = User::get();
                            return view('litter_inspect/first_create', compact('dam','sire','breeders','cities'));
                }
        }
        elseif($curr_date > $request->check_date){
            $curr_date2 = date_create(date('Y-m-d', strtotime($curr_date. ' + 1 day')));
            $checkdate = date_create($request->check_date);
            $diff=date_diff($checkdate,$curr_date2);
       if($diff->days == 2 || $diff->days < 2){
            if($user->user_type_id == '1'){
            $cities = Cities::where('id','=',$user->city)
                            ->get();
            $kennel = Kennel::select('kennel_name','prefix','suffix')
                   ->where('owner_id','=',$user->id)
                   ->get();
            $dam = Dog::select('dogs.id','dog_name')
                    ->where('status','=','Active')
                    ->where('dog_owners.owner_id',$user->id)
                    ->leftjoin('dog_owners','dog_owners.dog_id','=','dogs.id')
                    ->where('sex','=','Female')
                    ->Orderby('dog_name','ASC')
                    ->get();
                if(count($dam) == 0){
                $dam1 = Dog::select('id','dog_name')
                                ->where('status','=','Active')
                                ->where('sex','=','Female')
                                ->Orderby('dog_name','ASC')
                                ->get();
            }else{
                $dam1 = array();
            }
                $sire = Dog::select('dogs.id','dog_name')
                            ->where('status','=','Active')
                            ->where('dog_owners.owner_id',$user->id)
                            ->leftjoin('dog_owners','dog_owners.dog_id','=','dogs.id')
                            ->where('sex','=','Male')
                            ->Orderby('dog_name','ASC')
                            ->get();
                if(count($sire) == 0){
                    $sire1 = Dog::select('id','dog_name')
                                    ->where('status','=','Active')
                                    ->where('sex','=','Male')
                                    ->Orderby('dog_name','ASC')
                                    ->get();
                }else{
                    $sire1 = array();
                }
                $breeders = array();
                return view('litter_inspect/first_create', compact('dam','dam1','sire1','sire','user','breeders','cities','kennel'));
        }
        else{
                     $sire = Dog::select('id','dog_name')
                    ->where('status','=','Active')
                    ->where('sex','=','Male')
                    ->Orderby('dog_name','ASC')
                    ->get();
                    $dam = Dog::select('id','dog_name')
                    ->where('status','=','Active')
                    ->where('sex','=','Female')
                    ->Orderby('dog_name','ASC')
                    ->get();
                    $cities = Cities::get();
                    $breeders = User::get();
                    return view('litter_inspect/first_create', compact('dam','sire','breeders','cities'));
    }
       }
   }elseif($curr_date < $request->check_date){
    return redirect()->route('LitterInspections.create')
            ->with('danger','Invalid Date Enetered, Please Try Again');
   }
    }

    // end

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
