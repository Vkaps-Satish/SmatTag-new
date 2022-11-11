<?php

/*
 * Template Name: Pet Professional Register Brand Microchip ocean
 */
get_header();
$getbreeds = get_top_parents('pet_type_and_breed');
//Redirect user if user not login or not petprofessional
/*if ( is_user_logged_in() ){
     $current_user = wp_get_current_user();
     $roles = $current_user->roles; 

       if( !$roles == 'pet_professional' || !in_array( 'pet_professional', $roles )){
         print('<div>
        <div class="not-found-text width-100">This page is only for Pet-Professionals..</div></div>');
         die();
          }

    }else{
        print('<script>window.location.href="/pet-professionals-signup"</script>');
    }*/
  
$countries_obj  = new WC_Countries();
$countries      = $countries_obj->__get('countries');
?>
<div class="container-wrap">        
    <div class="container main-content">
        <div class="row">
            <div class="woo-sidebar col-sm-3">
                 <!-- <h3 class="widgettitle">Pet Professional</h3> -->
                <?php echo do_shortcode("[stag_sidebar id='pet-professional-sidebar']"); ?>
                &nbsp;
                <?php echo do_shortcode("[stag_sidebar id='main-sidebar']");?>
            </div>
            <div class="woo-content col-sm-9" id="woo-content">
                <?php if (has_post_thumbnail( $post->ID ) ): ?>
                    <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
                    <div class="page-image">
                        <img src="<?php echo $image[0]; ?>" alt="image" />
                    </div>
                <?php endif; ?>
                <div class="page-heading">
                    <h1>Sign Up With SmartTag</h1>
                </div>
                <div class="site-tabs-wrap">
                    <div class="acc-blue-box">
                        <div class="acc-blue-head">
                            Pet Owner 1
                        </div>
                        <div class="acc-blue-content">
                            <form id="RegBrndMicrochip" method="POST" enctype="multipart/form-data">
                                <!--    <div class="row"> -->
                                <input type="hidden" name="action" value="Create_mul_Pet_profile">
                                <div class="contact-form" id="sec-cont-info">
                                    <div class="field-wrap three-fields-wrap">
                                        <div class="field-div">
                                            <label>First Name: </label>
                                            <input type="text" name="first_name" placeholder="First Name" class="user-data" id="s-name" />
                                        </div>
                                        <div class="field-div">
                                            <label>Last Name: </label>
                                            <input type="text" name="last_name" placeholder="Last Name" class="user-data" id="s-lstname" />
                                        </div>
                                        <div class="field-div">
                                            <label>Phone Number: </label>
                                            <input type="text" name="primary_home_number" placeholder="Phone Number" class="user-data" id="s-lstname" />
                                        </div>
                                    </div>
                                    <div class="field-wrap two-fields-wrap">
                                        <div class="field-div">
                                            <label>Email: </label>
                                            <input type="text" name="p_email" placeholder="Enter Email Address" class="user-data" id="s-email" value="" />
                                        </div>
                                        <div class="field-div">
                                            <label>Select Your Country: </label>
                                            <!-- <input type="text" name="primary_country" placeholder="Enter Country" class="user-data" id="s-county" /> -->
                                            <?php 
                                                $countries_obj = new WC_Countries();
                                                $countries = $countries_obj->__get('countries');
                                                echo '<select name="primary_country" class="address-country user-data" id="s-county">';
                                                    foreach ($countries as $key => $value) {

                                                        echo '<option value="'.$key.'" >'.$value.'</option>';
                                                    }
                                                echo '</select>';
                                            ?>
                                        </div>
                                    </div>
                                    <div class="field-wrap two-fields-wrap">
                                        <div class="field-div">
                                            <label>Address: </label>
                                            <input type="text" name="primary_address_line1" placeholder="Address line 1" class="user-data" id="sadd1" />
                                        </div>
                                        <div class="field-div">
                                            <label></label>
                                            <input type="text" name="primary_address_line2" placeholder="Address line 2" class="user-data" id="s-add2"/>
                                        </div>
                                    </div>
                                    <div class="field-wrap three-fields-wrap">
                                        <div class="field-div">
                                            <label>*City: </label>
                                            <input type="text" name="primary_city" placeholder="City" class="user-data" id="s_city1" />
                                        </div>
                                        <div class="field-div">
                                            <label>*State: </label>
                                            <select name="primary_state" class="user-data address-state" id="s-sate" data-val=""></select>
                                        </div>
                                        <div class="field-div">
                                            <label>*Zip Code: </label>
                                            <input type="text" name="primary_postcode" placeholder="Zipcode" class="user-data" id="s-zip"/>
                                        </div>
                                    </div>
                                    <div class="step-accordion">
                                        <h4 class="step-acc-head" id="sec-form"><i class="fa fa-plus"></i> Show Extra Information: </h4>
                                        <div class="step-acc-content">
                                            <div class="contact-form" id="sec-cont-info">
                                                <div id="sections">
                                                    <div class="section" id="section">
                                                        <h4 class="step-acc-head">Pet Information: </h4>
                                                     <div class="field-wrap">    
                                                        <div class="field-div">
                                                            <label>*Select Microchip Company of the Implemented Microchip: </label>
                                                            <select name="microchip_company[]" class="petdata fpet"  />
                                                            <option value="">Select Your Microchip Brand</option>   
                                                            <option value="State1">State1</option>
                                                            <option value="State2">State2</option>
                                                            <option value="State3">State3</option>
                                                            <option value="State4">State4</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                        <div class="field-wrap two-fields-wrap">
                                                            <div class="field-div">
                                                                <label>*Microchip Number: </label>
                                                                <input type="text" name="microchip_id_number[]" placeholder="Enter Microchip Number" class="petdata fpet change-pet-cont microchip-number"  />
                                                            </div>
                                                            <div class="field-div">
                                                                <label>Re-enter Microchip Number: </label>
                                                                <input type="text" name="ReMicroChipNum[]" placeholder="Re-enter Microchip Number" class="petdata fpet" />
                                                            </div>
                                                        </div>
                                                        <div class="field-wrap three-fields-wrap">
                                                            <div class="field-div">
                                                                <label>Pet Name: </label>
                                                                <input type="text" name="pet_name[]" placeholder="Pet Name" class="petdata fpet change-pet-cont pet-name" />
                                                            </div>
                                                            <div class="field-div">
                                                                <label>*Gender: </label>
                                                                <select name="gender[]" class="petdata fpet change-pet-cont gender" />
                                                                <option value="">Gender</option>    
                                                                <option value="Male">Male</option>
                                                                <option value="Female">Female</option>
                                                                </select>
                                                            </div>  
                                                            <div class="field-div">
                                                                <label>*Pet Type: </label>
                                                                <select name="pet_type" class="text-data" id="pettype" required=""  >
                                                                    <option value="">Type</option>
                                                                    <?php foreach ($getbreeds as $key => $value) { ?>
                                                                
                                                                <option value="<?= $value['term_id'] ?>"><?= $value['name'] ?></option>
                                                                
                                                                    <?php } ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    <div class="field-wrap">
                                                        <div class="field-div">
                                                            <label>*Select Universal Microchip Protection Plan: </label>
                                                            <select name="UnisalchipPln[]" class="petdata fpet change-pet-cont protection-plan">
                                                                <option value="">Select Your Microchip Brand</option>   
                                                                <option value="6858">Universal Microchip Silber 1 Year Plan -$6.95 </option>
                                                                <option value="6856">Universal Microchip Silber 5 Year Plan -$24.95 </option>
                                                                <option value="6857">Universal Microchip Silber Lifetime Plan -$39.95 </option>
                                                                <option value="6852">Universal Microchip Gold 1 Year Plan -$14.95 </option>
                                                                <option value="6850">Universal Microchip Gold 5 Year Plan -$49.95 </option>
                                                                <option value="6851">Universal Microchip Gold Lifetime Plan -$69.95 </option>
                                                                <option value="6855">Universal Microchip Platinum 1 Year Plan -$24.95 </option>
                                                                <option value="6853">Universal Microchip Platinum 5 Year Plan -$79.95 </option>
                                                                <option value="6854">Universal Microchip Platinum Lifetime Plan -$129.95 </option>
                                                            </select>
                                                        </div>
                                                    </div>    
                                                        <div class="field-wrap two-fields-wrap">
                                                            <div class="field-div">
                                                                <label>*Pet Image:</label>
                                                                <img id="blah" src="#" alt="your image" />
                                                            </div>
                                                            <div class="field-div">
                                                                <label class="auto-height"><?php __('Upload Pet Image)', 'cvf-upload'); ?></label>
                                                                <label>*Upload Pet Image</label>
                                                             
                                                                 <input type = "file" name = "feature[]" accept = "image/*" class = "files-data form-control petdata" id="imgInp" multiple />

                                                            </div>
                                                        </div>  
                                                        <div class="field-wrap two-fields-wrap">
                                                            <div class="field-div">
                                                                <label>Primary Breed: </label>
                                                                <input type="text" name="primary_breed[]" placeholder="Enter Primary Breed" class="petdata fpet" />
                                                            </div>
                                                            <div class="field-div">
                                                                <label>Secondary Breed: </label>
                                                                <input type="text" name="secondary_breed[]" placeholder="Enter Secondary Breed" class="petdata fpet" />
                                                            </div>
                                                        </div>
                                                        <div class="field-wrap two-fields-wrap">
                                                            <div class="field-div">
                                                                <label>Primary Color: </label>
                                                                <input type="text" name="primary_color[]" placeholder="Enter Primary Color" class="petdata fpet" />
                                                            </div>
                                                            <div class="field-div">
                                                                <label>Secondary Color(s):</label>
                                                                <input type="text" name="secondary_color[]" placeholder="Enter Secondary Color(s)" class="petdata fpet" />
                                                            </div>
                                                        </div>
                                                        <div class="field-wrap two-fields-wrap">
                                                            <div class="field-div">
                                                                <label>Size: </label>
                                                                <input type="text" name="Size[]" placeholder="Address line 1" class="petdata fpet" />
                                                            </div>
                                                            <div class="field-div">
                                                                <label>Pet Date of Birth: (optional)</label>
                                                               <input type="text" name="pet_date_of_birth[]" placeholder="mm/dd/yy" class="input-10 input petdata fpet">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="field-wrap two-fields-wrap">
                                                    <div class="field-div">
                                                        <div class="field-wrap two-fields-wrap">
                                                            <div class="field-div">
                                                                <p><a href="#" class='addsection btn btn-default'>Add Another Pet</a></p></div>
                                                            <div class="field-div">&nbsp;</div>
                                                        </div>
                                                    </div>
                                                    <div class="field-div">
                                                        <div class="field-wrap two-fields-wrap">
                                                            <div class="field-div">&nbsp;</div>
                                                            <div class="field-div">
                                                                 <button class="btn btn-default"type="submit">Purchese Plan for $7.50</button> -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="acc-blue-box">
                                    <div class="acc-blue-head">
                                        Owner Information 1
                                        <div class="acc-edit engrave-edit">
                                            <i class="fa fa-cog"></i> EDIT
                                        </div>
                                    </div>
                                    <div class="acc-blue-content">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <strong id="">Home Phone: </strong></br>
                                                <strong id=" ">Cell Phone Number: </strong></br>
                                                <strong id="Insurance">Full Name: </strong></br>
                                                <strong id="Insurance">Address: </strong></br>
                                                <strong id="Insurance">Primary Contact Email: </strong></br>
                                                <strong id="Insurance">Secondary Contact Name: </strong></br>
                                                <strong id="Insurance">Secondary Contact Phone Number: </strong></br>   
                                                <strong id="Insurance">Secondary Contact Email: </strong></br>  
                                            </div>
                                            <div class="col-sm-12">
                                                <div id="Informations">
                                                    <div class="Information">
                                                        <h4 class="step-acc-head">Pet Information: </h4>
                                                        <strong>Microchip Number: </strong><span id="MicNum" class="microchip-number"></span></br>   

                                                        <strong>Pet Name: </strong><span id="PetNam" class="pet-name"></span></br>   

                                                        <strong>Gender: </strong><span id="PetGn" class="gender"></span></br>  

                                                        <strong>Protection Plan: </strong><span id="PetPrPln" class="protection-plan"></span></br>  
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </div> 
                        <button class="btn btn-default" type="submit">Purchese All</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>
