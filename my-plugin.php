<?php
defined('ABSPATH') or die('No script kiddies please!');
/**
 * Plugin Name: My Plugin
 * Description: A truly amazing plugin.
 * Version: 1.0
 * Author: Giuseppe Di Stefano
 * Author URI:
 */

add_filter( 'woocommerce_coupon_message', 'filter_woocommerce_coupon_message', 10, 3 );
function filter_woocommerce_coupon_message( $msg, $msg_code, $coupon ) {
    // $applied_coupons = WC()->cart->get_applied_coupons(); // Get applied coupons

    if( $msg === __( 'Coupon code applied successfully.', 'woocommerce' ) && $coupon->get_code() === "promo60") {
        $msg = sprintf( 
            __( "The %s promotion code has been applied and redeemed successfully", "woocommerce" ), 
            '<strong>' . $coupon->get_code() . '</strong>'
        );
    }

    return $msg;
}
