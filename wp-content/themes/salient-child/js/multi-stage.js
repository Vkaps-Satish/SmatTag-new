
$(document).ready(function(){

 


 var error_first = false;
    var error_first = false;
    var error_last = false;
    var error_email = false;
    var error_password = false;
    var error_country = false;
    var error_address = false;
    var error_city = false;
    var error_state = false;
    var error_zipcode = false;
    var error_phone = false;

    var error_michrochip = false;
    var error_conf_microchip_id = false;

    var error_pet_name = false;
    var error_pet_type = false;
    var error_primary_breed = false;
    var error_secondary_breed = false;
    var error_primary_color = false;
    var error_gender = false;

 $(document).find("body").on('blur', '.p_fst_name', function() {
    first_name();
 });


function first_name(){
   
 
        var  first=  $('.p_fst_name').val();
        if(first == ''){
            $('.error_first').text('This field is required');
            error_first = false;
        }else{
            $('.error_first').text('');
            error_first = true;
        }
   
  
}

 $(document).find("body").on('blur', '.p_lst_name', function() { 
    last_name();
 });

function last_name(){
  
 
        var  last =  $('.p_lst_name').val();
        if(last == ''){
            $('.error_last').text('This field is required');
            error_last = false;
        }else{
            $('.error_last').text('');
            error_last = true;
        }
     
}

  $(document).find("body").on('blur', '.p_email', function() { 
    email();
  });

function email(){
   
     
        var email =  $('.p_email').val();
        if(email == ''){
            $('.error_email').text('This field is required');
            error_email = false;
        }else if(!(/^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/).test(email)){
            $('.error_email').text('invalid email id');
            error_email = false;
        }else{
            $('.error_email').text('');
            error_email = true;
        }
   
 }   
    

  $(document).find("body").on('blur', '.password', function() { 
    password();

  });


function password(){
  
     
        var password =  $('.password').val();
        if(password == ''){
            $('.error_passeord').text('This field is required');
            error_password = false;
        }else if(password.length < 8){
            $('.error_passeord').text(' Password lenght should be 8 digit');
            error_password = false;
        }else{
            $('.error_passeord').text('');
            error_password = true;
        }


    
}
    

 $(document).find("body").on('blur', '.p_country', function() { 
    country();
 });


function country(){
  
 
    var country =  $('.p_country').val();
    if(country == ''){
        $('.error_country').text('This field is required');
        error_country = false;
    }else{
        $('.error_country').text('');
        error_country = true;
    }


   
}


 $(document).find("body").on('blur', '.p_add1', function() {
    address();
 });
 
function address(){
   
     
        var address =  $('.p_add1').val();
        if(address == ''){
            $('.error_address').text('This field is required');
            error_address = false;
        }else{
            $('.error_address').text('');
            error_address = true;
        }



} 

 $(document).find("body").on('blur', '.p_city', function() {
    city();
 });


function city(){
      
        var city =  $('.p_city').val();
        if(city == ''){
            $('.error_city').text('This field is required');
            error_city = false;
        }else{
            $('.error_city').text('');
            error_city = true;
        }


     
}


   $(document).find("body").on('blur', '.s-sate', function() {
    state();
});  

function state(){
 
     
        var state =  $('.s-sate').val();
        if(state == ''){
            $('.error_state').text('This field is required');
            error_state = false;
        }else{
            $('.error_state').text('');
            error_state = true;
        }


       
}

    $(document).find("body").on('blur', '.p_zipcode', function() { 

        zipcode();
    });
     
    


function zipcode(){
      
     
        var zipcode =  $('.p_zipcode').val();
        if(zipcode == ''){
            $('.error_zipcode').text('This field is required');
            error_zipcode = false;
        }else{
            $('.error_zipcode').text('');
            error_zipcode = true;
        }

   
}

    

    /* $(document).find("body").on('blur', '.p_prm_no', function() {
 
    var phone =  $(this).val();
    if(phone == ''){
        $('.error_primary_number').text('This field is required');
        error_phone = false;

    }else if((/\(?([0-9]{3})\)?([ .-]?)([0-9]{3})\2([0-9]{4})/).test(phone)){
        $('.error_primary_number').text('');
        error_phone = true;
    }else if(phone.length !=14){
        $('.error_primary_number').text('Please insert 10 digit number');
        error_phone = true;
    }


});
*/
  $(document).find("body").on('blur', '.microchip_id', function() { 
        microchip_id();

  });


function microchip_id(){

      var microchip_id =  $('.microchip_id').val();
      var regex = /^[0-9\s]*$/;

      var microchip_ids = microchip_id.replace(/\s/g, '');
    if(microchip_id == ''){
            $('.error_michrochip').text('This field is required');
            error_michrochip = false;
        }else if(microchip_ids.length != 15){
            $('.error_michrochip').text('Please insert 15 digit value');
                error_michrochip = false; 
        }else if(!regex.test(microchip_id)){
            $('.error_michrochip').text('Please enter only digits');
                error_michrochip = false; 
        }else{
            $('.error_michrochip').text('');
            error_michrochip = true;
        }
 
          
}

$('.break_number').keyup(function(e) {
        e.preventDefault();
        limitText(this, 18)
            var charCode = (e.which) ? e.which : event.keyCode    
            var foo = $(this).val().split(" ").join("");
                if (foo.length > 0) {
                        foo = foo.match(new RegExp('.{1,5}', 'g')).join(" ");
                }
                    $(this).val(foo);
});

function limitText(field, maxChar){
    var ref = $(field),
        val = ref.val();
    if ( val.length >= maxChar ){
        ref.val(function() {
            console.log(val.substr(0, maxChar))
            return val.substr(0, maxChar);       
        });
    }
}

$(document).find("body").on('blur', '.conf_microchip_id', function() { 
    conf_microchip_id();
 });


function conf_microchip_id(){
      
    var conf_microchip_id =  $('.conf_microchip_id').val();
    var regex = /^[0-9\s]*$/;
    var microchip_id =  $('.microchip_id').val();
    var conf_microchip_ids = conf_microchip_id.replace(/\s/g, '');
    if(conf_microchip_id == ''){
    $('.error_conf_microchip_id').text('This field is required');
        error_conf_microchip_id = false;
    }else if(conf_microchip_id != microchip_id ){
        $('.error_con_michrochip').text('Microchip Id Number and confirm Microchip Id number is not same');
        error_conf_microchip_id = false;
    }else if(microchip_ids.length != 15){
        $('.error_conf_microchip_id').text('Please insert 15 digit value');
        error_conf_microchip_id = false; 
    }else if(!regex.test(conf_microchip_ids)){
        $('.error_conf_microchip_id').text('Please enter only digits');
        error_conf_microchip_id = false; 
    }else{
        $('.error_conf_microchip_id').text('');
        error_conf_microchip_id = true;
    }
}

     $(document).find("body").on('blur', '.pet_name', function() {
        pet_name();

     });
 
function pet_name(){
       
     
        var pet_name =  $('.pet_name').val();
        if(pet_name == ''){
            $('.error_pet_name').text('This field is required');
            error_pet_name = false;
        }else{
            $('.error_pet_name').text('');
            error_pet_name = true;
        }


    
}

  
         $(document).find("body").on('blur', '.pet_type', function() {
            
            pet_type();
         });


function pet_type(){
     
     
        var pet_type =  $('.pet_type').val();
        if(pet_type == ''){
            $('.error_pet_type').text('This field is required');
            error_pet_type = false;
        }else{
            $('.error_pet_type').text('');
            error_pet_type = true;
        }


     
}

      $(document).find("body").on('blur', '.primary_breed', function() {
            primary_breed();
        });

     
function primary_breed(){
   

        var primary_breed =  $('.primary_breed').val();
        if(primary_breed == ''){
            $('.error_primary_breed').text('This field is required');
            error_primary_breed = false;
        }else{
            $('.error_primary_breed').text('');
            error_pet_name = true;
        }
     
}     
    $(document).find("body").on('blur', '.secondary_breed', function() { 

        secondary_breed();
    });
     
function secondary_breed(){
     
 
        var secondary_breed =  $('.secondary_breed').val();
        if(secondary_breed == ''){
            $('.error_secondary_breed').text('This field is required');
            error_secondary_breed = false;
        }else{
            $('.error_secondary_breed').text('');
            error_secondary_breed = true;
        }


  
}

/*  $(document).find("body").on('blur', '.primary_color', function() {
            primary_color();
    });

*/






      
function primary_color(){
  
        var primary_color =  $('.primary_color').val();
        if(primary_color == ''){
            $('.error_primary_color').text('This field is required');
            error_primary_color = false;
        }else{
            $('.error_primary_color').text('');
            error_primary_color = true;
        }


     
}    
       /* $(document).find("body").on('blur', '.gender', function() {
             gender();

        });*/
   
function gender(){   
    
        var gender =  $('.gender').val();
        if(gender == ''){
            $('.error_gender').text('This field is required');
            error_gender = false;
        }else{
            $('.error_gender').text('');
            error_gender = true;
        }


   
   
}





  $('.save-all').on('click',function(){


        first_name();
        last_name();
        email();
        password();
        country();
        address();
        city();
        state();
        zipcode();
        microchip_id();
        conf_microchip_id();
        pet_name();
        pet_type();
        primary_breed();
        secondary_breed();
        




               if( (error_first == true) && (error_last == true)  && (error_email == true) 
                && (error_country == true) && (error_address == true) && (error_city == true) && (error_state == true) &&
                (error_zipcode == true ) && (error_michrochip == true) && (error_conf_microchip_id == true) && (error_password == true) &&( error_pet_name == true) &&
                ( error_pet_type == true) ){

                         $('#Multiprofileuser1').submit();
                 }
});














/*$('#Multiprofileuser1').on('submit', function (e) {


  var data  = new FormData();
    var formData = $('#Multiprofileuser1 .step-form-box');

            if ($('#Multiprofileuser1 .step-form-box').length > 0 ) {
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
            }


             data.append('action','Create_Multiple_Customers');

            $.ajax({
                type: 'POST',
                url: ajaxurl,
                data: data,
                contentType: false,
                processData: false,
                success: function(response) {
                    console.log(response);
                    return false;
                    var Obj = JSON.parse(response);
                    window.location = "<?php echo site_url(); ?>"+Obj.url;
                }
            }); 



});*/





























    $(document).find("body").on('click', '.btn-next', function() {


    first_name();
    last_name();
    email();
    password();
    country();
    address();
    city();
    state();
    zipcode();
    microchip_id();
    conf_microchip_id();
    pet_name();
    pet_type();
    primary_breed();
    secondary_breed();
   



if( (error_first == true) && (error_last == true)  && (error_email == true) 
    && (error_country == true) && (error_address == true) && (error_city == true) && (error_state == true) &&
    (error_zipcode == true ) && (error_michrochip == true) && (error_conf_microchip_id == true) && (error_password == true) &&( error_pet_name == true) &&
    ( error_pet_type == true) ){



            $('#step-1').hide();
            $('.moregroup1').hide();
            $('.first-step').hide();
            $('.steps-5-show').show();


           /* $.each($('#Multiprofileuser1 .review-data'), function(index) {
            
                 var name = $(this).attr('name');
                     console.log(name);
                      if(name == 'p_fst_name'){
                       $('.pet_owner_name').text($(this).val());   
                      }
                    if(name == 'p_email'){
                       $('.pet_owner_email').text($(this).val());   
                      }
                    if(name == 'p_add1'){
                       $('.pet_owner_address').text($(this).val());   
                      }
                    if(name == 'p_prm_no'){
                       $('.pet_owner_pri_number').text($(this).val());   
                      }
                     if(name == 'p_sec_no'){
                       $('.pet_owner_sec_number').text($(this).val());   
                      }
             });
*/

                /*pet info*/

    


}else{
    alert('Required Fiels is not empty');
}




    });



 /*$('#Multiprofileuser1').on('submit', function (e) {
      $('.loader-wrap').fadeIn();

           e.preventDefault();
            $.ajax({
                     type: 'POST',
                     url: ajaxurl,
                     data: new FormData(this),
                     contentType: false,
                     processData: false,
                     success: function(response) {


                           var product_id = localStorage.getItem("products_id");
                            var  data1 = { 
                                             'product_id': 75193, 
                                            'action' : 'AddSubscriptionPlan',
                                        };
                                $.ajax({
                                         type: 'POST',
                                        url: ajaxurl,
                                         data: data1,
                                      
                                     success: function(response) {
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
                                             var resResult = 'Users and pets profile and created Successfully';
                                                $('#closed').attr('href','/home');
                                                $('.popup-wrap').fadeIn();
                                                $('.popup-content').append(resResult);
                                         }
                                });

                        }
            }); 


    });    
*/






$('#Multiprofileuser1').on('submit', function (e) {

            e.preventDefault();
            var data     = new FormData();
            var formData = $('#Multiprofileuser1 .generate-multiple-owner');

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

                    $(this).find('.pet-info-data').each(function(j){
                        $(this).find(".pet-data").each(function(k){
                            data.append("pets_info["+i+"]["+j+"]["+$(this).attr('name')+"]", $(this).val());
                        })
                    });
                });


     


     


             data.append('action','multiCustomerPetPro');

            $.ajax({
                type: 'POST',
                url: ajaxurl,
                data: data,
                contentType: false,
                processData: false,
                success: function(response) {
                    console.log(response);
                    return false;
            
                }
            });




});




















//  $('.multiple_register').click(function(){



//     first_name();
//     last_name();
//     email();
//     //password();
//     country();
//     address();
//     city();
//     state();
//     zipcode();
//     microchip_id();
//     conf_microchip_id();
//     pet_name();
//     pet_type();
//     primary_breed();
//     secondary_breed();
//     primary_color();
//     gender();




// if( (error_first == true) && (error_last == true)  && (error_email == true) 
//     && (error_country == true) && (error_address == true) && (error_city == true) && (error_state == true) &&
//     (error_zipcode == true )){


   
// /*var error_state = false;
//     var error_zipcode = false;
//     var error_phone = false;

//     var error_michrochip = false;
//     var error_conf_microchip_id = false;

//     var error_pet_name = false;
//     var error_pet_type = false;
//     var error_primary_breed = false;
//     var error_secondary_breed = false;
//     var error_primary_color = false;
//     var error_gender = false;
// */
//      var profile = [];


//         $('#output').text('');
//         $('.loader-wrap').fadeIn();

//         // steps form data of smartTag      
//         var imageData = new FormData();

//         var fd = new FormData();
//         var ufd = new FormData();
      
//         var files_data = $('#Multiprofileuser1 .files-data');
//         var data = "";
//         window.resResult = new Array();
//         window.UsrID = null;
//         // Loop through each data and create an array file[] containing our files data.
//         window.checkPorduct = 0;
//         $.each($(files_data), function(i, obj) {
//             $.each(obj.files, function(j, file) {
//                fd.append('files[' + j + ']', file);


