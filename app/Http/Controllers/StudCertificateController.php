<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\StudCertificate;
use Auth;
use App\Traits\UserActivityLog;
use App\Dog;

class StudCertificateController extends Controller
{
    use UserActivityLog;
    public $module_name = "studcertificate";
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
         $this->middleware('permission:stud-list');
         $this->middleware('permission:stud-create', ['only' => ['create','store']]);
         $this->middleware('permission:stud-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:stud-delete', ['only' => ['destroy']]);
    }


    public function index()
    {
        $certificates = StudCertificate::orderBy('id', 'DESC')
                                    ->where('is_delete','0')
                                    ->paginate('50');
        $this->saveActivity('Stud Certificate List',$this->module_name);
        return view('stud_certificate.index',compact('certificates'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sire = Dog::select('id','dog_name')->where('sex','=','Male')->where('status','=','Active')->get();
        $dam = Dog::select('id','dog_name')->where('sex','=','Female')->where('status','=','Active')->get();

        return view('stud_certificate.create',compact('sire','dam'));
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
        return view('stud_certificate.show');
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

    public function fetch_dam(Request $request)
    {

        $select = $request->get('select');
		    $value = $request->get('value');
        $dependent = $request->get('dependent');
        $stud = $request->get('stud');
        
        $stud_dog_data = Dog::select('KP','hair')
                          ->where('id','=',$stud)
                          ->where('status','=','Active')
                          ->first();

        $dam_dog = Dog::select('id','KP','dob','microchip','hair','breed_survey_done','DNA_status')
                    ->where('id','=',$value)
                    ->where('status','=','Active')
                    ->first();

        if(isset($dam_dog->dog_owners[0])){
          if($dam_dog->dog_owners[0]->owner_id == NULL){
            $owner_city = "";
            $owner_first_name = "";
            $owner_last_name = "";
            $owner_address = "";  
          }else{
            $owner_city = $dam_dog->dog_owners[0]->owners->user_city->city;
            $owner_first_name = $dam_dog->dog_owners[0]->owners->first_name;
            $owner_last_name = $dam_dog->dog_owners[0]->owners->last_name;
            $owner_address = $dam_dog->dog_owners[0]->owners->address;
          }
          
        }else{
          $owner_city = "";
          $owner_first_name = "";
          $owner_last_name = "";
          $owner_address = "";
        }

        $dam_dog_age_limit = 60;
        $start  = date_create($dam_dog->dob);
        $end 	= date_create(); // Current time and date
        $diff  	= date_diff( $start, $end );
        $dam_dog_age_in_days = $diff->days; 
        $dam_dog_age_in_years = $diff->y;

        $output = '<div class="row">
            <div class="col-sm-6">
              <div class="form-group" name="kcp_dam" id="kcp_dam">
                <label for="">KCP No: </label>
                <br>
                <var id="kcp_no" name="kcp_no"><span style="color: green; text-decoration: underline;">'.$dam_dog->KP.'</span></var>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label for="">Date Of Birth: </label>
                <br>
                <var id="dob" name="dob"><span style="color: green; text-decoration: underline;">'.$dam_dog->dob.'</span></var>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-6">
              <div class="form-group">
                <label for="">Training Level: </label>
                <br>
                <var id="train_level" name="train_level"><span style="color: green; text-decoration: underline;"></span></var>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label for="">Tattoo: </label>
                <br>
                <var id="tattoo" name="tattoo"><span style="color: green; text-decoration: underline;">'.$dam_dog->microchip.'</span></var>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-6">
              <div class="form-group">
                <label for="">Breed Survey: </label>
                <br>
                <var id="breed_survey" name="breed_survey"><span style="color: green; text-decoration: underline;">'.$dam_dog->breed_survey_done.'</span></var>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label for="">City: </label>
                <br>
                <var id="city" name="city"><span style="color: green; text-decoration: underline;">'.$owner_city.'</span></var>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-6">
              <div class="form-group">
                <label for="">Name of Owner(s) of Stud: </label>
                <br>
                <var id="stud_owner" name="stud_owner"><span style="color: green; text-decoration: underline;">'.  $owner_first_name.' '.$owner_last_name.'</span></var>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label for="">Street: </label>
                <br>
                <var id="street" name="street"><span style="color: green; text-decoration: underline;">'.$owner_address.'</span></var>
              </div>
            </div>
          </div>';
        
          

          if($stud_dog_data->KP == NULL && $dam_dog->KP == NULL){
            $output .= '<div class="alert alert-danger"> Bitch KP Not Available</div>';
            $output .= '<input type="text" value="1" name="dam_error"/>';
          }
          elseif($dam_dog->DNA_status == 'Not Available'){
            $output .= '<div class="alert alert-danger"> Bitch DNA Not Available</div>';
            $output .= '<input type="text" value="1" name="dam_error"/>';
          }
          else if($dam_dog_age_in_days < $dam_dog_age_limit){
            $output .= '<div class="alert alert-danger"> Bitch must be of 2 Months at least.</div>';
            $output .= '<input type="text" value="1" name="dam_error"/>';
          }
          elseif($dam_dog_age_in_years >= 8){
            $output .= '<div class="alert alert-danger"> Bitch must be less than 8 years.</div>';
            $output .= '<input type="text" value="1" name="dam_error"/>';
          }
          elseif($stud_dog_data->hair != $dam_dog->hair){
            $output .= '<div class="alert alert-danger"> Stud is '.$stud_dog_data->hair.' and Bitch is '.$dam_dog->hair.' </div>';
            $output .= '<input type="text" value="1" name="dam_error"/>';
          }
          else{
            $output .= '<input type="text" value="0" name="dam_error"/>';
          }

          echo $output;
    }


    public function fetch_sire(Request $request)
	  {
		$select = $request->get('select');
		$value = $request->get('value');
        $dependent = $request->get('dependent');
        
        $data2 = Dog::select('id','KP','dob','microchip','hair','breed_survey_done','DNA_status')->where('id','=',$value)->first();
      
        if(isset($data2->dog_owners[0])){
          if($data2->dog_owners[0]->owner_id == NULL){
            $owner_city = "";
            $owner_first_name = "";
            $owner_last_name = "";
            $owner_address = "";  
          }else{
            $owner_city = $data2->dog_owners[0]->owners->user_city->city;
            $owner_first_name = $data2->dog_owners[0]->owners->first_name;
            $owner_last_name = $data2->dog_owners[0]->owners->last_name;
            $owner_address = $data2->dog_owners[0]->owners->address;
          }
          
        }else{
          $owner_city = "";
          $owner_first_name = "";
          $owner_last_name = "";
          $owner_address = "";
        }

        $stud_dog_age_limit = 720;
        $start  = date_create($data2->dob);
        $end 	= date_create(); // Current time and date
        $diff  	= date_diff( $start, $end );
        $stud_dog_age_in_days = $diff->days; 
        $stud_dog_age_in_years = $diff->y;

        

        $output = '<div class="row">
        <div class="col-sm-6">
          <div class="form-group">
            <label for="">KCP No: </label>
            <br>
            <var id="kcp_no" name="kcp_no"><span style="color: green; text-decoration: underline;">'.$data2->KP.'</span></var>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="form-group">
            <label for="">Date Of Birth: </label>
            <br>
            <var id="dob" name="dob"><span style="color: green; text-decoration: underline;">'.$data2->dob.'</span></var>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-6">
          <div class="form-group">
            <label for="">Training Level: </label>
            <br>
            <var id="train_level" name="train_level"><span style="color: green; text-decoration: underline;"></span></var>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="form-group">
            <label for="">Tattoo: </label>
            <br>
            <var id="tattoo" name="tattoo"><span style="color: green; text-decoration: underline;">'.$data2->microchip.'</span></var>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-6">
          <div class="form-group">
            <label for="">Breed Survey: </label>
            <br>
            <var id="breed_survey" name="breed_survey"><span style="color: green; text-decoration: underline;">'.$data2->breed_survey_done.'</span></var>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="form-group">
            <label for="">City: </label>
            <br>
            <var id="city" name="city"><span style="color: green; text-decoration: underline;">
            '. $owner_city.'
            </span></var>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-6">
          <div class="form-group">
            <label for="">Name of Owner(s) of Stud: </label>
            <br>
            <var id="stud_owner" name="stud_owner"><span style="color: green; text-decoration: underline;">
            '.  $owner_first_name.' '.$owner_last_name.'</span></var>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="form-group">
            <label for="">Street: </label>
            <br>
            <var id="street" name="street"><span style="color: green; text-decoration: underline;">'.$owner_address.'</span></var>
          </div>
        </div>
      </div>';
      

      if($data2->DNA_status == 'Not Available'){
        $output .= '<div class="alert alert-danger"> Stud DNA Not Available</div>';
        $output .= '<input type="text" value="1" name="sire_error"/>';
      }
      else if($stud_dog_age_in_days < $stud_dog_age_limit){
        $output .= '<div class="alert alert-danger"> Stud must be of 24 Months at least.</div>';
        $output .= '<input type="text" value="1" name="sire_error"/>';
      }
      elseif($stud_dog_age_in_years >= 8){
        $output .= '<div class="alert alert-danger"> Stud must be less than 8 years.</div>';
        $output .= '<input type="text" value="1" name="sire_error"/>';
      }
      else{
        $output .= '<input type="text" value="0" name="sire_error"/>';
      }
     
       
		echo $output;
	
	}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
    }
}
