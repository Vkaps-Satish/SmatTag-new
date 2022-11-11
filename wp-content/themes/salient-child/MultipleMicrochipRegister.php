<?php
  /*
   * Template Name:  Multiple Mircochip registery
  */
  get_header();
  $getTypes = get_top_parents('pet_type_and_breed');
  $single = true;
  $user_id = get_current_user_id();
  $countries_obj = new WC_Countries();
  $countries = $countries_obj->__get('countries');
  $current_user = get_user_by('id', $user_id);
  $first_name = get_user_meta($user_id, 'first_name', $single);
  $last_name = get_user_meta($user_id, 'last_name', $single);
  $email = $current_user->user_email;
  $primary_country = get_user_meta($user_id, 'primary_country', $single);
  $primary_address_line1 = get_user_meta($user_id, 'primary_address_line1', $single);
  $primary_address_line2 = get_user_meta($user_id, 'primary_address_line2', $single);
  $primary_city = get_user_meta($user_id, 'primary_city', $single);
  $primary_state = get_user_meta($user_id, 'primary_state', $single);
  $primary_postcode = get_user_meta($user_id, 'primary_postcode', $single);
  $primary_home_number = get_user_meta($user_id, 'primary_home_number', $single);
  $primary_home_number_code = get_user_meta($user_id, 'primary_phone_country_code', $single);
  $primary_cell_number = get_user_meta($user_id, 'primary_cell_number', $single);
  $primary_cell_number_code = get_user_meta($user_id, 'primary_cell_country_code', $single);
  $Sfirst_name = get_user_meta($user_id, 'secondary_first_name', $single);
  $Slast_name = get_user_meta($user_id, 'secondary_last_name', $single);
  $Semail = get_user_meta($user_id, 'secondary_email', $single);
  $Sprimary_country = get_user_meta($user_id, 'secondary_country', $single);
  $Sprimary_address_line1 = get_user_meta($user_id, 'secondary_address_line1', $single);
  $Sprimary_address_line2 = get_user_meta($user_id, 'secondary_address_line2', $single);
  $Sprimary_city = get_user_meta($user_id, 'secondary_city', $single);
  $Sprimary_state = get_user_meta($user_id, 'secondary_state', $single);
  $Sprimary_postcode = get_user_meta($user_id, 'secondary_postcode', $single);
  $Sprimary_home_number = get_user_meta($user_id, 'secondary_home_number', $single);
  $Sprimary_cell_number = get_user_meta($user_id, 'secondary_cell_number', $single);
  $secondary_cell_country_code = get_user_meta($user_id, 'secondary_cell_country_code', $single);
  $secondary_phone_country_code = get_user_meta($user_id, 'secondary_phone_country_code', $single);


//Redirect user if user not login or not petprofessional
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

<!--






  <?php if (is_user_logged_in()) { ?>
  	<script type="text/javascript">
  		jQuery(document).ready(function(){
  			$.each($('#profileuser1 .text-data'), function() {
  				
  				var name = $(this).attr('name');
  				$("#"+name).text(localStorage.getItem(name));
  			
  				if(name == "pet_type" || name == "primary_breed" || name == "secondary_breed" || name == "gender" || name == "size"){
  					if($("#profileuser1 select[name='"+name+"']").hasClass('text-data')){
  						var optionValue  = localStorage.getItem(name);
  
  						$('#profileuser1 select[name="'+name+'"] option[value="'+optionValue+'"]').attr('selected', true);
  					}
  					
  				}else{
  					$( "#profileuser1 input[name='"+name+"']").val(localStorage.getItem(name));
  				}
  
  			});
  
  			$.each($('#profileuser1 .text-data'), function() {
  				var fieldName = $(this).attr('name');
  	        	localStorage.removeItem(fieldName);
  	        });
  
  		})
  	</script>
  	<?php
    } ?> -->
