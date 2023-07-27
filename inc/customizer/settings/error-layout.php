<?php
/**
 * @author  SoftCoders
 * @since   1.0
 * @version 1.0
 */
namespace SoftCoders\spria\Customizer\Settings;

use SoftCoders\spria\Customizer\spria_Customizer;
use SoftCoders\spria\Customizer\Controls\Customizer_Switch_Control;
use SoftCoders\spria\Customizer\Controls\Customizer_Separator_Control;
use SoftCoders\spria\Customizer\Controls\Customizer_Image_Radio_Control;
use WP_Customize_Media_Control;
use WP_Customize_Color_Control;
/**
 * Adds the individual sections, settings, and controls to the theme customizer
 */
class spria_error_Layout_Settings extends spria_Customizer {

	public function __construct() {
        parent::instance();
        $this->populated_default_data();
        // Register Page Controls
        add_action( 'customize_register', array( $this, 'register_error_layout_controls' ) );
	}

    public function register_error_layout_controls( $wp_customize ) {
		
		// Content padding top
        $wp_customize->add_setting( 'error_padding_top',
            array(
                'default' => $this->defaults['error_padding_top'],
                'transport' => 'refresh',
                'sanitize_callback' => 'softcoderstheme_sanitize_integer',
            )
        );
        $wp_customize->add_control( 'error_padding_top',
            array(
                'label' => __( 'Content Padding Top', 'spria' ),
                'section' => 'error_layout_section',
                'type' => 'number',
            )
        );
        // Content padding bottom
        $wp_customize->add_setting( 'error_padding_bottom',
            array(
                'default' => $this->defaults['error_padding_bottom'],
                'transport' => 'refresh',
                'sanitize_callback' => 'softcoderstheme_sanitize_integer',
            )
        );
        $wp_customize->add_control( 'error_padding_bottom',
            array(
                'label' => __( 'Content Padding Bottom', 'spria' ),
                'section' => 'error_layout_section',
                'type' => 'number',
            )
        );
		
		$wp_customize->add_setting( 'error_banner',
            array(
                'default' => $this->defaults['error_banner'],
                'transport' => 'refresh',
                'sanitize_callback' => 'softcoderstheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'error_banner',
            array(
                'label' => __( 'Banner', 'spria' ),
                'section' => 'error_layout_section',
            )
        ) );
		
		$wp_customize->add_setting( 'error_breadcrumb',
            array(
                'default' => $this->defaults['error_breadcrumb'],
                'transport' => 'refresh',
                'sanitize_callback' => 'softcoderstheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'error_breadcrumb',
            array(
                'label' => __( 'Breadcrumb', 'spria' ),
                'section' => 'error_layout_section',
            )
        ) );

        $wp_customize->add_setting( 'error_bgimg',
            array(
                'default' => $this->defaults['error_bgimg'],
                'transport' => 'refresh',
                'sanitize_callback' => 'absint',
            )
        );
        $wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'error_bgimg',
            array(
                'label' => __( 'Banner Background Image', 'spria' ),
                'description' => esc_html__( 'This is the description for the Media Control', 'spria' ),
                'section' => 'error_layout_section',
                'mime_type' => 'image',
                'button_labels' => array(
                    'select' => __( 'Select File', 'spria' ),
                    'change' => __( 'Change File', 'spria' ),
                    'default' => __( 'Default', 'spria' ),
                    'remove' => __( 'Remove', 'spria' ),
                    'placeholder' => __( 'No file selected', 'spria' ),
                    'frame_title' => __( 'Select File', 'spria' ),
                    'frame_button' => __( 'Choose File', 'spria' ),
                ),
            )
        ) );

        // Banner background color
        $wp_customize->add_setting('error_bgcolor', 
            array(
                'default' => $this->defaults['error_bgcolor'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'error_bgcolor',
            array(
                'label' => esc_html__('Banner Background Color', 'spria'),
                'settings' => 'error_bgcolor', 
                'priority' => 10, 
                'section' => 'error_layout_section', 
            )
        ));

        // Banner background color opacity
        $wp_customize->add_setting( 'error_bgopacity',
            array(
                'default' => $this->defaults['error_bgopacity'],
                'transport' => 'refresh',
                'sanitize_callback' => 'softcoderstheme_sanitize_integer',
            )
        );
        $wp_customize->add_control( 'error_bgopacity',
            array(
                'label' => esc_html__( 'Background Opacity', 'spria' ),
                'section' => 'error_layout_section',
                'type' => 'number',
            )
        );
    }

}

/**
 * Initialise our Customizer settings only when they're required
 */
if ( class_exists( 'WP_Customize_Control' ) ) {
	new spria_error_Layout_Settings();
}
