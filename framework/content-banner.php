<?php
/**
 * @author  SoftCoders
 * @since   1.0
 * @version 1.0
 */

namespace SoftCoders\spria;
use SoftCoders\spria\spria;
$prefix = SPRIA_THEME_PREFIX_VAR;
if ( is_404() ) {
	$spriatheme_title = spria::$options['error_page_title'];
	$spriatheme_title = $spriatheme_title . get_search_query();
}
elseif ( is_search() ) {
	$spriatheme_title = esc_html__( 'Search Results for : ', 'spria' ) . get_search_query();
}
elseif ( is_home() ) {
	if (!empty(spria::$options['blog_breadcrumb_title'])) {
		$spriatheme_title = spria::$options['blog_breadcrumb_title'];
	} elseif ( get_option( 'page_for_posts' ) ) {
		$spriatheme_title = get_the_title( get_option( 'page_for_posts' ) );
	}
	else {
		$spriatheme_title = apply_filters( "{$prefix}_blog_title", esc_html__( 'All Posts', 'spria' ) );
	}
}
elseif ( is_archive() ) {
	$cpt = SPRIA_THEME_CPT_PREFIX;
	if ( is_post_type_archive( "{$cpt}_event" ) ) {
		$spriatheme_title = esc_html__( 'All Events', 'spria' );
	}
	elseif ( is_post_type_archive( "{$cpt}_speaker" ) ) {
		$spriatheme_title = esc_html__( 'All Speaker Member', 'spria' );
	}
	else {
		$spriatheme_title = get_the_archive_title();
	}
} elseif (is_single()) {
	$spriatheme_title  = get_the_title();
} else {
	$id                        = $post->ID;
	$fitness_custom_page_title = get_post_meta( $id, 'spria_custom_page_title', true );
	if (!empty($fitness_custom_page_title)) {
		$spriatheme_title = get_post_meta( $id, 'spria_custom_page_title', true );
	} else {
		$spriatheme_title = get_the_title();                   
	}
}

if (is_singular('post')) {
	$cols = '12';
} else {
	$cols = '6';
}

?>
<div class="sc-breadcrumb-style sc-pt-135 sc-pb-110 base-theme">
	<div class="container position-relative">
		<div class="row">
			<div class="col-lg-12">
				<div class="sc-slider-content p-z-idex text-center">
    			<h1 class="slider-title white-color sc-mb-25 sc-sm-mb-15"><?php echo wp_kses( $spriatheme_title, 'alltext_allow' ); ?></h1>
				<?php if (function_exists('bcn_display')) : ?>
					<div class="sc-slider-subtitle">
						<ul>
							<?php bcn_display(); ?>
						</ul>
					</div>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Breadcrumb section end -->