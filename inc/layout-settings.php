<?php
/**
 * @author  SoftCoders
 * @since   1.0
 * @version 1.0
 */

namespace SoftCoders\spria;
use SoftCoders\spria\spria;
use SoftCoders\spria\Helper;
class Layouts {

	public function __construct() {
		add_action( 'template_redirect', array( $this, 'layout_settings' ) );
	}
	public function layout_settings() {

		// Single Pages
        if( is_single() || is_page() ) {
            $post_type = get_post_type();
            $post_id   = get_the_id();
            switch( $post_type ) {
                case 'page':
                $prefix = 'page';
                break;	  		  
                case 'spria_team':
                $prefix = 'team';
                break;  
                default:
                $prefix = 'single_post';
                break;
            }
			
			$layout_settings = get_post_meta( $post_id, 'spria_layout_settings', true );

            spria::$layout = ( empty( $layout_settings['spria_layout'] ) || $layout_settings['spria_layout']  == 'default' ) ? spria::$options[$prefix . '_layout'] : $layout_settings['spria_layout'];
			
			spria::$header_area = ( empty( $layout_settings['spria_header_area'] ) || $layout_settings['spria_header_area'] == 'default' ) ? spria::$options['header_area'] : $layout_settings['spria_header_area'];
            
            spria::$header_style = ( empty( $layout_settings['spria_header'] ) || $layout_settings['spria_header'] == 'default' ) ? spria::$options['header_style'] : $layout_settings['spria_header'];

            spria::$tr_header = ( empty( $layout_settings['spria_tr_header'] ) || $layout_settings['spria_tr_header'] == 'default' ) ? spria::$options['tr_header'] : $layout_settings['spria_tr_header'];

            spria::$footer_area = ( empty( $layout_settings['spria_footer_area'] ) || $layout_settings['spria_footer_area'] == 'default' ) ? spria::$options['footer_area'] : $layout_settings['spria_footer_area'];
			
            spria::$footer_style = ( empty( $layout_settings['spria_footer'] ) || $layout_settings['spria_footer'] == 'default' ) ? spria::$options['footer_style'] : $layout_settings['spria_footer'];

            spria::$has_banner = ( empty( $layout_settings['spria_banner'] ) || $layout_settings['spria_banner'] == 'default' ) ? spria::$options[$prefix . '_banner'] : $layout_settings['spria_banner'];
            
            spria::$has_breadcrumb = ( empty( $layout_settings['spria_breadcrumb'] ) || $layout_settings['spria_breadcrumb'] == 'default' ) ? spria::$options[ $prefix . '_breadcrumb'] : $layout_settings['spria_breadcrumb'];
            
            spria::$bgcolor = empty( $layout_settings['spria_banner_bgcolor'] ) ? spria::$options[$prefix . '_bgcolor'] : $layout_settings['spria_banner_bgcolor'];

            spria::$opacity = empty( $layout_settings['spria_banner_bgopacity'] ) ? spria::$options[$prefix . '_bgopacity'] : $layout_settings['spria_banner_bgopacity'];
			

			if( !empty( $layout_settings['spria_banner_bgimg'] ) ) {
                $attch_url      = wp_get_attachment_image_src( $layout_settings['spria_banner_bgimg'], 'full', true );
                spria::$bgimg = $attch_url[0];
            } elseif( !empty( spria::$options[$prefix . '_bgimg'] ) ) {
                $attch_url      = wp_get_attachment_image_src( spria::$options[$prefix . '_bgimg'], 'full', true );
                spria::$bgimg = $attch_url[0];
            } else {
                spria::$bgimg = '';
            }

            $padding_top = ( empty( $layout_settings['spria_top_padding'] ) || $layout_settings['spria_top_padding'] == 'default' ) ? spria::$options[$prefix . '_padding_top'] : $layout_settings['spria_top_padding'];
            
            spria::$padding_top = (int) $padding_top;

            
            $padding_bottom = ( empty( $layout_settings['spria_bottom_padding'] ) || $layout_settings['spria_bottom_padding'] == 'default' ) ? spria::$options[$prefix . '_padding_bottom'] : $layout_settings['spria_bottom_padding'];
            
            spria::$padding_bottom = (int) $padding_bottom;
        }
        
        // Blog and Archive
        elseif( is_home() || is_archive() || is_search() || is_404() ) {
            if( is_search() ) {
                $prefix = 'search';
            } else if( is_404() ) {
                $prefix                                = 'error';
                spria::$options[$prefix . '_layout'] = 'full-width';
			} elseif( is_post_type_archive( "spria_team" ) || is_tax( "spria_team_category" ) ) {
                $prefix = 'team_archive'; 
			} else {
                $prefix = 'blog';
            }
            
            spria::$layout         = spria::$options[$prefix . '_layout'];
            spria::$tr_header      = spria::$options['tr_header'];
            spria::$header_area    = spria::$options['header_area'];
            spria::$header_style   = spria::$options['header_style'];
            spria::$footer_area    = spria::$options['footer_area'];
            spria::$footer_style   = spria::$options['footer_style'];
            spria::$has_banner     = spria::$options[$prefix . '_banner'];
            spria::$has_breadcrumb = spria::$options[$prefix . '_breadcrumb'];
            spria::$bgcolor        = spria::$options[$prefix . '_bgcolor'];
            spria::$opacity        = spria::$options[$prefix . '_bgopacity'];
            spria::$padding_top    = spria::$options[$prefix . '_padding_top'];
            spria::$padding_bottom = spria::$options[$prefix . '_padding_bottom'];
			
            if( !empty( spria::$options[$prefix . '_bgimg'] ) ) {
                $attch_url      = wp_get_attachment_image_src( spria::$options[$prefix . '_bgimg'], 'full', true );
                spria::$bgimg = $attch_url[0];
            } else {
                spria::$bgimg = '';
            }
        }
	}
}
new Layouts;
