<?php
/**
	id="pa_style"

 * Variable product add to cart
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/add-to-cart/variable.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 3.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $product;

$attribute_keys = array_keys( $attributes );

//https://staging.idtag.com/product/brass-id-tag/?attribute_pa_ttype=circle&attribute_pa_size=small&attribute_pa_style=circle-8#


do_action( 'woocommerce_before_add_to_cart_form' ); ?>
<form class="variations_form cart" method="post" enctype='multipart/form-data' data-product_id="<?php echo absint( $product->get_id() ); ?>" data-product_variations="<?php echo htmlspecialchars( wp_json_encode( $available_variations ) ) ?>">
	<?php do_action( 'woocommerce_before_variations_form' ); ?>

	<?php if ( empty( $available_variations ) && false !== $available_variations ) : ?>
		<p class="stock out-of-stock"><?php _e( 'This product is currently out of stock and unavailable.', 'woocommerce' ); ?></p>
	<?php else : ?>
		<table class="variations variation-product-size" cellspacing="0">
			<tbody>
				<?php foreach ( $attributes as $attribute_name => $options ) : ?>
					<tr class="<?php echo sanitize_title( $attribute_name ); ?>">
						<td class="label"><label for="<?php echo sanitize_title( $attribute_name ); ?>"><?php echo wc_attribute_label( $attribute_name ); ?></label></td>
						<td class="value ASDFGHGFDSASDF">
							<?php
								$selected = isset( $_REQUEST[ 'attribute_' . sanitize_title( $attribute_name ) ] ) ? wc_clean( stripslashes( urldecode( $_REQUEST[ 'attribute_' . sanitize_title( $attribute_name ) ] ) ) ) : $product->get_variation_default_attribute( $attribute_name );
								wc_dropdown_variation_attribute_options( array( 'options' => $options, 'attribute' => $attribute_name, 'product' => $product, 'selected' => $selected ) );
								echo end( $attribute_keys ) === $attribute_name ? apply_filters( 'woocommerce_reset_variations_link', '<a class="reset_variations custom-reset-variation" href="#">' . esc_html__( 'Clear', 'woocommerce' ) . '</a>' ) : '';
							?>
						</td>
					</tr>
				<?php endforeach;?>
			</tbody>
		</table>
		<?php $form = false; ?>
		<?php do_action( 'woocommerce_before_add_to_cart_button' ); ?>
		<?php if ($product->get_id() ==  6033 || $product->get_id() == 6089 || $product->get_id() == 7722 || $product->get_id() == 7659) {
	       	$form = true;
	       	if ($product->get_id() == 6033 || $product->get_id() == 7659) {
	       		$class = "custom-aluminum-tag";
	       	}else{
	       		$class = "custom-brass-tag";
	       	}
	    } ?>
		<div class="row">
			<?php if ($form) { ?>
				<div class="col-sm-8">
				<div class="show_img <?php echo $class; ?>">
					<?php if ($product->get_id() == 6033 || $product->get_id() == 7659) {
						echo '<h2 class="woo-complex-head">Your Custom Aluminum ID Tag</h2>';
					}else{
						echo '<h2 class="woo-complex-head">Your Custom Brass ID Tag</h2>';
					} ?>
					<div class="home-front-back-section woo-complex-custom-prod-img-wrap">
						<div class="style-pro">
							<?php if (strpos($_SERVER['REQUEST_URI'], "brass-id-tag") !== false){?>
							<div class="section-front-image design-circle bone">
							<?php } else if (strpos($_SERVER['REQUEST_URI'], "aluminum-id-tag") !== false){?>
							<div class="section-front-image design-circle Alu-bone ">
							<?php }else{?>
								<div class="section-front-image design-circle">
							<?php } ?>
								<label>Front:</label>
								<div class="design-box">
								<?php
									 $Tagimage = 'https://'.$_SERVER['SERVER_NAME'].'/wp-content/themes/salient-child/images/back/black-bone-back.png'?> 	<div class="woo-complex-custom-prod-img">
										<img class="front_img testing" src="<?php echo $Tagimage; ?>"> 

										
									</div>
									<div class="woo-complex-custom-prod-lines" id="front-line-text">
										<p class="back_line_text front_line1"><?php if (isset($_POST['frontLine1'])) {
											echo $_POST['frontLine1'];
										} ?></p>
										<p class="back_line_text front_line2"><?php if (isset($_POST['frontLine2'])) {
											echo $_POST['frontLine2'];
										} ?></p>
										<p class="back_line_text front_line3"><?php if (isset($_POST['frontLine3'])) {
											echo $_POST['frontLine3'];
										} ?></p>
										<p class="back_line_text front_line4"><?php if (isset($_POST['frontLine4'])) {
											echo $_POST['frontLine4'];
										} ?></p>
									</div>
								</div>
							</div>
							<?php if (strpos($_SERVER['REQUEST_URI'], "brass-id-tag") !== false){?>
							<div class="section-back-image design-circle bone">
							<?php } else if (strpos($_SERVER['REQUEST_URI'], "aluminum-id-tag") !== false){?>
							<div class="section-back-image design-circle Alu-bone ">
							<?php }else{?>
								<div class="section-back-image design-circle">
							<?php } ?>
								<label>Back:</label>
								<div class="design-box">
									<div class="woo-complex-custom-prod-img">
										<img class="back_img testing11" src="">
									</div>
									<div class="woo-complex-custom-prod-lines" id="back-line-text">
										<p class="back_line_text back_line1"><?php if (isset($_POST['backLine1'])) {
											echo $_POST['backLine1'];
										} ?></p>
										<p class="back_line_text back_line2"><?php if (isset($_POST['backLine2'])) {
											echo $_POST['backLine2'];
										} ?></p>
										<p class="back_line_text back_line3"><?php if (isset($_POST['backLine3'])) {
											echo $_POST['backLine3'];
										} ?></p>
										<p class="back_line_text back_line4"><?php if (isset($_POST['backLine4'])) {
											echo $_POST['backLine4'];
										} ?></p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-sm-4">
				<div class="product_desc woo-complex-custom-prod-desc">
					<h2 class="woo-complex-head">Product Description</h2>
					<div class="woo-complex-prod-variants">
						<strong>Title:</strong> <span><?php echo $product->get_title(); ?></span>
					</div>
					<?php if ($product->get_id() == 6033 || $product->get_id() == 7659) {

					 ?>
						<div class="woo-complex-prod-variants">
							<strong>Shape:</strong> <span class="shape"></span>
						</div>
						<div class="woo-complex-prod-variants">
							<strong>Size:</strong> <span class="size"></span>
						</div>
						<div class="woo-complex-prod-variants">
							<strong>Color:</strong> <span class="color"></span>
						</div>
						<div class="woo-complex-prod-variants">
							<strong>Front Text:</strong> <span class="front-text front-text-status"></span>
						</div>
						<div class="woo-complex-prod-variants">
							<strong>Back Text:</strong> <span class="back-text back-text-status"></span>
						</div>
						<div class="woo-complex-prod-variants">
							<strong>Price:</strong> <span class="back-text">$<?php 
							if ((isset($_POST['serialNumber']) && !empty(trim($_POST['serialNumber']))) && $product->get_id() == 7659 || $product->get_id() == 7722) { echo "0.00"; }else{ echo $product->get_price(); } ?></span>
						</div>
					<?php } ?>
					<?php if ($product->get_id() == 6089 || $product->get_id() == 7722) { ?>
						<div class="woo-complex-prod-variants">
							<strong>Shape:</strong> <span class="type"></span>
						</div>
						<div class="woo-complex-prod-variants">
							<strong>Size:</strong> <span class="size"></span>
						</div>
						<div class="woo-complex-prod-variants">
							<strong>Style:</strong> <span class="style"></span>
						</div>
						<div class="woo-complex-prod-variants front-text-shwhde">
							<strong>Front Text:</strong> <span class="front-text front-text-status"></span>
						</div>
						<div class="woo-complex-prod-variants back-text-shwhde">
							<strong>Back Text:</strong> <span class="back-text back-text-status"></span>
						</div>
						<div class="woo-complex-prod-variants text-shwhde">
							<strong>Text:</strong> <span class="back-text text-status"></span>
						</div>
						<div class="woo-complex-prod-variants">
							<strong>Price:</strong> <span class="back-text">$<?php 
							if ((isset($_POST['serialNumber']) && !empty(trim($_POST['serialNumber']))) && $product->get_id() == 7659 || $product->get_id() == 7722) { echo "0.00"; }else{ echo $product->get_price(); } ?></span>
						</div>
					<?php } ?>
								
				</div>
			<?php } ?>
			
				<div class="single_variation_wrap">
					<?php
						/**
						 * woocommerce_before_single_variation Hook.
						 */
						do_action( 'woocommerce_before_single_variation' );

						/**
						 * woocommerce_single_variation hook. Used to output the cart button and placeholder for variation data.
						 * @since 2.4.0
						 * @hooked woocommerce_single_variation - 10 Empty div for variation data.
						 * @hooked woocommerce_single_variation_add_to_cart_button - 20 Qty and cart button.
						 */
						do_action( 'woocommerce_single_variation' );

						/**
						 * woocommerce_after_single_variation Hook.
						 */
						do_action( 'woocommerce_after_single_variation' );
					?>
				</div>
			</div>
		</div>		
		<?php do_action( 'woocommerce_after_add_to_cart_button' ); ?>
	<?php endif; ?>

	<?php do_action( 'woocommerce_after_variations_form' ); ?>
