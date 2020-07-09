@extends('layouts.master')
<style>
  #gparents {
    padding-top: 135;
    padding-left: 10;
float:left;
  }
.responsive {
  width: 70%;
  padding-left:35;
  height: auto;
}
.responsive1 {
  float:left;
  width: 30%;
  height: 65;
}
  #ggparents {
    padding-top: 75;
    padding-left: 10;
float:left;
  }
  #gggparents {
    padding-top: 79;
    padding-left: 10;
float:left;
  }
  #ggggparents {
    padding-top: 79;
    padding-left: 10;
float:left;
  }
  #father {
    padding-top: 250;
float:left;
  }
  

  .clear{
    clear:both;
  }
  
</style>
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
    <div class="element-wrapper overflow" style="overflow-x: scroll; width: 1300px;white-space:nowrap;">
      <h6 class="element-header">
        {{$dogs[0]->dog_name}}'s Pedigree
      </h6>
      <div class="overflow" style ="width:1560px;">
      <div id="father">
        <div class="element-box">
          <div class="form-group">
<img class="pedigreeMainPicture" src="http://gsdcp.org/db/assets/front/uploads/208x138_dog_na.png" alt="Bella vom Edle Wolf">
          </div>
          <div class="form-group">
            {{$gen1['father'][0]->dog_name}} {{$gen1['father'][0]->show_title}}
          </div>
          <div class="form-group">
            {{$gen1['father'][0]->dob}}
          </div>
          <div class="form-group">
            {{$gen1['father'][0]->DNA_status}}
          </div>
          <div class="form-group">
            {{$gen1['father'][0]->KP}}
          </div>
        </div>
      </div>
      <div id="gparents">
        <div class="element-box">
          <div class="form-group">
<img class="pedigreeMainPicture responsive" src="http://gsdcp.org/db/assets/front/uploads/208x138_dog_na.png" alt="Bella vom Edle Wolf">
          </div>
          <div class="form-group">
            {{$gen2['gfather1'][0]->dog_name}} {{$gen2['gfather1'][0]->show_title}}
            <br>
            {{$gen2['gfather1'][0]->dob}},
            {{$gen2['gfather1'][0]->DNA_status}}
          </div>
          <div class="form-group">
            {{$gen2['gfather1'][0]->KP}}
          </div>
        </div>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>

        <div class="element-box">
          <div class="form-group">
<img class="pedigreeMainPicture responsive" src="http://gsdcp.org/db/assets/front/uploads/208x138_dog_na.png" alt="Bella vom Edle Wolf">
          </div>
          <div class="form-group">
            {{$gen2['gmother1'][0]->dog_name}} {{$gen2['gmother1'][0]->show_title}}
          <br>
            {{$gen2['gmother1'][0]->dob}},
            {{$gen2['gmother1'][0]->DNA_status}}
          </div>
          <div class="form-group">
            {{$gen2['gmother1'][0]->KP}}
          </div>
        </div>
      </div>

      <div id="ggparents">
        <div class="element-box">
          <div class="form-group">
<img class="pedigreeMainPicture responsive1" src="http://gsdcp.org/db/assets/front/uploads/208x138_dog_na.png" alt="Bella vom Edle Wolf">
          </div>
          <div class="form-group">
            &nbsp;{{$gen3['ggfather1'][0]->dog_name}} &nbsp;{{$gen3['ggfather1'][0]->show_title}}
          <br>
            &nbsp; {{$gen3['ggfather1'][0]->dob}},
            {{$gen3['ggfather1'][0]->KP}}
          </div>
        </div>
        
        <div class="element-box">
          <div class="form-group">
<img class="pedigreeMainPicture responsive1" src="http://gsdcp.org/db/assets/front/uploads/208x138_dog_na.png" alt="Bella vom Edle Wolf">
          </div>
          <div class="form-group">
            &nbsp;{{$gen3['ggmother1'][0]->dog_name}} &nbsp;{{$gen3['ggmother1'][0]->show_title}}
          <br>
            &nbsp; {{$gen3['ggmother1'][0]->dob}},
            {{$gen3['ggmother1'][0]->KP}}
          </div>
        </div>
        <div class="element-box">
          <div class="form-group">
