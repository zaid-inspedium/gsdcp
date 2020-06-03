@extends('layouts.master')

@section('content')
  <!--------------------
          START - Breadcrumbs
          -------------------->
      <ul class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.html">Home</a>
        </li>
        <li class="breadcrumb-item">
          <a href="index.html">Products</a>
        </li>
        <li class="breadcrumb-item">
          <span>Laptop with retina screen</span>
        </li>
      </ul>
      <!--------------------
      END - Breadcrumbs
      -------------------->
      <div class="content-i">
            <div class="content-box"><div class="row">
  <div class="col-lg-12">
    <div class="element-wrapper">
      <h6 class="element-header">
        Dogs - Form
      </h6>
      <div class="element-box">
        <form>
          <legend><span>Dog Entry</span></legend>
          <div class="form-group">
            <label for=""> Dog Name</label><input id="dog_name" name="dog_name" class="form-control" placeholder="Enter Dog's Name" type="text">
          </div>
          <div class="row">
            <div class="col-sm-6">
              <div class="form-group">
                <label for=""> Kennel</label><input id="kennel" name="kennel" class="form-control" placeholder="Kennel" type="text">
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label for="">Breeder</label><input id="breeder" name="breeder" class="form-control" placeholder="Breeder" type="text">
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="">Sex</label><select class="form-control" id="gender"
            name="gender">
              <option>
                Select State
              </option>
              <option value="Male">
                Male
              </option>
              <option value="Female">
                Female
              </option>
            </select>
          </div>
          <div class="form-group">
            <label for="">Whelping Date</label><input id="whelping_date" name="whelping_date" class="form-control" type="date">
          </div>
          <fieldset class="form-group">
            <legend><span>Identification Data</span></legend>
            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <label for=""> Show Title</label><input class="form-control" name="show_title" id="show_title" placeholder="Show Title" type="text">
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="">Microchip/Tattoo #</label><input class="form-control" name="micro_tattoo" id="micro_tattoo" placeholder="Microchip/Tattoo #" type="text">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="">KP#</label><input class="form-control" name="kp" id="kp" type="text">
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="">Foreign Reg #</label><input class="form-control" name="for_reg" id="for_reg" placeholder="Foreign Reg # Like SZ-565454, HR-12455" type="text">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="">Owner</label>
                   <select class="form-control" name="owner" id="owner">
                     <option></option>
                    </select>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="">Achievments</label><input class="form-control" name="achieve" id="achieve" placeholder="SchH,IPO,HGH" type="text">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="">KKL</label>
                  <div class="input-group">
                    <input class="form-control" placeholder="KKL" type="text" name="kkl" id="kkl">
                  </div>
                </div>
              </div>
            </div>
          </fieldset>
          <div class="form-buttons-w">
            <button class="btn btn-primary" type="submit"> Submit</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <div class="col-lg-12">
    <div class="element-wrapper">
      <h6 class="element-header">
        Breed Survey Information
      </h6>
      <div class="element-box">
        <form>
           <div class="form-group row">
            <div class="col-sm-8">
              <div class="form-check">
                <label class="form-check-label"><input class="form-check-input" name="breed_survey_done" type="radio" value="">Breed Survey Done?</label>
              </div>
              <div class="form-check">
                <label class="form-check-label"><input class="form-check-input" name="breed_survey_lifetime" type="radio" value="">Breed Survey Lifetime:</label>
              </div>
            </div>
            <div class="col-sm-8">
              <div class="form-check">
                <label class="form-check-label">Breed Survey Date From:</label><input class="input-mini spinner-default" name="breed_survey_date_from" type="number" min="0" max="31" value="">
              </div>
              <div class="form-check">
                <label class="form-check-label">Breed Survey Date To:</label><input class="input-mini spinner-default" name="breed_survey_date_to" type="number" min="0" max="31" value="">
              </div>
            </div>
          </div>
        </form>
          </div>
