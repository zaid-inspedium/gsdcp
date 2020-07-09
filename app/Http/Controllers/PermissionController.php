<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Permission;
use App\Modules;
use App\Traits\UserActivityLog;

class PermissionController extends Controller
{
    use UserActivityLog;
    public $module_name = "permissions";
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    function __construct()
    {
         $this->middleware('permission:permission-list');
         $this->middleware('permission:permission-create', ['only' => ['create','store']]);
         $this->middleware('permission:permission-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:permission-delete', ['only' => ['update_status']]);
    }

    public function index()
    {
        $permissions = Permission::orderBy('id', 'DESC')->get();
        $this->saveActivity('Module Action List',$this->module_name);

        return view('permissions.index',compact('permissions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $modules = Modules::orderBy('id', 'DESC')->get();
        return view('permissions.create', compact('modules'));
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
            'module_id' => 'required|unique:roles,name',
            'permission' => 'required',
        ]);

        $permissions = Permission::create(['name' => $request->input('permission'), 'module_id' => $request->input('module_id')]);
        $this->saveActivity('Module Action Save',$this->module_name,"Create new record  ".$request->input('permission')." ");

        return redirect()->route('Permission.index')
                        ->with('success','Permission created successfully');
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
        $permission = Permission::find($id);
        $modules = Modules::get();
      
         return view('permissions.edit', compact('modules', 'permission'));
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
            'module_id' => 'required',
            'permission' => 'required',
        ]);


        $permissions = Permission::find($id);
        $permissions->module_id = $request->input('module_id');
        $permissions->name = $request->input('permission');
        $this->saveActivity('Module Action Update',$this->module_name);

        $permissions->save();


        return redirect()->route('Permission.index')
                        ->with('success','Permission updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $permissions = Permission::findOrFail($id);
        // $this->saveActivity('Module Action Delete',$this->module_name);

        // $permissions->delete();
        // return redirect()->route('Permission.index')
        //     ->with('danger','Record removed successfully');
    }

    public function update_status($id)
    {
      $permissions = Permission::findOrFail($id);
      $permissions->is_deleted = 1;
      $permissions->update();
      $this->saveActivity('Permission Module Delete',$this->module_name);
    }
}
