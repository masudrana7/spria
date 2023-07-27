<?php
/**
 * @author  SoftCoders
 * @since   1.0
 * @version 1.0
 */

namespace SoftCoders\spria;

if ( post_password_required() ) {
    return;
}
?>
<div id="comments" class="comments-area single-blog-form contact-box">
    <?php if ( have_comments() ): ?>
    <div class="blog-comment">
        <?php
            $spriatheme_comment_count = get_comments_number();
            $spriatheme_comments_text = number_format_i18n( $spriatheme_comment_count ) ;
            if ( $spriatheme_comment_count > 1 ) {
                $spriatheme_comments_text .= esc_html__( ' Comments', 'spria' );
            }
            else{
                $spriatheme_comments_text .= esc_html__( ' Comment', 'spria' );
            }
        ?>
        <h3 class="comment-title"><?php echo esc_html( $spriatheme_comments_text );?></h3>
        <?php $spriatheme_avatar = get_option( 'show_avatars' ); ?>
        <ul class="comment-list<?php echo empty( $spriatheme_avatar ) ? ' avatar-disabled' : '';?>">
            <?php
                wp_list_comments(
                    array(
                        'style'        => 'ul',
                        'callback'     => 'SoftCoders\spria\Helper::comments_callback',
                        'reply_text'   => esc_html__( 'Reply', 'spria' ),
                        'avatar_size'  => 70,
                        'format'       => 'html5'
                    ) 
                );
            ?>
        </ul>

        <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :?>
            <nav class="pagination-area comment-pagination">
                <ul>
                    <li class="older-comments"><?php previous_comments_link( esc_html__( 'Older Comments', 'spria' ) ); ?></li>
                    <li class="newer-comments"><?php next_comments_link( esc_html__( 'Newer Comments', 'spria' ) ); ?></li>
                </ul>
            </nav>
        <?php endif;?>
    </div>
    <?php endif;?>
    
    <?php if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>
        <p class="comments-closed"><?php esc_html_e( 'Comments are closed.', 'spria' ); ?></p>
    <?php endif; ?>

    <?php
    // Start displaying Comment Form
    $spriatheme_commenter = wp_get_current_commenter();		
    $spriatheme_req = get_option( 'require_name_email' );
    $spriatheme_aria_req = ( $spriatheme_req ? " required" : '' );


    $spriatheme_fields =  array(
        '<div class="row">
            <div class="col-sm-6"><div class="form-group">',
                'author' => '
                <input id="author" class="from-control" name="author" value="' . esc_attr( $spriatheme_commenter['comment_author'] ) . '" type="text" placeholder="'.esc_attr__( 'Full Name *', 'spria' ).'" size="30"' . $spriatheme_aria_req . '/>
            </div></div>
            <div class="col-sm-6"><div class="form-group">',
                'email'  => '
                <input id="email" class="from-control" name="email" value="' . esc_attr(  $spriatheme_commenter['comment_author_email'] ) . '" type="email" placeholder="'.esc_attr__( 'Your E-mail *', 'spria' ).'" size="30"' . $spriatheme_aria_req . '/>
            </div></div>
        </div>',
    );

    $spriatheme_args = array(
        'submit_field'  => '<div class="form-submit">%1$s %2$s</div>',

        'title_reply'   => esc_html__( 'Leave A Reply', 'spria' ),

        'submit_button' => '<div class="form-btn"><button type="submit" class="submit-button sc-primary-btn">'.esc_attr__( 'Post Comment', 'spria' ).'<span class="hover_overlay"></span></button></div>',

        'comment_field' =>  '<div class="form-group comment-form-comment"><textarea id="comment" name="comment" required placeholder="'.esc_attr__( 'Your Comment *', 'spria' ).'" class="textarea form-control" rows="6" cols="20"></textarea></div>',

        'fields' => apply_filters( 'comment_form_default_fields', $spriatheme_fields ),
        
    );
    ?>
    <div class="reply-separator"></div>
    <?php comment_form( $spriatheme_args );?>
</div>