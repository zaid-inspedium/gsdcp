@extends('layouts.master')

@section('content')
<div id="content">
<div class="wrapper">
<div class="page-header">
</div>

<div class="content-i">
            <div class="content-box">
              <div class="element-wrapper">
                <h6 class="element-header">
                  Litters Registered
                </h6>
                <div class="element-box">
                  <a href="{{ route('Litters.create') }}" class="btn btn-lg btn-success">
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
                          <th>S.No</th>
                          <th>Owner</th>
                          <th>Dob</th>
                          <th>Sire</th>
                          <th>Dam</th>
                          <th>Created</th>
                          <th>Status</th>
                          <th>Group Breed Warden</th>
                          <th>Pedigree Status</th>
                          <th>Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $i = 1;
                        ?>
                        @foreach ($litters as $key => $litter)
                        <tr>
                          <td>{{ $i++ }}</td>
                          <td>{{ $litter->litter_owner->first_name }}</td>
                          <td>{{ $litter->dob }}</td>
                          <td>{{ $litter->litter_sire->dog_name }}</td>
                          <td>{{ $litter->litter_dam->dog_name }}</td>
                          <td>{{ $litter->created_at }}</td>
                          <td>{{ $litter->status }}</td>
                          <td>{{ $litter->litter_created_by->first_name }}</td>
                          <td>{{ $litter->no_of_puppies }}</td>
                          <td>
                            @if($litter->status == 'Approved')
                               <a href="{{ route('Litters.show',$litter->id) }}" title="View"><i class="os-icon os-icon-ui-37"></i></a>
                               <a href="Assign-Microships/{{ $litter->id }}"><i class="os-icon os-icon-ui-37"></i></a>
                            @else
                              <a href="{{ route('Litters.edit',$litter->id) }}"><i class="os-icon os-icon-ui-49"></i></a>
                              <a href="{{ route('Litters.show',$litter->id) }}"><i class="os-icon os-icon-ui-37"></i></a>
                              
                            @endif
                          </td>
                        </tr>
                        @endforeach
                        {{ $litters->links() }}
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