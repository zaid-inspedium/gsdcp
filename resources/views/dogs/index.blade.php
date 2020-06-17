@extends('layouts.master')
<style type="text/css">
.pointer {cursor: pointer;}
</style>
<link href="https://cdn.jsdelivr.net/gh/xxjapp/xdialog@3/xdialog.min.css" rel="stylesheet"/>
<link data-require="sweet-alert@*" data-semver="0.4.2" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
@section('content')

<div id="content">
<div class="wrapper">
<div class="page-header">
<h5 class="widget-name">
Dogs </h5>
</div>

<div class="content-i">
            <div class="content-box">
              <div class="element-wrapper">
                <h6 class="element-header">
                  Dogs
                </h6>
                <div class="element-box">
                  <h5 class="form-header">
                    Dogs - List
                  </h5>
                  <a href="{{ route('Dog.create') }}" class="btn btn-lg btn-success">
                   <i class="fa fa-plus-circle"> New</i>
                  </a>
                  <a href="{{ url('/DNAResults') }}" class="btn btn-lg btn-secondary">
                    <i class="fa fa-share-square-o"> DNA Result</i>
                   </a>
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
                  <div class="table-responsive">
                    <table id="dataTable1" width="100%" class="table table-striped table-bordered table-lightfont">
                      <thead>
                        <tr>
                          <th>S #</th>
                          <th>Dog Name</th>
                          <th>Sex</th>
                          <th>Microchip</th>
                          <th>KP</th>
                          <th>
                            <select id="breed_survey" name="search[breed_survey]">
                              <option value="">- Select Breed Survey -</option>
                               <option value="Proven">Done</option>
                               <option value="Stored">Not Done</option>
                            </select>
                          </th>
                          <th>
                            <select id="DNA_status" name="search[DNA_status]">
                              <option value="">- Select DNA Status -</option>
                               <option value="">Proven</option>
                               <option value="">Stored</option>
                               <option value="">Repeat</option>
                               <option value="">Applied For</option>
                               <option value="">Not Available</option>
                               <option value="">Not Proven</option>
                            </select>
                          </th>
                          <th>Status</th>
                          <th>Owners</th>
                          <th>Owener Info</th>
                          <th>Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                         $i = 1;
                        ?>
                        @foreach ($total_dogs as $dogs)
                          <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ $dogs->dog_name }}</td>
                            <td>{{ $dogs->sex }}</td>
                            <td>{{ $dogs->microchip }}</td>
                            <td>{{ $dogs->KP }}</td>
                            <td style="text-align:center">
                              <span class="btn btn-danger" href="#"><i class="fa fa-times"></i></span>
                            </td>
                            <td>{{ $dogs->DNA_status }}</td>
                            <td><span class="badge badge-success">{{ $dogs->status }}</span></td>
                            <td>{{ $dogs->microchip }}</td>
                            <td>{{ $created=date('d-m-Y h:i:s', strtotime($dogs->created_at)) }}</td>

                            <td>
                              <div class="row-actions">
                              <div class="btn-group" role="group" aria-label="Basic example">
                              <a href="{{ route('Dog.edit',$dogs->id) }}" data-toggle="tooltip" data-placement="top"
                                  title="Edit"><i class="os-icon os-icon-ui-49"></i></a>
                              <a href="{{ route('Dog.show',$dogs->id) }}" data-toggle="tooltip" data-placement="top"
                                  title="View"><i class="fa fa-eye"></i></a>
                              <a href="{{ URL::to('/view_pedigree',$dogs->id) }}" data-toggle="tooltip" data-placement="top"
                              title="View Pedigree"><i class="fa fa-bar-chart"></i></a>
                              </div>
                              <div class="btn-group" role="group" aria-label="Basic example">
                              <a href="{{ URL::to('/view_progeny',$dogs->id) }}" data-toggle="tooltip" data-placement="top"
                              title="View Progeny"><i class="fa fa-github"></i></a>
                              <a onclick="test({{$dogs->id}})" data-toggle="tooltip" data-placement="top"
                              title="Print"><i class="fa fa-print"></i></a>
                              <a class="danger pointer" onclick="deleteData({{$dogs->id}})" type="submit" data-id="{{$dogs->id}}" data-toggle="tooltip" data-placement="top"
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
<script src="https://cdn.jsdelivr.net/gh/xxjapp/xdialog@3/xdialog.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script>
    // document.getElementById('test').addEventListener('click', test);

    function test(id) {
      xdialog.confirm('Select page type', function() {
        // console.info('Done!');
        window.open('/print_pedigree_front'+'/'+id, '_blank');
      }, {
        style: 'width:420px;font-size:0.8rem;',
        buttons: {
          ok: 'front page',
          cancel: 'back page'
        },
        oncancel: function() {
          window.open('/print_pedigree_back'+'/'+id, '_blank');
          // console.warn('Cancelled!');
        }
      });
    }

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
                  url : "{{ url('/DogStatusUpdate')}}" + '/' + id,
                    type : "GET",
                    data : {'_method' : 'PUT'},
                    success: function(data){
                        swal("Done! Record successfully deleted!", {
                        icon: "success",
                        }).then(function() {
                            window.location = "Dog";
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