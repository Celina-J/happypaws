<?php

/**
 * Cart totals
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cart-totals.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 2.3.6
 */

defined('ABSPATH') || exit;

?>
<div class="cart_totals <?php echo (WC()->customer->has_calculated_shipping()) ? 'calculated_shipping' : ''; ?>">

	<?php do_action('woocommerce_before_cart_totals'); ?>

	<h2><?php esc_html_e('Cart totals', 'woocommerce'); ?></h2>

	<div cellspacing="0" class="shop_table shop_table_responsive">

		<div class="cart-subtotal">
			<div><?php esc_html_e('Subtotal', 'woocommerce'); ?></div>
			<div data-title="<?php esc_attr_e('Subtotal', 'woocommerce'); ?>"><?php wc_cart_totals_subtotal_html(); ?></div>
		</div>

		<?php foreach (WC()->cart->get_coupons() as $code => $coupon) : ?>
			<div class="cart-discount coupon-<?php echo esc_attr(sanitize_title($code)); ?>">
				<div><?php wc_cart_totals_coupon_label($coupon); ?></div>
				<div data-title="<?php echo esc_attr(wc_cart_totals_coupon_label($coupon, false)); ?>"><?php wc_cart_totals_coupon_html($coupon); ?></div>
			</div>
		<?php endforeach; ?>

		<?php do_action('woocommerce_cart_totals_before_shipping'); ?>

		<?php wc_cart_totals_shipping_html(); ?>

		<?php do_action('woocommerce_cart_totals_after_shipping'); ?>

		<?php $cart_total = WC()->cart->get_subtotal(); ?>

		<?php
		 if ( $cart_total < 500) :  ?>
		<div><b>Handla för <?= 500 - $cart_total?> kr mer för att få fri frakt!</b></div>
		<?php endif; ?>

		<?php do_action('woocommerce_cart_totals_before_order_total'); ?>

		<div class="order-total">
			<div><?php esc_html_e('Total', 'woocommerce'); ?></div>
			<div data-title="<?php esc_attr_e('Total', 'woocommerce'); ?>"><?php wc_cart_totals_order_total_html(); ?></div>
		</div>

		<?php do_action('woocommerce_cart_totals_after_order_total'); ?>

		<div class="wc-proceed-to-checkout">
			<?php do_action('woocommerce_proceed_to_checkout'); ?>
		</div>

		<?php do_action('woocommerce_after_cart_totals'); ?>

	</div>