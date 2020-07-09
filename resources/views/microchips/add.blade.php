@extends('layouts.master')

@section('content')

<div id="content">
<div class="wrapper">
<div class="page-header">

</div>

<div class="content-i">
<div class="content-box"><div class="row">
  <div class="col-lg-12">
    <div class="element-wrapper">
      <h6 class="element-header">
        <a action="back" href="javascript: window.history.back();" class="btn btn-sm btn-secondary">
          <i class="fa fa-backward"> </i><span> &nbsp; Back</span>
        </a>
        &ensp;Microchips - Form
      </h6>
      <div class="element-box">
        <form action="format" method="POST">
        @csrf          
          <div class="row">
            <div class="col-sm-6">
              <div class="form-group">
                <label for=""> Valid Date<span class="req">*</span></label><input class="form-control" placeholder="" type="date" id="valid_date" name="valid_date">
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label for="">LOT #<span class="req">*</span></label><input class="form-control" placeholder="LOT" type="lot" id="lot" name="lot">
              </div>
            </div>
          </div>

          <div class="control-group">
            <label class="control-label">Microchip(s)<span class="req">*</span> :</label>
            <div class="controls">
              <textarea class="auto span11 validate[required]" name="microchip" id="microchip" cols="150" rows="5" style="overflow: hidden; word-wrap: break-word; resize: none;" placeholder="Eg: 900000000000009"></textarea>
              <br />
              <p id="demo"></p>
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