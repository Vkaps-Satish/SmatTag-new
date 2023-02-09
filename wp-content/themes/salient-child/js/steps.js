/**
 * @name Multi-step form - WIP
 * @description Prototype for basic multi-step form
 * @deps jQuery, jQuery Validate
 */
jQuery.validator.addMethod("checkSize", function (value, element) {
    if (value != "") {
        var size = element.files[0].size;
        if (size > 2*1000000){ return false; } else { return true;}
    }else{ return true;}

    }, "File must be less then 2MB");


jQuery.validator.addMethod("checkSpecialCharate", function (value, element) {
    var regExp = /[a-z]/i;
        if (regExp.test(value)) {
            return false;
        }
            return true;

},"Please enter Only Number.");



jQuery.validator.addMethod("restric", function (value, element) {
    var length = value.length;
        if (length != 14) {
            return false;
        }
            return true;

},"Please enter 10 digit Number.");

/*---------------------------------validation method for microchip id---------------------------------------*/ 
var validMessage;
jQuery.validator.addMethod("validMicrochip", function(value, element) {
    
    var regex = /^[0-9\s]*$/;
    if(!regex.test(value)){
        validMessage = "Please enter only digits";
        return false;
    }

    var microchip_id = value.replace(/\s/g, '');
    if(microchip_id.length != 15){
        validMessage = "Microchip Id should be 15 digits";
        return false;
    }
    
    return true;
   
},function() { return validMessage; });

/*-------------------------------custom rule for validate smarttag id tag------------------------------*/ 
var validIdTagMessage;
jQuery.validator.addMethod("validIdTag", function(value, element) {

  var regex = /^[0-9\s]*$/;
  if(!regex.test(value)){
      validIdTagMessage = "Please enter only digits";
      return false;
  }

  var smartTag_id = value.replace(/\s/g, '');
  if(smartTag_id.length != 8){
    validIdTagMessage = "SmartTag Id should be 8 digits";
    return false;
  }

  return true;
   
},function() { return validIdTagMessage; });


/*-------------------------------custom rule for alllow Space Number------------------------------*/ 
jQuery.validator.addMethod("alllowSpaceAndNumber", function(value, element) {
    var isValid = false;
    var regex = /^[0-9\s]*$/;
    isValid = regex.test(value);
    return !isValid ? true : false;

},"Please enter Only Number.");

/*-------------------------------validation message------------------------------*/ 
var micro_validation_msg = "Microchip is invalid.";
var smarttag_validation_msg = "";

var app = {

    init: function() {
        this.cacheDOM();
        this.setupAria();
        this.nextButton();
        this.prevButton();
        this.validateForm();
        this.startOver();
        this.editForm();
        this.killEnterKey();
        this.handleStepClicks();
    },
    cacheDOM: function() {
        if (jQuery(".multi-step-form").length === 0) {
            return;
        }
        // jQuery(".multi-step-form").find("form#profileuser1").html();
        this.$formParent = jQuery(".multi-step-form");
        this.$form = this.$formParent.find("form#profileuser1");
        this.$formStepParents = this.$form.find("fieldset");
        this.$nextButton = this.$form.find(".btn-next");
        this.$prevButton = this.$form.find(".btn-prev");
        this.$editButton = this.$form.find(".btn-edit");
        this.$resetButton = this.$form.find("[type='reset']");

        this.$stepsParent = jQuery(".steps");
        this.$steps = this.$stepsParent.find("button");
    },

    htmlClasses: {
        activeClass: "active",
        hiddenClass: "hidden",
        visibleClass: "visible",
        editFormClass: "edit-form",
        animatedVisibleClass: "animated fadeIn",
        animatedHiddenClass: "animated fadeOut",
        animatingClass: "animating"
    },
    setupAria: function() {

        // set first parent to visible
        // this.$formStepParents.eq(0).attr("aria-hidden", false);

        // set all other parents to hidden
        this.$formStepParents.not(":first").attr("aria-hidden", true);

        // handle aria-expanded on next/prev buttons
        app.handleAriaExpanded();

    },

    nextButton: function() {
        this.$nextButton.on("click", function(e) {              
            e.preventDefault();
            // grab current step and next step parent
            var $this = jQuery(this),
                currentParent = $this.closest("fieldset"),
                nextParent = currentParent.next();
            if (app.checkForValidForm()) {
                if (jQuery(this).hasClass("custom-check-btn")) {
                    var smartTagID = jQuery('#smartTagID').val();
                    var secondarySmartTagID = jQuery('#secondarySmartTagID').val();
                    if (smartTagID == '' || secondarySmartTagID == '') {
                        jQuery('#smartTagID').parent().find('.error').remove();
                        jQuery('#smartTagID').parent().append('<div class="error">Serial number is not empty.</div>');
                    } else if (smartTagID == secondarySmartTagID) {
                        $.ajax({
                            url: '<?php echo get_site_url(); ?>/wp-admin/admin-ajax.php',
                            type: 'post',
                            data: {
                                'smartTagID': smartTagID,
                                'action': 'checkSmartTagIDValid'
                            },
                            success: function(res) {
                                console.log(res);
                                var result = jQuery.parseJSON(res);
                                // console.log(result.msg);
                                if (result.result == 1) {
                                    jQuery('#smartTagID').parent().find('.error').remove();
                                   // alert(nextParent);
                                    currentParent.removeClass(app.htmlClasses.visibleClass);
                                    app.showNextStep(currentParent, nextParent);
                                } else {
                                    jQuery('#smartTagID').parent().find('.error').remove();
                                    jQuery('#smartTagID').parent().append('<div class="error">' + result.msg + '</div>');
                                }
                            },
                        });
                    } else {
                        jQuery('#smartTagID').parent().find('.error').remove();
                        jQuery('#smartTagID').parent().append('<div class="error">Serial number not match.</div>');
                    }
                } else if (jQuery(this).hasClass("custom-next-button")) {
                    var serealNumber = jQuery('input.sereal-number-1').val();
                    var secondarySerealNumber = jQuery('input.sereal-number-2').val();
                    if (serealNumber == '' || secondarySerealNumber == '') {
                        jQuery('input.sereal-number-1').parent().find('.error').remove();
                        jQuery('input.sereal-number-1').parent().append('<div class="error">Serial number is not empty.</div>');
                        return;
                    } else if (serealNumber == secondarySerealNumber) {
                        $.ajax({
                            url: ajaxurl,
                            type: 'post',
                            data: {
                                'action': 'checkSerialNumberValid',
                                'serialNumber': serealNumber
                            },
                            success: function(res) {
                                var result = jQuery.parseJSON(res);
                                console.log(res);
                                if (result.result == 1) {
                                    jQuery('input.sereal-number-1').parent().find('.error').remove();
                                    jQuery('input#created_by').val(result.created_by);
                                    // if the form is valid hide current step
                                    // trigger next step
                                    //alert(nextParent);
                                    currentParent.removeClass(app.htmlClasses.visibleClass);
                                    app.showNextStep(currentParent, nextParent);
                                } else {
                                    jQuery('input.sereal-number-1').parent().find('.error').remove();
                                    jQuery('input.sereal-number-1').parent().append('<div class="error">' + result.msg + '</div>');
                                    return;
                                }
                            },
                        });
                    } else {
                        jQuery('input.sereal-number-1').parent().find('.error').remove();
                        jQuery('input.sereal-number-1').parent().append('<div class="error">Serial number not match.</div>');
                        return;
                    }
                } else {
                    // if the form is valid hide current step
                    // trigger next step
                    $("html, body").animate({ scrollTop: 0 }, "slow");
                    currentParent.removeClass(app.htmlClasses.visibleClass);
                    app.showNextStep(currentParent, nextParent);
                }
            }

        });
    },

    prevButton: function() {

        this.$prevButton.on("click", function(e) {
            e.preventDefault();
            // grab current step parent and previous parent
            var $this = jQuery(this),
                currentParent = jQuery(this).closest("fieldset"),
                prevParent = currentParent.prev();

            // hide current step and show previous step
            // no need to validate form here
            $("html, body").animate({ scrollTop: 0 }, "slow");
            currentParent.removeClass(app.htmlClasses.visibleClass);
            app.showPrevStep(currentParent, prevParent);

        });
    },

    showNextStep: function(currentParent, nextParent) {

        // hide previous parent
        currentParent
            .addClass(app.htmlClasses.hiddenClass)
            .attr("aria-hidden", true);

        // show next parent
        nextParent
            .removeClass(app.htmlClasses.hiddenClass)
            .addClass(app.htmlClasses.visibleClass)
            .attr("aria-hidden", false);

        // focus first input on next parent
        nextParent.focus();

        // activate appropriate step
        app.handleState(nextParent.index());

        // handle aria-expanded on next/prev buttons
        app.handleAriaExpanded();

    },

    showPrevStep: function(currentParent, prevParent) {

        // hide previous parent
        currentParent
            .addClass(app.htmlClasses.hiddenClass)
            .attr("aria-hidden", true);

        // show next parent
        prevParent
            .removeClass(app.htmlClasses.hiddenClass)
            .addClass(app.htmlClasses.visibleClass)
            .attr("aria-hidden", false);

        // send focus to first input on next parent
        prevParent.focus();

        // activate appropriate step
        app.handleState(prevParent.index());

        // handle aria-expanded on next/prev buttons
        app.handleAriaExpanded();

    },

    handleAriaExpanded: function() {

        /*
            Loop thru each next/prev button
            Check to see if the parent it conrols is visible
            Handle aria-expanded on buttons
        */
        jQuery.each(this.$nextButton, function(idx, item) {
            var controls = jQuery(item).attr("aria-controls");
            if (jQuery("#" + controls).attr("aria-hidden") == "true") {
                jQuery(item).attr("aria-expanded", false);
            } else {
                jQuery(item).attr("aria-expanded", true);
            }
        });

        jQuery.each(this.$prevButton, function(idx, item) {
            var controls = jQuery(item).attr("aria-controls");
            if (jQuery("#" + controls).attr("aria-hidden") == "true") {
                jQuery(item).attr("aria-expanded", false);
            } else {
                jQuery(item).attr("aria-expanded", true);
            }
        });

    },

    validateForm: function() {
        
        // jquery validate form validation
        this.$form.validate({
            ignore: ".ignore",
            
            errorPlacement: function(error, element) {
                if (element.attr("name") == "terms") {
                    error.appendTo('#agreeValidate');
                    return true;
                }
                error.insertAfter(element);
            },
            rules: {
                files:{
                    required: false,
                    extension: "jpg|png|gif|bmp|jpeg",
                    checkSize: true
                },
                universal_microchip_id:{
                    required: true,
                    validMicrochip : true,
                    /*"remote":
                    {
                      url: ajaxurl,
                      type: "post",
                      data:
                      {
                         'action' : 'checkUniversalMicrochipId',
                         universalMicrochipID: function(res)
                         {
                             return $('#profileuser1 :input[name="universal_microchip_id"]').val();
                        }
                      }
                    }*/
                },
                conf_universal_microchip_id: {
                    required: true,
                    validMicrochip: true,
                    equalTo: "#sname_input",
                   
                },
                microchip_id: {
                    required: true,
                    validMicrochip: true,
                    remote: {
                        url: ajaxurl,
                        type: "POST",
                        dataType: 'json',
                        data: {'action':'isMicrochipIdValid'},
                        dataFilter: function(response){
                            var obj = jQuery.parseJSON(response);
                            console.log("obj", obj);
                            if(obj.status ==  false){
                                micro_validation_msg = obj.message; 
                                return false;
                            }
                            return true;
                        } 
                    }
                },
                conf_microchip_id: {
                    required: true,
                    equalTo: "#sname_input",
                },
                smarttag_id_number: {
                    required: true,
                    validIdTag: true,
                    remote: {
                        url: ajaxurl,
                        type: "POST",
                        data: {'action':'checkSmartTagIDValid_testing'},
                        dataType: 'json',
                        dataFilter: function(data) {
                            console.log(data);
                            var obj = jQuery.parseJSON(data);
                            console.log("object", obj);
                            smarttag_validation_msg = obj.message ;
                        }
                    }
                },p_fst_name:{
                    required: true,
                },
                p_state:{
                    required: true,
                },
                p_country:{
                    required: true,
                },
                p_add1:{
                    required: true,
                },
                p_city:{
                    required: true,
                },
                p_email:{
                    email: true,
                    remote:{
                        url: ajaxurl,
                        type: "post",
                        data:{'action':'checkEmailExist',"userEmail":$('#profileuser1:input[name="p_email"]').val()}
                    }
                },
                conf_smarttag_id_number: {
                    required: true,
                    validIdTag: true,
                    equalTo: "#sname_input",
                   
                },
                p_zipcode: {
                    required: true,
                    number: true,
                    minlength: 5,
                    maxlength: 5
                },
                p_prm_no: {
                    checkSpecialCharate: true,
                    restric: true,
                    minlength : 13,
                    maxlength : 14,
                    remote:{
                        url: ajaxurl,
                        type: "post",
                        data:{
                            'action' : 'checkPrimaryExists',
                            priary_phone: function(){
                                return $('#profileuser1 :input[name="p_prm_no"]').val();
                            }
                        }
                    }
                },
                /*p_sec_no: {
                   checkSpecialCharate: true,
                   restric: true,
                    minlength: 13,
                    maxlength: 14
                },*/
                s_prm_no: {
                    checkSpecialCharate: true,
                    restric: true,
                    minlength: 13,
                    maxlength: 14
                },
                s_sec_no: {
                    checkSpecialCharate: true,
                    restric: true,
                    minlength: 13,
                    maxlength: 14
                },
                s_zipcode :{
                    number: true,
                    minlength: 5,
                    maxlength: 5
                },
                vaterinarian_primary_phone_number: {
                    checkSpecialCharate: true,
                    restric: true,
                    minlength: 13,
                    maxlength: 14
                },
                vaterinarian_secondary_phone_number: {
                    checkSpecialCharate: true,
                    restric: true,
                    minlength: 13,
                    maxlength: 14
                },
                vaterinarian_zip_code :{
                    minlength: 5,
                    maxlength: 5
                },
                attribute_pa_ttype:{
                    required:true
                },protectionPlan:{
                    required:true
                }
            },
            messages: {
                microchip_id : {
                    remote: function(){ return micro_validation_msg;}
                },
                conf_microchip_id : {
                    minlength : "The Microchip Id Number must be 15 digits.",
                    maxlength : "The Microchip Id Number must be 15 digits.",
                },
                smarttag_id_number: {
                    remote: "This ID is not valid",
                    minlength : "The SmartTag Id must be 8 digits.",
                    maxlength : "The SmartTag Id must be 8 digits.",
                },
                conf_smarttag_id_number: {
                    minlength : "The SmartTag Id must be 8 digits.",
                    maxlength : "The SmartTag Id must be 8 digits.",
                },
                universal_microchip_id: {
                    minlength : "The universal Microchip Id must be 10-15 digits.",
                    maxlength : "The universal Microchip Id must be 10-15 digits.",
                    remote: "This ID is not valid, it's already used by another owner.",
                },
                conf_universal_microchip_id: {
                    minlength : "The universal Microchip Id must be 10-15 digits.",
                    maxlength : "The universal Microchip Id must be 10-15 digits.",
                },
              // microchip_id: {remote: "This ID is not valid"},
                p_prm_no: {
                   // minlength : "The phone number must be 13-16 digits.",
                    minlength : "The phone number must be 10 digits.",
                    maxlength : "The phone number must be 10  digits.",
                    remote: "This phone number already exists"
                },
               /* p_sec_no: {
                    minlength : "The phone number must be 10  digits.",
                    maxlength : "The phone number must be 10  digits.",
                },*/
                s_prm_no: {
                        minlength : "The phone number must be 10  digits.",
                        maxlength : "The phone number must be 10  digits.",
                },
                s_sec_no: {
                        minlength : "The phone number must be 10  digits.",
                        maxlength : "The phone number must be 10  digits.",
                },
                vaterinarian_primary_phone_number: {
                        minlength : "The phone number must be 10  digits.",
                        maxlength : "The phone number must be 10  digits.",
                },
                vaterinarian_secondary_phone_number: {
                        minlength : "The phone number must be 10  digits.",
                        maxlength : "The phone number must be 10  digits.",
                },
                p_zipcode: {
                        minlength : "The Zipcode must be 5 digits.",
                        maxlength : "The Zipcode must be 5 digits.",
                },
                s_zipcode: {
                        minlength : "The Zipcode must be 5 digits.",
                        maxlength : "The Zipcode must be 5 digits.",
                },
                vaterinarian_zip_code: {
                        minlength : "The Zipcode must be 5 digits.",
                        maxlength : "The Zipcode must be 5 digits.",
                },
                p_email : {
                    // remote: "The email Id already exists.",
                    remote: "The Email already exists,<a id='loginform' href='javascript:void(0)'> Click here to login. </a>",
                },
                protectionPlan:{
                    required: "Protection plan is compulsary for Universal Microchip, Please choose one.",
                }
            },
            ignore: ":hidden", // any children of hidden desc are ignored
            errorElement: "span", // wrap error elements in span not label
            invalidHandler: function(event, validator) { // add aria-invalid to el with error
                jQuery.each(validator.errorList, function(idx, item) {
                    if (idx === 0) {
                        jQuery(item.element).focus(); // send focus to first el with error
                    }
                    jQuery(item.element).attr("aria-invalid", true); // add invalid aria
                })
            },
            submitHandler: function(f) {



                $('#output').text('');
                $('.loader-wrap').fadeIn();

                // steps form data of smartTag      
                var productId = new FormData();     
                var fd = new FormData();
                var ufd = new FormData();
                var insfd = new FormData();
                var petAramnt = new FormData();
                var cusPro = new FormData();

                var files_data = $('#profileuser1 .files-data');
                var data = "";
                window.resResult = new Array();
                window.UsrID = null;
                // Loop through each data and create an array file[] containing our files data.
                window.checkPorduct = 0;
                $.each($(files_data), function(i, obj) {
                    $.each(obj.files, function(j, file) {
                        fd.append('files[' + j + ']', file);
                    })
                });

                // our AJAX identifier
                ufd.append('action', 'new_register_user');
                fd.append('action', 'Create_Pet_profile');

                insfd.append('action', 'Pet_Insurance');
                petAramnt.append('action', 'Pet_Arrangement');
            cusPro.append('action', 'add_id-tag_into_cart');
            



            /*checkbox  phone number */
            var checkbox_under_userInfo = localStorage.getItem('cart_checkbox');
            ufd.append('checkbox_under_userInfo', checkbox_under_userInfo);







                // insfd.append('action', 'Pet_Insurance');
                // petAramnt.append('action', 'Pet_Arrangement');
             //   cusPro.append('action', 'add_id-tag_into_cart');
                
                // USER AND PET PROFILE DATA
                $.each($('#profileuser1 .text-data'), function() {
                    fd.append($(this).attr('name'), $(this).val());
                });


                $.each($('#profileuser1 .user-data'), function() {
                    ufd.append($(this).attr('name'), $(this).val());
                });

                  $.each($('#profileuser1 .protectArg'), function() {
                    petAramnt.append($(this).attr('name'), $(this).val());
            }); 

            $.each($('#profileuser1 .PetInsurance'), function() {
              insfd.append($(this).attr('name'), $(this).val());
            });
    
            $.each($('#profileuser1 .customdata'), function() {
                  cusPro.append($(this).attr('name'), $(this).val());
             });


            $.each($('.subPlans .AddSubscription'), function() {
                   subplan.append($(this).attr('proid'));
             });

       /* var  data1 = { 'attribute_pa_protection' : 'gold', 
                   'attribute_pa_plan' : '5-year',
                   'quantity' : '1',
                    'action' : 'AddSubscriptionPlan',
                };
*/





                /* ADD ACTION TO ADD PRODICT */
               // productId.append('action', 'productAddToCart');

                /* CUSTOM PRODUCT DATA*/
                

                var product = "";
                var value = "";

                $.each($('#selectType .nice-select li'), function() {
                    if ($(this).hasClass('selected')) {
                        product = jQuery(this).attr('data-product');
                        value = jQuery(this).attr('data-value');
                    }
                });
                var size = $('#field2').val();

              

               // alert(product);
                var cusProduct = new FormData();
                if (product == 'aluminum' && value == 'circle') {
                    /*alert(value);
                    alert(size);
                   */
                  
                   /* var color = '';
                    $.each($('input[name=color]'), function() {
                        if ($(this).attr('checked') == 'checked') {
                            color = $(this).val();
                        }
                    });*/


                    var  products_id = 6033;
                     var variation_id ="";
                         $.each($('.circle'), function() {
                             color = $('input[name="color"]:checked').val();
                         });

                     if(color== 'blue-circle'){
                         variation_id ="6446";
                     }else if(color== 'black-circle'){
                         variation_id ="6447";
                     }else{
                         variation_id ="6448";
                     }



                     data = {
                        'attribute_pa_shape': value,
                        'attribute_pa_size': size,
                        'attribute_pa_color': color,
                        'action': 'add_id-tag_into_cart',
                        'product_id': products_id,
                        'variation_id': variation_id,
                        'engraving_front_line_1': $("#front_line1").text(),
                        'engraving_front_line_2': $("#front_line2").text(),
                        'engraving_front_line_3': $("#front_line3").text(),
                        'engraving_front_line_4': $("#front_line4").text(),
                    };

                    for ( var key in data ) {
                        cusProduct.append(key, data[key]);
                    }

                }else if(product == 'aluminum' && value == 'bone'){


                    var  products_id = 6033;
                     var variation_id ="";
                         $.each($('.circle'), function() {
                             color = $('input[name="color"]:checked').val();
                         });

                     if(color== 'black-bone'){
                         variation_id ="6438";
                     }else if(color== 'blue-bone'){
                         variation_id ="6439";
                     }else if(color== 'pink-bone'){
                         variation_id ="6440";
                     }else{
                         variation_id ="6441";
                     }



                     data = {
                        'attribute_pa_shape': value,
                        'attribute_pa_size': size,
                        'attribute_pa_color': color,
                        'action': 'add_id-tag_into_cart',
                        'product_id': products_id,
                        'variation_id': variation_id,
                        'engraving_front_line_1': $("#front_line1").text(),
                        'engraving_front_line_2': $("#front_line2").text(),
                        'engraving_front_line_3': $("#front_line3").text(),
                        'engraving_front_line_4': $("#front_line4").text(),
                    };

                    for ( var key in data ) {
                        cusProduct.append(key, data[key]);
                    }

                }else if(product == 'aluminum' && value == 'heart'){

                        var  products_id = 6033;
                         var variation_id ="";
                             $.each($('.heart'), function() {
                                 color = $('input[name="color"]:checked').val();
                             });

                         if(color== 'pink-heart'){
                             variation_id ="6452";
                         }else if(color== 'red-heart'){
                             variation_id ="6453";
                         }else{
                             variation_id ="6454";
                         }



                         data = {
                            'attribute_pa_shape': value,
                            'attribute_pa_size': size,
                            'attribute_pa_color': color,
                            'action': 'add_id-tag_into_cart',
                            'product_id': products_id,
                            'variation_id': variation_id,
                            'engraving_front_line_1': $("#front_line1").text(),
                            'engraving_front_line_2': $("#front_line2").text(),
                            'engraving_front_line_3': $("#front_line3").text(),
                        };

                        for ( var key in data ) {
                            cusProduct.append(key, data[key]);
                        }



                }else if(product == 'brass' && value == 'circle'){
                    var style = '';
                   /* $.each($('input[name=style]'), function() {
                        if ($(this).attr('checked') == 'checked') {
                            style = $(this).val();
                        }
                    });*/

                        var color = '';
                        var product_id =  6089;
                        var variation_id ="";

                
                        $.each($('.circle'), function() {
                           color = $('input[name="style"]:checked').val();
                        });

                        if(color == 'circle-1'){
                            variation_id ="76842";
                        }else if(color == 'circle-2'){
                            variation_id ="76843";
                        }else if(color == 'circle-3'){
                            variation_id ="76844";
                        }else if(color == 'circle-4'){
                            variation_id ="76845";
                        }else if(color == 'circle-5'){
                            variation_id ="76846";
                        }else if(color == 'circle-6'){
                            variation_id ="76847";
                        }else if(color == 'circle-7'){
                            variation_id ="76832";
                        }else if(color== 'circle-8'){
                            variation_id ="107091";
                        }
                    

                    data = {
                        'attribute_pa_ttype': value,
                        'attribute_pa_size': size,
                        'attribute_pa_style': color,
                          'product_id': product_id,
                        'variation_id': variation_id,
                        'action': 'add_id-tag_into_cart',
                        'engraving_back_line_1':$("#back_line1").text(),
                        'engraving_back_line_2': $("#back_line2").text(),
                        'engraving_back_line_3': $("#back_line3").text(),
                        'engraving_back_line_4': $("#back_line4").text(),
                    };
                        for ( var key in data ) {
                            cusProduct.append(key, data[key]);
                        }
                }else if(product == 'brass' && value == 'heart'){
                        
                        var color = '';
                        var  products_id = 6089;
                         var variation_id ="";
                         $.each($('.heart'), function() {
                             color = $('input[name="style"]:checked').val();
                         });

                         if(color == 'heart-1'){
                             variation_id ="76881";
                         }else{ 
                             variation_id = "76882";
                         }

                    data = {
                        'attribute_pa_ttype': value,
                        'attribute_pa_size': size,
                        'attribute_pa_style': color,
                          'product_id': products_id,
                        'variation_id': variation_id,
                        'action': 'add_id-tag_into_cart',
                        'engraving_back_line_1':$("#back_line1").text(),
                        'engraving_back_line_2': $("#back_line2").text(),
                        'engraving_back_line_3': $("#back_line3").text(),
                        'engraving_back_line_4': $("#back_line4").text(),
                    };
                      for ( var key in data ) {
                        cusProduct.append(key, data[key]);
                    }
                }else if(product == 'brass' && value == 'bone'){
                        
                        var color = '';
                        var  products_id = 6089;
                         var variation_id ="";
                         $.each($('.bone'), function() {
                             color = $('input[name="style"]:checked').val();
                         });

                         if(color == 'bone-1'){
                             variation_id ="76787";
                         }else if (color == 'bone-2'){ 
                             variation_id = "76788";
                         }else if (color == 'bone-3'){ 
                             variation_id = "76789";
                         }else if (color == 'bone-4'){ 
                             variation_id = "76790";
                         }else if (color == 'bone-5'){ 
                             variation_id = "76791";
                         }else if (color == 'bone-6'){ 
                             variation_id = "76792";
                         }else if (color == 'bone-7'){ 
                             variation_id = "76792";
                         }else if (color == 'bone-8'){ 
                             variation_id = "107012";
                         }else if (color == 'bone-9'){ 
                             variation_id = "107008";
                         }else if (color == 'bone-10'){ 
                             variation_id = "107009";
                         }

                    data = {
                        'attribute_pa_ttype': value,
                        'attribute_pa_size': size,
                        'attribute_pa_style': color,
                          'product_id': products_id,
                        'variation_id': variation_id,
                        'action': 'add_id-tag_into_cart',
                        'engraving_back_line_1':$("#back_line1").text(),
                        'engraving_back_line_2': $("#back_line2").text(),
                        'engraving_back_line_3': $("#back_line3").text(),
                        'engraving_back_line_4': $("#back_line4").text(),
                    };
                      for ( var key in data ) {
                        cusProduct.append(key, data[key]);
                    }
                }





                if($('#profileuser1 #u-first').attr('value') != ''){
                




                baseFn(ajaxurl, ufd, 'POST', fd, resResult, insfd, cusProduct, petAramnt);



       


                // $.ajax({
                //     type: 'POST',
                //     url: ajaxurl,
                //     data: ufd,
                //     contentType: false,
                //     processData: false,
                //     success: function(response) {
                //     var Obj      = JSON.parse(response);
                //     var UsrID    = Obj.usrId;
                    // fd.append('userId',UsrID); 
                //     resResult.push(Obj.message); 
                    /*},complete: function(){*/




                  // if($('#profileuser1 #sname_input').attr('value') != ''){

                            // $.ajax({
                              //   type: 'POST',
                              //   url: ajaxurl,
                              //   data: fd,
                              //   contentType: false,
                              //   processData: false,
                              //   success: async function(response) {
                              //   var Obj = JSON.parse(response);
                               
                              //   resResult.push(Obj.message); 

                              //    if($('.subPlans').hasClass('AddSubscription')){ 

                              
                              //    await  AddSubscription();
                                
                                
                              // }


                              //       if ($('#heth_id').is(":checked") == true) {
              
                                   
                              //       console.log('function_2');
                              //     await  insurance();
                              
                              //  }
                               /*if($('#PetArg').is(":checked") == true){

                                   
                                       console.log('function_3');
                                    PetArg();
                                
                                
                               }*/

                              //  }
                            //});
                   // }
               // }
           // });
        }else{

               
                baseFn(ajaxurl, ufd, 'POST', fd, resResult, insfd, cusProduct, petAramnt);


            //     $.ajax({
            //         type: 'POST',
            //         url: ajaxurl,
            //         data: ufd,
            //         contentType: false,
            //         processData: false,
            //         success: function(response) {
            //         var Obj      = JSON.parse(response);
            //         var UsrID    = Obj.usrId;
            //         fd.append('userId',UsrID); 
            //         resResult.push(Obj.message); 
            //         /*},complete: function(){*/




            //       // if($('#profileuser1 #sname_input').attr('value') != ''){

            //                 $.ajax({
            //                     type: 'POST',
            //                     url: ajaxurl,
            //                     data: fd,
            //                     contentType: false,
            //                     processData: false,
            //                     success: function(response) {
            //                     var Obj = JSON.parse(response);
                               
            //                     resResult.push(Obj.message); 
            //                     }
            //                 });
            //        // }
            //     }
            // });

        }


async function userCreate(ajaxurl, ufd, method) {
    return $.ajax({
        type: method || 'POST',
        url: ajaxurl,
        data: ufd,
        contentType: false,
        processData: false
    });
}

 async function baseFn(ajaxurl, ufd, method, fd, resResult, insfd = null, cusProduct = null, petAramnt = null) {
    try {

        const response_1 = await userCreate(ajaxurl, ufd, method)


        var obj_ = JSON.parse(response_1);
        var UsrID = obj_.usrId;
        fd.append('userId', UsrID);
        resResult.push(obj_.message);
        window.checkPorduct++;
    } catch (error) {
        console.log('error response_1', error)
    }

 try {
        const response_2 = await userCreate(ajaxurl, fd, 'POST');
        var obj = JSON.parse(response_2);

        resResult.push(obj.message);
        window.checkPorduct++;
    } catch (error) {
        console.log('error response_2', error)
    }
    
    if ($('.subPlans').hasClass('AddSubscription')) {

        var product_id = localStorage.getItem("products_id");

        var subplan = new FormData();
        subplan.append('action', 'AddSubscriptionPlan');
        subplan.append('product_id', product_id);

        try {
            const response_3 = await userCreate(ajaxurl, subplan, 'POST');
            console.log('response_3', response_3)

            var obj_1 = JSON.parse(response_3);
            resResult.push(obj_1.message);
            window.checkPorduct++;

        } catch (error) {
            console.log('error response_3', error)
        }

    }
      

    if ($('#heth_id').is(":checked") == true) {
        try {
            const response_4 = await userCreate(ajaxurl, insfd, 'POST');
            console.log('response_4', response_4)

            var obj_2 = JSON.parse(response_4);
            resResult.push(obj_2.message);
            window.checkPorduct++;

        } catch (error) {
            console.log('error response_4', error)
        }
    }


    if ($('#CustPro').is(":checked") == true) {
        try {
            const response_5 = await userCreate(ajaxurl, cusProduct, 'POST');
            console.log('response_5', response_5)

            var obj_3 = JSON.parse(response_5);
            resResult.push(obj_3.message);
            window.checkPorduct++;
        } catch (error) {
            console.log('error response_4', error)
        }
    }
 

    if ($('#PetArg').is(":checked") == true) {
        try {
            const response_6 = await userCreate(ajaxurl, petAramnt, 'POST');
            console.log('response_6', response_6)

            var obj_4 = JSON.parse(response_6);
            resResult.push(obj_4.message);
            window.checkPorduct++;
        } catch (error) {
            console.log('error response_4', error)
        }
    }

    finalResponseMsg();
}


       /* function AddSubscription(){
             if($('.subPlans').hasClass('AddSubscription')){ 
                
                var product_id = localStorage.getItem("products_id");
                var  data1 = { 'product_id': product_id, 
                                          'action' : 'AddSubscriptionPlan',
                                  };
                     $.ajax({
                              type: 'POST',
                              url: ajaxurl,
                              data: data1,
                            
                          success: function(response) {
                              var Obj = JSON.parse(response);
                              resResult.push(Obj.message); 
                              window.checkPorduct++;  
                         }
                     });
            }
        }



         function insurance(){
         

                
               if ($('#heth_id').is(":checked") == true) {
              
                alert('insurance');
                       $.ajax({
                            type: 'POST',
                            url: ajaxurl,
                            data: insfd,
                            contentType: false,
                            processData: false,
                            success: function(response) {
                                var Obj = JSON.parse(response);
                                resResult.push(Obj.message); 
                                window.checkPorduct++;
                                }
                            });
                           }
                }

                 function CustPro(){
  
                   if ($('#CustPro').is(":checked") == true) {
                       alert('custome prodcuct');
                        $.ajax({
                                type: 'POST',
                                url: ajaxurl,
                                data: data,
                                success: function(response) {
                                    console.log('custom'+response);
                                    var Obj = JSON.parse(response);
                                    resResult.push(Obj.message); 
                                    window.checkPorduct++;
                                    
                                }
                            });
                }
            }


            function PetArg(){

                    if($('#PetArg').is(":checked") == true){
                          alert('agrement');
                          $.ajax({
                                  type: 'POST',
                                  url: ajaxurl,
                                  data: petAramnt,
                                  contentType: false,
                                  processData: false,
                                   success: function(response) {
                                      var Obj = JSON.parse(response);
                                      resResult.push(Obj.message); 
                                      window.checkPorduct++;
                                     
                                  }
                              });
                     }     

                }

 */



         function finalResponseMsg(){

                if(resResult){



                    localStorage.removeItem('conf_microchip_id');
                    localStorage.removeItem('microchip_id');
                    localStorage.removeItem('pet_name');
                    localStorage.removeItem('pet_type');
                    localStorage.removeItem('primary_breed');
                    localStorage.removeItem('secondary_breed');
                    localStorage.removeItem('primary_color');
                    localStorage.removeItem('secondary_color');
                    localStorage.removeItem('gender');
                    localStorage.removeItem('size');
                    localStorage.removeItem('pet_date_of_birth');
                    localStorage.removeItem('products_id');
                    //alert(window.checkPorduct);
                   // localStorage.removeItem('Insurance');
                    localStorage.setItem("products_id" , 75193);

                   

                    $('.loader-wrap').fadeOut();
                    console.log('checkPorduct'+window.checkPorduct);
                    if(window.checkPorduct > 0){
                        $('#closed').attr('href','/cart');
                    }else{
                        $('#closed').attr('href','/home');
                    }
                        $('.popup-wrap').fadeIn(function(){
                        $.each(resResult, function(i, v){
                            $('.popup-content').append(resResult[i]);
                        }); 
                    });
                }

}
               



                  
                        
                        // setTimeout(function(){
                        //         if(resResult){
                        //             //alert(window.checkPorduct);
                        //             $('.loader-wrap').fadeOut();
                        //             console.log('checkPorduct'+window.checkPorduct);
                        //             if(window.checkPorduct > 0){
                        //                 $('#closed').attr('href','/cart');
                        //             }else{
                        //                 $('#closed').attr('href','/home');
                        //             }
                        //             $('.popup-wrap').fadeIn(function(){
                        //             $.each(resResult, function(i, v){
                        //             $('.popup-content').append(resResult[i]);
                        //                 }); 
                        //             });
                        //         }
                        //     }, 20000);
                

   






                




/*



















                // Pet Arrangment
                if ($('#PetArg').is(":checked") == true) {
                    alert('PetArg');
                    $.each($('#profileuser1 .
                    '), function() {
                        // petAramnt.append($(this).attr('name'), $(this).val());
                        productId.append($(this).attr('name'), $(this).val());
                    });
                }
                
                //Pet insurance
                if ($('#heth_id').is(":checked") == true) {   
                alert('heth_id'); 
                    $.each($('#profileuser1 .PetInsurance'), function() {
                        // insfd.append($(this).attr('name'), $(this).val());
                        productId.append($(this).attr('name'), $(this).val());
                    });
                }
                    
                //Add Subscriptions
                if ($('#profileuser1 .site-btn').hasClass('AddSubscription')) {
                    $.each($('#profileuser1 .AddSubscription'), function() {
                        productId.append($(this).attr('filed'), $(this).attr('proid'));
                    });
                }    

                if ($('#profileuser1 #u-first').attr('value') != '') {
                    alert('#profileuser1 #u-first');
                    $('.popup-content').empty();
                    $.ajax({
                        type: 'POST',
                        url: ajaxurl,
                        data: ufd,
                        contentType: false,
                        processData: false,
                        success: function(response) {
                            var Obj = JSON.parse(response);
                            resResult.push(Obj.message);
                            window.UsrID = Obj.usrId;
                            fd.append('userId', window.UsrID);
                            if ($('#profileuser1 #sname_input').attr('value') != '' && window.UsrID !=null) {
                                $.ajax({
                                    type: 'POST',
                                    url: ajaxurl,
                                    data: fd,
                                    contentType: false,
                                    processData: false,
                                    success: function(response) {
                                        var Obj = JSON.parse(response);
                                        resResult.push(Obj.message);
                                        var petId = Obj.petId;
                                        productId.append("petId",petId);
                                        var type = "";
                                        if ($("input[name=universalMicrochip]").val() == 1) {
                                            type = "universal microchip";
                                        }
                                        productId.append("formType",type);
                                        if (petId != 0) {
                                            $.ajax({
                                                type: 'POST',
                                                url: ajaxurl,
                                                data: productId,
                                                contentType: false,
                                                processData: false,
                                                success: function(response) {
                                                    var Obj = JSON.parse(response);
                                                    resResult.push(Obj.message);
                                                }
                                            });
                                            if ($('#CustPro').attr("checked") == 'checked') {
                                                $.ajax({
                                                    type: 'POST',
                                                    url: ajaxurl,
                                                    data: data,
                                                    success: function(response) {
                                                        console.log('custom' + response);
                                                        var Obj = JSON.parse(response);
                                                        resResult.push(Obj.message);
                                                    }
                                                });
                                            }
                                        }
                                    }
                                });
                            }
                        },
                        complete: function(response) {
                                setTimeout(function() {
                               
                                    $('.loader-wrap').fadeOut();
                                    var url = 'https://staging.idtag.com/cart';


                                    if(window.UsrID != null){
                                        $("#closed").attr('href', url);  
                                    }


                                  
                                    $('.popup-wrap').fadeIn(function() {
                                        $.each(resResult, function(i, v) {


                                            $('.popup-content').append(resResult[i]);

                                        });
                                    });



     



                                
                            }, 10000);
                        // }else{
                        //  alert("sorry");
                        // }
                        }
                    });
                }*/
 //}
}
        });
    },

    checkForValidForm: function() {
        if (this.$form.valid()) {
            return true;
        }
    },

    startOver: function() {

        var $parents = this.$formStepParents,
            $firstParent = this.$formStepParents.eq(0),
            $formParent = this.$formParent,
            $stepsParent = this.$stepsParent;

        this.$resetButton.on("click", function(e) {

            // hide all parents - show first
            $parents
                .removeClass(app.htmlClasses.visibleClass)
                .addClass(app.htmlClasses.hiddenClass)
                .eq(0).removeClass(app.htmlClasses.hiddenClass)
                .eq(0).addClass(app.htmlClasses.visibleClass);

            // remove edit state if present
            $formParent.removeClass(app.htmlClasses.editFormClass);

            // manage state - set to first item
            app.handleState(0);

            // reset stage for initial aria state
            app.setupAria();

            // send focus to first item
            setTimeout(function() {
                $firstParent.focus();
            }, 200);

        }); // click

    },

    handleState: function(step) {

        this.$steps.eq(step).prevAll().removeAttr("disabled");
        this.$steps.eq(step).addClass(app.htmlClasses.activeClass);

        // restart scenario
        if (step === 0) {
            this.$steps
                .removeClass(app.htmlClasses.activeClass)
                .attr("disabled", "disabled");
            this.$steps.eq(0).addClass(app.htmlClasses.activeClass)
        }

    },

    editForm: function() {
        var $formParent = this.$formParent,
            $formStepParents = this.$formStepParents,
            $stepsParent = this.$stepsParent;

        this.$editButton.on("click", function() {
            $formParent.toggleClass(app.htmlClasses.editFormClass);
            $formStepParents.attr("aria-hidden", false);
            $formStepParents.eq(0).find("input").eq(0).focus();
            app.handleAriaExpanded();
        });
    },

    killEnterKey: function() {
        jQuery(document).on("keypress", ":input:not(textarea,button)", function(event) {
            return event.keyCode != 13;
        });
    },

    handleStepClicks: function() {

        var $stepTriggers = this.$steps,
            $stepParents = this.$formStepParents;

        $stepTriggers.on("click", function(e) {

            e.preventDefault();

            var btnClickedIndex = jQuery(this).index();

            // kill active state for items after step trigger
            $stepTriggers.nextAll()
                .removeClass(app.htmlClasses.activeClass)
                .attr("disabled", true);

            // activate button clicked
            jQuery(this)
                .addClass(app.htmlClasses.activeClass)
                .attr("disabled", false)

            // hide all step parents
            $stepParents
                .removeClass(app.htmlClasses.visibleClass)
                .addClass(app.htmlClasses.hiddenClass)
                .attr("aria-hidden", true);

            // show step that matches index of button
            $stepParents.eq(btnClickedIndex)
                .removeClass(app.htmlClasses.hiddenClass)
                .addClass(app.htmlClasses.visibleClass)
                .attr("aria-hidden", false)
                .focus();

        });

    }

};