<div class="container-wrap">
  <div class="container main-content">
    <div class="row">
      <div class="woo-sidebar col-sm-3">
        <?php echo do_shortcode("[stag_sidebar id='our-services']"); ?>
      </div>
      <div class="woo-content col-sm-9" id="woo-content">
        <?php if (has_post_thumbnail($post->ID)): ?>
        <?php $image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'single-post-thumbnail'); ?>
        <div class="page-image">
          <img src="<?php echo $image[0]; ?>" alt="image" />
        </div>
        <?php
          endif; ?>
        <div class="page-heading">
          <h1>Register SmartTag Microchip(s)</h1>
        </div>
           <form id="Multiprofileuser1" method="POST" enctype="multipart/form-data">
        <section class="multi-step-form generate-multiple-owner" id="generate-multiple-owner" index= '1'>
        	<div class="pet-owners">
        		<div class="acc-blue-head">
                 	 Pet Owner <span class="owner-number">1</span>
                </div>
	       
	          <!-- 	<input type="hidden" name="action" value="Create_mul_Pet_profile"> -->
	            <!--   <script src='https://www.google.com/recaptcha/api.js'></script> -->
	            
		            <fieldset aria-label="Step One" tabindex="-1" id="step-1" class="step-form-box site-tabs-wrap main-div">
		              <div class="contact-form" id="pro-info2">
		                <?php //if (is_user_logged_in()) { ?>
		                 <!--  <div class="field-wrap two-fields-wrap">
		                    <input type="hidden" name="UsrLoginId" class="user-data" value="<?php echo $user_id; ?>" />
		                    <div class="field-div">
		                      <label>*First Name </label>
		                      <input type="text" name="p_fst_name" placeholder="First Name" class="user-data p_fst_name review-data" id="u-first" required="" value="<?php echo $first_name; ?>" />
		                      <span class="error_first error error"></span>
		                    </div>
		                    <div class="field-div">
		                      <label>*Last Name </label>
		                      <input type="text" name="p_lst_name" placeholder="Last Name" class="user-data p_lst_name review-data" id="u-last" required="" value="<?php echo $last_name; ?>"   />
		                         <span class="error_last"></span>
		                    </div>
		                  </div>
		                  <div class="field-wrap two-fields-wrap">
		                    <div class="field-div">
		                      <label>*Email </label>
		                      <input type="email" name="p_email" placeholder="Enter Email Address" class="user-data p_email review-data" id="u-email" required="" disabled value="<?php echo $email; ?>"    />
		                      <span class="error_email error"></span>
		                      <div class="checkMailexist" style="display: none;">
		                         <span class="already error">Email already exist</span>
		                         <a id="loginform" class="" href="javascript:void(0)"> Click here to login.</a>
		                     </div>
		                    </div>
		                    <div class="field-div">
		                      <label>*Select Your Country </label>
		                      <select name="p_country" class="user-data address-country p_country" id="u-country" required="" >
		                        <option value="">Select</option>
		                        <?php foreach ($countries as $key => $value) { ?>
		                        <option value="<?php echo $key; ?>" <?php if (!empty($primary_country) && $primary_country == $key) {
		                          echo 'selected="selected"';
		                          } ?>><?php echo $value; ?></option>
		                        <?php
		                          } ?>
		                      </select>
		                         <span class="error_country error"></span>
		                    </div>
		                  </div>
		                  <div class="field-wrap two-fields-wrap">
		                    <div class="field-div">
		                      <label>*Address</label>
		                      <input type="text" name="p_add1" placeholder="Address line 1" class="user-data p_add1 review-data" id="u-add1" required="" value="<?php echo $primary_address_line1; ?>"  />
		                      <span class="error_address error"></span>
		                    </div>
		                    <div class="field-div">
		                      <label></label>
		                      <input type="text" name="p_add2" placeholder="Address line 2 (optional)" class="user-data p_add2" id="u-add2" value="<?php echo $primary_address_line2; ?>"  />

		                    </div>
		                  </div>
		                  <div class="field-wrap two-fields-wrap">
		                    <div class="field-div">
		                      <input type="text" name="p_city" placeholder="City" class="user-data p_city" id="u-city1 " required="" value="<?php echo $primary_city; ?>" />
		                        <span class="error_city error"></span>
		                    </div>
		                    <div class="field-div">
		                      <div class="field-wrap two-fields-wrap">
		                        <div class="field-div">
		                          <label class="statevalidate" style="display: none"></label>
		                          <select name="p_state" class="user-data address-state s-sate  p_state rq" data-val="<?php echo $primary_state; ?>"></select>
		                           <span class="error_state"></span>
		                        </div >
		                        <div class="field-div">
		                          <input type="text" name="p_zipcode" placeholder="Zipcode" class="user-data p_zipcode" id="u-zip" required="" value="<?php echo $primary_postcode; ?>" />
		                           <span class="error_zipcode error"></span>
		                        </div>
		                      </div>
		                    </div>
		                  </div>
		                  <div class="field-wrap two-fields-wrap">
		                    <div class="field-div phone-div">
		                      <label>*Primary Phone Number </label>
		                      <input type="text" name="p_prm_no" placeholder="(555) 123-1234" class="user-data phone-number p_prm_no review-data" id="p-phone"  required="" value="<?php echo $primary_home_number; ?>"/>
		                      <input type="hidden" name="p_prm_no_code" placeholder="(555) 123-1234" class="user-data" value="<?php echo $primary_home_number_code; ?>" />
		                         <span class="error_primary_number error"></span>
		                    </div>
		                    <div class="field-div phone-div">
		                      <label>Secondary Phone Number </label>
		                      <input type="text" name="p_sec_no" placeholder="(555) 123-1234" class="user-data phone-number p_sec_no review-data" id="ps-phone" value="<?php echo $primary_cell_number; ?>" />
		                      <input type="hidden" name="p_sec_no_code" placeholder="(555) 123-1234" class="user-data" value="<?php echo $primary_cell_number_code; ?>"/>
		                    </div>
		                  </div> -->
		                <?php
		                 /* } else {*/ ?>
		                  <div class="field-wrap two-fields-wrap">
		                    <div class="field-div">
		                      <label>*First Name</label>
		                      <input type="text" name="p_fst_name" placeholder="First Name" class="user-data p_fst_name review-data" id="u-first" required="" value="" />
		                      <span class="error_first error"></span>
		                    </div>
		                    <div class="field-div">
		                      <label>*Last Name </label>
		                      <input type="text" name="p_lst_name" placeholder="Last Name" value="" class="user-data p_lst_name review-data" id="u-last" required=""  />
		                      <span class="error_last error"></span>
		                    </div>
		                  </div>
		                  <div class="field-wrap two-fields-wrap">
		                    <div class="field-div">
		                      <label>*Email </label>
		                      <input type="email" name="p_email" placeholder="Enter Email Address" value="" class="user-data p_email review-data"  id="u-email" required=""  />
		                      <span class="error_email error"></span>
		                       <div class="checkMailexist" style="display: none;">
		                        
		                         <span class="already error">Email already exist</span>
		                         <!-- <a id="loginform" class="" href="javascript:void(0)"> Click here to login.</a> -->
		                     </div>
		                    
		                    </div>
		                    <div class="field-div">
		                      <label>*Password </label>
		                      <input type="password" name="password" placeholder="Enter Password" class="user-data password" required="" minlength="8" />
		                      <span class="error_passeord error"></span>
		                    </div>
		                  </div>
		                  <div class="field-wrap">
		                    <div class="field-div">
		                      <label>*Select Your Country </label>
		                      <select name="p_country" class="user-data address-country p_country" id="u-country" required="">
		                        <option value="">Select</option>
		                        <?php foreach ($countries as $key => $value) { ?>
		                        <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
		                        <?php
		                          } ?>
		                      </select>
		                      <span class="error_country"></span>
		                    </div>
		                  </div>
		                  <div class="field-wrap two-fields-wrap">
		                    <div class="field-div">
		                      <label>*Address</label>
		                      <input type="text" name="p_add1" placeholder="Address line 1" class="user-data p_add1 review-data" id="u-add1" required="" value=""  />
		                          <span class="error_address error"></span>
		                    </div>
		                    <div class="field-div">
		                      <label></label>
		                      <input type="text" name="p_add2" placeholder="Address line 2 (optional)" class="user-data p_add2" id="u-add2" value=""  />
		                    </div>
		                  </div>
		                  <div class="field-wrap two-fields-wrap">
		                    <div class="field-div">
		                      <input type="text" name="p_city" placeholder="City" class="user-data p_city" id="u-city1" required="" value="" />
		                       <span class="error_city error"></span>
		                    </div>
		                    <div class="field-div">
		                      <div class="field-wrap two-fields-wrap">
		                        <div class="field-div">
		                          <label style="display: none;" class="statevalidate"></label>
		                          <select name="p_state" class="user-data address-state p_state s-sate rq" data-val=""></select>
		                            <span class="error_state error"></span>
		                        </div>
		                        <div class="field-div">
		                          <input type="text" name="p_zipcode" placeholder="Zipcode" class="user-data p_zipcode" id="u-zip" required="" value="" />
		                            <span class="error_zipcode error"></span>
		                        </div>
		                      </div>
		                    </div>
		                  </div>
		                  <div class="field-wrap two-fields-wrap">
		                    <div class="field-div phone-div">
		                      <label>Primary Phone Number </label>
		                      <input type="text" name="p_prm_no" placeholder="(555) 123-1234" class="user-data phone-number p_prm_no review-data" id="p-phone" value="" />
		                      <input type="hidden" name="p_prm_no_code" placeholder="(555) 123-1234" class="user-data" />
		                      <span class="error_primary_number error"></span>
		                    </div>
		                    <div class="field-div phone-div">
		                      <label>Secondary Phone Number </label>
		                      <input type="text" name="p_sec_no" placeholder="(555) 123-1234" class="user-data phone-number p_sec_no review-data" id="ps-phone" value="" />
		                      <input type="hidden" name="p_sec_no_code" placeholder="(555) 123-1234" class="user-data" />
		                    </div>
		                  </div>
		                  <?php
		               // } ?>
		              </div>
		              <div class="contact-form pet-info-data" id="pro-info" index = '0'>
		              	<h4 class="pet-heading">Pet Information 1</h4><span class="div_count"></span>
		                <div class="field-wrap two-fields-wrap"><span class="remove-genrate-div"></span>
		                  <div class="field-div">
		                    <label>*Microchip Id Number</label>
		                    <input type="text" placeholder="Microchip Id Number" name="microchip_id" class="text-data sname_input-MC microchip_id change-pet-cont reivew_pet_info microchip_number pet-data" id="sname_input" value="<?=(isset($_GET['id'])) ? $_GET['id'] : "" ?>" />	 <span class="valid_message "></span><span class="error" id="error"></span>
		                    <a href="<?php echo get_site_url() . '/our-services/universal-microchip-register-new/'; ?>" class="show-atag error"style="display: none;">Click here</a>
		                    <span class="error_michrochip error"></span>
		                  </div>
		                  <div class="field-div">
		                    <label></label>
		                    <input type="text" name="conf_microchip_id" placeholder="Confirm Microchip Id Number" class="text-data conf_microchip_id pet-data"  value="<?=(isset($_GET['id'])) ? $_GET['id'] : "" ?>" />
		                      <span class="error_con_michrochip error"></span>
		                  </div>
		                </div>
		                <div class="field-wrap two-fields-wrap">
		                  <div class="field-div">
		                    <label>*Pet Name</label>
		                    <input type="text" name="pet_name" class="text-data pet_name reivew_pet_info change-pet-cont pet-data" id="pname_input" placeholder="Enter Pet Name" required="" />
		                     <span class="error_pet_name error"></span>
		                  </div>
		                  <div class="field-div">&nbsp;</div>
		                </div>
		                <div class="field-wrap two-fields-wrap">
		                  <div class="field-div">
		                    <label>*Pet Type & Breed </label>
		                    <div class="field-wrap two-fields-wrap">
		                      <div class="field-div">
		                        <select name="pet_type" class="text-data pet_type reivew_pet_info change-pet-cont pet-data" id="pettype" required=""  >
		                          <option value="">Type</option>
		                          <?php foreach ($getTypes as $key => $value) { ?>
		                          <option value="<?=$value['term_id'] ?>"><?=$value['name'] ?></option>
		                          <?php
		                            } ?>
		                        </select>
		                         <span class="error_pet_type error"></span>
		                      </div>
		                      <div class="field-div Pet_Type_Breed " style="display:none;">
		                        <select name="primary_breed" class="text-data primary_breed pet-data" id="breedid" required="" >
		                          <option value="">Breed</option>
		                        </select>
		                         <span class="error_primary_breed error"></span>
		                      </div>
		                    </div>
		                  </div>
		                  <div class="field-div Pet_Type_Breed " style="display:none;">
		                    <label>Secondary Breed</label>
		                    <select name="secondary_breed" class="text-data secondary_breed pet-data" id="sbreedid" >
		                      <option value="">Breed</option>
		                    </select>
		                     <span class="error_secondary_breed error"></span>
		                  </div>
		                </div>
		                <div class="step-accordion">
		                  <h4 class="step-acc-head" id="sec-form"><i class="fa fa-plus"></i> Show Extra pet Information</h4>
		                  <div class="step-acc-content" style="display: none";>
		                    <div class="field-wrap two-fields-wrap">
		                      <div class="field-div">
		                        <label>Primary Color</label>
		                        <select name="primary_color" class="text-data primary_color pet-data" id="pcolor"  step='Any'>
		                          <option value="">Select Color</option>
		                          <option value="1">Black</option>
		                          <option value="2">Blue</option>
		                          <option value="3">Brown</option>
		                          <option value="4">Gold</option>
		                          <option value="5">Gray</option>
		                          <option value="6">Orange</option>
		                          <option value="7">Red</option>
		                          <option value="8">Sliver</option>
		                          <option value="9">Tan</option>
		                          <option value="10">White</option>
		                          <option value="11">Yellow</option>
		                        </select>
		                        <span class="error_primary_color error"></span>
		                      </div>
		                      <div class="field-div">
		                        <label>Secondary Color(s)</label>
		                        <select name="secondary_color" class="text-data secondary_color pet-data" id="scolor" >
		                          <option value="">Select Color</option>
		                          <option value="1">Black</option>
		                          <option value="2">Blue</option>
		                          <option value="3">Brown</option>
		                          <option value="4">Gold</option>
		                          <option value="5">Gray</option>
		                          <option value="6">Orange</option>
		                          <option value="7">Red</option>
		                          <option value="8">Sliver</option>
		                          <option value="9">Tan</option>
		                          <option value="10">White</option>
		                          <option value="11">Yellow</option>
		                        </select>
		                          <span class="error_secondary_color error"></span>
		                      </div>
		                    </div>
		                    <div class="field-wrap two-fields-wrap">
		                      <div class="field-div">
		                        <div class="field-wrap two-fields-wrap">
		                          <div class="field-div">
		                            <label>Gender</label>
		                            <select name="gender" class="text-data gender reivew_pet_info change-pet-cont pet-data" id="pgender"  />
		                              <option value="">Select</option>
		                              <option value="male">Male</option>
		                              <option value="Female">Female</option>
		                            </select>
		                             <span class="error_gender error"></span>
		                          </div>
		                          <div class="field-div">
		                            <label>Size</label>
		                            <select name="size" class="text-data size pet-data" id="psize">
		                              <option value="">Select</option>
		                              <option value="1">Small</option>
		                              <option value="2">Medium</option>
		                              <option value="3">Large</option>
		                            </select>
		                                 <span class="error_size error"></span>
		                          </div>
		                        </div>
		                      </div>
		                      <div class="field-div">
		                        <label>Pet Date of Birth</label>
		                        <input type="date" name="pet_date_of_birth" id="pet-dob1-1" placeholder="mm/dd/yyyy" autocomplete="off" class="input-10 input text-data date-mnth-yer pet-data">
		                      </div>
		                    </div>
		                    <div class="field-wrap two-fields-wrap">
		                      <div class="field-div">
		                        <label class="auto-height">
		                        <?php __('Upload Pet Image)', 'cvf-upload'); ?>
		                        </label>
		                        <label>Upload Pet Image</label>
		                        <input type="file" name="files" class="files-data pet-image pet-data"  multiple id="imgInp" />
		                      </div>
		                      <div class="field-div">
		                        <label></label>
		                        <div class="field-notice">Files must be less than 2MB.
		                          <br>Allowed file types .png/ .gif/ .jpg/ .jpeg
		                        </div>
		                      </div>
		                    </div>
		                  </div>
		                </div>
		              </div>
		              
		            </fieldset>
	            <div class="moregroup1"></div>
	            <div class="step-btns first-step">
	              <button class="btn btn-default add_field_clone addsection"  type="button" aria-controls="step-1"><i class="fa fa-plus" aria-hidden="true"></i> Add Pet Information</button>
	             
	              <button class="btn btn-default btn-next email_already"  type="button" aria-controls="step-3">Next <i class="fa fa-caret-right"></i></button>
	            </div>
	            

	            <fieldset aria-label="Step Five" tabindex="-1"  class="steps-5-show" id="step-5" class="step-form-box">
					<p>	<strong>Please review that your information is correct.</strong>
						<br>You can edit this information if you need to.</p>
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
                                                <strong id=" ">Cell Phone Number: </strong><span id="" class="phone-number12"></span></br>
                                                <strong id="Insurance">Full Name: </strong><span id="review_name" class="review_name"></span></br>
                                                <strong id="Insurance">Address: </strong><span id="review_address" class="review_address"></span></br>
                                                <strong id="Insurance">Primary Contact Email: </strong><span id="review_email" class="review_email"></span></br>
                                                <strong id="Insurance">Secondary Contact Name: </strong><span id="MicNum" class="s_review_name"></span></br>
                                                <strong id="Insurance">Secondary Contact Phone Number: </strong><span id="MicNum" class="s_phone_number"></span></br>   
                                                <strong id="Insurance">Secondary Contact Email: </strong><span id="MicNum" class="s_revirw_email"></span></br>  
                                 
                                                <strong class="review-phone"> Contact Phone Number: </strong><span id="MicNum" class="s_revirw_number"></span></br>   
                                               
                                            </div>
                                            <div class="col-sm-12">
                                                <div id="Informations">
                                                    <div class="Information">
                                                        <h4 class="step-acc-head">Pet Information: </h4>
                                                        <strong>Microchip Number: </strong><span id="MicNum" class="microchip_number"></span></br>   

                                                        <strong>Pet Name: </strong><span id="PetNam" class="pet_name"></span></br>   

                                                        <strong>Gender: </strong><span id="PetGn" class="gender"></span></br>  

                                                        <strong>Pet Type: </strong><span id="PetPrPln" class="pet_type"></span></br>  


                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

					<div class="step-btns">
						<button class="btn btn-default btn-prev" type="button" aria-controls="step-1"><i class="fa fa-caret-left"></i> Back</button>
						 <input class="btn btn-default btn-next RegBrndMicrochip email_already" type="submit" aria-controls="step-3" style="color:#dc2727;" value="Submit">

					</div>

				</fieldset>
			
	      </div>
	    </section>
        <div class="more-petOwner"></div>
        </form>
      </div>
      <?php //nectar_pagination();
        ?>
    </div>
     <div class="col-sm-12">
                <div class="header-right">
                    <button class="btn site-btn site-btn-blue add-pet-owner"><i class="fa fa-plus"></i> Add Another Pet Owner</button>
                    <button type="submit" class="site-btn-red save-all"> PURCHASE ALL </button>
                </div>
            </div>
    <!--/row-->
  </div>
  <!--/container-->
