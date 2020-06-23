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


class DogsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $total_dogs = Dog::where('status', 'Active')->orderBy('id', 'DESC')->paginate(50);
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

    public function pedigree($id)
    {
        $dog = Dog::findorFail($id);
        return view('dogs.pedigree',compact('dog'));
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
