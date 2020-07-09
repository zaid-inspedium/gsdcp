@extends('layouts.master')

@section('content')
      <style>
#memimg {
  width:100%;
  height:auto;
}
      </style>
<div class="content-panel-toggler">
            <i class="os-icon os-icon-grid-squares-22"></i><span>Sidebar</span>
          </div>
          <div class="content-i">
            <div class="content-box"><div class="row">
  
  <div class="col-sm-12">
    <div class="element-wrapper">
      <div class="element-box">
        
        <a href="../../Member-Files/{{ $file[0]->user_id }}" class="btn btn-lg btn-danger"> Back</a>
  <img src ="{{ URL::asset("members/member_files/{$file[0]->file_name}")}}" id="memimg"/>      
      </div>
    </div>
  </div>
</div>





@endsection
