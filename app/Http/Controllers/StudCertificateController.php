<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\StudCertificate;
use Auth;
use App\Traits\UserActivityLog;
use App\Dog;
use Redirect;

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
        $sire = Dog::select('id','dog_name')
                    ->where('sex','=','Male')
                    ->where('status','=','Active')
                    ->Orderby('dog_name','ASC')
                    ->get();
        $dam = Dog::select('id','dog_name')
                    ->where('sex','=','Female')
                    ->where('KP','>','0')
                    ->where('status','=','Active')
                    ->Orderby('dog_name','ASC')
                    ->get();

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
      $this->validate($request, [
        'sire_name' => 'required',
        'dam_name' => 'required',
        'mating_date' => 'required'
        
     ]);
     $input = $request->all();
  
        if($request->dam_error == 0 && $request->sire_error == 0){
          $stud_cert_save = new StudCertificate;
          $stud_cert_save->sire = $request->sire_name;
          $stud_cert_save->dam = $request->dam_name; 
          $stud_cert_save->sire_owner_id = $request->sire_owner_id;
          $stud_cert_save->dam_owner_id = $request->dam_owner_id;
          $stud_cert_save->mating_date = $request->mating_date; 
          $stud_cert_save->created_by = Auth::user()->id;
          $stud_cert_save->save();

          $this->saveActivity('Stud Certificate Save',$this->module_name,"Create new record");

          return redirect()->route('StudCertificates.index')
                        ->with('success','Record Created Successfully');
    }else{
      return Redirect::back()->withErrors(['Please check your form then save']);
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
        
        $stud_dog_data = Dog::select('KP','hair','hip','elbows')
                          ->where('id','=',$stud)
                          ->where('status','=','Active')
                          ->first();

        $dam_dog = Dog::select('id','KP','dob','microchip','hair','breed_survey_done','hip','elbows','DNA_status')
                    ->where('id','=',$value)
                    ->where('status','=','Active')
                    ->first();

        if(isset($dam_dog->dog_owners[0])){
          if($dam_dog->dog_owners[0]->owner_id == NULL){
            $damowner_id = "";
            $owner_city = "";
            $owner_first_name = "";
            $owner_last_name = "";
            $owner_address = "";  
          }else{
            $damowner_id = $dam_dog->dog_owners[0]->owners->id;
            $owner_city = $dam_dog->dog_owners[0]->owners->user_city->city;
            $owner_first_name = $dam_dog->dog_owners[0]->owners->first_name;
            $owner_last_name = $dam_dog->dog_owners[0]->owners->last_name;
            $owner_address = $dam_dog->dog_owners[0]->owners->address;
          }
          
        }else{
          $damowner_id = "";
          $owner_city = "";
          $owner_first_name = "";
          $owner_last_name = "";
          $owner_address = "";
        }

        $dam_dog_age_limit = 600;
        $start  = date_create($dam_dog->dob);
        $end 	= date_create(); // Current time and date
        $diff  	= date_diff( $start, $end );
        $dam_dog_age_in_days = $diff->days; 
        $dam_dog_age_in_years = $diff->y;
        $breed_survey = ($dam_dog->breed_survey_done == 1) ? "Done" : "Not Done";

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
                <var id="breed_survey" name="breed_survey"><span style="color: green; text-decoration: underline;">'.$breed_survey.'</span></var>
              </div>
            </div>
            <div class="col-sm-6">
            <div class="form-group">
              <label for="">Name of Owner(s) of Stud: </label>
              <br>
              <var id="stud_owner" name="stud_owner"><span style="color: green; text-decoration: underline;">'.  $owner_first_name.' '.$owner_last_name.'</span></var>
            </div>
          </div>
          </div>
          ';
        
          if($stud_dog_data->KP == NULL && $dam_dog->KP == NULL){
            $output .= '<div class="alert alert-danger"> Bitch KP Not Available</div>';
            $output .= '<input type="hidden" value="1" id="dam_error" name="dam_error"/>';
            $output .= '<script type="text/javascript">
                          document.getElementById("btnsubmit").disabled = true 
                        </script>';
          }
          elseif($dam_dog->DNA_status == 'Not Available'){
            $output .= '<div class="alert alert-danger"> Bitch DNA Not Available</div>';
            $output .= '<input type="hidden" value="1" id="dam_error" name="dam_error"/>';
            $output .= '<script type="text/javascript">
                          document.getElementById("btnsubmit").disabled = true 
                        </script>';
          }
          else if($dam_dog_age_in_days < $dam_dog_age_limit){
            $output .= '<div class="alert alert-danger"> Bitch must be of 20 Months at least.</div>';
            $output .= '<input type="hidden" value="1" id="dam_error" name="dam_error"/>';
            $output .= '<script type="text/javascript">
                          document.getElementById("btnsubmit").disabled = true 
                        </script>';
          }
          elseif($dam_dog_age_in_years >= 8){
            $output .= '<div class="alert alert-danger"> Bitch is too old.Please contact National Breed Warden.</div>';
            $output .= '<input type="hidden" value="1" id="dam_error" name="dam_error"/>';
            $output .= '<script type="text/javascript">
                          document.getElementById("btnsubmit").disabled = true 
                        </script>';
          }
          elseif($stud_dog_data->hair != $dam_dog->hair){
            $output .= '<div class="alert alert-danger"> Stud is '.$stud_dog_data->hair.' and Bitch is '.$dam_dog->hair.' </div>';
            $output .= '<input type="hidden" value="1" id="dam_error" name="dam_error"/>';
            $output .= '<script type="text/javascript">
                          document.getElementById("btnsubmit").disabled = true 
                        </script>';
          }
          elseif($stud_dog_data->hip == 'Fast Normal' && $dam_dog->hip == 'Just Permitted' || $stud_dog_data->hip == 'Just Permitted' && $dam_dog->hip == 'Just Permitted'){
            $output .= '<div class="alert alert-danger"> Stud and Bitch HD do not matches with GSDCP guidelines.Please contact National Breed Warden</div>';
            $output .= '<input type="hidden" value="1" id="dam_error" name="dam_error"/>';
            $output .= '<script type="text/javascript">
                          document.getElementById("btnsubmit").disabled = true 
                        </script>';
          }
          elseif($stud_dog_data->elbows == 'Fast Normal' && $dam_dog->elbows == 'Just Permitted' || $stud_dog_data->elbows == 'Just Permitted' && $dam_dog->elbows == 'Just Permitted'){
            $output .= '<div class="alert alert-danger"> Stud and Bitch ED do not matches with GSDCP guidelines.Please contact National Breed Warden</div>';
            $output .= '<input type="hidden" value="1" id="dam_error" name="dam_error"/>';
            $output .= '<script type="text/javascript">
                          document.getElementById("btnsubmit").disabled = true 
                        </script>';
          }
          else{
              $output .= '<input type="hidden" value="'.$damowner_id.'" id="dam_owner_id" name="dam_owner_id"/>';
              $output .= '<input type="hidden" value="0" id="dam_error" name="dam_error"/>';
              $output .= '<script type="text/javascript">
                                document.getElementById("btnsubmit").disabled = false 
                              </script>';
              }

          echo $output;
    }

    public function fetch_sire(Request $request)
	  {
		    $select = $request->get('select');
		    $value = $request->get('value');
        $dependent = $request->get('dependent');
        
        $data2 = Dog::select('id','KP','dob','microchip','hair','breed_survey_done','DNA_status')
                      ->where('id','=',$value)->first();
      
        if(isset($data2->dog_owners[0])){
          if($data2->dog_owners[0]->owner_id == NULL){
            $owner_id="";
            $owner_city = "";
            $owner_first_name = "";
            $owner_last_name = "";
            $owner_address = "";  
          }else{
            $owner_id = $data2->dog_owners[0]->owners->id;
            $owner_city = $data2->dog_owners[0]->owners->user_city->city;
            $owner_first_name = $data2->dog_owners[0]->owners->first_name;
            $owner_last_name = $data2->dog_owners[0]->owners->last_name;
            $owner_address = $data2->dog_owners[0]->owners->address;
          }
          
        }else{
          $owner_id="";
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

        $breed_survey = ($data2->breed_survey_done == 1) ? "Done" : "Not Done";

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
            <var id="breed_survey" name="breed_survey"><span style="color: green; text-decoration: underline;">'.$breed_survey.'</span></var>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="form-group">
            <label for="">Name of Owner(s) of Stud: </label>
            <br>
            <var id="stud_owner" name="stud_owner"><span style="color: green; text-decoration: underline;">
            '.  $owner_first_name.' '.$owner_last_name.'</span></var>
          </div>
        </div>
      </div>';
      

      if($data2->DNA_status == 'Not Available'){
        $output .= '<div class="alert alert-danger"> Stud DNA Not Available</div>';
        $output .= '<input type="hidden" value="1" id="sire_error" name="sire_error"/>';
        $output .= '<script type="text/javascript">
                          document.getElementById("btnsubmit").disabled = true 
                        </script>';
      }
      else if($stud_dog_age_in_days < $stud_dog_age_limit){
        $output .= '<div class="alert alert-danger"> Stud must be of 24 Months at least.</div>';
        $output .= '<input type="hidden" value="1" id="sire_error"  name="sire_error"/>';
        $output .= '<script type="text/javascript">
                          document.getElementById("btnsubmit").disabled = true 
                        </script>';
      }
      elseif($stud_dog_age_in_years >= 8){
        $output .= '<div class="alert alert-danger"> Stud is too old.Please contact National Breed Warden.</div>';
        $output .= '<input type="hidden" value="1" id="sire_error" name="sire_error"/>';
        $output .= '<script type="text/javascript">
                          document.getElementById("btnsubmit").disabled = true 
                        </script>';
      }
      else{
        $output .= '<input type="hidden" value="'.$owner_id.'" id="sire_owner_id" name="sire_owner_id"/>';
        $output .= '<input type="hidden" value="0" id="sire_error" name="sire_error"/>';
        $output .= '<script type="text/javascript">
                          document.getElementById("btnsubmit").disabled = false 
                        </script>';
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
