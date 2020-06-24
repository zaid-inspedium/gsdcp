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
        Litter Registeration - Form
      </h6>
      <div class="element-box">
        <form>
          <span class="badge badge-important pull-left" style="color:white;background-color: green;">Litter Registration Fee: 2,000</span><br>
          <span class="badge badge-important pull-left" style="color:white;background-color: green;">Courier Fee: 0</span>
          <br>
          <span class="badge badge-important pull-left" style="color:white;background-color: green;">DNA GO Card Fee: 1,000/Puppy</span>
          <br>
          <span class="badge badge-important pull-left" style="color:white;background-color: green;">Puppy Pedigree Fee: 1,000/Puppy</span>
          <br>
          <hr>
          <div class="row">
            <div class="col-sm-6">
          <div class="form-group">
            <label for="">Name of Breeder:</label>
            <input list="breeders" name="country_id2[]" id="country_id[]" value="" product_name="" class="form-control dynamicbreeder" placeholder="Search Sire" data-dependent="breederinfo"/>
                                    <datalist id="breeders">
              @for($i = 0; $i < count($litters); $i++)
              @foreach($users as $u)
              @if($u->id == $litters[0]->owner_id)
              <option selected value="{{$u->first_name}} {{$u->last_name}}"></option>
              <input type="hidden" id="hidden_id" value="{{$u->id}}" class="dynamiccity" data-dependent="inhand_id">
              @else
              <option value="{{$u->first_name}} {{$u->last_name}}"></option>
              <input type="hidden" id="hidden_id" value="{{$u->id}}" class="dynamiccity" data-dependent="inhand_id">
              @endif
              @endforeach
            @endfor
            </datalist>
          </div>
        </div>
            <div class="col-sm-6">
          <div class="form-group">
            @if($litters[0]->old_record == 1)
                <label><strong>Old Record:</strong> &nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp;<input checked class="form-check-input" name="old_record" id="old_record" type="radio" value=""></label>
                @else
                <label><strong>Old Record:</strong> &nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp;<input class="form-check-input" name="old_record" id="old_record" type="radio" value=""></label>
                @endif
          </div>
        </div>
      </div>
          <br>

          
          <div class="row">
            <div class="col-sm-6">
          <div class="form-group">
            <label for=""><strong>Kennel Name:</strong></label> <span>{{$litters[0]->kennel_name}}</span>
          </div>
        </div>
          
          <!-- print either Prefix or Suffix based on the data is stored -->
