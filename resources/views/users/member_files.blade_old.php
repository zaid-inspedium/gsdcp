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
      <style>
        #filedrag
{
  display: none;
  font-weight: bold;
  text-align: center;
  padding: 1em 0;
  margin: 1em 0;
  color: #555;
  border: 2px dashed #555;
  border-radius: 7px;
  cursor: default;
}

#filedrag.hover
{
  color: #f00;
  border-color: #f00;
  border-style: solid;
  box-shadow: inset 0 3px 4px #888;
}
      </style>
<div class="content-panel-toggler">
            <i class="os-icon os-icon-grid-squares-22"></i><span>Sidebar</span>
          </div>
          <div class="content-i">
            <div class="content-box"><div class="row">
  
  <div class="col-sm-12">
    <div class="element-wrapper">
      <div class="element-box">
        <h6 class="element-header">
          File Upload
        </h6>
        <form id="formValidate">
          <div class="element-info">
            <div class="element-info-with-icon">
              <div class="element-info-icon">
            </div>
          </div>
          <input type="hidden" id="MAX_FILE_SIZE" name="MAX_FILE_SIZE" value="300000" />
<div>
  <label for="fileselect">Files to upload:</label>
  <input type="file" id="fileselect" name="fileselect[]" multiple="multiple" />
  <div id="filedrag">or drop files here</div>
</div>
          <div class="form-buttons-w">
            <button class="btn btn-primary" type="submit"> Submit</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="content-box">
              <div class="element-wrapper">
                <h6 class="element-header">
                  Ahmed Naeem Khan's Files
                </h6>
                <div class="element-box">
                  <div class="table-responsive">
                    <table id="dataTable1" width="100%" class="table table-striped table-lightfont">
                      <thead>
                        <tr>
                          <th>Serial #</th>
                          <th>File</th>
                          <th>Size</th>
                          <th>Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
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


<script>
  // getElementById
function $id(id) {
  return document.getElementById(id);
}

//
// output information
function Output(msg) {
  var m = $id("messages");
  m.innerHTML = msg + m.innerHTML;
}

// call initialization file
if (window.File && window.FileList && window.FileReader) {
  Init();
}

//
// initialize
function Init() {

  var fileselect = $id("fileselect"),
    filedrag = $id("filedrag"),
    submitbutton = $id("submitbutton");

  // file select
  fileselect.addEventListener("change", FileSelectHandler, false);

  // is XHR2 available?
  var xhr = new XMLHttpRequest();
  if (xhr.upload) {
  
    // file drop
    filedrag.addEventListener("dragover", FileDragHover, false);
    filedrag.addEventListener("dragleave", FileDragHover, false);
    filedrag.addEventListener("drop", FileSelectHandler, false);
    filedrag.style.display = "block";
    
    // remove submit button
    submitbutton.style.display = "none";
  }

}

// file drag hover
function FileDragHover(e) {
  e.stopPropagation();
  e.preventDefault();
  e.target.className = (e.type == "dragover" ? "hover" : "");
}

// file selection
function FileSelectHandler(e) {

  // cancel event and hover styling
  FileDragHover(e);

  // fetch FileList object
  var files = e.target.files || e.dataTransfer.files;

  // process all File objects
  for (var i = 0, f; f = files[i]; i++) {
    ParseFile(f);
  }

}

function ParseFile(file) {

  Output(
    "<p>File information: <strong>" + file.name +
    "</strong> type: <strong>" + file.type +
    "</strong> size: <strong>" + file.size +
    "</strong> bytes</p>"
  );
  
}
</script>


@endsection
