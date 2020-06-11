<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
@extends('layouts.master')
@section('content')
  
      <div class="content-i">
            <div class="content-box"><div class="row">
  <div class="col-lg-12">
    <div class="element-wrapper">
      <h6 class="element-header">
        Kennels - Update
      </h6>
      <div class="element-box">
        <form action="{{ route('Kennels.update',$kennel->id) }}" method="POST" id="formValidate">
          @csrf
          @method('PUT')
       
          <span class="badge badge-important pull-right" style="color:white;background-color: red;">Kennels Registration Fee: 0</span>
          <br>
          <legend><span>Kennel Entry</span></legend>
          <div class="form-group">
            <label for="">Owner<span class="req" style="color:red;">*</span></label>


          <select class="form-control" id="owner" name="owner_id" required>
              <option value="{{ $kennel->owner_id }}">
                {{ $kennel->owners->first_name }}({{ $kennel->owners->membership_no }})
              </option>
              @foreach($owners as $owner)
                <option value="{{ $owner->id }}">
                  {{ $owner->first_name }} ({{ $owner->membership_no }})
                </option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
          <label for="">Kennel Name <span class="req" style="color:red;">*</span></label><input id="kennel" name="kennel_name" value="{{ $kennel->kennel_name}}" class="form-control" placeholder="Kennel" type="text">
          </div>
          <div class="row">
            <div class="col-sm-6">
              <div class="form-group">
              <label for="">Prefix</label><input id="prefix" name="prefix" class="form-control" value="{{ $kennel->prefix }}" placeholder="Prefix" type="text">
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label for="">Suffix</label><input id="suffix" name="suffix" class="form-control" value="{{ $kennel->suffix }}" placeholder="Suffix" type="text">
              </div>
            </div>
          </div>
          <br>
          <div class="form-group">
                <label>
                  <strong>Old Record:</strong> &nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp;
                  <input class="form-check-input" name="old_record" type="checkbox" value="1">
                </label>
          </div>
          <br>
          
  
          <div class="form-group">
            <label for="">Website</label><input id="website" name="website" class="form-control" value="{{ $kennel->website }}" placeholder="Website" type="text">
          </div>
          <div class="form-group">
            <label for="">Description</label></label><textarea id="description" name="description" class="form-control" placeholder="Description" type="text" cols="150" rows="5"> {{ $kennel->description}}</textarea>
          </div>
         
      
          <div class="form-buttons-w">
          	<button class="btn btn-primary" type="submit"> Submit</button>
          	<button class="btn btn-secondary" type="reset"> Reset</button>
	        <a type="button" href="{{ route('Kennels.index') }}" class="btn btn-danger">
	          Cancel
	        </a>
          </div>
        </form>
      </div>
    </div>
  </div>
            
        </div>
      </div>
    </div>
@endsection