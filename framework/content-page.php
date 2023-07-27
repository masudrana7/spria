<?php
/**
 * @author  SoftCoders
 * @since   1.0
 * @version 1.0
 */

namespace SoftCoders\spria;
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php if ( has_post_thumbnail() ): ?>
		<div class="page-thumbnail"><?php the_post_thumbnail( 'spriatheme-size1' );?></div>
	<?php endif; ?>

	<div class="entry-content">
		<?php the_content(); ?>
	</div>
	<?php wp_link_pages( array(
		'before'      => '<div class="spria-page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'spria' ) . '</span>',
		'after'       => '</div>',
		'link_before' => '<span>',
		'link_after'  => '</span>',
		) );
	?>
</article>