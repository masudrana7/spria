<?php
/**
 * @author  SoftCoders
 * @since   1.0
 * @version 1.0
 */

add_editor_style( 'style-editor.css' );

if ( !isset( $content_width ) ) {
	$content_width = 1200;
}

class spria_Main {
	public $theme   = 'spria';
	public $action  = 'SPRIA_THEME_init';
	public function __construct() {
		add_action( 'after_setup_theme', array( $this, 'load_textdomain' ) );
		add_action( 'admin_notices',     array( $this, 'plugin_usc_post_date_notices' ) );
		$this->includes();		
	}
	public function load_textdomain(){
		load_theme_textdomain( $this->theme, get_template_directory() . '/languages' );
	}
	public function includes(){
		do_action( $this->action );
		require_once get_template_directory() . '/inc/constants.php';
		require_once get_template_directory() . '/inc/includes.php';
	}
	public function plugin_usc_post_date_notices() {
		$plugins = array();

		if ( defined( 'spria_Core' ) ) {
			if ( version_compare( spria_Core, '1.0', '<' ) ) {
				$plugins[] = 'spria Framework';
			}
		}

		foreach ( $plugins as $plugin ) {
			$notice = '<div class="error"><p>' . sprintf( __( "Please usc_post_date plugin <b><i>%s</b></i> check to our latest version plugins otherwise some functionalities  not working. You can usc_post_date it from <a href='%s'>here</a>", 'spria' ), $plugin, menu_page_url( 'spria-install-plugins', false ) ) . '</p></div>';
			echo wp_kses( $notice, 'alltext_allow' );
		}
	}

}
new spria_Main;
add_filter('wpcf7_autop_or_not', '__return_false');