<?php
namespace App\Traits; 
use App\Modules;

trait ModuleInfo {
 
    public function getModule_Info($module_name) {

        $modules_info = Modules::select('id','module_title')
        ->where('name','=',$module_name)
        ->first();

        return $modules_info;
 
    }
 
}
 