</form>

<script type="text/javascript">
	jQuery(document).ready(function(){
		//jQuery("select#pa_size option[value='small']").attr("selected", "selected");

		jQuery("#picker_pa_size .variation-custom-radio div").removeClass('active');
		jQuery("#picker_pa_size .variation-custom-radio div").removeClass('inactive');
		jQuery("#picker_pa_size .variation-custom-radio div").addClass('inactive');
		jQuery("#picker_pa_size .variation-custom-radio-wrap .variation-custom-radio div").each(function(){
			var value = jQuery(this).children('input').val();
			if (value == 'large') {
				jQuery(this).addClass('active');
			}
		});

		jQuery('#pa_color').change(function(){ 
			var value = jQuery('#picker_pa_color div.select-option.selected a').attr('title');
			jQuery("div.woo-complex-prod-variants span.color").text(value);
		});
		jQuery('#pa_size').change(function(){ 
			var value = jQuery(this).val();
			jQuery("div.woo-complex-prod-variants span.size").text(value);
		});

		/*ocean*/
		hide_style_By_tag("bone");

			hide_alu_tag('bone');
		jQuery('#pa_ttype').change(function(){ 
		
			value = jQuery('#picker_pa_ttype div.select-option.selected a').attr('title');
			console.log(" title value", value);

			jQuery("div.woo-complex-prod-variants span.type").text(value);

			var type = jQuery('#picker_pa_ttype select#pa_ttype').val();
			console.log("type", type);

			hide_style_By_tag(type);


		});




		/*	jQuery('#picker_pa_shape').change(function(){ 
		
			value = jQuery('#picker_pa_shape div.select-option.selected a').attr('title');
			console.log(" title value", value);

			jQuery("div.woo-complex-prod-variants span.shape").text(value);

			var type = jQuery('#picker_pa_shape select#pa_ttype').val();
			console.log("type", type);

			hide_alu_tag(type);


		});


*/





			


		jQuery(document).find("#picker_pa_shape .select-option.swatch-wrapper").on('click',function(e){
		e.preventDefault();
		console.log("style");
		var value = $(this).attr("data-value");

			var shape = jQuery('#picker_pa_shape div.select-option.selected a').attr('title');
				jQuery("div.woo-complex-prod-variants span.shape").text(shape);


		hide_alu_tag(value)

		// jQuery("select#pa_style option[value='"+value+"']").prop("selected", true).change();
		jQuery('#picker_pa_shape .select-option.swatch-wrapper').removeClass('selected');


		jQuery('#picker_pa_shape .select-option.swatch-wrapper').each(function(i,element){
			
			if($(element).attr("data-value") == value){
				console.log("element style", $(element).attr("data-value"), value);
				$(element).addClass('selected');
				jQuery("select#pa_color option[value='"+value+"']").prop("selected", true).change();
			}
		});
});











		function hide_style_By_tag(type){
			jQuery('#picker_pa_style .select-option.swatch-wrapper').hide();
			jQuery('#picker_pa_style .select-option.swatch-wrapper').each(function(i,element){
					
				var tag_type_string = $(element).attr("data-value");

				var tag_type_arry = tag_type_string.split('-');
				var tag_type = tag_type_arry[0];
				if(tag_type == type ){


					$(element).show();
				}
			});




			
		}


		function hide_alu_tag(type){

			console.log(type,'hide_alu_tag');

				jQuery('#picker_pa_color .select-option.swatch-wrapper').hide();

			jQuery('#picker_pa_color .select-option.swatch-wrapper').each(function(i,element){
					
				var tag_type_string = $(element).attr("data-value");

				//console.log(tag_type_string,'testingq3wq32q3232');
				//return false;

				var tag_type_arry = tag_type_string.split('-');
				var tag_type = tag_type_arry[1];
				console.log(tag_type);

			jQuery("div.woo-complex-prod-variants span.shape").text(tag_type);
			jQuery("div.woo-complex-prod-variants span.shape").text(tag_type);
				if(tag_type == type ){
					$(element).show();
					console.log(element,'tag_typetag_type');



				}
			});
		}


	/*jQuery(document).find("#picker_pa_style .select-option.swatch-wrapper").on('change',function(e){
			var value = jQuery('#picker_pa_style div.select-option').find('.selected').attr('title');

			var tagImage = jQuery('#picker_pa_style div.select-option.selected').find('img').attr('src');

			console.log(tagImage, 'tag picture');

			$('.front_img').attr('src', tagImage);
			jQuery("div.woo-complex-prod-variants span.style").text(value);
		});
*/
		jQuery("select#pa_size").next("ul").find("input").each(function(){
			if(jQuery(this).val() == 'small'){
				jQuery(this).prop("checked",true).trigger("change");
				return;
			}
		})
	});
		
