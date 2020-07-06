@extends('layouts.master')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
@section('content')

          <div class="content-i">
            <div class="content-box">
              <div class="row">
  <div class="col-lg-12">
    <div class="element-wrapper">
      <h6 class="element-header">
        Litter Inspection Form (7 to 8 Weeks)
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
        {!! Form::open(array('route' => 'SecondLitterInspections.store','method'=>'POST')) !!}
          @csrf
          <div class="row">
            <div class="col-sm-4">
          <div class="form-group">
            <label for="">Inspection Request :</label>
              <select class="form-control select2 selectpicker dynamicinspection" data-live-search="true" id="breeder_id" name="inspection_id" data-dependent="inspection_result">
                <option>- Select Inspection Request -</option>
                @foreach($littersinspection as $inspection)
                    <option value="{{$inspection->id}}">{{ $inspection->sire_dog->dog_name }} - {{ $inspection->dam_dog->dog_name }}</option>
                @endforeach
              </select>
          </div>
        </div>
       

        
              <span id="breeder_result"></span>
              
            

        <div class="col-sm-4">
          <div class="form-group">
            <label for="">City:</label>
              <select class="form-control select2 selectpicker" data-live-search="true" id="city_id" name="city_id">
                <option value="{{$breeders->city}}">{{$breeders->user_city->city}}</option>
              </select>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="form-group">
            <label for="">Kennel:</label>
              <input type="text" value="{{ $kennel->prefix }}" class="form-control" id="kennel_id" name="kennel_id" readonly/>
            
          </div>
        </div>

   

      </div>
          <div class="row">
            <div class="col-sm-6">
              <div class="form-group">
                <label for="">Sire:</label>
                <select class="form-control select2 selectpicker" data-live-search="true" id="sire_id" name="sire_id" required>
              <option value="">- Select Sire -</option>
              @foreach($sire as $sire_dog)
                <option value="{{$sire_dog->id}}">{{$sire_dog->dog_name}}</option>
              @endforeach
            </select>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label for="">Dam: </label>
                <select class="form-control select2 selectpicker studcertificatecheck" data-live-search="true"  id="dam_id" name="dam_id">
              <option value="0">- Select Dam -</option>
              @if(in_array($user->user_type_id, $allowed_users))
                    
              <span id="dam_result"></span>
                @else

                  @foreach($dam as $dam_dog)
                      <option value="{{$dam_dog->id}}">{{$dam_dog->dog_name}}</option>
                  @endforeach
              
              @endif
            </select>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-6">
            <div class="form-group">
              <label for="">Whelping Date:</label>
              <input type="date" class="form-control" id="whelping_date" name="whelping_date" required />
            </div>
          </div>
          <div class="col-sm-6">
            <div class="form-group">
              <label for="">Mating Date: </label>
              <span id="certificate_result"></span>
              
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-3">
          <div class="form-group">
            <label for="">No of Puppies: </label>
            <input type="text" class="form-control" id="puppies_born" name="puppies_born" required />
          </div>
        </div>
        <div class="col-sm-3">
          <div class="form-group">
            <label for="">No of Male Puppies Born: </label>
            <input type="text" class="form-control" id="male_puppies" name="male_puppies" />
          </div>
        </div>
        <div class="col-sm-3">
          <div class="form-group">
            <label for="">No of Female Puppies Born:</label>
            <input type="text" class="form-control" id="female_puppies" name="female_puppies" />
          </div>
        </div>
        <div class="col-sm-3">
          <div class="form-group">
            <label for="">Puppies Expired:</label>
            <input type="text" class="form-control" id="expired_puppies" name="expired_puppies" />
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-8">
          <div class="form-group">
            <label for="">Address:</label>
            <textarea class="form-control" rows="3" id="address" name="address"></textarea>
          </div>
        </div>
      </div>
          
            <?php
              $current = date('Y-m-d');
              $valid = date('Y-m-d' , strtotime($current. ' + 3 days'));
            ?>
            <input type="hidden" value="{{ $valid }}" name="valid_till" />
            <input type="hidden" value="{{ $user->id }}" name="created_by" />
          </fieldset>
          <div class="form-buttons-w">
            <button class="btn btn-primary" id="btnsubmit" type="submit"> Submit</button>
          </div>
        {!! Form::close() !!}
      </div>
    </div>
  </div>
</div>
</div>
</div>
<script>
  document.getElementById("btnsubmit").disabled = true;
  $(document).ready(function(){

$('.dynamicinspection').change(function(){
  
  if($(this).val() != '')
  {
   var select = $(this).attr("id");
   var value = $(this).val();
   var dependent = $(this).data('dependent');

   var _token = $('input[name="_token"]').val();

   $.ajax({
    url:"{{ route('dynamicdependent.breeder_info') }}",
    post:"POST",
    beforeSend: function (xhr) {
          var token = $('meta[name="csrf_token"]').attr('content');

          if (token) {
                return xhr.setRequestHeader('X-CSRF-TOKEN', token);
          }
      },
    data:{
    select:select, 
    value:value
    },      
    success:function(result)
    {
     $('#breeder_result').html(result);
    }

   });
  

  }
 });


 $('.dynamicdam').change(function(){
  if($(this).val() != '')
  {
   var select = $(this).attr("id");
   var value = $(this).val();
   var dependent = $(this).data('dependent');
   var _token = $('input[name="_token"]').val();

   $.ajax({
    url:"{{ route('dynamicdependent.breeder_dam') }}",
    post:"POST",
    beforeSend: function (xhr) {
          var token = $('meta[name="csrf_token"]').attr('content');

          if (token) {
                return xhr.setRequestHeader('X-CSRF-TOKEN', token);
          }
      },
    data:{
    select:select, 
    value:value
    },      
    success:function(result)
    {
     $('#dam_id').html(result);
    }

   });
  }
 });

 $('.studcertificatecheck').change(function(){
    
    if($(this).val() != '')
    {
     var select = $(this).attr("id");
     var value = $(this).val();
     var dependent = $(this).data('dependent');
     var stud = document.getElementById('sire_id').value;
    
  
     var _token = $('input[name="_token"]').val();
  
     $.ajax({
      url:"{{ route('dynamicdependent.checkcertificate') }}",
      post:"POST",
      beforeSend: function (xhr) {
            var token = $('meta[name="csrf_token"]').attr('content');
 
            if (token) {
                  return xhr.setRequestHeader('X-CSRF-TOKEN', token);
            }
        },
      data:{
      select:select, 
      value:value,
      stud:stud
      },      
      success:function(result)
      {
       $('#certificate_result').html(result);
      }
  
     });
    }

   });

  });
</script>

  @endsection