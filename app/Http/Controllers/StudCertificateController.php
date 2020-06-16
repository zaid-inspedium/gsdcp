<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\StudCertificate;
use Auth;
use App\Traits\UserActivityLog;
use App\Dog;

class StudCertificateController extends Controller
{
    use UserActivityLog;
    public $module_name = "studcertificate";
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
         $this->middleware('permission:stud-list');
         $this->middleware('permission:stud-create', ['only' => ['create','store']]);
         $this->middleware('permission:stud-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:stud-delete', ['only' => ['destroy']]);
    }


    public function index()
    {
        $certificates = StudCertificate::orderBy('id', 'DESC')
                                    ->where('is_delete','0')
                                    ->paginate('50');
        $this->saveActivity('Stud Certificate List',$this->module_name);
        return view('stud_certificate.index',compact('certificates'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sire = Dog::select('id','dog_name')->where('sex','=','Male')->where('status','=','Active')->get();
        $dam = Dog::select('id','dog_name')->where('sex','=','Female')->where('status','=','Active')->get();

        return view('stud_certificate.create',compact('sire','dam'));
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
        return view('stud_certificate.show');
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
        
    }
}
