@extends('layouts.master')

@section('content')

          <div class="content-i">
            <div class="content-box">
              <div class="row">
  <div class="col-lg-12">
    <div class="element-wrapper">
      <h6 class="element-header">
        Litter Inspection Edit
      </h6>
      <!-- @if ($message = Session::get('success'))
        <p></p>
          <div class="alert alert-success" id="msg">
              <p>{{ $message }}</p>
          </div>
        @elseif ($message = Session::get('danger'))
          <div class="alert alert-danger" id="msg">
              <p>{{ $message }}</p>
          </div>
        @endif -->
      <div class="element-box">
        {!! Form::open(array('route' => ['LitterInspections.update', $litter_inspect->id],'method'=>'PATCH','enctype'=>'multipart/form-data')) !!}
          @csrf
          <div class="row">
            <div class="col-sm-6">
          <div class="form-group">
            <label for="">Breeder</label>
            <select class="form-control selectpicker select2" data-live-search="true" id="breeder_id" name="breeder_id">
            <option value="{{ $litter_inspect->breeder->id }}">{{ $litter_inspect->breeder->first_name }}</option>
            
            </select>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="form-group">
            <label for="">City</label>
            <select class="form-control select2 selectpicker" data-live-search="true" id="city_id" name="city_id">
              <option value="{{ $litter_inspect->litter_city->id }}">{{ $litter_inspect->litter_city->city }}</option>
             
            </select>
          </div>
        </div>
      </div>
          <div class="row">
            <div class="col-sm-3">
              <div class="form-group">
                <label for=""> Sire</label>
                <select class="form-control select2 selectpicker" data-live-search="true" id="sire_id" name="sire_id">
                  <option value="{{ $litter_inspect->sire_dog->id }}">{{ $litter_inspect->sire_dog->dog_name }}</option>
                  
            </select>
              </div>
            </div>
            <div class="col-sm-3">
              <div class="form-group">
                <label for="">Dam</label>
                <select class="form-control select2 selectpicker" data-live-search="true" id="dam_id" name="dam_id">
                  <option value="{{ $litter_inspect->dam_dog->id }}">{{ $litter_inspect->dam_dog->dog_name }}</option>
                 
            </select>
              </div>
            </div>
            <div class="col-sm-3">
              <div class="form-group">
                <label for="">Sire KP:</label>
              <input type="text" class="form-control" value="{{ $litter_inspect->sire_dog->KP }}" id="sire_kp" name="sire_kp" readonly />
              </div>
            </div>
            <div class="col-sm-3">
              <div class="form-group">
                <label for="">Dam KP:</label>
              <input type="text" class="form-control" value="{{ $litter_inspect->dam_dog->KP }}" id="dam_kp" name="dam_kp" readonly />
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-6">
            <div class="form-group">
              <label for="">Whelping Date:</label>
              <input type="date" class="form-control" value="{{ $litter_inspect->whelping_date }}" id="whelping_date" name="whelping_date" readonly />
            </div>
          </div>
          <div class="col-sm-6">
            <div class="form-group">
              <label for="">Mating Date: </label>
              <input type="date" class="form-control" id="mating_date" value="{{ $litter_inspect->mating_date }}" name="mating_date" readonly />
            </div>
          </div>
        </div>
          <div class="row">
            <div class="col-sm-3">
            <div class="form-group">
              <label for="">No of Puppies: </label>
              <input type="text" value="{{ $litter_inspect->puppies_born }}" class="form-control" id="puppies_born" name="puppies_born" required />
            </div>
          </div>
          <div class="col-sm-3">
            <div class="form-group">
              <label for="">No of Male Puppies Born: </label>
              <input type="text" value="{{ $litter_inspect->male_puppies }}" class="form-control" id="male_puppies" name="male_puppies" />
            </div>
          </div>
          <div class="col-sm-3">
            <div class="form-group">
              <label for="">No of Female Puppies Born:</label>
              <input type="text" value="{{ $litter_inspect->female_puppies }}" class="form-control" id="female_puppies" name="female_puppies" />
            </div>
          </div>
          <div class="col-sm-3">
            <div class="form-group">
              <label for="">Puppies Expired:</label>
              <input type="text" value="{{ $litter_inspect->expired_puppies }}" class="form-control" id="expired_puppies" name="expired_puppies" />
            </div>
          </div>
        </div>
          <div class="row">
            <div class="col-sm-6">
            <div class="form-group">
              <label>Address</label>
              <textarea class="form-control" rows="3" id="address" name="address">{{ $litter_inspect->address }}</textarea>
              <input type="hidden" value="{{ $user->id }}" name="updated_by" />
            </div>
          </div>
          
        </div>
        <div class="text-center">        
          <legend class="form-header"><span>Overall Condition of the Dam And Litter</span></legend>
          </div>
          <div class="row">
            <div class="col-sm-6">
            <div class="form-group">
              <label><strong>Condition of Dam</strong></label>
            <textarea class="form-control" name="dam_condition" id="dam_condition"></textarea>
              </div>
            </div>
            <div class="col-sm-6">
            <div class="form-group">
              <label><strong>Condition of Puppies</strong></label>
            <textarea class="form-control" name="puppy_condition" id="puppy_condition"></textarea>
            </div>
            </div>
            </div>
            <div class="row">
              <div class="col-sm-6">
              <div class="form-group">
                <label><strong>Uniformity Of Size</strong></label>
              <textarea class="form-control" id="uniformity_size" name="uniformity_size"></textarea>
                </div>
              </div>
              <div class="col-sm-6">
              <div class="form-group">
                <label><strong>Special Recommendations</strong></label>
              <textarea class="form-control" name="special_recommendation" id="special_recommendation"></textarea>
              </div>
              </div>
              </div>
              <div class="row">
                <div class="col-sm-6">
                  <div class="form-group">
                    <label><strong>Special Features (if any)</strong></label>
                  <textarea class="form-control" id="special_feature" name="special_feature"></textarea>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label><strong>Status</strong></label>
                    <select class="form-control" id="status" name="status">
                      @if($litter_inspect->status == 1)
                        <option selected value="2">Approved</option>
                        <option selected value="4">Rejected</option>
                      @elseif($litter_inspect->status == 2)
                        <option selected value="1">Pending</option>
                        <option selected value="4">Rejected</option>
                      @elseif($litter_inspect->status == 3)
                        <option selected value="1">Pending</option>
                        <option selected value="2">Approved</option>
                        <option selected value="4">Rejected</option>
                      @elseif($litter_inspect->status == 4)
                        <option selected value="1">Pending</option>
                        <option selected value="2">Approved</option>
                      @endif
                    </select>
                  </div>
                </div>
              </div>
        <div class="row">
        <div class="col-sm-6">
        <div class="form-group">
        <label for="files"><strong>Select images:</strong></label>
        <input class="form-control" type="file" id="images" name="images[]" multiple>
      </div>
    </div>
    <div class="col-sm-6">
        <div class="form-group">
          <label><strong>Remarks</strong></label>
              <textarea class="form-control" rows="3" id="remarks" name="remarks"></textarea>
            </div>
          </div>
        </div>
          </fieldset>
          <div class="form-buttons-w">
            <button class="btn btn-primary" type="submit"> Submit Result</button>
          </div>
          {!! Form::close() !!}
      </div>
    </div>
  </div>
</div>
</div>
</div>

  @endsection