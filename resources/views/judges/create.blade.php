@extends('layouts.master')

@section('content')

<div class="content-i">
  <div class="content-box"><div class="row">
  <div class="col-lg-12">
    <div class="element-wrapper">
      <h6 class="element-header">
        <a action="back" href="javascript: window.history.back();" class="btn btn-sm btn-secondary">
          <i class="fa fa-backward"> </i><span> &nbsp; Back</span>
        </a>
        &ensp;New Judge Form
      </h6>
      <div class="element-box">
        <form action="{{ route('judges.store') }}" method="POST" enctype="multipart/form-data">
          @csrf
            
          <div class="form-group">
            <label for="">Full Name</label><input class="form-control" placeholder="Enter Full Name" type="text" id="full_name" name="full_name">
          </div>

          <div class="row">
            <div class="col-sm-6">
              <div class="form-group">
              <label for="">Image</label>
                <input class="form-control" type="file" id="img" name="img" accept="image/png, image/jpeg">
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
              <label for="">Signature</label>
                <input class="form-control" type="file" id="sig" name="sig" accept="image/png, image/jpeg">
              </div>
            </div>
          </div>

          
          
          <div class="form-group">
            <label><strong>Enter Description Below</strong></label>
            <textarea cols="80" id="ckeditor1" name="description" rows="10"></textarea>
          </div>
          <div class="form-buttons-w">
            <button class="btn btn-primary" type="submit"> Submit</button>
            <button class="btn btn-secondary" type="reset"> Reset</button>
            <a action="back" href="javascript: window.history.back();" class="btn btn-danger">
              <i class="fa fa-times"> </i><span> &nbsp; Cancel</span>
            </a>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
</div>
</div>


<script src="{{asset('assets/bower_components/ckeditor/ckeditor.js')}}"></script>
<script>
function Friendly_URLFunction() {
  var str = document.getElementById("title").value;
  str = str.replace(/\s+/g, '-').toLowerCase();
  document.getElementById("friendly_URL").value = str;
  // console.log(str); // "sonic-free-games"
}
</script>

@endsection      