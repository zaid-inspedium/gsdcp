@extends('layouts.master')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
@section('content')
      <div class="content-i">
            <div class="content-box"><div class="row">
  <div class="col-lg-12">
    <div class="element-wrapper">
      <h6 class="element-header">
        Litter Registration - Form
      </h6>
      <div class="element-box">
        <form>
          @csrf
          <span class="badge badge-important pull-left" style="color:white;background-color: green; margin-right:10px;">
            Litter Registration Fee: 2,000</span> 
          <span class="badge badge-important pull-left" style="color:white;background-color: green; margin-right:10px;">Courier Fee: 0</span>
        
          <span class="badge badge-important pull-left" style="color:white;background-color: green; margin-right:10px;">DNA GO Card Fee: 1,000/Puppy</span>
         
          <span class="badge badge-important pull-left" style="color:white;background-color: green;">Puppy Pedigree Fee: 1,000/Puppy</span>
          <br>
          <hr>
          <div class="row">
        <div class="col-sm-6">
          <div class="form-group">
            <label for=""><strong>Name of Breeder:</strong></label>
            <select class="form-control select2 selectpicker dynamicbreeder" data-dependent="breeder_result" data-live-search="true" id="breeder_id" name="breeder_id">
              <option>- Select Breeder -</option>
              @foreach($breeders as $breeder)
                  <option value="{{$breeder->id}}">{{$breeder->first_name}} {{$breeder->last_name}}</option>
              @endforeach
            </select>
          </div>
        </div>
        <div class="col-sm-6">
          <span id="breeder_result"></span>
        </div>
          
      </div>
          
          <br>

          <!-- if the owner's account has a negative charge on the account, then print this -->

          <!-- <span class="badge badge-important" style="color:white;background-color: red;">Current balance is -12,000. <a>Click here</a> to charge member account. "LITTER FEE is 2,200"</span>
          <br>
          <br> -->

          <legend><span>Litter Parent</span></legend>
          <div class='row'>
             <div class='col-sm-6'>
               <div class='form-group'>
            <label for="">Sire:</label>
            <select class="form-control select2 selectpicker dynamicsire" data-dependent="sire_result" data-live-search="true" id="sire_id" name="sire_id">
              <option value="0">- Select Sire -</option>
              @foreach($sire as $sire_dog)
                <option value="{{$sire_dog->id}}">{{$sire_dog->dog_name}}</option>
              @endforeach
            </select>
          </div>
        </div>

         <div class='col-sm-6'>
          <div class='form-group'>
            <label for="">Dam:</label>
            <select class="form-control select2 selectpicker" data-live-search="true" id="dam_id" name="dam_id">
              <option value="0">- Select Dam -</option>
              @foreach($dam as $dam_dog)
               <option value="{{$dam_dog->id}}">{{$dam_dog->dog_name}}</option>
             @endforeach
            </select>
          </div>
        </div>
        <span id="sire_result"></span>
      </div>
          <br>

<!-- if either sire or dam doesn't have a stud certificate, then print this -->

          <!-- <span class="badge badge-important" style="color:white;background-color: red;">Stud certificate not found. <a>Click Here</a> to create certificate."</span>
          <br>
          <br> -->

          <legend><span>Puppies Information</span></legend>
          <div class="row">
            <div class="col-sm-6">
              <div class="form-group">
                <label for="">Whelping Date:</label><input id="whelping_date" name="whelping_date" class="form-control" type="date">
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label for="">Permission</label><select id="permission" name="permission" class="form-control">
                  <option>- Select Permission -</option>
                  <option>Permission Granted</option>
                  <option>Permission Denied</option>
                </select>
              </div>
            </div>
          </div>
          <hr>
          <div class="row">
            <div class="col-sm-3">
              <div class="form-group">
                <label for=""><strong>Dog Name</strong></label><input oninput="myFunction()" id="dog_name" name="dog_name" class="form-control" placeholder="Enter Dog Name" type="text">
              </div>
            </div>
            <div class="col-sm-3" id="add">
              <div class="form-group">
                <label for=""><strong>Gender</strong></label>
                <select id="gender" name="address" class="form-control">
                  <option>- Select Gender -</option>
                  <option>Male</option>
                  <option>Female</option>
                </select>
              </div>
            </div>
            <div class="col-sm-3">
              <div class="form-group">
                <label for=""><strong>Color and Markings</strong></label>
                <input id="color_markings" name="color_markings" value="" class="form-control" placeholder="Color & Markings" type="text">
              </div>
            </div>
            <div class="col-sm-3">
              <div class="form-group">
                <br>
                <label for=""><strong>Fullname:</strong></label> <var id="puppy_name"></var>
              </div>
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
<script type="text/javascript">

function myFunction() {
  var x = document.getElementById("dog_name").value;
  document.getElementById("puppy_name").innerHTML = x;
}


$(document).ready(function(){
  $('.dynamicbreeder').change(function(){
    
   if($(this).val() != '')
   {
    var select = $(this).attr("id");
    var value = $(this).val();
    var dependent = $(this).data('dependent');
 
    var _token = $('input[name="_token"]').val();
 
    $.ajax({
     url:"{{ route('dynamicdependent.fetch_kennel') }}",
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

  $('.dynamicsire').change(function(){
    
    if($(this).val() != '')
    {
     var select = $(this).attr("id");
     var value = $(this).val();
     var dependent = $(this).data('dependent');
  
     var _token = $('input[name="_token"]').val();
  
     $.ajax({
      url:"{{ route('dynamicdependent.fetch_studcertificate') }}",
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
       $('#sire_result').html(result);
      }
  
     });
    
 
    }
   });
});



</script>


@endsection