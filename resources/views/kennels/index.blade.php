@extends('layouts.master')
<style type="text/css">
.pointer {cursor: pointer;}
</style>
<link data-require="sweet-alert@*" data-semver="0.4.2" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
@section('content')
  <div class="content-i">
    <div class="content-box">
      <div class="element-wrapper">
        <h6 class="element-header">
          Kennels
        </h6>
        <div class="element-box">
          <h5 class="form-header">
           Kennels - List 
            <div style="float: right; position: inherit;">
              <a href="{{ route('Kennels.create') }}" class="btn btn-lg btn-success">
                <i class="fa fa-plus-circle"> New</i>
              </a>
            </div>
          </h5>
        @if ($message = Session::get('success'))
        <p></p>
          <div class="alert alert-success" id="msg">
              <p>{{ $message }}</p>
          </div>
        @elseif ($message = Session::get('danger'))
          <div class="alert alert-danger" id="msg">
              <p>{{ $message }}</p>
          </div>
        @endif
          <div class="form-desc">
            <!-- <a href="https://www.datatables.net/" target="_blank">Learn More about DataTables</a> -->
          </div>
          <div class="table-responsive">
            <form action="{{ URL::to('/Kennels/search') }}" method="POST" id="formValidate">
            @csrf
            <table id="dataTable1" width="100%" class="table table-sm table-striped table-bordered table-lightfont">
            	<thead>
                <tr>
                  <th></th>
                  <th><input type="text" class="form-control" name="kennel_name"></th>
                  <th><input type="text" class="form-control"  name="owners"></th>
                  <th><input type="text" class="form-control" name="email"></th>
                  <th><input type="text" class="form-control" name="phone"></th>
                  <th><input type="text" class="form-control" name="city"></th>
                  <th><input type="text" class="form-control" name="status"></th>
                  <th>
                    <button class="btn btn-warning" type="submit">
                      <i class="fa fa-search"> </i><span> Search</span>
                    </button>
                  </th>
                </tr>
                </form>
            		<tr>
            			<th class="text-primary" style="width:  4.33%">S.no</th>
            			<th class="text-primary">Kennel Name</th>
                  <th class="text-primary">Owner</th>
                  <th class="text-primary">Email</th>
                  <th class="text-primary">Phone</th>
                  <th class="text-primary">City</th>
                  <th class="text-primary">Status</th>
                  <th class="text-primary">Actions</th>
            		</tr>
            	</thead>
            	
            	<tbody>
            		<?php
      					 $i = 1;
      					?>
					    @foreach ($kennels as $key => $ken)
                	<tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $ken->kennel_name }}</td>
                    <td>
                      {{ $ken->owners->first_name.' '.$ken->owners->last_name ?? $ken->OwnerName }}
                    </td>
                    <td>{{ $ken->owners->email ?? $ken->email }}</td>
                    <td>{{ $ken->owners->phone ?? $ken->phone }}</td>
                    <td>{{ $ken->owners->user_city->city ?? $ken->city }}</td>
                    <td>
                      
                    <?php
                      if(isset($ken->owners->status) == 'Active' || $ken->status == 'Active') {
                    ?>
                        <span class="badge badge-success">{{ $ken->status ?? $ken->owners->status }}</span>
                    <?php
                      }
                      elseif(isset($ken->owners->status) == 'Inactive' || $ken->status == 'Inactive') {
                    ?>
                        <span class="badge badge-warning">{{ $ken->status ?? $ken->owners->status }}</span>
                    <?php 
                      }
                      else {
                    ?>
                        <span class="badge badge-danger">{{ $ken->status ?? $ken->owners->status }}</span>
                    <?php 
                      }
                    ?>
                      
                    </td>
                    <td class="row-actions">
                      <a href="{{ route('Kennels.edit',$ken->id) }}" data-toggle="tooltip" data-placement="top"
                          title="Edit"><i class="os-icon os-icon-ui-49"></i></a>
                      <a class="danger pointer" onclick="deleteData({{$ken->id}})" type="submit" data-id="{{$ken->id}}" data-toggle="tooltip" data-placement="top"
                          title="Delete"><i class="os-icon os-icon-ui-15"></i></a>

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
                    url : "{{ url('/KennelStatusUpdate')}}" + '/' + id,
                    type : "GET",
                    data : {'_method' : 'PUT'},
                    success: function(data){
                        swal("Done! Record successfully deleted!", {
                        icon: "success",
                        }).then(function() {
                            window.location = "Kennels";
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
  </script>

@endsection