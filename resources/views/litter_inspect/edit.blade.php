@extends('layouts.master')

@section('content')

          <div class="content-i">
            <div class="content-box">
              <div class="row">
  <div class="col-lg-12">
    <div class="element-wrapper">
      <h6 class="element-header">
        Litter Inspection Edit
      </h6>
      <!-- @if ($message = Session::get('success'))
        <p></p>
          <div class="alert alert-success" id="msg">
              <p>{{ $message }}</p>
          </div>
        @elseif ($message = Session::get('danger'))
          <div class="alert alert-danger" id="msg">
              <p>{{ $message }}</p>
          </div>
        @endif -->
      <div class="element-box">
        {!! Form::open(array('route' => ['LitterInspections.update', $litter_inspect->id],'method'=>'PATCH','enctype'=>'multipart/form-data')) !!}
          @csrf
          <div class="row">
            <div class="col-sm-6">
          <div class="form-group">
            <label for="">Breeder</label>
            <select class="form-control selectpicker select2" data-live-search="true" id="breeder_id" name="breeder_id">
            <option value="{{ $litter_inspect->breeder->id }}">{{ $litter_inspect->breeder->first_name }}</option>
            @foreach($breeders as $breeder)
              <option value="{{$breeder->id}}">{{$breeder->first_name}} {{$breeder->last_name}}</option>
            @endforeach
            </select>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="form-group">
            <label for="">City</label>
            <select class="form-control select2 selectpicker" data-live-search="true" id="city_id" name="city_id">
              <option value="{{ $litter_inspect->litter_city->id }}">{{ $litter_inspect->litter_city->city }}</option>
              @foreach($cities as $city)
              <option value="{{$city->id}}">{{$city->city}}</option>
              @endforeach
            </select>
          </div>
        </div>
      </div>
          <div class="row">
            <div class="col-sm-6">
              <div class="form-group">
                <label for=""> Sire</label>
                <select class="form-control select2 selectpicker" data-live-search="true" id="sire_id" name="sire_id">
                  <option value="{{ $litter_inspect->sire_dog->id }}">{{ $litter_inspect->sire_dog->dog_name }}</option>
                  @foreach($sire as $sire_dog)
                    <option value="{{$sire_dog->id}}">{{$sire_dog->dog_name}}</option>
                  @endforeach
            </select>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label for="">Dam</label>
                <select class="form-control select2 selectpicker" data-live-search="true" id="dam_id" name="dam_id">
                  <option value="{{ $litter_inspect->dam_dog->id }}">{{ $litter_inspect->dam_dog->dog_name }}</option>
                  @foreach($dam as $dam_dog)
                  <option value="{{$dam_dog->id}}">{{$dam_dog->dog_name}}</option>
                @endforeach
            </select>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-6">
            <div class="form-group">
              <label>Address</label>
              <textarea class="form-control" rows="3" id="address" name="address">{{ $litter_inspect->address }}</textarea>
              <input type="hidden" value="{{ $user->id }}" name="updated_by" />
            </div>
          </div>
          <div class="col-sm-6">
            <div class="form-group">
              <label>Status</label>
              <select class="form-control" id="status" name="status">
                @if($litter_inspect->status == 1)
                  <option selected value="2">Approved</option>
                  <option selected value="4">Rejected</option>
                @elseif($litter_inspect->status == 2)
                  <option selected value="1">Pending</option>
                  <option selected value="4">Rejected</option>
                @elseif($litter_inspect->status == 3)
                  <option selected value="1">Pending</option>
                  <option selected value="2">Approved</option>
                  <option selected value="4">Rejected</option>
                @elseif($litter_inspect->status == 4)
                  <option selected value="1">Pending</option>
                  <option selected value="2">Approved</option>
                @endif
              </select>
            </div>
          </div>
        </div>
        <div class="row">
        <div class="col-sm-6">
        <div class="form-group">
        <label for="files">Select images:</label>
        <input class="form-control" type="file" id="images" name="images[]" multiple>
      </div>
    </div>
    <div class="col-sm-6">
        <div class="form-group">
          <label>Remarks</label>
              <textarea class="form-control" rows="3" id="remarks" name="remarks"></textarea>
            </div>
          </div>
        </div>
          </fieldset>
          <div class="form-buttons-w">
            <button class="btn btn-primary" type="submit"> Submit</button>
          </div>
          {!! Form::close() !!}
      </div>
    </div>
  </div>
</div>
</div>
</div>

  @endsection