<img class="pedigreeMainPicture responsive1" src="http://gsdcp.org/db/assets/front/uploads/208x138_dog_na.png" alt="Bella vom Edle Wolf">
          </div>
          <div class="form-group">
            &nbsp;{{$gen3['ggfather2'][0]->dog_name}} &nbsp;{{$gen3['ggfather2'][0]->show_title}}
          <br>
            &nbsp; {{$gen3['ggfather2'][0]->dob}},
            {{$gen3['ggfather2'][0]->KP}}
          </div>
        </div>
        <div class="element-box">
          <div class="form-group">
<img class="pedigreeMainPicture responsive1" src="http://gsdcp.org/db/assets/front/uploads/208x138_dog_na.png" alt="Bella vom Edle Wolf">
          </div>
          <div class="form-group">
            &nbsp;{{$gen3['ggmother2'][0]->dog_name}} &nbsp;{{$gen3['ggmother2'][0]->show_title}}
          <br>
            &nbsp; {{$gen3['ggmother2'][0]->dob}},
            {{$gen3['ggmother2'][0]->KP}}
          </div>
        </div>
      </div>
      <div id="gggparents">
        <div class="element-box">
            &nbsp;{{$gen4['gggfather1'][0]->dog_name}} &nbsp;{{$gen4['gggfather1'][0]->show_title}}
        <br>
        <br>
        <br>
            &nbsp;{{$gen4['gggmother1'][0]->dog_name}} &nbsp;{{$gen4['gggmother1'][0]->show_title}}
        </div>
        <br>
        <div class="element-box">
          &nbsp;{{$gen4['gggfather2'][0]->dog_name}} &nbsp;{{$gen4['gggfather2'][0]->show_title}}
        <br>
        <br>
        <br>
            &nbsp;{{$gen4['gggmother2'][0]->dog_name}} &nbsp;{{$gen4['gggmother2'][0]->show_title}}
        </div>
        <br>
        <br>
        <div class="element-box">
          &nbsp;{{$gen4['gggfather3'][0]->dog_name}} &nbsp;{{$gen4['gggfather3'][0]->show_title}}
        <br>
        <br>
            &nbsp;{{$gen4['gggmother3'][0]->dog_name}} &nbsp;{{$gen4['gggmother3'][0]->show_title}}
        </div>
        <br>
        <br>
        <div class="element-box">
          &nbsp;{{$gen4['gggfather4'][0]->dog_name}} &nbsp;{{$gen4['gggfather4'][0]->show_title}}
        <br>
        <br>
            &nbsp;{{$gen4['gggmother4'][0]->dog_name}} &nbsp;{{$gen4['gggmother4'][0]->show_title}}
        </div>
      </div>
      <div id="ggggparents">
        <div class="element-box">
            &nbsp;{{$gen5['ggggfather1'][0]->dog_name}} &nbsp;{{$gen5['ggggfather1'][0]->show_title}}
        <br>
        <br>
        <br>
            &nbsp;{{$gen5['ggggmother1'][0]->dog_name}} &nbsp;{{$gen5['ggggmother1'][0]->show_title}}
        </div>
        <br>
        <div class="element-box">
          &nbsp;{{$gen5['ggggfather2'][0]->dog_name}} &nbsp;{{$gen5['ggggfather2'][0]->show_title}}
        <br>
        <br>
        <br>
            &nbsp;{{$gen5['ggggmother2'][0]->dog_name}} &nbsp;{{$gen5['ggggmother2'][0]->show_title}}
        </div>
        <br>
        <br>
        <div class="element-box">
          &nbsp;{{$gen5['ggggfather3'][0]->dog_name}} &nbsp;{{$gen5['ggggfather3'][0]->show_title}}
        <br>
        <br>
            &nbsp;{{$gen5['ggggmother3'][0]->dog_name}} &nbsp;{{$gen5['ggggmother3'][0]->show_title}}
        </div>
        <br>
        <br>
        <div class="element-box">
          &nbsp;{{$gen5['ggggfather4'][0]->dog_name}} &nbsp;{{$gen5['ggggfather4'][0]->show_title}}
        <br>
        <br>
            &nbsp;{{$gen5['ggggmother4'][0]->dog_name}} &nbsp;{{$gen5['ggggmother4'][0]->show_title}}
        </div>
      </div>
      <div class="clear"></div>
      </div>
      </div>
  </div>
</div>
</div>


@endsection