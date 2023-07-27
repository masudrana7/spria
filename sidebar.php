<?php
/**
 * @author  SoftCoders
 * @since   1.0
 * @version 1.0
 */

namespace SoftCoders\spria;
use SoftCoders\spria\spria;
use SoftCoders\spria\Helper;
$prefix = SPRIA_THEME_PREFIX_VAR;
?>
<div class="<?php Helper::the_sidebar_class();?> sticky-sidebar2">
	<div class="categories-area">
		<aside class="sidebar-widget-area <?php  echo esc_attr( spria::$layout ) ?>">
			<?php
			if ( spria::$sidebar ) {
				if ( is_active_sidebar( spria::$sidebar ) ){
					dynamic_sidebar( spria::$sidebar );
				}
			} elseif (is_singular( $prefix.'_event' )) {
				if ( is_active_sidebar( 'event-widgets' ) ) {
					dynamic_sidebar( 'event-widgets' );
				} else {
					//No Sidebar
				}
			} else {
				if ( is_active_sidebar( 'sidebar' ) ){
					dynamic_sidebar( 'sidebar' );
				}
			}
			?>
		</aside>
	</div>
</div>
<?php Helper::spria_sidebar(); ?>
