<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
        &nbsp; Kennels - Form
      </h6>
      <div class="element-box">
        <form action="{{ route('Kennels.store') }}" method="POST" id="formValidate">
          @csrf
          <span class="badge badge-important pull-right" style="color:white;background-color: red;">Kennels Registration Fee: 0</span>
          <br>
          <legend><span>Kennel Entry</span></legend>
          <div class="form-group">
            <label for="">Owner<span class="req" style="color:red;">*</span></label>


          <select class="form-control select2" id="owner" name="owner_id" required>
              <option value="0">
                Select Owner
              </option>
              @foreach($owners as $owner)
                <option value="{{ $owner->id }}">
                  {{ $owner->first_name }} ({{ $owner->membership_no }})
                </option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="">Kennel Name <span class="req" style="color:red;">*</span></label><input id="kennel" name="kennel_name" class="form-control" placeholder="Kennel" type="text">
          </div>
          <div class="row">
            <div class="col-sm-6">
              <div class="form-group">
                <label for="">Prefix</label><input id="prefix" name="prefix" class="form-control" placeholder="Prefix" type="text">
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label for="">Suffix</label><input id="suffix" name="suffix" class="form-control" placeholder="Suffix" type="text">
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
            <label for="">Website</label><input id="website" name="website" class="form-control" placeholder="Website" type="text">
          </div>
          <div class="form-group">
            <label for="">Description</label></label><textarea id="description" name="description" class="form-control" placeholder="Description" type="text" cols="150" rows="5"></textarea>
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