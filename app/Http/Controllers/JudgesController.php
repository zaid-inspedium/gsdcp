<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Judges;
use App\Traits\UserActivityLog;

class JudgesController extends Controller
{
    use UserActivityLog;
    public $module_name = "judges";

    function __construct()
    {
         $this->middleware('permission:judges-list');
         $this->middleware('permission:judges-create', ['only' => ['create','store']]);
         $this->middleware('permission:judges-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:judges-delete', ['only' => ['update_status']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $judge = Judges::where('status','=','1')->get();
        $this->saveActivity('Judges List',$this->module_name);

        return view('judges/index', compact('judge'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('judges/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->hasFile('img') && $request->hasFile('sig') ) {
            $imageName = time().'.'.request()->img->getClientoriginalName();
            request()->img->move(public_path('judge_images'), $imageName);
            
            $imagesig = time().'.'.request()->sig->getClientoriginalName();
            request()->sig->move(public_path('judge_signatures'), $imagesig);
        }
        else {
            $imageName = "";
            $imagesig = "";
        }

        $judge = DB::insert(DB::raw("INSERT INTO judges (full_name,description,image,signature)
            VALUES ('".$request->full_name."','".htmlentities($request->description)."','".$imageName."','".$imagesig."') "));

        $this->saveActivity('New Judge Created',$this->module_name,"Create new record  ".$request->input('full_name')." ");
            return redirect()->route('judges.index')
                    ->with('success','New Judge Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $judge = Judges::where('id',$id)->get();
        return view('judges/show', compact('judge'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $judge = Judges::where('id',$id)->get();
        return view('judges/edit', compact('judge'));
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
        if(!empty(request()->img)){
            $imageName = time().'.'.request()->img->getClientOriginalExtension();
                request()->img->move(public_path('judge_images'), $imageName);
        }

        if(!empty(request()->sig)){
                $imagesig = time().'.'.request()->sig->getClientOriginalExtension();
                request()->sig->move(public_path('judge_signatures'), $imagesig);
        }

        if(!empty($imageName) && !empty($imagesig)){
              $judge = Judges::find($id);
                $judge->full_name = $request->full_name; 
                $judge->description = htmlentities($request->description); 
                $judge->image =  $imageName;
                $judge->signature =  $imagesig; 
                $judge->update();
            }elseif(!empty($imageName) && empty($imagesig)){
                $judge = Judges::find($id);
                $judge->full_name = $request->full_name; 
                $judge->description = htmlentities($request->description); 
                $judge->image =  $imageName; 
                $judge->update();
            }elseif(empty($imageName) && !empty($imagesig)){
                $judge = Judges::find($id);
                $judge->full_name = $request->full_name; 
                $judge->description = htmlentities($request->description); 
                $judge->signature =  $imagesig; 
                $judge->update();
            }elseif(!empty($imageName)){
                $judge = Judges::find($id);
                $judge->full_name = $request->full_name; 
                $judge->description = htmlentities($request->description); 
                $judge->image =  $imageName; 
                $judge->update();
            }elseif(!empty($imagesig)){
                $judge = Judges::find($id);
                $judge->full_name = $request->full_name; 
                $judge->description = htmlentities($request->description); 
                $judge->signature =  $imagesig; 
                $judge->update();
            }else{
                $judge = Judges::find($id);
                $judge->full_name = $request->full_name; 
                $judge->description = htmlentities($request->description);
                $judge->update();
            }

        $this->saveActivity('Update Record',$this->module_name);
        return redirect()->route('judges.index')
            ->with('success','Judge Updated');
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

    public function update_status($id)
    {
      $update_judge = Judges::findorFail($id);
      $update_judge->status = 0;
      //$update_judge->is_deleted = 1;
      $update_judge->update();
      $this->saveActivity('Judge Deleted',$this->module_name);
    }
}
