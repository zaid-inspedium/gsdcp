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
         
            <legend><span>Inspection Request</span></legend>
              <select class="form-control select2 selectpicker dynamicinspection" data-live-search="true" id="inspection_id" name="inspection_id" data-dependent="inspection_result">
                <option>- Select Inspection Request -</option>
                @foreach($littersinspection as $inspection)
                    <option value="{{$inspection->id}}">{{ $inspection->sire_dog->dog_name }} - {{ $inspection->dam_dog->dog_name }}</option>
                @endforeach
              </select>
          </div>
        </div>

      </div>
      <span id="inspection_result"></span>

      {{-- SHAHMIR CODE --}}
      <div class="row">
        <div class="col-sm-12">
        <div class="form-group">
          <legend><span>Condition of Dam</span></legend>
        <textarea class="form-control" name="dam_condition"></textarea>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-4">
        <div class="form-group">
          <label>Eyes</label>
        <input class="form-control" name="dam_eyes" />
        </div>
        </div>
        <div class="col-sm-4">
        <div class="form-group">
          <label>Weight</label>
        <input class="form-control" name="dam_weight"/>
        </div>
        </div>
        <div class="col-sm-4">
        <div class="form-group">
          <label>Coat</label>
        <input class="form-control" name="dam_coat" />
        </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-6">
        <div class="form-group">
          <label>Nails</label>
        <input class="form-control" name="dam_nails"/>
        </div>
        </div>
        <div class="col-sm-6">
        <div class="form-group">
          <label>Teats</label>
        <input class="form-control" name="dam_teats" />
        </div>
        </div>
      </div>

      <div class="form-group">
        <legend><span>Condition of Puppies</span></legend>
      <textarea class="form-control" name="puppies_condition"></textarea>
        </div>
      <div class="row">
      <div class="col-sm-6">
      <div class="form-group">
        <label>Eyes</label>
      <input class="form-control"  name="puppies_eyes"/>
      </div>
      </div>
      <div class="col-sm-6">
      <div class="form-group">
        <label>Weight</label>
      <input class="form-control" name="puppies_weight"/>
      </div>
      </div>
      </div>
      <div class="row">
      <div class="col-sm-6">
      <div class="form-group">
        <label>Coats</label>
      <input class="form-control" name="puppies_coat"/>
      </div>
      </div>
      <div class="col-sm-6">
      <div class="form-group">
        <label>Bones</label>
      <input class="form-control" name="puppies_bones"/>
      </div>
      </div>
      </div>
      <div class="row">
      <div class="col-sm-6">
      <div class="form-group">
        <label>Nails</label>
      <input class="form-control" name="puppies_nails" />
      </div>
      </div>
      <div class="col-sm-6">
      <div class="form-group">
        <label>Skin Condition</label>
      <input class="form-control" name="puppies_skincondition" />
      </div>
      </div>
      </div>
      <div class="row">
      <div class="col-sm-6">
      <div class="form-group">
        <label>Bites</label>
      <input class="form-control" name="puppies_bites" />
      </div>
      </div>
      <div class="col-sm-6">
      <div class="form-group">
        <label>Testicles, if descended</label>
      <input class="form-control" name="puppies_testicles" />
      </div>
      </div>
      </div>
      
      <div class="row">
      <div class="col-sm-6">
      <div class="form-group">
        <label>Temperaments</label>
      <textarea class="form-control" name="puppies_temperaments"></textarea>
        </div>
      </div>
      <div class="col-sm-6">
      <div class="form-group">
        <label>Uniformity Of Size</label>
      <textarea class="form-control" name="puppies_uniformity_of_size"></textarea>
        </div>
      </div>
      </div>
      <div class="row">
      <div class="col-sm-6">
      <div class="form-group">
        <label>Special Recommendations</label>
      <textarea class="form-control" name="special_recommendation"></textarea>
      </div>
      </div>
      <div class="col-sm-6">
      <div class="form-group">
        <label>Special Features (if any)</label>
      <textarea class="form-control" name="special_features"></textarea>
      </div>
      </div>
      </div>
      <div class="row">
      <div class="col-sm-6">
        <div class="form-group">
          <label>Status</label>
          <select class="form-control" id="status" name="inspection_status">
            <option selected value="2">Approved</option>
            <option selected value="4">Rejected</option>
          </select>
        </div>
      </div>
      <div class="col-sm-6">
        <div class="form-group">
          <label>Remarks</label>
        <textarea class="form-control" name="remarks"></textarea>
        </div>
        </div>
      </div>
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
    url:"{{ route('dynamicdependent.fetch_inspection') }}",
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
     $('#inspection_result').html(result);
    }

   });
  

  }
 });


  });
</script>

  @endsection