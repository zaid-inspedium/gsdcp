@extends('layouts.master')

@section('content')

<div id="content">
<div class="wrapper">
<div class="page-header">

<div class="content-i">
            <div class="content-box">
              @if ($message = Session::get('success'))
                <div class="alert alert-success">
                  <p>{{ $message }}</p>
                </div>
              @endif

              <div class="element-wrapper">
                <h6 class="element-header">
                  Users/Members
                </h6>
                <div class="element-box">
                  <h5 class="form-header">
                    Users/Members - List
                    <div style="float: right; position: inherit;">
                      <a href="{{ route('users.create') }}" class="btn btn-lg btn-success">
                        <i class="fa fa-plus-circle"> New</i>
                       </a>
                    </div>
                  </h5>

                  <div class="table-responsive">
                    <table id="dataTable1" width="100%" class="table table-striped table-lightfont">
                      <thead>
                        <tr>
                          <th>S.No</th>
                          <th>User Type/Role</th>
                          <th>Full Name</th>
                          <th>Membership No.</th>
                          <th>Email</th>
                          <th>Phone</th>
                          <th>City</th>
                          <th>Status</th>
                          <th>Created</th>
                          <th>Actions</th>
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
                        <td>{{ $user->first_name.' '.$user->last_name }}</td>
                        <td>{{ $user->membership_no }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->phone }}</td>
                        <td>{{ $user->user_city->city }}</td>
                        <td>{{ $user->status }}</td>
                        <td>{{ $user->created_at }}</td>
                        <td>
                          <a class="btn btn-info" href="{{ route('users.show',$user->id) }}">Show</a>
                          <a class="btn btn-info" href="Member-Files/{{ $user->id }}">Members Files</a>
                          <a class="btn btn-info" href="Member-Account/{{ $user->id }}">Members Account</a>
                          <a class="btn btn-primary" href="{{ route('users.edit',$user->id) }}">Edit</a>
                           {!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $user->id],'style'=>'display:inline']) !!}
                               {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                           {!! Form::close() !!}
                       </td>
                     
                        </tr>
                        @endforeach
                       
                        </tbody>
                      </table>
                      {!! $data->render() !!}
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>


@endsection