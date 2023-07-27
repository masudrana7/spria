<?php
/**
 * @author  SoftCoders
 * @since   1.0
 * @version 1.0
 */

namespace SoftCoders\spria;

define( __NAMESPACE__ . '\NS',    __NAMESPACE__ . '\\' );

$theme_data = wp_get_theme( get_template() );
define( 'SPRIA_THEME_VERSION',     ( WP_DEBUG ) ? time() : $theme_data->get( 'Version' ) );
define( 'SPRIA_THEME_AUTHOR_URI',  $theme_data->get( 'AuthorURI' ) );
define( 'SPRIA_THEME_PREFIX',      'spria' );
define( 'SPRIA_THEME_PREFIX_VAR',  'spria' );
define( 'spria_WIDGET_PREFIX',     'spria' );
define( 'SPRIA_THEME_CPT_PREFIX',  'spria' );
define( 'ALLOW_UNFILTERED_UPLOADS', true );

// DIR
define( 'SPRIA_THEME_BASE_URL',    get_template_directory_uri(). '/' );
define( 'SPRIA_THEME_BASE_DIR',    get_template_directory(). '/' );
define( 'SPRIA_THEME_INC_DIR',     SPRIA_THEME_BASE_DIR . 'inc/' );
define( 'SPRIA_THEME_VIEW_DIR',    SPRIA_THEME_INC_DIR . 'views/' );
define( 'SPRIA_THEME_PLUGINS_DIR', SPRIA_THEME_BASE_DIR . 'inc/plugins/' );