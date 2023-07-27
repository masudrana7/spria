<?php
/**
 * @author  SoftCoders
 * @since   1.0
 * @version 1.0
 */

namespace SoftCoders\spria;
use SoftCoders\spria\Socials;
use SoftCoders\spria\spria;
use SoftCoders\spria\Helper;

$post_id = get_the_ID();
$scpost_image = spria::$options['post_feature_img'];
$sc_post_admin = spria::$options['post_admin'];
$sc_post_date = spria::$options['post_date'];
$sc_post_comment = spria::$options['post_comnt'];
$sc_post_cat = spria::$options['post_cats'];


if ( spria::$options['post_tags'] && has_tag() || spria::$options['post_share'] == "1" ){
    $tags_shares = '';
} else {
    $tags_shares = 'tags-shares-none';
}

if ( spria::$options['post_tags'] && has_tag() ) {
    $scols = '6';
} else {
    $scols = '12';
}

if ( $share = spria::$options['post_share'] == 1 ) {
    $tcols = '6';
} else {
    $tcols = '12';
}

$author_id       = get_the_author_meta( 'ID' );
$author_name     = get_the_author_meta( 'display_name' );
$author_bio      = get_the_author_meta( 'description' );
$post_date = get_the_date( 'd M Y' );

$post_date_day = get_the_date('d');
$post_date_month = get_the_date('M');
$comments_number = get_comments_number($post_id);
$commnets   = sprintf( _n( '%s', '%s', $comments_number, 'spria' ), number_format_i18n( $comments_number ) );
if ( has_post_thumbnail() ){
    $thumb_img = '';
} else {
    $thumb_img = ' no-image';
}
$theme_base_css = spria::$options['base_theme_css'];
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'single-blog-wrap'.$thumb_img ); ?>>
    <div class="sc-blog-details-content-area">
        <div class="sc-blog-item">
            <div class="blog-item">
                <?php if ( has_post_thumbnail() && !empty($scpost_image) ){ ?>

                    <div class="blog-image">
                        <?php the_post_thumbnail(); ?>
                    </div>
                <?php }?>

                <div class="blog-content p-0">
                    <div class="blog_date">
                        <ul>
                            <li><?php echo esc_html($post_date_day); ?></li>
                            <li><?php echo esc_html($post_date_month); ?></li>
                        </ul>
                    </div>
                    <div class="blog-list-menu list_menu sc-pt-20">
                        <ul class="blog-list">
                            <li><i class="ri-edit-fill"></i><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"> <?php the_author(); ?></a></li>
                            <li><i class="ri-chat-3-fill"></i><?php echo esc_html($commnets); ?></li>
                        </ul>
                    </div>
                    <h3 class="blog-title sc-pt-15 sc-mb-15 fw-bold">
                        <?php the_title(); ?>
                    </h3>
                </div>
            </div>
            <div class="details-content-area sc-md-mb-50">
                <div class="details-content">
                    <div class="description sc-mb-25">
                        <?php the_content(); ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="sc-detaile-tags-list d-flex align-items-center justify-content-between">
            <?php if ( spria::$options['post_tags'] && has_tag() ): ?>
            <div class="sc-blog-text">
                <?php echo esc_html('Tags:', 'spria');?> <?php echo get_the_term_list( $post->ID, 'post_tag','',', ' ); ?>
            </div>
            <?php endif; ?>
            <div class="sc-detail-social">
                <?php Helper::render(); ?>
            </div>
        </div>
        <?php if ( comments_open() || get_comments_number() ){ ?>
        <div class="blog-comment-form pt-5 pb-5">
            <?php comments_template(); ?>  
        </div>
        <?php } ?>
    </div>



</article>

