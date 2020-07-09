@extends('layouts.master')
<style type="text/css">
.no-drop {cursor: no-drop;}
</style>
@section('content')
  <div class="content-i">
    <div class="content-box">
      <div class="element-wrapper">
        <h6 class="element-header">
          KCP Numbers
        </h6>
        <div class="element-box">
          <h5 class="form-header">
            KCP Numbers - List
          </h5>
        <form action="{{ route('KCPNumber.update',$kcp_number->id) }}" method="POST" id="formValidate">
        @csrf
        @method('PUT')
        <fieldset class="form-group">
            <!-- <legend><span>Section Example</span></legend> -->
            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="">Start Range:</label><input class="form-control" name="start_range" data-error="Please input your Start Range" value="{{ $kcp_number->start_range }}" required="required" type="text">
                  <div class="help-block form-text with-errors form-control-feedback"></div>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="">End Range:</label><input class="form-control" name="end_range" data-error="Please input your End Range" value="{{ $kcp_number->end_range }}" required="required" type="text">
                  <div class="help-block form-text with-errors form-control-feedback"></div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="">Range Issued Date:</label><input class="form-control no-drop" type="text" value="{{ date('d-m-Y') }}" readonly="readonly">
                  <input type="hidden" value="1000" name="last_issued_no">
                  <input type="hidden" value="1" name="created_by">
                </div>
              </div>
            </div>
          </fieldset>
          <div class="form-buttons-w">
          	<button class="btn btn-primary" type="submit"> Submit</button>
          	<!-- <button class="btn btn-secondary" type="reset"> Reset</button> -->
	        <a type="button" href="{{ route('KCPNumber.index') }}" class="btn btn-white">
	          Cancel
	        </a>
          </div>
      	</form>
      </div><!--------------------
      START - Color Scheme Toggler
      -------------------->
      <div class="floated-colors-btn second-floated-btn">
        <div class="os-toggler-w">
          <div class="os-toggler-i">
            <div class="os-toggler-pill"></div>
          </div>
        </div>
        <span>Dark </span><span>Mode</span>
      </div>
      <!--------------------
      END - Color Scheme Toggler
      --------------------><!--------------------
      START - Demo Customizer
      -------------------->
      <div class="floated-customizer-btn third-floated-btn">
        <div class="icon-w">
          <i class="os-icon os-icon-ui-46"></i>
        </div>
        <span>Customizer</span>
      </div>
      <div class="floated-customizer-panel">
        <div class="fcp-content">
          <div class="close-customizer-btn">
            <i class="os-icon os-icon-x"></i>
          </div>
          <div class="fcp-group">
            <div class="fcp-group-header">
              Menu Settings
            </div>
            <div class="fcp-group-contents">
              <div class="fcp-field">
                <label for="">Menu Position</label><select class="menu-position-selector">
                  <option value="left">
                    Left
                  </option>
                  <option value="right">
                    Right
                  </option>
                  <option value="top">
                    Top
                  </option>
                </select>
              </div>
              <div class="fcp-field">
                <label for="">Menu Style</label><select class="menu-layout-selector">
                  <option value="compact">
                    Compact
                  </option>
                  <option value="full">
                    Full
                  </option>
                  <option value="mini">
                    Mini
                  </option>
                </select>
              </div>
              <div class="fcp-field with-image-selector-w">
                <label for="">With Image</label><select class="with-image-selector">
                  <option value="yes">
                    Yes
                  </option>
                  <option value="no">
                    No
                  </option>
                </select>
              </div>
              <div class="fcp-field">
                <label for="">Menu Color</label>
                <div class="fcp-colors menu-color-selector">
                  <div class="color-selector menu-color-selector color-bright selected"></div>
                  <div class="color-selector menu-color-selector color-dark"></div>
                  <div class="color-selector menu-color-selector color-light"></div>
                  <div class="color-selector menu-color-selector color-transparent"></div>
                </div>
              </div>
            </div>
          </div>
          <div class="fcp-group">
            <div class="fcp-group-header">
              Sub Menu
            </div>
            <div class="fcp-group-contents">
              <div class="fcp-field">
                <label for="">Sub Menu Style</label><select class="sub-menu-style-selector">
                  <option value="flyout">
                    Flyout
                  </option>
                  <option value="inside">
                    Inside/Click
                  </option>
                  <option value="over">
                    Over
                  </option>
                </select>
              </div>
              <div class="fcp-field">
                <label for="">Sub Menu Color</label>
                <div class="fcp-colors">
                  <div class="color-selector sub-menu-color-selector color-bright selected"></div>
                  <div class="color-selector sub-menu-color-selector color-dark"></div>
                  <div class="color-selector sub-menu-color-selector color-light"></div>
                </div>
              </div>
            </div>
          </div>
          <div class="fcp-group">
            <div class="fcp-group-header">
              Other Settings
            </div>
            <div class="fcp-group-contents">
              <div class="fcp-field">
                <label for="">Full Screen?</label><select class="full-screen-selector">
                  <option value="yes">
                    Yes
                  </option>
                  <option value="no">
                    No
                  </option>
                </select>
              </div>
              <div class="fcp-field">
                <label for="">Show Top Bar</label><select class="top-bar-visibility-selector">
                  <option value="yes">
                    Yes
                  </option>
                  <option value="no">
                    No
                  </option>
                </select>
              </div>
              <div class="fcp-field">
                <label for="">Above Menu?</label><select class="top-bar-above-menu-selector">
                  <option value="yes">
                    Yes
                  </option>
                  <option value="no">
                    No
                  </option>
                </select>
              </div>
              <div class="fcp-field">
                <label for="">Top Bar Color</label>
                <div class="fcp-colors">
                  <div class="color-selector top-bar-color-selector color-bright selected"></div>
                  <div class="color-selector top-bar-color-selector color-dark"></div>
                  <div class="color-selector top-bar-color-selector color-light"></div>
                  <div class="color-selector top-bar-color-selector color-transparent"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!--------------------
      END - Demo Customizer
      -------------------->
    </div>
  </div>

@endsection