<?php
/**
 * @author  SoftCoders
 * @since   1.0
 * @version 1.0
 */

namespace SoftCoders\spria;
use SoftCoders\spria\spria;
use SoftCoders\spria\Helper;

$header_sticky = spria::$options['header_sticky'];
if ($header_sticky) {
  $sticky = 'sticky-on';
} else {
  $sticky = 'sticky-off';
}

?>

    <div class="container">
        <div class="row align-items-center justify-content-between p-z-idex">
            <div class="col-lg-12 col-12 header-option">
                <div class="sc-menu-inner d-flex align-items-center">
                    <?php get_template_part( 'framework/header/logo', 1 ); ?>  
                    <div class="sc-main-menu d-lg-block d-none">
                        <!-- Mainmenu Section Start -->
                        <?php get_template_part( 'framework/header/menu', 1 ); ?>
                        <!-- Mainmenu Section End -->
                    </div>
                </div>
                <div class="sc-menu-select-box d-flex align-items-center justify-content-end">
                    <div class="sc-hambagur-icon sc-mr-20">
                        <a id="canva_expander" href="#" class="nav-menu-link menu-button">
                            <span class="dot1"></span>
                            <span class="dot2"></span>
                            <span class="dot3"></span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>