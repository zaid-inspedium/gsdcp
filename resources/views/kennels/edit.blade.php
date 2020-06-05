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
        Kennels - Update
      </h6>
      <div class="element-box">
        <form>
          <span class="badge badge-important pull-right" style="color:white;background-color: red;">Kennels Registration Fee: 0</span>
          <br>
          <legend><span>Kennel Details</span></legend>
          <div class="form-group">
            <label for="">Owner <span class="req" style="color:red;">*</span></label><select class="form-control" id="owner"
            name="owner">
              <option>
                Select State
              </option>
              <option value="">
                
              </option>
              <option value="">
                
              </option>
            </select>
          </div>
          <div class="form-group">
            <label for="">Kennel Name <span class="req" style="color:red;">*</span></label><input id="kennel" name="kennel" class="form-control" placeholder="Kennel" type="text">
          </div>
          <div class="row">
            <div class="col-sm-6">
              <div class="form-group">
                <label for="">Prefix</label><input id="prefix" name="prefix" class="form-control" placeholder="Prefix" type="text">
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label for="">Suffix</label><input id="suffix" name="suffix" class="form-control" placeholder="Suffix" type="text">
              </div>
            </div>
          </div>
          <br>
          <div class="form-group">
                <label><strong>Old Record:</strong> &nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp;<input class="form-check-input" name="old_record" type="radio" value=""></label>
          </div>
          <br>
          <div class="form-group">
            <label for="">Contact Name <span class="req" style="color:red;">*</span></label></label><input id="contact_name" name="contact_name" class="form-control" placeholder="Contact Name" type="text">
          </div>
          <div class="form-group">
            <label for="img">Logo</label>
            <input class="form-control" type="file" id="img" name="img" accept="image/png, image/jpeg, image/jpg">
          </div>
          <div class="row">
            <div class="col-sm-6">
              <div class="form-group">
                <label for="">CNIC <span class="req" style="color:red;">*</span></label><input id="cnic" name="cnic" class="form-control" placeholder="CNIC" type="text">
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label for="">Email <span class="req" style="color:red;">*</span></label><input id="email" name="email" class="form-control" placeholder="Email" type="text">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-6">
              <div class="form-group">
                <label for="">Phone</label><input id="Phone" name="Phone" class="form-control" placeholder="Phone" type="text">
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label for="">Address <span class="req" style="color:red;">*</span></label><input id="address" name="address" class="form-control" placeholder="Address" type="text">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-6">
              <div class="form-group">
                <label for="">City <span class="req" style="color:red;">*</span></label><input id="city" name="city" class="form-control" placeholder="City" type="text">
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label for="">Country <span class="req" style="color:red;">*</span></label><input id="country" name="country" class="form-control" placeholder="Country" type="text">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-6">
              <div class="form-group">
                <label for="">Zip Code</label><input id="zip_code" name="zip_code" class="form-control" placeholder="Zip Code" type="text">
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label for="">Website</label><input id="website" name="website" class="form-control" placeholder="Website" type="text">
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="">Description</label></label><textarea id="description" name="description" class="form-control" placeholder="Description" type="text" cols="150" rows="5"></textarea>
          </div>
          <fieldset class="form-group">
            <legend><span>Login Detail</span></legend>
                <div class="form-group">
                  <label for="">Username <span class="req" style="color:red;">*</span></label><input class="form-control" name="username" id="username" placeholder="" type="text">
                </div>
                <div class="form-group">
                  <label for="">Password <span class="req" style="color:red;">*</span></label><input class="form-control" name="password" id="password" placeholder="" type="password">
                  <span class="help-block color-red" style="text-decoration: underline;text-decoration-color: red;color:red;"><strong><em>Note: If you would like to change the password type a new one. Otherwise leave this blank.</em></strong></span>
                </div>
          </fieldset>
          <div class="form-buttons-w">
            <button class="btn btn-primary" type="submit"> Submit</button>
          </div>
        </form>
      </div>
    </div>
  </div>
            
        </div>
      </div>
    </div>

    <script type="text/javascript">
      $(document).ready(function(){
        $("select").change(function(){
        var x = document.getElementById("owner").value;
        var y = document.getElementById("Contact_name");
        var a = document.getElementById("Img");
        var b = document.getElementById("Cnic");
        var c = document.getElementById("Email");
        var d = document.getElementById("Phone");
        var e = document.getElementById("add");
        var f = document.getElementById("cityy");
        var z = document.getElementById("count");
        var h = document.getElementById("zipp");
        var u = document.getElementById("login_details");
        if(x == 1 || x == 2){
          y.style.display = "";
          a.style.display = "";
          b.style.display = "";
          c.style.display = "";
          d.style.display = "";
          e.style.display = "";
          f.style.display = "";
          z.style.display = "";
          h.style.display = "";
          u.style.display = "";
        if (y.style.display === "none" && a.style.display === "none" && b.style.display === "none" && c.style.display === "none" && d.style.display === "none" && e.style.display === "none" && f.style.display === "none" && z.style.display === "none" && h.style.display === "none" && u.style.display === "none") {
          y.style.display = "block";
          a.style.display = "block";
          b.style.display = "block";
          c.style.display = "block";
          d.style.display = "block";
          e.style.display = "block";
          f.style.display = "block";
          z.style.display = "block";
          h.style.display = "block";
          u.style.display = "block";
        } else {
          y.style.display = "none";
          a.style.display = "none";
          b.style.display = "none";
          c.style.display = "none";
          d.style.display = "none";
          e.style.display = "none";
          f.style.display = "none";
          z.style.display = "none";
          h.style.display = "none";
          u.style.display = "none";
        }
      }
      if(x == 0){
        y.style.display = "";
          a.style.display = "";
          b.style.display = "";
          c.style.display = "";
          d.style.display = "";
          e.style.display = "";
          f.style.display = "";
          z.style.display = "";
          h.style.display = "";
          u.style.display = "";
          //console.log(x);
      }
      });
      });
      </script>      
@endsection