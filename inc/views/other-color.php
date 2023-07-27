<?php
/**
 * @author  SoftCoders
 * @since   1.0
 * @version 1.0
 */

use SoftCoders\spria\spria;

/*-------------------------------------
#. spria Others Color Settings
---------------------------------------*/
// Toggle Color
// Preloader
$preloader_text_color = spria::$options['preloader_text_color'];
// Scrollup
$scroll_color = spria::$options['scroll_color'];

?>

<?php
	// Preloader
	if ( !empty( $preloader_text_color )) {
	?>
		.preloader .animation-preloader .spinner::before { 
			border-top: 3px solid <?php echo esc_html( $preloader_text_color ); ?>;
		}
		.preloader .animation-preloader .txt-loading .letters-loading::before {
			color: <?php echo esc_html( $preloader_text_color ); ?>;
		}
	<?php }
?>

<?php
	if ( $scroll_color ) {
	// Scrollup
	?>
		.spria-scroll-top-icon {
			color: <?php echo esc_html( $scroll_color ); ?>;
		}
		.spria-scroll-top > svg.progress-circle path {
			stroke: <?php echo esc_html( $scroll_color ); ?>;
		}
<?php } ?>