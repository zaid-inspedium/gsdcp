@extends('layouts.master')
<meta name="viewport" content="width=device-width, initial-scale=1">
@section('content')
<style>
#mating {
  visibility:none;
}
</style>

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
            <div class="content-box"><div class="row">
  <div class="col-lg-12">
    <div class="element-wrapper">
  <div class="element-box">
    <h5 class="form-header">
      Stud Certificate Form
    </h5>
    <div class="form-desc">
      The declaration made on this certificate is certified as true to the best of my knowledge the pedigree of the bitch has been examined by me and has been certified/issue by the G S D.1D.P
    </div>
  </div>
</div>
</div>
</div>

<div class="row">
<div class="col-lg-6">
    <div class="element-wrapper">
      <h6 class="element-header">
        Sire
      </h6>
      <div class="element-box">
        <form>
          <div class="form-group">
            <label for="">Name Of Sire</label><select class="form-control" name="sire_name" id="sire_name">
              <option value="0">
                Select Sire Name
              </option>
              <option value="1">
                New York
              </option>
              <option value="2">
                California
              </option>
              <option value="3">
                Boston
              </option>
              <option value="4">
                Texas
              </option>
              <option value="5">
                Colorado
              </option>
            </select>
          </div>
          <div class="row">
            <div class="col-sm-6">
              <div class="form-group">
                <label for="">KCP No: </label>
                <br>
                <var id="kcp_no" name="kcp_no"><span style="color: green; text-decoration: underline;"></span></var>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label for="">Date Of Birth: </label>
                <br>
                <var id="dob" name="dob"><span style="color: green; text-decoration: underline;"></span></var>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-6">
              <div class="form-group">
                <label for="">Training Level: </label>
                <br>
                <var id="train_level" name="train_level"><span style="color: green; text-decoration: underline;"></span></var>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label for="">Tattoo: </label>
                <br>
                <var id="tattoo" name="tattoo"><span style="color: green; text-decoration: underline;"></span></var>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-6">
              <div class="form-group">
                <label for="">Breed Survey: </label>
                <br>
                <var id="breed_survey" name="breed_survey"><span style="color: green; text-decoration: underline;"></span></var>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label for="">City: </label>
                <br>
                <var id="city" name="city"><span style="color: green; text-decoration: underline;"></span></var>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-6">
              <div class="form-group">
                <label for="">Name of Owner(s) of Stud: </label>
                <br>
                <var id="stud_owner" name="stud_owner"><span style="color: green; text-decoration: underline;"></span></var>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label for="">Street: </label>
                <br>
                <var id="street" name="street"><span style="color: green; text-decoration: underline;"></span></var>
              </div>
            </div>
          </div>
          </div>
        </div>
      </div>
  <div class="col-lg-6">
    <div class="element-wrapper">
      <h6 class="element-header">
        Dam
      </h6>
      <div class="element-box">
          <div class="form-group">
            <label for="">Name Of Dam</label><select class="form-control" name="dam_name" id="dam_name">
              <option value="0">
                Select Dam Name
              </option>
              <option value="1">
                New York
              </option>
              <option value="2">
                California
              </option>
              <option value="3">
                Boston
              </option>
              <option value="4">
                Texas
              </option>
              <option value="5">
                Colorado
              </option>
            </select>
          </div>
          <div class="row">
            <div class="col-sm-6">
              <div class="form-group" name="kcp_dam" id="kcp_dam">
                <label for="">KCP No: </label>
                <br>
                <var id="kcp_no" name="kcp_no"><span style="color: green; text-decoration: underline;"></span></var>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label for="">Date Of Birth: </label>
                <br>
                <var id="dob" name="dob"><span style="color: green; text-decoration: underline;"></span></var>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-6">
              <div class="form-group">
                <label for="">Training Level: </label>
                <br>
                <var id="train_level" name="train_level"><span style="color: green; text-decoration: underline;"></span></var>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label for="">Tattoo: </label>
                <br>
                <var id="tattoo" name="tattoo"><span style="color: green; text-decoration: underline;"></span></var>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-6">
              <div class="form-group">
                <label for="">Breed Survey: </label>
                <br>
                <var id="breed_survey" name="breed_survey"><span style="color: green; text-decoration: underline;"></span></var>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label for="">City: </label>
                <br>
                <var id="city" name="city"><span style="color: green; text-decoration: underline;"></span></var>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-6">
              <div class="form-group">
                <label for="">Name of Owner(s) of Stud: </label>
                <br>
                <var id="stud_owner" name="stud_owner"><span style="color: green; text-decoration: underline;"></span></var>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label for="">Street: </label>
                <br>
                <var id="street" name="street"><span style="color: green; text-decoration: underline;"></span></var>
              </div>
            </div>
          </div>
        </div>
        
      </div>
    </div>
  </div>

  <div class="row">
  <div class="col-lg-12">
    <div class="element-wrapper">
  <div class="element-box">
    <div class="form-group">
            <label for="">Mating Date: </label><input class="form-control" type="date" name="mating_date" id="mating_date">
          </div>
          <div class="form-buttons-w">
            <button class="btn btn-primary" type="submit"> Submit</button>
          </div>
  </div>
</div>
</form>
</div>
</div>
</div>

@endsection