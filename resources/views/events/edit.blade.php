@extends('layouts.master')
<style type="text/css">
.form-check label input { margin-right:20px; }
.no-drop {cursor: no-drop;}
#myDIV2 {
  display: none;
}
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
        &ensp;Events - Form
      </h6>

      <div class="element-box">
        <form action="{{ route('Event.update',$event->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
          <legend><span><button onclick="myFunction()" class="btn btn-primary mr-2 inline-block" type="button">Event Entry</button></span></legend>
        <div class="container" id="myDIV">

          <div class="form-group row">
            <div class="col-sm-2"></div>
            <label class="col-form-label col-sm-2 h6"> Type</label>
            <div class="col-sm-3">
              <select class="form-control" id="type"
                name="type">
                @if ($event->type === 'Show')
                  <option value="Show">Show</option>
                  <option value="Breed Survey">Breed Survey</option>
                @else
                  <option value="Breed Survey">Breed Survey</option>
                  <option value="Show">Show</option>
                @endif
              </select>
            </div>
            <div class="col-sm-2"></div>
          </div>
          <!-- <div class="form-group row">
            <div class="col-sm-2"></div>
            <label class="col-form-label col-sm-2 h6"> Url</label>
            <div class="col-sm-4">

              <input id="url" name="url" class="form-control no-drop" placeholder="" type="text" readonly>
              <small class="text-muted">Only alphanumerics and hyphen ( - ) are allowed</small>
            </div>
            <div class="col-sm-2"></div>
          </div> -->
          <hr>
          
          <div class="form-group row">
            <div class="col-sm-2"></div>
            <label class="col-form-label col-sm-2 h6"> Title</label>
            <div class="col-sm-3">
              <input type="hidden" name="friendly_URL" id="friendly_URL" value="">
              <input id="title" name="title" value="{{ $event->title }}" class="form-control" data-error="Please fill title" placeholder="Enter title here" required="required" type="text" onkeyup="Friendly_URLFunction()">
              <div class="help-block form-text with-errors form-control-feedback"></div>
            </div>
            <div class="col-sm-2"><span class="text-danger h4" data-toggle="tooltip" data-placement="top" 
            title="required"> *</span></div>
          </div>
          <hr>
          <div class="form-group row">
            <div class="col-sm-2"></div>
            <label class="col-form-label col-sm-2 h6"> Start Date</label>
            <div class="col-sm-3">
              <div class="date-input">
                <input class="single-daterange form-control" id="start_date" name="start_date" value="{{date('m-d-Y',strtotime($event->start_date))}}" type="text">
              </div>
            </div>
            <div class="col-sm-2"><span class="text-danger h4" data-toggle="tooltip" data-placement="top" 
            title="required"> *</span></div>
          </div>
          <hr>
          <div class="form-group row">
            <div class="col-sm-2"></div>
            <label class="col-form-label col-sm-2 h6"> End Date</label>
            <div class="col-sm-3">
              <div class="date-input">
                <input class="single-daterange form-control" id="end_date" name="end_date" value="{{date('m-d-Y',strtotime($event->end_date))}}" type="text">
              </div>
            </div>
            <div class="col-sm-2"><span class="text-danger h4" data-toggle="tooltip" data-placement="top" 
            title="required"> *</span></div>
          </div>
          <hr>
          <div class="form-group row">
            <div class="col-sm-2"></div>
            <label class="col-form-label col-sm-2 h6"> Last Date Of Entry</label>
            <div class="col-sm-3">
              <div class="date-input">
                <input class="single-daterange form-control" id="last_date_of_entry" name="last_date_of_entry" value="{{date('m-d-Y',strtotime($event->last_date_of_entry))}}" type="text">
              </div>
            </div>
            <div class="col-sm-2"><span class="text-danger h4" data-toggle="tooltip" data-placement="top" 
            title="required"> *</span></div>
          </div>
          <hr>
          <div class="form-group row">
            <div class="col-sm-2"></div>
            <label class="col-form-label col-sm-2 h6"> City</label>
            <div class="col-sm-3">
              <select class="form-control select2" name="city" id="city">
                <option value="{{$event->city}}">{{ $event->city }}</option>
                @foreach($total_cities as $city)
                  <option value="{{ $city->city }}">{{ $city->city }}</option>
                @endforeach
              </select>
            </div>
          </div>
          <hr>
          <div class="form-group row">
            <div class="col-sm-2"></div>
            <label class="col-form-label col-sm-2 h6"> Event Venue</label>
            <div class="col-sm-3">
              <input class="form-control" name="venue" id="venue" placeholder="Enter venue here" value="{{ $event->venue }}" type="text">
            </div>
            <div class="col-sm-2"></div>
          </div>
          <hr>
          <div class="form-group row">
            <div class="col-sm-2"></div>
            <label class="col-form-label col-sm-2 h6"> Judge(s)</label>
            <div class="col-sm-3">
              <input class="form-control" name="judge" value="{{ $event->judge }}" id="judge" placeholder="Enter Judges name here" type="text">
            </div>
            <div class="col-sm-2">
              <div class="row-actions">
                <span class="h5" data-toggle="tooltip" data-placement="top" 
                title="like: name1, name2, ..."> ?</span>&ensp;
              </div>
            </div>
          </div>
          <hr>
          <div class="form-group row">
            <div class="col-sm-2"></div>
            <label class="col-form-label col-sm-2 h6"> Event Fee</label>
            <div class="col-sm-3">
              <input class="form-control" name="fee" value="{{ $event->fee }}" id="fee" placeholder="Enter fee here" type="text">
            </div>
            <div class="col-sm-2"></div>
          </div>
          <hr>
          
          <fieldset class="form-group">
            <legend><span>Document</span></legend>
            <input type="file" id="attachment" name="attachment" accept="image/png, image/jpeg">
            <input type="hidden" name="old_attachment" value="{{ $event->document }}">
          </fieldset>
            
        </div>

        <legend><span><button onclick="myFunction2()" class="btn btn-primary mr-2 inline-block" type="button">Description</button></span></legend>
        <div class="container" id="myDIV2">

          <textarea cols="80" id="ckeditor1" name="description" rows="10">{{ $event->description }}</textarea>
          
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
<script src="{{asset('assets/bower_components/ckeditor/ckeditor.js')}}"></script>
<script>
function myFunction() {
  var x = document.getElementById("myDIV");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}
function myFunction2() {
  var x = document.getElementById("myDIV2");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}

function Friendly_URLFunction() {
  var str = document.getElementById("title").value;
  str = str.replace(/\s+/g, '-').toLowerCase();
  document.getElementById("friendly_URL").value = str;
  // console.log(str); // "sonic-free-games"
}
</script>
@endsection