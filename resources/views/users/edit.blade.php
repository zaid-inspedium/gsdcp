@extends('layouts.master')

@section('content')
  <!--------------------
          START - Breadcrumbs
          -------------------->
      <ul class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.html">Home</a>
        </li>
        <li class="breadcrumb-item">
          <a href="index.html">Products</a>
        </li>
        <li class="breadcrumb-item">
          <span>Laptop with retina screen</span>
        </li>
      </ul>
      <!--------------------
      END - Breadcrumbs
      -------------------->
      <div class="content-i">
      <div class="content-box">
        <div class="row">
  <div class="col-lg-12">
    <div class="element-wrapper">
      <h6 class="element-header">
        Users/Members
      </h6>
      <div class="element-box">
        <form>
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
          <div class="form-group">
           <label for="photo">Photo</label>
                <input class="form-control" type="file" id="photo" name="photo" accept="image/png, image/jpeg, image/jpg">
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
                <option>
                  Select City
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
                <label><strong>NewsLetter</strong> &nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp;<input class="form-check-input" name="news_letter" type="radio" value=""></label>
          </div>
          <br>
            <div class="form-group">
              <label>Zip Code</label>
              <input class="form-control" placeholder="Zip Code" type="text" id="zip_code" name="zip_code">
            </div>

<br>
          <legend><span>Login Details</span></legend>
          <div class="form-group row">
            <label class="col-form-label col-sm-4" for="">User Type</label>
            <div class="col-sm-8">
              <select class="form-control">
                <option>
                  Select User Types
                </option>
                <option>
                  hhghkj
                </option>
                <option>
                  jkhj
                </option>
                <option>
                  hjkhj
                </option>
                <option>
                  hjkhjk
                </option>
                <option>
                  hjkhj
                </option>
              </select>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-form-label col-sm-4" for="">Membership #</label>
            <div class="col-sm-8">
              <input class="form-control" placeholder="Password" type="text" name="membership_no">
            </div>
          </div>
          <br>
          <div class="form-group">
                <label><strong>Old Record:</strong> &nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp;<input class="form-check-input" name="old_record" type="radio" value=""></label>
          </div>
          <br>
          <div class="form-group row">
            <label class="col-form-label col-sm-4" for="">Username</label>
            <div class="col-sm-8">
              <input class="form-control" placeholder="Username" type="text">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-form-label col-sm-4" for="">Password</label>
            <div class="col-sm-8">
              <input class="form-control" placeholder="Password" type="password">
            </div>
          </div>
          <hr>
          <button class="btn btn-primary" type="submit"> Submit</button>
          
  </form></div></div></div></div></div></div>  


@endsection