@extends('layouts.master')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
@section('content')
<div class="content-i">
  <div class="content-box">
    <div class="row">
      <div class="col-lg-12">
        <div class="element-wrapper">
          <h6 class="element-header">
            <a action="back" href="javascript: window.history.back();" class="btn btn-sm btn-secondary">
              <i class="fa fa-backward"> </i><span> &nbsp; Back</span>
            </a>
            &nbsp; Show Entry - Form
          </h6>

          <div class="element-box">
            <br> 


@if (count($errors) > 0)
  <div class="alert alert-danger">
      <strong>Whoops!</strong> There were some problems with your input.<br><br>
      <ul>
      @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
      @endforeach
      </ul>
  </div>
@endif


<form action="{{ URL::to('/entry_show',$event->id) }}" method="POST" id="formValidate">
@csrf
<div class="form-group row">
  <div class="col-sm-1"></div>
  <label class="col-form-label col-sm-2 h6"> Select a Member</label>
  <div class="col-sm-6">                            <!-- data-dependent="dogs_name"-->
    <select class="form-control select2 demo dynamicmember dynamicmemberdetails" data-dependent="dogs_name" name="member_name" id="member_name" >
      <option value="0">
        Select One
      </option>
      @foreach($total_users as $users)
        <option value="{{ $users->id }}">{{ $users->first_name.' '.$users->last_name.' ('.$users->email.')' }}</option>
      @endforeach
    </select>
  </div>
  <div class="col-sm-1"><span class="text-danger h4" data-toggle="tooltip" data-placement="top" 
  title="required"> *</span></div>
</div>

          <div class="clone-container">
            <div class="container-box clone">
              <br>
              <div class="error-msg" style="width: 100%;"></div>
                <div class="form-group row">
                  <div class="col-sm-1"></div>
                    <label class="col-form-label col-sm-2 h6"> Name of Dog</label>
                      <div class="col-sm-6">
                        <select name="dog_id[]" id="dog_id" class="form-control select2 dog_id select validate[required]" style="width: 100%;">
                          <?php
                          global $row;
                          global $member;
                            function selectBox($a) { } 
                          ?>
                            <!-- <?php echo selectBox("SELECT dogs.id , dogs.dog_name FROM dog_owners INNER JOIN dogs ON (dog_owners.dog_id = dogs.id) WHERE dog_owners.owner_id='101' AND dogs.`status` = 'Active' AND dogs.id NOT IN(SELECT dog_id FROM dog_shows WHERE `show_id`='120')", '');?> -->
                        </select>
                      </div>
                </div>
                  <br><br>
                    <div class="row">
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label for="">Date Of Birth: </label>
                          <var id="dob" name="dob"><span class="dob" style="color: green; text-decoration: underline;"></span></var>
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label for="">Reg No: </label>
                          <var id="reg" name="reg"><span class="reg" style="color: green; text-decoration: underline;"></span></var>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label for="">Tattoo/Microchip: </label>
                          <var id="microchip" name="microchip"><span class="microchip" style="color: green; text-decoration: underline;"></span></var>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label for="">Sire: </label>
                          <var id="sire_name" name="sire_name"><span class="sire_name" style="color: green; text-decoration: underline;"></span></var>
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label for="">Reg. No: </label>
                          <var id="sire_reg" name="sire_reg"><span class="sire_reg" style="color: green; text-decoration: underline;"></span></var>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label for="">Dam: </label>
                          <var id="dam_name" name="dam_name"><span class="dam_name" style="color: green; text-decoration: underline;"></span></var>
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label for="">Reg. No: </label>
                          <var id="dam_reg" name="dam_reg"><span class="dam_reg" style="color: green; text-decoration: underline;"></span></var>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label for="">Breeder: </label>
                          <var id="dam_name" name="dam_name"><span class="breeder" style="color: green; text-decoration: underline;"></span></var>
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label for="">Reg. No: </label>
                          <var id="dam_reg" name="dam_reg"><span class="dam_reg" style="color: green; text-decoration: underline;"></span></var>
                        </div>
                      </div>
                    </div>
                    
                    
                    <!-- <div class="row-fluid">
                      <div class="span3">Date of Birth:</div>
                      <div class="span3 html-field dob"></div>
                      <div class="span3">Reg. No. :</div>
                      <div class="span3 html-field reg"></div>
                    </div>
                      <div class="clearfix"></div>
                    <p style="height: 2px;margin: 0 0 8px;">&nbsp;</p> -->
                    
                    <!-- <div class="row-fluid">
                      <div class="span3">Tattoo/Microchip:</div>
                      <div class="span9 html-field microchip"></div>
                    </div>
                      <div class="clearfix"></div>
                    <p style="height: 2px;margin: 0 0 8px;">&nbsp;</p> -->
                    
                    <!-- <div class="row-fluid">
                      <div class="span2">Sire:</div>
                      <div class="span4 html-field sire_name">&nbsp;</div>
                      <div class="span3">Reg. No.:</div>
                      <div class="span3 html-field sire_reg"></div>
                    </div>
                      <div class="clearfix"></div>
                    <p style="height: 2px;margin: 0 0 8px;">&nbsp;</p>
                    <div class="row-fluid">
                      <div class="span2">Dam:</div>
                      <div class="span4 html-field dam_name">&nbsp;</div>
                      <div class="span3">Reg. No.:</div>
                      <div class="span3 html-field dam_reg">&nbsp;</div>
                    </div>
                      <div class="clearfix"></div>
                    <p style="height: 2px;margin: 0 0 8px;">&nbsp;</p>
                    <div class="row-fluid">
                      <div class="span2">DNA:</div>
                      <div class="span2 html-field dna">&nbsp;</div>
                      <div class="span2">HD:</div>
                      <div class="span2 html-field hd">&nbsp;</div>
                      <div class="span2">ED:</div>
                      <div class="span2 html-field ed">&nbsp;</div>
                    </div>
                      <div class="clearfix"></div>
                    <p style="height: 2px;margin: 0 0 8px;">&nbsp;</p>
                    <div class="row-fluid">
                      <div class="span3">Breeder:</div>
                      <div class="span9 html-field breeder"></div>
                    </div>
                      <div class="clearfix"></div>
                    <p style="height: 2px;margin: 0 0 8px;">&nbsp;</p>
                    <div class="row-fluid">
                      <div class="span3">:</div>
                      <div class="span9 html-field class"></div>
                    </div> -->
                      <div class="clearfix"></div>
                    <p style="height: 2px;margin: 0 0 8px;">&nbsp;</p>
                  <div class="form-actions" style="text-align: center; padding: 10px 0;">
                <button type="button" name="other" class="add-more btn btn-info">Another Dog</button>
        </div>
      </div>
    </div>