</div>
<!--/container-wrap-->
<script type="text/javascript">
  $(document).ready(function(){
  	$('#selectType').find('.pro-data').addClass('select_type');
  	$('#selectSize').find('.pro-data').addClass('select_size');
  
  		var select_list_select_size = jQuery('.select_size').children(".list").find('.selected').text();
  		if (select_list_select_size == 'Small (1 in / 2.54 cm)') {
  		    $('.custom-radio-box bone, .custom-radio-img').each(function(i, j) {
  		        var select_list_height = jQuery('.select_type').children(".list").find('.selected').text();
  		      
  		        if (select_list_height == 'Brass Bone') {
  					if (i == 13 || i == 14 || i == 15 || i == 16 || i == 17 || i == 18 || i == 19) {
  						$(this).hide();
  		               
  		            }
  		        }else if (select_list_height == 'Brass Circle') {
  
  		            if (i == 7) {
  		                $(this).hide();
  		                
  		            }
  		        }
  
  		    });
  		} 
  
  	$('.select_size, .list').change(function() {
  
  	var select_list_select_size = jQuery('.select_size').children(".list").find('.selected').text();
  	if (select_list_select_size == 'Small (1 in / 2.54 cm)') {
  		$('.custom-radio-box bone, .custom-radio-img').each(function(i, j) {
  			var select_list_height = jQuery('.select_type').children(".list").find('.selected').text();
  		
  
  			if (select_list_height == 'Brass Bone') {
  
  
  				
  
  				if (i == 13 || i == 14 || i == 15 || i == 16 || i == 17 || i == 18 || i == 19) {
  
  
  
  					$(this).hide();
  					$('.large-tag').hide();
  				}
  			} else if (select_list_height == 'Brass Circle') {
  
  				if (i == 7) {
  					$(this).hide();
  					
  				}
  			}
  
  		});
  	} else {
  
  		var select_list_height = jQuery('.select_type').children(".list").find('.selected').text();
  
  		$('.custom-radio-box bone, .custom-radio-img').each(function(i, j) {
  			var select_list_height = jQuery('.select_type').children(".list").find('.selected').text();
  			if (select_list_height == 'Brass Bone') {
  				if (i == 13 || i == 14 || i == 15 || i == 16 || i == 17 || i == 18 || i == 19) {
  					$(this).show();
  					
  				}
  			} else if (select_list_height == 'Brass Circle') {
  
  				if (i == 7) {
  
  					$(this).show();
  				
  				}
  			}
  
  		});
  
  	}
  
  	});
  
  
  
  });
