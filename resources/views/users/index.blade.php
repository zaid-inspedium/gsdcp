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

<div class="content-i">
            <div class="content-box">
              

              <div class="element-wrapper">
                <h6 class="element-header">
                  Users/Members
                </h6>
                <div class="element-box">
                  <h5 class="form-header">
                    Users/Members - List
                    <div style="float: right; padding-top:  -30px;">
                      <a href="{{ route('users.create') }}" class="btn btn-lg btn-success">
                        <i class="fa fa-plus-circle"> New</i>
                      </a>
                    </div>
                  </h5>
                  @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                      <p>{{ $message }}</p>
                    </div>
                  @elseif ($message = Session::get('danger'))
                    <div class="alert alert-danger" id="msg">
                        <p>{{ $message }}</p>
                    </div>
                  @endif
                  <div class="table-responsive">
                    <form action="{{ URL::to('/users/search') }}" method="POST" id="formValidate">
                    @csrf
                    <table id="dataTable1" width="100%" class="table table-striped table-bordered table-lightfont table-sm" cellspacing="0">
                      <thead>
                        <tr>
                          <th></th>
                          <th><input type="text" class="form-control" name="user_type"></th>
                          <th><input type="text" class="form-control" name="username"></th>
                          <th><input type="text" class="form-control" name="membership_no"></th>
                          <th><input type="text" class="form-control" name="email"></th>
                          <th><input type="text" class="form-control" name="phone"></th>
                          <th><input type="text" class="form-control" name="city"></th>
                          <th>
                            <select id="status" name="status">
                              <option value="">- Select Status -</option>
                              <option>Active</option>
                              <option>Inactive</option>
                              <option>Deleted</option>
                            </select>
                          </th>
                          <th><input type="text" class="form-control" name="created_at"></th>
                          <th>
                            <button class="btn btn-warning" type="submit">
                              <i class="fa fa-search"> </i><span> Search</span>
                            </button>
                          </th>
                        </tr>
                      </form>
                        <tr>
                          <th class="text-primary">S.no</th>
                          <th class="text-primary">User Type/Role</th>
                          <th class="text-primary">Full Name</th>
                          <th class="text-primary">Membership No.</th>
                          <th class="text-primary">Email</th>
                          <th class="text-primary">Phone</th>
                          <th class="text-primary">City</th>
                          <th class="text-primary">Status</th>
                          <th class="text-primary">Created</th>
                          <th class="text-primary">Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($data as $key => $user)
                        <tr>
                        <td>{{ ++$i }}</td>
                        <td>
                          @if(!empty($user->getRoleNames()))
                            @foreach($user->getRoleNames() as $v)
                               <label class="badge badge-success">{{ $v }}</label>
                            @endforeach
                          @endif
                        </td>
                        <td>{{ $user->first_name.' '.$user->last_name ?? $user->UserName }}</td>
                        <td>{{ $user->membership_no }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->phone }}</td>
                        <td>{{ $user->user_city->city ?? $user->city }}</td>
                        <td>
                          @if($user->status == 'Active')
                            <span class="badge badge-success">{{ $user->status }}</span>
                          @elseif($user->status == 'Inactive')
                            <span class="badge badge-warning">{{ $user->status }}</span>
                          @else
                            <span class="badge badge-danger">{{ $user->status }}</span>
                          @endif
                        </td>
                        <td>{{ $user->created_at }}</td>
                        <td>
                          <div class="row-actions">
                          <div class="btn-group" role="group" aria-label="Basic example">
                            <a href="{{ route('users.show',$user->id) }}" data-toggle="tooltip" data-placement="top"
                              title="View"><i class="fa fa-eye"></i></a>
                            <a href="Member-Files/{{ $user->id }}" data-toggle="tooltip" data-placement="top"
                              title="Members Files"><i class="fa fa-files-o"></i></a>
                            <a href="Member-Account/{{ $user->id }}" data-toggle="tooltip" data-placement="top"
                              title="Members Account"><i class="fa fa-money"></i></a>
                            </div>
                            <div class="btn-group" role="group" aria-label="Basic example">
                            <a href="{{ route('users.edit',$user->id) }}" data-toggle="tooltip" data-placement="top"
                              title="Edit"><i class="os-icon os-icon-ui-49"></i></a>
                            <a class="danger pointer" onclick="deleteData({{$user->id}})" type="submit" data-id="{{$user->id}}" data-toggle="tooltip" data-placement="top"
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
                  url : "{{ url('/userStatusUpdate')}}" + '/' + id,
                    type : "GET",
                    data : {'_method' : 'PUT'},
                    success: function(data){
                        swal("Done! Record successfully deleted!", {
                        icon: "success",
                        }).then(function() {
                            window.location = "users";
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