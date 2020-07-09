@extends('layouts.master')

@section('content')


<script type="text/javascript" src="{{asset('assets/dogs/js_gal/jquery.jcarousel.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/dogs/js_gal/jquery.pikachoose.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/dogs/js_gal/jquery.touchwipe.min.js')}}"></script>
<link type="text/css" href="http://gsdcp.org/db/application/views/admin/dogs/asset/style_gal/bottom.css" rel="stylesheet">

<!-- <link href="http://gsdcp.org/db/assets/admin/css/bootstrap.css" rel="stylesheet" type="text/css" /> -->
<link href="{{asset('assets/admin/css/bootstrap.css')}}" rel="stylesheet">
<link href="{{asset('assets/admin/css/custom_styles.css')}}" rel="stylesheet">
<!-- <link href="http://gsdcp.org/db/assets/admin/css/custom_styles.css" rel="stylesheet" type="text/css" /> -->
    
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
{{ $dog->dog_name }} 
  @if ($dog->sex === 'Male')
    <img src="{{asset('assets/dogs/male.png')}}" alt="Male">
  @else
    <img src="{{asset('assets/dogs/female.png')}}" alt="Female">
  @endif

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
<strong>Reg Number:</strong> KP {{$dog->KP}} <br>
<strong>Whelped:</strong> {{$whelped = date('F d, Y', strtotime($dog->dob))}} <br>
<strong>DNA Status:</strong> {{$dog->DNA_status}} <br>
<strong>Microchip / Tattoo No:</strong> {{$dog->microchip}} <br>
<strong>HD / ED:</strong> {{$dog->hip}} / {{$dog->elbows}} <br>
</div>
</div>
<strong>Owner(s): </strong> <a href="http://gsdcp.org/db/members/profile/46">{{$dog->owner_id}}</a><br />
</div>
</div>
<br />
<div class="row-fluid">
<div class="span12">
<strong class="content-heading">Pedigree:</strong>
</div>
</div>
<div class="row-fluid">
<div class="span12">
<link rel="stylesheet" href="{{asset('assets/dogs/padigree.css')}}">
<!-- <link rel="stylesheet" href="http://gsdcp.org/db/application/views/admin/dogs/asset/padigree.css" /> -->
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
        #extended_pedigree_container{ width: 1465px; }    
</style>
<div class="overflow" style="overflow: auto">
<div id="extended_pedigree_container">
<div class="generation_depth">

<span>I Parents</span><span>II Grand Parents</span><span>III G.Grand Parents</span><span>IV G.G.Grand Parents</span> </div>
<div class="pedigree_line">
<div class="generation pedigree_gen1">
  <div class="animalBox">
  <div class="dna-not-available"></div>
  <span class="movieSymbol"></span>
  <span class="pedigreeOverlay dog-tooltip" dog_id="6766">
  <div>
  <a href="http://gsdcp.org/db/admin/dogs/view/6766">
  <img class="pedigreeMainPicture" src="http://gsdcp.org/db/assets/front/dogs/6766/208x138_IMG_9658.JPG" alt="Hulk vom Barenecke">
  </a>
  </div>
  <ul class="maleIcon">
  <li><a class="bold" href="http://gsdcp.org/db/admin/dogs/view/6766">Hulk vom Barenecke</a> <span>(SG)</span></li>
  <li><p class="one-liner">February 03, 2015</p></li> <li><p class="one-liner">KP 30488</p></li>
  <li><p class="one-liner">HD / ED Normal - Fast Normal <br />DNA Stored.</p></li>
  </ul>
  </span>
  </div>
  <div class="animalBox">
  <div class="dna-not-available"></div>
  <span class="movieSymbol"></span>
  <span class="pedigreeOverlay dog-tooltip" dog_id="9995">
  <div>
  <a href="http://gsdcp.org/db/admin/dogs/view/9995">
  <img class="pedigreeMainPicture" src="http://gsdcp.org/db/assets/front/dogs/9995/208x138_FB_IMG_1566054858190.jpg" alt="Aryaa vom TM Farms">
  </a>
  </div>
  <ul class="femaleIcon">
  <li><a class="bold" href="http://gsdcp.org/db/admin/dogs/view/9995">Aryaa vom TM Farms</a> <span>(V)</span></li>
  <li><p class="one-liner">June 01, 2017</p></li> <li><p class="one-liner">KP 50715</p></li>
  <li><p class="one-liner">HD / ED Normal - Normal <br />DNA Applied For.</p></li>
  </ul>
  </span>
  </div>
