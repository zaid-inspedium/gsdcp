<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\KCPNumbers;
use Auth;

class KCPNumbersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth()->user();
        $kcp_number = KCPNumbers::orderBy('id', 'DESC')->get();
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
        // $emp_reg = employee_registration::select('emp_id','full_name')->get();
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
        // echo "<script>alert('$previous');</script>";
        $kcp = KCPNumbers::findorFail($previous);
        $kcp->status = "End";
        $kcp->save();

        return redirect()->route('KCPNumber.index')
            ->with('success','KCP Number created successfully');
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
        return redirect()->route('KCPNumber.index')
            ->with('success','KCP Number updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kcp_number = KCPNumbers::findOrFail($id);
        $kcp_number->delete();
        return redirect()->route('KCPNumber.index')
            ->with('danger','KCP Number removed successfully');
    }
}
