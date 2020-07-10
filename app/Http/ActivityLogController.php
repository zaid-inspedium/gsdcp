<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\ActivityLog;
use DB;
use App\UserActivityLog\saveActivity;

class ActivityLogController extends Controller
{
     use UserActivityLog;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $activity = DB::select(DB::raw("SELECT * FROM activity_log
            LEFT JOIN users ON users.id = activity_log.user_id
            LEFT JOIN modules ON modules.id = activity_log.module_id"));
       return view('activity_log/index', compact('activity'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    

    public function create()
    {
        
   
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($activityName,$moduleID,$desc='')
    {
        $user_agent = $_SERVER['HTTP_USER_AGENT'];
        $user_ip = ActivityLogController::getIPAddress();
        $user_id = Auth()->user()->id;

        $activityLog = new ActivityLog;
        $activityLog->activity_name = $activityName; 
        $activityLog->module_id = $moduleID; 
        $activityLog->user_id =  $user_id;
        $activityLog->user_ip = $user_ip; 
        $activityLog->user_agent = $user_agent; 
        $activityLog->description = $desc;
        $user->save();
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
