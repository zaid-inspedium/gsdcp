@extends('layouts.master')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1">
@section('content')
<style>
#mating {
  visibility:none;
}

</style>

      <div class="content-i">
            <div class="content-box">
              <div class="row">
  <div class="col-lg-12">
    <div class="element-wrapper">
      <h6 class="element-header">
        <a action="back" href="javascript: window.history.back();" class="btn btn-sm btn-secondary">
          <i class="fa fa-backward"> </i><span> &nbsp; Back</span>
        </a>
        &nbsp; Stud Certificate - Form
      </h6>
      @if (count($errors) > 0)
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
        </ul>
    </div>
    @endif
  <div class="element-box">
    <h5 class="form-header">
      Stud Certificate Form
    </h5>
    <div class="form-desc">
      The declaration made on this certificate is certified as true to the best of my knowledge the pedigree of the bitch has been examined by me and has been certified/issue by the G S D.1D.P
    </div>
  </div>
</div>
</div>
</div>

<form action="{{ route('StudCertificates.store') }}" method="POST" id="formValidate"> 
  @csrf
<div class="row">
<div class="col-lg-6">
    <div class="element-wrapper">
      <h6 class="element-header">
        Sire
      </h6>
      <div class="element-box">
          <div class="form-group">
            <label for="">Name Of Sire</label><select class="form-control select2 dynamicsire" data-dependent="sire_result"  name="sire_name" id="sire_name" required>
              <option value="0">
                Select Sire Name
              </option>
              @foreach($sire as $sire_dog)
              <option value="{{ $sire_dog->id }}">
                {{ $sire_dog->dog_name }}
              </option>
            @endforeach
            </select>
          </div>
          <span id="sire_result"></span>
          </div>
        </div>
      </div>
  <div class="col-lg-6">
    <div class="element-wrapper">
      <h6 class="element-header">
        Dam
      </h6>
      <div class="element-box">
          <div class="form-group">
            <label for="">Name Of Dam</label><select class="form-control select2 dynamicdam" name="dam_name" data-dependent="dam_result" id="dam_name" required>
              <option value="0">
                Select Dam Name
              </option>
              @foreach($dam as $dam_dog)
              <option value="{{ $dam_dog->id }}">
                {{ $dam_dog->dog_name }}
              </option>
            @endforeach
            </select>
          </div>
          <span id="dam_result"></span>
        </div>
        
      </div>
    </div>
  </div>

  <div class="row">
  <div class="col-lg-12">
    <div class="element-wrapper">
  <div class="element-box">
    <div class="form-group">
            <label for="">Mating Date: </label>
            <input class="form-control" type="date" name="mating_date" id="mating_date" required/>
          </div>
          <div class="form-buttons-w">
          	<button class="btn btn-primary" type="submit" id="btnsubmit" onclick="loadSpinner(this);"> Submit</button>
          	<button class="btn btn-secondary" type="reset"> Reset</button>
	        <a type="button" href="{{ route('StudCertificates.index') }}" class="btn btn-danger">
	          Cancel
	        </a>
          </div>
  </div>
</div>

</div>
</div>
</form>
</div>
</div>
<script>

document.getElementById("btnsubmit").disabled = true;

function loadSpinner(this1)
{
  this1.disabled=true; 
  this1.innerHTML='<i class="fa fa-spinner fa-spin"></i> Save';
  this1.disabled=false;
}


$(document).ready(function(){

  $('.dynamicdam').change(function(){
    
    if($(this).val() != '')
    {
     var select = $(this).attr("id");
     var value = $(this).val();
     var dependent = $(this).data('dependent');
     var stud = document.getElementById('sire_name').value;
    
  
     var _token = $('input[name="_token"]').val();
  
     $.ajax({
      url:"{{ route('dynamicdependent.fetch_dam') }}",
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



  $('.dynamicsire').change(function(){
    
   if($(this).val() != '')
   {
    var select = $(this).attr("id");
    var value = $(this).val();
    var dependent = $(this).data('dependent');
 
    var _token = $('input[name="_token"]').val();
 
    $.ajax({
     url:"{{ route('dynamicdependent.fetch_sire') }}",
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