</script>
<?php 

if (isset($_POST['petName'])) { ?>
	<script type="text/javascript">
		jQuery(document).ready(function(){
			jQuery(".select-option.swatch-wrapper").removeClass("selected");
			console.log("gagggrohit111");
			jQuery("select#pa_ttype option[value='<?php echo $_POST["type"]; ?>']").prop("selected", true).change();
			jQuery(".select-option.swatch-wrapper[data-value='<?php echo $_POST["type"]; ?>").addClass('selected');
			jQuery(".front_line1").text('<?php echo $_POST['petName']; ?>');
			jQuery("#engraving_back_line_1").val('<?php echo $_POST['petName']; ?>');
			var type = jQuery("#picker_pa_ttype .select-option.swatch-wrapper.selected").attr('data-value');
			console.log("Gaurav dd", type);  //satish
			if (type == "heart") {
				console.log('heart1');
				jQuery("#single-product").attr('action','<?php echo get_site_url(); ?>/product/aluminum-id-tag/');
				

				
				jQuery(".show_img img").attr('src',window.location.origin+'/wp-content/themes/salient-child/images/back/pink-heart-back.png');
				jQuery(".show_img img.front_img").attr('src',window.location.origin+'/wp-content/themes/salient-child/images/back/pink-heart-back.png');
				

			} else if(type == "circle"){
					console.log('circle1');
				jQuery(".show_img img").attr('src',window.location.origin+'/wp-content/themes/salient-child/images/back/blue-circle-back.png');
				jQuery(".show_img img.front_img").attr('src',window.location.origin+'/wp-content/themes/salient-child/images/back/blue-circle-back.png');
			} else if(type == "bone"){
				console.log('bone1');
				jQuery(".show_img img").attr('src',window.location.origin+'/wp-content/themes/salient-child/images/back/black-bone-back.png');
				jQuery(".show_img img.front_img").attr('src',window.location.origin+'/wp-content/themes/salient-child/images/back/black-bone-back.png');  
				
			  
			}
		});
	</script>
<?php }
if (isset($_POST['color'])) { ?>
	<script type="text/javascript">
		jQuery(document).ready(function(){
			jQuery(".select-option.swatch-wrapper").removeClass("selected");

			jQuery("select#pa_color option[value='<?php echo $_POST["color"]; ?>']").attr("selected", "selected");
			jQuery(".select-option.swatch-wrapper[data-value='<?php echo $_POST["color"]; ?>").addClass('selected');

				jQuery("select#pa_shape option[value='<?php echo $_POST["type"]; ?>']").prop("selected", true).change();
			jQuery("select#pa_shape option[value='<?php echo $_POST["type"]; ?>']").attr("selected", "selected");
			jQuery(".select-option.swatch-wrapper[data-value='<?php echo $_POST["type"]; ?>").addClass('selected');

			jQuery("select#pa_size option[value='<?php echo $_POST["size"]; ?>']").attr("selected", "selected");
			jQuery("#picker_pa_size .variation-custom-radio div").removeClass('active');
			jQuery("#picker_pa_size .variation-custom-radio div").removeClass('inactive');
			jQuery("#picker_pa_size .variation-custom-radio div").addClass('inactive');
			jQuery("#picker_pa_size .variation-custom-radio-wrap .variation-custom-radio div").each(function(){
				var value = jQuery(this).children('input').val();
				if (value == '<?php echo $_POST["size"]; ?>') {
					jQuery(this).addClass('active');
				}
			});

			jQuery("select#pa_size").next("ul").find("input").each(function(){
				if (jQuery(this).val() == '<?php echo $_POST["size"]; ?>') {
					jQuery(this).prop("checked",true).trigger("click");
					return;
				}
			})
			
		});
	</script>
<?php } else if(isset($_POST['style'])){?>
	<script type="text/javascript">
		jQuery(document).ready(function(){
			jQuery(".select-option.swatch-wrapper").removeClass("selected");

			jQuery("select#pa_style").find("option[value='<?php echo $_POST["style"]; ?>']").prop("selected", true).trigger("change");
			jQuery(".select-option.swatch-wrapper[data-value='<?php echo $_POST["style"]; ?>").addClass('selected');

			jQuery("select#pa_ttype option[value='<?php echo $_POST["type"]; ?>']").attr("selected", "selected");
			jQuery(".select-option.swatch-wrapper[data-value='<?php echo $_POST["type"]; ?>']").addClass('selected');

			jQuery("select#pa_size option[value='<?php echo $_POST["size"]; ?>']").attr("selected", "selected");
			jQuery("#picker_pa_size .variation-custom-radio div").removeClass('active');
			jQuery("#picker_pa_size .variation-custom-radio div").removeClass('inactive');
			jQuery("#picker_pa_size .variation-custom-radio div").addClass('inactive');
			jQuery("#picker_pa_size .variation-custom-radio-wrap .variation-custom-radio div").each(function(){
				var value = jQuery(this).children('input').val();
				if (value == '<?php echo $_POST["size"]; ?>') {
					jQuery(this).addClass('active');
				}
			});
			jQuery("select#pa_size").next("ul").find("input").each(function(){
				if (jQuery(this).val() == '<?php echo $_POST["size"]; ?>') {
					jQuery(this).prop("checked",true).trigger("click");
					return;
				}
			})
		});
	</script>
<?php } else{ ?>
	<script type="text/javascript">
		var image = jQuery(".variations [data-attribute_name=attribute_pa_style] span.swatch-image img").attr('src');
		jQuery(".show_img img").attr('src',image);
	</script>
<?php } ?>
<style type="text/css">
	/*.show_img p.front_line1,.show_img p.front_line2,.show_img p.front_line3,.show_img p.front_line4{
		height: 102px;
	    left: 30px;
	    overflow: hidden;
	    padding-top: 2px;
	    position: absolute;
	    width: 200px;
	    text-align: center;
	    white-space: nowrap;
	    color: #fff;
	
}
.show_img p.back_line1,.show_img p.back_line2,.show_img p.back_line3,.show_img p.back_line4{
	height: 102px;
    left: 20px;
    overflow: hidden;
    padding-top: 2px;
    position: absolute;
    width: 200px;
    text-align: center;
    white-space: nowrap;
    color: #fff;
}
.woo-complex-custom-prod-lines{
	top: 25px;
	position: absolute;
}*/
</style>
 	<script>
 	jQuery(document).ready(function(){

/* Aluminum-ID-Tag and Brass-ID-Tag Status Front Text/Back Text : Completed/Not Completed */
		jQuery('.front-text-shwhde').hide();
		jQuery('.back-text-shwhde').hide();
		jQuery('.text-status').text('Not Completed');

		jQuery("#pa_style").on("change", function(){
			var style = jQuery(this).val();

			if(style == 'bone-7'){
				jQuery('.front-text-shwhde').show();
				jQuery('.back-text-shwhde').show();
				jQuery('.text-shwhde').hide();
			}else if(style == 'circle-7'){
				jQuery('.front-text-shwhde').show();
				jQuery('.back-text-shwhde').show();
				jQuery('.text-shwhde').hide();
			}else if(style == 'heart-1'){
				jQuery('.front-text-shwhde').show();
				jQuery('.back-text-shwhde').show();
				jQuery('.text-shwhde').hide();
			}else{
				jQuery('.front-text-shwhde').hide();
				jQuery('.back-text-shwhde').hide();
				jQuery('.text-shwhde').show();
			}
		});

		jQuery('.front-text-status').text('Not Completed');
		jQuery('.back-text-status').text('Not Completed');
		

 		jQuery('.front-line').keyup(function() { 
        	var lineVal1 = jQuery('#engraving_front_line_1').val();
        	var lineVal2 = jQuery('#engraving_front_line_2').val();
        	var lineVal3 = jQuery('#engraving_front_line_3').val();
        	var lineVal4 = jQuery('#engraving_front_line_4').val();

        	if (lineVal1 == '' && lineVal2 == '' && lineVal3 == '' && lineVal4 == '') {
        		jQuery('.front-text-status').text('Not Completed');
   	     	}else{
        		jQuery('.front-text-status').text('Completed');	
        	}
        });

        jQuery('.back-line').keyup(function() {
        	var lineVal1 = jQuery('#engraving_back_line_1').val();
        	var lineVal2 = jQuery('#engraving_back_line_2').val();
        	var lineVal3 = jQuery('#engraving_back_line_3').val();
        	var lineVal4 = jQuery('#engraving_back_line_4').val();
        	if (lineVal1 == '' && lineVal2 == '' && lineVal3 == '' && lineVal4 == '') {
        		jQuery('.back-text-status').text('Not Completed');
        		jQuery('.text-status').text('Not Completed');
   	     	}else{
        		jQuery('.back-text-status').text('Completed');	
        		jQuery('.text-status').text('Completed');	
        	}
        });

        /*jQuery('#engraving_front_line_1').keyup(function() { 
        	var line1 = jQuery(this).val();
        	jQuery(".show_img p.front_line1").text(line1);
        	jQuery(".show_img p.front_line1").css({
        	'color': '#fff',
			'top': '104px',
    		'width': '200px',
    		
    		'font-size': '57px',
    		'line-height': '42.5px'});
        });
        jQuery('#engraving_front_line_2').keyup(function() { 
        	var line2 = jQuery(this).val();
        	jQuery(".show_img p.front_line2").text(line2);
        	if(line2 !=''){
	        	jQuery(".show_img p.front_line1").css({
	        	'color': '#fff',
				'top': '87px',
	    		'font-size': '50px'
	    		});

	    		jQuery(".show_img p.front_line2").css({
				'top': '130px',
	    		'font-size': '40px'
	    		});
	    	}else{
	    		jQuery(".show_img p.front_line1").css({
	        	'color': '#fff',
				'top': '104px',
	    		'width': '200px',
	    		
	    		'font-size': '57px',
	    		'line-height': '42.5px'});
		    }

        });
		jQuery('#engraving_front_line_3').keyup(function() { 
        	var line3 = jQuery(this).val();
        	jQuery(".show_img p.front_line3").text(line3);
        	if(line3 !=''){
	        	jQuery(".show_img p.front_line1").css({
	        	'color': '#fff',
				'top': '80px',
	    		'font-size': '40px'
	    		});

	    		jQuery(".show_img p.front_line2").css({
	    		'color': '#fff',
				'top': '110px',
	    		'font-size': '35px'
	    		});
	    		jQuery(".show_img p.front_line3").css({
	    		'color': '#fff',
				'top': '145px',
	    		'font-size': '30px'
	    		});
    		}else{
    			jQuery(".show_img p.front_line1").css({
	        	'color': '#fff',
				'top': '87px',
	    		'font-size': '50px'
	    		});

	    		jQuery(".show_img p.front_line2").css({
				'top': '130px',
	    		'font-size': '40px'
	    		});	
    		}
        });
        jQuery('#engraving_front_line_4').keyup(function() { 
        	var line4 = jQuery(this).val();
        	jQuery(".show_img p.front_line4").text(line4);
        	if(line4 !=''){
	        	jQuery(".show_img p.front_line1").css({
	        	'color': '#fff',
				'top': '75px',
	    		'font-size': '35px'
	    		});

	    		jQuery(".show_img p.front_line2").css({
	    		'color': '#fff',
				'top': '105px',
	    		'font-size': '30px'
	    		});
	    		jQuery(".show_img p.front_line3").css({
	    		'color': '#fff',
				'top': '135px',
	    		'font-size': '25px'
	    		});
	    		jQuery(".show_img p.front_line4").css({
	    		'color': '#fff',
				'top': '160px',
	    		'font-size': '20px'
	    		});
	    	}else{
	    		jQuery(".show_img p.front_line1").css({
	        	'color': '#fff',
				'top': '80px',
	    		'font-size': '40px'
	    		});

	    		jQuery(".show_img p.front_line2").css({
	    		'color': '#fff',
				'top': '110px',
	    		'font-size': '35px'
	    		});
	    		jQuery(".show_img p.front_line3").css({
	    		'color': '#fff',
				'top': '145px',
	    		'font-size': '30px'
	    		});
	    	}
        });*/
        
	    jQuery("#engraving_back_line_1").keyup(function() { 
        	var line1 = jQuery(this).val();

   			jQuery('.show_img p.back_line1').text(line1);
        	//var textLenght = jQuery(line1).length;
		    if (line1.length > 5 && line1.length < 8 ) {
		    	
	           // jQuery('p.back_line1').css('font-size', '34px');
	            jQuery('p.back_line1').css('font-size', '22px');
	        } else if (line1.length > 7 && line1.length < 10 ) {
	            //jQuery('p.back_line1').css('font-size', '28px');
	             jQuery('p.back_line1').css('font-size', '22');
	        } else if (line1.length > 9 && line1.length < 12) {
	            jQuery('p.back_line1').css('font-size', '22px');
	        } else if (line1.length > 11 && line1.length < 16) {
	          //  jQuery('p.back_line1').css('font-size', '16px');
	              jQuery('p.back_line1').css('font-size', '22px');
	        } else if (line1.length > 15 && line1.length < 21) {
	           // jQuery('p.back_line1').css('font-size', '12px');
	            jQuery('p.back_line1').css('font-size', '22px');
	        } else {
	        	//jQuery('p.back_line1').css('font-size', '44px');
	        	jQuery('p.back_line1').css('font-size', '22px');
	        }
	     });
	    jQuery("#engraving_back_line_2").keyup(function() { 
        	var line2 = jQuery(this).val();
        	jQuery(".show_img p.back_line2").text(line2);
		    if (line2.length > 5 && line2.length < 8 ) {
	            //jQuery('p.back_line2').css('font-size', '34px');
	            jQuery('p.back_line2').css('font-size', '22px');
	        } else if (line2.length > 7 && line2.length < 10 ) {
	            //jQuery('p.back_line2').css('font-size', '28px');
	            jQuery('p.back_line2').css('font-size', '22px');
	        } else if (line2.length > 9 && line2.length < 12) {
	            //jQuery('p.back_line2').css('font-size', '22px');
	            jQuery('p.back_line2').css('font-size', '22px');
	        } else if (line2.length > 11 && line2.length < 16) {
	            //jQuery('p.back_line2').css('font-size', '16px');
	            jQuery('p.back_line2').css('font-size', '22px');
	        } else if (line2.length > 15 && line2.length < 21) {
	            //jQuery('p.back_line2').css('font-size', '12px');
	            jQuery('p.back_line2').css('font-size', '22px');
	        } else {
	        	//jQuery('p.back_line2').css('font-size', '44px');
	        	jQuery('p.back_line2').css('font-size', '22px');
	        }
	     });
	    jQuery("#engraving_back_line_3").keyup(function() { 
        	var line3 = jQuery(this).val();
        	jQuery(".show_img p.back_line3").text(line3);
        	if (line3.length > 0 && line3.length < 9 ) {
        		jQuery('p.back_line1').css('font-size', '22px');
        		jQuery('p.back_line2').css('font-size', '22px');
	            jQuery('p.back_line3').css('font-size', '22px');
	        } else if (line3.length > 8 && line3.length < 13) {
	           /* jQuery('p.back_line1').css('font-size', '16px');
        		jQuery('p.back_line2').css('font-size', '16px');
	            jQuery('p.back_line3').css('font-size', '16px');*/
	             jQuery('p.back_line1').css('font-size', '22px');
        		jQuery('p.back_line2').css('font-size', '22px');
	            jQuery('p.back_line3').css('font-size', '22px');
	        } else if (line3.length > 12 && line3.length < 17) {
	            /*jQuery('p.back_line1').css('font-size', '16px');
        		jQuery('p.back_line2').css('font-size', '16px');*/
	            //jQuery('p.back_line3').css('font-size', '12px');
	            jQuery('p.back_line3').css('font-size', '22px');
	        } else if (line3.length > 16 && line3.length < 21) {
	            /*jQuery('p.back_line1').css('font-size', '14px');
        		jQuery('p.back_line2').css('font-size', '14px');*/
	           // jQuery('p.back_line3').css('font-size', '12px');
	            jQuery('p.back_line3').css('font-size', '22px');
	        } else {
	        	jQuery('p.back_line3').css('font-size', '22px');
	        }
	     });
	    jQuery("#engraving_back_line_4").keyup(function() { 
	    	var line4 = jQuery(this).val();
        	jQuery(".show_img p.back_line4").text(line4);
        	if (line4.length > 0 && line4.length < 9 ) {
        	/*	jQuery('p.back_line1').css('font-size', '18px');
        		jQuery('p.back_line2').css('font-size', '18px');
	            jQuery('p.back_line3').css('font-size', '18px');
	            jQuery('p.back_line4').css('font-size', '18px');*/
	            	jQuery('p.back_line1').css('font-size', '22px');
        		jQuery('p.back_line2').css('font-size', '22px');
	            jQuery('p.back_line3').css('font-size', '22px');
	            jQuery('p.back_line4').css('font-size', '22px');
	        } else if (line4.length > 8 && line4.length < 13) {
	        	/*jQuery('p.back_line1').css('font-size', '16px');
        		jQuery('p.back_line2').css('font-size', '16px');
	            jQuery('p.back_line3').css('font-size', '14px');
	            jQuery('p.back_line4').css('font-size', '14px');*/
	            jQuery('p.back_line1').css('font-size', '22px');
        		jQuery('p.back_line2').css('font-size', '22px');
	            jQuery('p.back_line3').css('font-size', '22px');
	            jQuery('p.back_line4').css('font-size', '22px');
	        } else if (line4.length > 12 && line4.length < 17) {
	          /*  jQuery('p.back_line3').css('font-size', '14px');
	            jQuery('p.back_line4').css('font-size', '12px');*/
	            jQuery('p.back_line3').css('font-size', '22px');
	            jQuery('p.back_line4').css('font-size', '22px');
	        } else if (line4.length > 16 && line4.length < 21) {
	         /*   jQuery('p.back_line3').css('font-size', '12px');
	            jQuery('p.back_line4').css('font-size', '10px');*/

	            jQuery('p.back_line3').css('font-size', '22px');
	            jQuery('p.back_line4').css('font-size', '22px');
	        } else {
	        	//jQuery('p.back_line3').css('font-size', '20px');
	        	jQuery('p.back_line3').css('font-size', '22px');
	        }
	     });
	    
	    	
	    /*Front keyup js*/
	    jQuery("#engraving_front_line_1").keyup(function() { 
	var frontline1 = jQuery(this).val();
	jQuery('.show_img p.front_line1').text(frontline1);
	//var textLenght = jQuery(line1).length;
    if (frontline1.length > 5 && frontline1.length < 8 ) {
        //jQuery('p.front_line1').css('font-size', '34px');
        jQuery('p.front_line1').css('font-size', '22px');
    } else if (frontline1.length > 7 && frontline1.length < 10 ) {
        //jQuery('p.front_line1').css('font-size', '28px');
        jQuery('p.front_line1').css('font-size', '22px');
    } else if (frontline1.length > 9 && frontline1.length < 12) {
        //jQuery('p.front_line1').css('font-size', '22px');
        jQuery('p.front_line1').css('font-size', '22px');
    } else if (frontline1.length > 11 && frontline1.length < 16) {
        //jQuery('p.front_line1').css('font-size', '16px');
        jQuery('p.front_line1').css('font-size', '22px');
    } else if (frontline1.length > 15 && frontline1.length < 21) {
        //jQuery('p.front_line1').css('font-size', '12px');
        jQuery('p.front_line1').css('font-size', '22px');
    } else {
    	//jQuery('p.front_line1').css('font-size', '44px');
    	jQuery('p.front_line1').css('font-size', '22px');
    }
 });
jQuery("#engraving_front_line_2").keyup(function() { 
	var frontline2 = jQuery(this).val();
	jQuery(".show_img p.front_line2").text(frontline2);
    if (frontline2.length > 5 && frontline2.length < 8 ) {
        //jQuery('p.front_line2').css('font-size', '34px');
        jQuery('p.front_line2').css('font-size', '22px');
    } else if (frontline2.length > 7 && frontline2.length < 10 ) {
        //jQuery('p.front_line2').css('font-size', '28px');
        jQuery('p.front_line2').css('font-size', '22px');
    } else if (frontline2.length > 9 && frontline2.length < 12) {
        //jQuery('p.front_line2').css('font-size', '22px');
        jQuery('p.front_line2').css('font-size', '22px');
    } else if (frontline2.length > 11 && frontline2.length < 16) {
        //jQuery('p.front_line2').css('font-size', '16px');
        jQuery('p.front_line2').css('font-size', '22px');
    } else if (frontline2.length > 15 && frontline2.length < 21) {
        //jQuery('p.front_line2').css('font-size', '12px');
        jQuery('p.front_line2').css('font-size', '22px');
    } else {
    	//jQuery('p.front_line2').css('font-size', '44px');
    	jQuery('p.front_line2').css('font-size', '22px');
    }
 });
jQuery("#engraving_front_line_3").keyup(function() { 
	var frontline3 = jQuery(this).val();
	jQuery(".show_img p.front_line3").text(frontline3);
	if (frontline3.length > 0 && frontline3.length < 9 ) {
		jQuery('p.front_line1').css('font-size', '22px');
		jQuery('p.front_line2').css('font-size', '22px');
        jQuery('p.front_line3').css('font-size', '22px');
    } else if (frontline3.length > 8 && frontline3.length < 13) {
      /*  jQuery('p.front_line1').css('font-size', '16px');
		jQuery('p.front_line2').css('font-size', '16px');
        jQuery('p.front_line3').css('font-size', '16px');*/
          jQuery('p.front_line1').css('font-size', '22px');
		jQuery('p.front_line2').css('font-size', '22px');
        jQuery('p.front_line3').css('font-size', '22px');
    } else if (frontline3.length > 12 && frontline3.length < 17) {
        /*jQuery('p.front_line1').css('font-size', '16px');
		jQuery('p.front_line2').css('font-size', '16px');*/
        //jQuery('p.front_line3').css('font-size', '12px');
        jQuery('p.front_line3').css('font-size', '22px');
    } else if (frontline3.length > 16 && frontline3.length < 21) {
        /*jQuery('p.front_line1').css('font-size', '14px');
		jQuery('p.front_line2').css('font-size', '14px');*/
        jQuery('p.front_line3').css('font-size', '22px');
        //jQuery('p.front_line3').css('font-size', '12px');
    } else {
    	//jQuery('p.front_line3').css('font-size', '22px');
    	jQuery('p.front_line3').css('font-size', '22px');
    }
 });
jQuery("#engraving_front_line_4").keyup(function() { 
	var frontline4 = jQuery(this).val();
	jQuery(".show_img p.front_line4").text(frontline4);
	if (frontline4.length > 0 && frontline4.length < 9 ) {
		/*jQuery('p.front_line1').css('font-size', '18px');
		jQuery('p.front_line2').css('font-size', '18px');
        jQuery('p.front_line3').css('font-size', '18px');
        jQuery('p.front_line4').css('font-size', '18px');*/
        jQuery('p.front_line1').css('font-size', '22px');
		jQuery('p.front_line2').css('font-size', '22px');
        jQuery('p.front_line3').css('font-size', '22px');
        jQuery('p.front_line4').css('font-size', '22px');
    } else if (frontline4.length > 8 && frontline4.length < 13) {
    	/*jQuery('p.front_line1').css('font-size', '16px');
		jQuery('p.front_line2').css('font-size', '16px');
        jQuery('p.front_line3').css('font-size', '14px');
        jQuery('p.front_line4').css('font-size', '14px');*/
        jQuery('p.front_line1').css('font-size', '22px');
		jQuery('p.front_line2').css('font-size', '22px');
        jQuery('p.front_line3').css('font-size', '22px');
        jQuery('p.front_line4').css('font-size', '22px');
    } else if (frontline4.length > 12 && frontline4.length < 17) {
        /*jQuery('p.front_line3').css('font-size', '14px');
        jQuery('p.front_line4').css('font-size', '12px');*/
        jQuery('p.front_line3').css('font-size', '22px');
        jQuery('p.front_line4').css('font-size', '22px');
    } else if (frontline4.length > 16 && frontline4.length < 21) {
       /* jQuery('p.front_line3').css('font-size', '12px');
        jQuery('p.front_line4').css('font-size', '10px');*/
         jQuery('p.front_line3').css('font-size', '22px');
        jQuery('p.front_line4').css('font-size', '22px');
    } else {
    	jQuery('p.front_line3').css('font-size', '22px');
    	jQuery('p.front_line3').css('font-size', '22px');
    }
 });



	    /*jQuery("#engraving_back_line_1").keyup(function() { 
        	var line1 = jQuery(this).val();
        	jQuery(".show_img p.back_line1").text(line1);
	        	jQuery(".show_img p.back_line_text").css({
		        	'color': '#fff',
					'top': '104px',
		    		'width': '200px',
		    		'font-size': '57px',
		    		'line-height': '42.5px'
		    	});
	     });*/
        /*jQuery('#engraving_back_line_2').keyup(function() { 
        	var line2 = jQuery(this).val();
        	jQuery(".show_img p.back_line2").text(line2);
        	if(line2 !=''){
	        	jQuery(".show_img p.back_line1").css({
	        	'color': '#fff',
				'top': '87px',
	    		'font-size': '50px'
	    		});

	    		jQuery(".show_img p.back_line2").css({
				'top': '130px',
	    		'font-size': '40px'
	    		});
	    	}else{
	    		jQuery(".show_img p.back_line1").css({
	        	'color': '#fff',
				'top': '104px',
	    		'width': '200px',
	    		'font-size': '57px',
	    		'line-height': '42.5px'});
		    }

        });
		jQuery('#engraving_back_line_3').keyup(function() { 
        	var line3 = jQuery(this).val();
        	jQuery(".show_img p.back_line3").text(line3);
        	if(line3 !=''){
	        	jQuery(".show_img p.back_line1").css({
	        	'color': '#fff',
				'top': '80px',
	    		'font-size': '40px'
	    		});

	    		jQuery(".show_img p.back_line2").css({
	    		'color': '#fff',
				'top': '110px',
	    		'font-size': '35px'
	    		});
	    		jQuery(".show_img p.back_line3").css({
	    		'color': '#fff',
				'top': '145px',
	    		'font-size': '30px'
	    		});
    		}else{
    			jQuery(".show_img p.back_line1").css({
	        	'color': '#fff',
				'top': '87px',
	    		'font-size': '50px'
	    		});

	    		jQuery(".show_img p.back_line2").css({
				'top': '130px',
	    		'font-size': '40px'
	    		});	
    		}
        });
        jQuery('#engraving_back_line_4').keyup(function() { 
        	var line4 = jQuery(this).val();
        	jQuery(".show_img p.back_line4").text(line4);
        	if(line4 !=''){
	        	jQuery(".show_img p.back_line1").css({
	        	'color': '#fff',
				'top': '75px',
	    		'font-size': '35px'
	    		});

	    		jQuery(".show_img p.back_line2").css({
	    		'color': '#fff',
				'top': '105px',
	    		'font-size': '30px'
	    		});
	    		jQuery(".show_img p.back_line3").css({
	    		'color': '#fff',
				'top': '135px',
	    		'font-size': '25px'
	    		});
	    		jQuery(".show_img p.back_line4").css({
	    		'color': '#fff',
				'top': '160px',
	    		'font-size': '20px'
	    		});
	    	}else{
	    		jQuery(".show_img p.back_line1").css({
	        	'color': '#fff',
				'top': '80px',
	    		'font-size': '40px'
	    		});

	    		jQuery(".show_img p.back_line2").css({
	    		'color': '#fff',
				'top': '110px',
	    		'font-size': '35px'
	    		});
	    		jQuery(".show_img p.back_line3").css({
	    		'color': '#fff',
				'top': '145px',
	    		'font-size': '30px'
	    		});
	    	}
        });
        setInterval(function(){ 
        	var frontline =0;
 			var backline =0;
 			jQuery(".back-line").each(function(){
 				var value = jQuery(this).val();
 				if (value != "") {
 					backline = 1;
 					return false;
 				}
 			});
 			jQuery(".front-line").each(function(){
 				var value = jQuery(this).val();
 				if (value != "") {
 					frontline = 1;
 					return false;
 				}
 			});
	        if (frontline != 0) {
	        	jQuery('div.woo-complex-prod-variants span.front-text').text('Completed');
	        }else{
	        	jQuery('div.woo-complex-prod-variants span.front-text').text('Not Completed');
	        }
	        if (backline != 0) {
	        	jQuery('div.woo-complex-prod-variants span.back-text').text('Completed');
	        }else{
	        	jQuery('div.woo-complex-prod-variants span.back-text').text('Not Completed');
	        }
        }, 1000);*/
    });
    </script>