@if(!empty($litters[0]->prefix))
            <div class="col-sm-6">
              <div class="form-group">
                <label for=""><strong>Prefix:</strong></label> <span>{{$litters[0]->prefix}}</span>
              </div>
            </div>
            @else
            <div class="col-sm-6">
              <div class="form-group">
                <label for=""><strong>Suffix:</strong></label> <span>{{$litters[0]->suffix}}</span>
              </div>
            </div>
            @endif
          </div>

          <div class="row">
            <div class="col-sm-6">
              <div class="form-group">
                <label for=""><strong>Address:</strong></label> <span>{{$litters[0]->address}}</span>
            </div>
          </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label for=""><strong>Phone #:</strong></label> <span>{{$litters[0]->phone}}</span>
            </div>
          </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
              <div class="form-group">
            <label for=""><strong>Email:</strong></label></label> <span>{{$litters[0]->email}}</span>
          </div>
        </div>
      </div>
          <br>

          <legend><span>Litter Parent</span></legend>
          <div class="row">
            <div class="col-sm-6">
              <div class="form-group">
            <label for="">Sire:</label>
            <input list="sire" name="country_id2[]" id="country_id[]" value="" product_name="" class="form-control dynamicbreeder" placeholder="Search Sire" data-dependent="breederinfo"/>
                                    <datalist id="sire">
              @foreach($dogs as $dog)
              @if($dog->sex == 1 && $dog->id == $litters[0]->sire)
              <option selected value="{{$dog->dog_name}}"></option>
              <input type="hidden" id="hidden_id" value="{{$dog->id}}" class="dynamiccity" data-dependent="inhand_id">
              @elseif($dog->sex == 1)
              <option value="{{$dog->id}}">
                <input type="hidden" id="hidden_id" value="{{$dog->id}}" class="dynamiccity" data-dependent="inhand_id">
                {{$dog->dog_name}}
              </option>
              @endif
              @endforeach
            </datalist>
          </div>
        </div>
            <div class="col-sm-6">
              <div class="form-group">
            <label for="">Dam:</label>
            <input list="dam" name="country_id2[]" id="country_id[]" value="" product_name="" class="form-control dynamicbreeder" placeholder="Search Dam" data-dependent="breederinfo"/>
                                    <datalist id="dam">
              @foreach($dogs as $dog)
              @if($dog->sex == 2 && $dog->id == $litters[0]->dam)
              <option selected value="{{$dog->dog_name}}"></option>
              <input type="hidden" id="hidden_id" value="{{$dog->id}}" class="dynamiccity" data-dependent="inhand_id">
              @elseif($dog->sex == 2)
              <option value="{{$dog->id}}">
                <input type="hidden" id="hidden_id" value="{{$dog->id}}" class="dynamiccity" data-dependent="inhand_id">
                {{$dog->dog_name}}
              </option>
              @endif
              @endforeach
            </datalist>
          </div>
        </div>
      </div>
          <br>

          <!-- <span class="badge badge-important" style="color:white;background-color: green;">Stud certificate has been found.</span>
          <br>
          <br> -->

          <legend><span>Puppies Information</span></legend>
          <div class="row">
            <div class="col-sm-6">
              <div class="form-group">
                <label for="">Whelping Date:</label><input id="whelping_date" value="{{ $litters[0]->dob }}" name="whelping_date" class="form-control" type="date">
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label for="">Permission</label><select id="permission" name="permission" class="form-control">
                  <option>- Select Permission -</option>
                  @if($litters[0]->status_litter == 5)
                  <option selected value="5">Permission Granted</option>
                  @elseif($litters[0]->status_litter == 6)
                  <option selected value="6">Permission Denied</option>
                  @endif
                </select>
              </div>
            </div>
          </div>
          <hr>
          @foreach($litters as $litter)
          <div class="row">
            <div class="col-sm-3">
              <div class="form-group">
                <label for="">Dog Name</label><input id="dog_name" name="dog_name" value="{{$litter->name}}" class="form-control" placeholder="Enter Dog Name" type="text" oninput="myFunction()">
              </div>
            </div>
            <div class="col-sm-3" id="add">
              <div class="form-group">
                <label for="">Gender </label><select id="gender" name="address" class="form-control">
                  <option>- Select Gender -</option>
                  @if($litter->sex == 1)
                  <option value="1" selected>Male</option>
                  <option>Female</option>
                  @elseif($litter->sex == 1)
                  <option value="1">Male</option>
                  <option selected value="2" >Female</option>
                  @endif
                </select>
              </div>
            </div>
            <div class="col-sm-3">
              <div class="form-group">
                <label for="">Color and Markings</label>
                <input id="color_markings" name="color_markings" value="{{$litter->color}}" class="form-control" placeholder="Color & Markings" type="text">
              </div>
            </div>
            <div class="col-sm-3">
              <div class="form-group">
                @if(!empty($litter->prefix))
                <br>
                <label for=""><strong>Fullname:</strong></label> <span>{{$litter->prefix}}&nbsp;</span><var id="puppy_name">{{$litter->name}}</var>
                @else
                <br>
                <label for=""><strong>Fullname:</strong></label> <var id="puppy_name">{{$litter->name}}</var><span>&nbsp;{{$litter->suffix}}</span>
                @endif
              </div>
            </div>
          </div>
          @endforeach

          <div class="row pull-right">
            <a href="#" class="btn btn-success btn-add" data-toggle="tooltip" data-placement="top" title="Add More"><i class="fa fa-plus-circle">Add More</i></a>
          </div>
          <br>





          
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

<script type="text/javascript">

function myFunction() {
  var x = document.getElementById("dog_name").value;
  document.getElementById("puppy_name").innerHTML = x;
}

</script>

@endsection