<?php
/**
 * @author  SoftCoders
 * @since   1.0
 * @version 1.0
 */
namespace SoftCoders\spria;
use SoftCoders\spria\spria;
use SoftCoders\spria\Helper;
?>
<?php get_header(); ?>
<?php 
$prefix = SPRIA_THEME_CPT_PREFIX;
$post_types = ['portfolio', 'service'];

foreach ($post_types as $post_type) {
	if ( is_post_type_archive( "{$prefix}_{$post_type}" ) || is_tax( "{$prefix}_{$post_type}_category" ) || is_tax( "{$prefix}_{$post_type}_tag" ) ) {
		get_template_part( "framework/archive-{$post_type}/archive", $post_type );
		return;
	}
}

$blog_layout = spria::$options['blog_layout'];
$blog_style = 1;
$blog_grid = spria::$options['blog_grid'];

?>
<section class="sc-blog-pages-area sc-pt-140 sc-md-pt-80 sc-pb-20 sc-md-pb-20 spria-custom-blog">
  <div class="container">
  	<div class="row">
    	<div id="primary" class="<?php Helper::the_layout_class(); ?>">
    		<?php if ( have_posts() ) : ?>
			<?php
				if ( ( is_home() || is_archive() ) ) {
					if ( $blog_layout != 1 ) {
						echo '<div class="row">';
						while ( have_posts() ) : the_post();
							echo '<div class="col-lg-'. esc_attr( $blog_grid ) .' col-md-6">';
							get_template_part( 'framework/archive-blog/content',  $blog_style ); 
							echo '</div>';
						endwhile;
						echo '</div>';
					} else {
						echo '<div class="post-list-items">';
						while ( have_posts() ) : the_post();
							echo '<div class="post-list-item">';
							get_template_part( 'framework/archive-blog/content',  $blog_style ); 
							echo '</div>';
						endwhile;
						echo '</div>';
					}
					Helper::pagination();
				}
				else {
					while ( have_posts() ) : the_post();
						get_template_part( 'framework/content' );
					endwhile;
				}
			?>
			<?php else: ?>
				<?php get_template_part( 'framework/content', 'none' ); ?>
			<?php endif; ?>
			<?php wp_reset_postdata(); ?>
        </div>
        <?php Helper::spria_sidebar(); ?>
  	</div>
  </div>
</section>
<?php get_footer(); ?>