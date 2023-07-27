<?php
/**
 * @author  SoftCoders
 * @since   1.0
 * @version 1.0
 */
  use SoftCoders\spria\spria;
  use SoftCoders\spria\Helper; 
?>

<!-- spria Footer Start -->
<div class="call-to-action footer-sec1">
    <div class="container">
        <div class="row align-items-center">
            <?php if (!empty(spria::$options['cta_title'])) { ?>
            <div class="col-lg-6">
                <div class="spria_title_section">
                    <h2><?php echo esc_html( spria::$options['cta_title'] ); ?></h2>
                </div>
            </div>
            <?php } if (spria::$options['cta_btn1_link'] || spria::$options['cta_btn2_link']) { ?>
            <div class="col-lg-6">
                <div class="join_comunity_btns list-btn">
                    <?php if (spria::$options['cta_btn1_link'] ) { ?>
                    <a href="<?php echo esc_url( spria::$options['cta_btn1_link'] ); ?>" class="site_btn colorPrimaryBg collection-btn">
                        <img src="<?php echo esc_url( Helper::get_img('black-img.png') ); ?>" alt="<?php esc_attr_e( 'Button image', 'spria' ); ?>" />
                        <?php echo esc_html( spria::$options['cta_btn1_text'] ); ?>
                        <span class="hover_overlay"></span>
                    </a>
                    <?php } if ( spria::$options['cta_btn2_link'] ) { ?>
                    <a href="<?php echo esc_url( spria::$options['cta_btn2_link'] ); ?>" class="site_btn colorSecondaryBg discord-btn">
                        <img src="<?php echo esc_url( Helper::get_img('dis_logo.svg') ); ?>" alt="<?php esc_attr_e( 'Button image', 'spria' ); ?>" />
                        <?php echo esc_html( spria::$options['cta_btn2_text'] ); ?>
                        <span class="hover_overlay"></span>
                    </a>
                    <?php } ?>
                </div>
            </div>
            <?php } ?>
        </div>
        <div class="star-image">
            <div class="star-1 rotated-style">
                <img src="<?php echo esc_url( Helper::get_img('star_6.svg') ); ?>" alt="<?php esc_attr_e( 'Moving Star', 'spria' ); ?>"/>
            </div>
            <div class="star-2 rotated-style">
                <img src="<?php echo esc_url( Helper::get_img('star_3.svg') ); ?>" alt="<?php esc_attr_e( 'Moving Star', 'spria' ); ?>"/>
            </div>
            <div class="star-3 rotated-style">
                <img src="<?php echo esc_url( Helper::get_img('star_1.svg') ); ?>" alt="<?php esc_attr_e( 'Moving Star', 'spria' ); ?>"/>
            </div>
            <div class="star-4 rotated-style">
                <img src="<?php echo esc_url( Helper::get_img('star_7.svg') ); ?>" alt="<?php esc_attr_e( 'Moving Star', 'spria' ); ?>"/>
            </div>
            <div class="star-5 rotated-style">
                <img src="<?php echo esc_url( Helper::get_img('star_4.svg') ); ?>" alt="<?php esc_attr_e( 'Moving Star', 'spria' ); ?>"/>
            </div>
            <div class="star-6 rotated-style">
                <img src="<?php echo esc_url( Helper::get_img('star_2.svg') ); ?>" alt="<?php esc_attr_e( 'Moving Star', 'spria' ); ?>"/>
            </div>
            <div class="star-7 rotated-style">
                <img src="<?php echo esc_url( Helper::get_img('star_5.svg') ); ?>" alt="<?php esc_attr_e( 'Moving Star', 'spria' ); ?>"/>
            </div>
        </div>
    </div>
</div>
<!-- spria Footer End -->