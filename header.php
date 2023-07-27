<?php

/**
 * @author  SoftCoders
 * @since   1.0
 * @version 1.0
 */
use SoftCoders\spria\spria;
?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>

    <?php
        if (spria::$options['preloader']) {
            do_action('site_prealoader');
        }
    ?>

    <div id="wrapper" class="wrapper overflow-hidden">
        <div id="masthead" class="site-header">
            <header class="sc-header-section" id="sc-header-sticky">
                <div class="sc-header-content sc-header-content-two">
            <?php get_template_part('framework/header/header' ); ?>
                </div>
            </header>
        </div>
        <?php
        if ( spria::$has_banner == '1' || spria::$has_banner != "off" ) {
            get_template_part( 'framework/content', 'banner' ); 

        }
            
        ?>