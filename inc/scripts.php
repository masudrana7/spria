<?php
/**
 * @author  SoftCoders
 * @since   1.0
 * @version 1.1
 */

namespace SoftCoders\spria;
use SoftCoders\spria\spria;
use SoftCoders\spria\Helper;
use \WP_Query;
use Elementor\Plugin;

class Scripts {
	public $spria  = SPRIA_THEME_PREFIX;
	public $version = SPRIA_THEME_VERSION;
	public function __construct() {
		add_action( 'wp_enqueue_scripts', array( $this, 'register_scripts' ), 12 );
		add_action( 'elementor/frontend/after_enqueue_scripts', array( $this, 'e_anim_dequeue' ), 99999 );
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_scripts' ), 15 );		
		add_action( 'admin_enqueue_scripts', array( $this, 'admin_conditional_scripts' ), 1 );
	}

	public function fonts_url() {
		$fonts_url = '';
	    $subsets = 'Varela';
	    $bodyFont = 'Varela';
	    $bodyFW = '400';
	    $menuFont = 'Varela';
	    $menuFontW = '400';
	    $offmenuFont = 'Varela';
	    $offmenuFontW = '500';
	    $hFont = 'Space Grotesk';
	    $hFontW = '700';
	    $h1Font = '';
	    $h2Font = '';
	    $h3Font = '';
	    $h4Font = '';
	    $h5Font = '';
	    $h6Font = '';

	    // Body Font
	    $body_font  = json_decode( spria::$options['typo_body'], true );
	    if ($body_font['font'] == 'Varela') {
	    	$bodyFont = 'Varela';
	    } else {
	    	$bodyFont = $body_font['font'];
	    }
	    $bodyFontW = $body_font['regularweight'];

	    // Menu Font
	    $menu_font  = json_decode( spria::$options['typo_menu'], true );
	    if ($menu_font['font'] == 'Varela') {
		    $menuFont = 'Space Grotesk';
		} else {
	    	$menuFont = $menu_font['font'];
		}
	    $menuFontW = $menu_font['regularweight'];

	    // Heading Font Settings
	    $h_font  = json_decode( spria::$options['typo_heading'], true );
	    if ($h_font['font'] == 'Space Grotesk') {
		    $hFont = 'Space Grotesk';
		} else {
			$hFont = $h_font['font'];
		}
	    $hFontW = $h_font['regularweight'];
	    $h1_font  = json_decode( spria::$options['typo_h1'], true );
	    $h2_font  = json_decode( spria::$options['typo_h2'], true );
	    $h3_font  = json_decode( spria::$options['typo_h3'], true );
	    $h4_font  = json_decode( spria::$options['typo_h4'], true );
	    $h5_font  = json_decode( spria::$options['typo_h5'], true );
	    $h6_font  = json_decode( spria::$options['typo_h6'], true );

	    if ( 'off' !== _x( 'on', 'Google font: on or off', 'artex' ) ) {

		    if (!empty($h1_font['font'])) {
		        if ($h1_font['font'] == 'Space Grotesk') {
				    $h1Font = $hFont;
				    $h1FontW = $hFontW;
				} else {
					$h1Font = $h2_font['font'];
		        	$h1FontW = $h1_font['regularweight'];
				}
		    } if (!empty($h2_font['font'])) {
		    	if ($h2_font['font'] == 'Space Grotesk') {
				    $h2Font = $hFont;
				    $h2FontW = $hFontW;
				} else {
					$h2Font = $h2_font['font'];
		        	$h2FontW = $h2_font['regularweight'];
				}
		    } if (!empty($h3_font['font'])) {
		        if ($h3_font['font'] == 'Space Grotesk') {
				    $h3Font = $hFont;
				    $h3FontW = $hFontW;
				} else {
					$h3Font = $h3_font['font'];
		        	$h3FontW = $h3_font['regularweight'];
				}
		    } if (!empty($h4_font['font'])) {
		        if ($h4_font['font'] == 'Space Grotesk') {
				    $h4Font = $hFont;
				    $h4FontW = $hFontW;
				} else {
					$h4Font = $h4_font['font'];
		        	$h4FontW = $h4_font['regularweight'];
				}
		    } if (!empty($h5_font['font'])) {
		        if ($h5_font['font'] == 'Space Grotesk') {
				    $h5Font = $hFont;
				    $h5FontW = $hFontW;
				} else {
					$h5Font = $h5_font['font'];
		        	$h5FontW = $h5_font['regularweight'];
				}
		    } if (!empty($h6_font['font'])) {
		    	 if ($h6_font['font'] == 'Space Grotesk') {
				    $h6Font = $hFont;
				    $h6FontW = $hFontW;
				} else {
					$h6Font = $h6_font['font'];
		        	$h6FontW = $h6_font['regularweight'];
				}
		    }

		    $check_families = array();
		    $font_families = array();

			// Body Font
			if ( 'off' !== $bodyFont )
				$font_families[] = $bodyFont.':'.$bodyFW;
				$check_families[] = $bodyFont;

			// Menu Font
			if ( 'off' !== $menuFont )
				if ( !in_array( $menuFont, $check_families ) ) {
					$font_families[] = $menuFont.':'.$menuFontW;
					$check_families[] = $menuFont;
				}

			// Offcanvas Menu Font
			if ( 'off' !== $offmenuFont )
				if ( !in_array( $offmenuFont, $check_families ) ) {
					$font_families[] = $offmenuFont.':'.$offmenuFontW;
					$check_families[] = $offmenuFont;
				}

			// Heading Font
			if ( 'off' !== $hFont )
				if (!in_array( $hFont, $check_families )) {
					$font_families[] = $hFont.':'.$hFontW;
					$check_families[] = $hFont;
				}

			// Heading 1 Font
			if (!empty($h1_font['font'])) {
				if ( 'off' !== $h1Font )
					if (!in_array( $h1Font, $check_families )) {
						$font_families[] = $h1Font.':'.$h1FontW;
						$check_families[] = $h1Font;
					}
			}
			// Heading 2 Font
			if (!empty($h2_font['font'])) {
				if ( 'off' !== $h2Font )
					if (!in_array( $h2Font, $check_families )) {
						$font_families[] = $h2Font.':'.$h2FontW;
						$check_families[] = $h2Font;
					}
			}
			// Heading 3 Font
			if (!empty($h3_font['font'])) {
				if ( 'off' !== $h3Font )
					if (!in_array( $h3Font, $check_families )) {
						$font_families[] = $h3Font.':'.$h3FontW;
						$check_families[] = $h3Font;
					}
			}
			// Heading 4 Font
			if (!empty($h4_font['font'])) {
				if ( 'off' !== $h4Font )
					if (!in_array( $h4Font, $check_families )) {
						$font_families[] = $h4Font.':'.$h4FontW;
						$check_families[] = $h4Font;
					}
			}

			// Heading 5 Font
			if (!empty($h5_font['font'])) {
				if ( 'off' !== $h5Font )
					if (!in_array( $h5Font, $check_families )) {
						$font_families[] = $h5Font.':'.$h5FontW;
						$check_families[] = $h5Font;
					}
			}
			// Heading 6 Font
			if (!empty($h6_font['font'])) {
				if ( 'off' !== $h6Font )
					if (!in_array( $h6Font, $check_families )) {
						$font_families[] = $h6Font.':'.$h6FontW;
						$check_families[] = $h6Font;
					}
			}
		    $final_fonts = array_unique( $font_families );
		    $query_args = array(
		        'family' => urlencode( implode( '|', $final_fonts ) ),
		        // 'subset' => urlencode( $subsets ),
		        'display' => urlencode( 'fallback' ),
		    );
		    $fonts_url = add_query_arg( $query_args, "//fonts.googleapis.com/css" );
		}
		
    	return esc_url_raw( $fonts_url );
	}