<fieldset>
          <legend class="form-header">
            <span>General Information</span>
          </legend>
          <div class="form-group row">
            <label class="col-form-label col-sm-4" for="">Height</label>
            <div class="col-sm-8">
              <input type="text" name="height_1" id="height_1" class="input-small" value="" />
              <input type="text" name="height_2" id="height_2" class="input-small" value="" />
              <input type="text" name="height_3" id="height_3" class="input-small" value="" />
              <abbr title="cm">cm</abbr>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-form-label col-sm-4" for="">Depth Chest</label>
            <div class="col-sm-8">
              <input class="form-control" placeholder="Depth Chest(cm)" 
              id="depth_chest" name="depth_chest" type="text">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-form-label col-sm-4" for="">Chest Circumference:</label>
            <div class="col-sm-8">
              <input class="form-control" placeholder="Chest Circumference(cm)" id="chest_cir" name="chest_cir" type="text">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-form-label col-sm-4" for="">Weight</label>
            <div class="col-sm-8">
              <input class="form-control" placeholder="Weight(kg)" id="weight" name="weight" type="text">
            </div>
            </div>
          <div class="form-group row">
            <label class="col-form-label col-sm-4" for="">Color & Markings</label>
            <div class="col-sm-8">
              <input class="form-control" placeholder="Color & Markings" id="color_mark" name="color_mark" type="text">
            </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-4 col-form-label">Pigment</label>
              <div class="col-sm-8">
              <div class="form-check">
                <label class="form-check-label"><input class="checkbox" name="pigment" type="radio" value="Rich">1. Rich</label>
              </div>
              <div class="form-check">
                <label class="form-check-label"><input class="checkbox" name="pigment" type="radio" value="Sufficient">2. Sufficient</label>
              </div>
            </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-4 col-form-label">Hair</label>
              <div class="col-sm-8">
              <div class="form-check">
                <label class="form-check-label"><input class="checkbox" name="hair" type="radio" value="Stock Hair">1. Stock Hair</label>
              </div>
              <div class="form-check">
                <label class="form-check-label"><input class="checkbox" name="hair" type="radio" value="Long-Stock Hair with Undercoat">2. Long-Stock Hair with Undercoat</label>
              </div>
            </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-4 col-form-label">Testicles</label>
              <div class="col-sm-8">
              <div class="form-check">
                <label class="form-check-label"><input class="checkbox" name="testicles" type="radio" value="Strong, Well Developed">1. Strong, Well Developed</label>
              </div>
              <div class="form-check">
                <label class="form-check-label"><input class="checkbox" name="testicles" type="radio" value="Small">2. Small</label>
              </div>
            </div>
            </div>
</fieldset>
          <fieldset class="form-group">
            <legend><span>Opinion on general condition, size, anatomy, structural strength, movement, instinctive behavior, self-confidence and resilience (TSB)</span></legend>
            <textarea name="description" id="description" cols="147" rows="15" class="span12"></textarea>
          </fieldset>

          <fieldset class="form-group">
            <legend><span>Temperament, nerves, gun-test, instinctive behavior, self-confidence, resillience</span></legend>
            <div class="row">
              <div class="col-sm-6">
              <div class="form-group row">
              <label class="col-sm-4 col-form-label">Temperament</label>
              <div class="col-sm-8">
              <div class="form-check">
                <label class="form-check-label">
                  <input class="checkbox" name="temperament" type="radio" value="Firm">1. Firm</label>
              </div>
              <div class="form-check">
                <label class="form-check-label">
                  <input class="checkbox" name="temperament" type="radio" value="Natural">2. Natural</label>
              </div>
              <div class="form-check">
                <label class="form-check-label">
                  <input class="checkbox" name="temperament" type="radio" value="Lively">3. Lively</label>
              </div>
              <div class="form-check">
                <label class="form-check-label">
                  <input class="checkbox" name="temperament" type="radio" value="Steady">4. Steady</label>
              </div>
            </div>
            </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group row">
                  <label class="col-sm-4 col-form-label">Attentiveness</label>
              <div class="col-sm-8">
              <div class="form-check">
                <label class="form-check-label">
                  <input class="checkbox" name="attentiveness" type="radio" value="Present">1. Present</label>
              </div>
              <div class="form-check">
                <label class="form-check-label">
                  <input class="checkbox" name="attentiveness" type="radio" value="Sufficiently Present">2. Sufficiently Present</label>
              </div>
            </div>
                </div>
              </div>
            </div>
<hr>
            <div class="row">
              <div class="col-sm-6">
              <div class="form-group row">
              <label class="col-sm-4 col-form-label">Nerves</label>
              <div class="col-sm-8">
              <div class="form-check">
                <label class="form-check-label">
                  <input class="checkbox" name="nerves" type="radio" value="Firm">1. Firm</label>
              </div>
              <div class="form-check">
                <label class="form-check-label">
                  <input class="checkbox" name="nerves" type="radio" value="Slightly Excitable">2. Slightly Excitable</label>
              </div>
              <div class="form-check">
                <label class="form-check-label">
                  <input class="checkbox" name="nerves" type="radio" value="Sufficient">3. Sufficient</label>
              </div>
            </div>
            </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group row">
                  <label class="col-sm-4 col-form-label">Non Self Consciousness</label>
              <div class="col-sm-8">
              <div class="form-check">
                <label class="form-check-label">
                  <input class="checkbox" name="non_self_consciousness" type="radio" value="Present">1. Present</label>
              </div>
              <div class="form-check">
                <label class="form-check-label">
                  <input class="checkbox" name="non_self_consciousness" type="radio" value="Sufficient">2. Sufficient</label>
              </div>
            </div>
                </div>
              </div>
            </div>

