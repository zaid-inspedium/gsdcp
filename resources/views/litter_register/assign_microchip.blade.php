@extends('layouts.master')

@section('content')
      <div class="content-i">
            <div class="content-box"><div class="row">
  <div class="col-lg-12">
    <div class="element-wrapper">
      <h6 class="element-header">
        Litter Registeration - Microchips Assign
      </h6>
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
      <div class="element-box">
          <div class="row">
            <div class="col-sm-6">
          <div class="form-group">
                <label><strong>Name Of Breeder:</strong></label> <span>{{ $litters->litter_owner->first_name }} {{ $litters->litter_owner->last_name }}</span>
          </div>
</div>
        <div class="col-sm-6">
          <div class="form-group">
            <label for=""><strong>Address:</strong></label> <span>{{ $litters->litter_owner->address }}</span>
          </div>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-6">
          <div class="form-group">
            <label for=""><strong>Phone #:</strong></label> <span>{{ $litters->litter_owner->phone }}</span>
          </div>
          </div>
            <div class="col-sm-6">
          <div class="form-group">
                <label><strong>Email:</strong></label> <span>{{ $litters->litter_owner->email}}</span>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-6">
          <div class="form-group">
            <label for=""><strong>Kennel:</strong></label> <span>{{ $litters->litter_owner->user_kennels->kennel_name}}</span>
          </div>
          </div>

          <!-- print either Prefix or Suffix based on the data is stored -->
@if(!empty( $litters->litter_owner->user_kennels->prefix ))
            <div class="col-sm-6">
              <div class="form-group">
                <label for=""><strong>Prefix:</strong></label> <span>{{ $litters->litter_owner->user_kennels->prefix }}</span>
              </div>
            </div>
            @else
            <div class="col-sm-6">
          <div class="form-group">
            <label for=""><strong>Suffix:</strong></label> <span>{{ $litters->litter_owner->user_kennels->suffix }}</span>
          </div>
          </div>
          @endif
        </div>

          <legend><span>Litter Parent</span></legend>
          <div class="row">
          <div class="col-sm-6">
          <div class="form-group">
            <label for=""><strong>Sire: &nbsp;&nbsp;</strong></label>{{ $litters->litter_sire->dog_name }} | DNA Status : 
            @if($litters->litter_sire->DNA_status == 'Proven')
            <span class="badge badge-important" style="color:white;background-color: green;">Proven</span>
            @elseif($litters->litter_sire->DNA_status == 'Stored')
            <span class="badge badge-important" style="color:white;background-color: blue;">Stored</span>
            @elseif($litters->litter_sire->DNA_status == 'Repeat')
            <span class="badge badge-important" style="color:white;background-color: orange;">Repeat</span>
            @elseif($litters->litter_sire->DNA_status == 'Applied For')
            <span class="badge badge-important" style="color:white;background-color: blue;">Applied For</span>
            @elseif($litters->litter_sire->DNA_status == 'Not Available')
            <span class="badge badge-important" style="color:white;background-color: red;">Not Available</span>
            @elseif($litters->litter_sire->DNA_status == 'Not Proven')
            <span class="badge badge-important" style="color:white;background-color: red;">Not Proven</span>
            @endif
          </div>
        </div>

        <div class="col-sm-6">
          <div class="form-group">
            <label for=""><strong>Dam: &nbsp;&nbsp;</strong></label>{{ $litters->litter_dam->dog_name }} | DNA Status : 
            @if($litters->litter_dam->DNA_status == 'Proven')
            <span class="badge badge-important" style="color:white;background-color: green;">Proven</span>
            @elseif($litters->litter_dam->DNA_status == 'Stored')
            <span class="badge badge-important" style="color:white;background-color: blue;">Stored</span>
            @elseif($litters->litter_dam->DNA_status == 'Repeat')
            <span class="badge badge-important" style="color:white;background-color: orange;">Repeat</span>
            @elseif($litters->litter_dam->DNA_status == 'Applied For')
            <span class="badge badge-important" style="color:white;background-color: blue;">Applied For</span>
            @elseif($litters->litter_dam->DNA_status == 'Not Available')
            <span class="badge badge-important" style="color:white;background-color: red;">Not Available</span>
            @elseif($litters->litter_dam->DNA_status == 'Not Proven')
            <span class="badge badge-important" style="color:white;background-color: red;">Not Proven</span>
            @endif
          </div>
        </div>

      </div>
          <br>

          <legend><span>Puppies Information</span></legend>
          <div class="row">
            <div class="col-sm-6">
              <div class="form-group">
                <label for=""><strong>Mating Date: </strong></label> <span>{{ $litters->litter_studcertificate->mating_date }}</span>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label for=""><strong>Litters Whelping Date: </strong></label> <span>{{ $litters->dob }}</span>
              </div>
            </div>
          </div>
      
      <form action="{{action('LitterRegistrationController@save_microchips')}}"  method="post">
        @csrf
          <div class="element-box">
                  <div class="table-responsive">
                    <table id="dataTable" width="100%" class="table table-striped table-lightfont">
                      <thead>
                        <tr>
                         <th>Puppy Name</th>
                         <th>Gender</th>
                         <th>DNA Sample Taken</th>
                         <th>Microchips</th>
                         <th>Hair</th>
                         <th>Color</th>
                       </tr>
                      </thead>
                      <tbody>
                        @foreach($litter_details as $puppies)
                      
                        <tr>
                        <td><input type="hidden" name="detail_id[]" value="{{ $puppies->id }}"/>
                          <span>{{ $puppies->name }}</span></td>
                          <td><span>{{ $puppies->sex }}</span></td>
                          <td> 
                            <select class="form-control" name="dnataken[]" id="dnataken">
                              <option value="Yes">Yes</option>
                              <option value="No">No</option>
                            </select>
                            </td>
                          <td>
                            <select class="form-control" name="microchip[]" id="microchip">
                              <option>- Select One -</option>
                              @foreach ($microchips as $microchip)
                                <option value="{{ $microchip->microchip }}">{{ $microchip->microchip }}</option>
                              @endforeach
                            </select>
                          </td>
                          <td>
                            <select class="form-control" name="hair[]" id="hair">
                              <option>- Select One -</option>
                              <option>Stock Hair</option>
                              <option>Long Stock hair</option>
                            </select>
                          </td>
                          <td><span>{{ $puppies->color }}</span></td>
                  
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                  </div>
                </div>

                <div class="form-buttons-w">
            <button class="btn btn-primary" type="submit"> Submit</button>
          </div>
        </form>
      </div>
    </div>
  </div>
            
        </div>
      </div>
    </div>

@endsection