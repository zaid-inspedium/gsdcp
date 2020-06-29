@extends('layouts.master')

@section('content')

          <div class="content-i">
            <div class="content-box">
              <div class="row">
  <div class="col-lg-12">
    <div class="element-wrapper">
      <h6 class="element-header">
        Litter Inspection Form
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
        {!! Form::open(array('route' => 'LitterInspections.store','method'=>'POST')) !!}
          @csrf
          <div class="row">
            <div class="col-sm-6">
          <div class="form-group">
            <label for="">Breeder</label>
           
          @if($user->user_type_id == 3)
          
          <select class="form-control select2 selectpicker" data-live-search="true" id="breeder_id" name="breeder_id">
           
            <option value="{{$breeders->id}}">{{$breeders->first_name}} {{$breeders->last_name}}</option>
          </select>

          @else

          <select class="form-control select2 selectpicker" data-live-search="true" id="breeder_id" name="breeder_id">
            <option>- Select Breeder -</option>
            @foreach($breeders as $breeder)
                <option value="{{$breeder->id}}">{{$breeder->first_name}} {{$breeder->last_name}}</option>
            @endforeach
          </select>
          
          @endif
            

    
          </div>
        </div>
        <div class="col-sm-6">
          <div class="form-group">
            <label for="">City</label>
            <select class="form-control select2 selectpicker" data-live-search="true" id="city_id" name="city_id">
              <option>- Select City -</option>
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
              <option value="0">- Select Sire -</option>
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
              <option value="0">- Select Dam -</option>
              @foreach($dam as $dam_dog)
               <option value="{{$dam_dog->id}}">{{$dam_dog->dog_name}}</option>
             @endforeach
            </select>
              </div>
            </div>
          </div>
            <div class="form-group">
              <label>Address</label><textarea class="form-control" rows="3" id="address" name="address"></textarea>
            </div>
            <?php
              $current = date('Y-m-d');
              $valid = date('Y-m-d' , strtotime($current. ' + 3 days'));
            ?>
            <input type="hidden" value="{{ $valid }}" name="valid_till" />
            <input type="hidden" value="{{ $user->id }}" name="created_by" />
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