<hr>
            <div class="row">
              <div class="col-sm-6">
              <div class="form-group row">
              <label class="col-sm-4 col-form-label">Gun Sureness</label>
              <div class="col-sm-8">
              <div class="form-check">
                <label class="form-check-label">
                  <input class="checkbox" name="gun_sureness" type="radio" value="Present">1. Present</label>
              </div>
              <div class="form-check">
                <label class="form-check-label">
                  <input class="checkbox" name="gun_sureness" type="radio" value="Sufficient">2. Sufficient</label>
              </div>
            </div>
            </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group row">
                  <label class="col-sm-4 col-form-label">Instinctive behavior, Self-Confidence, Resilience</label>
              <div class="col-sm-8">
              <div class="form-check">
                <label class="form-check-label">
                  <input class="checkbox" name="instinct" type="radio" value="Pronounced">1. Pronounced</label>
              </div>
              <div class="form-check">
                <label class="form-check-label">
                  <input class="checkbox" name="instinct" type="radio" value="Present">2. Present</label>
              </div>
              <div class="form-check">
                <label class="form-check-label">
                  <input class="checkbox" name="instinct" type="radio" value="Dog Releases">3. Dog Releases</label>
              </div>
            </div>
                </div>
              </div>
            </div>                    
          </fieldset>

          <fieldset class="form-group">
            <legend><span>Assessment During Stand and While Moving</span></legend>
            <div class="row">
              <div class="col-sm-6">
              <div class="form-group row">
              <label class="col-sm-4 col-form-label">Gender Characteristics</label>
              <div class="col-sm-8">
              <div class="form-check">
                <label class="form-check-label">
                  <input class="checkbox" name="gender_char" type="radio" value="Pronounced">1. Pronounced</label>
              </div>
              <div class="form-check">
                <label class="form-check-label">
                  <input class="checkbox" name="gender_char" type="radio" value="Clear">2. Clear</label>
              </div>
            </div>
            </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group row">
                  <label class="col-sm-4 col-form-label">Constitution</label>
              <div class="col-sm-8">
              <div class="form-check">
                <label class="form-check-label">
                  <input class="checkbox" name="constitution" type="radio" value="Strong">1. Strong</label>
              </div>
              <div class="form-check">
                <label class="form-check-label">
                  <input class="checkbox" name="constitution" type="radio" value="Medium Strong">2. Medium Strong</label>
              </div>
              <div class="form-check">
                <label class="form-check-label">
                  <input class="checkbox" name="constitution" type="radio" value="Dry">3. Dry</label>
              </div>
              <div class="form-check">
                <label class="form-check-label">
                  <input class="checkbox" name="constitution" type="radio" value="Slightly Coarse">4. Slightly Coarse</label>
              </div>
              <div class="form-check">
                <label class="form-check-label">
                  <input class="checkbox" name="constitution" type="radio" value="Slightly Elegant">5. Slightly Elegant</label>
              </div>
            </div>
                </div>
              </div>
            </div>

<hr>
            <div class="row">
              <div class="col-sm-6">
              <div class="form-group row">
              <label class="col-sm-4 col-form-label">Expression</label>
              <div class="col-sm-8">
              <div class="form-check">
                <label class="form-check-label">
                  <input class="checkbox" name="expression" type="radio" value="Lively">1. Lively</label>
              </div>
              <div class="form-check">
                <label class="form-check-label">
                  <input class="checkbox" name="expression" type="radio" value="Noble">2. Noble</label>
              </div>
              <div class="form-check">
                <label class="form-check-label">
                  <input class="checkbox" name="expression" type="radio" value="Slightly Unfriendly">3. Slightly Unfriendly</label>
              </div>
            </div>
            </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group row">
                  <label class="col-sm-4 col-form-label">Proportions</label>
              <div class="col-sm-8">
              <div class="form-check">
                <label class="form-check-label">
                  <input class="checkbox" name="proportions" type="radio" value="Normal Proportions">1. Normal Proportions</label>
              </div>
              <div class="form-check">
                <label class="form-check-label">
                  <input class="checkbox" name="proportions" type="radio" value="Ideally Stretched">2. Ideally Stretched</label>
              </div>
              <div class="form-check">
                <label class="form-check-label">
                  <input class="checkbox" name="proportions" type="radio" value="Slightly Short">3. Slightly Short</label>
              </div>
              <div class="form-check">
                <label class="form-check-label">
                  <input class="checkbox" name="proportions" type="radio" value="Strong">4. Strong</label>
              </div>
              <div class="form-check">
                <label class="form-check-label">
                  <input class="checkbox" name="proportions" type="radio" value="Impressive">5. Impressive</label>
              </div>
              <div class="form-check">
                <label class="form-check-label">
                  <input class="checkbox" name="proportions" type="radio" value="Slightly Heavy">6. Slightly Heavy</label>
              </div>
              <div class="form-check">
                <label class="form-check-label">
                  <input class="checkbox" name="proportions" type="radio" value="Sufficiently Impressive">7. Sufficiently Impressive</label>
              </div>
              <div class="form-check">
                <label class="form-check-label">
                  <input class="checkbox" name="proportions" type="radio" value="Deep">8. Deep</label>
              </div>
              <div class="form-check">
                <label class="form-check-label">
                  <input class="checkbox" name="proportions" type="radio" value="Slightly Broad">9. Slightly Broad</label>
              </div>
              <div class="form-check">
                <label class="form-check-label">
                  <input class="checkbox" name="proportions" type="radio" value="Slightly Narrow">10. Slightly Narrow</label>
              </div>
              <div class="form-check">
                <label class="form-check-label">
                  <input class="checkbox" name="proportions" type="radio" value="Slightly Flat Sided">11. Slightly Flat-Sided</label>
              </div>
            </div>
                </div>
              </div>
            </div>
