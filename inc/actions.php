<?php
/**
* Theme actions
* Author: Koto Team
*
* @link https://developer.wordpress.org/plugins/hooks/actions/
*/


// Menu
add_action('init', 'register_menu');

function register_menu()
{
    register_nav_menus(array(
        'header-menu' => __('Header Menu', 'wp_theme')
    ));
}

// Pagination
function wp_pagination($numpages = '', $pagerange = '', $paged='') {

  if (empty($pagerange)) {
    $pagerange = 2;
  }
  global $paged;
  if (empty($paged)) {
    $paged = 1;
  }
  if ($numpages == '') {
    global $wp_query;
    $numpages = $wp_query->max_num_pages;
    if(!$numpages) {
        $numpages = 1;
    }
  }

  $pagination_args = array(
    'base'            => get_pagenum_link(1) . '%_%',
    'format'          => 'page/%#%',
    'total'           => $numpages,
    'current'         => $paged,
    'show_all'        => false,
    'end_size'        => 1,
    'mid_size'        => $pagerange,
    'prev_next'       => true,
    'prev_text'       => __('<'),
    'next_text'       => __('>'),
    'type'            => 'plain',
    'add_args'        => false,
    'add_fragment'    => ''
  );

  $paginate_links = paginate_links($pagination_args);

  if ($paginate_links) {
    echo "<div class='pagination'>";
      echo $paginate_links;
      echo "<span class='page-numbers'></span>";
    echo "</div>";
  }
}
add_action('init', 'wp_pagination');

// Redirect attachment page
add_action('template_redirect', 'redirect_attachment_page');

function redirect_attachment_page() {
    if(is_attachment()) {
        global $post;
        if($post && $post->post_parent) {
            wp_redirect(esc_url(get_permalink($post->post_parent)), 301);
            exit;
        } else {
            wp_redirect(esc_url(home_url('/')), 301);
            exit;
        }
    }
}
?>