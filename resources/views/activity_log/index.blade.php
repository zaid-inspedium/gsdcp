@extends('layouts.master')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<style type="text/css">
.pointer {cursor: pointer;}
</style>
<link data-require="sweet-alert@*" data-semver="0.4.2" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
@section('content')
  <div class="content-i">
    <div class="content-box">
      <div class="element-wrapper">
        <div class="element-box">
          <h5 class="form-header">
           Activity Log - List 
          </h5>
          <div class="form-desc">
            <!-- <a href="https://www.datatables.net/" target="_blank">Learn More about DataTables</a> -->
          </div>
          <div class="table-responsive">
            
            <table id="dataTable1" width="100%" class="table table-sm table-striped table-bordered table-lightfont">
            	<thead>
            		<tr>
            			<th class="text-primary" style="width:  4.33%">S.no</th>
            			<th class="text-primary">User</th>
                  <th class="text-primary">Module</th>
                  <th class="text-primary">Activity Name</th>
                  <th class="text-primary">Description</th>
                  <th class="text-primary">Activity Datetime</th>
            		</tr>
            	</thead>
            	
            	<tbody>
            		<?php
      					 $i = 0;
      					?>
					    @foreach($activity as $act)
                	<tr>
                    <td>{{ ++$i}}</td>
                    <td>{{$act->Created_by->first_name}} {{$act->Created_by->last_name}}</td>
                    <td>{{$act->Modules->module_title}}</td>
                    <td>{{$act->activity_name}}</td>
                    <td>{{$act->description}}</td>
                    <td>{{$act->activity_datetime}}</td>
                	</tr>
              @endforeach
              
            	</tbody>
              
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection