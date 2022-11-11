<?php 
/*
* Template Name:  webhook-pet-profile
*/
get_header(); 


$getTypes = get_top_parents('pet_type_and_breed');

$single 		= true; 
$user_id 		= get_current_user_id(); 
$countries_obj 	= new WC_Countries();
$countries 		= $countries_obj->__get('countries');
$current_user   = get_user_by( 'id', $user_id );
$first_name 	= get_user_meta($user_id,'first_name',$single); 
$last_name 	    = get_user_meta($user_id,'last_name', $single); 
$email 		    = $current_user->user_email; 
$primary_country= get_user_meta($user_id,'primary_country',$single);
$primary_address_line1 = get_user_meta($user_id,'primary_address_line1',$single);
$primary_address_line2 = get_user_meta($user_id,'primary_address_line2',$single);
$primary_city		   = get_user_meta($user_id,'primary_city',$single); 
$primary_state 		   = get_user_meta($user_id,'primary_state',$single);
$primary_postcode 	   = get_user_meta($user_id,'primary_postcode',$single); 
$primary_home_number   = get_user_meta($user_id,'primary_home_number',$single);
$primary_home_number_code = get_user_meta($user_id,'primary_phone_country_code',$single);
$primary_cell_number   = get_user_meta($user_id,'primary_cell_number',$single); 
$primary_cell_number_code = get_user_meta($user_id,'primary_cell_country_code',$single); 
$Sfirst_name 	       = get_user_meta($user_id,'secondary_first_name',$single); 
$Slast_name 	       = get_user_meta($user_id,'secondary_last_name',$single); 
$Semail 		       = get_user_meta($user_id,'secondary_email',$single);
$Sprimary_country      = get_user_meta($user_id,'secondary_country',$single); 
$Sprimary_address_line1= get_user_meta($user_id,'secondary_address_line1',$single); 
$Sprimary_address_line2= get_user_meta($user_id,'secondary_address_line2',$single); 
$Sprimary_city		   = get_user_meta($user_id,'secondary_city',$single);
$Sprimary_state 	   = get_user_meta($user_id,'secondary_state',$single); 
$Sprimary_postcode 	   = get_user_meta($user_id,'secondary_postcode',$single); 
$Sprimary_home_number  = get_user_meta($user_id,'secondary_home_number',$single); 
$Sprimary_cell_number  = get_user_meta($user_id,'secondary_cell_number',$single);
$secondary_cell_country_code  = get_user_meta($user_id,'secondary_cell_country_code',$single);
$secondary_phone_country_code  = get_user_meta($user_id,'secondary_phone_country_code',$single);



/*Generate Rand No.*/

$temp_michrochip_no = rand('99999001', '99999999');



