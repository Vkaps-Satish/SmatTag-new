<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woothemes.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.6.1
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
global $product, $woocommerce, $brassIdTagProductSlug, $globalBrassIdTag, $aluminumIdTagProductSlug, $globalAluminumIdTag;

// Ensure visibility
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}

// echo "Gaurav";
// Extra post classes
$classes = array();

if(!version_compare( $woocommerce->version, '2.6', ">=" )) {

	global $woocommerce_loop;

	// Store loop count we're currently on
	if ( empty( $woocommerce_loop['loop'] ) ) {
		$woocommerce_loop['loop'] = 0;
	}

	// Store column count for displaying the grid
	if ( empty( $woocommerce_loop['columns'] ) ) {
		$woocommerce_loop['columns'] = apply_filters( 'loop_shop_columns', 4 );
	}

	// Increase loop count
	$woocommerce_loop['loop']++;

	// Extra post classes
	if ( 0 === ( $woocommerce_loop['loop'] - 1 ) % $woocommerce_loop['columns'] || 1 === $woocommerce_loop['columns'] ) {
		$classes[] = 'first';
	}
	if ( 0 === $woocommerce_loop['loop'] % $woocommerce_loop['columns'] ) {
		$classes[] = 'last';
	}

} 

$options = get_nectar_theme_options(); 
$product_style = (!empty($options['product_style'])) ? $options['product_style'] : 'classic';
$classes[] = $product_style;

?>
<li <?php post_class( $classes ); ?>>

	<?php  ?>


		<?php
			/**
			 * woocommerce_before_shop_loop_item_title hook
			 *
			 * @hooked woocommerce_show_product_loop_sale_flash - 10
			 * @hooked woocommerce_template_loop_product_thumbnail - 10
			 */
			do_action( 'woocommerce_before_shop_loop_item_title' ); ?>
		
	  

		<?php if($product_style == 'classic') { 
			//do_action( 'woocommerce_shop_loop_item_title' );
 			//do_action( 'woocommerce_after_shop_loop_item_title' ); 
		} ?>

	

	<?php do_action( 'woocommerce_after_shop_loop_item' ); ?>

</li>
<!-- <script type="text/javascript">
	jQuery(document).ready(function($){
		$("body").find("form").each(function(){
			if ($(this).find("input[name=product_id]").val() == <?php echo $globalBrassIdTag; ?> || $(this).find("input[name=product_id]").val() == <?php echo $globalAluminumIdTag; ?>) {

				if ($(this).find("input[name=product_id]").val() == <?php echo $globalBrassIdTag; ?>) {
					var anchor = '<a rel="nofollow" href="<?php echo get_permalink( $globalBrassIdTag ); ?>" data-quantity="1" data-product_id="<?php echo $globalBrassIdTag; ?>" data-product_sku="" class="button product_type_variable-subscription add_to_cart_button add_to_cart_button">Select options</a>';
				}else{
					var anchor = '<a rel="nofollow" href="<?php echo get_permalink( $globalAluminumIdTag ); ?>" data-quantity="1" data-product_id="<?php echo $globalAluminumIdTag; ?>" data-product_sku="" class="button product_type_variable-subscription add_to_cart_button add_to_cart_button">Select options</a>';
				}

				$(this).find("table.variations").hide();
				$(this).find("button[type=submit]").replaceWith(anchor);
			}
		})
		
	})
</script> -->