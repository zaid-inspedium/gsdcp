@extends('layouts.master')


@section('content')
<div class="content-i">
            <div class="content-box"><div class="row">
  <div class="col-lg-12">
    <div class="element-wrapper">
      <h6 class="element-header">
        Create New Module - Action
      </h6>

      <div class="element-box">
        <div class="pull-left">
            <a class="btn btn-primary" href="{{ route('Permission.index') }}"> Back</a>
        </div>
        <br>
        <br>
        <br>
        <br>
    



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


{!! Form::open(array('route' => 'Permission.store','method'=>'POST')) !!}
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-6">
        <div class="form-group">
            <label>Modules:</label>
            <select class="form-control select2" name="module_id" id="module_id">
                <option>- Select Module -</option>
                @foreach($modules as $value)
              <option value="{{ $value->id }}">
                <!-- {{ Form::checkbox('permission[]', $value->id, false, array('class' => 'name')) }} -->
                {{ $value->module_title }}
              </option>
              @endforeach
            </select>
          </div>
        </div>
    <div class="col-xs-12 col-sm-12 col-md-6">
        <div class="form-group">
            <strong>Permission:</strong>
            {!! Form::text('permission', null, array('placeholder' => 'Permission','class' => 'form-control')) !!}
        </div>
    </div>
    
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 text-right">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>
{!! Form::close() !!}
      </div>
    </div>
  </div>
</div>
</div>
</div>

@endsection