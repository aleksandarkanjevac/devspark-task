<?php
/**
* Theme helper functions
* Author: Koto Team
*
* @link https://developer.wordpress.org/reference/functions/wp_enqueue_style/
* @link https://developer.wordpress.org/reference/functions/wp_enqueue_script/
*/

 
function remove_default_images($sizes) {
  unset($sizes['medium']);
  unset($sizes['large']);
  unset($sizes['medium_large']);
  return $sizes;
}


// Navigation
function wp_theme_nav()
{
  wp_nav_menu(
  array(
      'theme_location'  => 'header-menu',
      'menu'            => '',
      'container'       => 'div',
      'container_class' => '',
      'container_id'    => '',
      'menu_class'      => 'menu',
      'menu_id'         => '',
      'echo'            => true,
      'fallback_cb'     => 'wp_page_menu',
      'before'          => '',
      'after'           => '',
      'link_before'     => '',
      'link_after'      => '',
      'items_wrap'      => '<ul class="header-navigation-list">%3$s</ul>',
      'depth'           => 0,
      'walker'          => new My_Walker_Nav_Menu()
      )
  );
}

class My_Walker_Nav_Menu extends Walker_Nav_Menu {
  function start_lvl(&$output, $depth = 0, $args = array()) {
      $indent = str_repeat("\t", $depth);
      $output .= "\n$indent<ul class=\"submenu\">\n";
  }
}
?>