	function e_anim_dequeue(){
		wp_deregister_style( 'e-animations' );
		wp_dequeue_style( 'e-animations' );
	}
	public function register_scripts(){
		wp_deregister_style( 'font-awesome');
		/* = CSS
		===========================================================*/
		// Bootstrap css
		wp_register_style( 'bootstrap',         Helper::get_css( 'bootstrap.min' ), array(), $this->version );
        wp_register_style( 'magnific-popup',         Helper::get_css( 'magnific-popup' ), array(), $this->version );
        wp_register_style( 'remixicon',         Helper::get_fonts_css( 'remixicon' ), array(), $this->version );
        wp_register_style( 'odometer-min',      Helper::get_css( 'odometer.min' ), array(), $this->version );
        wp_register_style( 'swiper-min',      Helper::get_css( 'swiper.min' ), array(), $this->version );
        wp_register_style( 'custom',      Helper::get_nomin_css( 'custom' ), array(), $this->version );
        wp_register_style( 'unit-style',      Helper::get_nomin_css( 'unit-style' ), array(), $this->version );
		// Main Theme Style
		wp_register_style( 'spria-style',      Helper::get_nomin_css( 'style' ), array(), $this->version );

		/* = JS 
		======================================================================*/
		// Bootstrap	
		wp_register_script( 'modernizr', Helper::get_js( 'modernizr-2.8.3.min' ), array( 'jquery' ), $this->version, true );
		wp_register_script( 'bootstrap', Helper::get_js( 'bootstrap.min' ), array( 'jquery' ), $this->version, true );
   		wp_register_script( 'imagesloaded-pkgd', Helper::get_js( 'imagesloaded.pkgd.min' ), array( 'jquery' ), $this->version, true );
		wp_register_script( 'jquery-magnific-popup', Helper::get_js( 'jquery.magnific-popup.min' ), array( 'jquery' ), $this->version, true );
		wp_register_script( 'swiper-min', Helper::get_js( 'swiper.min' ), array( 'jquery' ), $this->version, true );
        wp_register_script( 'jquery-appear', Helper::get_js( 'jquery.appear.min' ), array( 'jquery' ), $this->version, true );
		wp_register_script( 'odometer', Helper::get_js( 'odometer.min' ), array( 'jquery' ), $this->version, true );

		


		// Main js
		wp_register_script( 'spria-main', Helper::get_nomin_js( 'main' ), array( 'jquery' ), $this->version, true );
	}  

