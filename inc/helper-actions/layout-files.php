<?php
/**
 * @author  SoftCoders
 * @since   1.0
 * @version 1.0
 */

namespace SoftCoders\spria;
use SoftCoders\spria\spria;

trait LayoutFiles {
  public static function has_sidebar() {
    return ( self::has_full_width() ) ? false : true;
  }

  /**
   * It will determine whether content will take full width or not 
   * this is determine by 2 parameters - redux theme option and active sidebar
   * @return boolean [description]
   */
  public static function has_full_width() {
    $theme_option_full_width = ( spria::$layout == 'full-width' ) ? true : false;
    if ( is_singular( 'spria_event' ) && ! is_active_sidebar('event-widgets')) {
      $not_active_sidebar = ! is_active_sidebar('event-widgets');
    } else {  
      $not_active_sidebar = ! is_active_sidebar( 'sidebar' );
    }
    $bool = $theme_option_full_width || $not_active_sidebar;
    return  $bool;
  }

  public static function the_layout_class() {
    $layout_class = self::has_sidebar() ? 'col-lg-8' : 'col-12';
    if ( spria::$layout == 'right-sidebar' ) {
      $layout_class = $layout_class.' order-lg-1';
    } elseif ( spria::$layout == 'left-sidebar' ) {
      $layout_class = $layout_class.' order-lg-2';
    } else {
      $layout_class = $layout_class;
    }
    echo apply_filters( 'spria_layout_class', $layout_class );
  }

  public static function the_sidebar_class() {
    if ( class_exists( 'WooCommerce' ) ) {
      if ( is_shop() || is_product() ) {
        if ( spria::$layout == 'right-sidebar' ) {
          echo apply_filters( 'rt_sidebar_class', 'col-lg-4 order-lg-2' );
        } else {
          echo apply_filters( 'rt_sidebar_class', 'col-lg-4 order-lg-1' );
        }
      } else {
        if ( spria::$layout == 'right-sidebar' ) {
          echo apply_filters( 'rt_sidebar_class', 'col-lg-4 order-lg-2' );
        } else {
          echo apply_filters( 'rt_sidebar_class', 'col-lg-4 order-lg-1' );
        }
      }
    } else {
      if ( spria::$layout == 'right-sidebar' ) {
        echo apply_filters( 'rt_sidebar_class', 'col-lg-4 order-lg-2' );
      } else {
        echo apply_filters( 'rt_sidebar_class', 'col-lg-4 order-lg-1' );
      }
    }
  }

  public static function spria_sidebar() {
    if ( spria::$layout == 'right-sidebar' || spria::$layout == 'left-sidebar' && ! self::has_full_width() ) {
      get_sidebar();
    }
  }

  public static function has_footer(){
    if ( !spria::$options['footer_area'] ) {
      return false;
    }
    $footer_column = spria::$options['footer_column'];
    for ( $i = 1; $i <= $footer_column; $i++ ) {
      if ( is_active_sidebar( 'footer-'. $i ) ) {
        return true;
      }
    }
    return false;
  }
  
  public static function has_footer_widget(){
    return is_active_sidebar('footer-1') || is_active_sidebar('footer-2') || is_active_sidebar('footer-3') || is_active_sidebar('footer-4') ;
  }

}
