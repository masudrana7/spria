<?php
/**
 * @author  SoftCoders
 * @since   1.0
 * @version 1.0
 */

namespace SoftCoders\spria;
use SoftCoders\spria\spria;
use SoftCoders\spria\Helper;

?>
<a href="<?php echo esc_url( spria::$options['hbtn_link'] ); ?>" class="site_btn btn-style-2">
    <img src="<?php echo esc_url( Helper::get_img('dis_logo.svg') ); ?>" alt="<?php esc_attr_e( 'Button image', 'spria' ); ?>" />
    <?php echo esc_html( spria::$options['hbtn_txt'] ); ?>
    <span class="hover_overlay"></span>
</a>