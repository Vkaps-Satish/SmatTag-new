<?php
/*
 * Template Name:  Universal Mircochip registery
 */

global $petColors;
get_header();

$getbreeds                    = get_top_parents('pet_type_and_breed');
$single                       = true;
$user_id                      = get_current_user_id();
$countries_obj                = new WC_Countries();
$countries                    = $countries_obj->__get('countries');
$current_user                 = get_user_by('id', $user_id);
$first_name                   = get_user_meta($user_id, 'first_name', $single);
$last_name                    = get_user_meta($user_id, 'last_name', $single);
$email                        = ($current_user) ? $current_user->user_email : "";
$primary_country              = get_user_meta($user_id, 'primary_country', $single);
$primary_address_line1        = get_user_meta($user_id, 'primary_address_line1', $single);
$primary_address_line2        = get_user_meta($user_id, 'primary_address_line2', $single);
$primary_city                 = get_user_meta($user_id, 'primary_city', $single);
$primary_state                = get_user_meta($user_id, 'primary_state', $single);
$primary_postcode             = get_user_meta($user_id, 'primary_postcode', $single);
$primary_home_number          = get_user_meta($user_id, 'primary_home_number', $single);
$primary_cell_number          = get_user_meta($user_id, 'primary_cell_number', $single);
$Sfirst_name                  = get_user_meta($user_id, 'secondary_first_name', $single);
$Slast_name                   = get_user_meta($user_id, 'secondary_last_name', $single);
$Semail                       = get_user_meta($user_id, 'secondary_email', $single);
$Sprimary_country             = get_user_meta($user_id, 'secondary_country', $single);
$Sprimary_address_line1       = get_user_meta($user_id, 'secondary_address_line1', $single);
$Sprimary_address_line2       = get_user_meta($user_id, 'secondary_address_line2', $single);
$Sprimary_city                = get_user_meta($user_id, 'secondary_city', $single);
$Sprimary_state               = get_user_meta($user_id, 'secondary_state', $single);
$Sprimary_postcode            = get_user_meta($user_id, 'secondary_postcode', $single);
$Sprimary_home_number         = get_user_meta($user_id, 'secondary_home_number', $single);
$Sprimary_cell_number         = get_user_meta($user_id, 'secondary_cell_number', $single);
$secondary_cell_country_code  = get_user_meta($user_id, 'secondary_cell_country_code', $single);
$secondary_phone_country_code = get_user_meta($user_id, 'secondary_phone_country_code', $single);
$primary_home_number_code     = get_user_meta($user_id, 'primary_phone_country_code', $single);
$primary_cell_number_code     = get_user_meta($user_id, 'primary_cell_country_code', $single);
?>
<div class="container-wrap universal-microchips-wrapper">
   <div class="container main-content">
      <div class="row">
         <div class="woo-sidebar col-sm-3">
            <?php echo do_shortcode("[stag_sidebar id='our-services']"); ?>
         </div>
         <div class="woo-content col-sm-9" id="woo-content">
            <!-- <form id="profileuser1" method="POST" enctype="multipart/form-data"> -->
            <?php if (has_post_thumbnail( $post->ID ) ): ?>
            <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
            <div class="page-image">
               <img src="<?php echo $image[0]; ?>" alt="image" />
            </div>
            <?php endif; ?>
            <div class="page-heading">
               <h1>Universal Microchip Registry</h1>
            </div>
            <!-- <div class="small-text">
                Each -SmartTag Microchip includes a FREE Silver Lifetime Plan. Please review the plan benefits below and choose a plan that is right for your pet
            </div> -->
            
            <section class="multi-step-form ocean">
                <form id="universalForm" method="POST" enctype="multipart/form-data">
                    <fieldset aria-label="Step One" tabindex="-1" id="step-1" class="step-form-box">
                        <div class="contact-form" id="pro-info">
                          <center><h2>Register any brand microchip</h2></center>
                          <p class="text-center">Home Again®, AVID™ AKC CAR/EID™, Digital Angel®, ResQ®, ALLFLEX®, Schering Plough™, 24 PET WATCH™, Lifechip®, Banfield®, Crystal Tag™, Datamars™, Petlink, Trovan®, & Deston Fearing™, MICHELSON FOUND ANIMALS, Savethislife, etc...</p>
                          <h3 style="color: #dc2727;"><center>Registration for as low as $6.95!</center></h3> 
                            <div class="field-wrap three-fields-wrap universal-microchips-field-wrap">
                                <!-- <form name="universalMicrochipForm"  id="universalMicrochipForm" method="POST" enctype="multipart/form-data"> -->
                                    <div class="field-div">
                                        <label>Register Here:</label>
                                        <input type="text" name="microchipNumber" placeholder="*Microchip ID Number" class="user-data break_number copyUniversalFromStep1"  autocomplete="off" value="<?= (isset($_GET['id'])) ? $_GET['id']  : "";?>" id="MiroNumber"  />
                                    </div>
                                    <div class="field-div">
                                        <label></label>
                                        <input type="text" name="conMicrochipNumber" placeholder="*Confirm ID Number" class="user-data break_number"  autocomplete="off" value="<?= (isset($_GET['id'])) ? $_GET['id']  : "";?>"  />
                                    </div>
                                 
                                    <div class="field-div field-div-btn">
                                        <label></label>
                                        <button class="site-btn-red btn-next" type="button">Enter <i class="fa fa-caret-right"></i></button>
                                        <!-- <button class="site-btn-red" type="submit">Enter <i class="fa fa-caret-right"></i></button> -->
                                    </div>
                                <!-- </form> -->
                            </div>
                            <hr>
                           <?php get_template_part( 'register', 'universal-microchips-benefits' );
                           ?> 

                            <table class="table table-total">
                            <tr>
                              <td> 1 Year:
                              </td>  
                              <td>
                                $6.95
                              </td>
                              <td>
                                 $9.95
                              </td>
                              <td>
                                 $19.95
                              </td>
                            </tr>
                            <tr>
                              <td>
                                Lifetime:
                              </td>
                              <td>
                                $14.95
                              </td>
                              <td>
                                 $29.95
                              </td>
                              <td>
                                 $49.95
                              </td>
                            </tr>

                          </table>
                        </div>
                    </fieldset>

                    <fieldset aria-label="Step Two" tabindex="-1" id="step-2" class="step-form-box">
                         <div class="contact-form" id="pro-info">
                         	<h2>Pet Profile Detail</h2>
                         	<hr>
                            <div class="field-wrap two-fields-wrap">
                               	<div class="field-div">
                                  	<label>*Microchip Id Number:</label>
                                  	<input type="text" placeholder="Microchip Id Number" name="universal_microchip_id" class="text-data dog_universal_microchip_id break_number copyUniversal" id="sname_input" value="<?= (isset($_GET['id'])) ? $_GET['id']  : "";?>" required="">
                                    <span class="valid_message "></span><span class="error" id="error"></span>
                                     <a href="<?php echo get_site_url().'/our-services/microchip-registry/';?>" class="show-atag error"style="display: none;">Click here</a>
                               	</div>
                               	<div class="field-div">
                                  	<label>*Confirm Microchip Id Number:</label>
                                  	<input type="text" name="conf_universal_microchip_id" placeholder="Confirm Microchip Id Number" class="text-data break_number copyUniversal" value="<?= (isset($_GET['id'])) ? $_GET['id']  : "";?>" required=""  id="con_input">
                               	</div>
                               
                            </div>
                            <div class="field-wrap two-fields-wrap">
                                <div class="field-div">
                                    <label>*Pet Name</label>
                                    <input type="text" name="pet_name" class="text-data dog_universal_microchip_id" id="pname_input" placeholder="Enter Pet Name" required="">
                                </div>
                                <div class="field-div">&nbsp;</div>
                            </div>
                            <div class="field-wrap two-fields-wrap">
                                <div class="field-div">
                                    <label>*Pet Type & Breed </label>
                                    <div class="field-wrap two-fields-wrap">
                                        <div class="field-div">
                                            <select name="pet_type" class="text-data" id="pettype" required="">
                                                <option value="">Type</option>
                                                <?php foreach ($getbreeds as $key => $value) { ?>
                                                    <option value="<?= $value['term_id'] ?>"><?= $value['name'] ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="field-div Pet_Type_Breed " style="display:none;">
                                            <select name="primary_breed" class="text-data" id="breedid" required="">
                                                <option value="">Breed</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="field-div Pet_Type_Breed " style="display:none;">
                                    <label>Secondary Breed</label>
                                    <select name="secondary_breed" class="text-data" id="sbreedid" >
                                      <option value="">Breed</option>
                                    </select>
                                </div>
                            </div>
                            <div class="field-wrap two-fields-wrap">
    	                       	<div class="field-div">
                                  	<label>*Primary Color: </label>
                                    <select name="primary_color" class="text-data" id="pcolor" required="" >
                                      <option value="">Select Color</option>
                                        <?php 
                                            foreach ($petColors as $key => $color) {
                                                echo '<option value="'.$key.'">'.$color.'</option>';
                                            }
                                        ?>  
                                  </select>
                               	</div>
                                  <div class="field-div">
                                  <label>Secondary Color(s)</label>
                                     <select name="secondary_color" class="text-data" id="scolor">
                                        <option value="">Select Color</option>
                                        <?php 
                                            foreach ($petColors as $key => $color) {
                                                echo '<option value="'.$key.'">'.$color.'</option>';
                                            }
                                        ?>  
                                     </select>
                               </div>
                            </div>
                            <div class="field-wrap two-fields-wrap">
                               	<div class="field-div">
                                    <div class="field-wrap two-fields-wrap">
                                        <div class="field-div">
                                    	    <label>*Gender: </label>
                                        	<select name="gender" class="text-data" id="pgender" required="">
                                           		<option value="">Select</option>
                                           		<option value="male">Male</option>
                                           		<option value="Female">Female</option>
                                        	</select>
                                	    </div>
                                       	<div class="field-div">
                                              <label>Size </label>
                                              <select name="size" class="text-data" id="psize">
                                                <option value="">Select</option>
                                              <option value="1">Small</option>
                                              <option value="2">Medium</option>
                                              <option value="3">Large</option>
                                              </select>
                                       	</div>
                                    </div>
                                </div>
                                <div class="field-div">
                                    <label>Pet Date of Birth</label>
                                    <input type="date" name="pet_date_of_birth" id="pet-dob1-1" placeholder="mm/dd/yyyy" autocomplete="off" class="input-10 input text-data">
                                </div>           
                            </div>
                            <div class="field-wrap two-fields-wrap">
                                <div class="field-div">
                                    <label class="auto-height">
                                        <?php __( 'Upload Pet Image)', 'cvf-upload'); ?>
                                    </label>
                                    <label>Upload Pet Image</label>
                                    <input type="file" name="files" class="files-data" multiple id="imgInp" required="" />
                                </div>
                                <div class="field-div">
                                    <label></label>
                                    <div class="field-notice">Files must be less than 2MB.
                                    <br>Allowed file types .png/ .gif/ .jpg/ .jpeg</div>
                                </div>
                            </div>
                            <div class="step-btns">
                                <button class="btn btn-default btn-prev" type="button" aria-controls="step-1"><i class="fa fa-caret-left"></i> Back</button>
                                <button class="btn btn-default btn-next ste3" type="button" aria-controls="step-3">Next <i class="fa fa-caret-right"></i></button>
                            </div>
                        </fieldset>
                        
                            <fieldset aria-label="Step Three" tabindex="-1" id="step-3" class="step-form-box">
                                <div class="contact-form" id="cus-info">
                                <br>
                                <h2>User Profile Detail</h2>
                                <hr>
                                <?php  if(is_user_logged_in()) { ?>
                                    <div class="field-wrap two-fields-wrap">
                                        <input type="hidden" name="UsrLoginId" class="user-data" value="<?php echo $user_id;?>" />
                                        <div class="field-div">
                                            <label>*First Name </label>
                                            <input type="text" name="p_fst_name" placeholder="First Name" class="user-data" id="u-first" required="" value="<?php echo $first_name;?>" maxlength = "100" />
                                        </div>
                                        <div class="field-div">
                                            <label>*Last Name </label>
                                            <input type="text" name="p_lst_name" placeholder="Last Name" class="user-data" id="u-last" required="" value="<?php echo $last_name;?>" maxlength = "100"/>
                                        </div>
                                        <div class="field-div">
                                            <label>*Email </label>
                                            <input type="email" name="p_email" placeholder="Enter Email Address" class="user-data" id="u-email" required="" value="<?php echo $email;?>"    />
                                        </div>
                                    </div>
                                    <div class="field-wrap two-fields-wrap">
                                        <div class="field-div">
                                            <label>*Select Your Country </label>
                                            <select name="p_country" class="user-data address-country" id="u-country" required="" >
                                              <option value="">Select</option>
                                              <?php foreach ($countries as $key => $value) {?>
                                                <option value="<?php echo $key; ?>" <?php if(!empty($primary_country) && $primary_country  == $key){ echo 'selected="selected"';}?>><?php echo $value;?></option>
                                              <?php } ?>
                                            </select>
                                        </div>
                                        <div class="field-div">
                                              <label class="statevalidate">*State</label>
                                              <select name="p_state" class="user-data address-state not-require" id="s-state" placeholder="State" data-val="<?php echo $primary_state;?>" value="<?php echo $primary_state;?>"></select>
                                        </div>
                                        <div class="field-div">
                                          <label>*Address</label>
                                          <input type="text" name="p_add1" placeholder="Address line 1" class="user-data" id="u-add1" required="" value="<?php echo $primary_address_line1;?>"  />
                                        </div>
                                    </div>
                                    <div class="field-wrap three-fields-wrap">
                                        <div class="field-div">
                                            <label>Address line 2</label>
                                            <input type="text" name="p_add2" placeholder="Address line 2 (optional)" class="user-data" id="u-add2" value="<?php echo $primary_address_line2;?>"  />
                                        </div>
                                        <div class="field-div">
                                            <label>*City</label>
                                            <input type="text" name="p_city" placeholder="City" class="user-data" id="u-city1" required="" value="<?php echo $primary_city;?>" />
                                        </div>
                                        <div class="field-div">
                                            <label>*Zipcode</label>
                                              <input type="text" name="p_zipcode" placeholder="Zipcode" class="user-data" id="u-zip" required="" value="<?php echo $primary_postcode;?>" />
                                        </div>
                                    </div>
                                    <div class="field-wrap three-fields-wrap">
                                        <div class="field-div phone-div">
                                            <label>*Primary Phone Number </label>
                                            <input type="text" name="p_prm_no" placeholder="(555) 123-1234" class="user-data phone-number" id="p-phone"  required="" value="<?php echo $primary_home_number;?>" />
                                            <input type="hidden" name="p_prm_no_code" placeholder="(555) 123-1234" class="user-data" value="<?php echo $primary_home_number_code;?>" />
                                        </div>
                                        <div class="field-div"></div>
                                        <div class="field-div"></div>
                                    </div>
                                    <div class="cc-main mt-3">
                                        <div class="cutome-content">
                                            <div class="check-icon">
                                                <input type="checkbox"  class="primary_checkbox" name="checkbox" checked>
                                            </div>
                                            <div class="cc-text">
                                                By leaving this box checked and clicking "Next", you agree to receive automated calls or text messages at the phone number provided regarding your pets, pet-related products or services from SmartTag and all SmartTag affiliates and Partners.  Your agreement is not a condition of registration. By clicking Next, you also agree to our Terms of Service and Privacy Policy
                                            </div>
                                        </div>
                                    </div>
                                <?php }else{ ?>
                                    <div class="field-wrap two-fields-wrap">
                                        <div class="field-div">
                                            <label>*First Name </label>
                                            <input type="text" name="p_fst_name" placeholder="First Name" class="user-data" id="u-first" required="" value="" maxlength = "100" />
                                        </div>
                                        <div class="field-div">
                                            <label>*Last Name </label>
                                            <input type="text" name="p_lst_name" placeholder="Last Name" class="user-data" id="u-last" required="" value="" maxlength = "100"/>
                                        </div>
                                            
                                    </div>
                                    <div class="field-wrap two-fields-wrap">
                                        <div class="field-div">
                                            <label>*Email </label>
                                            <input type="email" name="p_email" placeholder="Enter Email Address" class="user-data" id="u-email" required="" value="" />
                                        </div>
                                        <div class="field-div">
                                            <label>*Password </label>
                                            <input type="password" name="password" placeholder="Enter Password" class="user-data" required="" minlength="8" />
                                        </div>
                                    </div>
                                    <div class="field-wrap">
                                        <div class="field-div">
                                            <label>*Select Your Country </label>
                                            <select name="p_country" class="user-data address-country" id="u-country" required="" >
                                              <option value="">Select</option>
                                              <?php foreach ($countries as $key => $value) { ?>
                                                <option value="<?php echo $key; ?>"><?php echo $value;?></option>
                                              <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="field-wrap two-fields-wrap">
                                        <div class="field-div">
                                            <label>*Address</label>
                                            <input type="text" name="p_add1" placeholder="Address line 1" class="user-data" id="u-add1" required="" value=""  />
                                        </div>
                                        <div class="field-div">
                                            <label></label>
                                            <input type="text" name="p_add2" placeholder="Address line 2 (optional)" class="user-data" id="u-add2" value="<?php echo $primary_address_line2;?>"  />
                                          </div>
                                        </div>
                                                    <div class="field-wrap two-fields-wrap">
                                                    <div class="field-div">
                                                         <input type="text" name="p_city" placeholder="City" class="user-data" id="u-city1" required="" value="" />
                                                    </div>
                                                    <div class="field-div">
                                                      <div class="field-wrap two-fields-wrap">
                                                        <div class="field-div">
                                                          <label class="statevalidate" style="display: none"></label>
                                                          <select name="p_state" class="user-data address-state s-sate rq" data-val="<?php echo $primary_state; ?>"></select>
                                                        </div >
                                                        <div class="field-div">
                                                          <input type="text" name="p_zipcode" placeholder="Zipcode" class="user-data" id="u-zip" required="" value="<?php echo $primary_postcode;?>" />
                                                        </div>
                                                      </div>
                                                    </div>
                                                </div>
                                                <div class="field-wrap two-fields-wrap">
                                                <div class="field-div phone-div">
                                                  <label>*Primary Phone Number </label>
                                                  <input type="text" name="p_prm_no" placeholder="(555) 123-1234" class="user-data phone-number" id="p-phone"  required="" value="<?php echo $primary_home_number;?>"/>
                                                  <input type="hidden" name="p_prm_no_code" placeholder="(555) 123-1234" class="user-data" value="<?php echo $primary_home_number_code; ?>" />
                                                </div>
                                                <div class="field-div phone-div">
                                                  <label>Secondary Phone Number </label>
                                                  <input type="text" name="p_sec_no" placeholder="(555) 123-1234" class="user-data phone-number" id="ps-phone" value="<?php echo $primary_cell_number;?>" />
                                                  <input type="hidden" name="p_sec_no_code" placeholder="(555) 123-1234" class="user-data" value="<?php echo $primary_cell_number_code; ?>"/>
                                                </div>
                                                </div>
                                                <div class="cc-main mt-3">
                                                  <div class="cutome-content">
                                                  <div class="check-icon">
                                                    <input type="checkbox"  class="primary_checkbox" name="checkbox" checked>
                                                  </div>
                                                  <div class="cc-text">
                                                    By leaving this box checked and clicking "Next", you agree 
                                                    to receive automated calls or text messages at the phone number
                                                    provided regarding your pets, pet-related products or services
                                                    from SmartTag and all SmartTag affiliates and Partners. 
                                                    Your agreement is not a condition of registration. 
                                                    By clicking Next, you also agree to our Terms of Service 
                                                    and Privacy Policy.
                                                  </div>
                                                  </div>
                                                </div>
                                                
                                            <?php } ?>
                                          </div>
                     <?php  if(is_user_logged_in()) { ?>
	                    <div class="step-accordion">
	                        <h4 class="step-acc-head" id="sec-form"><i class="fa fa-plus"></i> Enter Secondary Contact Information (Optional)</h4>
	                        <div class="step-acc-content">
	                           <div class="contact-form" id="sec-cont-info">
	                              <div class="field-wrap two-fields-wrap">
	                                 <div class="field-div">
	                                    <label>First Name</label>
	                                    <input type="text" name="s_fst_name" placeholder="First Name" class="user-data" id="s-name" value="<?php echo $Sfirst_name;?>" maxlength="100" />
	                                 </div>
	                                 <div class="field-div">
	                                    <label>Last Name</label>
	                                    <input type="text" name="s_lst_name" placeholder="Last Name" class="user-data" id="s-lstname" value="<?php echo $Slast_name;?>" />
	                                 </div>
	                              </div>
	                              <div class="field-wrap two-fields-wrap">
	                                 <div class="field-div">
	                                    <label>Email</label>
	                                    <input type="email" name="s_email" placeholder="Enter Email Address" class="user-data" id="s-email" value="<?php echo $Semail;?>" />
	                                 </div>
	                                 <div class="field-div">
	                                    <label>Select Your Country</label>
	                                    <select name="s_country" class="user-data address-country not-require" id="s-county">
	                                       <option value="">Select</option>
	                                       <?php foreach ($countries as $key=>$value) {?>
	                                       <option value="<?php echo $key; ?>" <?php if(!empty($Sprimary_country) && $Sprimary_country==$key){ echo 'selected="selected"';}?>>
	                                          <?php echo $value;?>
	                                       </option>
	                                       <?php } ?>
	                                    </select>
	                                 </div>
	                              </div>
	                              <div class="field-wrap two-fields-wrap">
	                                 <div class="field-div">
	                                    <label>Address</label>
	                                    <input type="text" name="s_add1" placeholder="Address line 1" class="user-data" id="s-add1" value="<?php echo $Sprimary_address_line1;?>" />
	                                 </div>
	                                 <div class="field-div">
	                                    <label></label>
	                                    <input type="text" name="s_add2" placeholder="Address line 2 (optional)" class="user-data" id="s-add2" value="<?php echo $Sprimary_address_line2;?>" />
	                                 </div>
	                              </div>
	                              <div class="field-wrap two-fields-wrap">
	                                 <div class="field-div">
	                                    <input type="text" name="s_city" placeholder="City" class="user-data" id="s_city1" value="<?php echo $Sprimary_city;?>" />
	                                 </div>
	                                 <div class="field-div">
	                                    <div class="field-wrap two-fields-wrap">
	                                       <div class="field-div state-div">
	                                          <label class="statevalidate" style="display: none"></label>
	                                          <select name="s_state" class="user-data address-state not-require" id="s-state" placeholder="State" data-val="<?php echo $Sprimary_state;?>" value="<?php echo $Sprimary_state;?>"></select>
	                                       </div>
	                                       <div class="field-div">
	                                          <input type="text" name="s_zipcode" placeholder="Zipcode" class="user-data" id="s-zip" value="<?php echo $Sprimary_postcode;?>" />
	                                       </div>
	                                    </div>
	                                 </div>
	                              </div>
	                              <div class="field-wrap two-fields-wrap">
	                                 <div class="field-div phone-div">
	                                    <label>Primary Phone Number</label>
	                                    <input type="text" name="s_prm_no" placeholder="(555) 123-1234" class="user-data phone-number" id="sp-phone" value="<?php echo $Sprimary_home_number;?>" />
                                      <input type="hidden" name="s_prm_no_code" placeholder="(555) 123-1234" class="user-data" value="<?php echo $secondary_phone_country_code;?>" />
	                                 </div>
	                                 <div class="field-div phone-div">
	                                    <label>Secondary Phone Number</label>
	                                    <input type="text" name="s_sec_no" placeholder="(555) 123-1234" class="user-data phone-number" id="ss-phone" value="<?php echo $Sprimary_cell_number;?>" />
                                      <input type="hidden" name="s_sec_no_code" placeholder="(555) 123-1234" class="user-data" value="<?php echo $secondary_cell_country_code;?>" />
	                                 </div>
	                              </div>
	                           </div>
	                        </div>
	                    </div>
                    <?php }else{ ?>
	                    <div class="step-accordion">
	                        <h4 class="step-acc-head" id="sec-form"><i class="fa fa-plus"></i> Enter Secondary Contact Information (Optional)</h4>
	                        <div class="step-acc-content">
	                           <div class="contact-form" id="sec-cont-info">
	                              <div class="field-wrap two-fields-wrap">
	                                 <div class="field-div">
	                                    <label>First Name</label>
	                                    <input type="text" name="s_fst_name" placeholder="First Name" class="user-data" id="s-name" value="<?php echo $Sfirst_name;?>" maxlength="100" />
	                                 </div>
	                                 <div class="field-div">
	                                    <label>Last Name</label>
	                                    <input type="text" name="s_lst_name" placeholder="Last Name" class="user-data" id="s-lstname" value="<?php echo $Slast_name;?>" maxlength="100" />
	                                 </div>
	                              </div>
	                              <div class="field-wrap two-fields-wrap">
	                                 <div class="field-div">
	                                    <label>Email</label>
	                                    <input type="email" name="s_email" placeholder="Enter Email Address" class="user-data" id="s-email" value="<?php echo $Semail;?>" />
	                                 </div>
	                                 <div class="field-div">
	                                    <label>Select Your Country</label>
	                                    <select name="s_country" class="user-data address-country not-require" id="s-county">
	                                       <option value="">Select</option>
	                                       <?php foreach ($countries as $key=>$value) {?>
	                                       <option value="<?php echo $key; ?>" <?php if(!empty($Sprimary_country) && $Sprimary_country==$key){ echo 'selected="selected"';}?>>
	                                          <?php echo $value;?>
	                                       </option>
	                                       <?php } ?>
	                                    </select>
	                                 </div>
	                              </div>
	                              <div class="field-wrap two-fields-wrap">
	                                 <div class="field-div">
	                                    <label>Address</label>
	                                    <input type="text" name="s_add1" placeholder="Address line 1" class="user-data" id="sadd1" value="<?php echo $Sprimary_address_line1;?>" />
	                                 </div>
	                                 <div class="field-div">
	                                    <label></label>
	                                    <input type="text" name="s_add2" placeholder="Address line 2 (optional)" class="user-data" id="s-add2" value="<?php echo $Sprimary_address_line2;?>" />
	                                 </div>
	                              </div>
	                              <div class="field-wrap two-fields-wrap">
	                                 <div class="field-div">
	                                    <input type="text" name="s_city" placeholder="City" class="user-data" id="s_city1" value="<?php echo $Sprimary_city;?>" />
	                                 </div>
	                                 <div class="field-div">
	                                    <div class="field-wrap two-fields-wrap">
	                                       <div class="field-div state-div">
	                                          <label class="statevalidate" style="display: none"></label>
	                                          <select name="s_state" class="user-data address-state not-require" id="s-state" placeholder="State" data-val="<?php echo $Sprimary_state;?>" value="<?php echo $Sprimary_state;?>"></select>
	                                       </div>
	                                       <div class="field-div">
	                                          <input type="text" name="s_zipcode" placeholder="Zipcode" class="user-data" id="s-zip" value="<?php echo $Sprimary_postcode;?>" />
	                                       </div>
	                                    </div>
	                                 </div>
	                              </div>
	                              <div class="field-wrap two-fields-wrap">
	                                 <div class="field-div phone-div">
	                                    <label>Primary Phone Number</label>
	                                    <input type="text" name="s_prm_no" placeholder="(555) 123-1234" class="user-data" id="sp-phone" value="<?php echo $Sprimary_home_number;?>" />
	                                 </div>
	                                 <div class="field-div phone-div">
	                                    <label>Secondary Phone Number</label>
	                                    <input type="text" name="s_sec_no" placeholder="(555) 123-1234" class="user-data" id="ss-phone" value="<?php echo $Sprimary_cell_number;?>" />
	                                 </div>
	                              </div>
	                           </div>
	                        </div>
	                    </div>
                     <?php } ?>
                     <div class="step-accordion">
                        <h4 class="step-acc-head" id="vt-form"><i class="fa fa-plus"></i> Enter Veterinarian Contact Information (Optional)</h4>
                        <div class="step-acc-content">
                           <div class="contact-form" id="vetcont-info">
                              <div class="field-wrap two-fields-wrap">
                                 <div class="field-div">
                                    <label>First Name </label>
                                    <input type="text" name="vaterinarian_first_name" placeholder="First Name" class="text-data" id="v-first" maxlength="100" />
                                 </div>
                                 <div class="field-div">
                                    <label>Last Name </label>
                                    <input type="text" name="vaterinarian_last_name" placeholder="Last Name" class="text-data" id="v-last" maxlength="100" />
                                 </div>
                              </div>
                              <div class="field-wrap two-fields-wrap">
                                 <div class="field-div">
                                    <label>Email </label>
                                    <input type="email" name="vaterinarian_email" placeholder="Enter Email Address" class="text-data" id="v-email" />
                                 </div>
                                 <div class="field-div">
                                    <label>Select Your Country </label>
                                    <select name="vaterinarian_country" class="user-data address-country not-require" id="v-cuntry" >
                                       <option value="">Select</option>
                                       <?php foreach ($countries as $key => $value) {?>
                                       <option value="<?php echo $key; ?>"><?php echo $value;?></option>
                                       <?php } ?>
                                    </select>
                                 </div>
                              </div>
                              <div class="field-wrap two-fields-wrap">
                                 <div class="field-div">
                                    <label>Address </label>
                                    <input type="text" name="vaterinarian_address_line_1" placeholder="Address line 1" class="text-data" id="v-add1" />
                                 </div>
                                 <div class="field-div">
                                    <label></label>
                                    <input type="text" name="vaterinarian_address_line_2" placeholder="Address line 2 (optional)" class="text-data" id="v-add2" />
                                 </div>
                              </div>
                              <div class="field-wrap two-fields-wrap">
                                 <div class="field-div">
                                    <input type="text" name="vaterinarian_city" placeholder="City" class="text-data" id="v-city1" />
                                 </div>
                                 <div class="field-div">
                                    <div class="field-wrap two-fields-wrap">
                                       <div class="field-div">
                                          <label style="display: none;" class="statevalidate" ></label>
                                          <input type="text" name="vaterinarian_state" class="text-data address-state not-require" id="v-state" placeholder="State" data-val="">
                                       </div>
                                       <div class="field-div">
                                          <input type="text" name="vaterinarian_zip_code" placeholder="Zipcode" class="text-data" id="v-zip" />
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="field-wrap two-fields-wrap">
                                 <div class="field-div phone-div">
                                    <label>Primary Phone Number </label>
                                    <input type="text" name="vaterinarian_primary_phone_number" placeholder="1(555) 123-1234" class="text-data phone-number" id="v-prim"  />
                                    <input type="hidden" name="vaterinarian_primary_phone_number_code" placeholder="(555) 123-1234" class="text-data" />
                                 </div>
                                 <div class="field-div phone-div">
                                    <label>Secondary Phone Number </label>
                                    <input type="text" name="vaterinarian_secondary_phone_number" placeholder="(555) 123-1234" class="text-data phone-number" id="v-sec" />
                                    <input type="hidden" name="vaterinarian_secondary_phone_number_code" placeholder="(555) 123-1234" class="text-data"/>
                                 </div>
                              </div>
                              <!-- <div class="field-wrap two-fields-wrap">
                                 <div class="field-div">
                                 	<input type="submit" name="submit" value="Sumbit Pet Veterinarian Info">
                                 </div>
                                 </div>	 -->
                           </div>
                        </div>
                     </div>
                     <div class="step-btns">
                        <button class="btn btn-default btn-prev" type="button" aria-controls="step-2"><i class="fa fa-caret-left"></i> Back</button>
                        <button class="btn btn-default btn-next" type="button" aria-controls="step-4">Next <i class="fa fa-caret-right"></i></button>
                     </div>
                  </fieldset>
                  <fieldset aria-label="Step Four" tabindex="-1" id="step-4" class="step-form-box">
                  	<div class="step-btns">
                  		<input type="text" name="protectionPlan" value="" style="visibility: hidden;opacity: 0;height: 0px;margin: 0px;" class="custom-protection-plan-check">
                  	</div>
                  	<div class="step-btns">
                        <button class="btn btn-default btn-prev" type="button" aria-controls="step-2"><i class="fa fa-caret-left"></i> Back</button>
                        <button class="btn btn-default btn-next ste4" type="button" aria-controls="step-4">Next <i class="fa fa-caret-right"></i></button>
                     </div>
                     <div class="pp-tabs-content steps-pp-tabs-content" style="display: block;">
                        <div class="pp-icon-wrap">
                           <!-- <div class="pp-icon"></div> -->
                           <h2>Pet Protection Plans</h2>
                        </div>

                        <?php get_template_part( 'register', 'universal-microchip-product-table' );
                       ?> 
                     </div>
                     <div class="step-btns">
                        <button class="btn btn-default btn-prev" type="button" aria-controls="step-3"><i class="fa fa-caret-left"></i> Back</button>
                        <button class="btn btn-default btn-next ste4" type="button" aria-controls="step-5">Next <i class="fa fa-caret-right"></i></button>
                     </div>
                  </fieldset>
                  <fieldset aria-label="Step Five" tabindex="-1" id="step-5" class="step-form-box">
                     <div class="blue-border-box">
                        <div class="pp-icon-wrap previous">
                           <h3 id="purchase_id_tag"></h3>
                        </div>
                        <div class="blue-box-content">
                           <div class="row">
                              <div class="col-sm-8">
                                 <div class="error"></div>
                                 <div class="row">
                                    <div class="col-sm-6">
                                       <div class="field-box">
                                          <label class="field-label">Select a Type:</label>
                                          <div class="field-div custom-select-div">
                                             <div class="custom-select-wrap" id="selectType">
                                                <select class="custom-select-box pro-data" id="field1" name="attribute_pa_ttype">
                                                   <option value="circle" data-product="brass">Brass Circle</option>
                                                   <option value="bone" data-product="aluminum">Aluminum Bone</option>
                                                   <option value="bone" data-product="brass">Brass Bone</option>
                                                   <option value="circle" data-product="aluminum">Aluminum Circle</option>
                                                   <option value="heart" data-product="aluminum">Aluminum Heart</option>
                                                   <option value="heart" data-product="brass">Brass Heart</option>
                                                </select>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-sm-6">
                                       <div class="field-box">
                                          <label class="field-label">Select Size:</label>
                                          <div class="field-div custom-select-div">
                                             <div class="custom-select-wrap" id ="selectSize">
                                                <select class="custom-select-box pro-data" id="field2" name="attribute_pa_size">
                                                   <option value="small">Small (1 in / 2.54 cm)</option>
                                                   <option value="large">Large (1.5 in / 3.81 cm)</option>
                                                </select>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="row">
                                    <div class="col-sm-12">
                                       <div class="field-box">
                                            <label class="field-label">Select a Design:</label>
                                            <div class="field-div" id="stylee">
                                                <div class="custom-radio-box circle showOnGrid" data-toggle="buttons">
                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                 </div>
                                 <div class="row">
                                    <div class="col-sm-12">
                                       <div class="field-box">
                                          <div class="home-front-back-section">
                                             <div class="style-pro">
                                                <div class="section-front-image design-circle micro-back">
                                                   <label>Front:</label>
                                                   <span class="micro-back-img">
                                                   <img src="<?php bloginfo('template_url'); ?>-child/images/flower_circle_shape.png" class="front-img">
                                                   <span class="woo-complex-custom" style="display: none;">
                                                   <span class="back_line_text1" id="front_line1"></span>
                                                   <span class="back_line_text2" id="front_line2">Microchip ID#</span>
                                                   <span class="back_line_text3" id="front_line3"></span>
                                                   <span class="back_line_text3" id="front_line4"></span>
                                                   </span>
                                                   </span>
                                                </div>
                                                <div class="section-back-image design-circle micro-back">
                                                   <label>Back12:</label>
                                                   <span class="micro-back-img">
                                                   <img src="<?php bloginfo('template_url'); ?>-child/images/circle_back.png" class="back-img">
                                                   <span class="woo-complex-custom">	
                                                   <span class="back_line_text1" id="back_line1"></span>
                                                   <span class="back_line_text2" id="back_line2">www.idtag.com</span>
                                                    <span class="back_line_text3" id="back_line3">(866)60-FOUND</span>
                                                    <span class="back_line_text4" id="back_line4"></span>
                                                   </span>
                                                </div>
                                                <div class="section-front-image design-bone micro-back">
                                                   <label>Front:</label>
                                                   <span class="micro-back-img">
                                                   <img src="<?php bloginfo('template_url'); ?>-child/images/black_bone_bone_shape.png" class="front-img">
                                                   <span class="woo-complex-custom" style="display: none;">	
                                                   <span class="front_line_text1" id="front_line1"></span>
                                                   <span class="front_line_text2" id="front_line2"></span>
                                                   <span class="front_line_text3" id="front_line3"></span>
                                                   </span>
                                                   </span>
                                                </div>
                                                <div class="section-back-image design-bone micro-back">
                                                   <label>Back:</label>
                                                   <span class="micro-back-img">
                                                   <img src="<?php bloginfo('template_url'); ?>-child/images/bone_back.jpg" class="back-img">
                                                   <span class="woo-complex-custom">	
                                                   <span class="back_line_text1" id="back_line1"></span>
                                                   <span class="back_line_text2" id="back_line2">www.idtag.com</span>
                                                    <span class="back_line_text3" id="back_line3">(866)60-FOUND</span>
                                                    <span class="back_line_text4" id="back_line4"></span>
                                                   </span>
                                                   </span>
                                                </div>
                                                <div class="section-front-image design-heart micro-back">
                                                   <label>Front:</label>
                                                   <span class="micro-back-img">
                                                   <img src="<?php bloginfo('template_url'); ?>-child/images/brass_heart.jpg" class="front-img">
                                                   <span class="woo-complex-custom" style="display: none;">	
                                                   <span class="front_line_text1" id="front_line1"></span>
                                                   <span class="front_line_text2" id="front_line2"></span>
                                                   <span class="front_line_text3" id="front_line3"></span>
                                                   </span>
                                                   </span>
                                                </div>
                                                <div class="section-back-image design-heart micro-back">
                                                   <label>Back:</label>
                                                   <span class="micro-back-img">
                                                   <img src="<?php bloginfo('template_url'); ?>-child/images/brass_heart.jpg" class="back-img">
                                                   <span class="woo-complex-custom">	
                                                   <span class="back_line_text1" id="back_line1"></span>
                                                  <span class="back_line_text2" id="back_line2">www.idtag.com</span>
                                                    <span class="back_line_text3" id="back_line3">(866)60-FOUND</span>
                                                    <span class="back_line_text4" id="back_line4"></span>
                                                   </span>
                                                </div>
                                             </div>
                                             <div class="color-pro">
                                                <div class="section-front-image color-circle micro-back">
                                                   <label>Front:</label>
                                                   <span class="micro-back-img">
                                                   <img src="<?php bloginfo('template_url'); ?>-child/images/bluetag2.jpg" class="front-img"> 
                                                   <span class="woo-complex-custom" style="display: none;">	
                                                   <span class="front_line_text1" id="front_line1"></span>
                                                   <span class="front_line_text2" id="front_line2"></span>
                                                   <span class="front_line_text3" id="front_line3"></span>
                                                   </span>
                                                   <span class="front_line_text4" id="front_line4"></span>
                                                   </span>
                                                </div>
                                                <div class="section-back-image color-circle micro-back">
                                                   <label>Back:</label>
                                                   <span class="micro-back-img">
                                                   <img src="<?php bloginfo('template_url'); ?>-child/images/bluetag2.jpg" class="back-img">
                                                   <span class="woo-complex-custom">	
                                                   <span class="back_line_text1" id="back_line1"></span>
                                                  <span class="back_line_text2" id="back_line2">www.idtag.com</span>
                                                    <span class="back_line_text3" id="back_line3">(866)60-FOUND</span>
                                                    <span class="back_line_text4" id="back_line4"></span>
                                                   </span>
                                                </div>
                                                <div class="section-front-image color-bone micro-back">
                                                   <label>Front:</label>
                                                   <span class="micro-back-img">
                                                   <img src="<?php bloginfo('template_url'); ?>-child/images/black_bone_shape_2_2.png" class="front-img">
                                                   <span class="woo-complex-custom" style="display: none;">	
                                                   <span class="front_line_text1" id="front_line1"></span>
                                                   <span class="front_line_text2" id="front_line2"></span>
                                                   <span class="front_line_text3" id="front_line3"></span>
                                                   <span class="front_line_text4" id="front_line4"></span>
                                                   </span>
                                                   </span>
                                                </div>
                                                <div class="section-back-image color-bone micro-back">
                                                   <label>Back:</label>
                                                   <span class="micro-back-img">
                                                   <img src="<?php bloginfo('template_url'); ?>-child/images/black_bone_shape_2_2.png" class="back-img">
                                                   <span class="woo-complex-custom">	
                                                   <span class="back_line_text1" id="back_line1"></span>
                                                   <span class="back_line_text2" id="back_line2">www.idtag.com</span>
                                                    <span class="back_line_text3" id="back_line3">(866)60-FOUND</span>
                                                    <span class="back_line_text4" id="back_line4"></span>
                                                   </span>
                                                </div>
                                                <div class="section-front-image color-heart micro-back">
                                                   <label>Front:</label>
                                                   <span class="micro-back-img">
                                                   <img src="<?php bloginfo('template_url'); ?>-child/images/heart_pink_shape_2.png" class="front-img">
                                                   <span class="woo-complex-custom" style="display: none;">	
                                                   <span class="front_line_text1" id="front_line1"></span>
                                                   <span class="front_line_text2" id="front_line2"></span>
                                                   <span class="front_line_text3" id="front_line3"></span>
                                                   <span class="front_line_text4" id="front_line4"></span>
                                                   </span>
                                                   </span>
                                                </div>
                                                <div class="section-back-image color-heart micro-back">
                                                   <label>Back:</label>
                                                   <span class="micro-back-img">
                                                   <img src="<?php bloginfo('template_url'); ?>-child/images/heart_pink_shape_2.png" class="back-img">
                                                   <span class="woo-complex-custom">	
                                                   <span class="back_line_text1" id="back_line1"></span>
                                                   <span class="back_line_text2" id="back_line2">www.idtag.com</span>
                                                    <span class="back_line_text3" id="back_line3">(866)60-FOUND</span>
                                                    <span class="back_line_text4" id="back_line4"></span>
                                                   </span>
                                                   </span>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="row">
                                    <div class="col-sm-12">
                                       <div class="field-box">
                                          <div class="field-div" id="stylee">
                                             <div>
                                                <label for="Price">
                                                   <?php ?>
                                             </div>
                                            <div class="custom_Field engraving-field-inner" id="frontend">
                                                <h2 class="woo-complex-head">ID Tag Engraving Text</h2>
                                                        <div class="engraving-field engraving_1 ">
                                                    <span class="engraving-label" for="engraving"><strong>Line 1:</strong> (20 Character Limit)</span>
                                                    <input type="text" id="tagEditableText" name="tagEditableText" class="front-line" placeholder="Type here" maxlength="20" value="">
                                                         </div>
                                                </div>
                                             <div>
                                             <label>
                                             <input type="radio" id="CustPro" name="customproduct">Yes I want a custom engraved ID Tag
                                             <br>
                                             <input type="radio" id="CustProdis" class="CustProdis" checked name="customproduct">No, I don't want an engraved ID Tag
                                             <br>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="blue-border-box">
                      <div class="pet-color-bg mb-3">
                        <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="pet-center">
                        <img class="digital-pet-img" src="<?php bloginfo('template_url'); ?>-child/images/digital-pet.png" alt="image" alt="">
                        <h1 class="pet-head">Digital pet care in your pocket.</h1>
                        <p class="pet-paragraph">Congratulations! As a SmartTag customer, you get<br> <strong>free</strong> 24/7 access to vets through pawp for 3 months.</p>
                        <div class="list-box">
                        <ul class="list-group">
                        <li class="list-group-item check-box-list"><img class="check-icon" src="<?php bloginfo('template_url'); ?>-child/images/check.png"alt=""> <span>Unlimited access to vets</span></li>
                        <li class="list-group-item check-box-list"><img class="check-icon" src="<?php bloginfo('template_url'); ?>-child/images/check.png"alt=""> <span>Anytime, anywhere</span></li>
                        <li class="list-group-item check-box-list"><img class="check-icon" src="<?php bloginfo('template_url'); ?>-child/images/check.png"alt=""> <span>$0 visit via video or text</span></li>
                        <li class="list-group-item check-box-list"><img class="check-icon" src="<?php bloginfo('template_url'); ?>-child/images/check.png"alt=""> <span>1 free month of flea & Tick meds</span></li>
                        </ul>
                        </div>
                        <div class="pet-icon">
                        <img src="<?php bloginfo('template_url'); ?>-child/images/pet-icon.png"alt="">
                        <span class="powered-by">powered by Pawp</span>
                        </div>
                        </div>
                        </div>
                        </div>
                      </div>
                       
                     </div>
                     <div class="blue-border-box">
                        <div class="pp-icon-wrap">
                           <div class="pp-icon pp-icon-foot"></div>
                           <h3>Pet Protection Arrangement </h3>
                        </div>
                        <div class="blue-box-content">
                           <h3>What's the difference between a SmartTag PetCare Protection Arrangement and a Pet Trust?</h3>
                           <p>A Pet Protection Arrangement, like a Pet Trust is a legal document used to ensure that your pets are fully cared for and protected in case you should become ill, not be able to keep or take care of your pets, or pass away. The difference is that a Pet Trust is a more formal and costly document that is normally prepared by an attorney who specializes in estate planning and has experience in pet trusts. Pet trusts are normally used when a substantial amount of money is being left to care for the pets or they are very high profile. A Pet Protection Arrangement is all the protection most pet owners need to ensure proper care and safety for their pets.</p>
                           <p>
                              <img src="<?php bloginfo('template_url'); ?>-child/images/red-table.jpg" alt="image" />
                           </p>
                           <?php $product=wc_get_product($protectionArrangement); ?>
                           <p><strong>Price: $ <?= $product->get_price(); ?></strong>
                           </p>
                        </div>
                        <div class="step-check-wrap">
                           <div class="step-check">
                              <input class="" type="radio" name="protectionArrangement" value="<?= $protectionArrangement;?>" id="PetArg" />
                              <label>I would like to add a Pet Protection Arrangement</label>
                           </div>
                           <div class="step-check">
                              <input type="radio" name="protectionArrangement" id="PetArg1" />
                              <label>I would not like to add a Pet Protection Arrangement</label>
                           </div>
                        </div>
                     </div>
                     <div class="step-btns">
                        <button class="btn btn-default btn-prev" type="button" aria-controls="step-5"><i class="fa fa-caret-left"></i> Back</button>
                        <button class="btn btn-default btn-next skip2" type="button" aria-controls="step-7">Skip All Offers <i class="fa fa-caret-right"></i>
                        </button>
                     </div>
                  </fieldset>
                  <fieldset aria-label="Step Seven" tabindex="-1" id="step-7" class="step-form-box">
                     <p>
                        <strong>Please review that your information is correct.</strong>
                        <br>
                        You can edit this information if you need to.
                     </p>
                     <div class="acc-blue-box" id="eng_id" style="display: none;">
                        <div class="acc-blue-head">
                           Engraved ID Tag
                           <div class="acc-edit engrave-edits">	<i class="fa fa-edit"></i> EDIT</div>
                        </div>
                        <div class="acc-blue-content">
                           <div class="row" >
                              <div class="col-sm-8">
                                 <div class="field-box">
                                    <div class="home-front-back-section">
                                       <div class="style-pro">
                                          <div class="section-front-image design-circle micro-back">
                                             <label>Front:</label>
                                             <span class="micro-back-img">
                                             <img src="<?php bloginfo('template_url'); ?>-child/images/flower_circle_shape.png" class="front-img">
                                             <span class="woo-complex-custom" style="display: none;">
                                             <span class="front_line_text1" id="front_line1"></span>
                                            <span class="front_line_text2" id="front_line2">www.idtag.com</span>
                                             <span class="front_line_text3" id="front_line3">(866)60-FOUND</span>
                                             <span class="front_line_text4" id="front_line4"></span>
                                             </span>
                                             </span>
                                          </div>
                                          <div class="section-back-image design-circle micro-back">
                                             <label>Back:</label>
                                             <span class="micro-back-img">
                                             <img src="<?php bloginfo('template_url'); ?>-child/images/circle_back.png" class="back-img">
                                             <span class="woo-complex-custom">	
                                             <span class="back_line_text1" id="back_line1"></span>
                                            <span class="back_line_text2" id="back_line2">www.idtag.com</span>
                                            <span class="back_line_text3" id="back_line3">(866)60-FOUND</span>
                                            <span class="back_line_text4" id="back_line4"></span>
                                           </span>
                                             </span>
                                             </span>
                                          </div>
                                          <div class="section-front-image design-bone micro-back">
                                             <label>Front:</label>
                                             <span class="micro-back-img">
                                             <img src="<?php bloginfo('template_url'); ?>-child/images/black_bone_bone_shape.png" class="front-img">
                                             <span class="woo-complex-custom" style="display: none;">	
                                            <span class="front_line_text1" id="front_line1"></span>
                                            <span class="front_line_text2" id="front_line2">www.idtag.com</span>
                                             <span class="front_line_text3" id="front_line3">(866)60-FOUND</span>
                                             <span class="front_line_text4" id="front_line4"></span>


                                             </span>
                                             </span>
                                          </div>
                                          <div class="section-back-image design-bone micro-back">
                                             <label>Back:</label>
                                             <span class="micro-back-img">
                                             <img src="<?php bloginfo('template_url'); ?>-child/images/bone_back.jpg" class="back-img">
                                             <span class="woo-complex-custom">	
                                             <span class="back_line_text1" id="back_line1"></span>
                                             <span class="back_line_text2" id="back_line2">www.idtag.com</span>
                                            <span class="back_line_text3" id="back_line3">(866)60-FOUND</span>
                                            <span class="back_line_text4" id="back_line4"></span>
                                           </span>
                                             </span>
                                             </span>
                                          </div>
                                          <div class="section-front-image design-heart micro-back">
                                             <label>Front:</label>
                                             <span class="micro-back-img">
                                             <img src="<?php bloginfo('template_url'); ?>-child/images/brass_heart.jpg" class="front-img">
                                             <span class="woo-complex-custom" style="display: none;">	
                                             <span class="front_line_text1" id="front_line1"></span>
                                            <span class="front_line_text2" id="front_line2">www.idtag.com</span>
                                             <span class="front_line_text3" id="front_line3">(866)60-FOUND</span>
                                             <span class="front_line_text4" id="front_line4"></span>

                                             </span>
                                             </span>
                                          </div>
                                          <div class="section-back-image design-heart micro-back">
                                             <label>Back:</label>
                                             <span class="micro-back-img">
                                             <img src="<?php bloginfo('template_url'); ?>-child/images/brass_heart.jpg" class="back-img">
                                             <span class="woo-complex-custom">	
                                             <span class="back_line_text1" id="back_line1"></span>
                                            <span class="back_line_text2" id="back_line2">www.idtag.com</span>
                                            <span class="back_line_text3" id="back_line3">(866)60-FOUND</span>
                                            <span class="back_line_text4" id="back_line4"></span>
                                           </span>
                                             </span>
                                             </span>
                                          </div>
                                       </div>
                                       <div class="color-pro">
                                          <div class="section-front-image color-circle micro-back">
                                             <label>Front:</label>
                                             <span class="micro-back-img">
                                             <img src="<?php bloginfo('template_url'); ?>-child/images/bluetag2.jpg" class="front-img"> 
                                             <span class="woo-complex-custom" style="display: none;">	
                                             <span class="front_line_text1" id="front_line1"></span>
                                            <span class="front_line_text2" id="front_line2">www.idtag.com</span>
                                             <span class="front_line_text3" id="front_line3">(866)60-FOUND</span>
                                             <span class="front_line_text4" id="front_line4"></span>

                                             </span>
                                          </div>
                                          <div class="section-back-image color-circle micro-back">
                                             <label>Back:</label>
                                             <span class="micro-back-img">
                                             <img src="<?php bloginfo('template_url'); ?>-child/images/bluetag2.jpg" class="back-img">
                                             <span class="woo-complex-custom">	
                                             <span class="back_line_text1" id="back_line1"></span>
                                             <span class="back_line_text2" id="back_line2">www.idtag.com</span>
                                            <span class="back_line_text3" id="back_line3">(866)60-FOUND</span>
                                            <span class="back_line_text4" id="back_line4"></span>
                                           </span>
                                             </span>
                                             </span>
                                          </div>
                                          <div class="section-front-image color-bone micro-back">
                                             <label>Front:</label>
                                             <span class="micro-back-img">
                                             <img src="<?php bloginfo('template_url'); ?>-child/images/black_bone_shape_2_2.png" class="front-img">
                                             <span class="woo-complex-custom" style="display: none;">	
                                             <span class="front_line_text1" id="front_line1"></span>
                                             <span class="front_line_text2" id="front_line2">www.idtag.com</span>
                                             <span class="front_line_text3" id="front_line3">(866)60-FOUND</span>
                                             <span class="front_line_text4" id="front_line4"></span>

                                             </span>
                                             </span>
                                          </div>
                                          <div class="section-back-image color-bone micro-back">
                                             <label>Back:</label>
                                             <span class="micro-back-img">
                                             <img src="<?php bloginfo('template_url'); ?>-child/images/black_bone_shape_2_2.png" class="back-img">
                                             <span class="woo-complex-custom">	
                                             <span class="back_line_text1" id="back_line1"></span>
                                           <span class="back_line_text2" id="back_line2">www.idtag.com</span>
                                            <span class="back_line_text3" id="back_line3">(866)60-FOUND</span>
                                            <span class="back_line_text4" id="back_line4"></span>
                                           </span>
                                         </span>
                                          </div>
                                          <div class="section-front-image color-heart micro-back">
                                             <label>Front:</label>
                                             <span class="micro-back-img">
                                             <img src="<?php bloginfo('template_url'); ?>-child/images/heart_pink_shape_2.png" class="front-img">
                                             <span class="woo-complex-custom" style="display: none;">	
                                             <span class="front_line_text1" id="front_line1"></span>
                                             <span class="front_line_text2" id="front_line2">www.idtag.com</span>
                                             <span class="front_line_text3" id="front_line3">(866)60-FOUND</span>
                                             <span class="front_line_text4" id="front_line4"></span>

                                             </span>
                                             </span>
                                          </div>
                                          <div class="section-back-image color-heart micro-back">
                                             <label>Back:</label>
                                             <span class="micro-back-img">
                                             <img src="<?php bloginfo('template_url'); ?>-child/images/heart_pink_shape_2.png" class="back-img">
                                             <span class="woo-complex-custom">	
                                             <span class="back_line_text1" id="back_line1"></span>
                                            <span class="back_line_text2" id="back_line2">www.idtag.com</span>
                                            <span class="back_line_text3" id="back_line3">(866)60-FOUND</span>
                                            <span class="back_line_text4" id="back_line4"></span>
                                           </span>
                                             </span>
                                             </span>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-sm-4">
                                 <strong>Price:&nbsp;</strong>$<span id="ProductPrice"></span>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="acc-blue-box" id="pln-div" style="display: none;">
                        <div class="acc-blue-head">
                           Pet Protection Plan
                           <div class="acc-edit remove_plan">
                              <i class="fa fa-edit"></i> EDIT
                           </div>
                        </div>
                        <div class="acc-blue-content">
                           <div class="row">
                              <div class="col-sm-12">
                                 <span id="pln"><strong>None</strong></span>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="acc-blue-box" id="ArrangementDiv" style="display: none;">
                        <div class="acc-blue-head">
                           Pet Protection Arrangement
                           <div class="acc-edit engrave-edit">
                              <i class="fa fa-edit"></i> EDIT
                           </div>
                        </div>
                        <div class="acc-blue-content">
                           <div class="row">
                              <div class="col-sm-12">
                                 <strong id="Arrangement">None</strong>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="acc-blue-box" id="Insurance-div" style="display: none;">
                        <div class="acc-blue-head">
                           Pet Health Insurance
                           <div class="acc-edit engrave-edit">
                              <i class="fa fa-edit"></i> EDIT
                           </div>
                        </div>
                        <div class="acc-blue-content">
                           <div class="row">
                              <div class="col-sm-12">
                                 <strong id="Insurance">Free Month</strong>
                              </div>
                           </div>
                        </div>
                     </div>
                     
                     <div class="acc-blue-box">
                        <div class="acc-blue-head">
                           Contact Information
                           <div class="acc-edit usr-edits">  <i class="fa fa-edit"></i> EDIT</div>
                        </div>
                        <div class="acc-blue-content">
                           <div class="row">
                            <?php if(is_user_logged_in()){ ?>
                              <div class="col-sm-6 mar-bot">
                                 <p><strong class="color-light-blue">Primary Contact:</strong>
                                 </p>
                                 <strong>Email:</strong> <span id="pemail"><?= $email;?></span>
                                 <br>  <strong>First Name:</strong> <span id="pfnam"><?= $first_name;?></span>
                                 <br>  <strong>Last Name:</strong> <span id="plnam"><?= $last_name;?></span><br>
                                 <strong>Address1:</strong> <span id="uadd1"><?= $primary_address_line1 ?></span><br> 
                                 <strong>Address2:</strong> <span id="uadd2"><?= $primary_address_line2; ?></span><br>
                                 <strong>City:</strong> <span id="ucity1"><?= $primary_city;?></span><br>
                                 <strong>Zip Code:</strong> <span id="uzip"><?= $primary_postcode;?></span><br>
                                 <strong>State:</strong> <span id="ustte"><?= stateName($primary_state); ?></span><br>
                                 <strong>Country:</strong> <span id="ucounty"><?= getCountryName($primary_country);?></span><br>

                                 <strong>Primary Phone Number:</strong>
                                  <span id="p_prm_no_code"><?= 
                                    get_phone_by_contry_code($primary_home_number_code);?></span>
                                    <span id="pnum"><?= $primary_home_number;?></span>
                                    <br>
                                    <!-- <strong>Secondary Phone Number:</strong><span id="p_sec_no_code"><?= 
                        get_phone_by_contry_code($primary_cell_number_code);?></span>
                        <span id="snum">
                        <?= $primary_cell_number;?></span> -->
                              </div>
                              <div class="col-sm-6">
                                 <p><strong class="color-light-blue">Secondary Contact:</strong>
                                 </p>
                                 <strong>Email:</strong> <span id="semail"><?= $Semail ?></span><br>
                                 <strong>First Name:</strong> <span id="sfirst"><?= $Sfirst_name; ?></span><br>
                                 <strong>Last Name:</strong> <span id="slst"><?= $Slast_name; ?></span><br>
                                 <strong>Address1:</strong> <span id="preAdd1"><?= $Sprimary_address_line1; ?></span><br>
                                 <strong>Address2:</strong> <span id="preAdd2"><?= $Sprimary_address_line2; ?></span><br>
                                 <strong>City:</strong> <span id="scity"><?= $Sprimary_city ?></span><br>
                                 <strong>Zip Code:</strong> <span id="szip"><?= $Sprimary_postcode ?></span><br>
                                 <strong>State:</strong> <span id="sttate"><?= stateName($Sprimary_state); ?></span><br>
                                 <strong>Country:</strong> <span id="scounty"><?= getCountryName($Sprimary_country); ?></span><br>

                                 <strong>Primary Phone Number:</strong>  
                                  <span id="s_prm_no_code"><?= 
                                  get_phone_by_contry_code($secondary_cell_country_code);?>
                                  </span>
                                  <span id="sprino">
                                  <?= $Sprimary_home_number; ?></span><br>

                                <strong>Secondary Phone Number:</strong>  
                                <span id="s_sec_no_code"><?= 
                                  get_phone_by_contry_code($secondary_phone_country_code);?>
                                    
                                </span>
                                <span id="sseno">
                                  <?= $Sprimary_cell_number; ?>
                                </span> 
                              </div>
                           </div>
                            <?php }else { ?>
                              <div class="col-sm-6 mar-bot">
                                 <p><strong class="color-light-blue">Primary Contact:</strong>
                                 </p>
                                 <strong>Email:</strong> <span id="pemail"></span>
                                 <br>  <strong>First Name:</strong> <span id="pfnam"></span>
                                 <br>  <strong>Last Name:</strong> <span id="plnam"></span><br>
                                 <strong>Address1:</strong> <span id="uadd1"></span><br> 
                                 <strong>Address2:</strong> <span id="uadd2"></span><br>
                                 <strong>City:</strong> <span id="ucity1"></span><br>
                                 <strong>Zip Code:</strong> <span id="uzip"></span><br>
                                 <strong>State:</strong> <span id="ustte"></span><br>
                                 <strong>Country:</strong> <span id="ucounty"></span><br>
                                 <strong>Primary Phone Number:</strong> 
                                 <span id="p_prm_no_code"></span>
                                 <span id="pnum"></span><br>
                                 <!-- <strong>Secondary Phone Number:</strong>
                                 <span id="p_sec_no_code"></span> <span id="snum"></span> -->
                              </div>
                              <div class="col-sm-6">
                                 <p><strong class="color-light-blue">Secondary Contact:</strong>
                                 </p>
                                 <strong>Email:</strong> <span id="semail"></span><br>
                                 <strong>First Name:</strong> <span id="sfirst"></span><br>
                                 <strong>Last Name:</strong> <span id="slst"></span><br>
                                 <strong>Address1:</strong> <span id="preAdd1"></span><br>
                                 <strong>Address2:</strong> <span id="preAdd2"></span><br>
                                 <strong>City:</strong> <span id="scity"></span><br>
                                 <strong>Zip Code:</strong> <span id="szip"></span><br>
                                 <strong>State:</strong> <span id="sttate"></span><br>
                                 <strong>Country:</strong> <span id="scounty"></span><br>
                                 <strong>Primary Phone Number:</strong> 
                                 <span id="s_prm_no_code"></span>
                                 <span id="sprino"></span><br>
                                 <strong>Secondary Phone Number:</strong>
                                 <span id="s_sec_no_code"></span>
                                  <span id="sseno"></span>
                              </div>
                           </div>
                           <?php } ?>
                           <div class="col-sm-6 mar-bot">
                                 <p><strong class="color-light-blue">Veterinarian Information:</strong>
                                 </p>
                                 <strong>Email:</strong> <span id="vemail"></span><br>
                                 <strong>First Name:</strong> <span id="vname"></span><br>
                                 <strong>Last Name:</strong> <span id="vlst"></span><br>
                                 <!-- <strong>Address:</strong><span id="v-addrss"></span><br> -->
                                 <strong>Address1:</strong> <span id="vadd1"></span><br> 
                                 <strong>Address2:</strong> <span id="vadd2" ></span><br>
                                 <strong>City:</strong> <span id="vcity"></span><br>
                                 <strong>Zip Code:</strong> <span id="vzip"></span><br>
                                 <strong>State:</strong> <span id="vstate"></span><br>
                                 <strong>Country:</strong> <span id="vcounty"></span><br>
                                 <strong>Primary Phone Number:</strong> <span id="vprim"></span><br>
                                 <strong>Secondary Phone Number:</strong> <span id="vsec"></span>
                              </div>
                        </div>
                     </div>
                    
                     <div class="acc-blue-box">
                        <div class="acc-blue-head">
                           Registered Pet
                           <div class="acc-edit petpro-edits">
                              <i class="fa fa-edit"></i> EDIT
                           </div>
                        </div>
                        <div class="acc-blue-content">
                           <div class="row">
                              <div class="col-sm-6">
                                 <strong>Microchip Id Number:</strong> <span id="universal_microchip_id"></span>
                                 <!-- <br> -->
                                 <!-- <strong>Microchip Brand:</strong> <span id="microchip_company"></span> -->
                                 <br>
                                 <strong>Pet Name:</strong> <span id="pet_name"></span>
                                 <br>
                                 <strong>Pet Type:</strong> <span id="pet_type"></span>
                                 <!-- <br> -->
                                 <!-- <strong>Secondary Breed:</strong> <span id="primary_breed"></span> -->
                                 <br>
                                 <strong>Primary Breed:</strong> <span id="primary_breed"></span>
                                 <br>
                                 <strong>Primary Color:</strong> <span id="primary_color"></span>
                                 <br>
                                 <strong>Secondary Color:</strong> <span id="secondary_color"></span>
                                 <br>
                                 <strong>Gender:</strong> <span id="gender"></span>
                                 <br>
                                 <strong>Size:</strong> <span id="size"></span>
                                 <br>
                                 <strong>Pet Date of Birth:</strong> <span id="ptdob"></span>
                              </div>
                              <div class="col-sm-6">
                                 <p><strong>Pet Image:</strong></p>
                                    <img id="blah" src="/wp-content/uploads/2019/02/pet-image.jpg" alt="your image" />
                              </div> 
                           </div>
                        </div>
                     </div>
                     <div class="step-btns">
                        <button class="btn btn-default btn-prev" type="button" aria-controls="step-6"><i class="fa fa-caret-left"></i> Back</button>
                        <button class="btn btn-default" type="submit">Checkout and Register Microchip<i class="fa fa-caret-right"></i></button>
                     </div>
                  </fieldset>
                </form>   
            </section>
         </div>
         <?php //nectar_pagination(); ?>
      </div>
      <!--/row-->
   </div>
   <!--/container-->
</div>
<!--/container-wrap-->
<input type="hidden" name="universalMicrochip" value="1">
<script type="text/javascript">
	jQuery(document).ready(function(){
        /* code for next button click Purchase an Engraved ID Tag */
        $('#purchase_id_tag').html('Purchase an Engraved ID Tag with Your Pet Name & Microchip Number');
        $("#sname_input").keyup(function(){
            var microchipNumber = $("#sname_input").val();
            localStorage.setItem("microchipNumber", microchipNumber);
        });

        $("#pname_input").keyup(function(){
            var microchipNumber = localStorage.getItem('microchipNumber');
            var petName = $("#pname_input").val();
                if(!microchipNumber == '' && !petName == ''){
                    $('#purchase_id_tag').html('Purchase an Engraved ID Tag with '+petName+' & '+microchipNumber);
                }
        });

        $('.copyUniversalFromStep1').change(function(){
            var UniversalMichrochip = $('.copyUniversalFromStep1').val();
            $('.copyUniversal').val(UniversalMichrochip);
            
        });
    }); 

</script>
<script type="text/javascript">
    $(document).ready(function(){


    if($('.primary_checkbox').is(':checked')){
        localStorage.setItem("cart_checkbox", "yes");
    }else{
        localStorage.setItem("cart_checkbox", "no");
    }
    /*hide website name on tag if we choose small style*/

    var size = $('.select_size').val();
        if(size == 'small'){
            $('.back_line_text2').hide();
        }else{
            $('.back_line_text2').show();
    }

    $('.select_size').change(function(){
    var size = $(this).val();
        if(size == 'small'){
            $('.back_line_text2').hide();
        }else{
            $('.back_line_text2').show();
        }

    });




/*Get product variation dynamically*/

    setTimeout(function() { //fetch tag's on page load
        var size = $('#selectSize .list .selected').attr('data-value');
        var type = $('#selectType .list .selected').attr('data-value');
        var product_id = '6089';
        getVariationFromSelectedAttr(type,size,product_id);
    }, 2500);

/*choose Tag type*/
    $(document).on( 'click', '#selectType .list li', function(e){
        e.preventDefault();
        var type = $(this).attr('data-value');
        var product_type = $(this).attr('data-product');
        var size = $('#selectSize .list .selected').attr('data-value');
        if(product_type == 'aluminum'){
            var product_id = '6033';
        }else{
            var product_id = '6089';
        }
            getVariationFromSelectedAttr(type, size,product_id);
               
        }); 
/*choose Tag size*/
    $(document).on( 'click', '#selectSize .list li', function(e){
        e.preventDefault();
        var size = $(this).attr('data-value');
        var type = $('#selectType .list .selected').attr('data-value');
        var product_type = $('#selectType .list .selected').attr('data-product');
            if(product_type == 'aluminum'){
                var product_id = '6033';
            }else{
                var product_id = '6089';
            }
            
            getVariationFromSelectedAttr(type, size,product_id);
               
        }); 
    });


    function getVariationFromSelectedAttr(type,size,product_id){
        var data = {    
                product_id : product_id, 
                type :  type, 
                size :  size, 
                action : 'get_product_variation_on_homepage',
            }
            $(".loader-wrap").fadeIn();
            
        $.ajax({
            type: 'POST',
            url: ajaxurl,
            data: data,
            dataType: "json",
            success: function(response) {
                $(".loader-wrap").fadeOut();
                var data = response.data;
                jQuery('.showOnGrid').show();
                jQuery('.showOnGrid').html('');
                jQuery(data).each(function(index,attr){
                    console.log(attr);


                    if(attr.product_type == 'Aluminum' ){
                        jQuery('.showOnGrid').append('<label class="btn" role="button" class="small-bone"><input type="radio" value="'+attr.attribute_pa_color+'" name="style" class="style-radio" data-name="design-'+attr.attribute_pa_shape+'"><div class="custom-radio-img"><img src="'+attr.attribute_image+'" alt="radio image" data-name="design-circle"/></div><span class="tag-name">'+attr.attribute_name+'</span></label>');
                    }else{
                        jQuery('.showOnGrid').append('<label class="btn" role="button" class="small-bone"><input type="radio" value="'+attr.attribute_pa_style+'" name="style" class="style-radio" data-name="design-'+attr.attribute_pa_ttype+'"><div class="custom-radio-img"><img src="'+attr.attribute_image+'" alt="radio image" data-name="design-circle"/></div><span class="tag-name">'+attr.attribute_name+'</span></label>'); 
                    }
                });
            }
        });

    }





</script>
<?php get_footer(); ?>