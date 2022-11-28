<?php
/**
* Theme actions
* Author: DevSpark Team
*
* @link https://developer.wordpress.org/plugins/hooks/filters/
*/


// Add theme supports
if (function_exists('add_theme_support'))
{
    // menu support
    add_theme_support('menus');

    // thumbnail support
    add_theme_support('post-thumbnails');
}

// Thumbnail support
add_filter('intermediate_image_sizes_advanced', 'remove_default_images');


// Add page slug to body class
add_filter('body_class', 'add_slug_to_body_class');

function add_slug_to_body_class($classes) {
    global $post;
    if (is_home()) {
        $key = array_search('blog', $classes);
        if ($key > -1) {
            unset($classes[$key]);
        }
    } elseif (is_page()) {
        $classes[] = sanitize_html_class($post->post_name);
    } elseif (is_singular()) {
        $classes[] = sanitize_html_class($post->post_name);
    }

    return $classes;
}

//Add custom category for ACF/Gutenberg blocks
function devspark_block_category( $categories, $post ) {
	return array_merge(
		$categories,
		array(
			array(
				'slug' => 'devspark',
				'title' => 'DevSpark',
			),
		)
	);
}
add_filter( 'block_categories', 'devspark_block_category', 10, 2);