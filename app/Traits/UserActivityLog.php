<?php
namespace App\Traits; 
use Illuminate\Http\Request;
use App\ActivityLog;
use App\Modules;

trait UserActivityLog {

    public static function getIPAddress() {  
        //whether ip is from the share internet  
         if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
                    $ip = $_SERVER['HTTP_CLIENT_IP'];  
            }  
        //whether ip is from the proxy  
        elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
                    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
         }  
    //whether ip is from the remote address  
        else{  
                 $ip = $_SERVER['REMOTE_ADDR'];  
         }  
         return $ip;  
    }

    public static function getModule_Info($module_name) {

        $modules_info = Modules::select('id','module_title')
        ->where('name','=',$module_name)
        ->first();

        return $modules_info;
 
    }
 
    public function saveActivity($activityName,$module_title,$desc='') {

        $user_agent = $_SERVER['HTTP_USER_AGENT'];
        $user_ip = UserActivityLog::getIPAddress();
        $user_id = Auth()->user()->id;

        $modules_info = UserActivityLog::getModule_Info($module_title);
        $moduleID = $modules_info->id;

        $activityLog = new ActivityLog;
        $activityLog->activity_name = $activityName; 
        $activityLog->module_id = $moduleID; 
        $activityLog->user_id =  $user_id;
        $activityLog->user_ip = $user_ip; 
        $activityLog->user_agent = $user_agent; 
        $activityLog->description = $desc;
        $activityLog->save();
 
    }
 
}
 