<hr>
            <div class="row">
              <div class="col-sm-6">
              <div class="form-group row">
              <label class="col-sm-4 col-form-label">Bones</label>
              <div class="col-sm-8">
              <div class="form-check">
                <label class="form-check-label">
                  <input class="checkbox" name="bones" type="radio" value="Strong">1. Strong</label>
              </div>
              <div class="form-check">
                <label class="form-check-label">
                  <input class="checkbox" name="bones" type="radio" value="Medium Strong">2. Medium Strong</label>
              </div>
              <div class="form-check">
                <label class="form-check-label">
                  <input class="checkbox" name="bones" type="radio" value="Dry">3. Dry</label>
              </div>
              <div class="form-check">
                <label class="form-check-label">
                  <input class="checkbox" name="bones" type="radio" value="Sufficiently Dry">4. Sufficiently Dry</label>
              </div>
              <div class="form-check">
                <label class="form-check-label">
                  <input class="checkbox" name="bones" type="radio" value="Slightly Big">5. Slightly Big</label>
              </div>
              <div class="form-check">
                <label class="form-check-label">
                  <input class="checkbox" name="bones" type="radio" value="Slightly Elegant">6. Slightly Elegant</label>
              </div>
            </div>
            </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group row">
                  <label class="col-sm-4 col-form-label">Musculature</label>
              <div class="col-sm-8">
              <div class="form-check">
                <label class="form-check-label">
                  <input class="checkbox" name="musculature" type="radio" value="Strong">1. Strong</label>
              </div>
              <div class="form-check">
                <label class="form-check-label">
                  <input class="checkbox" name="musculature" type="radio" value="Sufficiently Strong">2. Sufficiently Strong</label>
              </div>
              <div class="form-check">
                <label class="form-check-label">
                  <input class="checkbox" name="musculature" type="radio" value="Dry">3. Dry</label>
              </div>
              <div class="form-check">
                <label class="form-check-label">
                  <input class="checkbox" name="musculature" type="radio" value="Sufficiently Dry">4. Sufficiently Dry</label>
              </div>
            </div>
                </div>
              </div>
            </div>

<hr>
            <div class="row">
              <div class="col-sm-6">
              <div class="form-group row">
              <label class="col-sm-4 col-form-label">Stand And Limbs - Front</label>
              <div class="col-sm-8">
              <div class="form-check">
                <label class="form-check-label">
                  <input class="checkbox" name="stand_front" type="radio" value="Very Good">1. Very Good</label>
              </div>
              <div class="form-check">
                <label class="form-check-label">
                  <input class="checkbox" name="stand_front" type="radio" value="Good">2. Good</label>
              </div>
              <div class="form-check">
                <label class="form-check-label">
                  <input class="checkbox" name="stand_front" type="radio" value="Sufficient">3. Sufficient</label>
              </div>
            </div>
            </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group row">
                  <label class="col-sm-4 col-form-label">Stand And Limbs - Rear</label>
              <div class="col-sm-8">
              <div class="form-check">
                <label class="form-check-label">
                  <input class="checkbox" name="stand_rear" type="radio" value="Very Good">1. Very Good</label>
              </div>
              <div class="form-check">
                <label class="form-check-label">
                  <input class="checkbox" name="stand_rear" type="radio" value="Good">2. Good</label>
              </div>
              <div class="form-check">
                <label class="form-check-label">
                  <input class="checkbox" name="stand_rear" type="radio" value="Sufficient">3. Sufficient</label>
              </div>
            </div>
                </div>
              </div>
            </div>

