<?php
/**
 * @author  SoftCoders
 * @since   1.0
 * @version 1.0
 */

namespace SoftCoders\spria;
use SoftCoders\spria\spria;
use SoftCoders\spria\Helper;

class General_Setup {

	public function __construct() {
		add_action( 'after_setup_theme',                       array( $this, 'theme_setup' ) );	
		add_action( 'widgets_init',                            array( $this, 'register_sidebars' ), 0 );		
		add_filter( 'body_class',                              array( $this, 'body_classes' ) );
		add_filter( 'post_class',                              array( $this, 'post_classes' ) );
		add_filter( 'wp_list_categories',                      array( $this, 'spria_cat_count_span' ) );
		add_filter( 'get_archives_link',                       array( $this, 'spria_archive_cat_count_span' ) );
		add_action( 'wp_head',                                 array( $this, 'noscript_hide_preloader' ), 1 );
		add_filter( 'get_search_form',                         array( $this, 'search_form' ) );
		add_filter( 'comment_form_fields',                     array( $this, 'move_textarea_to_bottom' ) );
		add_filter( 'excerpt_more',                            array( $this, 'excerpt_more' ) );		
		add_filter( 'elementor/widgets/wordpress/widget_args', array( $this, 'elementor_widget_args' ) );
		add_action( 'wp_head',                                 array( $this, 'spria_pingback_header' ), 996 );
		add_action( 'site_prealoader',                         array( $this, 'spria_preloader' ) );
		add_action( 'wp_kses_allowed_html',                    array( $this, 'spria_kses_allowed_html' ), 10, 2 );
		add_action( 'template_redirect',                       array( $this, 'w3c_validator' ) );
		add_action( 'wp_ajax_load_more_ports', 				   array($this, 'rdt_load_more_func' ));
		add_action( 'wp_ajax_nopriv_load_more_ports', 		   array($this, 'rdt_load_more_func' ));
	}


	/**
	* Add a pingback url auto-discovery header for single posts, pages, or attachments.
	*/
	public function spria_pingback_header() {
		if ( is_singular() && pings_open() ) {
			printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
		}
	}

	public function theme_setup() {
		$prefix = SPRIA_THEME_PREFIX;		

		// Theme supports
		add_theme_support( 'woocommerce' );
		add_theme_support( 'title-tag' );
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'wp-block' );
		add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption' ) );
		add_editor_style();
		add_theme_support( 'admin-bar', array( 'callback' => '__return_false' ) );
		// For gutenberg
		remove_theme_support( 'widgets-block-editor' );
		add_theme_support( 'align-wide' );
		add_theme_support( 'editor-color-palette', array(
			array(
				'name'  => esc_html__( 'Primary', 'spria' ),
				'slug'  => 'spria-primary',
				'color' => '#00ffa3',
			),
			array(
				'name'  => esc_html__('Secondary', 'spria' ),
				'slug'  => 'spria-secondary',
				'color' => '#5865F2',
			),
			array(
				'name'  => esc_html__('Light', 'spria' ),
				'slug'  => 'spria-light',
				'color' => '#ffffff',
			),
			array(
				'name'  => esc_html__('Black', 'spria' ),
				'slug'  => 'spria-black',
				'color'  => '#000000',
			),
			array(
				'name'  => esc_html__('Dark', 'spria' ),
				'slug'  => 'spria-dark',
				'color'  => '#5a5a5a',
			),
			
		) );
		add_theme_support( 'editor-font-sizes', array(
			array(
				'name' => esc_html__('Small', 'spria' ),
				'size'  => 12,
				'slug'  => 'small'
			),
			array(
				'name'  => esc_html__('Normal', 'spria' ),
				'size'  => 16,
				'slug'  => 'normal'
			),
			array(
				'name'  => esc_html__('Medium', 'spria' ),
				'size'  => 18,
				'slug'  => 'medium'
			),
			array(
				'name'  => esc_html__('Large', 'spria' ),
				'size'  => 32,
				'slug'  => 'large'
			),
			array(
				'name'  => esc_html__('Huge', 'spria' ),
				'size'  => 48,
				'slug'  => 'huge'
			)
		) );

