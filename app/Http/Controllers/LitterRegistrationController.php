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
        $litters = LitterRegistration::orderBy('id', 'DESC')->paginate('50');
        $this->saveActivity('Litter Registration List',$this->module_name);

        return view('litter_register.index',compact('litters'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
      
        $breeders = User::select('id','first_name','last_name')
                        ->where('status','=','Active')
                        ->orderBy('first_name', 'ASC')->get();

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
        $member_balance = -5;
        $output = '<div class="form-group">
                        <label><strong>Kennel Name:</strong></label>
                        <span>'.$kennel_name.'</span>
                    </div>
                    <div class="form-group">
                        <label><strong>Suffix / Prefix:</strong></label>
                        <span>'.$kennel_suffix.' / '.$kennel_prefix.'</span>
                    </div>';
        if($member_balance < 0){
            $output .= '<div class="form-group" style="color:red">
                        
                        <span>Current balance is -12,000. Click here to charge member account. LITTER FEE is 2,200</span>
                    </div>';
        }
        echo $output;
    }

    public function fetch_studcertificate(Request $request){

        $select = $request->get('select');
		$value = $request->get('value');
        $dependent = $request->get('dependent');

        $certificate_count = StudCertificate::where('sire','=',$value)
                        ->count();

        if($certificate_count == 0){
            $certificate_msg = 'No Stud Certificate Found';

        }else{
            $certificate_msg = '';
        }
        $output = '<div style="margin-left:20px;"><h4 style="color:red;">'.$certificate_msg.'</h4></div>';
        
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
