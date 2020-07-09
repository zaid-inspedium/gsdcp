<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Microchips;
use App\User;
use App\Cities;
use DB;
use App\Traits\UserActivityLog;

class MicrochipsController extends Controller
{
    use UserActivityLog;
    public $module_name = "microchips";

    function __construct()
    {
         $this->middleware('permission:microchips-list');
         $this->middleware('permission:microchips-create', ['only' => ['create','store']]);
         $this->middleware('permission:microchips-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:microchips-delete', ['only' => ['update_status']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $curr = date('Y-m-d');
        $cities = Cities::get();
        $microchips = Microchips::get();
        foreach($microchips as $m){
            if($m->valid_date > $curr) {

            }
            elseif($m->valid_date == $curr || $m->valid_date < $curr) {
                $used = Microchips::find($m->id);
                $used->status = 'Used';
                $used->save();
            }
        }

        $microchip = Microchips::orderby('created_at','DESC')->paginate('200');

        $this->saveActivity('Microchips List',$this->module_name);
        return view('microchips/index', compact('microchip','cities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('microchips/add');
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
            'valid_date' => 'required',
            'lot' => 'required',
            'microchip' => 'required',
        ]);

        $text = $request->microchip;
        $transfer_arr = explode("\n",$text);
        $d=0;

        for($d == 0; $d < count($transfer_arr); $d++){
        $txt = $transfer_arr[$d];
        $val =  explode(' ',$txt);
        $transfer_arr1[$d] = $val[0];
        }
        foreach ($transfer_arr1 as $m) {
        $microchips = Microchips::create(['valid_date' => $request->input('valid_date'),
        'LOT' => $request->input('lot'),
        'microchip' => $m]);    
        }
        $this->saveActivity('Microchip Save',$this->module_name,"Create new record");
        return redirect()->route('microchips.index')
            ->with('success','Microchip created successfully');
    }

    public function assign()
    {
        $curr = date("Y-m-d");
        $cities = Cities::get();
        $lot = Microchips::get();
        return view('microchips/assigned', compact('cities','lot','curr'));
    }

    public function import()
    {
        return view('microchips/import');
    }

    public function importing(request $request)
    {
        $csvFile = file('csv/'.$request->file);
        $data = [];
        for($i=0; $i < count($csvFile); $i++) {
            $data[$i] = str_getcsv($csvFile[$i]);
        }
        print_r($data);
    }

    public function assigning(request $request)
    {
        $this->validate($request, [
            'assigned' => 'required',
            'lot' => 'required',
        ]);
        foreach($request->lot as $LOT) {
            $microchip = DB::insert(DB::raw("UPDATE microchips SET assigned_to = '".$request->assigned."', issued_date = '".$request->issue_date."', status = 'Issued' WHERE LOT = '".$LOT."' "));
        }
        return redirect()->route('microchips.index')
            ->with('success','Microchip Assigned successfully');
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
        $microchip = Microchips::findorFail($id);
        return view('microchips/edit', compact('microchip'));
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
            'valid_date' => 'required',
            'lot' => 'required',
            'microchip' => 'required',
        ]);

        $microchip = Microchips::find($id);
        $microchip->valid_date = $request->input('valid_date');
        $microchip->LOT = $request->input('lot');
        $microchip->microchip = $request->input('microchip');
        $microchip->save();

        $this->saveActivity('Update Microchip',$this->module_name);

        return redirect()->route('microchips.index')
                ->with('success','Microchip updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // DB::table("microchips")->where('id',$id)->delete();
        // return redirect()->route('microchips.index')
        //         ->with('success','Microchip Deleted successfully');
    }

    // public function update_status($id)
    // {
    //   $update_event = Microchips::findorFail($id);
    //   $update_event->status = 'Inactive';
    //   $update_event->is_deleted = 1;
    //   $update_event->update();
    //   $this->saveActivity('Event Delete',$this->module_name);
    // }
}
