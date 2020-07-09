<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LitterInspectionSecond;
use Auth;
use App\ProjectSetting;
use App\Traits\UserActivityLog;
use App\LitterInspection;
use App\Kennel;

class LitterInspectionSecondController extends Controller
{
    use UserActivityLog;
    public $module_name = "litter_inspection_second";

    function __construct()
    {
         $this->middleware('permission:litter_inspection_second-list', ['only' => ['index']]);
         $this->middleware('permission:litter_inspection_second-create', ['only' => ['create','store']]);
         $this->middleware('permission:litter_inspection_second-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:litter_inspection_second-delete', ['only' => ['destroy']]);
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
        $this->saveActivity('Second Litter Inspection List',$this->module_name);

        if(in_array($user->user_type_id, $allowed_users)){
            //if user role is one of the allowed user role set by admin
            $litter_inspect = LitterInspectionSecond::orderBy('id', 'DESC')->paginate('50');
            return view('litter_inspect_second.index',compact('litter_inspect'));

        }else{
            //show record of logged user only
            $litter_inspect = LitterInspectionSecond::where('created_by','=',$user->id)
                                                ->orderBy('id', 'DESC')
                                                ->paginate('50');

            return view('litter_inspect_second.index',compact('litter_inspect'));

        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function fetch_inspection(Request $request){
        $select = $request->get('select');
		$value = $request->get('value');
        $dependent = $request->get('dependent');

        $inspection_detail = LitterInspection::select('id','breeder_id','sire_id','dam_id','whelping_date','mating_date','city_id','status')
                            ->where('id','=',$value)
                            ->first();

        $kennel_count = Kennel::select('kennel_name','prefix','suffix')
        ->where('owner_id','=',$inspection_detail->breeder_id)
        ->count();

        if($kennel_count == 0){
            $kennel = "";
        }else{
            $kennel = Kennel::select('kennel_name','prefix','suffix')
                    ->where('owner_id','=',$inspection_detail->breeder_id)
                    ->first();
            $kennel = ($kennel->prefix != "") ? $kennel->prefix : $kennel->suffix;
        }
        
        $output = '<div class="element-box-content">
        <div class="alert alert-success" role="alert">
        <input type="hidden" name="breeder_id" value="'.$inspection_detail->breeder->id.'"/>
        <div class="row">
        <div class="col-sm-3">
            <div class="form-group">
            <label for="">Sire:</label>
            <label for=""><b>'.$inspection_detail->sire_dog->dog_name.'</b></label>
            <input type="hidden" name="sire" value="'.$inspection_detail->sire_dog->id.'"/>
            <br>
            <label for="">KCP No:</label>
            <label for=""><b>'.$inspection_detail->sire_dog->KP.'</b></label>
            <br>
            <label for="">Breed Survey:</label>
            <label for=""><b>'.$inspection_detail->sire_dog->breed_survey_done.'</b></label>
          </div>
        </div>
        <div class="col-sm-3">
            <div class="form-group">
            <label for="">Dam:</label>
            <label for=""><b>'.$inspection_detail->dam_dog->dog_name.'</b></label>
            <input type="hidden" name="dam" value="'.$inspection_detail->dam_dog->id.'"/>
            <br>
            <label for="">KCP No:</label>
            <label for=""><b>'.$inspection_detail->dam_dog->KP.'</b></label>
            <br>
            <label for="">Breed Survey:</label>
            <label for=""><b>'.$inspection_detail->dam_dog->breed_survey_done.'</b></label>
         </div>
        </div>

        <div class="col-sm-3">
            <div class="form-group">
                <label for="">Dam:</label>
                <label for=""><b>'.$inspection_detail->dam_dog->dog_name.'</b></label>
                <br>
                <label for="">KCP No:</label>
                <label for=""><b>'.$inspection_detail->dam_dog->KP.'</b></label>
                <br>
                <label for="">Breed Survey:</label>
                <label for=""><b>'.$inspection_detail->dam_dog->breed_survey_done.'</b></label>
            </div>
        </div>
  

        <div class="col-sm-3">
          <div class="form-group">
            <label for="">Breeder: </label>
            <label for=""><b>'.$inspection_detail->breeder->first_name.'</b></label>
            <br>
                <label for="">Kennel:</label>
                <label for=""><b>'.$kennel.'</b></label>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-3">
            <div class="form-group">
            <label for="">Whelping Date:</label>
            <label for=""><b>'.$inspection_detail->whelping_date.'</b></label>
            <br>
            <label for="">Mating Date:</label>
            <label for=""><b>'.$inspection_detail->mating_date.'</b></label>
          </div>
        </div>
        <div class="col-sm-3">
            <div class="form-group">
            <label for="">Litter Size(Born):</label>
            <input type="text" name="born_size" class="form-control" style="width:100px;"/>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="form-group">
            <label for="">Litter Size(Dead):</label>
            <input type="text" name="dead_size" class="form-control" style="width:100px;"/>
          </div>
        </div>
    </div>
    </div>
        </div>';

        $output .= '<script type="text/javascript">
        document.getElementById("btnsubmit").disabled = false 
      </script>';

      echo $output;

    }

    public function create()
    {
        $user = Auth::user();
        $littersinspection = LitterInspection::select('id','sire_id','dam_id')
                                                ->orderBy('id', 'DESC')
                                                ->get();
        
        return view('litter_inspect_second.create',compact('littersinspection','user'));

    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        LitterInspectionSecond::create($request->all());
        $this->saveActivity('Second Litter Inspection',$this->module_name,"Create new record");
        return redirect()->route('SecondLitterInspections.index')
                        ->with('success','Record created successfully.');
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
