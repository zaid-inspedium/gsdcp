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
<div id="content">
<div class="wrapper">
<div class="page-header">
<h5 class="widget-name">
Dogs </h5>
</div>

<div class="content-i">
            <div class="content-box">
              <div class="element-wrapper">
                <h6 class="element-header">
                  Dogs
                </h6>
                <div class="element-box">
                  <div class="table-responsive">
                    <table id="dataTable1" width="100%" class="table table-striped table-lightfont">
                      <thead>
                        <tr>
                          <th>Dog Name</th>
                          <th>Sex</th>
                          <th>Microchip</th>
                          <th>KP</th>
                          <th>
                            <select id="breed_survey" name="search[breed_survey]">
                              <option value="">- Select Breed Survey -</option>
                               <option value="Proven">Done</option>
                               <option value="Stored">Not Done</option>
                            </select>
                             </th>
                          <th>
                            <select id="DNA_status" name="search[DNA_status]">
                              <option value="">- Select DNA Status -</option>
                               <option value="">Proven</option>
                               <option value="">Stored</option>
                               <option value="">Repeat</option>
                               <option value="">Applied For</option>
                               <option value="">Not Available</option>
                               <option value="">Not Proven</option>
                            </select>
                             </th>
                          <th>Status</th>
                          <th>Owners</th>
                          <th>Owener Info</th>
                          <th>Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td>
                          <a><i class="fa-pencil-square-o"></i></a>
                          <a><i class="os-icon os-icon-ui-46"></i></a>
                          <a><i class="os-icon os-icon-ui-15"></i></a>
                          </td>
                        </tr>
                        </tbody>
                      </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>


@endsection