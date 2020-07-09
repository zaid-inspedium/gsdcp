<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dog;
use App\User;
use App\DogOwners;
use App\DogRegNumber;
use App\DogImages;
use App\HipElbows;
use App\Traits\UserActivityLog;
use Auth;
use DB;

class DogsController extends Controller
{
    use UserActivityLog;
    public $module_name = "dogs";

    function __construct()
    {
         $this->middleware('permission:dogs-list');
         $this->middleware('permission:dogs-create', ['only' => ['create','store']]);
         $this->middleware('permission:dogs-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:dogs-delete', ['only' => ['update_status']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $total_dogs = Dog::where('status', 'Active')->orderBy('id', 'DESC')->paginate(50);
      $this->saveActivity('Dogs List',$this->module_name);

      return view('dogs.index',compact('total_dogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $user = Auth::user();
      $total_sire = Dog::select('id','dog_name')->where('sex', 'Male')->get();
      $total_dam = Dog::select('id','dog_name')->where('sex', 'Female')->get();
      $total_users = User::select('id','first_name','last_name')->where('status', 'Active')->get();
      $total_hip = HipElbows::select('id','title')->get();
      return view('dogs.create',compact('user','total_sire','total_dam','total_hip','total_users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $fileName = time().'.'.request()->attachment->getClientOriginalName();
      request()->attachment->move(public_path('dog_images'), $fileName);

      $task = new Dog;
      $task->dog_name = $request->dog_name;
      $task->friendly_URL = $request->friendly_URL;
      $task->kennel = $request->kennel;

      $task->breeder = $request->breeder;
      $task->breed = $request->breed;
      $task->sex = $request->sex;
      $task->dob = date("Y-m-d",strtotime($request->dob));
      $task->sire = $request->sire;
      $task->dam = $request->dam;
      $task->show_title = $request->show_title;
      $task->microchip = $request->microchip;
      $task->KP = $request->KP;
      $dog_reg_numbers = $request->dog_reg_numbers;
      $owner_arr = $request->owner_id;
      $task->achievements = $request->achievements;
      $task->KKL = $request->KKL;
      $task->breed_survey_done = ($request->breed_survey_done != '' ) ? 1 : 0;
      $task->survey_date_from = $request->survey_date_from;
      $task->survey_date_to = $request->survey_date_to;
      $task->breed_survey_date = $request->breed_survey_date;
      $task->breed_surveyor = $request->breed_surveyor;
      $task->breed_survey_life = ($request->breed_survey_life != '' ) ? 1 : 0;
      $task->breed_survey_life_date = $request->breed_survey_life_date;
      $task->breed_surveyor_life = $request->breed_surveyor_life;
      $task->height = $request->height1.', '.$request->height2.', '.$request->height3;
      $task->depth_chest = $request->depth_chest;
      $task->chest_circumference = $request->chest_circumference;
      $task->weight = $request->weight;
      $task->color = $request->color;
      $task->pigment = $request->pigment;
      $task->hair = $request->hair;
      $task->testicles = $request->testicles;
      $task->description = $request->description;
      $task->character = $request->character;
      $task->watchfulness = $request->watchfulness;
      $task->conditions_of_nerves = $request->conditions_of_nerves;
      $task->confidence = $request->confidence;
      $task->reaction_to_gun_test = $request->reaction_to_gun_test;
      $task->resilience = $request->resilience;
      $task->sex_characteristics = $request->sex_characteristics;
      $task->constitution = $request->constitution;
      $task->expression = $request->expression;
      $task->proportions = $request->proportions;
      $task->bones = $request->bones;
      $task->muscular_development = $request->muscular_development;
      $task->view_from_the_front = $request->view_from_the_front;
      $task->rear = $request->rear;
      $task->back = $request->back;
      $task->elbow_closure = $request->elbow_closure;
      $task->firmness_in_stance_front = $request->firmness_in_stance_front;
      $task->front = $request->front;
      $croup_arr=$request->croup;
      if (!empty($croup_arr)) {
          $task->croup = implode(",",$croup_arr);
      }
      else {
          $task->croup = "";
      }
      $task->hock_joints = $request->hock_joints;
      $gait_arr=$request->gait;
      if (!empty($gait_arr)) {
          $task->croup = implode(",",$gait_arr);
      }
      else {
          $task->gait = "";
      }
      $task->reach = $request->reach;
      $task->drive = $request->drive;
      $task->toenails = $request->toenails;
      $feet_arr=$request->feet;
      if (!empty($feet_arr)) {
          $task->croup = implode(",",$feet_arr);
      }
      else {
          $task->feet = "";
      }
      $task->head = $request->head;
      $task->eyes = $request->eyes;
      $task->upper_jaw = $request->upper_jaw;
      $task->lower_jaw = $request->lower_jaw;
      $bite_arr=$request->bite;
      if (!empty($bite_arr)) {
          $task->croup = implode(",",$bite_arr);
      }
      else {
          $task->bite = "";
      }
      $task->dentition_faults = $request->dentition_faults;
      $task->neutered = $request->neutered;
      $task->hip = $request->hip;
      $task->elbows = $request->elbows;
      $task->DNA_status = $request->DNA_status;
      $task->particular_virtues_faults = $request->particular_virtues_faults;
      $task->advice = $request->advice;
      // $task->barcode = $request->barcode;
      // $task->death_date = $request->death_date;
      // $task->birth_location = $request->birth_location;
      $task->created_by = $request->created_by;
      $task->save();

      $dog_id = Dog::select('id')->latest()->first();

      $task2 = new DogImages;
      $task2->dog_id = $dog_id->id;
      $task2->image = $fileName;
      $task2->save();

      $task3 = new DogRegNumber;
      $task3->dog_id = $dog_id->id;
      $task3->regestration_no = $dog_reg_numbers;
      $task3->save();

      foreach($owner_arr as $value) {
          $task4 = new DogOwners;
          $task4->dog_id = $dog_id->id;
          $task4->owner_id = $value;
          $task4->save();
      }

      $this->saveActivity('New Dog',$this->module_name,"Create new record  ".$request->input('dog_name')." ");
      return redirect()->route('Dogs.index')
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
        $dog = Dog::findorFail($id);
        return view('dogs.show',compact('dog'));
    }

        public function pedigree($id){
            $dogs = DB::select(DB::raw("SELECT * FROM dogs WHERE id = '$id'"));
            $owner = DB::select(DB::raw("SELECT * FROM dog_owners
                LEFT JOIN users ON users.id = dog_owners.owner_id WHERE dog_owners.dog_id = '".$dogs[0]->id."' "));
        
            if(!empty($dogs)){
        //parents
        $dogs1sire = DB::select(DB::raw("SELECT * FROM dogs WHERE id = '".$dogs[0]->sire."' "));
        $dogs1dam = DB::select(DB::raw("SELECT * FROM dogs WHERE id = '".$dogs[0]->dam."' "));
        $gen1 = array(
            'father' => $dogs1sire,
            'mother' => $dogs1dam
        );
        }
        if(!empty($gen1)){
        //parents of father
        $dogs2sire1sire = DB::select(DB::raw("SELECT * FROM dogs WHERE id = '".$dogs1sire[0]->sire."' "));
        $dogs2dam1sire = DB::select(DB::raw("SELECT * FROM dogs WHERE id = '".$dogs1sire[0]->dam."' "));
        //parents of mother
        $dogs2sire1dam = DB::select(DB::raw("SELECT * FROM dogs WHERE id = '".$dogs1dam[0]->sire."' "));
        $dogs2dam1dam = DB::select(DB::raw("SELECT * FROM dogs WHERE id = '".$dogs1dam[0]->dam."' "));
        $gen2 = array(
            'gfather1' => $dogs2sire1sire,
            'gmother1' => $dogs2dam1sire,
            'gfather2' => $dogs2sire1dam,
            'gmother2' => $dogs2dam1dam
        );
        }
        if(!empty($gen2)){
        //parents of grand dad 1
        $dogs13sire2sire = DB::select(DB::raw("SELECT * FROM dogs WHERE id = '".$dogs2sire1sire[0]->sire."' "));
        $dogs13dam2sire = DB::select(DB::raw("SELECT * FROM dogs WHERE id = '".$dogs2sire1sire[0]->dam."' "));
        //parents of grand dad 2
        $dogs23sire2sire = DB::select(DB::raw("SELECT * FROM dogs WHERE id = '".$dogs2sire1dam[0]->sire."' "));
        $dogs23dam2sire = DB::select(DB::raw("SELECT * FROM dogs WHERE id = '".$dogs2sire1dam[0]->dam."' "));
        //parents of grand mother 1
        $dogs13sire2dam = DB::select(DB::raw("SELECT * FROM dogs WHERE id = '".$dogs2dam1sire[0]->sire."' "));
        $dogs13dam2dam = DB::select(DB::raw("SELECT * FROM dogs WHERE id = '".$dogs2dam1sire[0]->dam."' "));
        //parents of grand mother 2
        $dogs23sire2dam = DB::select(DB::raw("SELECT * FROM dogs WHERE id = '".$dogs2dam1dam[0]->sire."' "));
        $dogs23dam2dam = DB::select(DB::raw("SELECT * FROM dogs WHERE id = '".$dogs2dam1dam[0]->dam."' "));
        $gen3 = array(
            'ggfather1' => $dogs13sire2sire,
            'ggmother1' => $dogs13dam2sire,
            'ggfather2' => $dogs23sire2sire,
            'ggmother2' => $dogs23dam2sire,
            'ggfather3' => $dogs13sire2dam,
            'ggmother3' => $dogs13dam2dam,
            'ggfather4' => $dogs23sire2dam,
            'ggmother4' => $dogs23dam2dam
        );
        }
        if(!empty($gen3)){
        //parents of great grand dad 1
        $dogs14sire13sire = DB::select(DB::raw("SELECT * FROM dogs WHERE id = '".$dogs13sire2sire[0]->sire."' "));
        $dogs14dam13sire = DB::select(DB::raw("SELECT * FROM dogs WHERE id = '".$dogs13sire2sire[0]->dam."' "));
        //parents of great grand mom 1
        $dogs14sire13dam2sire = DB::select(DB::raw("SELECT * FROM dogs WHERE id = '".$dogs13dam2sire[0]->sire."' "));
        $dogs14dam13dam2sire = DB::select(DB::raw("SELECT * FROM dogs WHERE id = '".$dogs13dam2sire[0]->dam."' "));
        //parents of great grand dad 2
        $dogs24sire23sire2sire = DB::select(DB::raw("SELECT * FROM dogs WHERE id = '".$dogs23sire2sire[0]->sire."' "));
        $dogs24dam23sire2sire = DB::select(DB::raw("SELECT * FROM dogs WHERE id = '".$dogs23sire2sire[0]->dam."' "));
        //parents of great grand mom 2
        $dogs24sire23dam2sire = DB::select(DB::raw("SELECT * FROM dogs WHERE id = '".$dogs23dam2sire[0]->sire."' "));
        $dogs24dam23dam2sire = DB::select(DB::raw("SELECT * FROM dogs WHERE id = '".$dogs23dam2sire[0]->dam."' "));
        //parents of great grand dad 3
        $dogs34sire13sire2dam = DB::select(DB::raw("SELECT * FROM dogs WHERE id = '".$dogs13sire2dam[0]->sire."' "));
        $dogs34dam13sire2dam = DB::select(DB::raw("SELECT * FROM dogs WHERE id = '".$dogs13sire2dam[0]->dam."' "));
        //parents of great grand mom 3
        $dogs34sire13dam2dam = DB::select(DB::raw("SELECT * FROM dogs WHERE id = '".$dogs13dam2dam[0]->sire."' "));
        $dogs34dam13dam2dam = DB::select(DB::raw("SELECT * FROM dogs WHERE id = '".$dogs13dam2dam[0]->dam."' "));
        //parents of great grand dad 4
        $dogs44sire23sire2dam = DB::select(DB::raw("SELECT * FROM dogs WHERE id = '".$dogs23sire2dam[0]->sire."' "));
        $dogs44dam23sire2dam = DB::select(DB::raw("SELECT * FROM dogs WHERE id = '".$dogs23sire2dam[0]->dam."' "));
        //parents of great grand mom 4
        $dogs44sire23dam2dam = DB::select(DB::raw("SELECT * FROM dogs WHERE id = '".$dogs23dam2dam[0]->sire."' "));
        $dogs44dam23dam2dam = DB::select(DB::raw("SELECT * FROM dogs WHERE id = '".$dogs23dam2dam[0]->dam."' "));
        $gen4 = array(
            'gggfather1' => $dogs14sire13sire,
            'gggmother1' => $dogs14dam13sire,
            'gggfather2' => $dogs14sire13dam2sire,
            'gggmother2' => $dogs14dam13dam2sire,
            'gggfather3' => $dogs24sire23sire2sire,
            'gggmother3' => $dogs24dam23sire2sire,
            'gggfather4' => $dogs24sire23dam2sire,
            'gggmother4' => $dogs24dam23dam2sire,
            'gggfather5' => $dogs34sire13sire2dam,
            'gggmother5' => $dogs34dam13sire2dam,
            'gggfather6' => $dogs34sire13dam2dam,
            'gggmother6' => $dogs34dam13dam2dam,
            'gggfather7' => $dogs44sire23sire2dam,
            'gggmother7' => $dogs44dam23sire2dam,
            'gggfather8' => $dogs44sire23dam2dam,
            'gggmother8' => $dogs44dam23dam2dam
        );
        }
        if(!empty($gen4)){
        //parents of great great grand dad 11
        $dogs15sire14sire13sire = DB::select(DB::raw("SELECT * FROM dogs WHERE id = '".$dogs14sire13sire[0]->sire."' "));
        $dogs15dam14sire13sire = DB::select(DB::raw("SELECT * FROM dogs WHERE id = '".$dogs14sire13sire[0]->dam."' "));
        //parents of great great grand mom 11
        $dogs15sire14dam13sire = DB::select(DB::raw("SELECT * FROM dogs WHERE id = '".$dogs14dam13sire[0]->sire."' "));
        $dogs15dam14dam13sire = DB::select(DB::raw("SELECT * FROM dogs WHERE id = '".$dogs14dam13sire[0]->dam."' "));
        //parents of great great grand dad 12
        $dogs15sire14sire13dam2sire = DB::select(DB::raw("SELECT * FROM dogs WHERE id = '".$dogs14sire13dam2sire[0]->sire."' "));
        $dogs15dam14sire13dam2sire = DB::select(DB::raw("SELECT * FROM dogs WHERE id = '".$dogs14sire13dam2sire[0]->dam."' "));
        //parents of great great grand mom 12
        $dogs15sire14dam13dam2sire = DB::select(DB::raw("SELECT * FROM dogs WHERE id = '".$dogs14dam13dam2sire[0]->sire."' "));
        $dogs15dam14dam13dam2sire = DB::select(DB::raw("SELECT * FROM dogs WHERE id = '".$dogs14dam13dam2sire[0]->dam."' "));
        //parents of great great grand dad 21
        $dogs25sire24sire23sire2sire = DB::select(DB::raw("SELECT * FROM dogs WHERE id = '".$dogs24sire23sire2sire[0]->sire."' "));
        $dogs25dam24sire23sire2sire = DB::select(DB::raw("SELECT * FROM dogs WHERE id = '".$dogs24sire23sire2sire[0]->dam."' "));
        //parents of great great grand mom 21
        $dogs25sire24dam23sire2sire = DB::select(DB::raw("SELECT * FROM dogs WHERE id = '".$dogs24dam23sire2sire[0]->sire."' "));
        $dogs25dam24dam23sire2sire = DB::select(DB::raw("SELECT * FROM dogs WHERE id = '".$dogs24dam23sire2sire[0]->dam."' "));
        //parents of great great grand dad 22
        $dogs25sire24sire23dam2sire = DB::select(DB::raw("SELECT * FROM dogs WHERE id = '".$dogs24sire23dam2sire[0]->sire."' "));
        $dogs25dam24sire23dam2sire = DB::select(DB::raw("SELECT * FROM dogs WHERE id = '".$dogs24sire23dam2sire[0]->dam."' "));
        //parents of great great grand mom 22
        $dogs25sire24dam23dam2sire = DB::select(DB::raw("SELECT * FROM dogs WHERE id = '".$dogs24dam23dam2sire[0]->sire."' "));
        $dogs25dam24dam23dam2sire = DB::select(DB::raw("SELECT * FROM dogs WHERE id = '".$dogs24dam23dam2sire[0]->dam."' "));
        //parents of great great grand dad 31
        $dogs35sire34sire13sire2dam = DB::select(DB::raw("SELECT * FROM dogs WHERE id = '".$dogs34sire13sire2dam[0]->sire."' "));
        $dogs35dam34sire13sire2dam = DB::select(DB::raw("SELECT * FROM dogs WHERE id = '".$dogs34sire13sire2dam[0]->dam."' "));
        //parents of great great grand mom 31
        $dogs35sire34dam13sire2dam = DB::select(DB::raw("SELECT * FROM dogs WHERE id = '".$dogs34dam13sire2dam[0]->sire."' "));
        $dogs35dam34dam13sire2dam = DB::select(DB::raw("SELECT * FROM dogs WHERE id = '".$dogs34dam13sire2dam[0]->dam."' "));
        //parents of great great grand dad 32
        $dogs35sire34sire13dam2dam = DB::select(DB::raw("SELECT * FROM dogs WHERE id = '".$dogs34sire13dam2dam[0]->sire."' "));
        $dogs35dam34sire13dam2dam = DB::select(DB::raw("SELECT * FROM dogs WHERE id = '".$dogs34sire13dam2dam[0]->dam."' "));
        //parents of great great grand mom 32
        $dogs35sire34dam13dam2dam = DB::select(DB::raw("SELECT * FROM dogs WHERE id = '".$dogs34dam13dam2dam[0]->sire."' "));
        $dogs35dam34dam13dam2dam = DB::select(DB::raw("SELECT * FROM dogs WHERE id = '".$dogs34dam13dam2dam[0]->dam."' "));
        //parents of great great grand dad 41
        $dogs45sire44sire23sire2dam = DB::select(DB::raw("SELECT * FROM dogs WHERE id = '".$dogs44sire23sire2dam[0]->sire."' "));
        $dogs45dam44sire23sire2dam = DB::select(DB::raw("SELECT * FROM dogs WHERE id = '".$dogs44sire23sire2dam[0]->dam."' "));
        //parents of great great grand mom 41
        $dogs45sire44dam23sire2dam = DB::select(DB::raw("SELECT * FROM dogs WHERE id = '".$dogs44dam23sire2dam[0]->sire."' "));
        $dogs45dam44dam23sire2dam = DB::select(DB::raw("SELECT * FROM dogs WHERE id = '".$dogs44dam23sire2dam[0]->dam."' "));
        //parents of great great grand dad 42
        $dogs45sire44sire23dam2dam = DB::select(DB::raw("SELECT * FROM dogs WHERE id = '".$dogs44sire23dam2dam[0]->sire."' "));
        $dogs45dam44sire23dam2dam = DB::select(DB::raw("SELECT * FROM dogs WHERE id = '".$dogs44sire23dam2dam[0]->dam."' "));
        //parents of great great grand mom 42
        $dogs45sire44dam23dam2dam = DB::select(DB::raw("SELECT * FROM dogs WHERE id = '".$dogs44dam23dam2dam[0]->sire."' "));
        $dogs45dam44dam23dam2dam = DB::select(DB::raw("SELECT * FROM dogs WHERE id = '".$dogs44dam23dam2dam[0]->dam."' "));
        $gen5 = array(
            'ggggfather1' => $dogs15sire14sire13sire,
            'ggggmother1' => $dogs15dam14sire13sire,
            'ggggfather2' => $dogs15sire14dam13sire,
            'ggggmother2' => $dogs15dam14dam13sire,
            'ggggfather3' => $dogs15sire14sire13dam2sire,
            'ggggmother3' => $dogs15dam14sire13dam2sire,
            'ggggfather4' => $dogs15sire14dam13dam2sire,
            'ggggmother4' => $dogs15dam14dam13dam2sire,
            'ggggfather5' => $dogs25sire24sire23sire2sire,
            'ggggmother5' => $dogs25dam24sire23sire2sire,
            'ggggfather6' => $dogs25sire24dam23sire2sire,
            'ggggmother6' => $dogs25dam24dam23sire2sire,
            'ggggfather7' => $dogs25sire24sire23dam2sire,
            'ggggmother7' => $dogs25dam24sire23dam2sire,
            'ggggfather8' => $dogs25sire24dam23dam2sire,
            'ggggmother8' => $dogs25dam24dam23dam2sire,
            'ggggfather9' => $dogs35sire34sire13sire2dam,
            'ggggmother9' => $dogs35dam34sire13sire2dam,
            'ggggfather10' => $dogs35sire34dam13sire2dam,
            'ggggmother10' => $dogs35dam34dam13sire2dam,
            'ggggfather11' => $dogs35sire34sire13dam2dam,
            'ggggmother11' => $dogs35dam34sire13dam2dam,
            'ggggfather12' => $dogs35sire34dam13dam2dam,
            'ggggmother12' => $dogs35dam34dam13dam2dam,
            'ggggfather13' => $dogs45sire44sire23sire2dam,
            'ggggmother13' => $dogs45dam44sire23sire2dam,
            'ggggfather14' => $dogs45sire44dam23sire2dam,
            'ggggmother14' => $dogs45dam44dam23sire2dam,
            'ggggfather15' => $dogs45sire44sire23dam2dam,
            'ggggmother15' => $dogs45dam44sire23dam2dam,
            'ggggfather16' => $dogs45sire44dam23dam2dam,
            'ggggmother16' => $dogs45dam44dam23dam2dam
        );
        }
        if(!empty($gen1) && !empty($gen2) && !empty($gen3) && !empty($gen4) && !empty($gen5)){
        return view('dogs.generation', compact('dogs','owner','gen1', 'gen2','gen3','gen4','gen5'));
        }elseif(!empty($gen1) && !empty($gen2) && !empty($gen3) && !empty($gen4) && empty($gen5)){
        return view('dogs.generation', compact('dogs','owner','gen1', 'gen2','gen3','gen4','gen5'));
        }elseif(!empty($gen1) && !empty($gen2) && !empty($gen3) && empty($gen4)){
        return view('dogs.generation', compact('dogs','owner','gen1', 'gen2','gen3','gen4'));
        }elseif(!empty($gen1) && !empty($gen2) && empty($gen3)){
        return view('dogs.generation', compact('dogs','owner','gen1', 'gen2','gen3'));
        }elseif(!empty($gen1) && empty($gen2)){
        return view('dogs.generation', compact('dogs','owner','gen1','gen2'));
        }elseif(empty($gen1)){
        return view('dogs.generation', compact('dogs','owner','gen1'));
        }
    
        // $dog = Dog::findorFail($id);
        // return view('dogs.pedigree',compact('dog'));
    
        }
        

    public function progeny($id)
    {
        $dog = Dog::findorFail($id);
        return view('dogs.progeny',compact('dog'));
    }

    public function print_front($id)
    {
        $dog = Dog::findorFail($id);
        return view('dogs.print_pedigree_front',compact('dog'));
    }

    public function print_back($id)
    {
        $dog = Dog::findorFail($id);
        return view('dogs.print_pedigree_back',compact('dog'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $dog = Dog::findorFail($id);
      $total_sire = Dog::select('id','dog_name')->where('sex', 'Male')->get();
      $total_dam = Dog::select('id','dog_name')->where('sex', 'Female')->get();
      $total_users = User::select('id','first_name','last_name')->where('status', 'Active')->get();
      $total_hip = HipElbows::select('id','title')->get();
      return view('dogs.edit',compact('dog','total_sire','total_dam','total_users','total_hip'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dog $dog)
    {
        request()->validate([
            'dog_name' => 'required',
        ]);

        $dog->update($request->all());

        $this->saveActivity('Update Record',$this->module_name);
        return redirect()->route('Dogs.index')
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
        $update_dog = Dog::findOrFail($id);
        $update_dog->status = 'Inactive';
        $update_dog->update();
        $this->saveActivity('Record Delete',$this->module_name);

        return redirect()->route('Dog.index')
            ->with('success','Data removed successfully');
    }

    public function dna_results()
    {
        $proven = Dog::select('id','dog_name','KP','microchip','DNA_status')->where('DNA_status', 'Proven')->orderBy('id', 'DESC')->paginate(50);
        $stored = Dog::select('id','dog_name','KP','microchip','DNA_status')->where('DNA_status', 'Stored')->orderBy('id', 'DESC')->paginate(50);
        $repeat = Dog::select('id','dog_name','KP','microchip','DNA_status')->where('DNA_status', 'Repeat')->orderBy('id', 'DESC')->paginate(50);
        $applied_for = Dog::select('id','dog_name','KP','microchip','DNA_status')->where('DNA_status', 'Applied For')->orderBy('id', 'DESC')->paginate(50);
        $not_available = Dog::select('id','dog_name','KP','microchip','DNA_status')->where('DNA_status', 'Not Available')->orderBy('id', 'DESC')->paginate(50);
        $not_proven = Dog::select('id','dog_name','KP','microchip','DNA_status')->where('DNA_status', 'Not Proven')->orderBy('id', 'DESC')->paginate(50);
        return view('dogs.dna_results',compact('proven','stored','repeat','applied_for','not_available','not_proven'));
    }
}