</div>
<div class="generation pedigree_gen2">
  <div class="animalBox">
  <span class="movieSymbol"></span>
  <span class="pedigreeOverlay dog-tooltip" dog_id="498">
  <div>
  <a href="http://gsdcp.org/db/admin/dogs/view/498">
  <img class="pedigreeMainPicture" src="http://gsdcp.org/db/assets/front/dogs/498/94x72_wizard-von-der-piste-trophe.jpg" alt="Wizard von der Piste Trophe">
  </a>
  </div>
  <ul class="maleIcon">
  <li><a class="bold" href="http://gsdcp.org/db/admin/dogs/view/498">Wizard von der Piste Trophe</a> <span>(VA)</span></li>
  <li><p class="one-liner">March 22, 2012</p></li> <li><p class="one-liner">KP 27403</p></li>
  <li><p class="one-liner">HD / ED Normal - Fast Normal <br />DNA Proven.</p></li>
  </ul>
  </span>
  </div>
  <div class="animalBox">
  <span class="movieSymbol"></span>
  <span class="pedigreeOverlay dog-tooltip" dog_id="4694">
   <div>
  <a href="http://gsdcp.org/db/admin/dogs/view/4694">
  <img class="pedigreeMainPicture" src="http://gsdcp.org/db/assets/front/uploads/94x72_dog_na.png" alt="Tahiti von Fidelius">
  </a>
  </div>
  <ul class="femaleIcon">
  <li><a class="bold" href="http://gsdcp.org/db/admin/dogs/view/4694">Tahiti von Fidelius</a> <span>(SG)</span></li>
  <li><p class="one-liner">April 25, 2011</p></li> <li><p class="one-liner">KP 25251</p></li>
  <li><p class="one-liner">HD / ED - <br />DNA Proven.</p></li>
  </ul>
  </span>
  </div>
  <div class="animalBox">
  <span class="movieSymbol"></span>
  <span class="pedigreeOverlay dog-tooltip" dog_id="9430">
  <div>
  <a href="http://gsdcp.org/db/admin/dogs/view/9430">
  <img class="pedigreeMainPicture" src="http://gsdcp.org/db/assets/front/dogs/9430/94x72_Baru2.jpg" alt="Baru vom Arkanum">
  </a>
  </div>
  <ul class="maleIcon">
  <li><a class="bold" href="http://gsdcp.org/db/admin/dogs/view/9430">Baru vom Arkanum</a> <span>(VA)</span></li>
  <li><p class="one-liner">September 30, 2013</p></li> <li><p class="one-liner">KP 50392</p></li>
  <li><p class="one-liner">HD / ED Normal - Fast Normal <br />DNA Proven.</p></li>
  </ul>
  </span>
  </div>
  <div class="animalBox">
  <span class="movieSymbol"></span>
  <span class="pedigreeOverlay dog-tooltip" dog_id="4582">
  <div>
  <a href="http://gsdcp.org/db/admin/dogs/view/4582">
  <img class="pedigreeMainPicture" src="http://gsdcp.org/db/assets/front/uploads/94x72_dog_na.png" alt="Emely vom Larechs">
  </a>
  </div>
  <ul class="femaleIcon">
  <li><a class="bold" href="http://gsdcp.org/db/admin/dogs/view/4582">Emely vom Larechs</a> <span>(SG)</span></li>
  <li><p class="one-liner">December 14, 2013</p></li> <li><p class="one-liner">KP 26792</p></li>
  <li><p class="one-liner">HD / ED Fast Normal - Normal  <br />DNA Stored.</p></li>
  </ul>
  </span>
  </div>
