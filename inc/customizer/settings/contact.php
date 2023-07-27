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
use SoftCoders\spria\Customizer\Controls\Customizer_Separator_Control;
use WP_Customize_Media_Control;

/**
 * Adds the individual sections, settings, and controls to the theme customizer
 */
class spria_Contact_Settings extends spria_Customizer {

	public function __construct() {
        parent::instance();
        $this->populated_default_data();
        // Add Controls
        add_action( 'customize_register', array( $this, 'register_general_controls' ) );
	}

    public function register_general_controls( $wp_customize ) {
        /**
         * Socials
         */
        $wp_customize->add_setting('socials_heading', array(
            'default' => '',
            'sanitize_callback' => 'esc_html',
        ));
        $wp_customize->add_control(new Customizer_Heading_Control($wp_customize, 'socials_heading', array(
            'label' => esc_html__( 'Socials', 'spria' ),
            'section' => 'contact_section',
        )));
        //Opensea
        $wp_customize->add_setting( 'social_opensea',
            array(
                'default' => $this->defaults['social_opensea'],
                'transport' => 'refresh',
                'sanitize_callback' => 'softcoderstheme_text_sanitization',
            )
        );
        $wp_customize->add_control( 'social_opensea',
            array(
                'label' => esc_html__( 'Opensea', 'spria' ),
                'section' => 'contact_section',
                'type' => 'text',
            )
        );
        // Facebook
        $wp_customize->add_setting( 'social_facebook',
            array(
                'default' => $this->defaults['social_facebook'],
                'transport' => 'refresh',
                'sanitize_callback' => 'softcoderstheme_text_sanitization',
            )
        );
        $wp_customize->add_control( 'social_facebook',
            array(
                'label' => esc_html__( 'Facebook', 'spria' ),
                'section' => 'contact_section',
                'type' => 'text',
            )
        );
        // Twitter
        $wp_customize->add_setting( 'social_twitter',
            array(
                'default' => $this->defaults['social_twitter'],
                'transport' => 'refresh',
                'sanitize_callback' => 'softcoderstheme_text_sanitization',
            )
        );
        $wp_customize->add_control( 'social_twitter',
            array(
                'label' => esc_html__( 'Twitter', 'spria' ),
                'section' => 'contact_section',
                'type' => 'text',
            )
        );
        // Discord
        $wp_customize->add_setting( 'social_discord',
            array(
                'default' => $this->defaults['social_discord'],
                'transport' => 'refresh',
                'sanitize_callback' => 'softcoderstheme_text_sanitization',
            )
        );
        $wp_customize->add_control( 'social_discord',
            array(
                'label' => esc_html__( 'Discord', 'spria' ),
                'section' => 'contact_section',
                'type' => 'text',
            )
        );
        // Pinterest
        $wp_customize->add_setting( 'social_pinterest',
            array(
                'default' => $this->defaults['social_pinterest'],
                'transport' => 'refresh',
                'sanitize_callback' => 'softcoderstheme_text_sanitization',
            )
        );
        $wp_customize->add_control( 'social_pinterest',
            array(
                'label' => esc_html__( 'Pinterest', 'spria' ),
                'section' => 'contact_section',
                'type' => 'text',
            )
        );
        // Instagram
        $wp_customize->add_setting( 'social_instagram',
            array(
                'default' => $this->defaults['social_instagram'],
                'transport' => 'refresh',
                'sanitize_callback' => 'softcoderstheme_text_sanitization',
            )
        );
        $wp_customize->add_control( 'social_instagram',
            array(
                'label' => esc_html__( 'Instagram', 'spria' ),
                'section' => 'contact_section',
                'type' => 'text',
            )
        );

    }

}

/**
 * Initialise our Customizer settings only when they're required  
 */
if ( class_exists( 'WP_Customize_Control' ) ) {
	new spria_Contact_Settings();
}
