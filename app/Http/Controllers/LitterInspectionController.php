<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LitterInspection;
use Auth;
use App\Traits\UserActivityLog;
use App\Dog;
use App\User;
use App\Cities;
use App\StudCertificate;

class LitterInspectionController extends Controller
{
    use UserActivityLog;
    public $module_name = "litter_inspection";

    // function __construct()
    // {
    //      $this->middleware('permission:litter_inspection-list');
    //      $this->middleware('permission:litter_inspection-create', ['only' => ['create','store']]);
    //      $this->middleware('permission:litter_inspection-edit', ['only' => ['edit','update']]);
    //      $this->middleware('permission:litter_inspection-delete', ['only' => ['destroy']]);
    // }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //making status expired of pending litters whose dates passed or reached.
        $curr_date = date('Y-m-d');
        $litter = LitterInspection::where('status','=','1')->get();
        foreach($litter as $inspect){
            if($inspect->valid_till <= $curr_date){
                $lit = LitterInspection::find($inspect->id);
				$lit->status = '3';
				$lit->save();
            }
        }
        $this->saveActivity('Litter Inspection List',$this->module_name);

        $litter_inspect = LitterInspection::orderBy('id', 'DESC')->paginate('50');
        return view('litter_inspect.index',compact('litter_inspect'));
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

        $breeders = User::select('id','first_name','last_name','membership_no')
                    ->where('status','=','Active')
                    ->Orderby('first_name','ASC')
                    ->get();

        $cities = Cities::where('status','=','Active')
                    ->Orderby('city','ASC')
                    ->get();
        $user = Auth::user();

        return view('litter_inspect.create',compact('dam','sire','breeders','cities','user'));
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
            'sire_id' => 'required',
            'dam_id' => 'required',
            'breeder_id' => 'required',
            'city_id' => 'required',
            'address' => 'required'
        ]);

        $certificate_count = StudCertificate::where('sire','=',$request->sire_id)
                        ->where('dam','=',$request->dam_id)
                        ->count();
        if($certificate_count == 0){
            return redirect()
                    ->route('LitterInspections.create')
                    ->with('danger','Stud Certificate Not Found of Sire and Dam As A Pair');
        }else{
            LitterInspection::create($request->all());
            $this->saveActivity('Litter Inspection Request',$this->module_name,"Create new record");

            return redirect()->route('LitterInspections.index')
                            ->with('success','Record created successfully.');
        }
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
        $breeders = User::select('id','first_name','last_name','membership_no')
                    ->where('status','=','Active')
                    ->Orderby('first_name','ASC')
                    ->get();
                    
        $cities = Cities::where('status','=','Active')
                    ->Orderby('city','ASC')
                    ->get();

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

        $user = Auth::user();
        $litter_inspect = LitterInspection::where('id',$id)->first();
        return view('litter_inspect.edit',compact('breeders','litter_inspect','dam','sire','cities','user'));
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
            'sire_id' => 'required',
            'dam_id' => 'required',
            'breeder_id' => 'required',
            'city_id' => 'required',
            'address' => 'required',
            'status' => 'required'
        ]);

        $fileName = time().'.'.request()->images->getClientOriginalName();
        request()->images->move(public_path('litter_images'), $fileName);

        $inspect = LitterInspection::find($id);
        $inspect->breeder_id = $request->input('breeder_id');
        $inspect->sire_id = $request->input('sire_id');
        $inspect->dam_id = $request->input('dam_id');
        $inspect->images = $fileName;
        $inspect->status = $request->input('status');
        $inspect->city_id = $request->input('city_id');
        $inspect->remarks = $request->input('remarks');
        $inspect->updated_by = $request->input('updated_by');
        $inspect->save();

        $this->saveActivity('Update Litter Inspection Request',$this->module_name,"Remarks:  ".$request->input('remarks')." ");
        return redirect()->route('LitterInspections.index')
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
        //
    }
}
