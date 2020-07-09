<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\UserActivityLog;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Event;
use App\Cities;
use App\Dog;
use App\DogClass;
use App\DogOwner;
use App\DogShow;
use Carbon\Carbon;
use Auth;
use PDF;

class EventController extends Controller
{
    use UserActivityLog;
    public $module_name = "event";

    function __construct()
    {
         $this->middleware('permission:event-list');
         $this->middleware('permission:event-create', ['only' => ['create','store']]);
         $this->middleware('permission:event-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:event-delete', ['only' => ['update_status']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $total_events = Event::orderBy('id', 'DESC')->paginate('200');
        $this->saveActivity('Event List',$this->module_name);
        return view('events.index',compact('total_events'));
    }

    public function search(Request $request)
    {
        if($request->title=='' && $request->start_date=='' && $request->end_date=='' && $request->last_date_of_entry=='' && $request->type=='' && $request->status=='') {
            $this->saveActivity('Empty Event Search',$this->module_name);
            return redirect()->route('Event.index')
            ->with('danger','Please enter searching item');
        }
        else {
            $title = $request->title;
            $start_date = date("Y-m-d",strtotime($request->start_date));
            $end_date = date("Y-m-d",strtotime($request->end_date));
            $last_date_of_entry = date("Y-m-d",strtotime($request->last_date_of_entry));
            $type = $request->type;
            $status = $request->status;
            // echo "<script>alert('$start_date')</script>";

            $total_events = DB::select("SELECT id,title,start_date,end_date,last_date_of_entry,type,status FROM events
                where (title LIKE '%$title%')
                OR (start_date = '$start_date')
                AND (end_date LIKE '%$end_date%')
                AND (last_date_of_entry LIKE '%$last_date_of_entry%')
                AND (type LIKE '%$type%') 
                AND (status LIKE '%$status%')
                ");

            // foreach ($total_events as $key => $value) {
            //     echo print_r($value->title.' ');
            //     echo print_r($value->start_date);
            // }
            
            // $this->saveActivity('Event Search',$this->module_name);
            return view('events.index',compact('total_events'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $total_cities = Cities::select('id','city')->get();
        return view('events.create',compact('total_cities'));
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
            'attachment' => 'required|mimes:jpeg,png,doc,docx,pdf|max:2048',
        ]);
        if($file = $request->hasFile('attachment')) {
        $fileName = time().'.'.request()->attachment->getClientoriginalName();
        request()->attachment->move(public_path('events_documents'), $fileName);
        }
        else {
            $fileName = "";
        }
        $task = new Event;
        $task->type = $request->type;
        $task->friendly_URL = $request->friendly_URL;
        $task->title = $request->title;
        $task->start_date = date("Y-m-d",strtotime($request->start_date));
        $task->end_date = date("Y-m-d",strtotime($request->end_date));
        $task->last_date_of_entry = date("Y-m-d",strtotime($request->last_date_of_entry));
        $task->city = $request->city;
        $task->venue = $request->venue;
        $task->judge = $request->judge;
        $task->fee = $request->fee;
        $task->document = $fileName;
        $task->description = $request->description;
        $task->created_by = Auth::user()->id;
        $task->save();

        $this->saveActivity('Event Save',$this->module_name,"Create new record  ".$request->input('title')." ");

        return redirect()->route('Event.index')
          ->with('success','Record added successfully');
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
        $event = Event::findorFail($id);
        $total_cities = Cities::select('id','city')->get();
        return view('events.edit',compact('event','total_cities'));
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
        request()->validate([
            'title' => 'required',
            'attachment' => 'required|mimes:jpeg,png,doc,docx,pdf|max:2048',
        ]);

        if($request->hasFile('attachment')) {
            $fileName = time().'.'.request()->attachment->getClientoriginalName();
            request()->attachment->move(public_path('events_documents'), $fileName);
        }
        else {
            $fileName = $request->old_attachment;
        }
        $task = Event::findorFail($id);
        $task->type = $request->type;
        $task->friendly_URL = $request->friendly_URL;
        $task->title = $request->title;
        $task->start_date = date("Y-m-d",strtotime($request->start_date));
        $task->end_date = date("Y-m-d",strtotime($request->end_date));
        $task->last_date_of_entry = date("Y-m-d",strtotime($request->last_date_of_entry));
        $task->city = $request->city;
        $task->venue = $request->venue;
        $task->judge = $request->judge;
        $task->fee = $request->fee;
        $task->document = $fileName;
        $task->description = $request->description;
        $task->created_by = Auth::user()->id;
        $task->update();

        $this->saveActivity('Event Update',$this->module_name,"Updated record  ".$request->input('title')." ");
        return redirect()->route('Event.index')
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

    public function update_status($id)
    {
      $update_event = Event::findorFail($id);
      $update_event->status = 'Inactive';
      $update_event->is_deleted = 1;
      $update_event->update();
      $this->saveActivity('Event Delete',$this->module_name);
    }

    public function error_404()
    {
        return view('error_404');
    }

    public function entry_show($id)
    {
      $event = Event::findorFail($id);
      $total_users = User::select('id','first_name','last_name','email')->where('status', 'Active')->get();
        return view('events.entry_show',compact('event','total_users'));
    }

    public function judges_book()
    {
        $total_dog_class = DogShow::orderBy('id','DESC')->paginate('800');
        $this->saveActivity('Judges Book List',$this->module_name);
        return view('events.judges_book',compact('total_dog_class'));
    }

    public function show_card($id)
    {
        $dog_result = DogShow::findorFail($id);
        $this->saveActivity('Print Card',$this->module_name);
        return view('events.show_card',compact('dog_result'));
    }

    public function export_pdf($id)
    {
        $dog_result = DogShow::findOrFail($id);
        $dompdf = PDF::loadView('events.print_card', compact('dog_result'));
        // $customPaper = array(0,0,680,925);
        // $dompdf->setPaper($customPaper,'portrait');
        $dompdf->setPaper('A4','portrait');
        return $dompdf->stream('print_card.pdf');
        // return $dompdf->download('print_card.pdf');
    }    

    public function change_status($id)
    {
        $update_event = Event::findorFail($id);
        if($update_event->status=='Active') {
            $update_event->status = 'Inactive';
            $msg = ['danger' => 'Inactive status for this event'];
        }
        else {
            $update_event->status = 'Active';
            $msg = ['success' => 'Active status for this event'];
        }
        $update_event->update();
        $this->saveActivity('Event Status Changed',$this->module_name);

        return redirect()->route('Event.index')
            ->with($msg);
    
    }

    public function fetch_dogs(Request $request)
    {
        $dog_id = $request->get('dog_id');
        $value = $request->get('value');
        $dependent = $request->get('dependent');
        // $data2 = DogOwner::select('dog_id')->where('owner_id','=',$value)->get();
        // $data3 = Dog::select('id','dog_name')->where('status','Active')->whereIn('id',$data2)->get();
        $total_dog_id = DogOwner::select('dog_id')->where('owner_id','=',$value)->get();
        // $JSON['dogs_id'] = $total_dog_id;
        $total_dogs = Dog::select('id','dog_name')->where('status','Active')->whereIn('id',$total_dog_id)->get();
        // $JSON['option'] ='<option value="">- Select One -</option>';
        // $JSON['option'] ='';
        //     foreach ($total_dogs as $value) {
        //         $JSON['option'] .= '<option value="'.$value->id.'">'.$value->dog_name.'</option>';
        //     }
            // $output .= '</div>';
        // foreach ($JSON['option'] as $value) {
        //     echo $value;
        // }
        // echo "<script>alert('$value')</script>";
        echo json_encode($total_dogs);

      // if($data2->DNA_status == 'Not Available'){
      //   $output .= '<div class="alert alert-danger"> Stud DNA Not Available</div>';
      // }
    
    }

    

    public function fetch_member_dogs(Request $request)
    {
        $select = $request->get('select');
        $value = $request->get('value');
        $dependent = $request->get('dependent');
        $data2 = Dog::select('id','dog_name','dob','sire','dam','sex','microchip','DNA_status','breeder','KP','hip','elbows')->where('id','=',$value)->first();
        
        $d1 = $data2->dob;
        $mytime = Carbon::now();
        $d2 = $mytime;
        $interval = $d2->diff($d1);
        $month_diff = $interval->m + 12*$interval->y;

        $total_classes = DogClass::select('id','class','from_age','to_age')->where('from_age','>',$month_diff)->orWhere('to_age','>',$month_diff)->limit('1')->first();
        
        $output = '<br><br><div class="row">
        <div class="col-sm-6">
          <div class="form-group">
            <label for="">Date Of Birth: </label>
            <var id="dob" name="dob"><span style="color: green; text-decoration: underline;">'.$data2->dob.'</span></var>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="form-group">
            <label for="">Reg No: </label>
            <var id="reg_no" name="reg_no"><span style="color: green; text-decoration: underline;">'.$data2->KP.'</span></var>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-6">
          <div class="form-group">
            <label for="">Tattoo/Microchip: </label>
            <var id="microchip" name="microchip"><span style="color: green; text-decoration: underline;">'.$data2->microchip.'</span></var>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="form-group">
            <label for="">Reg. No: </label>
            <var id="sire_reg_no" name="sire_reg_no"><span style="color: green; text-decoration: underline;">'.$data2->sire_parent->KP.'</span></var>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-6">
          <div class="form-group">
            <label for="">Sire: </label>
            <var id="sire" name="sire"><span style="color: green; text-decoration: underline;">'.$data2->sire_parent->dog_name.'</span></var>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="form-group">
            <label for="">Reg. No: </label>
            <var id="dam_reg_no" name="dam_reg_no"><span style="color: green; text-decoration: underline;">'.$data2->dam_parent->KP.'</span></var>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-6">
          <div class="form-group">
            <label for="">Dam: </label>
            <var id="dam" name="dam"><span style="color: green; text-decoration: underline;">'.$data2->dam_parent->dog_name.'</span></var>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="form-group">
            <label for="">Breeder: </label>
            <var id="breed_survey" name="breed_survey"><span style="color: green; text-decoration: underline;">'.$data2->breeder.'</span></var>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-6">
          <div class="form-group">
            <label for="">HD: </label>
            <var id="HD" name="HD"><span style="color: green; text-decoration: underline;">'.$data2->hip.'</span></var>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="form-group">
            <label for="">ED: </label>
            <var id="ED" name="ED"><span style="color: green; text-decoration: underline;">'.$data2->elbows.'</span></var>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-6">
          <div class="form-group">
            <label for="">Class: </label>
            <var id="class" name="class"><span style="color: green; text-decoration: underline;">'.$total_classes->class.' '.$data2->sex.'
            </span></var>
          </div>
        </div>
       </div>
      </div><hr>
      <a class="btn btn-outline-warning" onclick="addRow()">
          <span> Another Dog &nbsp;</span><i class="fa fa-github"> </i>
      </a>';
      echo $output;
    
    }

    public function fetch_owner_details(Request $request)
    {
        $select = $request->get('select');
        $value = $request->get('value');
        $data5 = User::select('id','first_name','last_name','email','phone','address')->where('id','=',$value)->first();

        $output = '<br><br><div class="form-group row"><label class="col-form-label col-md-6 h6"> Owner(s) Details</label></div><div class="row">
        <div class="col-sm-6">
          <div class="form-group">
            <label for="">Name: </label>
            <var id="dob" name="dob"><span style="color: green; text-decoration: underline;">'.$data5->first_name.' '.$data5->last_name.'</span></var>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="form-group">
            <label for="">Email: </label>
            <var id="email" name="email"><span style="color: green; text-decoration: underline;">'.$data5->email.'</span></var>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-6">
          <div class="form-group">
            <label for="">Phone: </label>
            <var id="phone" name="phone"><span style="color: green; text-decoration: underline;">'.$data5->phone.'</span></var>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="form-group">
            <label for="">Address: </label>
            <var id="address" name="address"><span style="color: green; text-decoration: underline;">'.$data5->address.'</span></var>
          </div>
        </div>
      </div>';
      echo $output;
    
    }

    
}
