<?php
/**
 * Single variation cart button
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;

global $product;
$form = true;
?>
<form>
	<div class="woocommerce-variation-add-to-cart variations_button">
		<?php if ($product->get_id() ==  6033 || $product->get_id() == 6089 || $product->get_id() == 7722 || $product->get_id() == 7659) {
		       $form = false;
		    } ?>
		<?php if ($form) {
			do_action( 'woocommerce_before_add_to_cart_button' );
		} ?>
		<!-- <?php do_action( 'woocommerce_before_add_to_cart_button' ); ?> -->

		<?php
		do_action( 'woocommerce_before_add_to_cart_quantity' );

		woocommerce_quantity_input( array(
			'min_value'   => apply_filters( 'woocommerce_quantity_input_min', $product->get_min_purchase_quantity(), $product ),
			'max_value'   => apply_filters( 'woocommerce_quantity_input_max', $product->get_max_purchase_quantity(), $product ),
			'input_value' => isset( $_POST['quantity'] ) ? wc_stock_amount( wp_unslash( $_POST['quantity'] ) ) : $product->get_min_purchase_quantity(), // WPCS: CSRF ok, input var ok.
		) );

		do_action( 'woocommerce_after_add_to_cart_quantity' );
		?>

		<?php

			if ( is_user_logged_in() ) { ?>
				<button type="submit" class="single_add_to_cart_button_custom button alt">Add to Cart</button>

	  	<?php	} else { ?>
				<button type="submit" class="single_add_to_cart_button_custom button alt"><?php echo esc_html( $product->single_add_to_cart_text() ); ?></button>

			<?php } ?>
			
		<?php do_action( 'woocommerce_after_add_to_cart_button' ); ?>

		
			<input type="hidden" name="add-to-cart" value="<?php echo absint( $product->get_id() ); ?>" />
			<input type="hidden" name="product_id" value="<?php echo absint( $product->get_id() ); ?>" />
			<input type="hidden" name="variation_id" class="variation_id" value="0" />

	</div>
</form>	

<script type="text/javascript">
	$(document).ready(function(){
		$('.single_add_to_cart_button_custom').click(function(e){
			e.preventDefault();
			<?php $_SESSION["idtag_action"] = 'new-id-tag'; // 86400 = 1 day ?>

			var product_id = $("input[name='product_id']").val();
			if(product_id == "6033"){
				var shape =  $('#picker_pa_shape').find('.selected').attr('data-value');
				var size = $("#picker_pa_size input[type='radio']:checked").val();
				var color = $("#picker_pa_color").find('.selected').attr('data-value');
				var quantity = $("input[name=quantity]").val();

				var data = { 
								product_id : product_id, 
								shape : shape, 
								size : size, 
								color : color,
								quantity : quantity,
								engraving_front_line_1: $(".front_line1").text(),
								engraving_front_line_2: $(".front_line2").text(),
								engraving_front_line_3: $(".front_line3").text(),
								engraving_front_line_4: $(".front_line4").text(),
								engraving_back_line_1:  $(".back_line1").text(),
								engraving_back_line_2:  $(".back_line1").text(),
								engraving_back_line_3:  $(".back_line3").text(),
								engraving_back_line_4:  $(".back_line4").text(),
								action : 'add_variation_product'
							}
			}
			
			if(product_id == "6089"){
 				var type =  $('#picker_pa_ttype').find('.selected').attr('data-value');
				var size = $("#picker_pa_size input[type='radio']:checked").val();
				var style = jQuery("#picker_pa_style").find('.selected').attr('data-value');
				var quantity = $("input[name=quantity]").val()
				var data = { 
							product_id : product_id, 
							type :  type, 
							size :  size, 
							style : style,
							engraving_back_line_1 : $('.back_line1').text(),
							engraving_back_line_2 : $('.back_line2').text(),
							engraving_back_line_3 : $('.back_line3').text(),
							engraving_back_line_4 : $('.back_line4').text(),
							action : 'add_variation_product',
							quantity:quantity
				}
			}	
			console.log("Data", data);
			$('.loader-wrap').fadeIn();
			$.ajax({
     		 	type: 'POST',
	      		url: ajaxurl,
	      		data: data,
	      		 dataType: "json",
              	success: function(response) {
              		$('.loader-wrap').fadeOut();
					if(response['success']==1){
						window.open(window.location.origin+'/product/smarttag-id-tag-protection-plans/?sub=true');
						return ;	
					}else{
						alert(response['message']);
						

					}
              	}
    		});
		})

	});
</script>