		add_theme_support( 'wp-block-styles' );
		add_theme_support( 'responsive-embeds' );
		add_theme_support( 'editor-styles');		
	
		// Image sizes
		add_image_size( 'spria_medium', 700, 600, true ); //Default medium size overrite
		add_image_size( 'spria_medium2', 450, 540, true ); //Medium size 2
		add_image_size( 'spria_small', 90, 90, true ); //Medium size 2

		// Register menus
		register_nav_menus( array(
			'primary'  => esc_html__( 'Primary', 'spria' ),
			'onepage'  => esc_html__( 'One Page Menu', 'spria' ),
			'footer'  => esc_html__( 'Footer', 'spria' ),
			'copyright_menu'  => esc_html__( 'Copy Right Menu', 'spria' ),
		) );

		// Custom Logo
		add_theme_support( 'custom-logo', array(
			'height'      => 65,
			'width'       => 245,
			'flex-height' => true,
			'header-text' => array( 'site-title', 'site-description' ),
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support('custom-background', apply_filters('spria_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		)));
	}

	public function register_sidebars() {
		$footer_widget_titles1 = array(
			'1' => esc_html__( 'Footer (Style 1) 1', 'spria' ),
			'2' => esc_html__( 'Footer (Style 1) 2', 'spria' ),
			'3' => esc_html__( 'Footer (Style 1) 3', 'spria' ),
			'4' => esc_html__( 'Footer (Style 1) 4', 'spria' ),
		);	
		$footer_widget_titles2 = array(
			'1' => esc_html__( 'Footer (Style 2) 1', 'spria' ),
			'2' => esc_html__( 'Footer (Style 2) 2', 'spria' ),
			'3' => esc_html__( 'Footer (Style 2) 3', 'spria' ),
			'4' => esc_html__( 'Footer (Style 2) 4', 'spria' ),
		);
		$footer_widget_titles3 = array(
			'1' => esc_html__( 'Footer (Style 3) 1', 'spria' ),
			'2' => esc_html__( 'Footer (Style 3) 2', 'spria' ),
			'3' => esc_html__( 'Footer (Style 3) 3', 'spria' ),
			'4' => esc_html__( 'Footer (Style 3) 4', 'spria' ),
		); 	
		$widgets_items1 = spria::$options['footer1_widgets_items']; 
		$widgets_items2 = spria::$options['footer2_widgets_items']; 
		$widgets_items3 = spria::$options['footer3_widgets_items']; 

		register_sidebar( array(
			'name'          => esc_html__( 'Sidebar Widgets', 'spria' ),
			'id'            => 'sidebar',
			'description'   => esc_html__('Sidebar widgets area', 'spria'),
			'before_widget' => '<div id="%1$s" class="widget %2$s sidebar-widget sc-mb-30">',
			'after_widget'  => '</div>',
			'before_title'  => '<div class="categories-item sc-mb-25"><h3 class="title">',
			'after_title'   => '</h3></div>',
		) );

		for ( $i = 1; $i <= $widgets_items1; $i++ ) {
			register_sidebar( array(
				'name'          => $footer_widget_titles1[$i],
				'id'            => 'footer-widget-1-'. $i,
				'before_widget' => '<div id="%1$s" class="widget footer-widgets'. spria::$footer_style .' %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<h3 class="widget-title">',
				'after_title'   => '</h3>',
			) );
		}
		if( class_exists( 'spria_Core' ) ){
			for ( $i = 1; $i <= $widgets_items2; $i++ ) {
				register_sidebar( array(
					'name'          => $footer_widget_titles2[$i],
					'id'            => 'footer-widget-2-'. $i,
					'before_widget' => '<div id="%1$s" class="widget footer-widgets'. spria::$footer_style .' %2$s">',
					'after_widget'  => '</div>',
					'before_title'  => '<h3 class="widget-title">',
					'after_title'   => '</h3>',
				) );
			}
			for ( $i = 1; $i <= $widgets_items3; $i++ ) {
				register_sidebar( array(
					'name'          => $footer_widget_titles3[$i],
					'id'            => 'footer-widget-3-'. $i,
					'before_widget' => '<div id="%1$s" class="widget footer-widgets'. spria::$footer_style .' %2$s">',
					'after_widget'  => '</div>',
					'before_title'  => '<h3 class="widget-title">',
					'after_title'   => '</h3>',
				) );
			}
		}
	}


	public function body_classes( $classes ) {
		$classes[] = 'mobile-menu-wrapper';
		if ( spria::$options['sticky_header'] == 1 ) {
			$classes[] = 'sticky-header';
		}
		$classes[] = 'header-style-'. spria::$header_style;
        // Sidebar
		$classes[] = ( spria::$layout == 'full-width' ) ? 'no-sidebar' : 'has-sidebar';
		if ( is_page_template( 'templates/box-layout.php' ) ) { 
			$classes[] = 'full-page-background';
		}
		if ( spria::$tr_header === 1 || spria::$tr_header === 'on' ) {
			$classes[] = 'transparent-header';
		} else {
			$classes[] = 'non-transparent-header';
		}

		return $classes;
	}

	public function post_classes( $classes ) {
		$post_thumb = '';
		if ( has_post_thumbnail() ){
			$classes[] = 'have-post-thumb';
		}
		return $classes;
	}

    /*----------------------------------------------------------------------------------------*/
    /* Categories/Archive List count wrap by span
    /*----------------------------------------------------------------------------------------*/
    public function spria_cat_count_span($links) {        
        $links = str_replace('(', '<span class="float-right">(', $links);
        $links = str_replace(')', ')</span>', $links);
        return $links;
    }

    public function spria_archive_cat_count_span($links) {        
        $links = str_replace('(', '<span class="float-right">(', $links);
        $links = str_replace(')', ')</span>', $links);
        return $links;
    }

	public function noscript_hide_preloader(){
		// Hide preloader if js is disabled
		echo '<noscript><style>#preloader{display:none;}</style></noscript>';
	}

	public function scroll_to_top_html(){
		// Back-to-top link
		if ( spria::$options['page_scrolltop'] == '1' ){
		echo '<a href="#wrapper" data-type="section-switch" class="scrollup back-top">
			<i class="far fa-hand-point-up"></i>
		</a>';
		}
	}
	public function search_form(){
		// $output = '
		// <form role="search" method="get"  action="' . esc_url( home_url( '/' ) ) . '">
		// <div class="sc-searchbar-area sc-mb-30 p-z-idex d-flex align-items-center justify-content-end">
		// 	<div class="input-field">
		// 		<input type="search" placeholder="' . esc_attr__( 'Search here ...', 'spria' ) . '" value="' . get_search_query() . '" name="s" />
		// 	</div>
		// 	<div class="sc-submit sc-primary-btn">
		// 		<i class="icon-search"></i>
		// 		<input type="submit" id="submitOne" value="Subscribe Now">
		// 	</div>
		// </div></form>';

        $output = '

        <div class="cate_form sc-mb-35">
            <h3 class="title sc-mb-23">'. esc_html__("Search","spria") .'</h3>
            <form role="search" method="get" class="catergories-form" action="' . esc_url( home_url( '/' ) ) . '">
                <input type="text" placeholder="'. esc_attr__( "Search", "spria" ).'" name="search" value="' . get_search_query() . '" name="s" />
                <button type="submit" value="submit"><i class="ri-search-line"></i></button>
            </form>
        </div>

        ';

		return $output;
	}

	public function move_textarea_to_bottom( $fields ) {
		$temp = $fields['comment'];
		unset( $fields['comment'] );
		$fields['comment'] = $temp;
		return $fields;
	}

	public function excerpt_more() {
		return esc_html__( '...', 'spria' ) ;
	}
	
	public function elementor_widget_args( $args ) {
		$args['before_widget'] = '<div class="widget single-sidebar padding-bottom1">';
		$args['after_widget']  = '</div>';
		$args['before_title']  = '<h3>';
		$args['after_title']   = '</h3>';
		return $args;
	}
	
	
	public function spria_preloader() { ?>
		<div id="preloader" class="preloader">
		<div class="animation-preloader">
			<div class="spinner">
				<div class="loader-icon">
					<img src="/assets/images/fav.png" alt="spria" />
				</div>
			</div>
			<div class="txt-loading">
				<span data-text-preloader="B" class="letters-loading"> <?php echo esc_html__("B","spria");?> </span>
				<span data-text-preloader="O" class="letters-loading"> <?php echo esc_html__("O","spria");?> </span>
				<span data-text-preloader="X" class="letters-loading"> <?php echo esc_html__("X","spria");?> </span>
				<span data-text-preloader="F" class="letters-loading"> <?php echo esc_html__("F","spria");?> </span>
				<span data-text-preloader="I" class="letters-loading"> <?php echo esc_html__("I","spria");?> </span>
				<span data-text-preloader="N" class="letters-loading"> <?php echo esc_html__("N","spria");?> </span>
			</div>
		</div>
	</div>
	        <!--Preloader area End here-->
	<?php }

	public function spria_kses_allowed_html($tags, $context) {
		switch($context) {
			case 'social':
			$tags = array(
				'a' => array('href' => array()),
				'b' => array()
			);
			return $tags;
			case 'alltext_allow':
			$tags = array(
				'a' => array(
					'class' => array(),
					'href'  => array(),
					'rel'   => array(),
					'title' => array(),
					'target' => array(),
				),
				'abbr' => array(
					'title' => array(),
				),
				'b' => array(),
				'br' => array(),
				'blockquote' => array(
					'cite'  => array(),
				),
				'cite' => array(
					'title' => array(),
				),
				'code' => array(),
				'del' => array(
					'datetime' => array(),
					'title' => array(),
				),
				'dd' => array(),
				'div' => array(
					'class' => array(),
					'title' => array(),
					'style' => array(),
					'id' => array(),
				),
				'dl' => array(),
				'dt' => array(),
				'em' => array(),
				'h1' => array(),
				'h2' => array(),
				'h3' => array(),
				'h4' => array(),
				'h5' => array(),
				'h6' => array(),
				'i' => array(),
				'img' => array(
					'alt'    => array(),
					'class'  => array(),
					'height' => array(),
					'src'    => array(),
					'srcset' => array(),
					'width'  => array(),
				),
				'li' => array(
					'class' => array(),
				),
				'ol' => array(
					'class' => array(),
				),
				'p' => array(
					'class' => array(),
				),
				'q' => array(
					'cite' => array(),
					'title' => array(),
				),
				'span' => array(
					'class' => array(),
					'title' => array(),
					'style' => array(),
				),
				'strike' => array(),
				'strong' => array(),
				'ul' => array(
					'class' => array(),
				),
			);
			return $tags;
			default:
			return $tags;
		}
	}

	/* - spria Post and taxonomy slug change
	--------------------------------------------------------*/
	public function usc_post_date_spria_custom_post_slug( $args, $post_type ) {
		$prefix = SPRIA_THEME_PREFIX;
		$theme = wp_get_theme(); // gets the current theme
		if ( 'spria' == $theme->name || 'spria' == $theme->parent_theme ) {
			$portfolio_slug = spria::$options['single_portfolio_slug'];
			$event_slug = spria::$options['single_event_slug'];
			$team_slug = spria::$options['single_speaker_slug'];
		    if ( $prefix.'_portfolio' === $post_type ) {
		        $portfolio = array(
		            'rewrite' => array( 'slug' => $portfolio_slug, 'with_front' => false )
		        );
		        return array_merge( $args, $portfolio );
		    }
		    if ( $prefix.'_event' === $post_type ) {
		        $event = array(
		            'rewrite' => array( 'slug' => $event_slug, 'with_front' => false )
		        );
		        return array_merge( $args, $event );
		    }
		    if ( $prefix.'_team' === $post_type ) {
		        $team = array(
		            'rewrite' => array( 'slug' => $team_slug, 'with_front' => false )
		        );
		        return array_merge( $args, $team );
		    }
		}
		return $args;
	}

	public function spria_change_taxonomies_slug( $args, $taxonomy ) {
		$prefix = SPRIA_THEME_PREFIX;
		$portfolio_cat_slug = spria::$options['portfolio_cat_slug'];
		$event_cat_slug = spria::$options['event_cat_slug'];
	    /*item and event pro locations*/
	    if ( $prefix.'_portfolio_category' === $taxonomy ) {
	    	$args['rewrite']['slug'] = $portfolio_cat_slug;
	    }
	    if ( $prefix.'_event_category' === $taxonomy ) {
	    	$args['rewrite']['slug'] = $event_cat_slug;
	    }
		return $args;
	}


	/* - Ajax Callback Function
	--------------------------------------------------------*/
	public function rdt_load_more_func() {

		$posts_no = spria::$options['portfolio_archive_number'];
	    $page = (isset($_GET['pageNumber'])) ? $_GET['pageNumber'] : 0;

		query_posts(array(
			'post_type' => 'spria_portfolio',
			'posts_per_page' => $posts_no,
			'post_status'   => 'publish',
			'paged'          => $page,
			'post__not_in' => get_option( 'sticky_posts')
		)); 

	    if(have_posts()) : while(have_posts()) : the_post();

	    $cols = spria::$options['portfolio_grid_cols'];
	    $location = get_post_meta( get_the_ID(), "spria_portfolio_location", true );

	    ?>

		<div class="col-lg-<?php echo esc_attr( $cols ); ?> col-md-6 col-12 gallery-item masonry-item single-grid-item">
	        <div class="project-layout2">
	        	<div class="item-figure">
		            <?php the_post_thumbnail( 'spria-size-2' ); ?>
		            <div class="item-icon">
		            	<a href="<?php echo esc_url( get_the_post_thumbnail_url() ); ?>" class="popup-zoom" data-fancybox-group="gallery" title="<?php echo esc_attr( get_the_title() ); ?>">
			                <span class="line1"></span>
			                <span class="line2"></span>
		             	</a>
		            </div>
	          	</div>
	        	<div class="item-content">                  
		            <h3 class="item-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
		            <div class="item-sub-title"><?php echo esc_html( $location ); ?></div>
	        	</div>
	        </div>
	    </div>

	    <?php endwhile;endif;
	      wp_reset_query();
	      die();
	} // End of ajax callback function

	public function w3c_validator() {
		/*----------------------------------------------------------------------------------------------------*/
		/*  W3C validator passing code
		/*----------------------------------------------------------------------------------------------------*/
	    ob_start( function( $buffer ){
	        $buffer = str_replace( array( '<script type="text/javascript">', "<script type='text/javascript'>" ), '<script>', $buffer );
	        return $buffer;
	    });
	    ob_start( function( $buffer2 ){
	        $buffer2 = str_replace( array( "<script type='text/javascript' src" ), '<script src', $buffer2 );
	        return $buffer2;
	    });
	    ob_start( function( $buffer3 ){
	        $buffer3 = str_replace( array( 'type="text/css"', "type='text/css'", 'type="text/css"', ), '', $buffer3 );
	        return $buffer3;
	    });
	    ob_start( function( $buffer4 ){
	        $buffer4 = str_replace( array( '<iframe frameborder="0" scrolling="no" marginheight="0" marginwidth="0"', ), '<iframe', $buffer4 );
	        return $buffer4;
	    });
		ob_start( function( $buffer5 ){
	        $buffer5 = str_replace( array( 'aria-required="true"', ), '', $buffer5 );
	        return $buffer5;
	    });
	}
}
new General_Setup;
