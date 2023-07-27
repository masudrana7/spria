<?php 
namespace SoftCoders\spria;
use SoftCoders\spria\spria;
use SoftCoders\spria\Helper;
// Logo
?>
	<div class="sc-header-logo sc-pr-112">
		<?php
		if (has_custom_logo()) {
			the_custom_logo();
		} elseif (!has_custom_logo()) {
		?>
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url(get_template_directory_uri() ) . '/assets/images/logo-black.png'; ?>" alt="<?php esc_attr_e('Logo', 'spria'); ?>"></a>
		<?php
			} ?>
	</div>
