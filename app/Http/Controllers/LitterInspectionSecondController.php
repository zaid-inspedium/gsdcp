<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LitterInspectionSecond;
use Auth;
use App\ProjectSetting;
use App\Traits\UserActivityLog;
use App\LitterInspection;

class LitterInspectionSecondController extends Controller
{
    use UserActivityLog;
    public $module_name = "litter_inspection_second";

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
