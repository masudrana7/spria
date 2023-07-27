<?php
/**
 * @author  SoftCoders
 * @since   1.0
 * @version 1.0
 */

  use SoftCoders\spria\spria;
  use SoftCoders\spria\Helper; 

  if (spria::$options['scrollup'] || spria::$options['footer_social']) {
    $copyright = 'copyright-left';
  } else {
    $copyright = 'copyright-center';
  }

?>





<!--=====================================-->
<!--=     Footer Section Area Start     =-->
<!--=====================================-->
<section class="sc-footer-section sc-footer-style2">     
    <div class="copyright-area border-0">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="copyright-text text-center sal-animate" data-sal="slide-up" data-sal-duration="800" data-sal-delay="400">
                        <p><?php echo wp_kses_stripslashes( spria::$options['copyright_text'] ); ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>