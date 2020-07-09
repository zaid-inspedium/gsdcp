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
          Events
        </h6>
        <div class="element-box">
          <h5 class="form-header">
           Events - List 
            <div style="float: right; position: inherit;">
              <a href="{{ route('Event.create') }}" class="btn btn-lg btn-success">
                <i class="fa fa-plus-circle"> New</i>
              </a>
            </div>
          </h5>

        @if (count($errors) > 0)
          <div class="alert alert-danger">
              <strong>Whoops!</strong> There were some problems with your input.<br><br>
              <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
              </ul>
          </div>
        @endif

        @if ($message = Session::get('success'))
        <p></p>
          <div class="alert alert-success" id="msg">
              <p>{{ $message }}</p>
          </div>
        @elseif ($message = Session::get('danger'))
          <div class="alert alert-danger" id="error">
              <p>{{ $message }}</p>
          </div>
        @endif
          <div class="form-desc">
            <!-- <a href="https://www.datatables.net/" target="_blank">Learn More about DataTables</a> -->
          </div>
          <div class="table-responsive">
            <form action="{{ URL::to('/Event/search') }}" method="POST" id="formValidate">
            @csrf
            <table id="dataTable1" width="100%" class="table table-sm table-striped table-bordered table-lightfont">
            	<thead>
                <tr>
                  <th></th>
                  <th><input type="text" class="form-control" name="title"></th>
                  <th><input type="text" class="form-control"  name="start_date"></th>
                  <th><input type="text" class="form-control" name="end_date"></th>
                  <th><input type="text" class="form-control" name="last_date_of_entry"></th>
                  <th>
                    <select id="type" name="type">
                      <option value="">- Select Type -</option>
                      <option value="Show">Show</option>
                      <option value="Breed Survey">Breed Survey</option>
                    </select>
                  </th>
                  <th>
                    <select id="status" name="status">
                      <option value="">- Select Status -</option>
                      <option>Active</option>
                      <option>Inactive</option>
                      <option>Completed</option>
                    </select>
                  </th>
                  <th>
                    <button class="btn btn-warning" type="submit">
                      <i class="fa fa-search"> </i><span> Search</span>
                    </button>
                  </th>
                </tr>
                </form>
            		<tr>
            			<th class="text-primary" style="width:  4.33%">S.no</th>
            			<th class="text-primary">Title</th>
                  <th class="text-primary">Start Date</th>
                  <th class="text-primary">End Date</th>
                  <th class="text-primary">Last Date Of Entry</th>
                  <th class="text-primary">Type</th>
                  <th class="text-primary">Status</th>
                  <th class="text-primary">Actions</th>
            		</tr>
            	</thead>
            	
            	<tbody>
            		<?php
      					 $i = 1;
      					?>
					    @foreach ($total_events as $key => $event)
                	<tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $event->title }}</td>
                    <td>{{ date('d-m-Y', strtotime($event->start_date)) }}</td>
                    <td>{{ date('d-m-Y', strtotime($event->end_date)) }}</td>
                    <td>{{ date('d-m-Y', strtotime($event->last_date_of_entry)) }}</td>
                    <td>{{ $event->type }}</td>
                    <td>
                      @if($event->status == 'Active')
                        <span class="badge badge-success">{{ $event->status }}</span>
                      @elseif($event->status == 'Inactive')
                        <span class="badge badge-warning">{{ $event->status }}</span>
                      @else
                        <span class="badge badge-secondary">{{ $event->status }}</span>
                      @endif
                    </td>
                    <td class="row-actions">
                        <?php if($event->status=='Active') { ?>
                        <a href="{{ route('Event.edit',$event->id) }}" data-toggle="tooltip" data-placement="top"
                          title="Edit"><i class="os-icon os-icon-ui-49"></i></a>
                        <?php } else { ?>
                        <a href="{{ URL::to('/error_404') }}" data-toggle="tooltip" data-placement="top"
                          title="Edit"><i class="os-icon os-icon-ui-49"></i></a>
                        <?php } ?>
                        <?php if($event->status=='Active') { ?>
                        <a href="{{ URL::to('/entry_show',$event->id) }}" data-toggle="tooltip" data-placement="top"
                          title="Entry Show"><i class="fa fa-share"></i></a>
                        <?php } else { ?>
                        <a href="{{ URL::to('/error_404') }}" data-toggle="tooltip" data-placement="top"
                          title="Entry Show"><i class="fa fa-share"></i></a>
                        <?php } ?>
                      <a href="{{ URL::to('/ChangeStatus',$event->id) }}"
                        <?php if($event->status=='Active') { ?>
                          class="text-success" data-toggle="tooltip" data-placement="top"
                          title="Status"><i class="fa fa-check"></i>
                        <?php } else { ?>
                          class="danger" data-toggle="tooltip" data-placement="top"
                          title="Status"><i class="fa fa-power-off"></i>
                        <?php } ?>
                      </a>
                        <?php if($event->status=='Active') { ?>
                        <a href="{{ URL::to('/judges_book',$event->id) }}" data-toggle="tooltip" data-placement="top"
                          title="Judges Book"><i class="fa fa-book"></i></a>
                        <?php } else { ?>
                        <a href="{{ URL::to('/error_404') }}" data-toggle="tooltip" data-placement="top"
                          title="Judges Book"><i class="fa fa-book"></i></a>
                        <?php } ?>
                      <a class="danger" onclick="deleteData({{$event->id}})" type="submit" data-id="{{$event->id}}" data-toggle="tooltip" data-placement="top"
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