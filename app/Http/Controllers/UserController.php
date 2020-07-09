<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Spatie\Permission\Models\Role;
use DB;
use Hash;
use App\Countries;
use App\Cities;
use Auth;
use App\Traits\UserActivityLog;

class UserController extends Controller
{
    use UserActivityLog;
    public $module_name = "users";

    function __construct()
    {
         $this->middleware('permission:users-list');
         $this->middleware('permission:users-create', ['only' => ['create','store']]);
         $this->middleware('permission:users-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:users-delete', ['only' => ['update_status']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = User::where('status','=','Active')->orderBy('id','ASC')->paginate(20);
        $this->saveActivity('Users List',$this->module_name);

        return view('users.index',compact('data'))
            ->with('i', ($request->input('page', 1) - 1) * 20);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::select('name')
                        ->get();
        $countries = Countries::select('idCountry','countryName')
                        ->get();
        $cities = Cities::select('id','city')
                        ->get();
        return view('users.create',compact('roles','countries','cities'));
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
            'first_name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
            'roles' => 'required'
        ]);

        $input = $request->all();
        $input['password'] = Hash::make($input['password']);

        $imageName = time().'.'.request()->photo->getClientOriginalExtension();
        request()->photo->move(public_path('members\profile_pic'), $imageName);

        $user = new User;
        $user->user_type_id = $request->roles;
        $user->membership_no = $request->membership_no; 
        $user->username = $request->username; 
        $user->password =  Hash::make($request->password);
        $user->first_name = $request->first_name; 
        $user->last_name = $request->last_name; 
        $user->photo = $imageName;
        $user->membership_no = $request->membership_no; 
        $user->cnic = $request->cnic; 
        $user->email = $request->email; 
        $user->phone = $request->phone; 
        $user->address = $request->address; 
        $user->city = $request->city; 
        $user->country = $request->country; 
        $user->zip_code = $request->zip_code; 
        $user->created_by = Auth::user()->id;
        $user->newsletter = $request->newsletter; 
        $user->old_record = ($request->old_record == '') ? 0 : 1; 
        $user->save();

        //$user = User::create($input);
        $user->assignRole($request->input('roles'));

        $this->saveActivity('New User',$this->module_name,"Create new record  ".$request->input('username')." ");
        return redirect()->route('users.index')
                        ->with('success','User created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('users.show',compact('user'));
    }
    public function show_files($id)
    {
        $file = DB::select(DB::raw("SELECT * FROM user_files WHERE id = '".$id."' "));
        return view('users.show_file',compact('file'));
    }


    public function save_files(request $request)
    {
        $files1 = request()->fileselect;
        $id = request()->idd;
        foreach($files1 as $file){
            $fileName = time().'.'.$file->getClientOriginalName();
            $file->move(public_path('members/member_files'), $fileName);
            $images_name[] = $fileName;
            $save_file = DB::insert(DB::raw("INSERT INTO user_files (user_id,file_name)
                VALUES('".$id."','".$fileName."')"));
        }

        return redirect()->back()->with('success','File(s) Saved successfully');
        
    }

    public function member_files($id)
    {
        $user = User::find($id);
        $mem_files = DB::select(DB::raw("SELECT * FROM user_files WHERE user_id = '".$id."' "));
        return view('users.member_files',compact('user','mem_files'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::select('name')
                        ->get();
        $countries = Countries::select('idCountry','countryName')
                        ->get();
        $cities = Cities::select('id','city')
                        ->get();
        $userRole = $user->roles->pluck('name','name')->all();

        return view('users.edit',compact('user','roles','userRole','countries','cities'));
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
            'first_name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
            'roles' => 'required'
        ]);


        $input = $request->all();
        if(!empty($input['password'])){ 
            $input['password'] = Hash::make($input['password']);
        }else{
            $input = array_except($input,array('password'));    
        }

        //checking previous photo
        $old_photo = $request->old_photo; 

        if($old_photo == ""){
            $imageName = time().'.'.request()->photo->getClientOriginalExtension();
            request()->photo->move(public_path('members\profile_pic'), $imageName);
        }else{
            if($request->new_photo == ""){
                $imageName = $old_photo;
            }
            else{
                $imageName = time().'.'.request()->new_photo->getClientOriginalExtension();
                 request()->new_photo->move(public_path('members\profile_pic'), $imageName);
            }

        }
        //end

        $user = User::find($id);
        $user->membership_no = $request->membership_no; 
        $user->username = $request->username; 
        $user->password =  Hash::make($request->password);
        $user->first_name = $request->first_name; 
        $user->last_name = $request->last_name; 
        $user->photo = $imageName;
        $user->membership_no = $request->membership_no; 
        $user->cnic = $request->cnic; 
        $user->email = $request->email; 
        $user->phone = $request->phone; 
        $user->address = $request->address; 
        $user->city = $request->city; 
        $user->country = $request->country; 
        $user->zip_code = $request->zip_code; 
        $user->created_by = Auth::user()->id;
        $user->newsletter = $request->newsletter; 
        $user->old_record = ($request->old_record == '') ? 0 : 1; 
        $user->update();

        // $user = User::find($id);
        // $user->update($input);
        DB::table('model_has_roles')->where('model_id',$id)->delete();


        $user->assignRole($request->input('roles'));


        $this->saveActivity('Update Record',$this->module_name);
        return redirect()->route('users.index')
                        ->with('success','User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect()->route('users.index')
                        ->with('success','User deleted successfully');
    }

    public function destroy_files($id)
    {
        $delete = DB::select(DB::raw("DELETE FROM user_files WHERE id = '".$id."' "));
        return redirect()->route('users.index')
                        ->with('success','File(s) deleted successfully');
    }

    public function update_status($id)
    {
      $update_user = User::findOrFail($id);
      $update_user->status = 'Inactive';
      $update_user->update();
      $this->saveActivity('User Delete',$this->module_name);
    }
}
