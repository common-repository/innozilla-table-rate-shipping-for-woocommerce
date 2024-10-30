<?php
if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	exit;
}
if ( defined( 'WC_REMOVE_ALL_DATA' ) && true === WC_REMOVE_ALL_DATA ) {

	global $wpdb;

	if(in_array('innozilla-table-rate-shipping-woocommerce/innozilla-table-rate-shipping-woocommerce.php', apply_filters('active_plugins', get_option('active_plugins')))){ 
  
	} else {
		$wpdb->query( "DROP TABLE IF EXISTS {$wpdb->prefix}innozilla_woocommerce_shipping_table_rates" );
	}

}