//             })
//         });

//         // our AJAX identifier
//         ufd.append('action', 'new_register_user');
//         fd.append('action', 'Create_Multiple_Pet_profile');


//         $.each($('#Multiprofileuser1 .user-data'), function() {
//             ufd.append($(this).attr('name'), $(this).val());
//               //baseFn(ajaxurl,ufd,fd);
//         });



     
//         $.each($('#Multiprofileuser1 .text-data'), function(index, value) {
//             console.log($(this).attr('name'));
//               fd.append($(this).attr('name'), $(this).val());
             
//         });


     
//         $.each($('#Multiprofileuser1 .pet-info-data'), function(index, elemt) {
            
//             var pet_data = {};
//             var files = {};
//             $(elemt).find(".text-data").each(function(index, value) {
//                 pet_data[$(this).attr('name')] = $(this).val();
//             });


//             var files_data =  $(this).find('.files-data');
//             $.each(files_data, function(i, file) {
//             imageData.append('file', file);
//         });


//           /*  var files_data = $(this).find('.files-data');
                
//             $.each($(files_data), function(i, obj) {
//                 $.each(obj.files, function(j, file) {
//                    pet_data['files[' + j + ']'] = file;
//                 })
//             });
// */
           
//             profile.push(pet_data);
            
//             profile.push(imageData);    