<hr>
            <div class="row">
              <div class="col-sm-6">
              <div class="form-group row">
              <label class="col-sm-4 col-form-label">Back</label>
              <div class="col-sm-8">
              <div class="form-check">
                <label class="form-check-label">
                  <input class="checkbox" name="back" type="radio" value="Firm">1. Firm</label>
              </div>
              <div class="form-check">
                <label class="form-check-label">
                  <input class="checkbox" name="back" type="radio" value="Suffieciently Firm">2. Suffieciently Firm</label>
              </div>
              <div class="form-check">
                <label class="form-check-label">
                  <input class="checkbox" name="back" type="radio" value="Slightly Dippy">3. Slightly Dippy</label>
              </div>
              <div class="form-check">
                <label class="form-check-label">
                  <input class="checkbox" name="back" type="radio" value="Light Nick Behind the Withers">4. Light Nick Behind the Withers</label>
              </div>
            </div>
            </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group row">
                  <label class="col-sm-4 col-form-label">Elbow Closure</label>
              <div class="col-sm-8">
              <div class="form-check">
                <label class="form-check-label">
                  <input class="checkbox" name="elbow_closure" type="radio" value="Very Good">1. Very Good</label>
              </div>
              <div class="form-check">
                <label class="form-check-label">
                  <input class="checkbox" name="elbow_closure" type="radio" value="Good">2. Good</label>
              </div>
              <div class="form-check">
                <label class="form-check-label">
                  <input class="checkbox" name="elbow_closure" type="radio" value="Sufficient">3. Sufficient</label>
              </div>
            </div>
                </div>
              </div>
            </div> 

<hr>
            <div class="row">
              <div class="col-sm-6">
              <div class="form-group row">
              <label class="col-sm-4 col-form-label">Front Pastern Firmness</label>
              <div class="col-sm-8">
              <div class="form-check">
                <label class="form-check-label">
                  <input class="checkbox" name="front_firmness" type="radio" value="Good">1. Good</label>
              </div>
              <div class="form-check">
                <label class="form-check-label">
                  <input class="checkbox" name="front_firmness" type="radio" value="Sufficient">2. Sufficient</label>
              </div>
            </div>
            </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group row">
                  <label class="col-sm-4 col-form-label">Front</label>
              <div class="col-sm-8">
              <div class="form-check">
                <label class="form-check-label">
                  <input class="checkbox" name="front" type="radio" value="Straight">1. Straight</label>
              </div>
              <div class="form-check">
                <label class="form-check-label">
                  <input class="checkbox" name="front" type="radio" value="Slightly Open Stand">2. Slightly Open Stand</label>
              </div>
              <div class="form-check">
                <label class="form-check-label">
                  <input class="checkbox" name="front" type="radio" value="Slightly Close Stand">3. Slightly Close Stand</label>
              </div>
              <div class="form-check">
                <label class="form-check-label">
                  <input class="checkbox" name="front" type="radio" value="Not Perfectly Straight">4. Not Perfectly Straight</label>
              </div>
              <div class="form-check">
                <label class="form-check-label">
                  <input class="checkbox" name="front" type="radio" value="Elbow Bump Slightly Distended">4. Elbow Bump Slightly Distended</label>
              </div>
            </div>
                </div>
              </div>
            </div>

<hr>
            <div class="row">
              <div class="col-sm-6">
              <div class="form-group row">
              <label class="col-sm-4 col-form-label">Croup</label>
              <div class="col-sm-8">
              <div class="form-check">
                <label class="form-check-label">
                  <input class="checkbox" name="croup" type="radio" value="Normal Length">1. Normal Length</label>
              </div>
              <div class="form-check">
                <label class="form-check-label">
                  <input class="checkbox" name="croup" type="radio" value="Slightly Short">2. Slightly Short</label>
              </div>
              <div class="form-check">
                <label class="form-check-label">
                  <input class="checkbox" name="croup" type="radio" value="Short">3. Short</label>
              </div>
              <div class="form-check">
                <label class="form-check-label">
                  <input class="checkbox" name="croup" type="radio" value="Normal Lay">4. Normal Lay</label>
              </div>
              <div class="form-check">
                <label class="form-check-label">
                  <input class="checkbox" name="croup" type="radio" value="Horizontal">5. Horizontal</label>
              </div>
              <div class="form-check">
                <label class="form-check-label">
                  <input class="checkbox" name="croup" type="radio" value="Slightly Deep">6. Slightly Deep</label>
              </div>
              <div class="form-check">
                <label class="form-check-label">
                  <input class="checkbox" name="croup" type="radio" value="Deep">7. Deep</label>
              </div>
            </div>
            </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group row">
                  <label class="col-sm-4 col-form-label">Hock Firmness</label>
              <div class="col-sm-8">
              <div class="form-check">
                <label class="form-check-label">
                  <input class="checkbox" name="hock_firmness" type="radio" value="Good">1. Good</label>
              </div>
              <div class="form-check">
                <label class="form-check-label">
                  <input class="checkbox" name="hock_firmness" type="radio" value="Sufficient">2. Sufficient</label>
              </div>
              <div class="form-check">
                <label class="form-check-label">
                  <input class="checkbox" name="hock_firmness" type="radio" value="Not Firm">3. Not Firm</label>
              </div>
            </div>
                </div>
              </div>
            </div>

