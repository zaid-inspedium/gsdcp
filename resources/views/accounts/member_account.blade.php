@extends('layouts.master')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
            <div class="content-box">
              <div class="row">
  <div class="col-lg-12">
    <div class="element-wrapper">
      <h6 class="element-header">
        Member's Account
      </h6>
      <div class="element-box">
        <form>
          <span class="badge badge-important pull-right" style="color:white;background-color: red;">Kennels Registration Fee: 0</span>
          <br>
          <legend><span>Add Credit Form</span></legend>
          <div class="form-group">
            <label for="">Payment Method<span class="req" style="color:red;">*</span></label><select class="form-control" id="paytype"
            name="paytype">
              <option value="0">
                PayOrder
              </option>
              <option value="1">
                Cash
              </option>
              <option value="2">
                Demond Draft
              </option>
              <option value="3">
                Online Transfer / Telegraphic
              </option>
              <option value="4">
                Cheque
              </option>
              <option value="5">
                Credit
              </option>
            </select>
          </div>
          <div class="form-group">
            <label for="">Date <span class="req" style="color:red;">*</span></label><input id="date" name="date" class="form-control" placeholder="" type="date">
          </div>
          <div class="row">
            <div class="col-sm-6">
              <div class="form-group">
                <label for="">Amount</label><input id="amount" name="amount" class="form-control" placeholder="Amount" type="text">
              </div>
            </div>
            <div class="col-sm-6" id="bank">
              <div class="form-group">
                <label for="">Bank Drawn On</label><input id="bank" name="bank" class="form-control" placeholder="Bank Drawn On" type="text">
              </div>
            </div>
          </div>
          
          <div class="form-group" id="cheque">
            <label for="">Cheque/Payorder # <span class="req" style="color:red;">*</span></label></label><input id="cheque" name="cheque" class="form-control" placeholder="Cheque/Payorder #" type="text">
          </div>
          <div class="control-group">
<label class="control-label">Note<span class="req">*</span> :</label>
<div class="controls">
<textarea class="auto span11 validate[required]" name="note" id="note" cols="150" rows="5"  placeholder=""></textarea>
</div>
</div>
          <div class="form-buttons-w">
            <button class="btn btn-primary" type="submit"> Submit</button>
          </div>
        </form>
      </div>
      <br>
      <h6 class="element-header">
        Account Details
      </h6>
      <div class="element-box">
                  <div class="table-responsive">
                    <button class="btn btn-danger" onclick="myFunction()">Add Debit Entry</button>
                    <button class="btn btn-success" onclick="myFunction2()">Transaction History</button>
                    <span class="badge badge-important pull-right" style="color:white;background-color: red;">Current Balance: 15000</span>
                    <br>
                    <br>
                    <table id="dataTable1" width="100%" class="table table-striped table-lightfont">
                      <thead>
                      <tr>
                        <th>ID</th>
                        <th>Payment Method</th>
                        <th>Date</th>
                        <th>Amount</th>
                        <th>Bank Drawn On</th>
                        <th>Instrument No</th>
                        <th>Created</th>
                        <th>Created By</th>
                        <th>Modified</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                    </tbody>
                    </table>
    </div>
  </div>
            
        </div>
      </div>
    </div>
<script type="text/javascript">
$(document).ready(function(){
  $("select").change(function(){
  var x = document.getElementById("paytype").value;
  var y = document.getElementById("bank");
  var a = document.getElementById("cheque");

  if(x == 1 || x == 5){
    y.style.display = "";
    a.style.display = "";

  if (y.style.display === "none" && a.style.display === "none") {
    y.style.display = "block";
    a.style.display = "block";
  } else {
    y.style.display = "none";
    a.style.display = "none";
  }
  
}
if(x == 2 || x == 3){
  y.style.display = "";
    a.style.display = "";

  if (a.style.display === "none") {
    a.style.display = "block";
  } else {
    a.style.display = "none";
  }
}

if(x == 4){
  y.style.display = "";
    a.style.display = "";

  if (y.style.display === "none") {
    y.style.display = "block";
  } else {
    y.style.display = "none";
  }
}

if(x == 0){
y.style.display = "";
    a.style.display = "";  
}

});
});
</script>

<script>
function myFunction() {
  alert("*INPUT A FORM HERE*");
}

function myFunction2() {
  alert("*INOUT A TABLE HERE*");
}
</script>

@endsection