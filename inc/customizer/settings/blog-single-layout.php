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
class spria_Single_Page_Layout_Settings extends spria_Customizer {

	public function __construct() {
        parent::instance();
        $this->populated_default_data();
        // Register Page Controls
        add_action( 'customize_register', array( $this, 'register_single_post_layout_controls' ) );
	}

    public function register_single_post_layout_controls( $wp_customize ) {

        $wp_customize->add_setting( 'single_post_layout',
            array(
                'default' => $this->defaults['single_post_layout'],
                'transport' => 'refresh',
                'sanitize_callback' => 'softcoderstheme_radio_sanitization'
            )
        );
        $wp_customize->add_control( new Customizer_Image_Radio_Control( $wp_customize, 'single_post_layout',
            array(
                'label' => esc_html__( 'Layout', 'spria' ),
                'description' => esc_html__( 'Select the default template layout for Pages', 'spria' ),
                'section' => 'post_single_layout_section',
                'choices' => array(
                    'left-sidebar' => array(
                        'image' => trailingslashit( get_template_directory_uri() ) . 'assets/img/sidebar-left.png',
                        'name' => esc_html__( 'Left Sidebar', 'spria' )
                    ),
                    'full-width' => array(
                        'image' => trailingslashit( get_template_directory_uri() ) . 'assets/img/sidebar-full.png',
                        'name' => esc_html__( 'Full Width', 'spria' )
                    ),
                    'right-sidebar' => array(
                        'image' => trailingslashit( get_template_directory_uri() ) . 'assets/img/sidebar-right.png',
                        'name' => esc_html__( 'Right Sidebar', 'spria' )
                    )
                )
            )
        ) );

        /**
         * Separator
         */
        $wp_customize->add_setting('separator_page', array(
            'default' => '',
            'sanitize_callback' => 'esc_html',
        ));
        $wp_customize->add_control(new Customizer_Separator_Control($wp_customize, 'separator_page', array(
            'settings' => 'separator_page',
            'section' => 'post_single_layout_section',
        )));
        
        // Content padding top
        $wp_customize->add_setting( 'single_post_padding_top',
            array(
                'default' => $this->defaults['single_post_padding_top'],
                'transport' => 'refresh',
                'sanitize_callback' => 'softcoderstheme_sanitize_integer',
            )
        );
        $wp_customize->add_control( 'single_post_padding_top',
            array(
                'label' => __( 'Content Padding Top', 'spria' ),
                'section' => 'post_single_layout_section',
                'type' => 'number',
            )
        );
        // Content padding bottom
        $wp_customize->add_setting( 'single_post_padding_bottom',
            array(
                'default' => $this->defaults['single_post_padding_bottom'],
                'transport' => 'refresh',
                'sanitize_callback' => 'softcoderstheme_sanitize_integer',
            )
        );
        $wp_customize->add_control( 'single_post_padding_bottom',
            array(
                'label' => __( 'Content Padding Bottom', 'spria' ),
                'section' => 'post_single_layout_section',
                'type' => 'number',
            )
        );
        
        $wp_customize->add_setting( 'single_post_banner',
            array(
                'default' => $this->defaults['single_post_banner'],
                'transport' => 'refresh',
                'sanitize_callback' => 'softcoderstheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'single_post_banner',
            array(
                'label' => __( 'Banner', 'spria' ),
                'section' => 'post_single_layout_section',
            )
        ) );
        
        $wp_customize->add_setting( 'single_post_breadcrumb',
            array(
                'default' => $this->defaults['single_post_breadcrumb'],
                'transport' => 'refresh',
                'sanitize_callback' => 'softcoderstheme_switch_sanitization',
            )
        );
        $wp_customize->add_control( new Customizer_Switch_Control( $wp_customize, 'single_post_breadcrumb',
            array(
                'label' => __( 'Breadcrumb', 'spria' ),
                'section' => 'post_single_layout_section',
            )
        ) );

        $wp_customize->add_setting( 'single_post_bgimg',
            array(
                'default' => $this->defaults['single_post_bgimg'],
                'transport' => 'refresh',
                'sanitize_callback' => 'absint',
            )
        );
        $wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'single_post_bgimg',
            array(
                'label' => __( 'Banner Background Image', 'spria' ),
                'description' => esc_html__( 'This is the description for the Media Control', 'spria' ),
                'section' => 'post_single_layout_section',
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
        $wp_customize->add_setting('single_post_bgcolor', 
            array(
                'default' => $this->defaults['single_post_bgcolor'],
                'type' => 'theme_mod', 
                'capability' => 'edit_theme_options', 
                'transport' => 'refresh', 
                'sanitize_callback' => 'sanitize_hex_color',
            )
        );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'single_post_bgcolor',
            array(
                'label' => esc_html__('Banner Background Color', 'spria'),
                'settings' => 'single_post_bgcolor', 
                'priority' => 10, 
                'section' => 'post_single_layout_section', 
            )
        ));

        // Banner background color opacity
        $wp_customize->add_setting( 'single_post_bgopacity',
            array(
                'default' => $this->defaults['single_post_bgopacity'],
                'transport' => 'refresh',
                'sanitize_callback' => 'softcoderstheme_sanitize_integer',
            )
        );
        $wp_customize->add_control( 'single_post_bgopacity',
            array(
                'label' => esc_html__( 'Background Opacity', 'spria' ),
                'section' => 'post_single_layout_section',
                'type' => 'number',
            )
        );

    }

}

/**
 * Initialise our Customizer settings only when they're required
 */
if ( class_exists( 'WP_Customize_Control' ) ) {
	new spria_Single_Page_Layout_Settings();
}
