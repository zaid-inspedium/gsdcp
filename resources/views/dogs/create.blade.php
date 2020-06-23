@extends('layouts.master')
<style type="text/css">
.form-check label input { margin-right:20px; }
.no-drop {cursor: no-drop;}
#myDIV2, #myDIV3, #remove_foreign_no{
  display: none;
}
</style>
@section('content')

  <div class="content-i">
  <div class="content-box"><div class="row">
  <div class="col-lg-12">
    <div class="element-wrapper">
      <h6 class="element-header">
        Dogs - Form
      </h6>

      <div class="element-box">
        <form action="{{ route('Dog.store') }}" method="POST" id="formValidate" enctype="multipart/form-data">
        @csrf
          <legend><span><button onclick="myFunction()" class="btn btn-primary mr-2 inline-block" type="button">Dog Entry</button></span></legend>
        <div class="container" id="myDIV">

          <div class="form-group row">
            <div class="col-sm-2"></div>
            <label class="col-form-label col-sm-2 h6"> Dog Name</label>
            <div class="col-sm-3">
              <input type="hidden" name="friendly_URL" id="friendly_URL" value="">
              <input id="dog_name" name="dog_name" class="form-control" data-error="Please input dog name" placeholder="Enter Dog's Name" required="required" type="text" onkeyup="Friendly_URLFunction()">
              <div class="help-block form-text with-errors form-control-feedback"></div>
            </div>
            <div class="col-sm-2"><span class="text-danger h4" data-toggle="tooltip" data-placement="top" 
            title="required"> *</span></div>
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
            <label class="col-form-label col-sm-2 h6"> Kennel</label>
            <div class="col-sm-3">
              <input id="kennel" name="kennel" class="form-control" placeholder="Kennel" type="text">
            </div>
            <div class="col-sm-2"></div>
          </div>
          <hr>
          <div class="form-group row">
            <div class="col-sm-2"></div>
            <label class="col-form-label col-sm-2 h6"> Breeder</label>
            <div class="col-sm-3">
              <input id="breeder" name="breeder" class="form-control" placeholder="Breeder" type="text">
              <input type="hidden" name="breed" id="breed" value="German Shepherd Dog">
            </div>
            <div class="col-sm-2"></div>
          </div>
          <hr>
          <div class="form-group row">
            <div class="col-sm-2"></div>
            <label class="col-form-label col-sm-2 h6"> Sex</label>
            <div class="col-sm-3">
              <select class="form-control" id="sex"
                name="sex">
                  <option value="Male">
                    Male
                  </option>
                  <option value="Female">
                    Female
                  </option>
              </select>
            </div>
            <div class="col-sm-2"><span class="text-danger h4" data-toggle="tooltip" data-placement="top" 
            title="required"> *</span></div>
          </div>
          <hr>
          <div class="form-group row">
            <div class="col-sm-2"></div>
            <label class="col-form-label col-sm-2 h6"> Whelping Date</label>
            <div class="col-sm-3">
              <div class="date-input">
                <input class="single-daterange form-control" id="dob" name="dob" placeholder="Date of Whelping" type="text" value="">
              </div>
            </div>
            <div class="col-sm-2"><span class="text-danger h4" data-toggle="tooltip" data-placement="top" 
            title="required"> *</span></div>
          </div>
          <hr>
          <div class="form-group row">
            <div class="col-sm-2"></div>
            <label class="col-form-label col-sm-2 h6"> Sire</label>
            <div class="col-sm-3">
              
              <select class="form-control select2" name="sire" id="sire">
                <option>
                  Select One
                </option>
                @foreach($total_sire as $sire)
                  <option value="{{ $sire->id }}">{{ $sire->dog_name }}</option>
                @endforeach
                
              </select>
            </div>
            <div class="col-sm-2">
              <div class="row-actions">
                <a href="#" data-toggle="tooltip" data-placement="top" 
                    title="Add New Sire"><i class="fa fa-plus-circle"></i></a>&ensp;
                <a href="#" data-toggle="tooltip" data-placement="top"
                    title="Reload Sire(s)" onclick="Reload(this)" id=""><i class="fa fa-refresh"></i></a>
              </div>
            </div>
          </div>
          <hr>
          <div class="form-group row">
            <div class="col-sm-2"></div>
            <label class="col-form-label col-sm-2 h6"> Dam</label>
            <div class="col-sm-3">
              <select class="form-control select2" name="dam" id="dam">
                <option>
                  Select One
                </option>
                @foreach($total_dam as $dam)
                  <option value="{{ $dam->id }}">{{ $dam->dog_name }}</option>
                @endforeach
              </select>
            </div>
            <div class="col-sm-2">
              <div class="row-actions">
                <a href="#" data-toggle="tooltip" data-placement="top" 
                    title="Add New Dam"><i class="fa fa-plus-circle"></i></a>&ensp;
                <a href="#" data-toggle="tooltip" data-placement="top"
                    title="Reload Dam(s)" onclick="Reload(this)" id=""><i class="fa fa-refresh"></i></a>
              </div>
            </div>
          </div>
            
        </div>

        <legend><span><button onclick="myFunction2()" class="btn btn-primary mr-2 inline-block" type="button">Identification Data</button></span></legend>
        <div class="container" id="myDIV2">

          <div class="form-group row">
            <div class="col-sm-2"></div>
            <label class="col-form-label col-sm-2 h6"> Show Title</label>
            <div class="col-sm-3">
              <input class="form-control" name="show_title" id="show_title" placeholder="Show Title" type="text">
              <div class="help-block form-text with-errors form-control-feedback"></div>
            </div>
            <div class="col-sm-2"></div>
          </div>
          <hr>
          <div class="form-group row">
            <div class="col-sm-2"></div>
            <label class="col-form-label col-sm-2 h6"> Microchip/Tattoo #</label>
            <div class="col-sm-3">
              <input class="form-control" name="microchip" id="microchip" placeholder="Microchip/Tattoo #" type="text">
            </div>
            <div class="col-sm-2"></div>
          </div>
          <hr>
          <div class="form-group row">
            <div class="col-sm-2"></div>
            <label class="col-form-label col-sm-2 h6"> KP #</label>
            <div class="col-sm-3">
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    <input type="checkbox" id="kp_cb" onclick="myFunctionKP()">
                  </div>
                </div>
                <input type="text" class="form-control" name="KP" id="KP">
              </div>
            </div>
            <div class="col-sm-2"></div>
          </div>
          <hr>
          <div class="form-group row">
            <div class="col-sm-2"></div>
            <label class="col-form-label col-sm-2 h6"> Foreign Reg #</label>
            <div class="col-sm-3">
              <input class="form-control" name="dog_reg_numbers" id="for_reg" placeholder="Foreign Reg # Like SZ-565454, HR-12455" type="text">
            </div>
            <div class="col-sm-2">
              <div class="row-actions">
                <span class="h5" data-toggle="tooltip" data-placement="top" 
                title="Foreign Reg # Like SZ-565454, HR-12455"> ?</span>&ensp;
                <!-- <a href="#" data-toggle="tooltip" data-placement="top" 
                    title="Multiple Reg #" id="add_foreign" onclick="addRowForeign()"><i class="fa fa-plus-circle"></i></a> -->
              </div>
            </div>
            <div class="col-sm-2"></div>
          </div>
          <div id="content"></div>
          <hr>
          <div class="form-group row">
            <div class="col-sm-2"></div>
            <label class="col-form-label col-sm-2 h6"> Owner</label>
            <div class="col-sm-3">
              <select class="form-control select2" name="owner_id[]" id="owner_id" style="width: 290px;" multiple="true">
                <option>
                  Select One
                </option>
                @foreach($total_users as $users)
                  <option value="{{ $users->id }}">{{ $users->first_name.' '.$users->last_name }}</option>
                @endforeach
              </select>
            </div>
            <div class="col-sm-2">
              <div class="row-actions">
                <span class="text-danger h4" data-toggle="tooltip" data-placement="top" 
                  title="required"> *</span>&ensp;
                <a href="#" data-toggle="tooltip" data-placement="top" 
                    title="Add New Member"><i class="fa fa-user"></i></a>&ensp;
                <a href="#" data-toggle="tooltip" data-placement="top"
                    title="Reload Members" onclick="Reload(this)" id=""><i class="fa fa-refresh"></i></a>&ensp;
              </div>
            </div>
          </div>
          <hr>
          <div class="form-group row">
            <div class="col-sm-2"></div>
            <label class="col-form-label col-sm-2 h6"> Achievments</label>
            <div class="col-sm-3">
              <input class="form-control" name="achievements" id="achievements" placeholder="SchH,IPO,HGH" type="text">
            </div>
            <div class="col-sm-2"></div>
          </div>
          <hr>
          <div class="form-group row">
            <div class="col-sm-2"></div>
            <label class="col-form-label col-sm-2 h6"> KKL</label>
            <div class="col-sm-3">
              <input class="form-control" placeholder="KKL" type="text" name="KKL" id="KKL">
            </div>
            <div class="col-sm-2"></div>
          </div>
          <hr>

        </div>
          <legend><span><button onclick="myFunction3()" class="btn btn-primary mr-2 inline-block" type="button">Breed Survey Information</button></span></legend>
          <div class="container" id="myDIV3">
            <div class="form-group row">
              <div class="col-sm-2"></div>
              <div class="col-sm-6">
                <div class="form-check">
                  <label class="form-check-label h6">Breed Survey Done? &ensp; &ensp; &ensp;</label>
                  <input class="form-check-input" name="breed_survey_done" type="checkbox" value="1">
                  <label class="form-check-label h6"> &ensp; &ensp; &ensp;Breed Survey Date From: &ensp;</label><input class="input-mini spinner-default" name="survey_date_from" type="number" min="0" max="31" value="">
                  <label class="form-check-label h6"> &ensp;To: &ensp;</label><input class="input-mini spinner-default" name="survey_date_to" type="number" min="0" max="31" value="">
                  <input type="hidden" name="breed_survey_date" id="breed_survey_date">
                </div>
              </div>
              <div class="col-sm-2">
                <input class="form-control" name="breed_surveyor" type="text" value="">
              </div>
            </div>
            <hr>
            <div class="form-group row">
              <div class="col-sm-2"></div>
              <div class="col-sm-6">
                <div class="form-check">
                  <label class="form-check-label h6">Breed Survey Lifetime: &ensp; &ensp; &ensp;</label>
                  <input class="form-check-input" name="breed_survey_life" type="checkbox" value="1">
                  <label style="width: 365px"></label>
                  <label class="form-check-label h6">  &ensp;</label>
                  <input type="hidden" name="breed_survey_life_date" id="breed_survey_life_date">
                </div>
              </div>
              <div class="col-sm-2">
                <input class="form-control" name="breed_surveyor_life" type="text" value="">
              </div>
            </div>
            <legend><span>1. General Information</span></legend>
            <div class="form-group row">
              <div class="col-sm-2"></div>
              <label class="col-form-label col-sm-2 h6" for="">Height</label>
              <div class="col-sm-6">
                <input type="text" name="height1" id="height_1" class="input-small" value="" >
                <input type="text" name="height2" id="height_2" class="input-small" value="" />
                <input type="text" name="height3" id="height_3" class="input-small" value="" />
                <abbr title="cm">cm</abbr>
              </div>
              <div class="col-sm-2"></div>
            </div>
            <hr>
            <div class="form-group row">
              <div class="col-sm-2"></div>
              <label class="col-form-label col-sm-2 h6" for="">Depth Chest</label>
              <div class="col-sm-3">
                <input class="form-control" placeholder="Depth Chest(cm)" 
                id="depth_chest" name="depth_chest" type="text">
              </div>
              <div class="col-sm-2"></div>
            </div>
            <hr>
            <div class="form-group row">
              <div class="col-sm-2"></div>
              <label class="col-form-label col-sm-2 h6" for="">Chest Circumference:</label>
              <div class="col-sm-3">
                <input class="form-control" placeholder="Chest Circumference (cm)" id="chest_circumference" name="chest_circumference" type="text">
              </div>
              <div class="col-sm-2"></div>
            </div>
            <hr>
            <div class="form-group row">
              <div class="col-sm-2"></div>
              <label class="col-form-label col-sm-2 h6" for="">Weight</label>
              <div class="col-sm-3">
                <input class="form-control" placeholder="Weight (kg)" id="weight" name="weight" type="text">
              </div>
              <div class="col-sm-2"></div>
            </div>
            <hr>
            <div class="form-group row">
              <div class="col-sm-2"></div>
              <label class="col-form-label col-sm-2 h6" for="">Color & Markings</label>
              <div class="col-sm-3">
                <input class="form-control" placeholder="Color & Markings" id="color" name="color" type="text">
              </div>
              <div class="col-sm-2"></div>
            </div>
            <hr>
            <div class="form-group row">
              <div class="col-sm-2"></div>
              <label class="col-sm-2 col-form-label h6">Pigment</label>
              <div class="col-sm-3">
              <div class="form-check">
                <label class="form-check-label"><input class="checkbox" name="pigment" type="checkbox" value="Rich">1. Rich &ensp;</label>
                <label class="form-check-label"><input class="checkbox" name="pigment" type="checkbox" value="Sufficient">2. Sufficient</label>
              </div>
              </div>
              <div class="col-sm-2"></div>
            </div>
            <hr>
            <div class="form-group row">
              <div class="col-sm-2"></div>
              <label class="col-sm-2 col-form-label h6">Hair</label>
              <div class="col-sm-3">
              <div class="form-check">
                <label class="form-check-label"><input class="checkbox" name="hair" type="radio" value="Stock Hair"> 1. Stock Hair</label>
                <label class="form-check-label"><input class="checkbox" name="hair" type="radio" value="Long-Stock Hair with Undercoat"> 2. Long-Stock Hair with Undercoat</label>
              </div>
              </div>
              <div class="col-sm-2"></div>
            </div>
            <hr>
            <div class="form-group row">
              <div class="col-sm-2"></div>
              <label class="col-sm-2 col-form-label h6">Testicles</label>
              <div class="col-sm-3">
              <div class="form-check">
                <label class="form-check-label"><input class="checkbox" name="testicles" type="radio" value="Strong, Well Developed"> 1. Strong, Well Developed &ensp;</label>
                <label class="form-check-label"><input class="checkbox" name="testicles" type="radio" value="Small">2. Small</label>
              </div>
              </div>
              <div class="col-sm-2"></div>
            </div>
            <hr>
            <legend><span>2. Opinion on general condition, size, anatomy, structural strength, movement, instinctive behavior, self-confidence and resilience (TSB)</span></legend>
              <textarea name="description" id="description" cols="147" rows="15" class="span12"></textarea>
              <hr>
              <legend><span>3. Temperament, nerves, gun-test, instinctive behavior, self-confidence, resillience</span></legend>
              <div class="row">
                <div class="col-sm-6">
                <div class="form-group row">
                  <label class="col-sm-4 col-form-label h6">Temperament</label>
                  <div class="col-sm-8">
                    <div class="form-check">
                      <label class="form-check-label">
                        <input class="checkbox" name="character" type="checkbox" value="Firm"> 1. Firm &ensp; &ensp;</label>
                      <label class="form-check-label">
                        <input class="checkbox" name="character" type="checkbox" value="Natural"> 2. Natural &ensp; &ensp;</label>
                      <label class="form-check-label">
                        <input class="checkbox" name="character" type="checkbox" value="Lively"> 3. Lively &ensp; &ensp;</label>
                      <label class="form-check-label">
                        <input class="checkbox" name="character" type="checkbox" value="Steady"> 4. Steady &ensp; &ensp;</label>
                    </div>
                  </div>
                </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label h6">Attentiveness</label>
                    <div class="col-sm-8">
                    <div class="form-check">
                      <label class="form-check-label">
                        <input class="checkbox" name="watchfulness" type="checkbox" value="Present"> 1. Present &ensp; &ensp;</label>
                      <label class="form-check-label">
                        <input class="checkbox" name="watchfulness" type="checkbox" value="Sufficiently Present"> 2. Sufficiently Present &ensp; &ensp;</label>
                    </div>
                    </div>
                  </div>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-6">
                  <div class="form-group row">
                  <label class="col-sm-4 col-form-label h6">Nerves</label>
                    <div class="col-sm-8">
                      <div class="form-check">
                        <label class="form-check-label">
                          <input class="checkbox" name="conditions_of_nerves" type="checkbox" value="Firm"> 1. Firm &ensp; &ensp;</label>
                        <label class="form-check-label">
                          <input class="checkbox" name="conditions_of_nerves" type="checkbox" value="Slightly Excitable"> 2. Slightly Excitable &ensp; &ensp;</label>
                        <label class="form-check-label">
                          <input class="checkbox" name="conditions_of_nerves" type="checkbox" value="Sufficient"> 3. Sufficient &ensp; &ensp;</label>
                      </div>
                    </div>
                    </div>
                  </div>
                <div class="col-sm-6">
                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label h6">Non Self Consciousness</label>
                    <div class="col-sm-8">
                      <div class="form-check">
                        <label class="form-check-label">
                          <input class="checkbox" name="confidence" type="checkbox" value="Present"> 1. Present &ensp; &ensp;</label>
                        <label class="form-check-label">
                          <input class="checkbox" name="confidence" type="checkbox" value="Sufficient"> 2. Sufficient &ensp; &ensp;</label>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-6">
                  <div class="form-group row">
                  <label class="col-sm-4 col-form-label h6">Gun Sureness</label>
                  <div class="col-sm-7">
                    <div class="form-check">
                      <label class="form-check-label">
                        <input class="checkbox" name="reaction_to_gun_test" type="checkbox" value="Present"> 1. Present &ensp; &ensp;</label>
                      <label class="form-check-label">
                        <input class="checkbox" name="reaction_to_gun_test" type="checkbox" value="Sufficient"> 2. Sufficient &ensp; &ensp;</label>
                    </div>
                  </div>
                </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label h6">Instinctive behavior, Self-Confidence, Resilience</label>
                    <div class="col-sm-8">
                    <div class="form-check">
                      <label class="form-check-label">
                        <input class="checkbox" name="resilience" type="checkbox" value="Pronounced"> 1. Pronounced &ensp; &ensp;</label>
                      <label class="form-check-label">
                        <input class="checkbox" name="resilience" type="checkbox" value="Present"> 2. Present &ensp; &ensp;</label>
                      <label class="form-check-label">
                        <input class="checkbox" name="resilience" type="checkbox" value="Dog Releases"> 3. Dog Releases &ensp; &ensp;</label>
                    </div>
                    </div>
                  </div>
                </div>
              </div>
            <fieldset class="form-group">
              <legend><span>4. Assessment During Stand and While Moving</span></legend>
              <div class="row">
                <div class="col-sm-6">
                  <div class="form-group row">
                  <label class="col-sm-4 col-form-label h6">Gender Characteristics</label>
                  <div class="col-sm-8">
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="checkbox" name="sex_characteristics" type="checkbox" value="Pronounced"> 1. Pronounced &ensp; &ensp;</label>
                    <label class="form-check-label">
                      <input class="checkbox" name="sex_characteristics" type="checkbox" value="Clear"> 2. Clear &ensp; &ensp;</label>
                  </div>
                  
                  </div>
                  </div>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-12">
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label h6">Constitution</label>
                    <div class="col-sm-8">
                    <div class="form-check">
                      <label class="form-check-label">
                        <input class="checkbox" name="constitution" type="checkbox" value="Strong"> 1. Strong &ensp; &ensp; &ensp;</label>
                      <label class="form-check-label">
                        <input class="checkbox" name="constitution" type="checkbox" value="Medium Strong"> 2. Medium Strong &ensp; &ensp; &ensp;</label>
                      <label class="form-check-label">
                        <input class="checkbox" name="constitution" type="checkbox" value="Dry"> 3. Dry &ensp; &ensp;</label>
                      <label class="form-check-label">
                        <input class="checkbox" name="constitution" type="checkbox" value="Slightly Coarse"> 4. Slightly Coarse &ensp; &ensp;</label>
                      <label class="form-check-label">
                        <input class="checkbox" name="constitution" type="checkbox" value="Slightly Elegant"> 5. Slightly Elegant &ensp; &ensp;</label>
                    </div>
                    </div>
                  </div>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-6">
                <div class="form-group row">
                <label class="col-sm-4 col-form-label h6">Expression</label>
                <div class="col-sm-8">
                <div class="form-check">
                  <label class="form-check-label">
                    <input class="checkbox" name="expression" type="checkbox" value="Lively"> 1. Lively &ensp; &ensp;</label>
                  </div>
                  <div class="form-check">
                  <label class="form-check-label">
                    <input class="checkbox" name="expression" type="checkbox" value="Noble"> 2. Noble &ensp; &ensp;</label>
                  </div>
                  <div class="form-check">
                  <label class="form-check-label">
                    <input class="checkbox" name="expression" type="checkbox" value="Slightly Unfriendly"> 3. Slightly Unfriendly &ensp; &ensp;</label>
                </div>
                </div>
                </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label h6">Proportions</label>
                <div class="col-sm-8">
                <div class="form-check">
                  <label class="form-check-label">
                    <input class="checkbox" name="proportions" type="checkbox" value="Normal Proportions">1. Normal Proportions</label>
                </div>
                <div class="form-check">
                  <label class="form-check-label">
                    <input class="checkbox" name="proportions" type="checkbox" value="Ideally Stretched">2. Ideally Stretched</label>
                </div>
                <div class="form-check">
                  <label class="form-check-label">
                    <input class="checkbox" name="proportions" type="checkbox" value="Slightly Short">3. Slightly Short</label>
                </div>
                <div class="form-check">
                  <label class="form-check-label">
                    <input class="checkbox" name="proportions" type="checkbox" value="Strong">4. Strong</label>
                </div>
                <div class="form-check">
                  <label class="form-check-label">
                    <input class="checkbox" name="proportions" type="checkbox" value="Impressive">5. Impressive</label>
                </div>
                <div class="form-check">
                  <label class="form-check-label">
                    <input class="checkbox" name="proportions" type="checkbox" value="Slightly Heavy">6. Slightly Heavy</label>
                </div>
                <div class="form-check">
                  <label class="form-check-label">
                    <input class="checkbox" name="proportions" type="checkbox" value="Sufficiently Impressive">7. Sufficiently Impressive</label>
                </div>
                <div class="form-check">
                  <label class="form-check-label">
                    <input class="checkbox" name="proportions" type="checkbox" value="Deep">8. Deep</label>
                </div>
                <div class="form-check">
                  <label class="form-check-label">
                    <input class="checkbox" name="proportions" type="checkbox" value="Slightly Broad">9. Slightly Broad</label>
                </div>
                <div class="form-check">
                  <label class="form-check-label">
                    <input class="checkbox" name="proportions" type="checkbox" value="Slightly Narrow">10. Slightly Narrow</label>
                </div>
                <div class="form-check">
                  <label class="form-check-label">
                    <input class="checkbox" name="proportions" type="checkbox" value="Slightly Flat Sided">11. Slightly Flat-Sided</label>
                </div>
                </div>
                  </div>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-6">
                <div class="form-group row">
                <label class="col-sm-4 col-form-label h6">Bones</label>
                <div class="col-sm-8">
                <div class="form-check">
                  <label class="form-check-label">
                    <input class="checkbox" name="bones" type="checkbox" value="Strong">1. Strong</label>
                </div>
                <div class="form-check">
                  <label class="form-check-label">
                    <input class="checkbox" name="bones" type="checkbox" value="Medium Strong">2. Medium Strong</label>
                </div>
                <div class="form-check">
                  <label class="form-check-label">
                    <input class="checkbox" name="bones" type="checkbox" value="Dry">3. Dry</label>
                </div>
                <div class="form-check">
                  <label class="form-check-label">
                    <input class="checkbox" name="bones" type="checkbox" value="Sufficiently Dry">4. Sufficiently Dry</label>
                </div>
                <div class="form-check">
                  <label class="form-check-label">
                    <input class="checkbox" name="bones" type="checkbox" value="Slightly Big">5. Slightly Big</label>
                </div>
                <div class="form-check">
                  <label class="form-check-label">
                    <input class="checkbox" name="bones" type="checkbox" value="Slightly Elegant">6. Slightly Elegant</label>
                </div>
                </div>
                </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label h6">Musculature</label>
                <div class="col-sm-8">
                <div class="form-check">
                  <label class="form-check-label">
                    <input class="checkbox" name="muscular_development" type="checkbox" value="Strong">1. Strong</label>
                </div>
                <div class="form-check">
                  <label class="form-check-label">
                    <input class="checkbox" name="muscular_development" type="checkbox" value="Sufficiently Strong">2. Sufficiently Strong</label>
                </div>
                <div class="form-check">
                  <label class="form-check-label">
                    <input class="checkbox" name="muscular_development" type="checkbox" value="Dry">3. Dry</label>
                </div>
                <div class="form-check">
                  <label class="form-check-label">
                    <input class="checkbox" name="muscular_development" type="checkbox" value="Sufficiently Dry">4. Sufficiently Dry</label>
                </div>
                </div>
                  </div>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-6">
                <div class="form-group row">
                <label class="col-sm-4 col-form-label h6">Stand And Limbs - Front</label>
                <div class="col-sm-8">
                <div class="form-check">
                  <label class="form-check-label">
                    <input class="checkbox" name="view_from_the_front" type="checkbox" value="Very Good">1. Very Good</label>
                </div>
                <div class="form-check">
                  <label class="form-check-label">
                    <input class="checkbox" name="view_from_the_front" type="checkbox" value="Good">2. Good</label>
                </div>
                <div class="form-check">
                  <label class="form-check-label">
                    <input class="checkbox" name="view_from_the_front" type="checkbox" value="Sufficient">3. Sufficient</label>
                </div>
                </div>
                </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label h6">Stand And Limbs - Rear</label>
                <div class="col-sm-8">
                <div class="form-check">
                  <label class="form-check-label">
                    <input class="checkbox" name="rear" type="checkbox" value="Very Good">1. Very Good</label>
                </div>
                <div class="form-check">
                  <label class="form-check-label">
                    <input class="checkbox" name="rear" type="checkbox" value="Good">2. Good</label>
                </div>
                <div class="form-check">
                  <label class="form-check-label">
                    <input class="checkbox" name="rear" type="checkbox" value="Sufficient">3. Sufficient</label>
                </div>
                </div>
                  </div>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-6">
                <div class="form-group row">
                <label class="col-sm-4 col-form-label h6">Back</label>
                <div class="col-sm-8">
                <div class="form-check">
                  <label class="form-check-label">
                    <input class="checkbox" name="back" type="checkbox" value="Firm">1. Firm</label>
                </div>
                <div class="form-check">
                  <label class="form-check-label">
                    <input class="checkbox" name="back" type="checkbox" value="Suffieciently Firm">2. Suffieciently Firm</label>
                </div>
                <div class="form-check">
                  <label class="form-check-label">
                    <input class="checkbox" name="back" type="checkbox" value="Slightly Dippy">3. Slightly Dippy</label>
                </div>
                <div class="form-check">
                  <label class="form-check-label">
                    <input class="checkbox" name="back" type="checkbox" value="Light Nick Behind the Withers">4. Light Nick Behind the Withers</label>
                </div>
                </div>
                </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label h6">Elbow Closure</label>
                <div class="col-sm-8">
                <div class="form-check">
                  <label class="form-check-label">
                    <input class="checkbox" name="elbow_closure" type="checkbox" value="Very Good">1. Very Good</label>
                </div>
                <div class="form-check">
                  <label class="form-check-label">
                    <input class="checkbox" name="elbow_closure" type="checkbox" value="Good">2. Good</label>
                </div>
                <div class="form-check">
                  <label class="form-check-label">
                    <input class="checkbox" name="elbow_closure" type="checkbox" value="Sufficient">3. Sufficient</label>
                </div>
                </div>
                  </div>
                </div>
              </div> 
              <hr>
              <div class="row">
                <div class="col-sm-6">
                <div class="form-group row">
                <label class="col-sm-4 col-form-label h6">Front Pastern Firmness</label>
                <div class="col-sm-8">
                <div class="form-check">
                  <label class="form-check-label">
                    <input class="checkbox" name="firmness_in_stance_front" type="checkbox" value="Good">1. Good</label>
                </div>
                <div class="form-check">
                  <label class="form-check-label">
                    <input class="checkbox" name="firmness_in_stance_front" type="checkbox" value="Sufficient">2. Sufficient</label>
                </div>
                </div>
                </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label h6">Front</label>
                <div class="col-sm-8">
                <div class="form-check">
                  <label class="form-check-label">
                    <input class="checkbox" name="front" type="checkbox" value="Straight">1. Straight</label>
                </div>
                <div class="form-check">
                  <label class="form-check-label">
                    <input class="checkbox" name="front" type="checkbox" value="Slightly Open Stand">2. Slightly Open Stand</label>
                </div>
                <div class="form-check">
                  <label class="form-check-label">
                    <input class="checkbox" name="front" type="checkbox" value="Slightly Close Stand">3. Slightly Close Stand</label>
                </div>
                <div class="form-check">
                  <label class="form-check-label">
                    <input class="checkbox" name="front" type="checkbox" value="Not Perfectly Straight">4. Not Perfectly Straight</label>
                </div>
                <div class="form-check">
                  <label class="form-check-label">
                    <input class="checkbox" name="front" type="checkbox" value="Elbow Bump Slightly Distended">4. Elbow Bump Slightly Distended</label>
                </div>
                </div>
                  </div>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-6">
                <div class="form-group row">
                <label class="col-sm-4 col-form-label h6">Croup</label>
                <div class="col-sm-8">
                <div class="form-check">
                  <label class="form-check-label">
                    <input class="checkbox" name="croup[]" type="checkbox" value="Normal Length">1. Normal Length</label>
                </div>
                <div class="form-check">
                  <label class="form-check-label">
                    <input class="checkbox" name="croup[]" type="checkbox" value="Slightly Short">2. Slightly Short</label>
                </div>
                <div class="form-check">
                  <label class="form-check-label">
                    <input class="checkbox" name="croup[]" type="checkbox" value="Short">3. Short</label>
                </div>
                <div class="form-check">
                  <label class="form-check-label">
                    <input class="checkbox" name="croup[]" type="checkbox" value="Normal Lay">4. Normal Lay</label>
                </div>
                <div class="form-check">
                  <label class="form-check-label">
                    <input class="checkbox" name="croup[]" type="checkbox" value="Horizontal">5. Horizontal</label>
                </div>
                <div class="form-check">
                  <label class="form-check-label">
                    <input class="checkbox" name="croup[]" type="checkbox" value="Slightly Deep">6. Slightly Deep</label>
                </div>
                <div class="form-check">
                  <label class="form-check-label">
                    <input class="checkbox" name="croup[]" type="checkbox" value="Deep">7. Deep</label>
                </div>
                </div>
                </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label h6">Hock Firmness</label>
                <div class="col-sm-8">
                <div class="form-check">
                  <label class="form-check-label">
                    <input class="checkbox" name="hock_joints" type="checkbox" value="Good">1. Good</label>
                </div>
                <div class="form-check">
                  <label class="form-check-label">
                    <input class="checkbox" name="hock_joints" type="checkbox" value="Sufficient">2. Sufficient</label>
                </div>
                <div class="form-check">
                  <label class="form-check-label">
                    <input class="checkbox" name="hock_joints" type="checkbox" value="Not Firm">3. Not Firm</label>
                </div>
                </div>
                  </div>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-6">
                <div class="form-group row">
                <label class="col-sm-4 col-form-label h6">Gait</label>
                <div class="col-sm-8">
                <div class="form-check">
                  <label class="form-check-label">
                    <input class="checkbox" name="gait[]" type="checkbox" value="Front Stright Movement">1. Front Stright Movement</label>
                </div>
                <div class="form-check">
                  <label class="form-check-label">
                    <input class="checkbox" name="gait[]" type="checkbox" value="Rear Straight Movement">2. Rear Straight Movement</label>
                </div>
                <div class="form-check">
                  <label class="form-check-label">
                    <input class="checkbox" name="gait[]" type="checkbox" value="Front Narrow Movement">3. Front Narrow Movement</label>
                </div>
                <div class="form-check">
                  <label class="form-check-label">
                    <input class="checkbox" name="gait[]" type="checkbox" value="Rear Narrow Movement">4. Rear Narrow Movement</label>
                </div>
                <div class="form-check">
                  <label class="form-check-label">
                    <input class="checkbox" name="gait[]" type="checkbox" value="Front Wide Movement">5. Front Wide Movement</label>
                </div>
                <div class="form-check">
                  <label class="form-check-label">
                    <input class="checkbox" name="gait[]" type="checkbox" value="Rear Wide Movement">6. Rear Wide Movement</label>
                </div>
                <div class="form-check">
                  <label class="form-check-label">
                    <input class="checkbox" name="gait[]" type="checkbox" value="Slightly Cow-Hocked">7. Slightly Cow-Hocked</label>
                </div>
                <div class="form-check">
                  <label class="form-check-label">
                    <input class="checkbox" name="gait[]" type="checkbox" value="Slightly Bow-Legged">8. Slightly Bow-Legged</label>
                </div>
                <div class="form-check">
                  <label class="form-check-label">
                    <input class="checkbox" name="gait[]" type="checkbox" value="Tends To Pace">9. Tends To Pace</label>
                </div>
                </div>
                </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label h6">Trot Front</label>
                <div class="col-sm-8">
                <div class="form-check">
                  <label class="form-check-label">
                    <input class="checkbox" name="reach" type="checkbox" value="Very Good">1. Very Good</label>
                </div>
                <div class="form-check">
                  <label class="form-check-label">
                    <input class="checkbox" name="reach" type="checkbox" value="Good">2. Good</label>
                </div>
                <div class="form-check">
                  <label class="form-check-label">
                    <input class="checkbox" name="reach" type="checkbox" value="Can Be More Free">3. Can Be More Free</label>
                </div>
                <div class="form-check">
                  <label class="form-check-label">
                    <input class="checkbox" name="reach" type="checkbox" value="Sufficient">4. Sufficient</label>
                </div>
                </div>
                  </div>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-6">
                <div class="form-group row">
                <label class="col-sm-4 col-form-label h6">Trot Hind Thrust</label>
                <div class="col-sm-8">
                <div class="form-check">
                  <label class="form-check-label">
                    <input class="checkbox" name="drive" type="checkbox" value="Very Positive">1. Very Positive</label>
                </div>
                <div class="form-check">
                  <label class="form-check-label">
                    <input class="checkbox" name="drive" type="checkbox" value="Positive">2. Positive</label>
                </div>
                <div class="form-check">
                  <label class="form-check-label">
                    <input class="checkbox" name="drive" type="checkbox" value="Sufficiently Positive">3. Sufficiently Positive</label>
                </div>
                </div>
                </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label h6">Nails</label>
                <div class="col-sm-8">
                <div class="form-check">
                  <label class="form-check-label">
                    <input class="checkbox" name="toenails" type="checkbox" value="Dark">1. Dark</label>
                </div>
                <div class="form-check">
                  <label class="form-check-label">
                    <input class="checkbox" name="toenails" type="checkbox" value="Medium">2. Medium</label>
                </div>
                <div class="form-check">
                  <label class="form-check-label">
                    <input class="checkbox" name="toenails" type="checkbox" value="Light">3. Light</label>
                </div>
                </div>
                  </div>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-6">
                <div class="form-group row">
                <label class="col-sm-4 col-form-label h6">Feet</label>
                <div class="col-sm-8">
                <div class="form-check">
                  <label class="form-check-label">
                    <input class="checkbox" name="feet[]" type="checkbox" value="Front Round">1. Front Round</label>
                </div>
                <div class="form-check">
                  <label class="form-check-label">
                    <input class="checkbox" name="feet[]" type="checkbox" value="Rear Round">2. Rear Round</label>
                </div>
                <div class="form-check">
                  <label class="form-check-label">
                    <input class="checkbox" name="feet[]" type="checkbox" value="Front Closed">3. Front Closed</label>
                </div>
                <div class="form-check">
                  <label class="form-check-label">
                    <input class="checkbox" name="feet[]" type="checkbox" value="Rear Close">4. Rear Closed</label>
                </div>
                <div class="form-check">
                  <label class="form-check-label">
                    <input class="checkbox" name="feet[]" type="checkbox" value="Front Round/Closed">5. Front Round/Closed</label>
                </div>
                <div class="form-check">
                  <label class="form-check-label">
                    <input class="checkbox" name="feet[]" type="checkbox" value="Rear Round/Closed">6. Rear Round/Closed</label>
                </div>
                <div class="form-check">
                  <label class="form-check-label">
                    <input class="checkbox" name="feet[]" type="checkbox" value="Front Slightly Long">7. Front Slightly Long</label>
                </div>
                <div class="form-check">
                  <label class="form-check-label">
                    <input class="checkbox" name="feet[]" type="checkbox" value="Rear Slightly Long">8. Rear Slightly Long</label>
                </div>
                <div class="form-check">
                  <label class="form-check-label">
                    <input class="checkbox" name="feet[]" type="checkbox" value="Front Slightly Apart">9. Front Slightly Apart</label>
                </div>
                <div class="form-check">
                  <label class="form-check-label">
                    <input class="checkbox" name="feet[]" type="checkbox" value="Rear Slightly Apart">10. Rear Slightly Apart</label>
                </div>
                </div>
                </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label h6">Head</label>
                <div class="col-sm-8">
                <div class="form-check">
                  <label class="form-check-label">
                    <input class="checkbox" name="head" type="checkbox" value="Very Strong">1. Very Strong</label>
                </div>
                <div class="form-check">
                  <label class="form-check-label">
                    <input class="checkbox" name="head" type="checkbox" value="Strong">2. Strong</label>
                </div>
                <div class="form-check">
                  <label class="form-check-label">
                    <input class="checkbox" name="head" type="checkbox" value="Slightly Elegant">3. Slightly Elegant</label>
                </div>
                <div class="form-check">
                  <label class="form-check-label">
                    <input class="checkbox" name="head" type="checkbox" value="Slightly Small">4. Slightly Small</label>
                </div>
                <div class="form-check">
                  <label class="form-check-label">
                    <input class="checkbox" name="head" type="checkbox" value="Slightly Short">5. Slightly Short</label>
                </div>
                <div class="form-check">
                  <label class="form-check-label">
                    <input class="checkbox" name="head" type="checkbox" value="Slightly Long">6. Slightly Long</label>
                </div>
                </div>
                  </div>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-6">
                <div class="form-group row">
                <label class="col-sm-4 col-form-label h6">Eye Color</label>
                <div class="col-sm-8">
                <div class="form-check">
                  <label class="form-check-label">
                    <input class="checkbox" name="eyes" type="checkbox" value="Dark">1. Dark</label>
                </div>
                <div class="form-check">
                  <label class="form-check-label">
                    <input class="checkbox" name="eyes" type="checkbox" value="Yellowish">2. Yellowish</label>
                </div>
                <div class="form-check">
                  <label class="form-check-label">
                    <input class="checkbox" name="eyes" type="checkbox" value="Light">3. Light</label>
                </div>
                </div>
                </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label h6">Upper Jaw</label>
                <div class="col-sm-8">
                <div class="form-check">
                  <label class="form-check-label">
                    <input class="checkbox" name="upper_jaw" type="checkbox" value="Strong">1. Strong</label>
                </div>
                <div class="form-check">
                  <label class="form-check-label">
                    <input class="checkbox" name="upper_jaw" type="checkbox" value="Sufficiently Strong">2. Sufficiently Strong</label>
                </div>
                <div class="form-check">
                  <label class="form-check-label">
                    <input class="checkbox" name="upper_jaw" type="checkbox" value="Slightly Narrow">3. Slightly Narrow</label>
                </div>
                <div class="form-check">
                  <label class="form-check-label">
                    <input class="checkbox" name="upper_jaw" type="checkbox" value="Stretched">4. Stretched</label>
                </div>
                </div>
                  </div>
                </div>
              </div>  
              <hr>
              <div class="row">
                <div class="col-sm-6">
                <div class="form-group row">
                <label class="col-sm-4 col-form-label h6">Lower Jaw</label>
                <div class="col-sm-8">
                <div class="form-check">
                  <label class="form-check-label">
                    <input class="checkbox" name="lower_jaw" type="checkbox" value="Strong">1. Strong</label>
                </div>
                <div class="form-check">
                  <label class="form-check-label">
                    <input class="checkbox" name="lower_jaw" type="checkbox" value="Sufficiently Strong">2. Sufficiently Strong</label>
                </div>
                <div class="form-check">
                  <label class="form-check-label">
                    <input class="checkbox" name="lower_jaw" type="checkbox" value="Slightly Weak">3. Slightly Weak</label>
                </div>
                </div>
                </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label h6">Bite</label>
                <div class="col-sm-8">
                <div class="form-check">
                  <label class="form-check-label">
                    <input class="checkbox" name="bite[]" type="checkbox" value="Healthy">1. Healthy</label>
                </div>
                <div class="form-check">
                  <label class="form-check-label">
                    <input class="checkbox" name="bite[]" type="checkbox" value="Strong">2. Strong</label>
                </div>
                <div class="form-check">
                  <label class="form-check-label">
                    <input class="checkbox" name="bite[]" type="checkbox" value="Gapless">3. Gapless</label>
                </div>
                <div class="form-check">
                  <label class="form-check-label">
                    <input class="checkbox" name="bite[]" type="checkbox" value="Scissor Bite">4. Scissor Bite</label>
                </div>
                <div class="form-check">
                  <label class="form-check-label">
                    <input class="checkbox" name="bite[]" type="checkbox" value="Slightly Weak">5. Slightly Weak</label>
                </div>
                <div class="form-check">
                  <label class="form-check-label">
                    <input class="checkbox" name="bite[]" type="checkbox" value="Slightly Brown">6. Slightly Brown</label>
                </div>
                <div class="form-check">
                  <label class="form-check-label">
                    <input class="checkbox" name="bite[]" type="checkbox" value="Incomplete Tooth Position">7. Incomplete Tooth Position</label>
                </div>
                <div class="form-check">
                  <label class="form-check-label">
                    <input class="checkbox" name="bite[]" type="checkbox" value="Middle Incissors Open Bite">8. Middle Incissors Open Bite</label>
                </div>
                <div class="form-check">
                  <label class="form-check-label">
                    <input class="checkbox" name="bite[]" type="checkbox" value="Wear With Age">9. Wear With Age</label>
                </div>
                <div class="form-check">
                  <label class="form-check-label">
                    <input class="checkbox" name="bite[]" type="checkbox" value="Slightly Wry Mouth">10. Slightly Wry Mouth</label>
                </div>
                <div class="form-check">
                  <label class="form-check-label">
                    <input class="checkbox" name="bite[]" type="checkbox" value="Double Pre-Molars">11. Double Pre-Molars</label>
                </div>
                </div>
                  </div>
                </div>
              </div>                                                                                                       
              <hr>
              <div class="row">
                <div class="col-sm-6">
                <div class="form-group row">
                <label class="col-sm-4 col-form-label h6">Teeth Faults</label>
                <div class="col-sm-8">
                <div class="form-check">
                  <label class="form-check-label">
                    <input class="checkbox" name="dentition_faults" type="checkbox" value="P1 Upper Left">1. P1 Upper Left</label>
                </div>
                <div class="form-check">
                  <label class="form-check-label">
                    <input class="checkbox" name="dentition_faults" type="checkbox" value="P1 Upper Right">2. P1 Upper Right</label>
                </div>
                <div class="form-check">
                  <label class="form-check-label">
                    <input class="checkbox" name="dentition_faults" type="checkbox" value="P1 Lower Left">3. P1 Lower Left</label>
                </div>
                <div class="form-check">
                  <label class="form-check-label">
                    <input class="checkbox" name="dentition_faults" type="checkbox" value="P1 Lower Right">4. P1 Lower Right</label>
                </div>
                </div>
                </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label h6">Neutered</label>
                    <div class="col-sm-8">
                      <select class="form-control" name="neutered" id="neutered">
                        <option>- Yes/No -</option>
                        <option>Yes</option>
                        <option>No</option>
                      </select>
                    </div>
                  </div>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-6">
                <div class="form-group row">
                <label class="col-sm-4 col-form-label h6">HD</label>
                <div class="col-sm-8">
                  <select class="form-control select2" name="hip" id="hip" style="width: 290px;" multiple="true">
                    <option>
                      Select One
                    </option>
                    @foreach($total_hip as $hip)
                      <option value="{{ $hip->id }}">{{ $hip->title }}</option>
                    @endforeach
                  </select>
                  <!-- <input type="text" class="form-control" name="hip" id="hip"> -->
                </div>
                </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label h6">ED</label>
                    <div class="col-sm-8">
                      <select class="form-control select2" name="elbows" id="elbows" style="width: 290px;" multiple="true">
                        <option>
                          Select One
                        </option>
                        @foreach($total_hip as $hip)
                          <option value="{{ $hip->id }}">{{ $hip->title }}</option>
                        @endforeach
                      </select>
                      <!-- <input type="text" class="form-control" name="elbows" id="elbows"> -->
                    </div>
                  </div>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-6">
                <div class="form-group row">
                <label class="col-sm-4 col-form-label h6">DNA Status</label>
                    <div class="col-sm-8">
                      <select class="form-control" name="DNA_status" id="DNA_status">
                        <option>- Select One -</option>
                        <option>Proven</option>
                        <option>Stored</option>
                        <option>Repeat</option>
                        <option>Applied For</option>
                        <option>Not Availabe</option>
                        <option>Not Proven</option>
                      </select>
                    </div>
                  </div>
                </div>
              </div>
            </fieldset>
            <fieldset class="form-group">
              <legend><span>5. Particular Virtues and Faults (as a compliment to the overall judgement)</span></legend>
              <textarea name="particular_virtues_faults" id="particular_virtues_faults" cols="147" rows="15" class="span12"></textarea>
            </fieldset>

            <fieldset class="form-group">
              <legend><span>6. Breeding Recommendations</span></legend>
              <textarea name="advice" id="advice" cols="147" rows="15" class="span12"></textarea>
              <input type="hidden" name="created_by" value="1">
            </fieldset>

            <fieldset class="form-group">
              <legend><span>Dog Image</span></legend>
              <input type="file" id="attachment" name="attachment" accept="image/png, image/jpeg">
            </fieldset>
          </div>
          <div class="form-buttons-w">
            <button class="btn btn-primary" type="submit"> Submit</button>
            <button class="btn btn-secondary" type="reset"> Reset</button>
            <a type="button" href="{{ route('KCPNumber.index') }}" class="btn btn-white">
              Cancel
            </a>
          </div>
        </form>
          
      </div>
    </div>
  </div>