</script>
<script type="text/javascript">
  $(document).ready(function(){
  
  	var sectionsCount = 0;
  	var new_heading = 0;
  	var Info = $('#Informations .Information:first').clone();
	var x = 1;

	
  	$(document).find("body").on("click",".add_field_clone",function(){
  		
  	 	sectionsCount++;
  		var heading_count = $(this).parents(".pet-owners").find(".pet-heading").length;
  		console.log("heading_count", heading_count);

  		var new_heading = "Pet Infomation"+' '+parseInt(heading_count+1);
		
		var clone = $("#pro-info").clone();
  		$(clone).attr("index", sectionsCount);
   		$(clone).find("input[type=text]").val("");

   		$(clone).find('.pet-heading').text( new_heading);
       	

	    $(clone).find('.remove-genrate-div').append('<div class="custom_fields"><div class="btn_row remove_field">Remove </div></div>');
    	
    	
	
		var moregroup1 = $(this).parents(".pet-owners").find('.moregroup1');
		$(clone).appendTo(moregroup1);
	

		Info = Info.clone().find('span').each(function () {
        	// var INFOId = this.id + sectionsCount;
        	var INFOId = this.id + sectionsCount;
        this.id = INFOId;
		}).end().appendTo("#Informations");

        var InfoSection = $('#Informations').children().last();
        // console.log('latsection'+lastSection);
        InfoSection.attr('class', 'Information' + sectionsCount);
   		// .appendTo('.moregroup1');
});
  	

$(document).find("body").on("click", ".remove_field", function(e) {
 	//user click on remove text
    e.preventDefault();
    var index =  $(this).closest('.pet-info-data').attr("index");
    //$(this).parent('custom_fields').remove();
    $(this).closest('.pet-info-data').remove();
});

  	$(document).find("body").on('blur', '.sname_input-MC', function() {
  	  var id = $(this).val();
        console.log(id.length);
        if(id.length == 8){
  
            $.ajax({
              url: ajaxurl,
              method:"POST", 
              dataType: 'json',
              data:{
                'smarttag_id_number': id, 
                'action' : 'checkSmartTagIDValid_testing',
              },
              success: function(data) {
  
              
                
              console.log(data);
              console.log(data.message);
                  if(data.status == '302'  && data.result == 'exist'){
                      console.log('1');
                          $('.show-atag').hide();
                     // $('.valid_message').addClass('error');
                      $('.valid_message').removeClass('error_success');
                      $('.valid_message').css('color','red')
                      $('.valid_message').text(data.message);
                      $('.valid_message').show();
                      $('.show-atag').hide();
                          
                  }else if(data.status == 406  && data.result == 'fail'){
                      console.log('2');
                   
                      $('.valid_message').removeClass('error_success');
                      $('.valid_message').css('color','red');
                      $('.valid_message').text(data.message);
                      $('.valid_message').show();
                      $('.show-atag').show();
                      
  
                  }else if(data.status == '200'  && data.result == 'success'){
                      console.log('3');
                      
                      $('.valid_message').hide();
                      $('.show-atag').hide();
                          return true;
                  }else{
                    console.log('4');
                      $('.valid_message').addClass('error');
                      $('.valid_message').removeClass('error_success');
                      $('.valid_message').text(data.message);
                      $('.show-atag').hide();
                       $('.valid_message').show();
  
                          return false;
                  }
                 
             }
        
      });	
  
  			}else if(id.length == 15){
                    console.log('checkMicrochipIDValid1');
                 $.ajax({
                        url: ajaxurl,
                        method:"POST", 
                        dataType: 'json',
                        data:{
                          'smarttag_id_number': id, 
                          'action' : 'checkMicrochipIDValid1',
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
                                }else if(data.status == 406  && data.result == 'fail'){
                                    console.log('2');

                                   $('.valid_message').addClass('error');
                                    $('.valid_message').removeClass('error_success');
                                    $('.valid_message').css('color','red');
                                    $('.valid_message').text(data.message);
                                    $('.valid_message').show();
                                    $('.show-atag').hide();
                                    

                                }else if(data.status == '200'  && data.result == 'success'){
                                    console.log('3');
                                    
                                    $('.valid_message').hide();
                                    $('.show-atag').hide();
                                        return true;
                                }else{
                                  console.log('4');
                                    $('.valid_message').addClass('error');
                                    $('.valid_message').removeClass('error_success');
                                    $('.valid_message').text(data.message);
                                    $('.show-atag').show();
                                    $('.valid_message').hide();

                                        return false;
                                }
                                        
                                    }
                    });
                }
  
  });
  
  
  
  

/*breed type*/

	$(document).ready(function(){
		 $(document).find("body").on('change', '.pet_type', function() {
		 	var primary_breed = $(this).parents(".pet-info-data").find(".primary_breed");
		 	var secondary_breed = $(this).parents(".pet-info-data").find(".secondary_breed");

		 	console.log($("primary_breed html",primary_breed).html());

			var petTypeID = $(this).children("option:selected").val();
			$(".loader-wrap").fadeIn();
				$.ajax({
                    type: 'POST',
                    url: ajaxurl,
                    data: {
			                action : 'get_pet_breeds',
			                 typeId:  petTypeID
			            },
                    success: function(response) {
						$(".loader-wrap").fadeOut();
                    	var Obj = jQuery.parseJSON(response);
                    	$(primary_breed).html(Obj.data);
                    	$(secondary_breed).html(Obj.data);
                    	
                    }
			        
                });
		});

	});

	$(document).find("body").on('change', '#pettype', function() {
        $(this).find("option:selected").each(function(){
         var optionValue = $(this).val(); 
            if(optionValue){
              $('.Pet_Type_Breed').show();
            } else{
                 $('.Pet_Type_Breed').hide();
            }
        });
    });

$(document).find("body").on('keyup', 'input[name="p_prm_no[]"]', function() {
  		$(this).val($(this).val().replace(/^(\d{3})(\d{3})(\d+)$/, "($1) $2-$3"));
         });
  	

$(document).find("body").on('keyup', 'input[name="p_sec_no[]"]', function() {
  	$(this).val($(this).val().replace(/^(\d{3})(\d{3})(\d+)$/, "($1) $2-$3"));
  });
  
  
  
$(document).find("body").on('blur', '#u-email', function() {
       var email = $(this).val();

      var  data1 = { 'p_email': email, 
                      'action' : 'checkEmailExistMultiple',
                   };

                    $.ajax({
                              type: 'POST',
                              url: ajaxurl,
                              data: data1,
                            
                          success: function(response) {
                          	console.log(response);
                            if(response == 'false'){

                            	$('.already').show();
                            	$('.checkMailexist').show();
                            	return false;
                            }else{
                            	 	$('.already').hide();
								$('.checkMailexist').hide();
								return true;
                            }
                         }
                     });



    });  





	
$(document).find("body").on('click', '.btn-prev', function() {
		$('#step-1').show();
        $('.moregroup1').show();
        $('.first-step').show();
        $('.steps-5-show').hide();
    });


$(document).find("body").on('change', '.change-pet-cont', function() {

 
        var val     = $(this).val();    
        ///var div     = $(this).parent().parent().parent();
        //var divNum  = div.index();
         var divNum     = $(this).parents(".pet-info-data").attr("index");
		 if ($(this).hasClass('gender')) {
            if (divNum == 0) {
                $(".Information .gender").text(val);
            }else{
                $(".Information"+divNum+" .gender").text(val);
            }
        }else if ($(this).hasClass('pet_type')) {

        		if(val == 587){
        			var pettype = 'Cat';
	    		}else if(val == 1045){
	    			pettype = 'Dog';
	    		}else if(val == 1046){
	    			pettype = 'Ferret';
	    		}else if(val == 588){
	    			pettype = 'Horse';
	    		}else if(val == 1048){
	    			pettype = 'Other';
	    		}else if(val == 1045){
	    			pettype = 'Rabbit';
	    		}


            if (divNum == 0) {



                $(".Information .pet_type").text(pettype);
            }else{
                $(".Information"+divNum+" .pet_type").text(pettype);
            }
        }
    });



/*$("body").on('blur','.change-pet-cont',function(){

 
        var val     = $(this).val();    
        var div     = $(this).parent().parent().parent();
        var divNum  = div.index();
        console.log(divNum);
        if ($(this).hasClass('microchip_number')) {

            if (divNum == 0 ||divNum == 1 || divNum == 2 || divNum == 3 ) {
                $(".Information .microchip_number").text(val);
            }else{
                $(".Information"+divNum+" .microchip_number").text(val);
            }
        }else if ($(this).hasClass('pet_name')) {
          if ( divNum == 0 || divNum == 1 || divNum == 2 || divNum == 3 ) {
            	
                $(".Information .pet_name").text(val);
            }else{
                $(".Information"+divNum+" .pet_name").text(val);
            }
        } 
    });*/
    
$("body").on('blur','.change-pet-cont',function(){

 
        var val     = $(this).val();    
        var divNum     = $(this).parents(".pet-info-data").attr("index");
        
       
        if ($(this).hasClass('microchip_number')) {
        		
            if (divNum == 0 ) {
                $(".Information").find('#MicNum'+divNum).text(val);
            }else{
                $(".Information"+divNum+" .microchip_number").text(val);
            }
        }else if ($(this).hasClass('pet_name')) {
          if ( divNum == 0 ) {
            	
                $(".Information .pet_name").text(val);
            }else{
                $(".Information"+divNum+" .pet_name").text(val);
            }
        } 
    });
    





$(document).find('body').on('blur','.p_fst_name', function(){
	$('.review_name').text($(this).val());
});

$(document).find('body').on('blur','.p_add1 ', function(){
	$('.review_address').text($(this).val());
});


$(document).find('body').on('blur','.p_email ', function(){
	$('.review_email').text($(this).val());
});


$(document).find('body').on('blur','.p_fst_name', function(){
	$('.review_name').text($(this).val());
});


$(document).find('body').on('blur','.p_prm_no', function(){
	$('.phone-number12').text($(this).val());
});


  
  });
  
  