<!-- <div class="form-group row">
  <div class="col-sm-1"></div>
  <label class="col-form-label col-sm-2 h6"> Name of Dog</label>
  <div class="col-sm-6">
    <select class="form-control select2 dynamicmemberdogs" data-dependent="dogs_result" name="dogs_name" id="dogs_name">   
    </select>
  </div>
  <div class="col-sm-1"><span class="text-danger h4" data-toggle="tooltip" data-placement="top" 
  title="required"> *</span></div>
</div> -->
  <span id="dogs_result"></span>

<span id="content" class="center"></span>
<span id="owner_details"></span>

        <hr>
        <div class="col-xs-12 col-sm-12 col-md-12 text-right">
          <button type="submit" class="btn btn-primary" id="myDIV">Submit</button>
        </div>
    </form>
  </div>
</div>
</div>
</div>
</div>
</div>


<script>
  
$(document).ready(function(){
  // $('.clone-container').hide();
  // $('.dynamicmember').change(function(){
  //   $('.clone-container').show();
  //  if($(this).val() != '')
  //  {
  //   // $('#dogs_result').empty();
    
  //   var select = $(this).attr("id");
  //   var value = $(this).val();
  //   var dependent = $(this).data('dependent');
 
  //   var _token = $('input[name="_token"]').val();
 
  //   $.ajax({
  //    url:"{{ route('dynamicdependent.fetch_dogs') }}",
  //    post:"POST",
  //    beforeSend: function (xhr) {
  //          var token = $('meta[name="csrf_token"]').attr('content');

  //          if (token) {
  //                return xhr.setRequestHeader('X-CSRF-TOKEN', token);
  //          }
  //      },
  //    data:{
  //    select:select, 
  //    value:value
  //    },      
  //    success:function(result)
  //    {
  //     $('#dogs_name').html(result);
  //    }
 
  //   });
   

  //  }

  // });

  // $('.clone-container').hide();
  $('.demo').change(function(){
  var select_box = $(this);
  $('#dog_id').empty();
    // $('.clone-container').show();
   if($(this).val() != '')
   {
    // $('#dogs_result').empty();
    
    var dog_id = $(this).attr("id");
    var value = $(this).val();
    // var dependent = $(this).data('dependent');
 
    // var _token = $('input[name="_token"]').val();
 
    $.ajax({

        type: "GET",

        dataType: "JSON",

        url: "{{ route('dynamicdependent.fetch_dogs') }}",

        beforeSend: function (xhr) {
           var token = $('meta[name="csrf_token"]').attr('content');

           if (token) {
                 return xhr.setRequestHeader('X-CSRF-TOKEN', token);
           }
       },

        data: {

            dog_id: dog_id,
            value:value,
            show_id: '120'

        },

        complete: function (data) {

            // var json = $.parseJSON(data.responseText);
            //console.log(json);
            var json = data.length;
            // console.log(json.option);
            // document.getElementById('dog_id').value('<option value="' +json.option.id + '">' +json.option.dog_name +'</option>');
            // $.each(json.option, function(id, dog_name) {   
            //  $('#dog_id')
            //      .append($("<option></option>")
            //         .attr("value", id)
            //         .text(dog_name)); 
            // });

            //$("#dog_id").append();

        // $.each(json,function(id,dog_name){
        //   $(".dog_id").append('<option value="' +id + '">' +dog_name +'</option>');
        //   });
        for(var i = 0; i<json; i++){
          var id = data[i]['id'];
          var dog_name = data[i]['dog_name'];
          $(".dog_id").append('<option value="' +id + '">' +dog_name +'</option>');
        }

        // $.each(json.option, (i, val) => {
        //   $('.dog_id').append(`<option value="${val.id}"> "${val.dog_name}" </option>`);
        // });

            //console.log(json);

            // if(!json.breeder || json.breeder ==''){

            //     $('.breeder', '.clone_container').html('<input type="text" name="breeder['+dog_id+']" class="form-control validate[required]">');

            // }else if(json.breeder !=''){

            //     $('.breeder', '.clone_container').html(json.breeder);

            // }


            // select_box.attr('status','1');

            // if(!(json.error == '' || json.error == null)){

            //     select_box.attr('status','0');

            //     $('.error-msg', '.clone_container').html('<div class="alert alert-error "><button type="button" class="close" data-dismiss="alert">×</button>' + json.error +'</div><br>');

            //     //

            //     checkError = 1;

            //     console.log(checkError);

            //     document.getElementById("myDIV").disabled = true;

            //     //document.getElementById("myDIV").style.display = "none";

            //     //



            // }else {

            //     select_box.attr('status','1');

            //     $('.error-msg', '.clone_container').html('');

            //     document.getElementById("myDIV").disabled = false;

            // }

            // $('.dob', '.clone_container').html(json.dog.dob);

            // $('.reg', '.clone_container').html(json.dog.regestration_no);

            // $('.microchip', '.clone_container').html(json.dog.microchip);

            // $('.class', '.clone_container').html(json.class);



            // $('.sire_name', '.clone_container').html(json.sire.dog_name);

            // $('.sire_reg', '.clone_container').html(json.sire.regestration_no);



            // $('.dam_name', '.clone_container').html(json.dam.dog_name);

            // $('.dam_reg', '.clone_container').html(json.dam.regestration_no);



            // $('.dna', '.clone_container').html(json.dog.DNA_status);

            // $('.hd', '.clone_container').html(json.dog.hip);

            // $('.ed', '.clone_container').html(json.dog.elbows);



            // calc_total_amount(checkError);

        }

    });
   

   }

  });

  $('.dynamicmemberdetails').change(function(){

   if($(this).val() != '')
   {
    var select = $(this).attr("id");
    var value = $(this).val();
    var _token = $('input[name="_token"]').val();
 
    $.ajax({
     url:"{{ route('dynamicdependent.fetch_owner_details') }}",
     post:"POST",
     beforeSend: function (xhr) {
           var token = $('meta[name="csrf_token"]').attr('content');

           if (token) {
                 return xhr.setRequestHeader('X-CSRF-TOKEN', token);
           }
       },
     data:{
     select:select, 
     value:value
     },      
     success:function(result)
     {
      $('#owner_details').html(result);
     }
 
    });

   }
  });

  $('.dog_id').change(function(){
   if($(this).val() != '')
   {
    var select = $(this).attr("id");
    var value = $(this).val();
    var dependent = $(this).data('dependent');
 
    var _token = $('input[name="_token"]').val();
 
    $.ajax({
     url:"{{ route('dynamicdependent.fetch_member_dogs') }}",
     post:"POST",
     beforeSend: function (xhr) {
           var token = $('meta[name="csrf_token"]').attr('content');

           if (token) {
                 return xhr.setRequestHeader('X-CSRF-TOKEN', token);
           }
       },
     data:{
     select:select, 
     value:value
     },      
     success:function(result)
     {
      $('#dogs_result').html(result);
     }
 
    });

   }
  });

});

