<?php
/**
 * Edit address form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-edit-address.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 3.3.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$page_title = ( 'billing' === $load_address ) ? __( 'Billing Address', 'woocommerce' ) : __( 'Shipping address', 'woocommerce' );

do_action( 'woocommerce_before_edit_account_address_form' ); ?>

<div class="page-heading">
	<h1>Billing/Shipping Information</h1>
</div>

<?php if ( ! $load_address ) : ?>
	<?php wc_get_template( 'myaccount/my-address.php' ); ?>
<?php else : ?>

	<div class="acc-blue-box">
		<div class="acc-blue-head">
			<?php echo apply_filters( 'woocommerce_my_account_edit_address_title', $page_title, $load_address ); ?>
		</div>
		<div class="acc-blue-content">
			<form method="post" name="edit-address" id="edit_add">

				<div class="woocommerce-address-fields">
					<?php do_action( "woocommerce_before_edit_address_form_{$load_address}" ); ?>

					<div class="woocommerce-address-fields__field-wrapper">
						<?php
						foreach ( $address as $key => $field ) {
							if ( isset( $field['country_field'], $address[ $field['country_field'] ] ) ) {
								$field['country'] = wc_get_post_data_by_key( $field['country_field'], $address[ $field['country_field'] ]['value'] );
							}
								woocommerce_form_field( $key, $field, wc_get_post_data_by_key( $key, $field['value'] ) );
						}
						?>
					</div>

					<?php do_action( "woocommerce_after_edit_address_form_{$load_address}" ); ?>

					<p class="text-center mt-15">
						<button type="submit" class="button site-btn-red shipping_information_redirect" name="save_address" value="<?php esc_attr_e( 'SAVE', 'woocommerce' ); ?>"><?php esc_html_e( 'SAVE', 'woocommerce' ); ?></button>
						<?php wp_nonce_field( 'woocommerce-edit_address' ); ?>
						<input type="hidden" name="action" value="edit_address" />
					</p>
				</div>

			</form>
		</div>
	</div>

<?php endif; ?>

<?php do_action( 'woocommerce_after_edit_account_address_form' ); ?>
