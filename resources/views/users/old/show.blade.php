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
            <div class="content-box"><div class="row">
  <div class="col-sm-5">
    <div class="user-profile compact">
      <div class="up-head-w" style="background-image:url(img/profile_bg1.jpg)">
        <div class="up-social">
          <a href="#"><i class="os-icon os-icon-twitter"></i></a><a href="#"><i class="os-icon os-icon-facebook"></i></a>
        </div>
        <div class="up-main-info">
          <h2 class="up-header">
            Ahmed Naseem Khan
          </h2>
          <h6 class="up-sub-header">
            Member
          </h6>
        </div>
        <svg class="decor" width="842px" height="219px" viewBox="0 0 842 219" preserveAspectRatio="xMaxYMax meet" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g transform="translate(-381.000000, -362.000000)" fill="#FFFFFF"><path class="decor-path" d="M1223,362 L1223,581 L381,581 C868.912802,575.666667 1149.57947,502.666667 1223,362 Z"></path></g></svg>
      </div>
      <div class="up-controls">
        <div class="row">
          <div class="col-sm-4">
            <div class="value-pair">
              <div class="label">
                Status:
              </div>
              <div class="value badge">
                <select id="status" name="status">
                  <option value="1">Active</option>
                  <option value="3">Inactive</option>
                  <option value="4">Pending</option>
                  <option value="2">Banned</option>
                </select>
              </div>
            </div>
          </div>
          <div class="col-sm-4">
            <div class="value-pair">
              <div class="label">
                Membership No:
              </div>
              <div class="value badge">
                T-1571
              </div>
            </div>
          </div>
          <div class="col-sm-4">
            <div class="value-pair">
              <div class="label">
                User ID:
              </div>
              <div class="value badge">
                1127
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="up-contents">
        <div class="m-b">
          <div class="row m-b">
            <div class="col-sm-6 b-r b-b">
              <div class="el-tablo centered padded-v">
                <div class="value">
                  Rs.15,000
                </div>
                <div class="label">
                  Credit Amount
                </div>
              </div>
            </div>
            <div class="col-sm-6 b-b">
              <div class="el-tablo centered padded-v">
                <div class="value">
                  0
                </div>
                <div class="label">
                  Old Record(s)
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="element-wrapper">
      <div class="element-box">
        <h6 class="element-header">
          User Activity
        </h6>
        <div class="timed-activities compact">
          <div class="timed-activity">
            <div class="ta-date">
              <span>21st Jan, 2017</span>
            </div>
            <div class="ta-record-w">
              <div class="ta-record">
                <div class="ta-timestamp">
                  <strong>11:55</strong> am
                </div>
                <div class="ta-activity">
                  Created a post called <a href="#">Register new symbol</a> in Rogue
                </div>
              </div>
              <div class="ta-record">
                <div class="ta-timestamp">
                  <strong>2:34</strong> pm
                </div>
                <div class="ta-activity">
                  Commented on story <a href="#">How to be a leader</a> in <a href="#">Financial</a> category
                </div>
              </div>
              <div class="ta-record">
                <div class="ta-timestamp">
                  <strong>7:12</strong> pm
                </div>
                <div class="ta-activity">
                  Added <a href="#">John Silver</a> as a friend
                </div>
              </div>
            </div>
          </div>
          <div class="timed-activity">
            <div class="ta-date">
              <span>3rd Feb, 2017</span>
            </div>
            <div class="ta-record-w">
              <div class="ta-record">
                <div class="ta-timestamp">
                  <strong>9:32</strong> pm
                </div>
                <div class="ta-activity">
                  Added <a href="#">John Silver</a> as a friend
                </div>
              </div>
              <div class="ta-record">
                <div class="ta-timestamp">
                  <strong>5:14</strong> pm
                </div>
                <div class="ta-activity">
                  Commented on story <a href="#">How to be a leader</a> in <a href="#">Financial</a> category
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-sm-7">
    <div class="element-wrapper">
      <div class="element-box">
        <h6 class="element-header">
          User Details
        </h6>
        <form id="formValidate">
          <div class="element-info">
            <div class="element-info-with-icon">
              <div class="element-info-icon">
            </div>
          </div>
          <div class="form-group">
            <label for=""> Email address:</label> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; kharalshikoh@hotmail.com
          </div>
              <div class="form-group">
                <label for="">Phone Number:</label> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;+92-300-226-7689
              </div>
              <div class="form-group">
                <label for="">Address:</label> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;A-5, Sea Breeze Centre, Boat Basin, Block-5, Clifton
              </div>
          <div class="form-group">
            <label for="">City:</label> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Karachi 
          </div>
          <div class="form-group">
            <label for="">Country:</label> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Pakistan
          </div>
          <div class="form-group">
            <label for="">CNIC:</label> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;42301-2011571-1
          </div>
          <div class="form-group">
            <label for="">Username:</label> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;naseemkhan
          </div>
          <div class="form-group">
            <label for="">Account Created By:</label> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Secretary (zahid@gsdcp.org)
          </div>
          <div class="form-group">
            <label for="">Zip Code:</label> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 12315
          </div>
          <div class="form-group">
            <label for="">NewsLetter</label> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; No
          </div>
          <div class="form-group">
            <label for="">Creation Date</label> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 2020-03-18 09:56:14
          </div>
          <div class="form-group">
            <label for="">Account Last Modified</label> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  2020-03-18 09:56:14
          </div>
          <div class="form-buttons-w">
            <button class="btn btn-primary" type="submit"> Submit</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>



@endsection
