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

class LitterInspectionController extends Controller
{
    use UserActivityLog;
    public $module_name = "litter_inspection";

    function __construct()
    {
         $this->middleware('permission:litter_inspection-list');
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

        $litter_inspect = LitterInspection::orderBy('id', 'DESC')->paginate('50');
        return view('litter_inspect.index',compact('litter_inspect'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
            if($user->user_type_id == '3'){
                //if logged in user is member
                $breeders = User::select('id','first_name','last_name','membership_no')
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
                
                $user = $breeders;

            }else{
                //if logged in user is not member(can be group breed warden or admin)
                $breeders = User::select('id','first_name','last_name','membership_no')
                    ->where('status','=','Active')
                    ->Orderby('first_name','ASC')
                    ->get();
                
                $dam = Dog::select('id','dog_name')
                    ->where('status','=','Active')
                    ->where('sex','=','Female')
                    ->Orderby('dog_name','ASC')
                    ->get();

            }

                $sire = Dog::select('id','dog_name')
                            ->where('status','=','Active')
                            ->where('sex','=','Male')
                            ->Orderby('dog_name','ASC')
                            ->get();


                $cities = Cities::where('status','=','Active')
                            ->Orderby('city','ASC')
                            ->get();
                $user = Auth::user();
                

        return view('litter_inspect.create',compact('dam','sire','breeders','cities','user'));
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
            'address' => 'required'
        ]);

        $certificate_count = StudCertificate::where('sire','=',$request->sire_id)
                        ->where('dam','=',$request->dam_id)
                        ->count();
        if($certificate_count == 0){
            return redirect()
                    ->route('LitterInspections.create')
                    ->with('danger','Stud Certificate Not Found of Sire and Dam As A Pair');
        }else{
            LitterInspection::create($request->all());
            $this->saveActivity('Litter Inspection Request',$this->module_name,"Create new record");

            return redirect()->route('LitterInspections.index')
                            ->with('success','Record created successfully.');
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
        $breeders = User::select('id','first_name','last_name','membership_no')
                    ->where('status','=','Active')
                    ->Orderby('first_name','ASC')
                    ->get();
                    
        $cities = Cities::where('status','=','Active')
                    ->Orderby('city','ASC')
                    ->get();

        $dam = Dog::select('id','dog_name')
                    ->where('status','=','Active')
                    ->where('sex','=','Female')
                    ->Orderby('dog_name','ASC')
                    ->get();

        $sire = Dog::select('id','dog_name')
                    ->where('status','=','Active')
                    ->where('sex','=','Male')
                    ->Orderby('dog_name','ASC')
                    ->get();

        $user = Auth::user();
        $litter_inspect = LitterInspection::where('id',$id)->first();
        return view('litter_inspect.edit',compact('breeders','litter_inspect','dam','sire','cities','user'));
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
        $inspect->breeder_id = $request->input('breeder_id');
        $inspect->sire_id = $request->input('sire_id');
        $inspect->dam_id = $request->input('dam_id');
        $inspect->images = $image_List;
        $inspect->status = $request->input('status');
        $inspect->city_id = $request->input('city_id');
        $inspect->remarks = $request->input('remarks');
        $inspect->updated_by = $request->input('updated_by');
        $inspect->save();

        $this->saveActivity('Update Litter Inspection Request',$this->module_name,"Remarks:  ".$request->input('remarks')." ");
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
