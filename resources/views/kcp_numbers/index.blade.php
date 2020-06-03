@extends('layouts.master')

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
        <a href="{{ route('KCPNumber.create') }}" class="btn btn-lg btn-success">
			   <i class="fa fa-plus-circle"> New</i>
		    </a>
        @if ($message = Session::get('success'))
        <p></p>
          <div class="alert alert-success" id="msg">
              <p>{{ $message }}</p>
          </div>
        @elseif ($message = Session::get('danger'))
          <div class="alert alert-danger" id="msg">
              <p>{{ $message }}</p>
          </div>
        @endif
          <div class="form-desc">
            <!-- <a href="https://www.datatables.net/" target="_blank">Learn More about DataTables</a> -->
          </div>
          <div class="table-responsive">
            <table id="dataTable1" width="100%" class="table table-striped table-bordered table-lightfont">
            	<thead>
            		<tr>
            			<th style="width:  4.33%">S.no</th>
            			<th>Start Range</th>
            			<th>End Range</th>
                  <th>Last Issued No</th>
                  <th>Issued Date</th>
                  <th>Created</th>
                  <th>Status</th>
                  <th>Actions</th>
            		</tr>
            	</thead>
            	<tfoot>
            		<tr>
            			<th style="width:  4.33%">S.no</th>
            			<th>Start Range</th>
                  <th>End Range</th>
                  <th>Last Issued No</th>
                  <th>Issued Date</th>
                  <th>Created</th>
                  <th>Status</th>
                  <th>Actions</th>
            		</tr>
            	</tfoot>
            	<tbody>
            		<?php
      					 $i = 1;
      					?>
					    @foreach ($kcp_number as $key => $kcp)
                	<tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $kcp->start_range }}</td>
                    <td>{{ $kcp->end_range }}</td>
                    <td>{{ $kcp->last_issued_no }}</td>
                    <td>{{ $issue_date=date('d-m-Y', strtotime($kcp->created_at)) }}</td>
                    <td>{{ $created=date('d-m-Y h:i:s', strtotime($kcp->created_at)) }}</td>
                    <td><span class="badge badge-secondary">{{ $kcp->status }}</span></td>
                    
                    <td>
                      <div class="btn-group d-inline-block">
        						  <a href="{{ route('KCPNumber.edit',$kcp->id) }}" class="btn btn-primary" data-toggle="tooltip" data-placement="top"
                          title="Edit">
        						    <i class="fa fa-pencil"></i>
        						  </a>
        						  <!-- <a href="" class="btn btn-danger" data-id="{{$kcp->id}}" data-toggle="tooltip" data-placement="top"
                          title="Delete">
        						    <i class="fa fa-trash-o"></i>
        						  </a> -->
                      <a><button class="btn btn-danger" onclick="deleteData({{$kcp->id}})" type="submit" data-id="{{$kcp->id}}" data-toggle="tooltip" data-placement="top"
                          title="Delete"><i class="fa fa-trash-o"></i></button></a>

        					  </div>
                    </td>
                	</tr>
            		@endforeach 
            	</tbody>
            	
            </table>
          </div>
        </div>
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

  <script>
    function deleteData(id){
        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this record!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    url : "{{ url('/destroy')}}" + '/' + id,
                    type : "GET",
                    data : {'_method' : 'DELETE'},
                    success: function(data){
                        swal("Done! Record successfully deleted!", {
                        icon: "success",
                        }).then(function() {
                            window.location = "KCPNumber";
                        });
                    },
                    error : function(){
                        swal({
                            title: 'Opps...',
                            text : data.message,
                            type : 'error',
                            timer : '1500'
                        })
                    }
                })
            } else {
            swal("Your record is safe!");
            }
        });
      }
  </script>

@endsection