</div>
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
function myFunction3() {
  var x = document.getElementById("myDIV3");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}
function myFunctionKP() {
  var txt;
  var r = confirm("Are you sure do you want to assign KP #?");
  if (r == true) {
    txt = "100154";
    document.getElementById("KP").value = txt;
  } else {
    txt = "You pressed Cancel!";
    // Uncheck
    document.getElementById("kp_cb").checked = false;
    document.getElementById("KP").value = "";  
  }
}

// function addRowForeign() {
//   // document.getElementById('remove_foreign_no').style.display = block;
//   document.querySelector('#content').insertAdjacentHTML(
//     'afterbegin',
//     `<div class="row">
//       <div class="col-sm-2"></div>
//         <label class="col-form-label col-sm-2 h6"></label>
//         <div class="col-sm-3">
//           <input class="form-control" name="dog_reg_numbers[]" id="for_reg" placeholder="Foreign Reg # Like SZ-565454, HR-12455" type="text">
//         </div>
//         <div class="col-sm-2">
//           <div class="row-actions">
//             <span class="h5" data-toggle="tooltip" data-placement="top" 
//             title="Foreign Reg # Like SZ-565454, HR-12455"> ?</span>&ensp;
//             <a href="#" data-toggle="tooltip" data-placement="top" 
//                 title="Multiple Reg #" id="add_foreign" onclick="addRowForeign()"><i class="fa fa-plus-circle"></i></a>&ensp;
//             <a href="javascript: void(0);" data-toggle="tooltip" data-placement="top"
//                 title="Remove" onclick="removeForeignRow(this)"><i class="fa fa-minus-circle"></i></a>
//           </div>
//         </div>
//       <div class="col-sm-2"></div>
//     </div><br>`      
//   )
// }

// function removeForeignRow(e) {
//   e.parentElement.parentElement.parentElement.remove();
// }

function Reload(this1) {
  // document.querySelector('#sire').value = 'Loading...'
  // document.getElementById("sire").value = 'Loading...';
  this1.innerHTML='<i class="fa fa-refresh fa-spin"></i>';
  // document.getElementById("sire").value = '';  

}

function Friendly_URLFunction() {
  var str = document.getElementById("dog_name").value;
  str = str.replace(/\s+/g, '-').toLowerCase();
  document.getElementById("friendly_URL").value = str;
  // console.log(str); // "sonic-free-games"
}
</script>
@endsection