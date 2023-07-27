<?php
/**
 * @author  SoftCoders
 * @since   1.0
 * @version 1.0
 */

use SoftCoders\spria\spria;
$spria = SPRIA_THEME_PREFIX_VAR;

/*-------------------------------------
#. spria Body Color Settings
---------------------------------------*/
// Body Color
$body_color = spria::$options['body_color'];

?>

<?php
	if ( !empty( $body_color )) {
	/* = Color
	==============================================*/
	?>
	body {
		color: <?php echo esc_html( $body_color ); ?>;
	}
<?php } ?>