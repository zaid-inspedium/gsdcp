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
        &nbsp; Edit Roles
      </h6>

      <div class="element-box">
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


{!! Form::model($role, ['method' => 'PATCH','route' => ['roles.update', $role->id]]) !!}
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
                <!-- {{ Form::checkbox('permission[]', $value->id, in_array($value->id, $rolePermissions) ? true : false, array('class' => 'name')) }} -->
                @if(array_search($value->id, $rolePermissions))
                <option value="{{ $value->id }}" selected="true">{{ $value->name }}</option>
                @else
                <option value="{{ $value->id }}">{{ $value->name }}</option>
                @endif
            @endforeach
        </select>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 text-right">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>
{!! Form::close() !!}


@endsection