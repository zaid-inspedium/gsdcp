<link href="https://fonts.googleapis.com/css2?family=Herr+Von+Muellerhoff&display=swap" rel="stylesheet">
<?php
// $path = 'admin/img/card-certificate.jpg';
// $type = pathinfo($path, PATHINFO_EXTENSION);
// $data = file_get_contents($path);
// $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
// $path2 = $_SERVER["DOCUMENT_ROOT"].'/admin/img/card-certificate.jpg';
?>

<style>
  .row-fluid{
   font-family: 'Open Sans', sans-serif;
   text-transform: uppercase;
  }
    .bg-pink{ color: #000000; }
    .page1 {
        background-image:url('{{asset('admin/img/card-certificate-old.jpg')}}');
        background-repeat: no-repeat;
        height: 11.69in;
        background-size: 70% 100%;
    }
    .white-box-1 {
        color: #000000;
        padding: 0.5em 13em;
    }
    .date-box{
        padding: 0 13em;
        color: #000000;
    }
    .signature{
      font-family: 'Herr Von Muellerhoff', cursive;
      font-size: 16px;
    }
  @page {
    size: A4;
    margin: 0;
  }
    @media print {
     * {
      -webkit-print-color-adjust: exact !important;
     }
      .page1 {
        background-size: 100% 100%;
      }
    }
</style>
<link href="{{asset('admin/css/bootstrap.css')}}" rel="stylesheet">
<link href="{{asset('admin/css/custom_styles.css')}}" rel="stylesheet">
<body class="no-background">
<div id="content" style="color: #000000;">
<div class="print-pedigree">
  <a href="{{ URL::to('/export_pdf/pdf',$dog_result->id) }}" class="btn btn-primary" style="float: right; margin-right: 500px;">Export PDF</a>
<div size="A4" class="page1">
<div class="row-fluid">
<div class="span2">
&nbsp;
</div>
<div class="white-box-1">
<div class="span6">
<h1 style="text-align: center;color: #fff;">{{$dog_result->event->title}}</h1>
</div>
</div>
<div class="date-box">
<?php if ($dog_result->event->start_date!=$dog_result->event->end_date) { ?>
  <div class="span7">
      <h2 style="text-align: center;">{{ date('F d &', strtotime($dog_result->event->start_date)).''.date(' d, Y', strtotime($dog_result->event->end_date)) }}</h2>
    </div>
<?php }
  else { ?>
    <div class="span7">
      <h2 style="text-align: center;">{{ date('F d, Y', strtotime($dog_result->event->start_date)) }}</h2>
    </div>
<?php }
?>
</div>

<div class="row-fluid">
<div class="span4">
    <h3 style="margin: 73px 0 0 -30px;">{{$dog_result->id}}</h3>
</div>
<div class="span6">
    <h3 style="margin: -10px 0 0 130px;">{{$dog_result->dog_show->dog_name}}</h3>
</div>
</div>
<div class="row-fluid">
<div class="span4">
    <h3 style="margin: -13px 0 0 210px;">{{$dog_result->dog_show->KP}}</h3>
</div>
<div class="span6">
    <h3 style="margin: -15px 0 0 130px;">{{$dog_result->dog_show->microchip}}</h3>
</div>
</div>
<div class="row-fluid">
<div class="span5">
    <h3 style="margin: -11px 0 0 320px;">{{ date('F d, Y', strtotime($dog_result->dog_show->dob)) }}</h3>
</div>
</div>
<div class="row-fluid">
<div class="span7">
    <h3 style="margin: 21px 0 0 240px;">{{$dog_result->dog_show->sire_parent->dog_name}}</h3>
</div>
</div>
<div class="row-fluid">
<?php if ($dog_result->dog_show->sire_parent->KP=='') { ?>
  <div class="span4">
    <h3 style="margin: 34px 0 0 240px;">{{$dog_result->dog_show->sire_parent->dog_reg_number->regestration_no}}</h3>
  </div>
<?php } else { ?>
    <div class="span4">
      <h3 style="margin: 34px 0 0 240px;">{{$dog_result->dog_show->sire_parent->KP}}</h3>
    </div>
<?php } ?>
<div class="span4">
    <h3 style="margin: 34px 0 0 130px;">{{$dog_result->dog_show->sire_parent->microchip}}</h3>
</div>
</div>
<div class="row-fluid">
<div class="span7">
    <h3 style="margin: 28px 0 0 240px;">{{$dog_result->dog_show->dam_parent->dog_name}}</h3>
</div>
</div>
<div class="row-fluid">
<?php if ($dog_result->dog_show->dam_parent->KP=='') { ?>
  <div class="span4">
    <h3 style="margin: 34px 0 0 240px;">{{$dog_result->dog_show->dam_parent->dog_reg_number->regestration_no}}</h3>
  </div>
<?php } else { ?>
    <div class="span4">
      <h3 style="margin: 34px 0 0 240px;">{{$dog_result->dog_show->dam_parent->KP}}</h3>
    </div>
<?php } ?>
<div class="span4">
    <h3 style="margin: 34px 0 0 130px;">{{$dog_result->dog_show->dam_parent->microchip}}</h3>
</div>
</div>
<div class="row-fluid">
<?php if ($dog_result->dog_show->breeder=='') { ?>
  <div class="span7">
    <h3 style="margin: 88px 0 0 270px;"></h3>
  </div>
<?php }
  else { ?>
    <div class="span7">
      <h3 style="margin: 48px 0 0 270px;">{{$dog_result->dog_show->breeder}}</h3>
    </div>
<?php }
?>

</div>
<div class="row-fluid">
<div class="span7">
    <h3 style="margin: 20px 0 0 270px;">{{$dog_result->dog_show->dog_owners[0]->owners->first_name.' '.$dog_result->dog_show->dog_owners[0]->owners->last_name}}</h3>
</div>
</div>
<div class="row-fluid">
<div class="span5">
    <h3 style="text-align: center; margin: 58px 0 0 -40px;">{{$dog_result->class}}</h3>
</div>
<div class="span7">
    &nbsp;
</div>
</div>
<div class="row-fluid">
<div class="span6">
    &nbsp;
</div>
</div>
<div class="row-fluid">
<div class="span4">
    <h3 style="text-align: center; margin: 78px 0 0 140px;">{{$dog_result->event->judge}}</h3>
</div>
<div class="span4 signature">
    <h1 style="text-align: center; margin: 88px 80px 0 0;">{{$dog_result->event->judge}}</h1>
</div>
</div>

<!-- <div class="row-fluid">
<div class="span2">Date of Birth:</div>
<div class="span4"><strong>{{$whelped = date('F d, Y', strtotime($dog_result->date))}}</strong></div>
<div class="span2">Microchip #:</div>
<div class="span4">
<img style="position: absolute;max-width: 200px !important;" src="http://gsdcp.org/db/assets/front/dogs_barcode/x_12504-nena-vom-blacky-wall.png" />
</div>
</div> -->

</div>
</div>
</div>
</div>

</body>
