<?php
/**
 * @author  SoftCoders
 * @since   1.0
 * @version 1.0
 */

use SoftCoders\spria\Helper;

?>
<?php $tag = ( 'div' === $args['style'] ) ? 'div' : 'li'; ?>
<<?php echo esc_html( $tag ); ?> id="comment-<?php comment_ID(); ?>" <?php comment_class( $args['has_children'] ? 'parent main-comments' : 'main-comments', $comment ); ?>>

<div id="respond-<?php comment_ID(); ?>" class="each-comment">

	<?php if ( get_option( 'show_avatars' ) ): ?>
		<div class="imgholder">
			<?php if ( 0 != $args['avatar_size'] ) echo get_avatar( $comment, $args['avatar_size'], "", false, array( 'class'=>'media-object' ) ); ?>
		</div>				
	<?php endif; ?>

	<div class="media-body comments-body">	
		<div class="comment-header">
			<h5 class="comment-meta clearfix">
				<?php echo get_comment_author_link( $comment ); ?>
			</h5>
			<span class="comment-date">
				<?php printf( get_comment_date( '', $comment )); ?>	
			</span>
		</div>
		<div class="comment-text">
			<?php if ( '0' == $comment->comment_approved ) : ?>
				<p class="comment-awaiting-moderation"><?php esc_html_e( 'Your comment is awaiting moderation.', 'spria' ); ?></p>
			<?php endif; ?>
			<?php comment_text(); ?>							
		</div>
		<div class="comment-reply">
			<?php
				comment_reply_link( 
					array_merge( $args, array(
						'add_below' => 'respond',
						'depth'     => $depth,
						'max_depth' => $args['max_depth'],
						'reply_text' => esc_html__( 'Reply +', 'spria' ),
						) )
				);
			?>
		</div>
	</div>
	<div class="clear"></div>
</div>