</div>
<div class="generation pedigree_gen3">
  <div class="animalBox">
  <span class="movieSymbol"></span>
  <span class="pedigreeOverlay dog-tooltip" dog_id="499">
  <div>
  <a href="http://gsdcp.org/db/admin/dogs/view/499">
  <img class="pedigreeMainPicture" src="http://gsdcp.org/db/assets/front/dogs/499/96x64_677930.jpg" alt="Enosch von Amasis">
  </a>
  </div>
  <ul class="maleIcon">
  <li class="male"><a class="bold" href="http://gsdcp.org/db/admin/dogs/view/499">Enosch von Amasis</a></li>
  <li class="male"><p class="one-liner">February 05, 2009</p></li> <li class="male"><p class="one-liner">SHSB-677930</p></li>
  </ul>
  </span>
  </div>
  <div class="animalBox">
  <span class="movieSymbol"></span>
  <span class="pedigreeOverlay dog-tooltip" dog_id="500">
  <div>
  <a href="http://gsdcp.org/db/admin/dogs/view/500">
  <img class="pedigreeMainPicture" src="http://gsdcp.org/db/assets/front/dogs/500/96x64_2225022.jpg" alt="Wendy von der Piste Trophe">
  </a>
  </div>
  <ul class="femaleIcon">
  <li class="female"><a class="bold" href="http://gsdcp.org/db/admin/dogs/view/500">Wendy von der Piste Trophe</a></li>
  <li class="female"><p class="one-liner">September 05, 2008</p></li> <li class="female"><p class="one-liner">SZ-2225022</p></li>
  </ul>
  </span>
  </div>
  <div class="animalBox">
  <span class="movieSymbol"></span>
  <span class="pedigreeOverlay dog-tooltip" dog_id="4695">
  <div>
  <a href="http://gsdcp.org/db/admin/dogs/view/4695">
  <img class="pedigreeMainPicture" src="http://gsdcp.org/db/assets/front/dogs/4695/96x64_2228650.jpg" alt="Boomer vom Polarstern">
  </a>
  </div>
  <ul class="maleIcon">
  <li class="male"><a class="bold" href="http://gsdcp.org/db/admin/dogs/view/4695">Boomer vom Polarstern</a></li>
  <li class="male"><p class="one-liner">November 03, 2008</p></li> <li class="male"><p class="one-liner">SZ-2228650</p></li>
  </ul>
  </span>
  </div>
  <div class="animalBox">
  <span class="movieSymbol"></span>
  <span class="pedigreeOverlay dog-tooltip" dog_id="4697">
  <div>
  <a href="http://gsdcp.org/db/admin/dogs/view/4697">
  <img class="pedigreeMainPicture" src="http://gsdcp.org/db/assets/front/uploads/96x64_dog_na.png" alt="Maxi vom Klostergarten">
  </a>
  </div>
  <ul class="femaleIcon">
  <li class="female"><a class="bold" href="http://gsdcp.org/db/admin/dogs/view/4697">Maxi vom Klostergarten</a></li>
  <li class="female"><p class="one-liner">May 11, 2006</p></li> <li class="female"><p class="one-liner">SZ-2183175</p></li>
  </ul>
  </span>
  </div>
  <div class="animalBox">
  <span class="movieSymbol"></span>
  <span class="pedigreeOverlay dog-tooltip" dog_id="1711">
  <div>
  <a href="http://gsdcp.org/db/admin/dogs/view/1711">
  <img class="pedigreeMainPicture" src="http://gsdcp.org/db/assets/front/dogs/1711/96x64_2209140.jpg" alt="Obi-Wan zum Kolbenguß">
  </a>
  </div>
  <ul class="maleIcon">
  <li class="male"><a class="bold" href="http://gsdcp.org/db/admin/dogs/view/1711">Obi-Wan zum Kolbenguß</a></li>
  <li class="male"><p class="one-liner">September 05, 2007</p></li> <li class="male"><p class="one-liner">SZ-2209140</p></li>
  </ul>
  </span>
  </div>
  <div class="animalBox">
  <span class="movieSymbol"></span>
  <span class="pedigreeOverlay dog-tooltip" dog_id="9431">
  <div>
  <a href="http://gsdcp.org/db/admin/dogs/view/9431">
  <img class="pedigreeMainPicture" src="http://gsdcp.org/db/assets/front/dogs/9431/96x64_2237542.jpg" alt="Venja vom Arkanum">
  </a>
  </div>
  <ul class="femaleIcon">
  <li class="female"><a class="bold" href="http://gsdcp.org/db/admin/dogs/view/9431">Venja vom Arkanum</a></li>
  <li class="female"><p class="one-liner">March 25, 2009</p></li> <li class="female"><p class="one-liner">SZ-2237542</p></li>
  </ul>
  </span>
  </div>
  <div class="animalBox">
  <span class="movieSymbol"></span>
  <span class="pedigreeOverlay dog-tooltip" dog_id="1">
  <div>
  <a href="http://gsdcp.org/db/admin/dogs/view/1">
  <img class="pedigreeMainPicture" src="http://gsdcp.org/db/assets/front/dogs/1/96x64_28670.jpg" alt="Daff Crveni Mayestoso">
  </a>
  </div>
  <ul class="maleIcon">
  <li class="male"><a class="bold" href="http://gsdcp.org/db/admin/dogs/view/1">Daff Crveni Mayestoso</a></li>
  <li class="male"><p class="one-liner">August 25, 2010</p></li> <li class="male"><p class="one-liner">KP 23399</p></li>
  </ul>
  </span>
  </div>
  <div class="animalBox">
  <span class="movieSymbol"></span>
  <span class="pedigreeOverlay dog-tooltip" dog_id="3358">
  <div>
  <a href="http://gsdcp.org/db/admin/dogs/view/3358">
  <img class="pedigreeMainPicture" src="http://gsdcp.org/db/assets/front/uploads/96x64_dog_na.png" alt="Cammy vom Loyal Kennel">
  </a>
  </div>
  <ul class="femaleIcon">
  <li class="female"><a class="bold" href="http://gsdcp.org/db/admin/dogs/view/3358">Cammy vom Loyal Kennel</a></li>
  <li class="female"><p class="one-liner">March 28, 2011</p></li> <li class="female"><p class="one-liner">KP 21013</p></li>
  </ul>
  </span>
  </div>
