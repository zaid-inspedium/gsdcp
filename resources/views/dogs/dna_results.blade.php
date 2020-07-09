@extends('layouts.master')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">

@section('content')

    <div class="content-panel-toggler">
            <i class="os-icon os-icon-grid-squares-22"></i><span>Sidebar</span>
          </div>
          <div class="content-i">
            <div class="content-box"><div class="element-wrapper">
  <h6 class="element-header">
    Dogs - DNA Results
  </h6>
  <div class="element-box">
    <h5 class="form-header">
      <a action="back" href="javascript: window.history.back();" class="btn btn-secondary">
        <i class="fa fa-backward"> </i><span> &nbsp; Back</span>
      </a>
      <?php 
        $url  = $_SERVER["PHP_SELF"];
        $path = explode("/", $url); 
        $last = end($path); 
      ?>
      <span class="pull-right btn-lg"><input type="checkbox" onchange="check_sex()" id="sex"
      <?php 
        if ($last == "Male") { ?> checked="checked" 
      <?php } ?> 
      data-toggle="toggle" data-on="<i class='fa fa-mars'></i> Male"  data-onstyle="success" data-off="<i class='fa fa-venus danger'></i> Female &nbsp;&nbsp;&nbsp;" data-offstyle="danger"></span>

    </h5>
    <?php 
      if ($last == "Male") { ?>
      <style type="text/css">
      #list-repeat-list, #list-not_proven-list {
        display: none;
      }
      </style>
    <?php } ?> 
    <div class="controls-above-table">
      <div class="row">
        
      </div>
    </div>
    <hr>

      <div class="row">
        <div class="col-2">
          <div class="list-group" id="list-tab" role="tablist">
            <a class="list-group-item list-group-item-action active" id="list-proven-list" data-toggle="list" href="#list-proven" role="tab" aria-controls="proven">Proven</a>
            <a class="list-group-item list-group-item-action" id="list-stored-list" data-toggle="list" href="#list-stored" role="tab" aria-controls="stored">Stored</a>
            <a class="list-group-item list-group-item-action" id="list-repeat-list" data-toggle="list" href="#list-repeat" role="tab" aria-controls="repeat">Repeat</a>
            <a class="list-group-item list-group-item-action" id="list-applied_for-list" data-toggle="list" href="#list-applied_for" role="tab" aria-controls="applied_for">Applied For</a>
            <a class="list-group-item list-group-item-action" id="list-not_available-list" data-toggle="list" href="#list-not_available" role="tab" aria-controls="not_available">Not Available</a>
            <a class="list-group-item list-group-item-action" id="list-not_proven-list" data-toggle="list" href="#list-not_proven" role="tab" aria-controls="not_proven">Not Proven</a>
          </div>
        </div>
        <div class="col-10">
          <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="list-proven" role="tabpanel" aria-labelledby="list-proven-list">
              <div class="table-responsive">
                <table id="dataTable1" class="table table-lightborder table-hover table-bordered">
                  <thead>
                    <tr>
                      <th>
                        Name / SV DNA Reg. Number
                      </th>
                      <th>
                        KCP Reg. Number
                      </th>
                      <th>
                        Tatoo / Microchip
                      </th>
                      <th>
                        DNA Status
                      </th>
                      <th>
                        Owner(s)
                      </th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($proven as $pro)
                      <tr>
                        <td><a href="{{ URL::to('/view_pedigree',$pro->id) }}">{{ $pro->dog_name }}</a></td>
                        <td>{{ $pro->KP }}</td>
                        <td>{{ $pro->microchip }}</td>
                        <td>{{ $pro->DNA_status }}</td>
                        <?php
                          if(isset($pro->dog_owners[0])) {
                            if($pro->dog_owners[0]->owner_id == NULL) {
                              $owner_first_name = "";
                              $owner_last_name = "";
                            }else{
                              $owner_first_name = $pro->dog_owners[0]->owners->first_name;
                              $owner_last_name = $pro->dog_owners[0]->owners->last_name;
                            }
                          }else{
                              $owner_first_name = "";
                              $owner_last_name = "";
                            } 
                        ?>
                      <td>{{ $owner_first_name.' '.$owner_last_name }}</td>
                      </tr>
                    @endforeach 
                  </tbody>
                </table>
              </div>
            </div>
            <div class="tab-pane fade" id="list-stored" role="tabpanel" aria-labelledby="list-stored-list">
              <div class="table-responsive">
                <table id="dataTable2" class="table table-lightborder table-hover table-bordered">
                  <thead>
                    <tr>
                      <th>
                        Name / SV DNA Reg. Number
                      </th>
                      <th>
                        KCP Reg. Number
                      </th>
                      <th>
                        Tatoo / Microchip
                      </th>
                      <th>
                        DNA Status
                      </th>
                      <th>
                        Owner(s)
                      </th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($stored as $sto)
                      <tr>
                        <td><a href="{{ URL::to('/view_pedigree',$sto->id) }}">{{ $sto->dog_name }}</a></td>
                        <td>{{ $sto->KP }}</td>
                        <td>{{ $sto->microchip }}</td>
                        <td>{{ $sto->DNA_status }}</td>
                        <?php
                          if(isset($sto->dog_owners[0])) {
                            if($sto->dog_owners[0]->owner_id == NULL) {
                              $owner_first_name = "";
                              $owner_last_name = "";
                            }else{
                              $owner_first_name = $sto->dog_owners[0]->owners->first_name;
                              $owner_last_name = $sto->dog_owners[0]->owners->last_name;
                            }
                          }else{
                              $owner_first_name = "";
                              $owner_last_name = "";
                            } 
                        ?>
                        <td>{{ $owner_first_name.' '.$owner_last_name }}</td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
            <div class="tab-pane fade" id="list-repeat" role="tabpanel" aria-labelledby="list-repeat-list">
              <div class="table-responsive">
                <table id="dataTable3" class="table table-lightborder table-hover table-bordered">
                  <thead>
                    <tr>
                      <th>
                        Name / SV DNA Reg. Number
                      </th>
                      <th>
                        KCP Reg. Number
                      </th>
                      <th>
                        Tatoo / Microchip
                      </th>
                      <th>
                        DNA Status
                      </th>
                      <th>
                        Owner(s)
                      </th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($repeat as $rep)
                      <tr>
                        <td><a href="{{ URL::to('/view_pedigree',$rep->id) }}">{{ $rep->dog_name }}</a></td>
                        <td>{{ $rep->KP }}</td>
                        <td>{{ $rep->microchip }}</td>
                        <td>{{ $rep->DNA_status }}</td>
                        <?php
                          if(isset($rep->dog_owners[0])) {
                            if($rep->dog_owners[0]->owner_id == NULL) {
                              $owner_first_name = "";
                              $owner_last_name = "";
                            }else{
                              $owner_first_name = $rep->dog_owners[0]->owners->first_name;
                              $owner_last_name = $rep->dog_owners[0]->owners->last_name;
                            }
                          }else{
                              $owner_first_name = "";
                              $owner_last_name = "";
                            } 
                        ?>
                        <td>{{ $owner_first_name.' '.$owner_last_name }}</td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
            <div class="tab-pane fade" id="list-applied_for" role="tabpanel" aria-labelledby="list-applied_for-list">
              <div class="table-responsive">
                <table id="dataTable4" class="table table-lightborder table-hover table-bordered">
                  <thead>
                    <tr>
                      <th>
                        Name / SV DNA Reg. Number
                      </th>
                      <th>
                        KCP Reg. Number
                      </th>
                      <th>
                        Tatoo / Microchip
                      </th>
                      <th>
                        DNA Status
                      </th>
                      <th>
                        Owner(s)
                      </th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($applied_for as $app)
                      <tr>
                        <td><a href="{{ URL::to('/view_pedigree',$app->id) }}">{{ $app->dog_name }}</a></td>
                        <td>{{ $app->KP }}</td>
                        <td>{{ $app->microchip }}</td>
                        <td>{{ $app->DNA_status }}</td>
                        <?php
                          if(isset($app->dog_owners[0])) {
                            if($app->dog_owners[0]->owner_id == NULL) {
                              $owner_first_name = "";
                              $owner_last_name = "";
                            }else{
                              $owner_first_name = $app->dog_owners[0]->owners->first_name;
                              $owner_last_name = $app->dog_owners[0]->owners->last_name;
                            }
                          }else{
                              $owner_first_name = "";
                              $owner_last_name = "";
                            } 
                        ?>
                        <td>{{ $owner_first_name.' '.$owner_last_name }}</td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
            <div class="tab-pane fade" id="list-not_available" role="tabpanel" aria-labelledby="list-not_available-list">
              <div class="table-responsive">
                <table id="dataTable5" class="table table-lightborder table-hover table-bordered">
                  <thead>
                    <tr>
                      <th>
                        Name / SV DNA Reg. Number
                      </th>
                      <th>
                        KCP Reg. Number
                      </th>
                      <th>
                        Tatoo / Microchip
                      </th>
                      <th>
                        DNA Status
                      </th>
                      <th>
                        Owner(s)
                      </th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($not_available as $not_avail)
                      <tr>
                        <td><a href="{{ URL::to('/view_pedigree',$not_avail->id) }}">{{ $not_avail->dog_name }}</a></td>
                        <td>{{ $not_avail->KP }}</td>
                        <td>{{ $not_avail->microchip }}</td>
                        <td>{{ $not_avail->DNA_status }}</td>
                        <?php
                          if(isset($not_avail->dog_owners[0])) {
                            if($not_avail->dog_owners[0]->owner_id == NULL) {
                              $owner_first_name = "";
                              $owner_last_name = "";
                            }else{
                              $owner_first_name = $not_avail->dog_owners[0]->owners->first_name;
                              $owner_last_name = $not_avail->dog_owners[0]->owners->last_name;
                            }
                          }else{
                              $owner_first_name = "";
                              $owner_last_name = "";
                            } 
                        ?>
                        <td>{{ $owner_first_name.' '.$owner_last_name }}</td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
            <div class="tab-pane fade" id="list-not_proven" role="tabpanel" aria-labelledby="list-not_proven-list">
              <div class="table-responsive">
                <table id="dataTable6" class="table table-lightborder table-hover table-bordered">
                  <thead>
                    <tr>
                      <th>
                        Name / SV DNA Reg. Number
                      </th>
                      <th>
                        KCP Reg. Number
                      </th>
                      <th>
                        Tatoo / Microchip
                      </th>
                      <th>
                        DNA Status
                      </th>
                      <th>
                        Owner(s)
                      </th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($not_proven as $not_pro)
                      <tr>
                        <td><a href="{{ URL::to('/view_pedigree',$not_pro->id) }}">{{ $not_pro->dog_name }}</a></td>
                        <td>{{ $not_pro->KP }}</td>
                        <td>{{ $not_pro->microchip }}</td>
                        <td>{{ $not_pro->DNA_status }}</td>
                        <?php
                          if(isset($not_pro->dog_owners[0])) {
                            if($not_pro->dog_owners[0]->owner_id == NULL) {
                              $owner_first_name = "";
                              $owner_last_name = "";
                            }else{
                              $owner_first_name = $not_pro->dog_owners[0]->owners->first_name;
                              $owner_last_name = $not_pro->dog_owners[0]->owners->last_name;
                            }
                          }else{
                              $owner_first_name = "";
                              $owner_last_name = "";
                            } 
                        ?>
                        <td>{{ $owner_first_name.' '.$owner_last_name }}</td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- <span id="demo"></span> -->

  </div>
</div>
<script type="text/javascript">
function check_sex() {
  var value = document.getElementById("sex").checked;
  if (value == false) {
    value = "Female";
    document.getElementById("list-repeat-list").style.display = 'block';
    document.getElementById("list-not_proven-list").style.display = 'block';
  }
  else {
    value = "Male";
    document.getElementById("list-repeat-list").style.display = 'none';
    document.getElementById("list-not_proven-list").style.display = 'none';
  }
  window.location = '/DNAResults'+'/'+value;
}
</script>
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
@endsection