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
       
        <form action="{{ route('Litters.store')}}" method="POST">
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
            <select class="form-control select2 selectpicker dynamicbreeder" data-dependent="breeder_result" data-live-search="true" id="breeder_id" name="owner_id" required>
              <option value="0">- Select Breeder -</option>
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
          <!-- if the owner's account has a negative charge on the account, then print this -->

          <!-- <span class="badge badge-important" style="color:white;background-color: red;">Current balance is -12,000. <a>Click here</a> to charge member account. "LITTER FEE is 2,200"</span>
          <br>
          <br> -->

          <legend><span>Litter Parent</span></legend>
          <div class='row'>
             <div class='col-sm-6'>
               <div class='form-group'>
            <label for="">Sire:</label>
            <select class="form-control select2 selectpicker dynamicsire" data-dependent="sire_result" data-live-search="true" id="sire_id" name="sire" required>
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
            <select class="form-control select2 selectpicker dynamicdam" data-dependent="dam_result" data-live-search="true" id="dam_id" name="dam" required>
              <option value="0">- Select Dam -</option>
              @foreach($dam as $dam_dog)
               <option value="{{$dam_dog->id}}">{{$dam_dog->dog_name}}</option>
             @endforeach
            </select>
          </div>
        </div>
      </div>
      <div class="row">
        <div class='col-sm-6'>
          <div class='form-group'>
            <span id="sire_result"></span>
          </div>
        </div>
        <div class='col-sm-6'>
          <div class='form-group'>
            <span id="dam_result"></span>
          </div>
        </div>
      </div>
    <input type="hidden" value="{{ $user->id }}" name="created_by"/>
          <br>

<!-- if either sire or dam doesn't have a stud certificate, then print this -->

          <!-- <span class="badge badge-important" style="color:white;background-color: red;">Stud certificate not found. <a>Click Here</a> to create certificate."</span>
          <br>
          <br> -->
          <legend><span>Puppies Information</span></legend>
          <div class="row">
            <div class="col-sm-6">
              <div class="form-group">
                <label for="">Whelping Date:</label><input id="whelping_date" name="dob" class="form-control dynamicwhelpingdate" type="date" required>
              </div>
            </div>
            {{-- <div class="col-sm-6">
              <div class="form-group">
                <label for="">Permission</label><select id="permission" name="permission" class="form-control">
                  <option>- Select Permission -</option>
                  <option>Permission Granted</option>
                  <option>Permission Denied</option>
                </select>
              </div>
            </div> --}}
          </div>
        
          <div class="row">
            <div class='col-sm-6'>
              <div class='form-group'>
                <span id="whelping_result"></span>
              </div>
            </div>
          </div>
          <hr>
          <?php for($i=1; $i <= 10; $i++){ ?>
          <div class="row">
            <div class="col-sm-3">
              <div class="form-group">
                <label for=""><strong>Dog Name</strong></label>
                <input onkeyup="myFunction('<?php echo $i; ?>')" id="dog_name<?php echo $i; ?>" name="dog_name[]" class="form-control" placeholder="Enter Dog Name" type="text">
              </div>
            </div>
            <div class="col-sm-3" id="add">
              <div class="form-group">
                <label for=""><strong>Gender</strong></label>
                <select id="gender<?php echo $i; ?>" name="gender[]" class="form-control">
                  <option></option>
                  <option value="Male">Male</option>
                  <option value="Female">Female</option>
                </select>
              </div>
            </div>
            <div class="col-sm-3">
              <div class="form-group">
                <label for=""><strong>Color and Markings</strong></label>
                <select id="color_markings<?php echo $i; ?>" name="color_markings[]" class="form-control">
                  <option></option>
                  <option value="Black - Gold">Black - Gold</option>
                  <option value="Black & Brown">Black & Brown</option>
                </select>
              </div>
            </div>
            <div class="col-sm-3">
              <div class="form-group">
             
                <label for=""><strong>Fullname:</strong></label>
                <input id="<?php echo $i; ?>" name="puppy_name[]"  class="form-control" type="text" readonly>
              </div>
            </div>
          </div>
   
        <?php } ?>

         
          <div class="form-buttons-w">
            <button class="btn btn-primary" id="btnsubmit" type="submit"> Submit</button>
          </div>
        </form>
      </div>
    </div>
  </div>
            
        </div>
      </div>
    </div>
<script type="text/javascript">

function myFunction(item) {
  var str1 = "dog_name";
  var str2 = item;
  var res = str1.concat(str2);
  var x = document.getElementById(res).value;
  var suffix = document.getElementById('suffix').value;
  var prefix = document.getElementById('prefix').value;
   var puppyname = prefix.concat(x).concat(suffix);
   document.getElementById(item).value = puppyname;
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
      url:"{{ route('dynamicdependent.fetch_sireinfo') }}",
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

   $('.dynamicdam').change(function(){
    if($(this).val() != '')
    {
     var select = $(this).attr("id");
     var value = $(this).val();
     var dependent = $(this).data('dependent');
     var stud = document.getElementById('sire_id').value;

     var _token = $('input[name="_token"]').val();
     $.ajax({
      url:"{{ route('dynamicdependent.fetch_daminfo') }}",
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
       $('#dam_result').html(result);
      }
     });
    }
   });

   $('.dynamicwhelpingdate').change(function(){
    if($(this).val() != '')
    {
     var select = $(this).attr("id");
     var value = $(this).val();
     var dependent = $(this).data('dependent');
     var stud = document.getElementById('sire_id').value;
     var dam = document.getElementById('dam_id').value;
     var _token = $('input[name="_token"]').val();

     $.ajax({
      url:"{{ route('dynamicdependent.fetch_matingdate') }}",
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
      stud:stud,
      dam:dam
      },      
      success:function(result)
      {
       $('#whelping_result').html(result);
      }
     });
    }
   });


});



</script>


@endsection