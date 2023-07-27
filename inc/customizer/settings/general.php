<?php
/**
 * @author  SoftCoders
 * @since   1.0
 * @version 1.0
 */
namespace SoftCoders\spria\Customizer\Settings;

use SoftCoders\spria\Customizer\spria_Customizer;
use SoftCoders\spria\Customizer\Controls\Customizer_Heading_Control;
use SoftCoders\spria\Customizer\Controls\Customizer_Switch_Control;
use SoftCoders\spria\Customizer\Controls\Customizer_Separator_Control;
use SoftCoders\spria\Customizer\Controls\Customizer_Sortable_Repeater_Control;
use WP_Customize_Media_Control;
use WP_Customize_Color_Control;

/**
 * Adds the individual sections, settings, and controls to the theme customizer
 */
class spria_General_Settings extends spria_Customizer {

	public function __construct() {
	    parent::instance();
        $this->populated_default_data();
        // Add Controls
        add_action( 'customize_register', array( $this, 'register_general_controls' ) );
	}

    public function register_general_controls( $wp_customize ) {
        /**
         * Heading
         */
        $wp_customize->add_setting('site_logo', array(
            'default' => '',
            'sanitize_callback' => 'esc_html',
        ));
        $wp_customize->add_control(new Customizer_Heading_Control($wp_customize, 'site_logo', array(
            'label' => esc_html__( 'Site Logo', 'spria' ),
            'section' => 'general_section',
        )));

        $wp_customize->add_setting( 'logo1',
            array(
                'default' => $this->defaults['logo1'],
                'transport' => 'refresh',
                'sanitize_callback' => 'absint',
            )
        );
        $wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'logo1',
            array(
                'label' => esc_html__( 'Main Logo', 'spria' ),
                'description' => esc_html__( 'This is the description for the Media Control', 'spria' ),
                'section' => 'general_section',
                'mime_type' => 'image',
                'button_labels' => array(
                    'select' => esc_html__( 'Select File', 'spria' ),
                    'change' => esc_html__( 'Change File', 'spria' ),
                    'default' => esc_html__( 'Default', 'spria' ),
                    'remove' => esc_html__( 'Remove', 'spria' ),
                    'placeholder' => esc_html__( 'No file selected', 'spria' ),
                    'frame_title' => esc_html__( 'Select File', 'spria' ),
                    'frame_button' => esc_html__( 'Choose File', 'spria' ),
                )
            )
        ) );

        // Main Logo Size
        $wp_customize->add_setting( 'logo1_size',
            array(
                'default' => $this->defaults['logo1_size'],
                'transport' => 'refresh',
                'sanitize_callback' => 'absint',
            )
        );
        $wp_customize->add_control( 'logo1_size',
            array(
                'label' => esc_html__( 'Main Logo Size', 'spria' ),
                'section' => 'general_section',
                'type' => 'number',
            )
        );

        // Main Mobile Logo Size
        $wp_customize->add_setting( 'logo1_m_size',
            array(
                'default' => $this->defaults['logo1_m_size'],
                'transport' => 'refresh',
                'sanitize_callback' => 'absint',
            )
        );
        $wp_customize->add_control( 'logo1_m_size',
            array(
                'label' => esc_html__( 'Main Mobile Logo Size', 'spria' ),
                'section' => 'general_section',
                'type' => 'number',
            )
        );

        /**
         * Heading
         */
        $wp_customize->add_setting('site_switching', array(
            'default' => '',
            'sanitize_callback' => 'esc_html',
        ));
        $wp_customize->add_control(new Customizer_Heading_Control($wp_customize, 'site_switching', array(
            'label' => esc_html__( 'Site Switch Control', 'spria' ),
            'section' => 'general_section',
        )));


        // Add our Checkbox switch setting and control for opening URLs in a new tab
        $wp_customize->add_setting( 'preloader',
            array(
                'default' => $this->defaults['preloader'],
                'transport' => 'refresh',
                'sanitize_callback' => 'softcoderstheme_switch_sanitization',
            )
        );

        $wp_customize->add_setting( 'preloader_img',
            array(
                'default' => $this->defaults['preloader_img'],
                'transport' => 'refresh',
                'sanitize_callback' => 'absint',
            )
        );
        $wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'preloader_img',
            array(
                'label' => esc_html__( 'Preloader Image', 'spria' ),
                'description' => esc_html__( 'This is the description for the Media Control', 'spria' ),
                'section' => 'general_section',
                'mime_type' => 'image',
                'button_labels' => array(
                    'select' => esc_html__( 'Select File', 'spria' ),
                    'change' => esc_html__( 'Change File', 'spria' ),
                    'default' => esc_html__( 'Default', 'spria' ),
                    'remove' => esc_html__( 'Remove', 'spria' ),
                    'placeholder' => esc_html__( 'No file selected', 'spria' ),
                    'frame_title' => esc_html__( 'Select File', 'spria' ),
                    'frame_button' => esc_html__( 'Choose File', 'spria' ),
                )
            )
        ) );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'preloader',
            array(
                'label' => esc_html__( 'Preloader', 'spria' ),
                'section' => 'general_section',
            )
        ) );

        $wp_customize->add_setting( 'preloader_text',
            array(
                'default' => $this->defaults['preloader_text'],
                'transport' => 'refresh',
                'sanitize_callback' => 'softcoderstheme_text_sanitization',
            )
        );
        $wp_customize->add_control( 'preloader_text',
            array(
                'label' => esc_html__( 'Preloader Text', 'spria' ),
                'section' => 'general_section',
                'type' => 'text',
            )
        );

        // Switch for back to top button
        $wp_customize->add_setting( 'page_scrolltop',
            array(
                'default' => $this->defaults['page_scrolltop'],
                'transport' => 'refresh',
                'sanitize_callback' => 'softcoderstheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'page_scrolltop',
            array(
                'label' => esc_html__( 'Back to Top', 'spria' ),
                'section' => 'general_section',
            )
        ) );
        $wp_customize->add_setting( 'base_theme_css',
        array(
            'default' => $this->defaults['base_theme_css'],
            'transport' => 'refresh',
            'sanitize_callback' => 'softcoderstheme_switch_sanitization',
        )
    );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'base_theme_css',
            array(
                'label' => esc_html__( 'Base Theme CSS', 'spria' ),
                'section' => 'general_section',
            )
        ) );

    }

}

/**
 * Initialise our Customizer settings only when they're required  
 */
if ( class_exists( 'WP_Customize_Control' ) ) {
	new spria_General_Settings();
}