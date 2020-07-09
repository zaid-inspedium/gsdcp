@extends('layouts.master')
<style type="text/css">
.pointer {cursor: pointer;}
</style>
<link data-require="sweet-alert@*" data-semver="0.4.2" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
@section('content')

<div id="content">
<div class="wrapper">
<div class="page-header">
</div>

<div class="content-i">
            <div class="content-box">
              <div class="element-wrapper">   
                <div class="element-box">
                  <h5 class="form-header">
                    Stud Certificate - List
                    <div style="float: right; position: inherit;">
                      <a href="{{ route('StudCertificates.create') }}" class="btn btn-lg btn-success">
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
                  <div class="table-responsive">
                    <form action="{{ URL::to('/StudCertificates/search') }}" method="POST" id="formValidate">
                    @csrf
                    <table id="dataTable1" width="100%" class="table table-sm table-striped table-bordered table-lightfont">
                      <thead>
                        <tr>
                          <th></th>
                          <th><input type="text" class="form-control" name="sire_name"></th>
                          <th><input type="text" class="form-control"  name="dam_name"></th>
                          <th><input type="text" class="form-control" name="mating_date"></th>
                          <th><input type="text" class="form-control" name="created_at"></th>
                          <th><input type="text" class="form-control" name="created_by"></th>
                          <th>
                            <select id="status" name="status">
                              <option value="">- Select Status -</option>
                              <option>Used</option>
                              <option>Unused</option>
                              <option>Pending</option>
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
                          <th class="text-primary">S.no</th>
                          <th class="text-primary">Sire</th>
                          <th class="text-primary">Dam</th>
                          <th class="text-primary">Mating Date</th>
                          <th class="text-primary">Created</th>
                          <th class="text-primary">Created By</th>
                          <th class="text-primary">Status</th>
                          <th class="text-primary">Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                         $i = 1;
                        ?>
                      @foreach ($certificates as $key => $cert)
                          <tr>
                            <td>{{ $i++ }}</td>
                            <td>
                              <a href="{{ route('Dog.show',$cert->sire_dog->id) }}">{{ $cert->sire_dog->dog_name ?? $cert->sireName }}</a>
                            </td>
                            <td>
                              <a href="{{ route('Dog.show',$cert->dam_dog->id) }}">{{ $cert->dam_dog->dog_name ?? $cert->damName }}</a>
                            </td>
                            <td>{{ date('d-m-Y', strtotime($cert->mating_date)) }}</td>
                            <td>{{ date('d-m-Y h:i:s', strtotime($cert->created_at)) }}</td>
                            <td>
                              <a href="#">{{ $cert->user->first_name.' '.$cert->user->last_name ?? $cert->Created_BY }}</a>
                            </td>
                            <td><span class="badge badge-secondary">{{ $cert->status }}</span></td>
                            <td class="row-actions">
                              <a href="{{ route('StudCertificates.show',$cert->id) }}" data-toggle="tooltip" data-placement="top"
                                  title="View"><i class="fa fa-eye"></i></a>
                              <a class="danger pointer" onclick="deleteData({{$cert->id}})" type="submit" data-id="{{$cert->id}}" data-toggle="tooltip" data-placement="top"
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
                  url : "{{ url('/StudCertificatesStatusUpdate')}}" + '/' + id,
                    type : "GET",
                    data : {'_method' : 'PUT'},
                    success: function(data){
                        swal("Done! Record successfully deleted!", {
                        icon: "success",
                        }).then(function() {
                            window.location = "StudCertificates";
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