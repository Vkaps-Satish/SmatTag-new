<?php 
/*
* Template Name:  Local Shelters and Rescue Groups
*/


ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


get_header(); 
$roles = array('rescue_groups', 'animals_shelters');

$limit = 10;// total no of author to display
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
if($paged==1){
  	$offset = 0;  
}else{
	$offset = ($paged-1)*$limit;
}
/*custom code added for getting conditional shelters by developer*/
if(isset($_GET) && !empty($_GET['zipcode'])){

	$users_query = new WP_User_Query( array( 
		'number' => $limit, 
		'offset' => $offset,
		'meta_key' => 'primary_postcode',
    	'meta_value' => $_GET['zipcode']
	));
}else{

		$users_query = new WP_User_Query( array( 
		'number' => $limit, 
		'offset' => $offset,
    	'meta_key' => 'primary_postcode',
    	'meta_value' => '98747'
	));

}
// end

$totalCount = $users_query->total_users;

$results = $users_query->get_results();




$count = count($results);


$i = 0;
$totalPages = ceil($totalCount/$limit);
?>
<div class="container-wrap">		
	<div class="container main-content">
		<div class="row">
			<div class="col-sm-9">
				<div class="page-heading heading-right-link">
					<h1><?php echo get_the_title(); ?></h1>
				</div>
				<div class="Shelter-find">
					<form name="Shelter" id="Selt" novalidate="novalidate">
						<div class="field-div">
							<label>Enter Zipcode</label>
							<input type="text" required name="zipcode" autocomplete="off"  id="zipcode12" onkeypress="return IsNumeric(event);" value="<?php echo  $b_breed =   (isset($_GET['zipcode'])) ? $_GET['zipcode'] : "" ; ?>" />
							<span id="error" style="color: Red; display: none"> *Please insert number only</span>
							<span id="error-1" style="color: Red; display: none"> *Please sdsdinsert number only</span>
							<div>
								<button type="submit" class="submt" id="submit">
									Submit <i class="fa fa-caret-right"></i>
								</button>

							</div>
							
						</div>
					</form>
				</div><br/><br/>
				<div class="tabGroup pet-pro-tabs">
				    <div class="swichtab-contents">
				        <div id="pp-shelter" class="swichtab-panel-1" data-swichtab="target">



				            <div class="pet-pro-content">
				            	<div class="page-featured-img">
				            		<img src="<?php bloginfo('template_url'); ?>-child/images/shelter-rescue-banner.jpg" alt="image" />
				            	</div>
				            	<?php

				            	if($count > 0){




				            	 while ($i < $count) { ?>
				            		<?php 
				            		$userInfo = get_userdata($results[$i]->ID);
									$userBame = $userInfo->display_name;
									$userEmail = $userInfo->user_email;
				            		$orgName = get_user_meta($results[$i]->ID, 'Organization_name', true);
				            		$addressLine1 = get_user_meta($results[$i]->ID, 'primary_address_line1', true);
				            		$addressLine2 = get_user_meta($results[$i]->ID, 'primary_address_line2', true);
				            		$city = get_user_meta($results[$i]->ID, 'primary_city', true);
				            		$state = get_user_meta($results[$i]->ID, 'primary_state', true);
				            		$postcode = get_user_meta($results[$i]->ID, 'primary_postcode', true);
				            		$country = get_user_meta($results[$i]->ID, 'primary_country', true);
				            		$phoneNumber = get_user_meta($results[$i]->ID, 'primary_home_number', true);

				            		if (!empty($state)) {
				            			$state = stateName($state, $country);
				            		}

				            		if (!empty(trim($addressLine2))) {
				            			$address = "$addressLine1, $addressLine2, $city, $state, $postcode, $country";
				            			$apiAdd = "$addressLine1, $addressLine2, $city, $state, $country";
				            		}else{
				            			$address = "$addressLine1, $city, $state, $postcode, $country";
				            			$apiAdd = "$addressLine1, $city, $state, $country";
				            		}
				            		?>
					            	<div class="row">
					            		<div class="col-sm-4">
					            			<div class="field field-name-field-image field-type-image field-label-hidden">
					            				<div class="field-items">
					            					<div class="field-item even">
					            					

					            						<img typeof="foaf:Image" src="https://staging.idtag.com/wp-content/uploads/2021/01/default_shelter_img.jpg" width="220" height="220" alt="">
					            					</div>
					            				</div>
					            			</div>
					            		</div>
					            		<div class="col-sm-8">
					            			<div class="field field-name-title field-type-ds field-label-hidden">
					            				<div class="field-items">
					            					<div class="field-item even" property="dc:title">
					            						<h2><?php echo $orgName; ?></h2>
					            					</div>
					            				</div>
					            			</div>
					            			<div class="field field-name-field-address field-type-addressfield field-label-hidden">
					            				<div class="field-items">
					            					<div class="field-item even"><?php echo $address; ?></div>
					            				</div>
					            			</div>
					            			<div class="field field-name-field-email field-type-email field-label-hidden">
					            				<div class="field-items">
					            					<div class="field-item even"><?php echo $userEmail; ?></div>
					            				</div>
					            			</div>
					            			<div class="field field-name-field-home-phone field-type-phone-number field-label-hidden">
					            				<div class="field-items">
					            					<div class="field-item even"><?php echo $phoneNumber; ?></div>
					            				</div>
					            			</div>
					            		</div>
					            	</div>
					            	<?php $i++; ?>
					        	<?php } 

					        }else{
					        	echo "Not data found";
					        }


					        	?>
				            </div>
				        </div>
					</div>
				</div>
			</div>
			<div class="col-sm-3">
		        <?php echo do_shortcode("[stag_sidebar id='main-sidebar']"); ?>
		    </div>
		</div>
		<div class="row">
			<div class="col-sm-3"></div>
			<div class="col-sm-6">
				<?php 
				if ($totalPages > 1) {
					echo "<div id='pagination'>".paginate_links(array(
					    'base' => preg_replace('/\?.*/', '/', get_pagenum_link(1)) . '%_%',
					    'format'    => 'page/%#%',
					    'current'   => $paged,
					    'total'     => $totalPages,
					    'prev_text' => __('prev'),
					    'next_text' => __('next'),
					))."</div>";
				}
				?>
			</div>
			<div class="col-sm-3"></div>
		</div>
	</div>
</div>

<script type="text/javascript">
	var specialKeys = new Array();
	specialKeys.push(8); //Backspace
		function IsNumeric(e) {

			var value = document.getElementById('zipcode').value;
			if(empty(value)){
					document.getElementById("error-1").style.display = ret ? "none" : "inline";
					return false;
			}else{
					var keyCode = e.which ? e.which : e.keyCode
				    var ret = ((keyCode >= 48 && keyCode <= 57) || specialKeys.indexOf(keyCode) != -1);
				    document.getElementById("error").style.display = ret ? "none" : "inline";
				    return ret;
					return true;
			}



		    /*var keyCode = e.which ? e.which : e.keyCode
		    var ret = ((keyCode >= 48 && keyCode <= 57) || specialKeys.indexOf(keyCode) != -1);
		    document.getElementById("error").style.display = ret ? "none" : "inline";
		    return ret;*/
		}


        
    </script>

<?php get_footer(); ?>

