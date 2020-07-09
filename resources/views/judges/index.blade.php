@extends('layouts.master')
<link data-require="sweet-alert@*" data-semver="0.4.2" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
@section('content')

<div id="content">
<div class="wrapper">
<div class="page-header">
</div>

<div class="content-i">
            <div class="content-box">
              <div class="element-wrapper">
                <h6 class="element-header">
                  Judges
                </h6>
                <div class="element-box">
                  <h5 class="form-header">
                    Judges - List
                    <div style="float: right; position: inherit;">
                      <a href="{{ route('judges.create') }}" class="btn btn-lg btn-success">
                       <i class="fa fa-plus-circle"> New</i>
                      </a>
                    </div>
                  </h5>

                  <p></p>
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
                    <table id="dataTable1" width="100%" class="table table-sm table-hover table-bordered table-lightfont">
                      <thead>
                        <tr>
                          <th class="text-primary" style="width:  2.33%">S.no</th>
                          <th class="text-primary">Judge's Name</th>
                          <th class="text-primary">Status</th>
                          <th class="text-primary">Created</th>
                          <th class="text-primary">Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                         $i = 1;
                        ?>
                        @foreach ($judge as $j)
                          <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ $j->full_name }}</td>
                            @if($j->status == 1)
                            <td><span class="badge badge-success">{{ 'Active' }}</span></td>
                            @else
                            <td><span class="badge badge-warning">{{ 'Inactive' }}</span></td>
                            @endif
                            <td>{{ $created=date('d-m-Y h:i:s', strtotime($j->created_at)) }}</td>

                            <td>
                              <div class="row-actions">
                              <div class="btn-group" role="group" aria-label="Basic example">
                              <a href="{{ route('judges.edit',$j->id) }}" data-toggle="tooltip" data-placement="top"
                                  title="Edit"><i class="os-icon os-icon-ui-49"></i></a>
                              <a href="{{ route('judges.show',$j->id) }}" data-toggle="tooltip" data-placement="top"
                                  title="View"><i class="fa fa-eye"></i></a>
                              <a class="danger pointer" onclick="deleteData({{$j->id}})" type="submit" data-id="{{$j->id}}" data-toggle="tooltip" data-placement="top"
                                  title="Delete"><i class="os-icon os-icon-ui-15"></i></a>
                              </div>
                              </div>
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
                  url : "{{ url('/judgesStatusUpdate')}}" + '/' + id,
                    type : "GET",
                    data : {'_method' : 'PUT'},
                    success: function(data){
                        swal("Done! Record successfully deleted!", {
                        icon: "success",
                        }).then(function() {
                            window.location = "judges";
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