<hr>
            <div class="row">
              <div class="col-sm-6">
              <div class="form-group row">
              <label class="col-sm-4 col-form-label">Gait</label>
              <div class="col-sm-8">
              <div class="form-check">
                <label class="form-check-label">
                  <input class="checkbox" name="gait" type="radio" value="Front Stright Movement">1. Front Stright Movement</label>
              </div>
              <div class="form-check">
                <label class="form-check-label">
                  <input class="checkbox" name="gait" type="radio" value="Rear Straight Movement">2. Rear Straight Movement</label>
              </div>
              <div class="form-check">
                <label class="form-check-label">
                  <input class="checkbox" name="gait" type="radio" value="Front Narrow Movement">3. Front Narrow Movement</label>
              </div>
              <div class="form-check">
                <label class="form-check-label">
                  <input class="checkbox" name="gait" type="radio" value="Rear Narrow Movement">4. Rear Narrow Movement</label>
              </div>
              <div class="form-check">
                <label class="form-check-label">
                  <input class="checkbox" name="gait" type="radio" value="Front Wide Movement">5. Front Wide Movement</label>
              </div>
              <div class="form-check">
                <label class="form-check-label">
                  <input class="checkbox" name="gait" type="radio" value="Rear Wide Movement">6. Rear Wide Movement</label>
              </div>
              <div class="form-check">
                <label class="form-check-label">
                  <input class="checkbox" name="gait" type="radio" value="Slightly Cow-Hocked">7. Slightly Cow-Hocked</label>
              </div>
              <div class="form-check">
                <label class="form-check-label">
                  <input class="checkbox" name="gait" type="radio" value="Slightly Bow-Legged">8. Slightly Bow-Legged</label>
              </div>
              <div class="form-check">
                <label class="form-check-label">
                  <input class="checkbox" name="gait" type="radio" value="Tends To Pace">9. Tends To Pace</label>
              </div>
            </div>
            </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group row">
                  <label class="col-sm-4 col-form-label">Trot Front</label>
              <div class="col-sm-8">
              <div class="form-check">
                <label class="form-check-label">
                  <input class="checkbox" name="trot_front" type="radio" value="Very Good">1. Very Good</label>
              </div>
              <div class="form-check">
                <label class="form-check-label">
                  <input class="checkbox" name="trot_front" type="radio" value="Good">2. Good</label>
              </div>
              <div class="form-check">
                <label class="form-check-label">
                  <input class="checkbox" name="trot_front" type="radio" value="Can Be More Free">3. Can Be More Free</label>
              </div>
              <div class="form-check">
                <label class="form-check-label">
                  <input class="checkbox" name="trot_front" type="radio" value="Sufficient">4. Sufficient</label>
              </div>
            </div>
                </div>
              </div>
            </div>

<hr>
            <div class="row">
              <div class="col-sm-6">
              <div class="form-group row">
              <label class="col-sm-4 col-form-label">Trot Hind Thrust</label>
              <div class="col-sm-8">
              <div class="form-check">
                <label class="form-check-label">
                  <input class="checkbox" name="trot_hind_thrust" type="radio" value="Very Positive">1. Very Positive</label>
              </div>
              <div class="form-check">
                <label class="form-check-label">
                  <input class="checkbox" name="trot_hind_thrust" type="radio" value="Positive">2. Positive</label>
              </div>
              <div class="form-check">
                <label class="form-check-label">
                  <input class="checkbox" name="trot_hind_thrust" type="radio" value="Sufficiently Positive">3. Sufficiently Positive</label>
              </div>
            </div>
            </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group row">
                  <label class="col-sm-4 col-form-label">Nails</label>
              <div class="col-sm-8">
              <div class="form-check">
                <label class="form-check-label">
                  <input class="checkbox" name="nails" type="radio" value="Dark">1. Dark</label>
              </div>
              <div class="form-check">
                <label class="form-check-label">
                  <input class="checkbox" name="nails" type="radio" value="Medium">2. Medium</label>
              </div>
              <div class="form-check">
                <label class="form-check-label">
                  <input class="checkbox" name="nails" type="radio" value="Light">3. Light</label>
              </div>
            </div>
                </div>
              </div>
            </div>