app.init();



// $('.sname_input-MC1').blur(function(){
//     alert();

//     var ids = $(this).val();
//     var id = ids.replace(/\s/g, '');
//     if(id.length == 8){

//         $.ajax({
//             url: ajaxurl,
//             method:"POST", 
//             dataType: 'json',
//             data:{
//               'smarttag_id_number': id, 
//               'action' : 'checkSmartTagIDValid_testing',
//             },
//             success: function(data) {
//                 console.log(data);
//                 console.log(data.message);
//                 if(data.status == '302'  && data.result == 'exist'){
//                     console.log('1');
//                     $('.show-atag').hide();
//                     $('.valid_message').removeClass('error_success');
//                     $('.valid_message').css('color','red')
//                     $('.valid_message').text(data.message);
//                     $('.valid_message').show();
//                     $('.show-atag').hide();
                        
//                 }else if(data.status == 406  && data.result == 'fail'){
//                     console.log('2');
                 
//                     $('.valid_message').removeClass('error_success');
//                     $('.valid_message').css('color','red');
//                     $('.valid_message').text(data.message);
//                     $('.valid_message').show();
//                     $('.show-atag').show();
                    

//                 }else if(data.status == '200'  && data.result == 'success'){
//                     console.log('3');
                    
//                     $('.valid_message').hide();
//                     $('.show-atag').hide();
//                         return true;
//                 }else{
//                   console.log('4');
//                     $('.valid_message').addClass('error');
//                     $('.valid_message').removeClass('error_success');
//                     $('.valid_message').text(data.message);
//                     $('.show-atag').hide();
//                     $('.valid_message').show();

