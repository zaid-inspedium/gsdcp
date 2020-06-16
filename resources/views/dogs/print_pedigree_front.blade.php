

<style>

    .bg-pink{ color: #000000; }
    .bg-white{ background: white !important; }
    .well-ped{ border-top: none !important; border-left:none !important; border-right:none !important; border-bottom: 5px solid white !important; }

    .bg-pink table,.bg-pink td{
        background: none;
        /*border: 1px solid red;*/
        border: none;
    }
    .bg-pink .table tbody > tr:hover > td{ background: none; }

    .b-border span > span{ }

    @media print {
        #content{
        /*todo:: A3 Paper Size*/
        width: 16.54in;
        height: 11.69in;

                }
      }
    .page1{
        /*background: url("http://localhost/gsdcp/pedigree-outside-72.jpg") no-repeat;*/
        background: url("{{asset('assets/admin/img/pedigree-outside.jpg')}}") no-repeat;
        height: 11.69in;
        background-size: 100% 100%;
            }
    .white-box-1{
        /*margin: 186px 50px 0 40px;*/
        margin: 182px 50px 0 40px;
        font-size: 13px;
        line-height: 24px;
        color: #000000;
    }
    .linebreeding-box{
        margin: 0 0 0 40px;
        position: absolute;
        top: 445px;
        width: 48%;
    }
    .qr-img{
        /*bottom: 148px;*/
        bottom: 156px;
        float: right;
        height: 123px;
        line-height: 123px;
        position: relative;
        right: 70px; /*was 92*/
        text-align: center;
        width: 137px;
        z-index: 54545;
    }
    .dublicate-row{
        visibility: hidden;
        color: black;
        font-weight: bold;
        position: absolute;
        top: 677px;
        left: 888px;
        z-index: 54545;
    }
    .kp-row{
        color: black;
        font-weight: bold;
        position: absolute;
        top: 877px;
        /*top: 868px;*/
        left: 992px; /*old 972*/
        z-index: 54545;
        font-size: 11px;
    }
    .date-row{
        color: black;
        float: right;
        font-weight: bold;
        position: absolute;
        top: 928px;
        /*top: 917px;*/
        /*left: 920px;*/
        left: 935px;
        z-index: 54545;
        font-size: 11px;
    }
    .page2{
        /*background: url("http://localhost/gsdcp/pedigree-inside-72.jpg") no-repeat;*/
        background: url("{{asset('assets/admin/img/pedigree-inside.jpg')}}") no-repeat;
        display: none;        background-size: 100% 100%;
        height: 11.69in;
    }
    .pedigree-table tr > td{
        line-height: 13px;
        vertical-align: top;
        font-size: 10px;

    }

    .pedigree-table{
        width: 1105px;
        height: 1024px;
        margin: 43px 22px;
        font-size: 10px;
    }
    .table tr > th, .table tr > td {
        padding: 4px 6px 0 6px;
    }

    .dna-row-4{
        position: relative;
        top: -19px;
        left: 120px;
    }

    .pedigree-table .col-1{ width: 295px; position: relative; padding-top: 8px;}
    .pedigree-table .col-2{ width: 315px; position: relative; padding-top: 8px;}
    .pedigree-table .col-3{ width: 115px; padding-top: 8px;}
    .pedigree-table .col-3 .cell{ height: 88px !important; }

    .pedigree-table .col-4{ width: 130px; }
    .pedigree-table .col-4 .cell{ padding-top: 5px; height: 55px !important; }

    .linebreeding-row{
        margin: 25px 0 0 60px;
        font-size: 11px;
        line-height: 12px;
        width: 275px;
    }

    .linebreeding-row a {
        color: #000000;
    }

    .sibling-row {
        margin: 25px 0 0 60px;
        font-size: 11px;
        line-height: 12px;
        position: absolute;
        top: 0;
        left: 348px;
        width: 275px;
        word-wrap: break-word;
    }

    .sibling-row a {
        color: #000000;

    }

    .born-row {
        margin: 0px 80px;
        font-size: 11px;
        position: absolute;
        top: 125px;
        /*top: 120px;*/
        left: 12px;
    }

    strong {
        color: #000000;
    }

    div.p {
        margin-top: -10px;
        margin-left: 20px;
    }
</style>
<link href="http://gsdcp.org/db/assets/admin/css/bootstrap.css" rel="stylesheet" type="text/css" />
<link href="http://gsdcp.org/db/assets/admin/css/custom_styles.css" rel="stylesheet" type="text/css" />
<!-- <link href="{{asset('assets/admin/css/bootstrap.css')}}" rel="stylesheet"> -->
<!-- <link href="{{asset('assets/admin/css/custom_styles.css')}}" rel="stylesheet"> -->

<body class="no-background">
<div id="content">
<div class="print-pedigree ">
<div class="page1">
<div class="row-fluid">
<div class="span6">
&nbsp;
</div>
<div class="span6">
<div class="white-box-1">
<div class="row-fluid">
<div class="span12"><h2 style="text-transform: uppercase; color: #000000;">Pink Pedigree</h2></div>
</div>
<div class="row-fluid">
<div class="span4">for the German Shepherd Dog:</div>
<div class="span8"><strong>{{$dog->dog_name}}</strong></div>
</div>
<div class="row-fluid">
<div class="span2">Sex:</div>
<div class="span4"><strong>{{$dog->sex}}</strong></div>
<div class="span2">Hair:</div>
<div class="span4"><strong>{{$dog->hair}}</strong></div>
</div>
<div class="row-fluid">
<div class="span2">Date of Birth:</div>
<div class="span4"><strong>{{$whelped = date('F d, Y', strtotime($dog->dob))}}</strong></div>
<div class="span2">Microchip #:</div>
<div class="span4">
<img style="position: absolute;max-width: 200px !important;" src="http://gsdcp.org/db/assets/front/dogs_barcode/x_12504-nena-vom-blacky-wall.png" />
</div>
</div>
<div class="row-fluid">
<div class="span2">Colour:</div>
<div class="span6"><strong>Black - Brown</strong>&nbsp;</div>
<div class="span4">
</div>
</div>
<div class="" style="height: 10px;"></div>
<div class="row-fluid">
<div class="span2">Breeder:</div>

<div class="span10"><strong>Ashhal Khan & Ali Aqeel</strong></div>
</div>
<div class="row-fluid">
<div class="span2">Address:</div>

<div class="span10"><strong>92-D, Bilal Colony, Jahal Road, Sahiwal, Pakistan</strong></div>
</div>
</div>
<div class="linebreeding-box">
<div class="" style="height: 122px;">
<div class="linebreeding-row">
</div>
<div class="sibling-row">
</div>
</div>
<div class="born-row"><strong>0,1</strong></div>
</div>
</div>
</div>
<div class="dublicate-row">Duplicate</div>
<div class="kp-row"> KP {{$dog->KP}} </div>
<div class="date-row">16th of June 2020</div>
</div>
<div class="qr-img">
<img src="http://gsdcp.org/db/assets/front/dogs_qr/12504-nena-vom-blacky-wall.png" />
</div>
</div>

</div>
</div>
</body>
<script>
    if('Pink' == 'White'){
        alert('This is "White" pedigree!');
    }
</script>