<hr>
            <div class="row">
              <div class="col-sm-6">
              <div class="form-group row">
              <label class="col-sm-4 col-form-label">Feet</label>
              <div class="col-sm-8">
              <div class="form-check">
                <label class="form-check-label">
                  <input class="checkbox" name="feet" type="radio" value="Front Round">1. Front Round</label>
              </div>
              <div class="form-check">
                <label class="form-check-label">
                  <input class="checkbox" name="feet" type="radio" value="Rear Round">2. Rear Round</label>
              </div>
              <div class="form-check">
                <label class="form-check-label">
                  <input class="checkbox" name="feet" type="radio" value="Front Closed">3. Front Closed</label>
              </div>
              <div class="form-check">
                <label class="form-check-label">
                  <input class="checkbox" name="feet" type="radio" value="Rear Close">4. Rear Closed</label>
              </div>
              <div class="form-check">
                <label class="form-check-label">
                  <input class="checkbox" name="feet" type="radio" value="Front Round/Closed">5. Front Round/Closed</label>
              </div>
              <div class="form-check">
                <label class="form-check-label">
                  <input class="checkbox" name="feet" type="radio" value="Rear Round/Closed">6. Rear Round/Closed</label>
              </div>
              <div class="form-check">
                <label class="form-check-label">
                  <input class="checkbox" name="feet" type="radio" value="Front Slightly Long">7. Front Slightly Long</label>
              </div>
              <div class="form-check">
                <label class="form-check-label">
                  <input class="checkbox" name="feet" type="radio" value="Rear Slightly Long">8. Rear Slightly Long</label>
              </div>
              <div class="form-check">
                <label class="form-check-label">
                  <input class="checkbox" name="feet" type="radio" value="Front Slightly Apart">9. Front Slightly Apart</label>
              </div>
              <div class="form-check">
                <label class="form-check-label">
                  <input class="checkbox" name="feet" type="radio" value="Rear Slightly Apart">10. Rear Slightly Apart</label>
              </div>
            </div>
            </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group row">
                  <label class="col-sm-4 col-form-label">Head</label>
              <div class="col-sm-8">
              <div class="form-check">
                <label class="form-check-label">
                  <input class="checkbox" name="head" type="radio" value="Very Strong">1. Very Strong</label>
              </div>
              <div class="form-check">
                <label class="form-check-label">
                  <input class="checkbox" name="head" type="radio" value="Strong">2. Strong</label>
              </div>
              <div class="form-check">
                <label class="form-check-label">
                  <input class="checkbox" name="head" type="radio" value="Slightly Elegant">3. Slightly Elegant</label>
              </div>
              <div class="form-check">
                <label class="form-check-label">
                  <input class="checkbox" name="head" type="radio" value="Slightly Small">4. Slightly Small</label>
              </div>
              <div class="form-check">
                <label class="form-check-label">
                  <input class="checkbox" name="head" type="radio" value="Slightly Short">5. Slightly Short</label>
              </div>
              <div class="form-check">
                <label class="form-check-label">
                  <input class="checkbox" name="head" type="radio" value="Slightly Long">6. Slightly Long</label>
              </div>
            </div>
                </div>
              </div>
            </div>

<hr>
            <div class="row">
              <div class="col-sm-6">
              <div class="form-group row">
              <label class="col-sm-4 col-form-label">Eye Color</label>
              <div class="col-sm-8">
              <div class="form-check">
                <label class="form-check-label">
                  <input class="checkbox" name="eye_color" type="radio" value="Dark">1. Dark</label>
              </div>
              <div class="form-check">
                <label class="form-check-label">
                  <input class="checkbox" name="eye_color" type="radio" value="Yellowish">2. Yellowish</label>
              </div>
              <div class="form-check">
                <label class="form-check-label">
                  <input class="checkbox" name="eye_color" type="radio" value="Light">3. Light</label>
              </div>
            </div>
            </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group row">
                  <label class="col-sm-4 col-form-label">Upper Jaw</label>
              <div class="col-sm-8">
              <div class="form-check">
                <label class="form-check-label">
                  <input class="checkbox" name="upper_jaw" type="radio" value="Strong">1. Strong</label>
              </div>
              <div class="form-check">
                <label class="form-check-label">
                  <input class="checkbox" name="upper_jaw" type="radio" value="Sufficiently Strong">2. Sufficiently Strong</label>
              </div>
              <div class="form-check">
                <label class="form-check-label">
                  <input class="checkbox" name="upper_jaw" type="radio" value="Slightly Narrow">3. Slightly Narrow</label>
              </div>
              <div class="form-check">
                <label class="form-check-label">
                  <input class="checkbox" name="upper_jaw" type="radio" value="Stretched">4. Stretched</label>
              </div>
            </div>
                </div>
              </div>
            </div>  