?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
	<div class="container-wrap">
		<div class="container main-content">
			<div class="row">
				<div class="woo-sidebar col-sm-3">
					<?php echo do_shortcode( "[stag_sidebar id='our-services']"); ?>
				</div>
				<div class="woo-content col-sm-9" id="woo-content">
					<?php if (has_post_thumbnail( $post->ID ) ): ?>
						<?php $image=wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
						<div class="page-image">
							<img src="<?php echo $image[0]; ?>" alt="image" />
						</div>
					<?php endif; ?>
					<div class="page-heading">
						<h1>Create A Pet Profile</h1>
					</div>
					<section class="multi-step-form">
						<form id="profileuser1" method="POST" enctype="multipart/form-data">
							<!--   <script src='https://www.google.com/recaptcha/api.js'></script> -->
							<fieldset aria-label="Step One" tabindex="-1" id="step-1" class="step-form-box">
								<div class="contact-form" id="pro-info">
									<div class="field-wrap two-fields-wrap">
										<div class="field-div">
											<label>* Temp Microchip Id Number</label>
											<input type="text" placeholder="Serial Number" name="smarttag_id_number" class="text-data sereal-number-1 webhook_check_id"  id="sname_input" required="" value="<?php echo $temp_michrochip_no; ?>" aria-required="true">	 <span class="valid_message "></span><span class="error" id="error"></span>
											<a href="<?php echo get_site_url().'/our-services/universal-microchip-register-new/';?>" class="show-atag error"style="display: none;">Click here</a>
										</div>
										<div class="field-div">
											<label></label>
											<input type="text" name="conf_smarttag_id_number" placeholder="Confirm Serial Number" class="sereal-number-2 text-data" required="" value="" aria-required="true">
										</div>
									</div>
									<div class="field-wrap two-fields-wrap">
										<div class="field-div">
											<label>*Pet Name</label>
											<input type="text" name="pet_name" class="text-data" id="pname_input" placeholder="Enter Pet Name" required="" />
											<span id="pname_input-error" style="display: none; color:red";>This field is required.</span>
										</div>
										<div class="field-div">&nbsp;</div>
									</div>
									<div class="field-wrap two-fields-wrap">
										<div class="field-div">
											<label>*Pet Type & Breed </label>
											<div class="field-wrap two-fields-wrap">
												<div class="field-div">
													<select name="pet_type" class="text-data pettype" id="pettype" required=""  >
														<option value="">Type</option>
														<?php foreach ($getTypes as $key => $value) { ?>

															<option value="<?= $value['term_id'] ?>"><?= $value['name'] ?></option>

														<?php } ?>
													</select>
													<span id="pettype-error" style="display: none;"class="error">This field is required.</span>	
												</div>
												<div class="field-div Pet_Type_Breed " style="display:none;">
													<select name="primary_breed" class="text-data" id="breedid" required="" >
														<option value="">Breed</option>

													</select>
												
												</div>
											</div>
										</div>
										<div class="field-div Pet_Type_Breed " style="display:none;">
											<label>Secondary Breed (Optional)</label>
											<select name="secondary_breed" class="text-data" id="sbreedid" >
												<option value="">Breed</option>
											</select>
										</div>
									</div>
									<div class="field-wrap two-fields-wrap">
										<div class="field-div">
											<label>*Primary Color</label>
										

											<select name="primary_color" class="text-data" id="pcolor" required="" >
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


													<span id="pcolor-error" style="display: none;"class="error">This field is required.</span>



										</div>
										<div class="field-div">
											<label>Secondary Color(s) (Optional)</label>
											<select name="secondary_color" class="text-data" id="scolor" required="" >
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
										</div>
									</div>
									<div class="field-wrap two-fields-wrap">
										<div class="field-div">
											<div class="field-wrap two-fields-wrap">
												<div class="field-div">
													<label>*Gender</label>
													<select name="gender" class="text-data" id="pgender" required="" />
													<option value="">Select</option>
													<option value="male">Male</option>
													<option value="Female">Female</option>
												</select>
												<span id="pgender-error" style="display:none;" class="error">This field is required.</span>
											</div>
											<div class="field-div">
												<label>Size(Optional)</label>
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
										<label>Pet Date of Birth (Optional)</label>
										<input type="date" name="pet_date_of_birth" id="pet-dob1-1" placeholder="mm/dd/yyyy" autocomplete="off" class="input-10 input text-data date-mnth-yer">
									</div>
								</div>
								
							</div>
								<div class="step-btns">
									<button class="btn btn-default  pet-profile" type="button" >Create Pet Profile
									</button>
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
</body>
</html>



<script type="text/javascript">
		
$(document).ready(function(){

/*
var error_pet = false;	


/*validation */



	$('.pet-profile').click(function(){



		var petName = $('#pname_input').val();
		var breed  = $('.pettype').val();
		var pcolor = $('#pcolor').val();
		var pgender = $('#pgender').val();
		var error= true;

		if(petName.length < 1 || breed.length < 1 || pcolor.length < 1 || pgender.length < 1){
			alert('Please fill all required field *');
			return false;
		}else{
			
		
			var fd = new FormData();
				fd.append('action', 'Create_Pet_profile_For_Webhook');
			    	$.each($('#profileuser1 .text-data'), function() {
			    		fd.append($(this).attr('name'), $(this).val());
			   	 	});
			    	 $('.loader-wrap').fadeIn();
			    	$.ajax({
			    	    type: 'POST',
			    	    url: ajaxurl,
			    	    data: fd,
			    	    contentType: false,
			    	    processData: false,
			    	    success: function(response) {
			    	    	 $('.loader-wrap').fadeOut();
		    	    			
			    	    	 if(response){
			    	    	 	$('#closed').attr('href','/cart');
		    	    	 	    	$('.popup-wrap').fadeIn(function(){
			    	    	 	     $('.popup-content').append('<div class=\"alert alert-success alert-dismissible\" style=\"margin-top:18px;\"><strong>Success!<\/strong> Pet Profile Successfully Created<\/div>');
			    	    	 	          	 
			    	    	 	    });
			    	    	}


			    		}
					});
			}	
	});
});


</script>

<?php get_footer();?>












});