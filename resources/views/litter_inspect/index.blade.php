@extends('layouts.master')

@section('content')
<div id="content">
<div class="wrapper">

<div class="content-i">
            <div class="content-box">
              <div class="element-wrapper">
                <h6 class="element-header">
                  Litter Inspection
                </h6>
                <div class="element-box">
                  <a href="{{ route('LitterInspections.create') }}" class="btn btn-lg btn-success">
         <i class="fa fa-plus-circle">New</i>
        </a>
        <br>
        <br>
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
                    <table id="dataTable1" width="100%" class="table table-striped table-lightfont">
                      <thead>
                        <tr>
                          <th>Breeder</th>
                          <th>Sire</th>
                          <th>Dam</th>
                          <th>City</th>
                          <th>Group Breed Warden</th>
                          <th>Status</th>
                          <th>Created</th>
                          <th>Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        
                        @foreach ($litter_inspect as $key => $inspect)
                        <tr>
                          <td>{{ $inspect->breeder->first_name }}</td>
                          <td>{{ $inspect->sire_dog->dog_name }}</td>
                          <td>{{ $inspect->dam_dog->dog_name }}</td>
                          <td>{{ $inspect->litter_city->city }}</td>
                          <td></td>
                          @if($inspect->status == 1)
                          <td>Pending</td>
                          @elseif($inspect->status == 2)
                          <td>Approved</td>
                          @elseif($inspect->status == 3)
                          <td>Expired</td>
                          @elseif($inspect->status == 4)
                          <td>Rejected</td>
                          @endif
                          <td>{{$inspect->created_at}}</td>
                        
                          <td>
                          <a href="{{ route('LitterInspections.edit',$inspect->id) }}" data-toggle="tooltip" data-placement="top"
                          title="Edit"><i class="os-icon os-icon-ui-49"></i></a>
                          {!! Form::open(['method' => 'DELETE','route' => ['LitterInspections.destroy', $inspect->id],'style'=>'display:inline']) !!}
                          {{ Form::button('<i class="os-icon os-icon-ui-15"></i>', ['type' => 'submit', 'data-toggle' => 'tooltip', 'data-placement' => 'top', 'title' => 'Delete'] )  }}
                          {!! Form::close() !!}
                          </td>
                        </tr>
                        @endforeach
                        {{ $litter_inspect->links() }}
                        </tbody>
                      </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>


@endsection