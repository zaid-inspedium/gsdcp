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
        {!! Form::open(array('route' => ['microchips.update', $microchip->id],'method'=>'PATCH')) !!}
        @csrf
        @method('PUT')
        <input type="hidden" id="idd" name="idd" value="{{$microchip->id}}"/>
          <div class="row">
            <div class="col-sm-6">
              <div class="form-group">
                <label for=""> Valid Date<span class="req">*</span></label>
                <div class="date-input">
                  <input class="single-daterange form-control" placeholder="" type="text" id="valid_date" value="{{ date('m/d/Y', strtotime($microchip->valid_date)) }}" name="valid_date">
                </div>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label for="">LOT #<span class="req">*</span></label><input class="form-control" placeholder="LOT" type="lot" id="lot" value="{{ $microchip->LOT }}" name="lot">
              </div>
            </div>
          </div>

          <div class="control-group">
<label class="control-label">Microchip(s)<span class="req">*</span> :</label>
<div class="controls">
<textarea class="auto span11 validate[required]" name="microchip" id="microchip" cols="150" rows="5" style="overflow: hidden; word-wrap: break-word; resize: none;" placeholder="Eg: 900000000000009 or Comma separated like: 900000000000009,900000000000010">{{ $microchip->microchip }}</textarea>
<br />
<small></small>
</div>
</div>
          <div class="form-buttons-w">
            <button class="btn btn-primary" type="submit"> Submit</button>
          </div>
{!! Form::close() !!}
      </div>
    </div>
  </div>


@endsection