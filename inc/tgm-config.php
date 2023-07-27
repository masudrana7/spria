<?php
/**
 * @author  SoftCoders
 * @since   1.0
 * @version 1.0
 */
namespace SoftCoders\spria;
class TGM_Config {
	
	public $spria = SPRIA_THEME_PREFIX;
	public $path   = SPRIA_THEME_PLUGINS_DIR;
	public function __construct() {
		add_action( 'tgmpa_register', array( $this, 'register_required_plugins' ) );
	}
	public function register_required_plugins(){
		$plugins = array(
			// Bundled
			array(
				'name'         => esc_html__('Softcoders Elemens Builder','spria'),
				'slug'         => 'softcoders-elemens-builder',
				'source'       => SPRIA_THEME_PLUGINS_DIR.'softcoders-elemens-builder.zip',
				'required'     =>  true,
				'version'      => '1.0'
			),
			// Repository
			array(
				'name'     => esc_html__('Elementor Page Builder','spria'),
				'slug'     => 'elementor',
				'required' => true,
			),
			array(
				'name'     => esc_html__('Breadcrumb NavXT','spria'),
				'slug'     => 'breadcrumb-navxt',
				'required' => true,
			),
			array(
				'name'     => esc_html__('Contact Form 7','spria'),
				'slug'     => 'contact-form-7',
				'required' => true,
			),
			array(
				'name'     => esc_html__('One Click Demo Import','spria'),
				'slug'     => 'one-click-demo-import',
				'required' => true,
			),
			array(
				'name'     => esc_html__('Widget Importer Exporter','spria'),
				'slug'     => 'widget-importer-exporter',
				'required' => true,
			),
		);

		$config = array(
			'id'           => $this->spria,            
			'menu'         => $this->spria . '-install-plugins', 
			'has_notices'  => true,                   
			'dismissable'  => true,                   
			'dismiss_msg'  => '',                    
			'is_automatic' => false,                   
			'message'      => '',                     
		);

		tgmpa( $plugins, $config );
	}
}
new TGM_Config;