<?php get_footer(); ?>
<script type="text/javascript">
    jQuery(document).ready(function ($) {
        //datepicker
        $("#pet-dob").datepicker({
            onSelect: function () {
                var Pdb = $(this).datepicker('getDate');
                $("#ptdob").text(Pdb);
            }
        });

//for keyup for perview

        //       $("#MicroNum").keyup(function(){
        //  var MicroNum = $(this).val();
        //  $("#MicNum").text(MicroNum);
        // });
        //       $("#PetNm").keyup(function(){
        //  var PetNm = $(this).val();
        //  $("#PetNam").text(PetNm);
        // });

        //       $("#PetGen").change(function(){
        //  var PetGen = $(this).val();
        //  $("#PetGn").text(PetGen);
        // });

        //       $("#UniMicPln").change(function() {
        //     var UniMicPln = $(this).val();
        //  $("#PetPrPln").text(UniMicPln);
        //   });
       
//define counter
        var template = $('#sections .section:first').clone();
        var Info = $('#Informations .Information:first').clone();

        //increment
        var sectionsCount = 0;
        //add new section
         $(document).find("body").on('click', '.addsection', function() {
            console.log('sdsds');
      
            sectionsCount++;
            window.formdata = [];
            //for preview section

            Info = Info.clone().find('span').each(function () {
                // var INFOId = this.id + sectionsCount;
                var INFOId = this.id + sectionsCount;
                this.id = INFOId;

            }).end().appendTo("#Informations");

            var InfoSection = $('#Informations').children().last();
            // console.log('latsection'+lastSection);
            InfoSection.attr('class', 'Information' + sectionsCount);
            //for image
            template = template.clone().find('img').each(function () {
                var imgnewId = 'blah' + sectionsCount;
                this.id = imgnewId;
            }).end();
            //loop through each input
            var section = template.clone().find(':input').each(function () {
                 var newId = this.id + sectionsCount;
               // $(this).prev().attr('for', newId);
                this.id = newId;
               
            }).end().appendTo('#sections');
            
            var lastSection = $('#sections').children().last();
            // console.log('latsection'+lastSection);
            lastSection.attr('id', 'SecId' + sectionsCount);

            //for multiple datapicker
            $("#pet-dob"+sectionsCount).datepicker({
                onSelect: function () {
                    var Pdb = $(this).datepicker('getDate');
                    $("#ptdob" + sectionsCount).text(Pdb);
                }
            });

            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        $('#blah'+sectionsCount).attr('src', e.target.result);
                    }
                    reader.readAsDataURL(input.files[0]);
                }
            }
            $("#imgInp"+sectionsCount).change(function () {
                readURL(this);
            });

              $('#imgInp'+sectionsCount).change(function(e){
                     var fileName = e.target.files[0].name;
                       $("imgnm"+sectionsCount).attr('value',fileName);
                        
                       });

            return false;
        });



        $('#RegBrndMicrochip').on('submit', function (e) {
           e.preventDefault();
            /*var fd = new FormData();
            var files_data = $('#RegBrndMicrochip .files-data');

             var BrndMichip = $('#BrndMichip').attr('name');
          // $('#BrndMichip').attr('name','formdata[0]["'+BrndMichip+'"]');

                                
            $.each($('#RegBrndMicrochip .petdata'), function () {
                console.log($(this).attr('name')+'tttttt'+$(this).val());
                fd.append($(this).attr('name'), $(this).val());
             });

             $.each($('#RegBrndMicrochip .petdata1'), function () {
                   //$(this).removeClass('petdata');
                var tem = ($(this).attr('name'));
                 $(this).attr('name','formdata[0]["'+tem+'"]');
                fd.append($(this).attr('name'), $(this).val());
            });*/

            // $.each($(files_data), function(i, obj) {
            //     $.each(obj.files,function(j,file){
            //         console.log('files[' + j + ']'+file);
            //         fd.append('files[' + j + ']', file);
            //     })
            // });
           
            
            // fd.append('action', 'Create_mul_Pet_profile');
            $.ajax({
                     type: 'POST',
                     url: ajaxurl,
                     data: new FormData(this),
                     contentType: false,
                     processData: false,
                     success: function(response) {
                            console.log(response);// Append Server Response
                        }
            }); 
//USER CREATE
        // var usfd = new FormData();
        // $.each($('#RegBrndMicrochip .user-data'), function () {
        //     console.log($(this).attr('name')+'ssssssss'+$(this).val());
        //     usfd.append($(this).attr('name'), $(this).val());
        // });
        // usfd.append('action', 'Multicustomer');
        // //if($('#RegBrndMicrochip #s-email').val() != ""){
        // $.ajax({
        //  type: 'POST',
        //  url: ajaxurl,
        //  data: usfd,
        //  contentType: false,
        //  processData: false,
        //  success: function(response) {
        //         alert(response);// Append Server Response
        //     }
        // }); 

    });
    $("body").on('change','.change-pet-cont',function(){
        var val     = $(this).val();    
        var div     = $(this).parent().parent().parent();
        var divNum  = div.index();
        if ($(this).hasClass('microchip-number')) {
            if (divNum == 0) {
                $(".Information .microchip-number").text(val);
            }else{
                $(".Information"+divNum+" .microchip-number").text(val);
            }
        }else if ($(this).hasClass('pet-name')) {
            if (divNum == 0) {
                $(".Information .pet-name").text(val);
            }else{
                $(".Information"+divNum+" .pet-name").text(val);
            }
        }else if ($(this).hasClass('gender')) {
            if (divNum == 0) {
                $(".Information .gender").text(val);
            }else{
                $(".Information"+divNum+" .gender").text(val);
            }
        }else if ($(this).hasClass('protection-plan')) {

            if (divNum == 0) {
                $(".Information .protection-plan").text($(this).find('option:selected').text());
            }else{
                $(".Information"+divNum+" .protection-plan").text($(this).find('option:selected').text());
            }
        }
    });
});    
</script>
<script type="text/javascript">
    jQuery(document).ready(function ($) {
        $checkPhone = 0;
        $checkEmail = 0;
        $checkPost  = 0;
        var error        = 0;
        var error2       = 0;
        var checkerrori  = 0;
        var checkerrors  = 0;
        var mainDiv  = $('.site-tabs-wrap.main-div').clone(true);
        var template = $('.sections .section:first').clone();
        var Info     = $('#Informations .Information:first').clone();
        var today    = new Date();
        //datepicker
        var today = new Date();
        $("input[name='pet_date_of_birth']").datepicker({
            dateFormat : "mm/dd/yy",
            endDate: "today",
            maxDate: today,
            changeMonth: true,
            changeYear: true,
            onSelect: function () {
                var Pdb = $(this).datepicker('getDate');
                $("#ptdob").text(Pdb);
            }
        });

      /*  jQuery("input[name='primary_home_number']").inputFilter(function(value) {
            return /^\d*$/.test(value);
        });

        jQuery("input[name='primary_cell_number']").inputFilter(function(value) {
            return /^\d*$/.test(value);
        });
        
        jQuery("input[name='microchip_id_number']").inputFilter(function(value) {
            return /^\d*$/.test(value);
        });

        jQuery("input[name='ReMicroChipNum']").inputFilter(function(value) {
            return /^\d*$/.test(value);
        });*/


       $(document).find('body').on('click', '.addsection1', function () {
        alert();
            var parentLength = $(this).parents(".contact-form.sec-cont-info").find(".sections .section").length+1;
            var sectionTotal = 0;
            var total        = 0;
            template.clone().find('span.pet-num').text(parentLength).end().appendTo($(this).parents(".contact-form.sec-cont-info").find(".sections"));
            $(this).parents(".contact-form.sec-cont-info").find(".sections .section").each(function(){
                sectionTotal += parseFloat($(this).find(".protection-plan option:selected").attr("price"));
            });

            $(this).parents(".contact-form.sec-cont-info").find("button.section-total").text("Purchase Plans for $"+sectionTotal.toFixed(2));
            $("form").find(".section").each(function(){
                total += parseFloat($(this).find(".protection-plan option:selected").attr("price"));
            });
            $("#total-count").text(total.toFixed(2));
        });

        $('body').on('click','.owner-remove',function(){
            var total = 0;

            $(this).parents(".main-div").remove();
            $("form").find(".section").each(function(){
                total += parseFloat($(this).find(".protection-plan option:selected").attr("price"));
            });
            $("#total-count").text(total.toFixed(2));
            if ($(".site-tabs-wrap.main-div").length == 1) {
                return false;
            }
            $(".site-tabs-wrap.main-div:last-child").find('.acc-blue-head').append('<div class="acc-edit owner-edit owner-remove"><i class="fa fa-trash"></i> Remove</div>');
        });

        $("body").on('click','.add-pet-owner',function(){
            $(".site-tabs-wrap.main-div:last-child").find(".acc-edit.owner-edit").remove();
            var total     = 0;
            var divLength = $(".site-tabs-wrap.main-div").length+1;
            var div       = mainDiv.clone().find('.acc-blue-box').each(function(){
                $(this).find('.acc-blue-head').append('<div class="acc-edit owner-edit owner-remove"><i class="fa fa-trash"></i> Remove</div>');
                $(this).find('span.owner-number').text(divLength);
                $(this).find('input[name=existingUser]').attr("name","existingUser-"+divLength);
            }).end();

            div = div.clone().find(".phone-number").each(function(i, input){
                var $this = this;
                var main = $(this).parent().parent();
                main.find(".iti--separate-dial-code").remove();
                main.append($this);
                console.log(main.html());
            }).end();


            div = div.clone().find(".phone-number").each(function(i, input){
                var init = window.intlTelInput(input,{
                    separateDialCode: true,
                });

                input.addEventListener("countrychange", function() {
                    var countryCode = init.getSelectedCountryData();
                    var name = $(input).attr("name")+"_code";
                    console.log(name);
                    $(input).parent().parent().find("input[name="+name+"]").val(countryCode.iso2);
                });
            }).end();

            var today = new Date();
            var newDiv = $("#RegBrndMicrochip").append(div);
            newDiv.find("input[name='pet_date_of_birth']").datepicker({
                dateFormat : "mm/dd/yy",
                endDate: "today",
                maxDate: today,
                changeMonth: true,
                changeYear: true,
                onSelect: function () {
                    var Pdb = $(this).datepicker('getDate');
                    $("#ptdob").text(Pdb);
                }
            });
            enableAutocomplete(newDiv.find('input.live-search-input:last-child'));
            $("form").find(".section").each(function(){
                total += parseFloat($(this).find(".protection-plan option:selected").attr("price"));
            });
            $("#total-count").text(total.toFixed(2));
        });

        $("body").on('change','select[name=universalchipPln]',function(){
            var parentLength = $(this).parents(".contact-form.sec-cont-info").find(".sections .section").length+1;
            var sectionTotal = 0;
            var total        = 0;
    
            $(this).parents(".contact-form.sec-cont-info").find(".sections .section").each(function(){
                sectionTotal += parseFloat($(this).find(".protection-plan option:selected").attr("price"));
            });

            console.log(sectionTotal);

            $(this).parents(".contact-form.sec-cont-info").find("button.section-total").text("Purchase Plans for $"+sectionTotal.toFixed(2));
            $("form").find(".section").each(function(){
                total += parseFloat($(this).find(".protection-plan option:selected").attr("price"));
            });
            $("#total-count").text(total.toFixed(2));
            console.log(total);
        });

        $("body").on('change','.change-pet-cont',function(){
            var val     = $(this).val();    
            var div     = $(this).parent().parent().parent();
            var divNum  = div.index();
            if ($(this).hasClass('microchip-number')) {
                if (divNum == 0) {
                    $(".Information .microchip-number").text(val);
                }else{
                    $(".Information"+divNum+" .microchip-number").text(val);
                }
            }else if ($(this).hasClass('pet-name')) {
                if (divNum == 0) {
                    $(".Information .pet-name").text(val);
                }else{
                    $(".Information"+divNum+" .pet-name").text(val);
                }
            }else if ($(this).hasClass('gender')) {
                if (divNum == 0) {
                    $(".Information .gender").text(val);
                }else{
                    $(".Information"+divNum+" .gender").text(val);
                }
            }else if ($(this).hasClass('protection-plan')) {

                if (divNum == 0) {
                    console.log($(this).find('option:selected').attr('price'));
                    $('#pln').text("Purchase Plan for "+$(this).find('option:selected').attr('price'));
                    $(".Information .protection-plan").text($(this).find('option:selected').text());
                }else{
                    $('#pln'+divNum).text("Purchase Plan for "+$(this).find('option:selected').attr('price'));
                    $(".Information"+divNum+" .protection-plan").text($(this).find('option:selected').text());
                }
            }
        });

        $('.save-all').on('click',function(){
            $('#RegBrndMicrochip').submit();
        });



        /*Start validation*/

        $("body").on("change","input.rq",function(i){
            $(this).parent().find("p.error-p").remove();
            $(this).parent().find("p.error-main").remove();
            if ($(this).val() == "") {
                $(this).after("<p class='error-p error-form'>This field is required!</p>");
            }else if($(this).hasClass('check-validate-phone')){
                if ($(this).val().length == 10) {
                    $(this).parent().find("p.error-p").remove();
                }else{
                    $(this).after("<p class='error-p error-form'>Required 10 digit phone number.</p>");
                }
            }else if ($(this).hasClass('check-validate-email')) {
                if (!validateEmail($(this).val())) {
                    $(this).after("<p class='error-p error-form'>Invalid Email Address.</p>");
                }
            }else if ($(this).hasClass('serial-number-check')) {
                var serialNumber = $(this).val();
                $thisSerial      = $(this);
                var doubleCheck  = $(this).parent().parent().find("input.serial-number-check-double").val();
                var check        = 0;
                $thisSerial.parent().find("p.error-p").remove();
                $thisSerial.parent().find("p.error-main").remove();

                $("input.serial-number-check").each(function(){
                    if (serialNumber == $(this).val()) {
                        check++;
                    }
                });

                if (check > 1) {
                    $thisSerial.after("<p class='error-main error-form'>This Microchip Number already used in another form. Please check it.</p>");
                    error = 1;
                    return;
                }else{
                    error = 0;
                }

                if (serialNumber != "") {
                    if (serialNumber.length >= 10 && serialNumber.length <= 15) {
                        $.ajax({
                            type: 'POST',
                            url: ajaxurl,
                            data: {"action":"checkUniversalMicrochipId","universalMicrochipID":serialNumber},
                            success: function(rs) {
                                console.log($.trim(rs));
                                if ($.trim(rs) == "false") {
                                    error = 1;  
                                    console.log("false");
                                    $thisSerial.after("<p class='error-main error-form'>This Microchip Number has already register.</p>");
                                }else{
                                    $thisSerial.parent().find("p.error-main").remove();
                                    error = 0;
                                    var secondSerial = $thisSerial.parent().parent().find("input.serial-number-check-double").val();
                                    $thisDoubleNumb  = $thisSerial.parent().parent().find("input.serial-number-check-double");
                                    $thisDoubleNumb.parent().find("p.error-main").remove();
                                    if (serialNumber != secondSerial && secondSerial != '') {
                                        $thisDoubleNumb.after("<p class='error-main error-form'>Microchip Number and Re-enter Microchip Number are not matching.</p>");
                                        error = 1;
                                        return;
                                    }
                                }
                            }
                        });
                    }else{
                        $thisSerial.after("<p class='error-main error-form'>Microchip Number is invalid. Only 10 to 15 characters number will be acceptable.</p>");
                        error = 1;
                    }
                }else{
                    error = 1;
                }
            }
            if ($(this).hasClass('serial-number-check-double')) {
                var serialNumber = $(this).val();
                $thisDoubleNumb  = $(this);
                var doubleCheck  = $(this).parent().parent().find("input.serial-number-check").val();
                $thisDoubleNumb.parent().find("p.error-p").remove();
                $thisDoubleNumb.parent().find("p.error-main").remove();
                if (doubleCheck != "") {
                    if (doubleCheck != serialNumber) {
                        $thisDoubleNumb.after("<p class='error-main error-form'>Microchip Number and Re-enter Microchip Number are not matching.</p>");
                        error = 1;
                        return;
                    }else{
                        $thisDoubleNumb.parent().find("p.error-main").remove();
                        error = 0;
                    }
                }else{
                    error = 1;
                }
            }
        });

        $("body").on("change","select.rq",function(i){
            $(this).parent().find("p.error-p").remove();
            $(this).parent().find("p.error-p").remove();
            if ($(this).val() == "") {
                $(this).after("<p class='error-p error-form'>This field is required!</p>");
            }
        });

        function readUrlForMultipleForm(input,src) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
            
                reader.onload = function (e) {
                    src.attr('src', e.target.result);
                }
            
                reader.readAsDataURL(input.files[0]);
            }else{
                src.attr('src', "<?php echo get_site_url(); ?>/wp-content/uploads/2019/02/pet-image.jpg");
            }
        }

        $("body").on("change","input[type='file']",function(){
            readUrlForMultipleForm(this,$(this).parent().parent().find("img"));
        });


        $("body").on("change","input.check-validate-phone",function(){
            var phone = $(this).val();
            $thisPhon = $(this);
            var check = 0;
            $thisPhon.parent().find("p.error-p").remove();
            $thisPhon.parent().find("p.error-main").remove();


            $("input.check-validate-phone").each(function(){
                if ($(this).val().length != 10) {
                    $(this).after("<p class='error-p error-form'>Required 10 digit phone number.</p>");
                }else if (phone == $(this).val()) {
                    check++;
                }
            });

            if (check > 1) {
                $thisPhon.after("<p class='error-main error-form'>This phone number already used in another form. Please check it.</p>");
                error = 1;
                return;
            }else{
                error = 0;
            }

            if (phone.length == 10) {
                var ownerId = $(this).next("input[name=registerOwnerId]").val();
                $.ajax({
                    type: 'POST',
                    url: ajaxurl,
                    data: {"action":"checkUserPhoneExist","primary_phone_number":phone,"ownerId":ownerId},
                    success: function(rs) {
                        rs = jQuery.parseJSON(rs);
                        if (rs.success == 1) {
                            error = 1;
                            $thisPhon.after("<p class='error-main error-form'>This phone number already exist.</p>");
                        }else{
                            error = 0;
                            $thisPhon.parent().find("p.error-main").remove();
                        }
                    }
                });
            }
        });  

        $("body").on("change","input.check-validate-email",function(){
            var email = $(this).val();
            $thisemail= $(this);
            var check = 0;
            $thisemail.parent().find("p.error-p").remove();
            $thisemail.parent().find("p.error-main").remove();

            $("input.check-validate-email").each(function(){
                if (email == $(this).val()) {
                    check++;
                }
            });

            if (check > 1) {
                $thisemail.after("<p class='error-main error-form'>This email already used in another form. Please check it.</p>");
                error = 1;
                return;
            }else{
                error = 0;
            }

            if (validateEmail(email)) {
                $.ajax({
                    type: 'POST',
                    url: ajaxurl,
                    data: {"action":"checkUserExist","p_email":email},
                    success: function(rs) {
                        rs = jQuery.parseJSON(rs);
                        if (rs.success == 0) {
                            error = 1;
                            $thisemail.after("<p class='error-main error-form'>This email already exist.</p>");
                        }else{
                            $thisemail.parent().find("p.error-main").remove();
                            error = 0;
                        }
                    }
                });
            }else if(email != ""){
                $thisemail.after("<p class='error-main error-form'>Invalid Email Address.</p>");
                error = 1;
            }
        });


        $('body').on("change","input.check-phone",function(){
            var secPhone = $(this).val();
            if (secPhone != '') {
                if (secPhone.length == 10) {
                    $(this).parent().find("p.error-p").remove();
                }else{
                    $(this).parent().find("p.error-p").remove();
                    $(this).after("<p class='error-p error-form'>Required 10 digit phone number.</p>");
                    checkError = 1;
                }
            }
        });

        $('body').on("change","input.check-email",function(){
            var secEmail = $(this).val();
            if (secEmail != '') {
                if (validateEmail(secEmail)) {
                    $(this).parent().find("p.error-p").remove();
                }else{
                    $(this).parent().find("p.error-p").remove();
                    $(this).after("<p class='error-p'>Invalid Email Address.</p>");
                    checkError = 1;
                }
            }
        });

        $('body').on("change","input[name=primary_postcode]",function(){
            var postcode = $(this).val();
            if (postcode != '') {
                if (postcode.length == 5) {
                    $(this).parent().find("p.error-p").remove();
                }else{
                    $(this).parent().find("p.error-p").remove();
                    $(this).after("<p class='error-p error-form'>Required only 5 digit zip code</p>");
                    checkError = 1;
                }
            }
        }); 

        $('body').on('change', 'input[type=file]', function(){
            $(this).parent().find("p.error-p").remove();
            var fileSize = $(this)[0].files[0].size;
            var fileType = $(this)[0].files[0].type;
            if (fileSize > 0) {
                if(fileSize > 2000000) {
                    checkError = 1;
                    $(this).after("<p class='error-p error-form'>File size is greater than 2MB.</p>");
                }else{
                    checkError = 1;
                    var ext = $(this).val().split('.').pop().toLowerCase();
                    if($.inArray(ext, ['gif','png','jpg','jpeg']) == -1) {
                        $(this).after("<p class='error-p error-form'>Uploaded file is not a valid image. Only JPG, PNG, JPEG and GIF files are allowed.</p>");
                    }
                }
            }
        })

        /*End validation*/

        

        $('#RegBrndMicrochip').on('submit', function (e) {
            e.preventDefault();

            /*Errer check */

            var checkError = 0;
            $("body").find("input.rq").each(function(i){
                $(this).parent().find("p.error-p").remove();
                if ($(this).val() == "") {
                    $(this).after("<p class='error-p error-form'>This field is required!</p>");
                    checkError = 1;
                }else if($(this).hasClass('check-validate-phone')){
                    if ($(this).val().length == 10) {
                        $(this).parent().find("p.error-p").remove();
                    }else{
                        $(this).after("<p class='error-p error-form'>Required 10 digit phone number.</p>");
                        checkError = 1;
                    }
                }else if ($(this).hasClass('check-validate-email')) {
                    if (!validateEmail($(this).val())) {
                        $(this).after("<p class='error-p error-form'>Invalid Email Address.</p>");
                        checkError = 1;
                    }
                }
            });

            $('body').find('input[type=file]').each(function(){
                if ($(this).val() != "") {
                    $(this).parent().find("p.error-p").remove();
                    var fileSize = $(this)[0].files[0].size;
                    var fileType = $(this)[0].files[0].type;
                    if (fileSize > 0) {
                        if(fileSize > 2000000) {
                            checkError = 1;
                            $(this).after("<p class='error-p error-form'>File size is greater than 2MB.</p>");
                        }else{
                            checkError = 1;
                            var ext = $(this).val().split('.').pop().toLowerCase();
                            if($.inArray(ext, ['gif','png','jpg','jpeg']) == -1) {
                                $(this).after("<p class='error-p error-form'>Uploaded file is not a valid image. Only JPG, PNG, JPEG and GIF files are allowed.</p>");
                            }
                        }
                    }
                }
            })

            $("body").find("select.rq").each(function(i){
                $(this).parent().find("p.error-p").remove();
                if ($(this).val() == "") {
                    $(this).after("<p class='error-p error-form'>This field is required!</p>");
                    checkError = 1;
                }
            });

            $("#RegBrndMicrochip").find("input.check-phone").each(function(){
                var secPhone = $(this).val();
                if (secPhone != '') {
                    $checkPhone++;
                    if (secPhone.length == 10) {
                        $(this).parent().find("p.error-p").remove();
                    }else{
                        $(this).parent().find("p.error-p").remove();
                        $(this).after("<p class='error-p error-form'>Required 10 digit phone number.</p>");
                        checkError = 1;
                    }
                }
            });

            $("#RegBrndMicrochip").find("input.check-email").each(function(){
                var secEmail = $(this).val();
                if (secEmail != '') {
                    $checkEmail++;
                    if (validateEmail(secEmail)) {
                        $(this).parent().find("p.error-p").remove();
                    }else{
                        $(this).parent().find("p.error-p").remove();
                        $(this).after("<p class='error-p error-form'>Invalid Email Address.</p>");
                        checkError = 1;
                    }
                }
            })

            $("#RegBrndMicrochip").find("input[name=primary_postcode]").each(function(){
                var postcode = $(this).val();
                if (postcode != '') {
                    $checkPost++;
                    if (postcode.length == 5) {
                        $(this).parent().find("p.error-p").remove();
                    }else{
                        $(this).parent().find("p.error-p").remove();
                        $(this).after("<p class='error-p error-form'>Required only 5 digit zip code</p>");
                        checkError = 1;
                    }
                }
            });

            if (checkError) {
                error2 = 1;
            }else if (!error2) {
                error2 = 0;
            }

            if ($("body form").find(".error-form").length > 0) {
                if ($("body form").find(".error-form").length > 0) {
                    $('html, body').animate({
                        scrollTop: $("body form").find(".error-form").parent().offset().top
                    }, 200);
                }
                return false;
            }

            /*eND eRROR CHECK*/

            var data     = new FormData();
            var formData = $('#RegBrndMicrochip .main-div');

            if ($('#RegBrndMicrochip .main-div').length > 0 ) {
                formData.each(function(i,obj){
                    var files_data = $(this).find('.pet-image');
                    $(this).find('.pet-image').each(function(j, obj) {
                        $.each(obj.files,function(k,file){
                            data.append('profile_images['+i+']['+j+']', file);
                        })
                    });
                    
                    $(this).find('.user-data').each(function(j){
                        data.append("users_info["+i+"]["+$(this).attr('name')+"]", $(this).val());
                    });

                    $(this).find('.sections .section').each(function(j){
                        $(this).find(".pet-data").each(function(k){
                            data.append("pets_info["+i+"]["+j+"]["+$(this).attr('name')+"]", $(this).val());
                        })
                    });
                });
            }/*else{
                $("#RegBrndMicrochip div.main-div").find('.user-data').each(function(i){
                    data.append("users_info["+$(this).attr('name')+"]", $(this).val());
                });

                $("#RegBrndMicrochip div.main-div").find('.sections .section').each(function(i){
                    $(this).find(".pet-data").each(function(j){
                        data.append("pet_info["+i+"]["+$(this).attr('name')+"]", $(this).val());
                    })
                });

                $("#RegBrndMicrochip div.main-div").find('.sections .section').each(function(i,){
                    $(this).find(".pet-image").each(function(j,obj){
                        $.each(obj.files,function(k,file){
                            data.append("profile_image["+i+"]", file);
                        })
                    })
                });
                console.log(data);
            }*/
            data.append('action','multiCustomerPetPro');

            $.ajax({
                type: 'POST',
                url: ajaxurl,
                data: data,
                contentType: false,
                processData: false,
                success: function(response) {
                    var Obj = JSON.parse(response);
                    window.location = "<?php echo site_url(); ?>"+Obj.url;
                }
            });   
        });
        enableAutocomplete($('input.live-search-input'));


        $("body").on("click","button.section-total",function(){
            var data = new FormData();

            $(this).parents("div.main-div").find('.user-data').each(function(i){
                data.append("user_info["+$(this).attr('name')+"]", $(this).val());
            });

            $(this).parents("div.main-div").find('.sections .section').each(function(i){
                $(this).find(".pet-data").each(function(j){
                    data.append("pet_info["+i+"]["+$(this).attr('name')+"]", $(this).val());
                })
            });

            $(this).parents("div.main-div").find('.sections .section').each(function(i,){
                $(this).find(".pet-image").each(function(j,obj){
                    $.each(obj.files,function(k,file){
                        data.append("profile_image["+i+"]", file);
                    })
                })
                
            });

            data.append('action','multiCustomerPetPro');

            $.ajax({
                type: 'POST',
                url: ajaxurl,
                data: data,
                contentType: false,
                processData: false,
                success: function(response) {
                    var Obj = JSON.parse(response);
                    window.location = "<?php echo site_url(); ?>"+Obj.url
                }
            }); 

        });
    });

    function enableAutocomplete(inputField) {
        $(inputField).autocomplete({
            source: function(request, response) {
                var repeat = "";
                $("body").find("input[name=registerOwnerId]").each(function(){
                    if ($(this).val() != 0) {
                        repeat += $(this).val()+",";
                    }
                })
                $.getJSON(ajaxurl,{ term:request.term, action:"userLiveSearch", notRepeat:repeat }, 
                    response
                );
            },
            // source: ajaxurl+"?action=userLiveSearch",
            minLength: 2,
            response: function( event, ui ) {
                if (ui.content.length > 0) {
                    $(this).parents('.contact-form').find(".user-data").prop("readonly",false);
                    $(this).parents('.contact-form').find("input[name=p_email]").prop("readonly",true);
                    $("button.save-all").prop("disabled",false);
                }else{
                    $(this).parents('.contact-form').find("input.user-data").val("");
                    $(this).parents('.contact-form').find("select[name=primary_country]").val("").trigger('change');
                    $(this).parents('.contact-form').find("p.error-p, p.error-main").remove();
                    $(this).parents('.contact-form').find(".user-data").prop("readonly",true);
                    $("button.save-all").prop("disabled",true);
                    $(this).parents('.contact-form').find("input[name=registerOwnerId]").val(0);
                }
            },
            select: function( event, ui ) {
                $parent = $(this).parents('.contact-form');
                $(this).parents('.contact-form').find("input[name=registerOwnerId]").val(ui.item.ID);
                if (ui.item.userMeta.first_name != "undefined" && ui.item.userMeta.first_name !== null && ui.item.userMeta.first_name != undefined) {
                    var check = ui.item.userMeta.first_name[0];
                    if (check != "undefined" && check !== null && check != undefined ) {
                        $parent.find("input[name=first_name]").val(check);
                    }
                }

                if (ui.item.userMeta.last_name != "undefined" && ui.item.userMeta.last_name !== null && ui.item.userMeta.last_name != undefined) {
                    var check = ui.item.userMeta.last_name[0];
                    if (check != "undefined" && check !== null && check != undefined) {
                        $parent.find("input[name=last_name]").val(check);
                    }
                }

                if (ui.item.userMeta.primary_home_number != "undefined" && ui.item.userMeta.primary_home_number !== null && ui.item.userMeta.primary_home_number != undefined) {
                    var check = ui.item.userMeta.primary_home_number[0];
                    if (check != "undefined" && check !== null && check != undefined) {
                        $parent.find("input[name=primary_home_number]").val(check);
                    }

                    if (ui.item.userMeta.primary_phone_country_code != "undefined" && ui.item.userMeta.primary_phone_country_code !== null && ui.item.userMeta.primary_phone_country_code != undefined) {

                        var check = ui.item.userMeta.primary_phone_country_code[0];
                        if (check != "undefined" && check !== null && check != undefined && check != "") {
                            $parent.find("input[name=primary_home_number_code]").val(check);
                            var input = $parent.find("input[name=primary_home_number]")[0];

                            var main = $(input).parent().parent();
                            main.find(".iti--separate-dial-code").remove();
                            main.append(input);
                            var init = window.intlTelInput(input,{
                                separateDialCode: true,
                            });

                            if(check){
                                init.setCountry(check);
                            }
                        }

                    }
                }

                if (ui.item.data.user_email != "undefined" && ui.item.data.user_email !== null && ui.item.data.user_email != undefined) {
                    var check = ui.item.data.user_email;
                    if (check != "undefined" && check !== null && check != undefined) {
                        $parent.find("input[name=p_email]").val(check);
                    }
                }

                if (ui.item.userMeta.primary_country != "undefined" && ui.item.userMeta.primary_country !== null && ui.item.userMeta.primary_country != undefined) {
                    var check = ui.item.userMeta.primary_country[0];
                    if (check != "undefined" && check !== null && check != undefined) {
                        $(this).parents('.contact-form').find("select[name=primary_country]").val(check).trigger('change');
                    }
                }

                $parent = $(this).parents('.contact-form');

                if (ui.item.userMeta.primary_address_line1 != "undefined" && ui.item.userMeta.primary_address_line1 !== null && ui.item.userMeta.primary_address_line1 != undefined) {
                    var check = ui.item.userMeta.primary_address_line1[0];
                    if (check != "undefined" && check !== null && check != undefined) {
                        $parent.find("input[name=primary_address_line1]").val(check);
                    }
                }

                if (ui.item.userMeta.primary_state != "undefined" && ui.item.userMeta.primary_state !== null && ui.item.userMeta.primary_state != undefined) {
                    var check = ui.item.userMeta.primary_state[0];
                    if (check != "undefined" && check !== null && check != undefined ) {
                        $parent.find("[name=primary_state]").val(check);
                    }
                }

                if (ui.item.userMeta.primary_address_line2 != "undefined" && ui.item.userMeta.primary_address_line2 !== null && ui.item.userMeta.primary_address_line2 != undefined) {
                    var check = ui.item.userMeta.primary_address_line2[0];
                    if (check != "undefined" && check !== null && check != undefined ) {
                        $parent.find("input[name=primary_address_line2]").val(check);
                    }
                }

                if (ui.item.userMeta.primary_city != "undefined" && ui.item.userMeta.primary_city !== null && ui.item.userMeta.primary_city != undefined) {
                    var check = ui.item.userMeta.primary_city[0];
                    if (check != "undefined" && check !== null && check != undefined) {
                        $parent.find("input[name=primary_city]").val(check);
                    }
                }

                if (ui.item.userMeta.primary_postcode != "undefined" && ui.item.userMeta.primary_postcode !== null && ui.item.userMeta.primary_postcode != undefined) {
                    var check = ui.item.userMeta.primary_postcode[0];
                    if (check != "undefined" && check !== null && check != undefined) {
                        $parent.find("input[name=primary_postcode]").val(check);
                    }
                }

                if (ui.item.userMeta.secondary_first_name != "undefined" && ui.item.userMeta.secondary_first_name !== null && ui.item.userMeta.secondary_first_name != undefined) {
                    var check = ui.item.userMeta.secondary_first_name[0];
                    if (check != "undefined" && check !== null && check != undefined) {
                        $parent.find("input[name=secondary_first_name]").val(check);
                    }
                }

                if (ui.item.userMeta.secondary_email != "undefined" && ui.item.userMeta.secondary_email !== null && ui.item.userMeta.secondary_email != undefined) {
                    var check = ui.item.userMeta.secondary_email[0];
                    if (check != "undefined" && check !== null && check != undefined ) {
                        $parent.find("[name=secondary_email]").val(check);
                    }
                }

                if (ui.item.userMeta.primary_cell_number != "undefined" && ui.item.userMeta.primary_cell_number !== null && ui.item.userMeta.primary_cell_number != undefined) {
                    var check = ui.item.userMeta.primary_cell_number[0];
                    if (check != "undefined" && check !== null && check != undefined) {
                        $parent.find("[name=primary_cell_number]").val(check);
                    }

                    if (ui.item.userMeta.primary_cell_country_code != "undefined" && ui.item.userMeta.primary_cell_country_code !== null && ui.item.userMeta.primary_cell_country_code != undefined) {

                        var check = ui.item.userMeta.primary_cell_country_code[0];
                        if (check != "undefined" && check !== null && check != undefined && check != "") {
                            $parent.find("input[name=primary_cell_number_code]").val(check);
                            var input = $parent.find("input[name=primary_cell_number]")[0];
                            
                            var main = $(input).parent().parent();
                            main.find(".iti--separate-dial-code").remove();
                            main.append(input);
                            var init = window.intlTelInput(input,{
                                separateDialCode: true,
                            });

                            if(check){
                                init.setCountry(check);
                            }
                        }

                    }
                }
            }
        });
    }

    $("body").on("change","input.existingUser",function(){
        if ($(this).val() == 1) {
            $(this).parent().parent().parent().find("div.field-wrap .user-data").prop("readonly",true);
            $(this).parent().parent().parent().find("div.field-wrap .user-data").val("");
            $(this).parent().parent().parent().find("div.field-wrap .user-data").next("p").remove();
            $(this).parent().parent().find("div.custom-live-search").show();
            $("button.save-all").prop("disabled",true);
            $(this).parents('.contact-form').find("input[name=registerOwnerId]").val(0);
        }else{
            $("#userEmailText").val("");
            $(this).parent().parent().parent().find("div.field-wrap .user-data").prop("readonly",false);
            $(this).parent().parent().parent().find("div.field-wrap .user-data").val("");
            $(this).parent().parent().parent().find("div.field-wrap .user-data").next("p").remove();
            $(this).parent().parent().find("div.custom-live-search").hide();
            $("button.save-all").prop("disabled",false);
            $(this).parents('.contact-form').find("input[name=registerOwnerId]").val(0);
            $(this).parents('.contact-form').find("input.live-search-input").val("");
        }
    });
    
</script>