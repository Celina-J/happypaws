<?php

/**
 * Review order table
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/review-order.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 5.2.0
 */
?>
<div class="order-overview-container">
	<?php defined('ABSPATH') || exit; ?>


	<?php
	do_action('woocommerce_review_order_before_cart_contents');

	foreach (WC()->cart->get_cart() as $cart_item_key => $cart_item) {
		$_product = apply_filters('woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key);

		if ($_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters('woocommerce_checkout_cart_item_visible', true, $cart_item, $cart_item_key)) {
	?>

			<div class="order-products-list">
				<div class="<?php echo esc_attr(apply_filters('woocommerce_cart_item_class', 'cart_item', $cart_item, $cart_item_key)); ?> cart-list-item">
					<div class="product-name-qty">
						<?php echo wp_kses_post(apply_filters('woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key)) . '&nbsp;'; ?>
						<?php echo apply_filters('woocommerce_checkout_cart_item_quantity', ' <strong class="product-quantity">' . sprintf('&times;&nbsp;%s', $cart_item['quantity']) . '</strong>', $cart_item, $cart_item_key); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped 
						?>
					</div>
					<div>
						<?php echo wc_get_formatted_cart_item_data($cart_item); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped 
						?>
						<?php echo apply_filters('woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal($_product, $cart_item['quantity']), $cart_item, $cart_item_key); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped 
						?>
					</div>
				</div>
			</div>
	<?php
		}
	}
	?>
	<div class="cart-subtotal">
		<span><?php esc_html_e('Subtotal', 'woocommerce'); ?></span>
		<span><?php wc_cart_totals_subtotal_html(); ?></span>
	</div>

	<div class="tax-total">
		<span><?php echo esc_html(WC()->countries->tax_or_vat()); ?></span>
		<span><?php wc_cart_totals_taxes_total_html(); ?></span>
	</div>

	<?php foreach (WC()->cart->get_coupons() as $code => $coupon) : ?>
		<div class="cart-discount coupon-<?php echo esc_attr(sanitize_title($code)); ?> cart-discount">
			<span><?php wc_cart_totals_coupon_label($coupon); ?></span>
			<span><?php wc_cart_totals_coupon_html($coupon); ?></span>
		</div>
	<?php endforeach; ?>
	<?php

	do_action('woocommerce_review_order_after_cart_contents');
	?>

	<?php if (WC()->cart->needs_shipping() && WC()->cart->show_shipping()) : ?>

		<?php do_action('woocommerce_review_order_before_shipping'); ?>

		
		<div class="shipping-fee"> <?php wc_cart_totals_shipping_html(); ?> </div>
		<?php $cart_total = WC()->cart->get_subtotal(); ?>
		<?php
		if ($cart_total < 500) :  ?>
			<div><b>Handla för <?= 500 - $cart_total ?> kr mer för att få fri frakt!</b></div>
		<?php endif; ?>

		<?php do_action('woocommerce_review_order_after_shipping'); ?>

	<?php endif; ?>


	<?php do_action('woocommerce_review_order_before_order_total'); ?>

	<div class="order-total">
		<span><?php esc_html_e('Total', 'woocommerce'); ?></span>
		<span><?php wc_cart_totals_order_total_html(); ?></span>
	</div>
	<?php do_action('woocommerce_review_order_after_order_total'); ?>
</div>