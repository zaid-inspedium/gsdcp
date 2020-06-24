@extends('layouts.master')

@section('content')
  <!--------------------
          START - Breadcrumbs
          -------------------->
      <ul class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.html">Home</a>
        </li>
        <li class="breadcrumb-item">
          <a href="index.html">Products</a>
        </li>
        <li class="breadcrumb-item">
          <span>Laptop with retina screen</span>
        </li>
      </ul>
      <!--------------------
      END - Breadcrumbs
      -------------------->
      <div class="content-i">
            <div class="content-box"><div class="row">
  <div class="col-lg-12">
    <div class="element-wrapper">
      <h6 class="element-header">
        Litter Registeration - View
      </h6>
      <div class="element-box">
          <div class="row">
            <div class="col-sm-6">
          <div class="form-group">
                <label><strong>Name Of Breeder: </strong> <span>{{ $litters[0]->first_name }} {{ $litters[0]->last_name }}</span></label>
          </div>
</div>
        <div class="col-sm-6">
          <div class="form-group">
            <label for=""><strong>Address: </strong></label> <span>{{ $litters[0]->address }}</span>
          </div>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-6">
          <div class="form-group">
            <label for=""><strong>Phone #: </strong></label> <span>{{ $litters[0]->phone }}</span>
          </div>
          </div>
        
        
            <div class="col-sm-6">
          <div class="form-group">
                <label><strong>Email: </strong></label> <span>{{ $litters[0]->email }}</span>
          </div>
        </div>
      </div>
      @foreach($kennel as $kennels)
      @if($kennels->user_id == $litters[0]->owner_id)
      <div class="row">
        <div class="col-sm-6">
          <div class="form-group">
            <label for=""><strong>Kennel:</strong></label> <span>{{ $kennels->kennel_name }}</span>
          </div>
          </div>

@if(!empty($kennels->prefix))
          <!-- print either Prefix or Suffix based on the data is stored -->

            <div class="col-sm-6">
              <div class="form-group">
                <label for=""><strong>Prefix:</strong></label> <span>{{ $kennels->prefix }}</span>
              </div>
            </div>
            @else
            <div class="col-sm-6">
          <div class="form-group">
            <label for=""><strong>Suffix:</strong></label> <span>{{ $kennels->suffix }}</span>
          </div>
          </div>
          @endif
        </div>
        @endif
        @endforeach
          <legend><span>Litter Parent</span></legend>
          <div class="row">
          <div class="col-sm-6">
          <div class="form-group">
            @foreach($dogs as $dog)
            @if($litters[0]->sire == $dog->id)
            <label for=""><strong>Sire: </strong></label> <span>{{$dog->dog_name}} &nbsp;{{$dog->dob}} | DNA Status : 
            @if($dog->DNA_status == 1)
            <span class="badge badge-important" style="color:white;background-color: green;">Proven</span>
            @elseif($dog->DNA_status == 2)
            <span class="badge badge-important" style="color:white;background-color: blue;">Stored</span>
            @elseif($dog->DNA_status == 3)
            <span class="badge badge-important" style="color:white;background-color: orange;">Repeat</span>
            @elseif($dog->DNA_status == 4)
            <span class="badge badge-important" style="color:white;background-color: blue;">Applied For</span>
            @elseif($dog->DNA_status == 5)
            <span class="badge badge-important" style="color:white;background-color: red;">Not Available</span>
            @elseif($dog->DNA_status == 6)
            <span class="badge badge-important" style="color:white;background-color: red;">Not Proven</span>
            @endif
            @endif
            @endforeach
          </div>
        </div>
        <div class="col-sm-6">
          <div class="form-group">
            @foreach($dogs as $dog)
            @if($litters[0]->dam == $dog->id)
            <label for=""><strong>Dam: </strong></label> <span>{{$dog->dog_name}} &nbsp;{{$dog->dob}} | DNA Status : 
            @if($dog->DNA_status == 1)
            <span class="badge badge-important" style="color:white;background-color: green;">Proven</span>
            @elseif($dog->DNA_status == 2)
            <span class="badge badge-important" style="color:white;background-color: blue;">Stored</span>
            @elseif($dog->DNA_status == 3)
            <span class="badge badge-important" style="color:white;background-color: orange;">Repeat</span>
            @elseif($dog->DNA_status == 4)
            <span class="badge badge-important" style="color:white;background-color: blue;">Applied For</span>
            @elseif($dog->DNA_status == 5)
            <span class="badge badge-important" style="color:white;background-color: red;">Not Available</span>
            @elseif($dog->DNA_status == 6)
            <span class="badge badge-important" style="color:white;background-color: red;">Not Proven</span>
            @endif
            @endif
            @endforeach
          </div>
        </div>
      </div>
          <br>

          <legend><span>Puppies Information</span></legend>
          <div class="row">
            <div class="col-sm-6">
              <div class="form-group">
                @foreach($studs as $stud)
                @if($litters[0]->sire == $stud->sire && $litters[0]->dam == $stud->dam)
                <label for=""><strong>Mating Date: </strong></label> <span>{{ $stud->mating_date }}</span>
                @endif
                @endforeach
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label for=""><strong>Litters Whelping Date: </strong></label> <span>{{$litters[0]->dob}}</span>
              </div>
            </div>
          </div>
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
                         <th>Print Pedigree</th>
                       </tr>
                      </thead>
                      <tbody>
                        @for($j = 0; $j < count($litters); $j++)
                        <tr>
                          @foreach($kennel as $kennels)
                          @if($kennels->user_id == $litters[$j]->owner_id)
                          @if(!empty($kennels->prefix))
                          <td><span>{{$litters[$j]->name}} {{ $kennels->prefix }}</span></td>
                          @else
                          <td><span>{{$litters[$j]->name}} {{ $kennels->suffix }}</span></td>
                          @endif
                          @endif
                          @endforeach
                          <td><span>{{$litters[$j]->sex}}</span></td>
                          @if($litters[$j]->DNA_taken == '')
                          <td><span>Yes</span></td>
                          @endif
                          <td><span>{{$litters[$j]->microchip}}</span></td>
                          <td><span>{{$litters[$j]->hair}}</span></td>
                          <td><span>{{$litters[$j]->color}}</span></td>
                          <td><input type="checkbox" name="print_pedigree" id="print_pedigree"/>  <i class="os-icon os-icon-ui-33"></i></td>
                        </tr>
                        @endfor
                        </tbody>
                    </table>
                  </div>
                </div>
      </div>
    </div>
  </div>
            
        </div>
      </div>
    </div>

@endsection