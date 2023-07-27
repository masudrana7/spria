<?php
/**
 * @author  SoftCoders
 * @since   1.0
 * @version 1.0
 */

namespace SoftCoders\spria;
use SoftCoders\spria\spria;
use SoftCoders\spria\Helper;

$excerpt_length = spria::$options['excerpt_length'];
$post_id = get_the_ID();
$sc_post_admin = spria::$options['post_meta_admin'];
$sc_post_cat = spria::$options['post_meta_cats'];
$sc_post_date = spria::$options['post_meta_date'];
$pread = spria::$options['post_meta_read'];
$sc_post_commentnt = spria::$options['post_meta_comnt'];
$author_id = get_the_author_meta('ID');
$author_permalink = get_the_author() ? get_author_posts_url($author_id) : '#';
$comments = get_comments(array(
    'post_id'=> $post_id
));
$comment_count = count($comments);
$comment_message = $comment_count > 0 ? esc_html("$comment_count Comments")   : esc_html("No comments");
if ( has_post_thumbnail() ){
    $thumb_img = '';
} else {
    $thumb_img = 'no-image';
}
?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'blog-layout-1 '.$thumb_img ); ?>>
    <div class="blog-item">

        <!-- img part -->
        <?php if ( has_post_thumbnail() ){ ?>
        <div class="blog-image">
            <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
        </div>
        <?php } ?>


        <!-- Content Part -->
        <div class="blog-content text-center">
            <?php

                if ( !has_post_thumbnail()){
                    if (!empty( $sc_post_admin || $sc_post_date || $sc_post_cat )) {
                        echo Helper::spria_get_post_meta( $post_id, $sc_post_admin, $sc_post_date, $sc_post_cat );
                    }
                }
            ?>
            <?php
                if (!empty( $sc_post_admin || $sc_post_date || $sc_post_cat )) {
                    echo Helper::spria_get_post_meta( $post_id, $sc_post_admin, $sc_post_date, $sc_post_cat );
                }
            ?>
            <div class="blog-list-menu list_menu sc-pt-20">
                <ul class="blog-list">
                    <li><i class="ri-edit-fill"></i><a href="<?php echo esc_url($author_permalink); ?>"><?php echo ucwords( get_the_author() ) ?: 'Author information not available.'; ?></a></li>
                    <li><i class="ri-chat-3-fill"></i><a href="#"> <?php esc_html_e($comment_message); ?> </a></li>
                </ul>
            </div>
            <h3 class="blog-title sc-pt-15 sc-mb-15 fw-bold">
                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
            </h3>
            <div class="description sc-mb-20">
                  <?php echo helper::spria_excerpt( $excerpt_length ); ?>
            </div>
            <a class="readmore" href="<?php the_permalink(); ?>"><?php esc_html_e( 'Read More', 'spria' ) ?> </a>
        </div>
    </div>
</article>



    
    
