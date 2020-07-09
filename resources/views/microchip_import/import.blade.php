@extends('layouts.master')

@section('content')

<div id="content">
<div class="wrapper">
<div class="page-header">

</div>

<div class="content-i">
            <div class="content-box"><div class="row">
  <div class="col-lg-12">
    <div class="element-wrapper">
      <h6 class="element-header">
        Microchips - Import
      </h6>
      <div class="element-box">
        <form class="form-horizontal" action="" method="post" name="frmCSVImport" id="frmCSVImport" enctype="multipart/form-data">
          <div class="row">
            <div class="col-sm-6">
              <div class="form-group">
                <label class="col-md-4 control-label">Choose CSV File</label>
                <input type="file" name="file" id="file" accept=".csv">
              </div>
            </div>
          </div>

          <div class="form-buttons-w">
            <button type="submit" id="submit" name="import" class="btn btn-primary">Import</button>
          </div>
        </form>
      </div>
    </div>
  </div>


@endsection