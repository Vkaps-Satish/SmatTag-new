<?php
/**
 * Checkout Form
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.3.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

wc_print_notices();

do_action( 'woocommerce_before_checkout_form', $checkout );

// If checkout registration is disabled and not logged in, the user cannot checkout
if ( ! $checkout->enable_signup && ! $checkout->enable_guest_checkout && ! is_user_logged_in() ) {
	echo apply_filters( 'woocommerce_checkout_must_be_logged_in_message', __( 'You must be logged in to checkout.', 'woocommerce' ) );
	return;
}

// filter hook for include new pages inside the payment method
// $get_checkout_url = apply_filters( 'woocommerce_get_checkout_url', WC()->cart->get_checkout_url() );
$get_checkout_url = apply_filters( 'woocommerce_get_checkout_url', wc_get_checkout_url() ); ?>

<form name="checkout" id="validate_checkout" method="post" class="checkout woocommerce-checkout" action="<?php echo esc_url( $get_checkout_url ); ?>" enctype="multipart/form-data">

	<?php if ( sizeof( $checkout->checkout_fields ) > 0 ) : ?>

		<?php do_action( 'woocommerce_checkout_before_customer_details' ); ?>

		<div class="col12-set" id="customer_details">
			<div class="row">
				<div class="col-1 col-sm-12">
					<?php do_action( 'woocommerce_checkout_billing' ); ?>
					<h3 class="shipping-head">Shipping Details</h3>
					<p>Indicates a required field *</p>
					<?php do_action( 'woocommerce_checkout_shipping' ); ?>
				</div>
			</div>

			<div class="row">
				<div class="col-2 col-sm-12">
					<?php do_action( 'woocommerce_checkout_after_customer_details' ); ?>

					<h3 id="order_review_heading"><?php _e( 'Your Order', 'woocommerce' ); ?></h3>

					<?php do_action( 'woocommerce_checkout_before_order_review' ); ?>

					<div id="order_review" class="woocommerce-checkout-review-order">
						<?php do_action( 'woocommerce_checkout_order_review' ); ?>
					</div>

					<?php do_action( 'woocommerce_checkout_after_order_review' ); ?>
				</div>
			</div>
				
		</div>

		

	<?php endif; ?>

	

</form>
<?php do_action( 'woocommerce_after_checkout_form', $checkout ); ?>


