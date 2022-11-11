<?php 
/*
* Template Name:  Update Pet Information Template
*/
get_header(); 
$getTypes = get_top_parents('pet_type_and_breed');

if ( !is_user_logged_in() ){
    print('<script>
    		window.location.href = "'.site_url().'/login-to-smarttag/?login=1&redir=https://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'].'";
    	</script>');
    die();    
}
?>
<div class="container-wrap">		
	<div class="container main-content">
		<div class="row">
			<div class="col-sm-3 woo-sidebar">
				<h3 class="widgettitle"><?php echo $parent_title = get_the_title($post->post_parent); ?></h3>
				<?php echo do_shortcode("[wpb_childpages]"); ?>
		    </div>
			<div class="col-sm-9">
				<div class="page-heading">
					<h1><?php echo get_the_title(); ?></h1>
				</div>
			<?php if (isset($_POST['post_id'])) {
			        $postId = $_POST['post_id'];
			        $args = array( 'post_type' => 'pet_profile', 'p' => $postId);
			        $my_posts = new WP_Query($args); 
			        while ( $my_posts->have_posts() ) : $my_posts->the_post(); 
			            $mypod              = pods( 'pet_profile', get_the_id() ); 
			            $title              = get_the_title();
			            $smarttagid         = $mypod->display('smarttag_id_number');
			            $pet_type           = $mypod->display('pet_type');
			            $primary_breed      = $mypod->display('primary_breed');
			            $secondary_breed    = $mypod->display('secondary_breed');
			            $primary_color      = $mypod->display('primary_color');
			            $secondary_color    = $mypod->display('secondary_color');
			            $gender             = $mypod->display('gender');
			            $size               = $mypod->display('size');
			            $pet_date_of_birth  = $mypod->display('pet_date_of_birth');
			            $post_thumbnail_id  = get_post_thumbnail_id( get_the_id() );
			            $imageUrl 			= get_the_post_thumbnail_url();
			            ?>
			            <h3>Update Pet Information For:</h3>
			            <div class="row border-bottom">
			                <div class="col-sm-3 rmb-15">
			                   	<p><img class="pet-img" src="<?php echo $imageUrl; ?>" alt=""></p>
			                </div>
			                <div class="col-sm-9">
			                    <strong>Pet Name:</strong> <span class="name"><?php echo get_the_title(); ?></span>
			                    <br>
			                    <strong>Pet Type:</strong> <?php 

			                    
			                    if($pet_type == '587'){
			                    	echo 'Cat';
			                    }elseif($pet_type == '1045'){
			                    	echo 'Dog';
			                    }elseif($pet_type == '1046'){
			                    	echo 'Ferret';
			                    }elseif($pet_type == '588'){
			                    	echo 'Horse';
			                    }elseif($pet_type == '1048'){
			                    	echo 'Other';
			                    }else{
			                    	echo 'Rabbit';
			                    }
			                    


			                     ?>
			                    											
			                    <br>
			                    <strong>IDTag Serial Number:</strong> <span class="name"><?php echo $mypod->display('smarttag_id_number'); ?></span>
			                    <br>
			                     <strong>IDTag Microchip Number:</strong> <span class="name"><?php echo $mypod->display('microchip_id_number'); ?></span>
			                </div>
			            </div>            
			        <?php endwhile;
			    ?>
			    <div class="contact-form">
			        <form class="update-pet-form" action="" method="post">
			        	<input type="hidden" name="petId" value="<?php echo $postId; ?>">
			        	<input type="hidden" name="action" value="ourServicesUpdatePetInfo">
			            <div class="lost-pet">
			                <div class="field-wrap two-fields-wrap">
			                    <div class="field-div">
			                        <label>*Pet Name:</label>
			                        <input type="text" name="pet_name" value="<?php echo $title; ?>" id="pet_name" placeholder="Pet Name" required="">
			                    </div>
			                </div>
			                <div class="field-wrap two-fields-wrap">
			                    <div class="field-div">
			                    	<label>Current Pet Image:</label>
			                        <p><img class="pet-img" id="file-preview" src="<?php 
			                        	if($imageUrl!=''){
				                        		echo  $imageUrl;
			                        	}else{
												echo $imageUrl = $_SERVER['HTTP_ORIGIN'].'/wp-content/uploads/2021/01/dog-placeholder.png?w=1080&ssl=1';
			                        	}

			                         ?>" style=" height: 100px;width: 100px;" alt=""></p>
			                    </div>
			                    <div class="field-div">
			                        <label>Upload a New Pet Image:</label>
			                        <input type="file" name="feature" class="pet-image" id="pet-image"  onchange="showPreview(event);">
			                        <div class="field-notice">
										Files must be less then 2MB. <br> Allowed file types .png/ .gif/ .jpg/ .jpeg
									</div>
			                    </div>
			                </div>
			                <div class="field-wrap two-fields-wrap">
							  	<div class="field-div">
									<label>*Pet Type & Breed: </label>
									<div class="field-wrap two-fields-wrap">
										<div class="field-div">
										 	<select name="pet_type" class="text-data" id="pettype" required="" aria-required="true">

										 		<option value="">Type</option>
														<?php foreach ($getTypes as $key => $value) { ?>
															<option value="<?= $value['term_id'] ?>" <?php if ($pet_type == $value['term_id']): ?>
																		selected="selected"
												<?php endif ?>><?= $value['name'] ?></option>

														<?php } ?>



<!-- 												<option value="">Type</option>
												<option value="Type1" <?=  ($pet_type =='Type1') ? "selected": "" ?>>Type1</option>
												<option value="Type2" <?=  ($pet_type =='Type2') ? "selected": "" ?>>Type2</option>
												<option value="Type3" <?=  ($pet_type =='Type3') ? "selected": "" ?>>Type3</option>
												<option value="Type4" <?=  ($pet_type =='Type4') ? "selected": "" ?>>Type4</option> -->
											</select>
										</div>
									    <div class="field-div">
										   <?php $primbred =  $mypod->display('primary_breed'); 
										  $primchild = get_term_children( $pet_type , "pet_type_and_breed" );



										   ?>
										   <select name="primary_breed" id="breedid">
										    <option value="">Breed</option>
										    <?php 
										    foreach ($primchild as $key => $childTermId) {
										     $primaryselected = ($primbred == $childTermId) ? 'selected' : '';
										     echo "<option ".$primaryselected." value='".$childTermId."'>".get_term($childTermId)->name. "</option>";
										   }
										   ?>
										 </select>

									
										</div>
									</div>
						    	</div>
						    	<div class="field-div">
									<label>Secondary Breed:</label>
								    	  
								    	  <?php $secbred = $mypod->display('secondary_breed');
								    	  $secchild = get_term_children( $pet_type , "pet_type_and_breed" );
								    	  ?>
								    	  <select name="secondary_breed" id="sbreedid">
								    	   <option value="">Breed</option>
								    	   <?php 
								    	   foreach ($secchild as $key => $childTermId) {

								    	    $secselected = ($secbred == $childTermId) ? 'selected' : '';
								    	    echo "<option ".$secselected." value='".$childTermId."'>".get_term($childTermId)->name. "</option>";
								    	  }
								    	  ?>
								    	</select>											

								</div>
					     	</div>
					    	<div class="field-wrap two-fields-wrap">
								<div class="field-div">
									<label>*Primay Color: </label>
								  

								   <select name="primary_color" class="text-data" id="pcolor" required="" aria-required="true">
										<option value="">Select Color</option>
										<option value="1" <?php if ($primary_color == "1"): ?>
													selected="selected"
												<?php endif ?>>Black</option>
										<option value="2" <?php if ($primary_color == "2"): ?>
													selected="selected"
												<?php endif ?>>Blue</option>
										<option value="3" <?php if ($primary_color == "3"): ?>
													selected="selected"
												<?php endif ?>>Brown</option>
										<option value="4" <?php if ($primary_color == "4"): ?>
													selected="selected"
												<?php endif ?>>Gold</option>
										<option value="5" <?php if ($primary_color == "5"): ?>
													selected="selected"
												<?php endif ?>>Gray</option>
										<option value="6" <?php if ($primary_color == "6"): ?>
													selected="selected"
												<?php endif ?>>Orange</option>
										<option value="7" <?php if ($primary_color == "7"): ?>
													selected="selected"
												<?php endif ?>>Red</option>
										<option value="8" <?php if ($primary_color == "8"): ?>
													selected="selected"
												<?php endif ?>>Sliver</option>
										<option value="9" <?php if ($primary_color == "9"): ?>
													selected="selected"
												<?php endif ?>>Tan</option>
										<option value="10" <?php if ($primary_color == "10"): ?>
													selected="selected"
												<?php endif ?>>White</option>
										<option value="11" <?php if ($primary_color == "11"): ?>
													selected="selected"
												<?php endif ?>>Yellow</option>

									</select>

								</div>





								<div class="field-div">
									<label>Secondary Color(s)</label>
									
									 <select name="secondary_color" class="text-data" id="scolor" required="" aria-required="true">
										<option value="">Select Color</option>
										<option value="1" <?php if ($secondary_color == "1"): ?>
													selected="selected"
												<?php endif ?>>Black</option>
										<option value="2" <?php if ($secondary_color == "2"): ?>
													selected="selected"
												<?php endif ?>>Blue</option>
										<option value="3" <?php if ($secondary_color == "3"): ?>
													selected="selected"
												<?php endif ?>>Brown</option>
										<option value="4" <?php if ($secondary_color == "4"): ?>
													selected="selected"
												<?php endif ?>>Gold</option>
										<option value="5" <?php if ($secondary_color == "5"): ?>
													selected="selected"
												<?php endif ?>>Gray</option>
										<option value="6" <?php if ($secondary_color == "6"): ?>
													selected="selected"
												<?php endif ?>>Orange</option>
										<option value="7" <?php if ($secondary_color == "7"): ?>
													selected="selected"
												<?php endif ?>>Red</option>
										<option value="8" <?php if ($secondary_color == "8"): ?>
													selected="selected"
												<?php endif ?>>Sliver</option>
										<option value="9" <?php if ($secondary_color == "9"): ?>
													selected="selected"
												<?php endif ?>>Tan</option>
										<option value="10" <?php if ($secondary_color == "10"): ?>
													selected="selected"
												<?php endif ?>>White</option>
										<option value="11" <?php if ($secondary_color == "11"): ?>
													selected="selected"
												<?php endif ?>>Yellow</option>

									</select>

								</div>
							</div>
							<div class="field-wrap two-fields-wrap">
								<div class="field-div">
									<div class="field-wrap two-fields-wrap">
										<div class="field-div">
											<label>*Gender: </label>
											<select name="gender" class="text-data" id="pgender" required=""  />
										        <option value="">Select</option>
												<option value="male" <?php if ($gender == "male"): ?>
													selected="selected"
												<?php endif ?>>Male</option>
												<option value="female" <?php if ($gender == "female"): ?>
													selected="selected"
												<?php endif ?>>Female</option>
											</select>
										</div>
									    <div class="field-div">
									    	<label>Size </label>
										
										    	<select name="size" class="text-data" id="psize">
											    	<option value="">Select</option>
													<option value="1" <?php if ($size == "1"): ?>
													selected="selected"
												<?php endif ?>>Small</option>
													<option value="2" <?php if ($size == "2"): ?>
													selected="selected"
												<?php endif ?>>Medium</option>
													<option value="3" <?php if ($size == "3"): ?>
													selected="selected"
												<?php endif ?>>Large</option>
												</select>



										</div>
									</div>
								</div>
					          	<div class="field-div">
									<label>Pet Date of Birth:</label>
									<div class="field-wrap three-fields-wrap ">
										<input type="text" name="pet_date_of_birth" id="pet-dob1" placeholder="mm/dd/yyyy" class="input-10 input" value="<?= $pet_date_of_birth; ?>">
										<!-- <input type="text" name="pet_date_of_birth" id="pet-dob1" placeholder="mm/dd/yy" class="input text-data pet-birth-date" value="<?php echo $pet_date_of_birth; ?>" required=""> -->
									</div>
					         	</div>
					      	</div>
			                <div class="field-wrap">
			                    <div class="field-div text-right">
			                        <input type="submit" name="update_pet_info" value="Update Information" class="site-btn">
			                    </div>
			                </div>
			                <div class="field-wrap">
			                	<div class="field-div">
			                		<div class="pet-error"></div>
			                		<div class="image-error"></div>
			                	</div>
			                </div>
			            </div>
			        </form>
			    </div>
			    <script type="text/javascript">
			        jQuery(document).ready(function($) {
			        	jQuery.validator.addMethod("checkSize", function (value, element) {
						    if (value != "") {
						        var size = element.files[0].size;
						        if (size > 2*1000000)// checks the file more than 1 MB
						        {
						            return false;
						        } else {
						           return true;
						        }
						    }else{
						        return true;
						    }

						    }, "File must be less then 2MB");
			            $(".pet-birth-date").datepicker({
			                dateFormat : "mm/dd/yy"
			            });
			            $(function() {
	
							$("form.update-pet-form").validate({
								rules : {
									pet_name : 'required',
									pet_type : 'required',
									primary_breed : 'required',
									primary_color : 'required',
									gender : 'required',
									primary_color : 'required',
									feature:{
					                    required: false,
					                    extension: "jpg|png|gif|bmp|jpeg",
					                    checkSize: true
					                },
								},
								submitHandler: function(form) {
									$(".loader-wrap").fadeIn();

									$.ajax({
					                    type: 'POST',
					                    url: ajaxurl,
					                    data: new FormData(form),
					                    contentType: false,
					                    processData: false,
					                    success: function(response) {
					                    	$(".loader-wrap").fadeOut();
					                    	response = $.parseJSON(response);
					                    	console.log(response.pet.success);
					                        if (response.pet.success) {
					                        	$(".pet-error").html('<div class="alert alert-success  alert-dismissible" style="margin-top:18px;"><a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a><strong>Success!</strong> '+response.pet.msg+'</div>');
					                        }

					                        if( document.getElementById("pet-image").files.length != 0 ){
											    if (response.image.success) {
											    	$(".image-error").html('<div class="alert alert-success  alert-dismissible" style="margin-top:18px;"><a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a><strong>Success!</strong> '+response.image.msg+'</div>');
											    	$image = document.querySelector('input[type=file]');
											    	console.log($image);
											    	readURLL($image,'pet-img');
											    }else{
											    	$(".image-error").html('<div class="alert alert-danger  alert-dismissible" style="margin-top:18px;"><a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a> '+response.image.msg+'</div>');
											    }
											}
					                    }
						            });	
								}
							});
						});
			            /*$('form.update-pet-form').on("submit",function(e){
			            	e.preventDefault();
			            	
			            });*/
			        });
			    </script>
   
		<?php }else{
				$paged  = (get_query_var('paged')) ? get_query_var('paged') : 1;
			    $userId = get_current_user_id();
			    $args   = array(
			        'post_type' => 'pet_profile',
			        'paged' => $paged,
			        'author' => $userId
			    );                       
			    $query = new WP_Query($args);
			    $i = 0;
			    if ($query->have_posts()) {
			        while ( $query->have_posts() ) : $query->the_post(); 
			            $mypod = pods( 'pet_profile', get_the_id() ); 
			            $smarttag_id_number = $mypod->display('smarttag_id_number');
			            $microchip_id_number = $mypod->display('microchip_id_number');
			            $subscriptionId  = $mypod->display("smarttag_subscription_id");
			            if (!empty($subscriptionId)) {
			                $subscription   = wcs_get_subscription($subscriptionId);
			                if (!empty($subscription)) {
			                    // print_r($subscription);
			                    $startDate      = $subscription->get_date("date_created");
			                    $date           = $subscription->get_date("end");
			                    if (empty($date)) {
			                        $date           = $subscription->get_date("next_payment");
			                    }
			                    $date           = date_parse_from_format('Y-m-d H:i:s',$date);
			                    $date           = mktime(0, 0, 0, $date['month'], $date['day'], $date['year']);
			                    $date           = date("m/d/Y", $date);

			                    $startDate           = date_parse_from_format('Y-m-d H:i:s',$startDate);
			                    $startDate           = mktime(0, 0, 0, $startDate['month'], $startDate['day'], $startDate['year']);
			                    $startDate           = date("m/d/Y", $startDate);
			                    // $subscription = wc_get_order($subscriptionId);
			                    foreach( $subscription->get_items() as $item_id => $product_subscription ){
			                        // Get the name
			                        $product_name = $product_subscription['name']." (Expires: ".$date.")";
			                        $variationId  = $product_subscription['variation_id'];
			                    }
			                }
			            }else{
			                $product_name = '';
			                $startDate    = '';
			                $date         = '';
			            }
			            
			            ?>
			            <div class="bottom-border-box">
			                <h3>Registered Pet <?php echo ++$i; ?></h3>
			                <div class="row">
			                    <div class="col-sm-3 rmb-15">
			                        <a href="javascript:;" class="show-post">
			                            <?php echo get_the_post_thumbnail(); ?>
			                        </a>
			                    </div>
			                    <div class="col-sm-5 rmb-15">

			                    	<?php 
			                    			$show_profile =  site_url().'/my-account/show-profile?pet_id='.get_the_id(); ?>
									<strong>Pet Name:</strong> <a  target ="_blank" href="<?php echo $show_profile; ?>" class="show-post"><span class="name"><?php echo get_the_title(); ?></span></a>
			                        <br>
			                        <strong>Pet Type:</strong> <span><?php 
			                       $pet_type = $mypod->display('pet_type'); 
			                        	
			                        	if($pet_type == '587'){
			                        		echo 'Cat';
			                        	}elseif($pet_type == '1045'){
			                        		echo 'Dog';
			                        	}elseif($pet_type == '1046'){
			                        		echo 'Ferret';
			                        	}elseif($pet_type == '588'){
			                        		echo 'Horse';
			                        	}elseif($pet_type == '1048'){
			                        		echo 'Other';
			                        	}else{
			                        		echo 'Rabbit';
			                        	}
										?>
			                        </span>
			                        <br>
			                        <strong>IDTag Serial Number:</strong> <span class="name"><?php echo $mypod->display('smarttag_id_number'); ?></span>
			                        <br>
			                        <strong>IDTag Microchip Number:</strong> <span class="name"><?php echo $microchip_id_number; ?></span>
			                        <br>
			                        <strong>ID Tag Plan:</strong> <span><?php echo $product_name; ?></span>
			                    </div>
			                    <div class="col-sm-4 mb-elements">                        
			                        <form action="" method="post" class="custom-form">
			                            <input type="hidden" name="startDate" value="<?php echo $startDate; ?>">
			                            <input type="hidden" name="endDate" value="<?php echo $date; ?>">
			                            <input type="hidden" name="post_id" value="<?php echo get_the_ID(); ?>">
			                            <input type="hidden" name="smarttagid" value="<?php echo $smarttag_id_number; ?>">
			                            <p><button type="submit" class="site-btn-red">Update/Edit Pet Profile <i class="fa fa-caret-right"></i></button></p>
			                            <p><a href="javascript:;" class="custom-replacement-tag-btn light-blue-link"><strong>Order a free Replacement Tag</strong> <i class="fa fa-caret-right"></i></a></p>
			                            <?php if (!empty($product_name)) { ?>
			                                <p><a href="<?php echo 'get_site_url()/my-account/view-subscription/'.$subscriptionId.'/'; ?>" class="button view site-btn-light-blue">Update Protection Plan <i class="fa fa-caret-right"></i></a></p>
			                            <?php } ?>
			                     
			                        </form>
			                    </div>
			                </div>
			            </div>
			        <?php 
			        endwhile;
			        $total_pages = $query->max_num_pages;
			        if ($total_pages > 1){

			            $current_page = max(1, get_query_var('paged'));

			            echo "<div id='pagination'>".paginate_links(array(
			                'base' => get_pagenum_link(1) . '%_%',
			                'format' => 'page/%#%',
			                'current' => $current_page,
			                'total' => $total_pages,
			                'prev_text'    => __('prev'),
			                'next_text'    => __('next'),
			            ))."</div>";
			        }?>
			        <?php
			    } else{
			        echo "Sorry, No pet found";
			    } 
			} ?>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	
	  function showPreview(event){
  if(event.target.files.length > 0){
    var src = URL.createObjectURL(event.target.files[0]);
    var preview = document.getElementById("file-preview");
    preview.src = src;
    preview.style.display = "block";
  }
}
</script>


<script type="text/javascript">
/*	$(document).ready(function(){
		setTimeout(function(){
			var petTypeID = $('#pettype').val();
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
                    	console.log(Obj);

                    	$("#breedid").html(Obj.data);
                    	$("#sbreedid").html(Obj.data);
                    	
                    }
			        
                });

		}, 2000);
	});*/
</script>



<?php get_footer(); ?>
