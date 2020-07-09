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
        &nbsp; Module - Update
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
        {!! Form::open(array('route' => ['Modules.update', $module->id],'method'=>'PATCH')) !!}
          @csrf

          
          <div class="form-group">
            <label for="">Module</label><input id="module" name="module" class="form-control" value="{{$module->name}}" placeholder="Enter Module's Name" type="text">
          </div>
          <div class="form-group">
            <label for="">Module Title</label><input id="module_title" name="module_title" value="{{$module->module_title}}" class="form-control" placeholder="Enter Module Title" type="text">
          </div>
          <div class="form-group">
            <label for="">Keep Module Active?</label>
          <div class="form-check">
            @if($module->status == 1)
            <label class="form-check-label"><input class="form-check-input" checked name="status" type="checkbox" value="1">Yes</label>
            @else
            <label class="form-check-label"><input class="form-check-input" name="status" type="checkbox" value="1">Yes</label>
            @endif
              </div>
              <div class="form-check">
                @if($module->status == 0)
                <label class="form-check-label"><input class="form-check-input" checked name="status" type="checkbox" value="0">No</label>
                @else
                <label class="form-check-label"><input class="form-check-input" name="status" type="checkbox" value="0">No</label>
                @endif
              </div>
            </div>
          
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