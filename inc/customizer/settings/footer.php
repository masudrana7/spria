<?php
/**
 * @author  SoftCoders
 * @since   1.0
 * @version 1.0
 */
namespace SoftCoders\spria\Customizer\Settings;

use SoftCoders\spria\Customizer\spria_Customizer;
use SoftCoders\spria\Customizer\Controls\Customizer_Switch_Control;
use SoftCoders\spria\Customizer\Controls\Customizer_Gallery_Control;
use SoftCoders\spria\Customizer\Controls\Customizer_Heading_Control;
use SoftCoders\spria\Customizer\Controls\Customizer_Heading_Control2;
use SoftCoders\spria\Customizer\Controls\Customizer_Image_Radio_Control;
use WP_Customize_Media_Control;
use WP_Customize_Color_Control;

/**
 * Adds the individual sections, settings, and controls to the theme customizer
 */
class spria_Footer_Settings extends spria_Customizer {

	public function __construct() {
	    parent::instance();
        $this->populated_default_data();
        // Add Controls
        add_action( 'customize_register', array( $this, 'register_footer_controls' ) );
	}

    public function register_footer_controls( $wp_customize ) {
        /**
        * Footer Style
        * =======================================================================*/
        // Add our checkbox switch setting

        /**
        * Copyright Text
        * ======================*/
        $wp_customize->add_setting( 'copyright_text',
            array(
                'default' => $this->defaults['copyright_text'],
                'transport' => 'refresh',
                'sanitize_callback' => 'softcoderstheme_text_sanitization',
            )
        );
        $wp_customize->add_control( 'copyright_text',
            array(
                'label' => esc_html__( 'Copyright Text', 'spria' ),
                'section' => 'footer_common',
                'type' => 'textarea',
            )
        );

    }

}

/**
 * Initialise our Customizer settings only when they're required
 */
if ( class_exists( 'WP_Customize_Control' ) ) {
	new spria_Footer_Settings();
}