//                     return false;
//                 }
//             }
//         });
//     }else if(id.length == 15){
//         console.log('checkMicrochipIDValid1');
//         $.ajax({
//             url: ajaxurl,
//             method:"POST", 
//             dataType: 'json',
//             data:{
//               'smarttag_id_number': id, 
//               'action' : 'checkMicrochipIDValid1',
//             },
//             success: function(data) {
//                 if(data.status == '302'  && data.result == 'exist'){
                    
//                     $('.valid_message').addClass('error');
//                     $('.valid_message').removeClass('error_success');
//                     $('.valid_message').css('color','red')
//                     $('.valid_message').text(data.message);
//                     $('.valid_message').show();
//                     $('.show-atag').hide();
//                     return false;

//                 }else if(data.status == 406  && data.result == 'fail'){
                    
//                     $('.valid_message').addClass('error');
//                     $('.valid_message').removeClass('error_success');
//                     $('.valid_message').css('color','red');
//                     $('.valid_message').text(data.message);
//                     $('.valid_message').show();
//                     $('.show-atag').hide();
//                     return false;
                    

//                 }else if(data.status == '200'  && data.result == 'success'){
                    
//                     $('.valid_message').hide();
//                     $('.show-atag').hide();
//                     return true;
//                 }else{
//                     $('.valid_message').addClass('error');
//                     $('.valid_message').removeClass('error_success');
//                     $('.valid_message').text(data.message);
//                     $('.show-atag').show();
//                     $('.valid_message').hide();
//                     return false;
//                 }
//             }
//         });
//     }
// });




