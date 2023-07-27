<?php
/**
 * @author  SoftCoders
 * @since   1.0
 * @version 1.0
 */

// namespace SoftCoders\spria;
use SoftCoders\spria\spria;

?>
    <!--Sc Offcanvas Area Start-->
    <div id="sc-overlay-bg2" class="sc-overlay-bg2"></div>
    <div class="sc-product-offcanvas-area">
        <div class="sc-offcanvas-header d-flex align-items-center justify-content-between">
            <div class="sticky-logo logo-area text-center">
                <?php get_template_part( 'framework/header/logo', 1 ); ?> 
            </div>
            <div class="offcanvas-icon">
                <a id="canva_close" href="#">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 50 50" width="25px" height="25px">
                        <path
                            d="M 9.15625 6.3125 L 6.3125 9.15625 L 22.15625 25 L 6.21875 40.96875 L 9.03125 43.78125 L 25 27.84375 L 40.9375 43.78125 L 43.78125 40.9375 L 27.84375 25 L 43.6875 9.15625 L 40.84375 6.3125 L 25 22.15625 Z"
                        />
                    </svg>
                </a>
            </div>
        </div>

        <!-- Canvas Mobile Menu start -->
        <nav class="right_menu_togle mobile-navbar-menu" id="mobile-navbar-menu">
            <?php get_template_part( 'framework/header/mobile-menu' ); ?>
        </nav>
    </div>
    <!--Sc Offcanvas Area End-->

<?php 
    get_template_part( 'framework/footer/footer' );
?>

</div>

<?php wp_footer(); ?>
</body>
</html>