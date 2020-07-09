@extends('layouts.master')
<style type="text/css">
.pointer {cursor: pointer;}
</style>
<link href="https://cdn.jsdelivr.net/gh/xxjapp/xdialog@3/xdialog.min.css" rel="stylesheet"/>
<link data-require="sweet-alert@*" data-semver="0.4.2" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
@section('content')

<div id="content">
<div class="wrapper">
<div class="content-i">
            <div class="content-box">
              <div class="element-wrapper">
                <h6 class="element-header">
                  Dogs
                </h6>
                <div class="element-box">
                  <h5 class="form-header">
                    Dogs - List
                    <div style="float: right; padding-top:  -30px;">
                      <a href="{{ url('/DNAResults') }}" class="btn btn-lg btn-secondary">
                        <i class="fa fa-share-square-o"> DNA Result</i>
                      </a>
                      <a href="{{ route('Dog.create') }}" class="btn btn-lg btn-success">
                       <i class="fa fa-plus-circle"> New</i>
                      </a>
                    </div>
                  </h5>
                  
                  @if ($message = Session::get('success'))
                    <div class="alert alert-success" id="msg">
                        <p>{{ $message }}</p>
                    </div>
                  @elseif ($message = Session::get('danger'))
                    <div class="alert alert-danger" id="msg">
                        <p>{{ $message }}</p>
                    </div>
                  @endif
                  <div class="table-responsive">
                    <form action="{{ URL::to('/Dog/search') }}" method="POST" id="formValidate">
                    @csrf
                    <table id="dataTable1" width="100%" class="table table-sm table-hover table-bordered table-lightfont">
                      <thead class="thead-light">
                        <tr>
                          <th></th>
                          <th><input type="text" class="form-control"  name="dog_name"></th>
                          <th>
                            <select id="sex" name="sex">
                              <option value="">- Select Sex -</option>
                              <option value="Female">Female</option>
                              <option value="Male">Male</option>
                            </select>
                          </th>
                          <th><input type="text" class="form-control" name="microchip"></th>
                          <th><input type="text" class="form-control" name="KP"></th>
                          <th>
                            <select id="breed_survey_done" name="breed_survey_done">
                              <option value="">- Select Breed Survey -</option>
                              <option value="1">Done</option>
                              <option value="0">Not Done</option>
                            </select>
                          </th>
                          <th>
                            <select name="DNA_status" id="DNA_status">
                              <option value="">- Select One -</option>
                              <option>Proven</option>
                              <option>Stored</option>
                              <option>Repeat</option>
                              <option>Applied For</option>
                              <option>Not Availabe</option>
                              <option>Not Proven</option>
                            </select>
                          </th>
                          <th>
                            <select id="status" name="status">
                              <option value="">- Select Status -</option>
                              <option>Active</option>
                              <option>Inactive</option>
                              <option>Deleted</option>
                            </select>
                          </th>
                          <th><input type="text" class="form-control" name="owners"></th>
                          <th><input type="text" class="form-control" name="owner_info" style="width:  100px"></th>
                          <th>
                            <button class="btn btn-warning" type="submit">
                              <i class="fa fa-search"> </i><span> Search</span>
                            </button>
                          </th>
                        </tr>
                    </form>
                        <tr>
                          <th class="text-primary">S.no</th>
                          <th class="text-primary">Dog Name</th>
                          <th class="text-primary">Sex</th>
                          <th class="text-primary">Microchip</th>
                          <th class="text-primary">KP</th>
                          <th class="text-primary">Breed Survey</th>
                          <th class="text-primary">DNA Status</th>
                          <th class="text-primary">Status</th>
                          <th class="text-primary">Owners</th>
                          <th class="text-primary" style="width:  12.33%">Owner Info</th>
                          <th class="text-primary">Actions</th>
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
                              @if($dogs->breed_survey_done == '0')
                                <span class="btn btn-danger"><i class="fa fa-times"></i></span>
                              @else
                                <span class="btn btn-secondary">{{ $dogs->survey_date_from.' - '.$dogs->survey_date_to }}</span><br>
                                <span class="btn btn-success"><i class="fa fa-check"></i></span>
                              @endif
                            </td>
                            <td>{{ $dogs->DNA_status }}</td>
                            <td>
                              @if($dogs->status == 'Active')
                                <span class="badge badge-success">{{ $dogs->status }}</span>
                              @elseif($dogs->status == 'Inactive')
                                <span class="badge badge-warning">{{ $dogs->status }}</span>
                              @else
                                <span class="badge badge-danger">{{ $dogs->status }}</span>
                              @endif
                            </td>
                            <td>
                              <?php
                              global $owner_name;
                              global $owner_info;
                              if(isset($dogs->dog_owners[0])){
                                  if($dogs->dog_owners[0]->owner_id == NULL){
                                    $owner_name = "";
                                    $owner_info = "";
                                  }else{
                                    $owner_name = $dogs->dog_owners[0]->owners->first_name.' '.$dogs->dog_owners[0]->owners->last_name;
                                    $owner_info = $dogs->dog_owners[0]->owners->user_city->city.' '.$dogs->dog_owners[0]->owners->phone;
                                  }
                                }
                              ?>
                              {{ $dogs->OwnerName ?? $owner_name }}
                            </td>
                            <td>{{ $dogs->OwnerInfo ?? $owner_info }}</td>
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