$('.dog_universal_microchip_id').blur(function(){
           var ids =$("input[name=universal_microchip_id]").val();
           var id = ids.replace(/\s/g, '');
       
             $.ajax({
                    url: ajaxurl,
                    method:"POST", 
                    dataType: 'json',
                    data:{
                      'smarttag_id_number': id, 
                      'action' : 'checkUniversalMicrochipId',
                    },
                     success: function(data) {
                        console.log('response12');
                                          
                            if(data.status == '302'  && data.result == 'exist'){
                                console.log('1');

                                $('.valid_message').addClass('error');
                                $('.valid_message').removeClass('error_success');
                                $('.valid_message').css('color','red')
                                $('.valid_message').text(data.message);
                                $('.valid_message').show();
                                $('.show-atag').hide();
                                    return false;
                            }else if(data.status == '201'  && data.result == 'otherMichrochip'){


                                $('.valid_message').addClass('error');
                                $('.valid_message').removeClass('error_success');
                                $('.valid_message').css('color','red')
                                $('.valid_message').text(data.message);
                                $('.valid_message').show();
                                $('.show-atag').show();
                                    return false;
                            }else{
                                console.log('3');
                                $('.valid_message').hide();
                                $('.show-atag').hide();
                                    return true;
                            }
                                    
                     }
                });



     });
    

