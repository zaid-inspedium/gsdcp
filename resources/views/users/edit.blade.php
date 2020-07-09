@extends('layouts.master')

@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<style>
  #new_photo{
    display: none;
  }
</style>
      <div class="content-i">
      <div class="content-box">
        <div class="row">
  <div class="col-lg-12">
    <div class="element-wrapper">
      <h6 class="element-header">
        <a action="back" href="javascript: window.history.back();" class="btn btn-sm btn-secondary">
          <i class="fa fa-backward"> </i><span> &nbsp; Back</span>
        </a>
        &nbsp; Users/Members
      </h6>
      <div class="element-box">
        <form action="{{ route('users.update',$user->id) }}" method="POST" id="formValidate" enctype="multipart/form-data" runat="server">
          @csrf
          @method('PUT')
          <legend><span>User Edit</span></legend>
          <div class="form-group">
            <label for="">First Name</label><input class="form-control" name="first_name" id="first_name" placeholder="Enter First Name" type="text"
          value="{{ $user->first_name }}">
          </div>
          <div class="row">
            <div class="col-sm-6">
              <div class="form-group">
                <label for="">Last Name</label><input class="form-control" name="last_name" id="last_name" placeholder="Last Name" type="text" value="{{ $user->last_name }}">
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label for="">CNIC</label><input class="form-control" name="cnic" id="cnic" placeholder="CNIC" type="text" value="{{ $user->cnic }}">
              </div>
            </div>
          </div>

          <div class="row">
            @if($user->photo == "")
            <div class="col-sm-6">
              <div class="form-group">
                <label for="photo">Photo</label>
                     <input class="form-control" type="file" id="photo" name="photo" accept="image/png, image/jpeg, image/jpg">
                     
               </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label for="photo_preview">Preview</label>
                <img id="blah" src="#" alt="your image" height="120" width="100" />
               </div>
            </div>
            @else
            <div class="col-sm-6">
              <div class="form-group">
                <label for="photo">Photo</label>
                     <input class="form-control" type="file" id="new_photo" name="new_photo" accept="image/png, image/jpeg, image/jpg">
                     <input type="hidden" value="{{ $user->photo }}" name="old_photo" />
                     <button class="btn btn-primary" type="button" id="pic_change" name="pic_change" onclick="changePic(); ">Change Picture</button>
               </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label for="photo_preview">Preview</label>
                
              <img id="blah" src="{{ URL::asset("members/profile_pic/{$user->photo}") }}" alt="{{ $user->photo }}" height="120" width="100" />
              <img id="blah2" src="#" alt="Your Image" height="120" width="100" />
               </div>
            </div>
            @endif
          </div>
          <div class="form-group">
            <label for="">Email</label><input class="form-control" name="email" id="email" placeholder="Email" type="email" value="{{ $user->email }}">
          </div>
          
            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="">Phone</label><input class="form-control" placeholder="Phone" type="text" id="phone" name="phone" value="{{ $user->phone }}">
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="">Address</label><input class="form-control" placeholder="Address" type="text" id="address" name="address" value="{{ $user->address }}">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="">Country</label>
                  <select class="form-control" id="country" name="country">
                  <option value="{{ $user->country}}">
                    {{ $user->user_country->countryName }}
                  </option>
                @foreach($countries as $country)
                    <option value="{{ $country->idCountry }}">
                        {{ $country->countryName}}
                    </option>
                @endforeach
              </select>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="">City</label><select class="form-control" id="city" name="city">
                    <option value="{{ $user->city}}">
                      {{ $user->user_city->city }}
                    </option>
                @foreach($cities as $city)
                <option value="{{ $city->id }}">
                    {{ $city->city}}
                </option>
               @endforeach
              </select>
                </div>
              </div>
            </div>
            <br>
            <div class="form-group">
              <label><strong>NewsLetter</strong> &nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp;
                @if($user->newsletter == 1)  
                    <input class="form-check-input" name="newsletter" type="checkbox" value="0" checked></label>
                @else
                    <input class="form-check-input" name="newsletter" type="checkbox" value="1" ></label>
                @endif
            </div>
          <br>
            <div class="form-group">
              <label>Zip Code</label>
            <input class="form-control" placeholder="Zip Code" type="text" id="zip_code" name="zip_code" value="{{ $user->zip_code }}">
            </div>

<br>
          <legend><span>Login Details</span></legend>
          <div class="form-group row">
            <label class="col-form-label col-sm-4" for="">User Type</label>
            <div class="col-sm-8">
              <select class="form-control" name="roles">
              
                @foreach($userRole as $usrole)
                  <option value="{{ $usrole }}">{{ $usrole }}</option>
                @endforeach
              
                @foreach($roles as $role)
                  <option value="{{ $role->name }}">{{ $role->name }}</option>
                @endforeach
                
              </select>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-form-label col-sm-4" for="">Membership #</label>
            <div class="col-sm-8">
            <input class="form-control" placeholder="Password" type="text" name="membership_no" value="{{ $user->membership_no }}">
            </div>
          </div>
          <br>
          <div class="form-group">
            <label>
              <strong>Old Record:</strong> &nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp;
              <input class="form-check-input" name="old_record" type="checkbox" value="1"></label>
          </div>
          <br>
          <div class="form-group row">
            <label class="col-form-label col-sm-4" for="">Username</label>
            <div class="col-sm-8">
            <input class="form-control" name="username" placeholder="Username" type="text" value="{{ $user->username }}">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-form-label col-sm-4" for="">Password</label>
            <div class="col-sm-8">
            <input class="form-control" name="password" placeholder="Password" type="password" value="{{ $user->password }}">
            </div>
          </div>
          <hr>
          <div class="form-buttons-w">
          	<button class="btn btn-primary" type="submit"> Submit</button>
          	<button class="btn btn-secondary" type="reset"> Reset</button>
	          <a action="back" href="javascript: window.history.back();" class="btn btn-danger">
              <i class="fa fa-times"> </i><span> &nbsp; Cancel</span>
            </a>
          </div>
          
  </form></div></div></div></div></div></div>  
  <script>

    function changePic(){

      document.getElementById("pic_change").style.display = "none";
      document.getElementById("new_photo").style.display = "block";
      document.getElementById("blah").style.display='none';

    }

    function readURL(input) {
      if (input.files && input.files[0]) {
        var reader = new FileReader();
        
        reader.onload = function(e) {
          $('#blah').attr('src', e.target.result);
        }
        
        reader.readAsDataURL(input.files[0]); // convert to base64 string
      }
    }
    
    $("#photo").change(function() {
      readURL(this);
    });



    function readURL(input) {
      if (input.files && input.files[0]) {
        var reader = new FileReader();
        
        reader.onload = function(e) {
          $('#blah2').attr('src', e.target.result);
        }
        
        reader.readAsDataURL(input.files[0]); // convert to base64 string
      }
    }
    
    $("#new_photo").change(function() {
      readURL(this);
    });
    
    </script>

@endsection