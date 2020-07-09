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
<div id="content">
<div class="wrapper">
<div class="page-header">

</div>

<div class="content-i">
            <div class="content-box"><div class="row">
  <div class="col-lg-12">
    <div class="element-wrapper">
      <h6 class="element-header">
        Microchips - Assigning
      </h6>
      <div class="element-box">
        <form>
          <div class="row">
            <div class="col-sm-6">
              <div class="form-group">
                <label for=""> Assigned To<span class="req">*</span></label>
                <select class="form-control" id="assigned" name="assigned">
                  <option>-Select One -</option>
                  <option></option>
                  <option></option>
                </select>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label for="">LOT #<span class="req">*</span></label>
                <select class="form-control" id="lot" name="lot">
                  <option>-Select One -</option>
                  <option></option>
                  <option></option>
                </select>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-sm-6">
              <div class="form-group">
                <label for=""> Issued Date<span class="req">*</span></label><input class="form-control" placeholder="" type="date" id="issue_date" name="valid_date">
              </div>
            </div>
          </div>

          <div class="form-buttons-w">
            <button class="btn btn-primary" type="submit"> Submit</button>
          </div>
        </form>
      </div>
    </div>
  </div>


@endsection