<?php


 if ($product->get_id() == 6089 || $product->get_id() == 7722) { ?>
<script type="text/javascript">

jQuery(document).ready(function(){

	var backimage = jQuery("#picker_pa_ttype .select-option.swatch-wrapper.selected").attr('data-value');
	
	var frontimage = jQuery("#picker_pa_style .select-option.swatch-wrapper.selected a img").attr('src');

	console.log("frontback", frontimage , backimage);

	if (frontimage != undefined ) {
		jQuery(".show_img img.front_img").attr('src',frontimage);
	}else{
		frontimage = jQuery("#picker_pa_style div").next().next().find("a img").attr('src');
		jQuery(".show_img img.front_img").attr('src',frontimage);
	}
	jQuery(".show_img img.back_img").attr('src','<?php echo get_template_directory_uri(); ?>'+'-child/images/back/'+backimage+'-back.png');
	
	
	jQuery("#picker_pa_ttype .select-option.swatch-wrapper").on('click',function(e){
		e.preventDefault();
		
		jQuery('#picker_pa_style .select-option.swatch-wrapper').each(function(i,element){
			$(element).removeClass("selected")
		});

		//jQuery('#picker_pa_style select#pa_style').val("").trigger( "change" );


		var tag_type_string = $(this).attr("data-value");


		var tag_type_arry = tag_type_string.split('-');
		var tag_type = tag_type_arry[0];

		jQuery('#picker_pa_ttype .select-option.swatch-wrapper').removeClass('selected');

		jQuery('#picker_pa_ttype .select-option.swatch-wrapper').each(function(i,element){
			
			if($(element).attr("data-value") == tag_type){
				console.log("element", $(element).attr("data-value"), tag_type);
				$(element).addClass('selected');
				jQuery("select#pa_ttype option[value='"+tag_type+"']").prop("selected", true).change();
			}
		});
	
		/*end*/

		var backimage = jQuery("#picker_pa_ttype .select-option.swatch-wrapper.selected").attr('data-value');

		console.log("backimage select", backimage);

		var frontimage = jQuery(this).find("a img").attr('src');
		// remove previous class
		var lastClass = $('.show_img .section-front-image').attr('class').split(' ').pop();
		var str = $(this).attr('data-value');
		var res = str.split("-");
		$('.show_img .section-front-image').removeClass(lastClass);
		jQuery(".show_img .section-front-image").addClass(res[0]);

		$('.show_img .section-back-image').removeClass(lastClass);
		jQuery(".show_img .section-back-image").addClass(res[0]);
		//end remove previous class

		jQuery(".show_img img.front_img").attr('src',frontimage);
		jQuery(".show_img img.back_img").attr('src','<?php echo get_template_directory_uri(); ?>'+'-child/images/back/'+backimage+'-back.png');
		
	});

	/*select style*/
	
	jQuery(document).find("#picker_pa_style .select-option.swatch-wrapper").on('click',function(e){
			e.preventDefault();
			console.log("style");
			var value = $(this).attr("data-value");

			jQuery('#picker_pa_style .select-option.swatch-wrapper').removeClass('selected');
			jQuery('#picker_pa_style .select-option.swatch-wrapper').each(function(i,element){
			
					console.log($(this).find('.selected').html(), 'undefined');

			if($(element).attr("data-value") == value){
				console.log("element style", $(element).attr("data-value"), value);
				console.log("element style", $(element).find("img"), 'img2w121');
				$(element).addClass('selected');
				jQuery("select#pa_style option[value='"+value+"']").prop("selected", true).change();
			}
		});


		var tag_type_arry = value.split('-');
		var tag_type = tag_type_arry[0];

		jQuery('#picker_pa_ttype .select-option.swatch-wrapper').removeClass('selected');
		jQuery('#picker_pa_ttype .select-option.swatch-wrapper').each(function(i,element){
			console.log("type element", $(element).attr("data-value") ,  tag_type);
			if($(element).attr("data-value") == tag_type){
				console.log("element-type: ", $(element).attr("data-value"), tag_type);
				console.log("element-type: ", $(element).find('img').attr("src"), 'Image');
				$(element).addClass('selected');

					if($("#pa_size").val() == "large"){
						jQuery("select#pa_ttype option[value='"+tag_type+"']").prop("selected", true).change();
					}
				
			}
		});

	jQuery('#picker_pa_style .select-option.swatch-wrapper.selected').each(function(i,element){
    			
				var styleText = $(this).find('a').attr("title");
				var frontTagImage = $(this).find('img').attr("src");
				$('.front_img').attr('src', frontTagImage);
				$('.style').text(styleText);


	});



	})




	$("select#pa_ttype").on("change", function(){
		
		var value = $(this).val();
		console.log("remove type class");
		jQuery('#picker_pa_ttype .select-option.swatch-wrapper').removeClass('selected');
		$('#picker_pa_ttype .select-option.swatch-wrapper').each(function(index, element){
			if($(element).attr("data-value") == value){
				console.log("selected");

				$(element).addClass("selected");
			}
		});
	});



	$("select#pa_shape").on("change", function(){
		var value = $(this).val();
		console.log("remove type class");
		jQuery('#picker_pa_color .select-option.swatch-wrapper').removeClass('selected');
		$('#picker_pa_color .select-option.swatch-wrapper').each(function(index, element){
			if($(element).attr("data-value") == value){
				console.log("selected");
				$(element).addClass("selected");
			}
		}) 
	})

	$("select#pa_style").on("change", function(){
		console.log("change pa_style");
		console.log($(this).val());
	})

});


</script>
<?php }elseif($product->get_id() == 6033 || $product->get_id() == 7659){ ?>
<script type="text/javascript">
jQuery(document).ready(function(){
	var image = jQuery("#picker_pa_color .select-option.swatch-wrapper.selected").attr('data-value');
	if (image != undefined ) {
		jQuery(".show_img img").attr('src','<?php echo get_template_directory_uri(); ?>'+'-child/images/back/'+image+'-back.png');
	}else{
		image = jQuery("#picker_pa_color div").first().attr('data-value');
		jQuery(".show_img img").attr('src','<?php echo get_template_directory_uri(); ?>'+'-child/images/back/'+image+'-back.png');
	}
        
    jQuery("#picker_pa_color .select-option.swatch-wrapper").on('click',function(e){
    	e.preventDefault();
		var value = $(this).attr("data-value");
		var color = $(this).find('a').attr('title');
		jQuery("div.woo-complex-prod-variants span.color").text(color);
		// jQuery("select#pa_style option[value='"+value+"']").prop("selected", true).change();
		jQuery('#picker_pa_color .select-option.swatch-wrapper').removeClass('selected');
		jQuery('#picker_pa_color .select-option.swatch-wrapper').each(function(i,element){
			if($(element).attr("data-value") == value){
			console.log("element style", $(element).attr("data-value"), value);
			$(element).addClass('selected');
				jQuery("select#pa_color option[value='"+value+"']").prop("selected", true).change();
			}
		});

		// remove previous class
    	var lastClass = $('.show_img .section-front-image').attr('class').split(' ');
		var str = $(this).attr('data-value');
		var res = str.split("-");
		$('.show_img .section-front-image').removeClass(lastClass[2]);
		jQuery(".show_img .section-front-image").addClass("Alu-"+res[1]);
		$('.show_img .section-back-image').removeClass(lastClass[2]);
		jQuery(".show_img .section-back-image").addClass("Alu-"+res[1]);
		var image = jQuery(this).attr('data-value');
		jQuery(".show_img img").attr('src','<?php echo get_template_directory_uri(); ?>'+'-child/images/back/'+image+'-back.png');
	
		jQuery('#picker_pa_color .select-option.swatch-wrapper.selected').each(function(i,element){
	    	var styleText = $(this).find('a').attr("title");
			var frontTagImage = $(this).find('img').attr("src");
			$('.front_img').attr('src', frontTagImage);
			$('.back_img').attr('src', frontTagImage);
			$('.style').text(styleText);


		});



	});
});
</script>
<?php } ?>