/*For webhook trigger add customew pet profile*/

    $(document).ready(function(){

var url = window.location.hostname+'/webhook-pet-profile/';

     if(window.location.href.indexOf(url) > -1) {
        checkSmartTagIDValid_on_webhook();
     }
        $('.webhook_check_id').blur(function(){
            checkSmartTagIDValid_on_webhook();
        });
    });


function checkSmartTagIDValid_on_webhook(){


    var ids = $('.webhook_check_id').val();
     var id = ids.replace(/\s/g, '');


        if(id.length== '15'){


                  $.ajax({
                    url: ajaxurl,
                    method:"POST",
                    dataType:'json',
                    data:{
                      'smarttag_id_number': id, 
                      'action' : 'checkSmartTagIDValid_on_webhook',
                    },
                    success: function(result) {
                      
                         if(result.status == '200'  && result.result == 'success'){
                        
                            $('.valid_message').addClass('error');
                            $('.valid_message').removeClass('error_success');
                            $('.valid_message').text(result.message);
                            $('.show-atag').hide();
                             $('.valid_message').hide();
                                return true;
                        }else{
                          console.log('4');
                            $('.valid_message').addClass('error');
                            $('.valid_message').removeClass('error_success');
                            $('.valid_message').text(result.message);
                            $('.show-atag').hide();
                             $('.valid_message').show();
                                return false;
                        }
                       
                   }    
              
            });


        }
         // else{
         //    alert('Invalid Temp Microchip Id Number');
         //    window.reload();
         // }





}



