@extends('layouts.master')

@section('content')


<script type="text/javascript" src="http://gsdcp.org/db/application/views/admin/dogs/asset/js_gal/jquery.jcarousel.min.js"></script>
<script type="text/javascript" src="http://gsdcp.org/db/application/views/admin/dogs/asset/js_gal/jquery.pikachoose.min.js"></script>
<script type="text/javascript" src="http://gsdcp.org/db/application/views/admin/dogs/asset/js_gal/jquery.touchwipe.min.js"></script>

<link href="http://gsdcp.org/db/assets/admin/css/bootstrap.css" rel="stylesheet" type="text/css" />
<link href="http://gsdcp.org/db/assets/admin/css/custom_styles.css" rel="stylesheet" type="text/css" />      
    
      <script language="javascript">
    $(document).ready(
        function (){
            $("#pikame").PikaChoose({carousel:true,carouselOptions:{wrap:'circular'}});
        });
</script>

<div id="content">

<div class="wrapper">

<div class="page-header">
<h5 class="widget-name">
<i class="icon">
<img width="22" src="http://gsdcp.org/db/assets/admin/img/icons/22_German_Shepherd-icon.png" alt="" />
</i>
Dogs Pedigree
</h5>
</div>

<ul class="toolbar x-print"><li><a action="print" href="javascript: void(0);" title=""><i class="icon-print"></i><span>Print</span></a></li><li><a action="back" href="javascript: window.history.back();" title=""><i class="icon-backward"></i><span>Back</span></a></li></ul>
<div class="container" style="padding:10px;">
<div class="row-fluid">
<div class="span12">
<h1 class="main-heading"><span class="dog-prefix"></span>
Sabria vom Marble <img src="http://gsdcp.org/db/application/views/admin/dogs/asset/female.png" alt="Female">
</h1>
</div>
</div>
<div class="row-fluid">
<div class="span6">
<div class="pikachoose">
<img src="http://gsdcp.org/db/assets/front/uploads/600x350_dog_na.png" alt="" />
</div>
</div>
<div class="span6" id="detail">
<div class="dna-not-available"></div>
<div class="row-fluid">
<div class="col-sm-12">
<strong>Reg Number:</strong> KP 80465 <br />
<strong>Whelped:</strong> January 15, 2020 <br />
<strong>DNA Status:</strong> Not Available <br />
<strong>Microchip / Tattoo No:</strong> 985141000913933 <br />
<strong>HD / ED:</strong> - / -<br />
</div>
</div>
<strong>Owner(s): </strong> <a href="http://gsdcp.org/db/members/profile/46">Nadeem Ahmed</a><br />
</div>
</div>
<br />
<div class="row-fluid">
</div>
<div class="row-fluid">
<div class="span12">
<link rel="stylesheet" href="http://gsdcp.org/db/application/views/admin/dogs/asset/padigree.css" />
<style>


        #extended_pedigree_container .pedigree_gen4 .animalBox:nth-child(9) {
            margin-top: 20px;
        }

        #extended_pedigree_container .pedigree_gen4 .animalBox:nth-child(13) {
            margin-top: 20px;
        }

        #extended_pedigree_container .generation.pedigree_gen4 .animalBox:after{
            width: 0; content: '';
        }
        #extended_pedigree_container{ width: 1465px; }    </style>

















@endsection