//         });






//         // var myObject = Object.assign({}, profile);

//         console.log("profile", profile);
//         fd.append('profile_data',JSON.stringify(profile));

//         // for (const a of profile) {
//         //     fd.append("arr[]", a);
//         // }



                
//         $.ajax({
//             type: 'POST',
//             url: ajaxurl,
//             data: ufd,
//             contentType: false,
//             processData: false,
//             success: function(response) {
//                 var Obj      = JSON.parse(response);
//                 var UsrID    = Obj.usrId;
//                 fd.append('userId',UsrID); 
//                 resResult.push(Obj.message); 
//                 $.ajax({
//                         type: 'POST',
//                         url: ajaxurl,
//                         data: new FormData(this),
//                         contentType: false,
//                         processData: false,
//                         success: function(response) {

                            

//                              var Obj = JSON.parse(response);
//                             resResult.push(Obj.message); 


//                 var product_id = localStorage.getItem("products_id");
//                    var  data1 = { 
//                                     'product_id': 75193, 
//                                     'action' : 'AddSubscriptionPlan',
//                                 };
//                     $.ajax({
//                              type: 'POST',
//                              url: ajaxurl,
//                              data: data1,
                           
//                          success: function(response) {
//                              $('.loader-wrap').fadeOut();
//                              var Obj = JSON.parse(response);
//                              resResult.push(Obj.message); 
//                              window.checkPorduct++;

//                              finalResponseMsg();  
//                         }
//                     });









//                         }
//                     });
//                 }
        
//             });
//     }else{
//         return false;
//     }
//     });
// });
             


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

};












});
  





            