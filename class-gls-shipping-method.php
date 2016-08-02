<?php


/**
 * GLS Shipping Method.
 *
 * A simple shipping method allowing sending by Nova Poshta.
 *
 * @class 		WC_Shipping_GLS
 * @version		1.0.1
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class WC_Shipping_GLS extends WC_Shipping_Method {

	/**
	 * Constructor.
	 */
	public function __construct( $instance_id = 0 ) {
      
		$this->id                    = 'gls';
		$this->instance_id 	     = absint( $instance_id );
		$this->method_title          = __( 'GLS', 'woocommerce' );
		$this->method_description    = __( 'Allow customers to get their orders by GLS.', 'woocommerce' );
		$this->supports              = array(
			'shipping-zones',
			'instance-settings',
			'instance-settings-modal',
			
		);
		
		$this->instance_form_fields = array(
        		'enabled' => array(
        			'title' 		=> __( 'Enable/Disable' ),
        			'type' 			=> 'checkbox',
        			'label' 		=> __( 'Enable this shipping method' ),
        			'default' 		=> 'yes',
        		),
        		'title' => array(
        			'title' 		=> __( 'GLS' ),
        			'type' 			=> 'text',
        			'description' 	=> __( 'This controls the title which the user sees during checkout.' ),
        			'default'		=> __( 'GLS' ),
        			'desc_tip'		=> true
        		)
		);
		$this->enabled		    = $this->get_option( 'enabled' );
		$this->title                = $this->get_option( 'title' );

		add_action( 'woocommerce_update_options_shipping_' . $this->id, array( $this, 'process_admin_options' ) );
		
	}


    /**
	 * calculate_shipping function.
	 * Calculate GLS shipping.
	 * @param array $package (default: array())
	 */
	public function calculate_shipping( $package = array() ) {
		$this->add_rate( array(
			'id'    => $this->id . $this->instance_id,
			'label' => $this->title,
			'cost'  => 0,
		) );
	}

	
	



}
?>