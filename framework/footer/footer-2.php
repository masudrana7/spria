<?php
/**
 * @author  SoftCoders
 * @since   1.0
 * @version 1.0
 */

  use SoftCoders\spria\spria;
  use SoftCoders\spria\Helper; 
  $nav_menu_args = Helper::copyright_menu_args();

  if (spria::$options['scrollup'] || spria::$options['footer_social']) {
    $copyright = 'copyright-left';
  } else {
    $copyright = 'copyright-center';
  }
spria::$options['footer_social'];
?>

<!--=====================================-->
<!--=     Footer Section Area Start     =-->
<!--=====================================-->
<footer class="footer-wrap-layout2">
   <div class="footer1 shape <?php echo esc_attr( $copyright ); ?>">
      <div class="container">
         <div class="footer-bottom">
            <div class="footer_botom__left">
               <div class="copyright-text">&copy;<span id="currentYear"></span><?php echo wp_kses_stripslashes( spria::$options['copyright_text'] ); ?></div>
            </div>
            <?php if (spria::$options['scrollup']) { ?>
            <div class="footer_botom__center">
              <a href="#wrapper" class="bact_to_top_btn"><img src="<?php echo esc_url( Helper::get_img('back_to_top.svg') ); ?>" alt="<?php esc_attr_e( 'Back to top', 'spria' ); ?>"></a>
            </div>
            <?php } if (spria::$options['footer_social']) { ?>
            <div class="footer_botom__right">
              <?php wp_nav_menu( [
	              'theme_location'  => 'footer2',
	              'depth'           => 1,
	              'container'       => 'ul',
	              'menu_class'      => 'footer-menu-link',
              ] ); ?>
            </div>
            <?php } ?>
         </div>
      </div>
   </div>
</footer>