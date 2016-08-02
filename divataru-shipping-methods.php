<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/*
Plugin Name: WooCommerce Extra Shipping Methods
Plugin URI: http://www.intelligencestorm.com
Description: WooCommerce Extra Shipping Methods.
Version: 1.0.2
Author: Dmytro Samokhin
Author URI: http://www.intelligencestorm.com
*/

$active_plugins = apply_filters( 'active_plugins', get_option( 'active_plugins' ) );
if ( in_array( 'woocommerce/woocommerce.php',  $active_plugins) ) {

    /* 
     * Nova Poshta 
     */
    
	add_filter( 'woocommerce_shipping_methods', 'add_nova_poshta_shipping_method' );
		function add_nova_poshta_shipping_method( $method ) {
    		$method['nova_poshta'] = 'WC_Shipping_Nova_Poshta';
    		return $method;
		}

	add_action( 'woocommerce_shipping_init', 'nova_poshta_shipping_method_init' );
		function nova_poshta_shipping_method_init(){
   		require_once 'class-nova-poshta-shipping-method.php';
		}
    
    /* 
     * Mist Express 
     */
    
	add_filter( 'woocommerce_shipping_methods', 'add_mist_express_shipping_method' );
		function add_mist_express_shipping_method( $method ) {
    		$method['mist_express'] = 'WC_Shipping_Mist_Express';
    		return $method;
		}

	add_action( 'woocommerce_shipping_init', 'mist_express_shipping_method_init' );
		function mist_express_shipping_method_init(){
   		require_once 'class-mist-express-shipping-method.php';
		}    

    /* 
     * GLS 
     */
    
	add_filter( 'woocommerce_shipping_methods', 'add_gls_shipping_method' );
		function add_gls_shipping_method( $method ) {
    		$method['gls'] = 'WC_Shipping_GLS';
    		return $method;
		}

	add_action( 'woocommerce_shipping_init', 'gls_shipping_method_init' );
		function gls_shipping_method_init(){
   		require_once 'class-gls-shipping-method.php';
		}
    
    /* 
     * Magyar Posta 
     */
    
	add_filter( 'woocommerce_shipping_methods', 'add_magyar_posta_shipping_method' );
		function add_magyar_posta_shipping_method( $method ) {
    		$method['magyar_posta'] = 'WC_Shipping_Magyar_Posta';
    		return $method;
		}

	add_action( 'woocommerce_shipping_init', 'magyar_posta_shipping_method_init' );
		function magyar_posta_shipping_method_init(){
   		require_once 'class-magyar-posta-shipping-method.php';
		}  
    
}

?>