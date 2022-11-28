<?php
/*
 *  Author: DevSpark Team
 *  URL: 
 */

 
/**
 * Registers styles & scripts.
 */
require get_template_directory() . '/inc/enqueue.php';

/**
 * Theme actions.
 */
require get_template_directory() . '/inc/actions.php';

/**
 * Theme filters.
 */
require get_template_directory() . '/inc/filters.php';

/**
 * Helper functions.
 */
require get_template_directory() . '/inc/helper-functions.php';

/**
 * Register ACF Blocks.
 */
require get_template_directory() . '/inc/acf/acf-block-register.php';