$(document).ready(function() {
 
    var url = window.location.hostname+'/our-services/microchip-registry/';
    var url1 = window.location.hostname+'/our-services/smarttag-registry/';
    if (window.location.href.indexOf(url) > -1 || window.location.href.indexOf(url1) > -1 ) {
        console.log("ocean");

    //     $('#pname_input').blur(function(){
    //         var ids = $('.sname_input-MC').val();
    //           var id = ids.replace(/\s/g, '');
    //               if(id.length == 8){

    //                   $.ajax({
    //                     url: ajaxurl,
    //                     method:"POST", 
    //                     dataType: 'json',
    //                     data:{
    //                       'smarttag_id_number': id, 
    //                       'action' : 'checkSmartTagIDValid_testing',
    //                     },
    //                     success: function(data) {

                        
                          
    //                     console.log(data);
    //                     console.log(data.message);
    //                         if(data.status == '302'  && data.result == 'exist'){
    //                             console.log('1');
    //                                 $('.show-atag').hide();
    //                            // $('.valid_message').addClass('error');
    //                             $('.valid_message').removeClass('error_success');
    //                             $('.valid_message').css('color','red')
    //                             $('.valid_message').text(data.message);
    //                             $('.valid_message').show();
    //                             $('.show-atag').hide();
                                    
    //                         }else if(data.status == 406  && data.result == 'fail'){
    //                             console.log('2');
                             
    //                             $('.valid_message').removeClass('error_success');
    //                             $('.valid_message').css('color','red');
    //                             $('.valid_message').text(data.message);
    //                             $('.valid_message').show();
    //                             $('.show-atag').show();
                                

    //                         }else if(data.status == '200'  && data.result == 'success'){
    //                             console.log('3');
                                
    //                             $('.valid_message').hide();
    //                             $('.show-atag').hide();
    //                                 return true;
    //                         }else{
    //                           console.log('4');
    //                             $('.valid_message').addClass('error');
    //                             $('.valid_message').removeClass('error_success');
    //                             $('.valid_message').text(data.message);
    //                             $('.show-atag').hide();
    //                              $('.valid_message').show();

    //                                 return false;
    //                         }
                           
    //                    }
                  
    //             });
    //         }else if(id.length == 15){
    //                 console.log('checkMicrochipIDValid1');
    //              $.ajax({
    //                     url: ajaxurl,
    //                     method:"POST", 
    //                     dataType: 'json',
    //                     data:{
    //                       'smarttag_id_number': id, 
    //                       'action' : 'checkMicrochipIDValid1',
    //                     },
    //                      success: function(data) {
                                              
    //                             if(data.status == '302'  && data.result == 'exist'){
    //                                 console.log('1');

    //                                 $('.valid_message').addClass('error');
    //                                 $('.valid_message').removeClass('error_success');
    //                                 $('.valid_message').css('color','red')
    //                                 $('.valid_message').text(data.message);
    //                                 $('.valid_message').show();
    //                                 $('.show-atag').hide();
    //                                     return false;
    //                             }else if(data.status == 406  && data.result == 'fail'){
    //                                 console.log('2');

    //                                $('.valid_message').addClass('error');
    //                                 $('.valid_message').removeClass('error_success');
    //                                 $('.valid_message').css('color','red');
    //                                 $('.valid_message').text(data.message);
    //                                 $('.valid_message').show();
    //                                 $('.show-atag').hide();
                                    

    //                             }else if(data.status == '200'  && data.result == 'success'){
    //                                 console.log('3');
                                    
    //                                 $('.valid_message').hide();
    //                                 $('.show-atag').hide();
    //                                     return true;
    //                             }else{
    //                               console.log('4');
    //                                 $('.valid_message').addClass('error');
    //                                 $('.valid_message').removeClass('error_success');
    //                                 $('.valid_message').text(data.message);
    //                                 $('.show-atag').show();
    //                                 $('.valid_message').hide();

    //                                     return false;
    //                             }
                                        
    //                                 }
    //                 });
    //             }
    // });


 }

 var url2 = window.location.hostname+'/our-services/universal-microchip-register-new/';
     
  if (window.location.href.indexOf(url2) > -1) {
     
     $('#pname_input').blur(function(){
         var ids =$("input[name=universal_microchip_id]").val();
           var id = ids.replace(/\s/g, '');

             $.ajax({
                    url: ajaxurl,
                    method:"POST", 
                    dataType: 'json',
                    data:{
                      'smarttag_id_number': id, 
                      'action' : 'checkUniversalMicrochipId',
                    },
                     success: function(data) {
                        
                                          
                            if(data.status == '302'  && data.result == 'exist'){
                                console.log('1');

                                $('.valid_message').addClass('error');
                                $('.valid_message').removeClass('error_success');
                                $('.valid_message').css('color','red')
                                $('.valid_message').text(data.message);
                                $('.valid_message').show();
                                $('.show-atag').hide();
                                    return false;
                            }else{
                                console.log('3');
                                
                                $('.valid_message').hide();
                                $('.show-atag').hide();
                                    return true;
                            }
                                    
                     }
                });



     });
  }

    


});