<?php 
if (isset($_POST['petName'])) { ?>
	<script type="text/javascript">
		jQuery(document).ready(function(){
			jQuery(".select-option.swatch-wrapper").removeClass("selected");
			jQuery("select#pa_shape option[value='<?php echo $_POST["type"]; ?>']").attr("selected", "selected");
			jQuery(".select-option.swatch-wrapper[data-value='<?php echo $_POST["type"]; ?>").addClass('selected');
			jQuery(".front_line1").text('<?php echo $_POST['petName']; ?>');
			jQuery("#engraving_front_line_1").val('<?php echo $_POST['petName']; ?>');
			var type = jQuery("#picker_pa_shape .select-option.swatch-wrapper.selected").attr('data-value');
			console.log(type);
			if (type == "heart") {
				jQuery(".show_img img").attr('src',window.location.origin+'/wp-content/themes/salient-child/images/back/pink-heart-back.png');
			} else if(type == "circle"){
				jQuery(".show_img img").attr('src',window.location.origin+'/wp-content/themes/salient-child/images/back/black-circle-back.png');
			} else if(type == "bone"){
				jQuery(".show_img img").attr('src',window.location.origin+'/wp-content/themes/salient-child/images/back/black-bone-back.png');
			}

		});
	</script>
<?php } ?>
<script type="text/javascript">
	jQuery(document).ready(function(){
		var shape = jQuery('#picker_pa_shape div.select-option.selected a').attr('title');
		jQuery("div.woo-complex-prod-variants span.shape").text(shape);
		var color = jQuery('#picker_pa_color div.select-option.selected a').attr('title');
		jQuery("div.woo-complex-prod-variants span.color").text(color);
		var size = jQuery('#pa_size').val();
		jQuery("div.woo-complex-prod-variants span.size").text(size);
		var type = jQuery('#picker_pa_ttype div.select-option.selected a').attr('title');
		jQuery("div.woo-complex-prod-variants span.type").text(type);
		var style = jQuery('#picker_pa_style div.select-option.selected a').attr('title');
		jQuery("div.woo-complex-prod-variants span.style").text(style);
	});





</script>
<?php
do_action( 'woocommerce_after_add_to_cart_form' );



