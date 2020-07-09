@extends('layouts.master')
<style type="text/css">
.form-check label input { margin-right:20px; }
.no-drop {cursor: no-drop;}

</style>
@section('content')

  <div class="content-i">
  <div class="content-box"><div class="row">
  <div class="col-lg-12">
    <div class="element-wrapper">
      <h6 class="element-header">
        <a action="back" href="javascript: window.history.back();" class="btn btn-sm btn-secondary">
          <i class="fa fa-backward"> </i><span> &nbsp; Back</span>
        </a>
        &ensp;Edit Judge Information
      </h6>
      <div class="element-box">
        {!! Form::open(array('route' => ['judges.update', $judge[0]->id],'method'=>'PATCH','enctype'=>'multipart/form-data')) !!}
        @csrf
        @method('PUT')
        <input type="hidden" id="idd" name="idd" value="{{$judge[0]->id}}"/>


          <div class="form-group">
            <label for=""><strong>Full Name</strong></label><input class="form-control" value="{{$judge[0]->full_name}}" placeholder="Enter Full Name" type="text" id="full_name" name="full_name">
          </div>
      <div class="row">
            <div class="col-sm-6">
              <div class="form-group">
              <label for=""><strong>Image</strong></label>
              <br>
                <img class="rounded img-thumbnail" src="{{ URL::asset("judge_images/{$judge[0]->image}") }}" alt="image not found" height="200" width="200" />
                <input class="form-control" type="file" id="img" name="img" accept="image/png, image/jpeg">
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
              <label for=""><strong>Signature</strong></label>
              <br>
                <img class="rounded img-thumbnail" src="{{ URL::asset("judge_signatures/{$judge[0]->signature}") }}" alt="signature not found" height="200" width="200" />
                <input class="form-control" type="file" id="sig" name="sig" accept="image/png, image/jpeg">
              </div>
            </div>
          </div>

          <div class="form-group">
  <label><strong>Enter Description Below</strong></label>
          <textarea cols="80" id="ckeditor1" name="description" rows="10">{{$judge[0]->description}}</textarea>
          </div>
          
            
          <div class="form-buttons-w">
            <button class="btn btn-primary" type="submit">Submit</button>
            <button class="btn btn-secondary" type="reset">Reset</button>
            <a type="button" href="{{ route('judges.index') }}" class="btn btn-danger">
              Back
            </a>
          </div>
        </form>
          
      </div>
    </div>
  </div>

</div>
<script>



function Reload(this1) {
  // document.querySelector('#sire').value = 'Loading...'
  // document.getElementById("sire").value = 'Loading...';
  this1.innerHTML='<i class="fa fa-refresh fa-spin"></i>';
  // document.getElementById("sire").value = '';  

}

function Friendly_URLFunction() {
  var str = document.getElementById("dog_name").value;
  str = str.replace(/\s+/g, '-').toLowerCase();
  document.getElementById("friendly_URL").value = str;
  // console.log(str); // "sonic-free-games"
}
</script>
@endsection