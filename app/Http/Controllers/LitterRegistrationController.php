<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LitterRegistration;
use Auth;
use App\Traits\UserActivityLog;
use App\Dog;
use App\User;
use App\Kennel;
use App\StudCertificate;
use App\LitterDetail;
use App\ProjectSetting;
use App\DogOwner;
use App\LitterInspection;

class LitterRegistrationController extends Controller
{
    use UserActivityLog;
    public $module_name = "litter_registration";

    function __construct()
    {
         $this->middleware('permission:litter_registration-list');
         $this->middleware('permission:litter_registration-create', ['only' => ['create','store']]);
         $this->middleware('permission:litter_registration-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:litter_registration-delete', ['only' => ['destroy']]);
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
        
        $this->saveActivity('Litter Registration List',$this->module_name);

        if(in_array($user->user_type_id, $allowed_users)){
            //if user role is one of the allowed user role set by admin
            $litters = LitterRegistration::orderBy('id', 'DESC')->paginate('50');
            
        }else{
            //show record of logged user only
            $litters = LitterRegistration::where('created_by','=',$user->id)
                                            ->orderBy('id', 'DESC')
                                            ->paginate('50');
        }
        return view('litter_register.index',compact('litters'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        $check_users = ProjectSetting::where('option_name','=','show_all_dogs')->first();
        $allowed_users = explode (",", $check_users->option_value);

        if(in_array($user->user_type_id, $allowed_users)){
            //if user role is one of the allowed user role set by admin
    
            $breeders = User::select('id','first_name','last_name')
                            ->where('status','=','Active')
                            ->orderBy('first_name', 'ASC')->get();
                
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
        
            }

            $sire = Dog::select('id','dog_name')
                            ->where('status','=','Active')
                            ->where('sex','=','Male')
                            ->Orderby('dog_name','ASC')
                            ->get();

        return view('litter_register.create',compact('dam','sire','breeders'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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

    public function fetch_kennel(Request $request){

        $select = $request->get('select');
		$value = $request->get('value');
        $dependent = $request->get('dependent');
        $kennels_count = Kennel::where('owner_id','=',$value)
                        ->count();

        if($kennels_count == 0){
            $kennel_name = 'No Kennel Found';
            $kennel_prefix ='No Prefix Found';
            $kennel_suffix = 'No Suffix Found';

        }else{
            $kennels = Kennel::select('id','kennel_name','prefix','suffix')
                        ->where('owner_id','=',$value)
                        ->first();
            $kennel_name = $kennels->kennel_name;
            $kennel_prefix = $kennels->prefix;
            $kennel_suffix = $kennels->suffix;
        }

        $litters_count = LitterRegistration::where('owner_id','=',$value)
                        ->count();

        if($litters_count > 0){
            $litter_data = LitterRegistration::where('owner_id','=',$value)
                            ->latest('id')
                            ->first();
            
            $previous_litter = $litter_data->litter_detail[0]->name;
        }


        $member_balance = -5;
        $output = '<div style="padding:10px 0 0 20px;" class="form-group alert-warning">
                        <label><strong>Kennel Name:</strong></label>
                             <span>'.$kennel_name.'</span>
                        <br>
                        <label><strong>Suffix / Prefix:</strong></label>
                            <span>'.$kennel_suffix.' / '.$kennel_prefix.'</span>
                    </div>';
        if($member_balance < 0){
            $output .= '<div class="form-group alert-danger" style="color:red; padding:10px;">
                            <span>Current balance is -12,000. Click here to charge member account. LITTER FEE is 2,200</span>
                        </div>';
        }
        
        if(isset($previous_litter)){
            $first_char = str_split($previous_litter);
            $output .= '<div style="padding:10px 0 0 20px;" class="form-group alert-warning">
                        <label><strong>Previous Letter Used:</strong></label>
                            <span>'.$kennel_prefix.' "'.$first_char[0].'" '.$kennel_suffix.'</span>
                        </div>';
        }

        echo $output;
    }

    public function fetch_sireinfo(Request $request){

        $select = $request->get('select');
		$value = $request->get('value');
        $dependent = $request->get('dependent');
        $sire_info = Dog::select('hip','elbows')
                        ->where('id','=',$value)
                        ->first();
        $output = '<div style="padding:10px 0 0 20px;" class="form-group alert-warning">
                    <h4>Sire Info:</h4>
                    
                    <label><b>HD</b> : '.$sire_info->hip.'</label>
                    <label><b>ED</b> : '.$sire_info->elbows.'</label>
                   </div>';
        echo $output;

    }

    public function fetch_daminfo(Request $request){

        $select = $request->get('select');
		$value = $request->get('value');
        $dependent = $request->get('dependent');
        $stud = $request->get('stud');
        $inspection_msg = "";

        $certificate_count = StudCertificate::where('sire','=',$stud)
                        ->where('dam','=',$value)
                        ->count();

        if($certificate_count == 0){
            $certificate_msg = 'No Stud Certificate Found';

        }else{
            $certificate_msg = '';
        }

        $is_inspected = LitterInspection::where('sire_id','=',$stud)
                                                ->where('dam_id','=',$value)
                                                ->count();
        if($is_inspected == 0){
            $inspection_msg = "Litter Inspection not done. Please request litter inspection first";

        }else{
            $inspection_status = LitterInspection::select('status')->where('sire_id','=',$stud)
                                ->where('dam_id','=',$value)
                                ->latest('id')
                                ->first();
            if($inspection_status->status == 1){
                $inspection_msg = "Litter inspection request is pending.Try again later";

            }elseif($inspection_status->status == 4) {
                $inspection_msg = "Litter inspection request is rejected. Please contact Group Breed Warden";
            }elseif($inspection_status->status == 3) {
                $inspection_msg = "Litter inspection request is expired. Please contact Group Breed Warden";
            }
            
        }
        if($inspection_msg == ""){

            $dam_info = Dog::select('hip','elbows')
                        ->where('id','=',$value)
                        ->first();

            $output = '<div style="padding:10px 0 0 20px;" class="form-group alert-warning">
                        <h4>Dam Info:</h4>
                        <h5 style="color:red;">'.$certificate_msg.'</h5>
                        <label><b>HD</b> : '.$dam_info->hip.'</label>
                        <label><b>ED</b> : '.$dam_info->elbows.'</label>
                        </div>';

        }else{
            $output = "<script>alert('$inspection_msg')</script>";
            $output .= "<script> window.history.back(); </script>";
            
        }
        echo $output;

    }

    public function fetch_matingdate(Request $request){

        $select = $request->get('select');
		$whelping_date = $request->get('value');
        $dependent = $request->get('dependent');
        $stud = $request->get('stud');
        $dam = $request->get('dam');

        $certificate_mating_date = StudCertificate::select('mating_date')
                        ->where('sire','=',$stud)
                        ->where('dam','=',$dam)
                        ->first();
        
        $start  = date_create($certificate_mating_date->mating_date);
        $end 	= date_create($whelping_date);
        $diff  	= date_diff( $start, $end );
        $dates_diff_in_days = $diff->days;
                     
        if($dates_diff_in_days < 58 || $dates_diff_in_days > 65  ){
            $mating_date_msg = 'Litters can only be registered in between 58 to 65 days of mating';
        }else{
            $mating_date_msg = '';
        }

        $output = '<div style="padding:10px 0 0 20px;" class="form-group alert-warning">
                    <h4>Mating Date Info:</h4>
                    <h5 style="color:red;">'.$mating_date_msg.'</h5>
         
                   </div>';
        
        echo $output;

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

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