<hr>
            <div class="row">
              <div class="col-sm-6">
              <div class="form-group row">
              <label class="col-sm-4 col-form-label">Lower Jaw</label>
              <div class="col-sm-8">
              <div class="form-check">
                <label class="form-check-label">
                  <input class="checkbox" name="lower_jaw" type="radio" value="Strong">1. Strong</label>
              </div>
              <div class="form-check">
                <label class="form-check-label">
                  <input class="checkbox" name="lower_jaw" type="radio" value="Sufficiently Strong">2. Sufficiently Strong</label>
              </div>
              <div class="form-check">
                <label class="form-check-label">
                  <input class="checkbox" name="lower_jaw" type="radio" value="Slightly Weak">3. Slightly Weak</label>
              </div>
            </div>
            </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group row">
                  <label class="col-sm-4 col-form-label">Bite</label>
              <div class="col-sm-8">
              <div class="form-check">
                <label class="form-check-label">
                  <input class="checkbox" name="bite" type="radio" value="Healthy">1. Healthy</label>
              </div>
              <div class="form-check">
                <label class="form-check-label">
                  <input class="checkbox" name="bite" type="radio" value="Strong">2. Strong</label>
              </div>
              <div class="form-check">
                <label class="form-check-label">
                  <input class="checkbox" name="bite" type="radio" value="Gapless">3. Gapless</label>
              </div>
              <div class="form-check">
                <label class="form-check-label">
                  <input class="checkbox" name="bite" type="radio" value="Scissor Bite">4. Scissor Bite</label>
              </div>
              <div class="form-check">
                <label class="form-check-label">
                  <input class="checkbox" name="bite" type="radio" value="Slightly Weak">5. Slightly Weak</label>
              </div>
              <div class="form-check">
                <label class="form-check-label">
                  <input class="checkbox" name="bite" type="radio" value="Slightly Brown">6. Slightly Brown</label>
              </div>
              <div class="form-check">
                <label class="form-check-label">
                  <input class="checkbox" name="bite" type="radio" value="Incomplete Tooth Position">7. Incomplete Tooth Position</label>
              </div>
              <div class="form-check">
                <label class="form-check-label">
                  <input class="checkbox" name="bite" type="radio" value="Middle Incissors Open Bite">8. Middle Incissors Open Bite</label>
              </div>
              <div class="form-check">
                <label class="form-check-label">
                  <input class="checkbox" name="bite" type="radio" value="Wear With Age">9. Wear With Age</label>
              </div>
              <div class="form-check">
                <label class="form-check-label">
                  <input class="checkbox" name="bite" type="radio" value="Slightly Wry Mouth">10. Slightly Wry Mouth</label>
              </div>
              <div class="form-check">
                <label class="form-check-label">
                  <input class="checkbox" name="bite" type="radio" value="Double Pre-Molars">11. Double Pre-Molars</label>
              </div>
            </div>
                </div>
              </div>
            </div>                                                                                                                 
<hr>
            <div class="row">
              <div class="col-sm-6">
              <div class="form-group row">
              <label class="col-sm-4 col-form-label">Teeth Faults</label>
              <div class="col-sm-8">
              <div class="form-check">
                <label class="form-check-label">
                  <input class="checkbox" name="teeth_faults" type="radio" value="P1 Upper Left">1. P1 Upper Left</label>
              </div>
              <div class="form-check">
                <label class="form-check-label">
                  <input class="checkbox" name="teeth_faults" type="radio" value="P1 Upper Right">2. P1 Upper Right</label>
              </div>
              <div class="form-check">
                <label class="form-check-label">
                  <input class="checkbox" name="teeth_faults" type="radio" value="P1 Lower Left">3. P1 Lower Left</label>
              </div>
              <div class="form-check">
                <label class="form-check-label">
                  <input class="checkbox" name="teeth_faults" type="radio" value="P1 Lower Right">4. P1 Lower Right</label>
              </div>
            </div>
            </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group row">
                  <label class="col-sm-4 col-form-label">Neutered</label>
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
              <label class="col-sm-4 col-form-label">HD</label>
              <div class="col-sm-8">
              <input type="text" class="form-control" name="hd" id="hd" />
            </div>
            </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group row">
                  <label class="col-sm-4 col-form-label">ED</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" name="ed" id="ed" />
                  </div>
                </div>
              </div>
            </div>

<hr>
            <div class="row">
              <div class="col-sm-6">
              <div class="form-group row">
              <label class="col-sm-4 col-form-label">DNA Status</label>
                  <div class="col-sm-8">
                    <select class="form-control" name="dna_status" id="dna_status">
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
            <legend><span>Particular Virtues and Faults (as a compliment to the overall judgement)</span></legend>
            <textarea name="virtues" id="virtues" cols="147" rows="15" class="span12"></textarea>
          </fieldset>

           <fieldset class="form-group">
            <legend><span>Breeding Recommendations</span></legend>
            <textarea name="breed_rec" id="breed_rec" cols="147" rows="15" class="span12"></textarea>
           </fieldset>

           <fieldset class="form-group">
            <legend><span>Dog Image</span></legend>
            <input type="file" id="dog_img" name="dog_img" accept="image/png, image/jpeg">
           </fieldset>          

          <div class="form-buttons-w">
            <button class="btn btn-primary" type="submit"> Submit</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


@endsection