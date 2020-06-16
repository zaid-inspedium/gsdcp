@extends('layouts.master')

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
                    <table id="dataTable1" width="100%" class="table table-striped table-lightfont">
                      <thead>
                        <tr>
                          <th>S.No</th>
                          <th>Sire</th>
                          <th>Dam</th>
                          <th>Mating Date</th>
                          <th>Created</th>
                          <th>Created By</th>
                          <th>Status</th>
                          <th>Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                         $i = 1;
                        ?>
                      @foreach ($certificates as $key => $cert)
                          <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ $cert->sire_dog->dog_name }}</td>
                            <td>{{ $cert->dam_dog->dog_name }}</td>
                            <td>{{ $cert->mating_date }}</td>
                            <td>{{ date('d-m-Y', strtotime($cert->created)) }}</td>
                            <td>{{ $cert->user->first_name }}</td>
                            <td><span class="badge badge-secondary">{{ $cert->status }}</span></td>
                            <td class="row-actions">
                              <a href="{{ route('StudCertificates.edit',$cert->id) }}" data-toggle="tooltip" data-placement="top"
                                  title="Edit"><i class="os-icon os-icon-ui-49"></i></a>
        
        
                                  {!! Form::open(['method' => 'DELETE','route' => ['StudCertificates.destroy', $cert->id],'style'=>'display:inline']) !!}
                                  {{ Form::button('<i class="os-icon os-icon-ui-15"></i>', ['type' => 'submit', 'data-toggle' => 'tooltip', 'data-placement' => 'top', 'title' => 'Delete'] )  }}
                                  {!! Form::close() !!}
        
                            
                            </td>
                          </tr>
                        @endforeach 

                        {{ $certificates->links() }}
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