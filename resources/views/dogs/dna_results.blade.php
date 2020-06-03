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
      DNA Results
    </h5>
    <!--------------------
    START - Controls Above Table
    -------------------->
    <div class="controls-above-table">
      <div class="row">
        <div class="col-sm-6">
          <a class="btn btn-sm btn-secondary" href="#">Male</a><a class="btn btn-sm btn-danger" href="#">Female</a>
        </div>
        <div class="col-sm-6">
          <form class="form-inline justify-content-sm-end">
            <select class="form-control form-control-sm rounded bright">
              <option selected="selected" value="">
                Select Status
              </option>
              <option value="Proven">
                Proven
              </option>
              <option value="Not Applied For">
                Not Applied For
              </option>
              <option value="Repeat">
                Repeat
              </option>
            </select>
          </form>
        </div>
      </div>
    </div>
    <!--------------------
    END - Controls Above Table
    -------------------->
    <div class="table-responsive">
      <!--------------------
      START - Basic Table
      -------------------->
      <table class="table table-lightborder">
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
            <th class="text-center">
              DNA Status
            </th>
            <th class="text-right">
              Owner(s)
            </th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>
              
            </td>
            <td>
              
            </td>
            <td>
              
            </td>
            <td class="text-center">
              
            </td>
            <td class="text-right">
              
            </td>
          </tr>
        </tbody>
      </table>
      <!--------------------
      END - Basic Table
      -------------------->
    </div>
  </div>
</div>
@endsection