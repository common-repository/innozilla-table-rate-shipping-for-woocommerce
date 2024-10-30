<?php

	/**
    * Description : WooCommerce Extension that can Define multiple shipping rates based on weight, item count and price.
    * Package : Innozilla Table Rate Shipping WooCommerce
    * Author : Innozilla
    */
    
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Delete rate via ajax function
 */
add_action( 'wp_ajax_woocommerce_table_rate_delete', 'ITRSW_FREE_woocommerce_table_rate_delete' );

function ITRSW_FREE_woocommerce_table_rate_delete() {
	check_ajax_referer( 'delete-rate', 'security' );

	if ( is_array( $_POST['rate_id'] ) ) {
		$rate_ids = array_map( 'intval', $_POST['rate_id'] );
	} else {
		$rate_ids = array( intval( $_POST['rate_id'] ) );
	}

	if ( ! empty( $rate_ids ) ) {
		global $wpdb;
		$wpdb->query( "DELETE FROM {$wpdb->prefix}innozilla_woocommerce_shipping_table_rates WHERE rate_id IN (" . implode( ',', $rate_ids ) . ")" );
	}

	die();
}