	public function enqueue_scripts() {
		/*CSS*/
		wp_enqueue_style( 'bootstrap' );

		wp_enqueue_style( 'magnific-popup' );
        wp_enqueue_style( 'remixicon' );
		wp_enqueue_style( 'odometer-min' );
		wp_enqueue_style( 'swiper-min' );
		wp_enqueue_style( 'custom' );
		wp_enqueue_style( 'unit-style' );
		$this->conditional_scripts();
		wp_enqueue_style( 'spria-style' );
		$this->dynamic_style();

		/*JS*/
		wp_enqueue_script( 'modernizr' );
		wp_enqueue_script( 'bootstrap' );
		wp_enqueue_script( 'imagesloaded.pkgd' );
		wp_enqueue_script( 'isotope' );
		wp_enqueue_script( 'jquery-magnific-popup' );
		wp_enqueue_script( 'jquery-appear' );
		wp_enqueue_script( 'odometer' );
		
		wp_enqueue_script( 'waypoints-min' );
		wp_enqueue_script( 'waypoints-sticky');
		wp_enqueue_script( 'swiper-min' );
		$this->localized_scripts();
		wp_enqueue_script( 'spria-main' );
		$this->elementor_scripts();
	}

	public function elementor_scripts() {
		if ( !did_action( 'elementor/loaded' ) ) {
			return;
		}
		if ( Plugin::$instance->preview->is_preview_mode() ) {
			// Swiper
			wp_enqueue_style( 'iconify' );
			wp_enqueue_script( 'jquery-asPieProgress' );
			wp_enqueue_script( 'carousel' );	
			// CountDown
			wp_enqueue_script( 'popper' );
		}
	}

	private function conditional_scripts(){
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
		if (is_single() || is_home()) {
			wp_enqueue_script( 'theia-sticky-sidebar' );
		}
	}
	