</div>
<div class="generation pedigree_gen4">
  <div class="animalBox">
  <span class="pedigreeOverlay dog-tooltip" dog_id="2">
  <div>
  <a href="http://gsdcp.org/db/admin/dogs/view/2">
  <img class="pedigreeMainPicture" src="http://gsdcp.org/db/assets/front/dogs/2/60x41_VA1_Ober_von_Bad-Boll.jpg" alt="Ober von Bad-Boll">
  </a>
  </div>
  <ul class="maleIcon">
  <li class="male"><a class="bold" href="http://gsdcp.org/db/admin/dogs/view/2">Ober von Bad-Boll</a></li>
  <li class="male"><p class="one-liner">July 21, 2005</p></li> </ul>
  </span>
  </div>
  <div class="animalBox">
  <span class="pedigreeOverlay dog-tooltip" dog_id="501">
  <div>
  <a href="http://gsdcp.org/db/admin/dogs/view/501">
  <img class="pedigreeMainPicture" src="http://gsdcp.org/db/assets/front/dogs/501/60x41_646407.jpg" alt="Bali von Amasis">
  </a>
  </div>
  <ul class="femaleIcon">
  <li class="female"><a class="bold" href="http://gsdcp.org/db/admin/dogs/view/501">Bali von Amasis</a></li>
   <li class="female"><p class="one-liner">January 12, 2006</p></li> </ul>
  </span>
  </div>
  <div class="animalBox">
  <span class="pedigreeOverlay dog-tooltip" dog_id="502">
  <div>
  <a href="http://gsdcp.org/db/admin/dogs/view/502">
  <img class="pedigreeMainPicture" src="http://gsdcp.org/db/assets/front/dogs/502/60x41_51437.jpg" alt="Furbo degli Achei">
  </a>
  </div>
  <ul class="maleIcon">
  <li class="male"><a class="bold" href="http://gsdcp.org/db/admin/dogs/view/502">Furbo degli Achei</a></li>
  <li class="male"><p class="one-liner">April 11, 2006</p></li> </ul>
  </span>
  </div>
  <div class="animalBox">
  <span class="pedigreeOverlay dog-tooltip" dog_id="511">
  <div>
  <a href="http://gsdcp.org/db/admin/dogs/view/511">
  <img class="pedigreeMainPicture" src="http://gsdcp.org/db/assets/front/dogs/511/60x41_1583141.jpg" alt="Grace de Cuatro Flores">
  </a>
  </div>
  <ul class="femaleIcon">
  <li class="female"><a class="bold" href="http://gsdcp.org/db/admin/dogs/view/511">Grace de Cuatro Flores</a></li>
  <li class="female"><p class="one-liner">November 23, 2005</p></li> </ul>
  </span>
  </div>
  <div class="animalBox">
  <span class="pedigreeOverlay dog-tooltip" dog_id="4696">
  <div>
  <a href="http://gsdcp.org/db/admin/dogs/view/4696">
  <img class="pedigreeMainPicture" src="http://gsdcp.org/db/assets/front/dogs/4696/60x41_51438.jpg" alt="Floro degli Achei">
  </a>
  </div>
  <ul class="maleIcon">
  <li class="male"><a class="bold" href="http://gsdcp.org/db/admin/dogs/view/4696">Floro degli Achei</a></li>
  <li class="male"><p class="one-liner">April 11, 2006</p></li> </ul>
  </span>
  </div>
  <div class="animalBox">
  <span class="pedigreeOverlay dog-tooltip" dog_id="4699">
  <div>
  <a href="http://gsdcp.org/db/admin/dogs/view/4699">
  <img class="pedigreeMainPicture" src="http://gsdcp.org/db/assets/front/dogs/4699/60x41_2166845.jpg" alt="Xini vom Tollensestrand">
  </a>
  </div>
  <ul class="femaleIcon">
  <li class="female"><a class="bold" href="http://gsdcp.org/db/admin/dogs/view/4699">Xini vom Tollensestrand</a></li>
  <li class="female"><p class="one-liner">July 12, 2005</p></li> </ul>
  </span>
  </div>
  <div class="animalBox">
  <span class="pedigreeOverlay dog-tooltip" dog_id="2543">
  <div>
  <a href="http://gsdcp.org/db/admin/dogs/view/2543">
  <img class="pedigreeMainPicture" src="http://gsdcp.org/db/assets/front/dogs/2543/60x41_2120031.jpg" alt="Bravos vom Steffen Haus">
  </a>
  </div>
  <ul class="maleIcon">
  <li class="male"><a class="bold" href="http://gsdcp.org/db/admin/dogs/view/2543">Bravos vom Steffen Haus</a></li>
  <li class="male"><p class="one-liner">February 10, 2003</p></li> </ul>
  </span>
  </div>
  <div class="animalBox">
  <span class="pedigreeOverlay dog-tooltip" dog_id="4701">
  <div>
  <a href="http://gsdcp.org/db/admin/dogs/view/4701">
  <img class="pedigreeMainPicture" src="http://gsdcp.org/db/assets/front/uploads/60x41_dog_na.png" alt="Julie vom Klostergarten">
  </a>
  </div>
  <ul class="femaleIcon">
  <li class="female"><a class="bold" href="http://gsdcp.org/db/admin/dogs/view/4701">Julie vom Klostergarten</a></li>
  <li class="female"><p class="one-liner">August 05, 2000</p></li> </ul>
  </span>
  </div>
  <div class="animalBox">
  <span class="pedigreeOverlay dog-tooltip" dog_id="1404">
  <div>
  <a href="http://gsdcp.org/db/admin/dogs/view/1404">
  <img class="pedigreeMainPicture" src="http://gsdcp.org/db/assets/front/dogs/1404/60x41_2144849.jpg" alt="Jaguar vom Arkanum">
  </a>
   </div>
  <ul class="maleIcon">
  <li class="male"><a class="bold" href="http://gsdcp.org/db/admin/dogs/view/1404">Jaguar vom Arkanum</a></li>
  <li class="male"><p class="one-liner">March 28, 2004</p></li> </ul>
  </span>
  </div>
  <div class="animalBox">
  <span class="pedigreeOverlay dog-tooltip" dog_id="1713">
  <div>
  <a href="http://gsdcp.org/db/admin/dogs/view/1713">
  <img class="pedigreeMainPicture" src="http://gsdcp.org/db/assets/front/uploads/60x41_dog_na.png" alt="Lil'Kim zum Kolbenguß">
  </a>
  </div>
  <ul class="femaleIcon">
  <li class="female"><a class="bold" href="http://gsdcp.org/db/admin/dogs/view/1713">Lil'Kim zum Kolbenguß</a></li>
  <li class="female"><p class="one-liner">November 20, 2004</p></li> </ul>
  </span>
  </div>
  <div class="animalBox">
  <span class="pedigreeOverlay dog-tooltip" dog_id="70">
  <div>
  <a href="http://gsdcp.org/db/admin/dogs/view/70">
  <img class="pedigreeMainPicture" src="http://gsdcp.org/db/assets/front/uploads/60x41_dog_na.png" alt="Vegas du Haut Mansard">
  </a>
  </div>
  <ul class="maleIcon">
  <li class="male"><a class="bold" href="http://gsdcp.org/db/admin/dogs/view/70">Vegas du Haut Mansard</a></li>
  <li class="male"><p class="one-liner">March 16, 2004</p></li> </ul>
  </span>
  </div>
  <div class="animalBox">
  <span class="pedigreeOverlay dog-tooltip" dog_id="7495">
  <div>
  <a href="http://gsdcp.org/db/admin/dogs/view/7495">
  <img class="pedigreeMainPicture" src="http://gsdcp.org/db/assets/front/uploads/60x41_dog_na.png" alt="Holly vom Arkanum">
  </a>
  </div>
  <ul class="femaleIcon">
  <li class="female"><a class="bold" href="http://gsdcp.org/db/admin/dogs/view/7495">Holly vom Arkanum</a></li>
  <li class="female"><p class="one-liner">December 14, 2003</p></li> </ul>
   </span>
  </div>
  <div class="animalBox">
  <span class="pedigreeOverlay dog-tooltip" dog_id="2">
  <div>
  <a href="http://gsdcp.org/db/admin/dogs/view/2">
  <img class="pedigreeMainPicture" src="http://gsdcp.org/db/assets/front/dogs/2/60x41_VA1_Ober_von_Bad-Boll.jpg" alt="Ober von Bad-Boll">
  </a>
  </div>
  <ul class="maleIcon">
  <li class="male"><a class="bold" href="http://gsdcp.org/db/admin/dogs/view/2">Ober von Bad-Boll</a></li>
  <li class="male"><p class="one-liner">July 21, 2005</p></li> </ul>
  </span>
  </div>
  <div class="animalBox">
  <span class="pedigreeOverlay dog-tooltip" dog_id="13">
  <div>
  <a href="http://gsdcp.org/db/admin/dogs/view/13">
  <img class="pedigreeMainPicture" src="http://gsdcp.org/db/assets/front/uploads/60x41_dog_na.png" alt="Tama Crveni Mayestoso">
  </a>
  </div>
  <ul class="femaleIcon">
  <li class="female"><a class="bold" href="http://gsdcp.org/db/admin/dogs/view/13">Tama Crveni Mayestoso</a></li>
  <li class="female"><p class="one-liner">June 07, 2005</p></li> </ul>
  </span>
  </div>
  <div class="animalBox">
  <span class="pedigreeOverlay dog-tooltip" dog_id="2238">
  <div>
  <a href="http://gsdcp.org/db/admin/dogs/view/2238">
  <img class="pedigreeMainPicture" src="http://gsdcp.org/db/assets/front/uploads/60x41_dog_na.png" alt="Sanjo von Arlett">
  </a>
  </div>
  <ul class="maleIcon">
  <li class="male"><a class="bold" href="http://gsdcp.org/db/admin/dogs/view/2238">Sanjo von Arlett</a></li>
  <li class="male"><p class="one-liner">October 24, 2007</p></li> </ul>
  </span>
  </div>
  <div class="animalBox">
  <span class="pedigreeOverlay dog-tooltip" dog_id="2354">
  <div>
  <a href="http://gsdcp.org/db/admin/dogs/view/2354">
  <img class="pedigreeMainPicture" src="http://gsdcp.org/db/assets/front/uploads/60x41_dog_na.png" alt="Quena vom Winner">
  </a>
  </div>
  <ul class="femaleIcon">
  <li class="female"><a class="bold" href="http://gsdcp.org/db/admin/dogs/view/2354">Quena vom Winner</a></li>
  <li class="female"><p class="one-liner">November 30, -0001</p></li> </ul>
  </span>
  </div>
</div>
</div>
</div>
<p>&nbsp;</p>
<p>&nbsp;</p>
</div>
</div>
</div>
<br />

<br />

*INSERT DOG'S FULL DATA HERE*

</div>
</div>
</div></div>

@endsection
