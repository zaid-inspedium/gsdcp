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
      Stud Certificate No. *789987*
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
          <div class="form-group">
                <label for="">Name of Sire: </label>
                <var id="sire_name" name="sire_name"><span style="color: green; text-decoration: underline;"></span></var>
              </div>

              <div class="form-group">
                <label for="">KCP No: </label>
                <var id="kcp_no" name="kcp_no"><span style="color: green; text-decoration: underline;"></span></var>
              </div>

              <div class="form-group">
                <label for="">Date Of Birth: </label>
                <var id="dob" name="dob"><span style="color: green; text-decoration: underline;"></span></var>
              </div>

              <div class="form-group">
                <label for="">Training Level: </label>
                <var id="train_level" name="train_level"><span style="color: green; text-decoration: underline;"></span></var>
              </div>

              <div class="form-group">
                <label for="">Tattoo: </label>
                <var id="tattoo" name="tattoo"><span style="color: green; text-decoration: underline;"></span></var>
              </div>

              <div class="form-group">
                <label for="">Breed Survey: </label>
                <var id="breed_survey" name="breed_survey"><span style="color: green; text-decoration: underline;"></span></var>
              </div>

              <div class="form-group">
                <label for="">City: </label>
                <var id="city" name="city"><span style="color: green; text-decoration: underline;"></span></var>
              </div>
          
              <div class="form-group">
                <label for="">Name of Owner(s) of Stud: </label>
                <var id="stud_owner" name="stud_owner"><span style="color: green; text-decoration: underline;"></span></var>
              </div>

              <div class="form-group">
                <label for="">Street: </label>
                <var id="street" name="street"><span style="color: green; text-decoration: underline;"></span></var>
              </div>

              <div class="form-group">
                <label for="">Mating Date: </label>
                <var id="mating_date" name="mating_date"><span style="color: green; text-decoration: underline;"></span></var>
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
                <label for="">Name of Dam: </label>
                <var id="dam_name" name="dam_name"><span style="color: green; text-decoration: underline;"></span></var>
              </div>

              <div class="form-group">
                <label for="">KCP No: </label>
                <var id="kcp_no" name="kcp_no"><span style="color: green; text-decoration: underline;"></span></var>
              </div>

              <div class="form-group">
                <label for="">Date Of Birth: </label>
                <var id="dob" name="dob"><span style="color: green; text-decoration: underline;"></span></var>
              </div>

              <div class="form-group">
                <label for="">Training Level: </label>
                <var id="train_level" name="train_level"><span style="color: green; text-decoration: underline;"></span></var>
              </div>

              <div class="form-group">
                <label for="">Tattoo: </label>
                <var id="tattoo" name="tattoo"><span style="color: green; text-decoration: underline;"></span></var>
              </div>

              <div class="form-group">
                <label for="">Breed Survey: </label>
                <var id="breed_survey" name="breed_survey"><span style="color: green; text-decoration: underline;"></span></var>
              </div>

              <div class="form-group">
                <label for="">City: </label>
                <var id="city" name="city"><span style="color: green; text-decoration: underline;"></span></var>
              </div>
          
              <div class="form-group">
                <label for="">Name of Owner(s) of Stud: </label>
                <var id="stud_owner" name="stud_owner"><span style="color: green; text-decoration: underline;"></span></var>
              </div>

              <div class="form-group">
                <label for="">Street: </label>
                <var id="street" name="street"><span style="color: green; text-decoration: underline;"></span></var>
              </div>

              <div class="form-group">
                <label for="">Mating Date: </label>
                <var id="mating_date" name="mating_date"><span style="color: green; text-decoration: underline;"></span></var>
              </div>
            
          </div>
        </div>
      </div>

  
</div>
</div>

@endsection