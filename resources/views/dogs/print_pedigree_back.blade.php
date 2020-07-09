<style>

    .bg-pink{ color: #000000; }
    .bg-white{ background: white !important; }
    .well-ped{ border-top: none !important; border-left:none !important; border-right:none !important; border-bottom: 5px solid white !important; }

    .bg-pink table,.bg-pink td{
        background: none !important;
        border: none !important;
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
        background: url("{{asset('admin/img/pedigree-inside.jpg')}}") no-repeat;
        background-size: 100% 100%;
        height: 11.69in;
        width: 100%
    }
    .pedigree-table tr > td{
        line-height: 13px;
        vertical-align: top;
        font-size: 10px;

    }

    .pedigree-table{
        /*width: 1105px;
        height: 1024px;
        margin: 43px 22px;
        font-size: 10px;*/
    width: 1243px !important;
    height: 1024px;
    margin: 43px 22px!important;
    font-size: 10px !important;
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

<link href="{{asset('assets/admin/css/bootstrap.css')}}" rel="stylesheet">
<link href="{{asset('assets/admin/css/custom_styles.css')}}" rel="stylesheet">

<body class="no-background">
<div id="content">
<div class="print-pedigree">
<div class="qr-img">
<img src="http://gsdcp.org/db/assets/front/dogs_qr/12504-nena-vom-blacky-wall.png" />
</div>
</div>
<div class="page2">
<div class="row-fluid">
<div class="span9 bg-pink">
<table class="table table-bordered pedigree-table" cellpadding="0" cellspacing="0">
<tbody>
<tr>
<td class="sire col-1" rowspan="8">
<div style="margin-left: 40px;">
<div class="cell">
<table width="100%" cellpadding="0" cellspacing="0">
<tr>
<td colspan="3"><strong>Vulcan Sremski</strong></td>
<td width="25.333333%">KP 32078</td>
</tr>
<tr>
<td colspan="3"> <br />
* 2018-2019 </td>
<td colspan="2"><br />ZB: V<br /></td>
</tr>
<tr>
<td colspan="3" width="50%">
HD Fast Normal<br /> ED Normal </td>
<td colspan="2" width="50%">
DNA </td>
</tr>
<tr>
<td colspan="2"><br />Colour : </td>
<td colspan="2"><br />Black - Tan</td>
</tr>
<tr>
<td colspan="4">
<br />
KB: <div class="p" style="margin-top: -13px;">Above medium size, medium build, strong head, expressive, high whither, nick behind, stretched, normal length and lay of croup. Straight front, very good breast proportions, moves straight while coming, goes close behind. Gaits with very good front reach with strong hind thrust.</div></td>
</tr>
</table>
<div style="position: absolute; bottom: 30px;">
Siblings: </div>
</div>
</div>
</td>
<td class="sire col-2" rowspan="4">
<div class="cell">
<table width="100%" cellpadding="0" cellspacing="0">
<tr>
<td colspan="3"><strong>Groovy di Casa Massarelli</strong></td>
<td width="25.333333%">LOI-12-88535</td>
</tr>
<tr>
<td colspan="3"> <br />
</td>
<td colspan="2"><br />ZB: VA(I)<br /></td>
</tr>
<tr>
<td colspan="3" width="50%">
HD Almost Normal<br /> ED Normal </td>
<td colspan="2" width="50%">
</td>
</tr>
<tr>
<td colspan="4">Black - Brown</td>
</tr>
<tr>
<td colspan="4">
<br />
KB: <div class="p" style="margin-top: -13px;"></div></td>
</tr>
</table>
<div style="position: absolute; bottom: 30px;">
Siblings: Garrison/Gini/Gloria </div>
</div>
</td>
<td class="sire col-3" rowspan="2">
<div class="cell">
<div class="row-fluid">
<div class="span12">
<strong>* Vegas du Haut Mansard</strong>
</div>
</div>
<div class="row-fluid">
<div class="span12">LOF-569091 </div>
</div>
<div class="row-fluid">
<div class="span12">SchH3 </div>
</div>
<span class="dna-row-3">
DNA gpr </span>

</div>
</td>
<td class="sire col-4" rowspan="1">
<div class="cell">
<div class="row-fluid">
<div class="span12">
<strong>* Pakros d'Ulmental</strong>
</div>
</div>
<div class="row-fluid">
<div class="span12">LOI-02-98355 </div>
</div>
<div class="row-fluid">
<div class="span12">SchH3 </div>
</div>
<span class="dna-row-4">
DNA gpr </span>

</div>
</td>
</tr>
<tr>
<td class="dam col-4" rowspan="1">
<div class="cell">
<div class="row-fluid">
<div class="span12">
<strong>* Rangoon du Haut Mansard</strong>
</div>
</div>
<div class="row-fluid">
<div class="span12">LOF-527930 </div>
</div>
<div class="row-fluid">
<div class="span12">Brevet </div>
</div>
<span class="dna-row-4">
DNA gpr </span>

</div>
</td>
</tr>
<tr>
<td class="dam col-3" rowspan="2">
<div class="cell">
<div class="row-fluid">
<div class="span12">
<strong>Kalia di Casa Massarelli</strong>
</div>
</div>
<div class="row-fluid">
<div class="span12">LOI-10-55472 </div>
</div>
<div class="row-fluid">
<div class="span12"> </div>
</div>
<span class="dna-row-3">
DNA gpr </span>

</div>
</td>
<td class="sire col-4" rowspan="1">
<div class="cell">
<div class="row-fluid">
<div class="span12">
<strong>* Furbo degli Achei</strong>
</div>
</div>
<div class="row-fluid">
 <div class="span12">LOI-07-51437 </div>
</div>
<div class="row-fluid">
<div class="span12">SchH3 IPO2 </div>
</div>
<span class="dna-row-4">
DNA gpr </span>

</div>
</td>
</tr>
<tr>
<td class="dam col-4" rowspan="1">
<div class="cell">
<div class="row-fluid">
<div class="span12">
<strong>* Wicky vom Kuckucksland</strong>
</div>
</div>
<div class="row-fluid">
<div class="span12">SZ-2182763 </div>
</div>
<div class="row-fluid">
<div class="span12">&nbsp;</div>
</div>
<span class="dna-row-4">
DNA gpr </span>

</div>
</td>
</tr>
<tr>
<td class="dam col-2" rowspan="4">
<div class="cell">
<table width="100%" cellpadding="0" cellspacing="0">
<tr>
<td colspan="3"><strong>Roma Sremska</strong></td>
<td width="25.333333%">JR 740317</td>
</tr>
<tr>
<td colspan="3">IPO-1 <br />
* Life </td>
<td colspan="2"><br />ZB: V<br /></td>
</tr>
<tr>
<td colspan="3" width="50%">
HD Normal<br /> ED Normal </td>
<td colspan="2" width="50%">
DNA gpr </td>
</tr>
<tr>
<td colspan="4"></td>
</tr>
<tr>
<td colspan="4">
<br />
KB: <div class="p" style="margin-top: -13px;"></div></td>
</tr>
</table>
<div style="position: absolute; bottom: 30px;">
Siblings: </div>
</div>
</td>
<td class="sire col-3" rowspan="2">
<div class="cell">
<div class="row-fluid">
<div class="span12">
<strong>Oxford vom Radhaus</strong>
</div>
</div>
<div class="row-fluid">
<div class="span12">JR-734144 </div>
</div>
<div class="row-fluid">
<div class="span12"> </div>
</div>
<span class="dna-row-3">
DNA gpr </span>

</div>
</td>
<td class="sire col-4" rowspan="1">
<div class="cell">
<div class="row-fluid">
<div class="span12">
<strong>* Remo vom Fichtenschlag</strong>
</div>
</div>
<div class="row-fluid">
<div class="span12">SZ-2208401 </div>
</div>
<div class="row-fluid">
<div class="span12">SchH3 </div>
</div>
<span class="dna-row-4">
DNA gpr </span>

</div>
</td>
</tr>
<tr>
<td class="dam col-4" rowspan="1">
<div class="cell">
<div class="row-fluid">
<div class="span12">
<strong>* Oprah von Aurelius</strong>
</div>
</div>
<div class="row-fluid">
<div class="span12">SZ-2211180 </div>
</div>
<div class="row-fluid">
<div class="span12"> </div>
</div>
<span class="dna-row-4">
DNA gpr </span>

</div>
</td>
</tr>
<tr>
<td class="dam col-3" rowspan="2">
<div class="cell">
<div class="row-fluid">
<div class="span12">
<strong>* Superstar od Sremske</strong>
</div>
</div>
<div class="row-fluid">
<div class="span12">JR-807906 </div>
</div>
<div class="row-fluid">
<div class="span12"> </div>
</div>
<span class="dna-row-3">
DNA </span>

</div>
</td>
<td class="sire col-4" rowspan="1">
<div class="cell">
<div class="row-fluid">
<div class="span12">
<strong>Amigo von Panoniansee</strong>
</div>
</div>
<div class="row-fluid">
<div class="span12">HR-24193 </div>
</div>
<div class="row-fluid">
<div class="span12">&nbsp;</div>
</div>
<span class="dna-row-4">
DNA gpr </span>

</div>
</td>
</tr>
<tr>
<td class="dam col-4" rowspan="1">
<div class="cell">
<div class="row-fluid">
<div class="span12">
<strong>Quviska od Beronje</strong>
</div>
</div>
<div class="row-fluid">
<div class="span12">JR-724481 </div>
</div>
<div class="row-fluid">
<div class="span12">IPO1 </div>
</div>
<span class="dna-row-4">
</span>

</div>
</td>
</tr>
<tr>
<td class="dam col-1" rowspan="8">
<div style="margin-left: 40px;">
<div class="cell">
<table width="100%" cellpadding="0" cellspacing="0">
<tr>
<td colspan="3"><strong>Daniel vom Harris Burg</strong></td>
<td width="25.333333%">KP 23281</td>
</tr>
<tr>
<td colspan="3"> <br />
* Life </td>
<td colspan="2"><br />ZB: SG<br /></td>
</tr>
<tr>
<td colspan="3" width="50%">
HD Normal<br /> ED Normal </td>
<td colspan="2" width="50%">
DNA </td>
</tr>
<tr>
<td colspan="2"><br />Colour : </td>
<td colspan="2"><br />Black - Gold</td>
</tr>
<tr>
<td colspan="4">
<br />
KB: <div class="p" style="margin-top: -13px;">Medium strong female of absolute medium size, with good head and expression. Light eyes. High wither, sufficiently firm back, the slightly falling croup could be a little longer. Well developed forechest, good front angulation, where the upper arm could be a little longer, good underline, very good hind angulation. Straight coming and going. Shows sufficiently strong side movement with good hind thrust. Firm hocks. Correct bite. Good steady nerves. WA 2016 3 and a half year old female, shown carrying a lot of weight but in very good overall condition. Shows clean, strong teeth and clear eyes. The female moves well, showing good overall firmness. Moves well in walk and trot. Surveyed for life.</div></td>
</tr>
</table>
<div style="position: absolute; bottom: 30px;">
Siblings: Dwight/Dilene/Dalilah </div>
</div>
</div>
</td>
<td class="sire col-2" rowspan="4">
<div class="cell">
<table width="100%" cellpadding="0" cellspacing="0">
<tr>
<td colspan="3"><strong>Natzo von Bad-Boll</strong></td>
<td width="25.333333%">KP 8668</td>
</tr>
<tr>
<td colspan="3"> <br />
* 2011-2012 </td>
<td colspan="2"><br />ZB: VA (PK)<br /></td>
</tr>
<tr>
<td colspan="3" width="50%">
HD Almost Normal<br /> </td>
<td colspan="2" width="50%">
DNA gpr </td>
</tr>
<tr>
 <td colspan="4">Black - Brown</td>
</tr>
<tr>
<td colspan="4">
<br />
KB: <div class="p" style="margin-top: -13px;">Big, substantial male with very good head, expressive, very good top-line, slightly short croup, well placed. Straight front, very good front and hind angulations, good breast proportions. Parallel movement coming and going. Gaits with good front reach and strong hind thrust. Positive nerves.</div></td>
</tr>
</table>
<div style="position: absolute; bottom: 30px;">
Siblings: </div>
</div>
</td>
<td class="sire col-3" rowspan="2">
<div class="cell">
<div class="row-fluid">
<div class="span12">
<strong>* Panjo vom Kirschental</strong>
</div>
</div>
<div class="row-fluid">
<div class="span12">SZ-2180231 </div>
</div>
<div class="row-fluid">
<div class="span12">SchH3 </div>
</div>
<span class="dna-row-3">
DNA gpr </span>

</div>
</td>
<td class="sire col-4" rowspan="1">
<div class="cell">
<div class="row-fluid">
<div class="span12">
<strong>* Quantum von Arminius</strong>
</div>
</div>
<div class="row-fluid">
<div class="span12">SZ-2055986 </div>
</div>
<div class="row-fluid">
<div class="span12">SchH3 </div>
</div>
<span class="dna-row-4">
DNA gpr </span>

</div>
</td>
</tr>
<tr>
<td class="dam col-4" rowspan="1">
<div class="cell">
<div class="row-fluid">
<div class="span12">
<strong>* Tinkie vom Kirschental</strong>
</div>
</div>
<div class="row-fluid">
<div class="span12">SZ-2092653 </div>
</div>
<div class="row-fluid">
<div class="span12">HGH SchH1 </div>
</div>
<span class="dna-row-4">
DNA </span>

</div>
</td>
</tr>
<tr>
<td class="dam col-3" rowspan="2">
<div class="cell">
<div class="row-fluid">
<div class="span12">
<strong>* Tussi von Bad-Boll</strong>
</div>
</div>
<div class="row-fluid">
<div class="span12">SZ-2180616 </div>
</div>
<div class="row-fluid">
 <div class="span12">SchH1 </div>
</div>
<span class="dna-row-3">
DNA gpr </span>

</div>
</td>
<td class="sire col-4" rowspan="1">
<div class="cell">
<div class="row-fluid">
<div class="span12">
<strong>* Yanox von Bad-Boll</strong>
</div>
</div>
<div class="row-fluid">
<div class="span12">SZ-2132604 </div>
</div>
<div class="row-fluid">
<div class="span12">SchH3 </div>
</div>
<span class="dna-row-4">
DNA </span>

</div>
</td>
</tr>
<tr>
<td class="dam col-4" rowspan="1">
<div class="cell">
<div class="row-fluid">
<div class="span12">
<strong>* Fanny di Val del Lambro</strong>
</div>
</div>
<div class="row-fluid">
<div class="span12">LOI-03-68883 </div>
</div>
<div class="row-fluid">
<div class="span12">SchH2 </div>
</div>
<span class="dna-row-4">
DNA gpr </span>

</div>
</td>
</tr>
<tr>
<td class="dam col-2" rowspan="4">
<div class="cell">
<table width="100%" cellpadding="0" cellspacing="0">
<tr>
<td colspan="3"><strong>Enya vom Haus Eagle</strong></td>
<td width="25.333333%">KP 7620</td>
</tr>
<tr>
<td colspan="3"> <br />
* Life </td>
<td colspan="2"><br />ZB: SG<br /></td>
</tr>
<tr>
<td colspan="3" width="50%">
</td>
<td colspan="2" width="50%">
</td>
</tr>
<tr>
<td colspan="4">Black - Gold</td>
</tr>
<tr>
<td colspan="4">
<br />
KB: <div class="p" style="margin-top: -13px;">Medium size, medium build, very good head and expression, normal wither, well placed croup, slightly short. Straight front. Very good front and hind angulations. Parallel movement coming and going. Gaits with sufficiently efficient front reach and hind thrust. Positive nerves.</div></td>
</tr>
</table>
<div style="position: absolute; bottom: 30px;">
Siblings: </div>
</div>
</td>
<td class="sire col-3" rowspan="2">
<div class="cell">
<div class="row-fluid">
<div class="span12">
<strong>* Yoker II vom Dänischen Hof</strong>
</div>
</div>
<div class="row-fluid">
<div class="span12">KP 7647 </div>
</div>
<div class="row-fluid">
<div class="span12">SchH1 </div>
</div>
<span class="dna-row-3">
DNA gpr </span>

</div>
</td>
<td class="sire col-4" rowspan="1">
<div class="cell">
<div class="row-fluid">
<div class="span12">
<strong>* Esko vom Dänischen Hof</strong>
</div>
</div>
<div class="row-fluid">
<div class="span12">SZ-1998887 </div>
</div>
<div class="row-fluid">
<div class="span12">SchH3 </div>
</div>
<span class="dna-row-4">
DNA gpr </span>

</div>
</td>
</tr>
<tr>
<td class="dam col-4" rowspan="1">
<div class="cell">
<div class="row-fluid">
<div class="span12">
<strong>* Claudia vom Bergmannshof</strong>
</div>
</div>
<div class="row-fluid">
<div class="span12">SZ-2074363 </div>
</div>
<div class="row-fluid">
<div class="span12">SchH1 </div>
</div>
<span class="dna-row-4">
DNA </span>

</div>
</td>
</tr>
<tr>
<td class="dam col-3" rowspan="2">
<div class="cell">
<div class="row-fluid">
<div class="span12">
<strong>Eischa vom Arkanum</strong>
</div>
</div>
<div class="row-fluid">
<div class="span12">KP 7648 </div>
</div>
<div class="row-fluid">
<div class="span12"> </div>
</div>
<span class="dna-row-3">
</span>

</div>
</td>
<td class="sire col-4" rowspan="1">
<div class="cell">
<div class="row-fluid">
<div class="span12">
<strong>* Xandro vom Elzmündungsraum</strong>
 </div>
</div>
<div class="row-fluid">
<div class="span12">SZ-2041728 </div>
</div>
<div class="row-fluid">
<div class="span12">SchH3 </div>
</div>
<span class="dna-row-4">
DNA gpr </span>

</div>
</td>
</tr>
<tr>
<td class="dam col-4" rowspan="1">
<div class="cell">
<div class="row-fluid">
<div class="span12">
<strong>* Tanni vom Arkanum</strong>
</div>
</div>
<div class="row-fluid">
<div class="span12">SZ-2015118 </div>
</div>
<div class="row-fluid">
<div class="span12">SchH1 </div>
</div>
<span class="dna-row-4">
</span>

</div>
</td>
</tr>
</tbody>
</table> </div>
</div>
<div class="kp" style="margin: -40px 0  0 60px; font-weight: bold; float: left; color: #000000;"> KP 80547 </div>
</div>
</div>
</div>
</body>
<script>
    if('Pink' == 'White'){
        alert('This is "White" pedigree!');
    }
</script>