$(document).ready(function(){
	var divLength =  0;
	var $owner_div = $('#generate-multiple-owner');
	var clone_div = $owner_div.clone(true);
	//var clone_div = $('#generate-multiple-owner').attr(inde).clone();

	  $(document).find('body').on('click', '.add-pet-owner' , function(){
	  		$(document).find('.btn-next').hide();	 
	  	$(".step-form-box:last-child").find(".acc-edit.owner-edit").remove();
		


	  	var divLength = $(".step-form-box").length+1;
		var heading_count = $(document).find(".pet-heading").length;
		
		
		
		$(clone_div).attr('index', divLength);	

		$(clone_div).find('.owner-number').text( divLength);
	 	$(clone_div).find('.acc-blue-head').append('<div class="acc-edit owner-edit owner-remove"><i class="fa fa-trash"></i> Remove</div>');
	 	console.log('sdsdsdsd');
	  	$(clone_div).find("input[type=text]").val("");


		$(clone_div).appendTo(".more-petOwner");

		return false;

	  });

});	




 $(document).find('body').on('click', '.owner-remove' , function(){
    
   	
 		 $(this).parents(".generate-multiple-owner").remove();
 		 var index = $(this).parents(".generate-multiple-owner").attr('index');

 			if(index == '2'){
 				console.log(index, 'index');
 				$(document).find('.btn-next').show();	
 			}


            
            $(".site-tabs-wrap.main-div:last-child").find('.acc-blue-head').append('<div class="acc-edit owner-edit owner-remove"><i class="fa fa-trash"></i> Remove</div>');
        });
  










  
  
  
</script>
<?php get_footer(); ?>