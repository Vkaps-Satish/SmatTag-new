<?php

/*
 * Template Name: Search pet via phone/michrochip
 */
get_header();


if ( is_user_logged_in() ){
    $current_user = wp_get_current_user();
    $roles = $current_user->roles;  
     // print_r($roles);die;
    if( !$roles == 'pet_professional' || !in_array( 'pet_professional', $roles )){
        print('<div><div class="not-found-text width-100">This page is only for Pet-Professionals..</div></div>');
        die();
    }       
}else{
    print('<script>window.location.href="'.get_option('siteurl').'/pet-professionals-signup"</script>
            ');
    exit();    
}

  ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <style type="text/css">
        form#search-data input.search-data {
            width: 100%;
            padding: 11px 7px;
        }

        form#search-data .field-div {
            padding: 0px;
        }
        .search-form-box {
            width: 50%;
            margin: auto;
        }
        .search-flex {
            display: flex;
        }

        .field-div.wd-cus {
            width: auto;
        }
        .not-found.width-100 {
            left:12px;
            color:red;
           text-align: center;
            font-size:30px;
        }
        form .error, body .error{
            margin-top: 0;
        }
        @media only screen and (max-width: 767px) {
           .search-form-box {
              width: 100%;
              margin: auto;
          }
        }

    </style>
<body>
    <div class="container-wrap">
       <div class="container main-content">
        <div class="row">
            <div class="woo-sidebar col-sm-3">
        <?php echo do_shortcode("[stag_sidebar id='our-services']"); ?>
      </div>
       <div class="woo-sidebar col-sm-9">
            <form id="search-data" method="POST">
                <div class="contact-form" id="sec-cont-info">
                    <div class="search-form-box">
                    <!-- <div class="field-wrap three-fields-wrap"> -->
                        <label> Search</label>
                        <div class="search-flex">
                        <div class="field-div">
                            
                            <input type="text" name="search-data" placeholder="Search Via Phone/Michrochip" class="search-data"/>
                            <span class=" error error_searchBox"></span>
                        </div>
                        <div class="field-div wd-cus">
                           
                            <input type="submit" name="submit" class="submit" value="Search" />
                        </div>
                    </div>

                      
                        
                    </div>
                </div>
                </br>

                  <div class="search-row"></div> 
                  <br/>
                  <br/>
                  <br/>
                  <br/>
                  <br/>
                  <br/>
        </div>
    </div>
</div>
</div>
</body>


<script type="text/javascript">
    
    var error_search = false;

    function searchbox(){
        var searchbox = $('.search-data').val();
        var filter = /^\d*(?:\.\d{1,2})?$/;
        if(searchbox == ''){
            $('.error_searchBox').text('This field is required');
            error_search =  false;
        }else{
            $('.error_searchBox').text('');
            

            error_search =  true;
        }
    }

$('.search-data').blur(function(){
    searchbox();
});


$(document).ready(function(){
    $('.submit').click(function(){

 $('.loader-wrap').fadeIn();


        if(error_search == true){

           var data = new FormData();
            data.append('action', 'PetDataSearch');
            data.append('Petdata', $('.search-data').val());

            $.ajax({
                        type: 'POST',
                        url: ajaxurl,
                        data: data,
                        contentType: false,
                        processData: false,
                       success: function(response) {
                        $('.search-row').html(response);
                        return false;

                       },complete:function(){
                            $('.loader-wrap').fadeOut();
                        }
                    });
                       
          




        }else{
            console.log('This field is required');
        }

    });
});



</script>


</head>
</html>


<?php get_footer(); ?>