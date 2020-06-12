<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Modules;
use App\Traits\UserActivityLog;
use Auth;
class ModulesController extends Controller
{
    use UserActivityLog;
    public $module_name = "modules";
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    function __construct()
    {
         $this->middleware('permission:module-list');
         $this->middleware('permission:module-create', ['only' => ['create','store']]);
         $this->middleware('permission:module-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:module-delete', ['only' => ['destroy']]);
    }
    
    public function index()
    {
        $modules = Modules::orderBy('id', 'DESC')->get();
        $this->saveActivity('Modules List',$this->module_name);

        return view('modules.index',compact('modules'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $modules = Modules::get();
        return view('modules.create',compact('modules'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'name' => 'required',
            'module_title' => 'required',
        ]);


        Modules::create($request->all());
        $this->saveActivity('Module Save',$this->module_name,"Create new record  ".$request->input('module_title')." ");

        return redirect()->route('Module.index')
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
        $user = Auth::user();
        $module = Modules::findorFail($id);

        return view('modules.edit',compact('module','user'));
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
        $module = Modules::findOrFail($id);
        $module->update($request->all());
        $this->saveActivity('Update Module',$this->module_name);

        return redirect()->route('Module.index')
            ->with('success','Record updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $module = Modules::findOrFail($id);
        $module->delete();
        $this->saveActivity('Delete Module',$this->module_name);

        return redirect()->route('Modules.index')
            ->with('danger','Record removed successfully');
    }
}
