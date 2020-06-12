@extends('layouts.master')


@section('content')
<div class="content-i">
            <div class="content-box"><div class="row">
  <div class="col-lg-12">
    <div class="element-wrapper">
      <h6 class="element-header">
        Create New Roles
      </h6>

      <div class="element-box">
        <div class="pull-left">
            <a class="btn btn-primary" href="{{ route('roles.index') }}"> Back</a>
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


{!! Form::open(array('route' => 'roles.store','method'=>'POST')) !!}
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-6">
        <div class="form-group">
            <strong>Name:</strong>
            {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-6">
        <div class="form-group">
            <label>Permissions</label>
            <select class="form-control select2" multiple="true" name="permission[]" id="permission[]">
                <option>- Select Roles -</option>
                @foreach($permission as $value)
              <option value="{{ $value->id }}">
                <!-- {{ Form::checkbox('permission[]', $value->id, false, array('class' => 'name')) }} -->
                {{ $value->name }}
              </option>
              @endforeach
            </select>
          </div>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 text-right">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>
{!! Form::close() !!}
</div></div></div></div></div></div>

@endsection