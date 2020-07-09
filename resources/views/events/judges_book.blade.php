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
        <h6 class="element-header">
          <a action="back" href="javascript: window.history.back();" class="btn btn-sm btn-secondary">
            <i class="fa fa-backward"> </i><span> &nbsp; Back</span>
          </a>
          &ensp;Events
        </h6>
        <div class="element-box">
          <h5 class="form-header">
           Judges Book - List 
          </h5>

          <div class="form-desc">
            <!-- <a href="https://www.datatables.net/" target="_blank">Learn More about DataTables</a> -->
          </div>
          <div class="table-responsive">
            <form action="{{ URL::to('/Event/search') }}" method="POST" id="formValidate">
            @csrf
            <table id="dataTable1" width="100%" class="table table-sm table-hover table-bordered table-lightfont">
            	<thead>
                <tr>
                  <th></th>
                  <th style="width:  4.33%"><input type="text" class="form-control" name="catalog_id"></th>
                  <th><input type="text" class="form-control"  name="dog_name"></th>
                  <th><input type="text" class="form-control" name="class"></th>
                  <th><input type="text" class="form-control" name="critique"></th>
                  <th><input type="text" class="form-control" name="result"></th>
                  <th>
                    <button class="btn btn-warning" type="submit">
                      <i class="fa fa-search"> </i><span> Search</span>
                    </button>
                  </th>
                </tr>
                </form>
            		<tr>
            			<th class="text-primary" style="width:  4.33%">S.no</th>
            			<th class="text-primary" style="width:  4.33%">Catalog ID</th>
                  <th class="text-primary">Dog Name</th>
                  <th class="text-primary">Class</th>
                  <th class="text-primary">Critique</th>
                  <th class="text-primary">Result</th>
                  <th class="text-primary">Actions</th>
            		</tr>
            	</thead>
            	
            	<tbody>
            		<?php
      					 $i = 1;
      					?>
					    @foreach ($total_dog_class as $key => $dog_class)
                	<tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $dog_class->catalog_id }}</td>
                    <td><strong>{{ $dog_class->dog_show->dog_name }}</strong></td>
                    <td>{{ $dog_class->class }}</td>
                    <td>{{ $dog_class->critique }}</td>
                    <td>{{ $dog_class->result }}</td>
                    <td class="row-actions">
                      <a class="text-warning" href="{{ route('Event.edit',$dog_class->id) }}" data-toggle="tooltip" data-placement="top"
                          title="Show Certificate"><i class="fa fa-trophy"></i></a>
                      <a href="{{ URL::to('/show_card',$dog_class->id) }}" target="_blank" data-toggle="tooltip" data-placement="top"
                          title="Print Card"><i class="fa fa-credit-card"></i></a>
                    </td>
                	</tr>
              @endforeach 
              
            	</tbody>
              
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script>
    function deleteData(id){
        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this record!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    url : "{{ url('/EventStatusUpdate')}}" + '/' + id,
                    type : "GET",
                    data : {'_method' : 'PUT'},
                    success: function(data){
                        swal("Done! Record successfully deleted!", {
                        icon: "success",
                        }).then(function() {
                            window.location = "Event";
                        });
                    },
                    error : function(){
                        swal({
                            title: 'Opps...',
                            text : data.message,
                            type : 'error',
                            timer : '1500'
                        })
                    }
                })
            } else {
            swal("Your record is safe!");
            }
        });
      }

// function ChangeStatus(this1) {
//   this1.innerHTML='<i class="fa fa-check"></i>';
// }
    
  </script>

@endsection