	public function admin_conditional_scripts(){
		wp_enqueue_style( 'spria-gfonts', $this->fonts_url(), array(), $this->version );
		wp_enqueue_script( 'jquery-ui-tabs' );
		wp_enqueue_style( 'wp-color-picker' );
	}

	private function localized_scripts(){
		// Localization
		$adminajax 	   = esc_url( admin_url('admin-ajax.php') );
		$localize_data = array(
			'ajaxurl'	  => $adminajax,
			'hasAdminBar' => is_admin_bar_showing() ? 1 : 0,
			'headerStyle' => spria::$header_style,
			// CounDown
			'day'	         => esc_html__('Day' , 'spria'),
			'hour'	         => esc_html__('Hour' , 'spria'),
			'minute'         => esc_html__('Minute' , 'spria'),
			'second'         => esc_html__('Second' , 'spria'),
			'close_text'     => esc_html__('close' , 'spria'),
			// Ajax
			'ajaxURL' => admin_url('admin-ajax.php'),
			'nonce' => wp_create_nonce( 'spria-nonce' ),
			'cart_usc_post_date_pbm' => esc_html__('Cart Usc_post_date Problem.', 'spria'),
			
		);
		wp_localize_script( $this->spria . '-main', 'spriaObj', $localize_data );
	}

	private function dynamic_style(){
		$dynamic_css  = $this->template_style();
		ob_start();
		Helper::requires( 'dynamic-style.php' );
		$dynamic_css .= ob_get_clean();
		$dynamic_css  = $this->minified_css( $dynamic_css );
		wp_register_style( $this->spria . '-dynamic', false );
		wp_enqueue_style( $this->spria . '-dynamic' );
		wp_add_inline_style( $this->spria . '-dynamic', $dynamic_css );
	}

	private function minified_css( $css ) {
		/* remove comments */
		$css = preg_replace( '!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $css );
		/* remove tabs, spaces, newlines, etc. */
		$css = str_replace( array( "\r\n", "\r", "\n", "\t", '  ', '    ', '    ' ), ' ', $css );
		return $css;
	}

	private function template_style(){
		$style = '';
		if ( is_single() ) {
			if ( !empty(spria::$bgimg ) ) {
				$opacity = spria::$opacity/100;
				$style .= '.single .breadcrumbs-banner { background-image: url(' . spria::$bgimg . ')}';
				$style .= '.single .breadcrumbs-banner:before { background-color: ' . spria::$bgcolor . '}';
				$style .= '.single .breadcrumbs-banner:before { opacity: ' . $opacity . '}';
			}
			else {
				$opacity = spria::$opacity/100;
				$style .= '.single .breadcrumbs-banner:before { background-color: ' . spria::$bgcolor . '}';
				$style .= '.breadcrumbs-banner:before { opacity: ' . $opacity . '}';
			}
		} else {
			if ( !empty( spria::$bgimg ) ) {
				$opacity = spria::$opacity/100;
				$style .= '.breadcrumbs-banner { background-image: url(' . spria::$bgimg . ')}';
				$style .= '.breadcrumbs-banner:before { background-color: ' . spria::$bgcolor . '}';
				$style .= '.breadcrumbs-banner:before { opacity: ' . $opacity . '}';
			}
			else {
				$opacity = spria::$opacity/100;
				$style .= '.breadcrumbs-banner:before { background-color: ' . spria::$bgcolor . '}';
				$style .= '.breadcrumbs-banner:before { opacity: ' . $opacity . '}';
			}
		}

		if ( spria::$padding_top) {
			$style .= '.breadcrumbs-banner { padding-top:'. spria::$padding_top . 'px;}';
		}
		if ( spria::$padding_bottom) {
			$style .= '.breadcrumbs-banner { padding-bottom:'. spria::$padding_bottom . 'px;}';
		}

		/* = Footer 1
        =======================================================*/
		if ( spria::$options['footer1_bg_img']) {
			$f1_bg = wp_get_attachment_image_src( spria::$options['footer1_bg_img'], 'full', true );
			$style .= '.footer1.footer-top { background-image: url(' . $f1_bg[0] . ')}';
		}		
		return $style;
	}	
}
new Scripts;