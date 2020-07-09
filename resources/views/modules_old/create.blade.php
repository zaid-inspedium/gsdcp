@extends('layouts.master')

@section('content')
  
      <div class="content-i">
            <div class="content-box"><div class="row">
  <div class="col-lg-12">
    <div class="element-wrapper">
      <h6 class="element-header">
        Module - Form
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
        <form action="{{ route('Modules.store')}}" method="post">
          @csrf
          <div class="form-group">
            <label for="">Module</label><input id="module" name="name" class="form-control" placeholder="Enter Module's Name" type="text">
          </div>
          <div class="form-group">
            <label for="">Module Title</label><input id="module_title" name="module_title" class="form-control" placeholder="Enter Module Title" type="text">
          </div>
          <div class="form-group">
            <label for="">Keep Module Active?</label>
          <div class="form-check">
                <label class="form-check-label"><input class="form-check-input" name="status" type="checkbox" value="1">Yes</label>
              </div>
              <div class="form-check">
                <label class="form-check-label"><input class="form-check-input" name="status" type="checkbox" value="0">No</label>
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

@endsection