function addRow() {
  // document.getElementById('remove_foreign_no').style.display = block;
  document.querySelector('#content').insertAdjacentHTML(
    'afterbegin',
    `<br><div class="form-group row">
  <div class="col-sm-1"></div>
  <label class="col-form-label col-sm-2 h6"> Name of Dog</label>
  <div class="col-sm-6">
    <select class="form-control select2 dynamicmemberdogs" data-dependent="dogs_result" name="dogs_name" id="dogs_name">   
    </select>
  </div>
  <div class="col-sm-1"></div>
</div>`      
  )
}

function removeForeignRow(e) {
  e.parentElement.parentElement.parentElement.remove();
}

</script>

<!-- <script>


    (function ($) {

        var checkError =0;
        $('.clone-container').hide();
        $(document).on('change', '.dog_id', function () {

            //for disabling submit button initial start
            $('.clone-container').show();
            document.getElementById("myDIV").disabled = true;

            

            var select_box = $(this);

            var dog_id = $(this).val();

            if(dog_id <= 0) return;

            var exist = false;

            $('.dog_id').not(this).each(function(){

                if($(this).val() == dog_id){

                    alert('This dog already selected!');

                    exist = true;

                }

            });

            if(exist)
                {
                    return;
                }



            var clone_container = $(this).parents('.clone');



            $.ajax({

                type: "POST",

                dataType: "JSON",

                url: "{{ route('dynamicdependent.fetch_dogs') }}",

                data: {

                    dog_id: dog_id,

                    show_id: '120'

                },

                complete: function (data) {

                    var json = $.parseJSON(data.responseText);

                    

                    //console.log(json);

                    if(!json.breeder || json.breeder ==''){

                        $('.breeder', clone_container).html('<input type="text" name="breeder['+dog_id+']" class="wpcf7-text validate[required]">')

                    }else if(json.breeder !=''){

                        $('.breeder', clone_container).html(json.breeder);

                    }


                    select_box.attr('status','1');

                    if(!(json.error == '' || json.error == null)){

                        select_box.attr('status','0');

                        $('.error-msg', clone_container).html('<div class="alert alert-error "><button type="button" class="close" data-dismiss="alert">×</button>' + json.error +'</div><br>');

                        //

                        checkError = 1;

                        console.log(checkError);

                        document.getElementById("myDIV").disabled = true;

                        //document.getElementById("myDIV").style.display = "none";

                        //



                    }else {

                        select_box.attr('status','1');

                        $('.error-msg', clone_container).html('');

                        document.getElementById("myDIV").disabled = false;

                    }

                    console.log("json.dog.dob");
                    $('.dob', clone_container).html(json.dog.dob);

                    $('.reg', clone_container).html(json.dog.regestration_no);

                    $('.microchip', clone_container).html(json.dog.microchip);

                    $('.class', clone_container).html(json.class);



                    $('.sire_name', clone_container).html(json.sire.dog_name);

                    $('.sire_reg', clone_container).html(json.sire.regestration_no);



                    $('.dam_name', clone_container).html(json.dam.dog_name);

                    $('.dam_reg', clone_container).html(json.dam.regestration_no);



                    $('.dna', clone_container).html(json.dog.DNA_status);

                    $('.hd', clone_container).html(json.dog.hip);

                    $('.ed', clone_container).html(json.dog.elbows);



                    calc_total_amount(checkError);

                }

            });


        });


        function calc_total_amount(checkError) {

            var total_amount = 0;

            var memberBalance = <?php echo $memCreditAmount=2000; ?>

           

            $('.dog_id').each(function () {

                if ($(this).val() > 0 && parseInt($(this).attr('status')) === 1) {

                    total_amount += parseInt('<?php echo "2000"?>');

                    var pay = total_amount - parseInt('<?php echo "1000"?>');

                    $('.total_amount').html((pay <= 0 ? 0 : pay));

                }


                $('.total_show_amount').html(total_amount);



                if(memberBalance < 0 || checkError == 1)

                {                  

                     document.getElementById("myDIV").disabled = true;

                }else{                   

                    document.getElementById("myDIV").disabled = false;

                }

            })

        }


        $(document).ready(function () {

            $('.dog_id').trigger('change');



            $(document).on('click', '.add-more', function () {

                var clone_container = $(this).parents('.clone-container');



                var clone = $(this).parents('.clone:first').clone();

                clone.find('#dog_id').prop('id','dog_id_' + ($(this).parents('.clone').length + 1)).removeAttr('status');

                clone.find('.chosen-container').remove();

                clone.find('.html-field,.error-msg').html('');

                clone.find('.delete').remove();



                clone.find('.select2-container').remove();

                clone.find('select').removeClass('select2-offscreen');

                clone.find('select').select2();


                clone.find('.add-more').parent().append('<button type="button" name="del" class="delete btn btn-danger">Delete</button>');

                clone.appendTo(clone_container);

            });

            $(document).on('click', '.delete', function () {

                $(this).parents('.clone').remove();

                checkError = 0;

                calc_total_amount(checkError);

            });

        });

    })(jQuery)

</script> -->

@endsection