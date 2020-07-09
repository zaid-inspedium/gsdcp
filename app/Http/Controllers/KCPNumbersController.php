<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\KCPNumbers;
use Auth;
use App\Traits\UserActivityLog;


class KCPNumbersController extends Controller
{
    use UserActivityLog;
    public $module_name = "kcpnumbers";
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    function __construct()
    {
         $this->middleware('permission:kcpnumbers-list');
         $this->middleware('permission:kcpnumbers-create', ['only' => ['create','store']]);
         $this->middleware('permission:kcpnumbers-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:kcpnumbers-delete', ['only' => ['update_status']]);
    }

    public function index()
    {
        $user = Auth()->user();
        $kcp_number = KCPNumbers::where('is_deleted','=','0')->orderBy('id', 'DESC')->get();
        $this->saveActivity('KCPNumbers List',$this->module_name);

        return view('kcp_numbers.index',compact('kcp_number','user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        return view('kcp_numbers.create',compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        KCPNumbers::create($request->all());
        $kcp_number = KCPNumbers::select('id')->latest()->first();
        $previous = KCPNumbers::where('id', '<', $kcp_number->id)->max('id');
        $kcp = KCPNumbers::findorFail($previous);
        $kcp->status = "End";
        $kcp->save();

        $this->saveActivity('KCP Number Save',$this->module_name,"Create new record  ".$request->input('start_range')." ");
        return redirect()->route('KCPNumber.index')
            ->with('success','Record created successfully');
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
        $kcp_number = KCPNumbers::findorFail($id);

        return view('kcp_numbers.edit',compact('kcp_number','user'));
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
        $kcp_number = KCPNumbers::findOrFail($id);
        $kcp_number->update($request->all());
        $this->saveActivity('Update KCP Number',$this->module_name);

        return redirect()->route('KCPNumber.index')
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
        // $kcp_number = KCPNumbers::findOrFail($id);
        // $kcp_number->delete();
        // $this->saveActivity('Delete KCP Number',$this->module_name);

        // return redirect()->route('KCPNumber.index')
        //     ->with('danger','Record removed successfully');
    }
    public function update_status($id)
    {
      $kcp_number = KCPNumbers::findOrFail($id);
      $kcp_number->is_deleted = 1;
      $kcp_number->update();
      $this->saveActivity('Delete KCP Number',$this->module_name);
    }
}
