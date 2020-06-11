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

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = User::orderBy('id','DESC')->paginate(20);
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

    public function member_files($id)
    {
        $user = User::find($id);
        return view('users.member_files',compact('user'));
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
}
