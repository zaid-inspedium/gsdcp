@extends('layouts.master')

@section('content')
<div id="content">
<div class="wrapper">

<div class="content-i">
            <div class="content-box">
              <div class="element-wrapper">
                <h6 class="element-header">
                  Litter Inspection Requests (At 7-8 Weeks)
                </h6>
                <div class="element-box">
                  <a href="{{ route('SecondLitterInspections.create') }}" class="btn btn-lg btn-success">
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
                          <th>S.no</th>
                          <th>Breeder</th>
                          <th>Sire</th>
                          <th>Dam</th>
                          <th>Dam Condition</th>
                          <th>Puppies Condition</th>
                          <th>Special Recommendation</th>
                          <th>Special Features</th>
                          <th>Status</th>
                          <th>Created on</th>
                          <th>Created by</th>
                          <th>Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $i = 1;
                        ?>
                        @foreach ($litter_inspect as $key => $inspect)
                        <tr>
                          <td>{{ $i++ }}</td>
                          <td>{{ $inspect->breeder->first_name }}</td>
                          <td>{{ $inspect->sire_dog->dog_name }}</td>
                          <td>{{ $inspect->dam_dog->dog_name }}</td>
                          <td>{{ $inspect->dam_condition }}</td>
                          <td>{{ $inspect->puppies_condition }}</td>
                          <td>{{ $inspect->special_recommendation }}</td>
                          <td>{{ $inspect->special_features }}</td>
                          @if($inspect->inspection_status == 2)
                                <td>Approved</td>
                              @elseif($inspect->inspection_status == 4)
                                <td>Rejected</td>
                              @elseif($inspect->inspection_status == 3)
                                <td>Expired</td>
                              @else
                                <td>Pending</td>
                            @endif
                            <td>{{ $inspect->created_at }}</td>
                            <td><?php if(isset($inspect->groupBreedWarden)){
                                echo ucfirst($inspect->groupBreedWarden->username);
                            } ?> </td>
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