
<style>
  .row-fluid{
    font-family: 'Open Sans', sans-serif; 
    text-transform: uppercase;
  }
    .page1 {
        background-image:url('../../public/admin/img/a42.jpg');
        background-position: top center;
        background-repeat: no-repeat;
        background-size: 100% 1000px;
        width: 794px;
        height: 1110px;
        margin-top: -45px;
        margin-left: -46px;
        margin-bottom: -55px;
        page-break-inside: avoid;
    }
    .white-box-1 {
      font-size: 14px;
      color: #000000;
    }
    .date-box{ 
      font-size: 12px;
      color: #000000;
      padding-top: -20px;
    }
    .signature{
      font-family: 'Herr Von Muellerhoff', cursive;
      font-size: 12px;
    }

</style>

<body class="no-background">
<div id="content" style="color: #000000;">
<div class="print-pedigree">
<div class="page1">
<div class="row-fluid">
<div class="span2">
&nbsp;
</div>
<div class="white-box-1">
<div class="span6">
<h2 style="text-align: center;color: #fff;">{{$dog_result->event->title}}</h2>
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
    <h3 style="margin: 7px 0 0 630px;">{{$dog_result->id}}</h3>
</div>
<div class="span6">
    <h3 style="margin: -5px 0 0 130px;">{{$dog_result->dog_show->dog_name}}</h3>
</div>
</div>
<div class="row-fluid">
<div class="span4">
    <h3 style="margin: 17px 0 0 180px;">{{$dog_result->dog_show->KP}}</h3>
</div>
<div class="span6">
    <h3 style="margin: -23px 0 0 480px;">{{$dog_result->dog_show->microchip}}</h3>
</div>
</div>
<div class="row-fluid">
<div class="span4">
    <h3 style="margin: 5px 0 0 250px;">{{ date('F d, Y', strtotime($dog_result->date)) }}</h3>
</div>
</div>
<div class="row-fluid">
<div class="span7">
    <h3 style="margin: 38px 0 0 180px;">{{$dog_result->dog_show->sire_parent->dog_name}}</h3>
</div>
</div>
<div class="row-fluid">
<?php if ($dog_result->dog_show->sire_parent->KP=='') { ?>
  <div class="span4">
    <h3 style="margin: 50px 0 0 170px;">{{$dog_result->dog_show->sire_parent->dog_reg_number->regestration_no}}</h3>
  </div>
<?php } else { ?>
    <div class="span4">
      <h3 style="margin: 50px 0 0 180px;">{{$dog_result->dog_show->sire_parent->KP}}</h3>
    </div>
<?php } ?>
<?php if ($dog_result->dog_show->sire_parent->microchip=='') { ?>
  <div class="span4">
    <h3 style="margin: 34px 0 0 240px;">&nbsp;</h3>
  </div>
<?php } else { ?>
    <div class="span4">
      <h3 style="margin: -23px 0 0 480px;">{{$dog_result->dog_show->sire_parent->microchip}}</h3>
    </div>
<?php } ?>
</div>
<div class="row-fluid">
<div class="span7">
    <h3 style="margin: 47px 0 0 180px;">{{$dog_result->dog_show->dam_parent->dog_name}}</h3>
</div>
</div>
<div class="row-fluid">
<?php if ($dog_result->dog_show->dam_parent->KP=='') { ?>
  <div class="span4">
    <h3 style="margin: 50px 0 0 170px;">{{$dog_result->dog_show->dam_parent->dog_reg_number->regestration_no}}</h3>
  </div>
<?php } else { ?>
    <div class="span4">
      <h3 style="margin: 50px 0 0 180px;">{{$dog_result->dog_show->dam_parent->KP}}</h3>
    </div>
<?php } ?>
<div class="span4">
    <h3 style="margin: -21px 0 0 480px;">{{$dog_result->dog_show->dam_parent->microchip}}</h3>
</div>
</div>
<div class="row-fluid">
<div class="span7">
    <h3 style="margin: 62px 0 0 220px;">{{$dog_result->dog_show->breeder}}</h3>
</div>
</div>
<div class="row-fluid">
<div class="span7">
    <h3 style="margin: 37px 0 0 220px;">{{$dog_result->dog_show->dog_owners[0]->owners->first_name.' '.$dog_result->dog_show->dog_owners[0]->owners->last_name}}</h3>
</div>
</div>
<div class="row-fluid">
<div class="span5">
    <h3 style="text-align: center; margin: 78px 320px 0 0;">{{$dog_result->class}}</h3>
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
<div class="span6">
    <h3 style="text-align: center; margin: 78px 300px 0 0;">{{$dog_result->event->judge}}</h3>
</div>
<div class="span4 signature">
    <h1 style="text-align: center; margin: -25px 0 0 310px;">{{$dog_result->event->judge}}</h1>
</div>
</div>  

</div>
</div>
</div>
</div>

</body>
