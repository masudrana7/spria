<?php
/**
 * @author  SoftCoders
 * @since   1.0
 * @version 1.0
 */

use SoftCoders\spria\spria;

/*-------------------------------------
#. spria Color Settings
---------------------------------------*/
// Transparent Menu Color
$menu_text_color = spria::$options['menu_text_color'];
$menu_text_hover_color = spria::$options['menu_text_hover_color'];
// Sub Menu Color
$submenu_bg_color = spria::$options['submenu_bg_color'];
$submenu_text_color = spria::$options['submenu_text_color'];
$submenu_htext_color = spria::$options['submenu_htext_color'];
// Sticky Menu Color
$sticky_menu_bg_color = spria::$options['sticky_menu_bg_color'];
$sticky_menu_text_color = spria::$options['sticky_menu_text_color'];

?>


<?php
/* = Transparent Menu Color
============================================================= */
?>
<?php
	/* = spria Menu Color
	==============================================*/
	if ( !empty( $menu_text_color )) {
?>
nav.template-main-menu>ul>li>a {
	color: <?php echo esc_html( $menu_text_color ); ?>;
}
<?php } if ( !empty( $menu_text_hover_color )) { ?>
nav.template-main-menu>ul>li>a:hover {
	color: <?php echo esc_html( $menu_text_hover_color ); ?>;
}
<?php }
	if ( !empty( $submenu_bg_color )) {
	/* = spria Dropdown Menu Color
	==============================================*/
?>
	nav.template-main-menu>ul.main-menu>li>ul.sub-menu>li>ul.sub-menu,
	nav.template-main-menu>ul.main-menu>li>ul.sub-menu {
		background-color: <?php echo esc_html( $submenu_bg_color ); ?>;
	}
<?php } if ( !empty( $submenu_text_color )) { ?>
	nav.template-main-menu>ul.main-menu>li>ul.sub-menu>li>ul.sub-menu>li>a,
	nav.template-main-menu>ul.main-menu>li>ul.sub-menu>li>a {
		color: <?php echo esc_html( $submenu_text_color ); ?>;
	}
<?php } if ( !empty( $submenu_htext_color )) { ?>
	nav.template-main-menu>ul.main-menu>li>ul.sub-menu>li>ul.sub-menu>li.active>a, 
	nav.template-main-menu>ul.main-menu>li>ul.sub-menu>li>ul.sub-menu>li:hover>a, 
	nav.template-main-menu>ul.main-menu>li>ul.sub-menu>li:hover>a {
		color: <?php echo esc_html( $submenu_htext_color ); ?>;
	}
	nav.template-main-menu>ul.main-menu>li>ul.sub-menu>li>ul.sub-menu>li>a:before,
	nav.template-main-menu>ul.main-menu>li>ul.sub-menu>li>a:before {
		background-color: <?php echo esc_html( $submenu_htext_color ); ?>;
	}
<?php }
	if ( !empty( $sticky_menu_bg_color )) {
	/* = spria Sticky Menu Color
	==============================================*/
?>
	.header1.sticky-on.sticky-header .navbar-wrap .header-menu {
		background-color: <?php echo esc_html( $sticky_menu_bg_color ); ?>;
	}
<?php }
	if ( !empty( $sticky_menu_text_color )) {
	/* = spria Sticky Menu Color
	==============================================*/
?>
	.sticky-on.sticky-header nav.template-main-menu > ul.main-menu > li > a {
		color: <?php echo esc_html( $sticky_menu_text_color ); ?>;
	}
<?php } ?>