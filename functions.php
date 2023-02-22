<?php

/**
 * Taxi Transfer functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Taxi_Transfer
 */

if (!defined('_S_VERSION')) {
	// Replace the version number of the theme on each release.
	define('_S_VERSION', '1.0.0');
}

/**
 * Theme Setup
 */
require get_stylesheet_directory() . '/inc/theme-setup.php';

/**
 * Styles & Scripts
 */
require get_stylesheet_directory() . '/inc/scripts.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if (defined('JETPACK__VERSION')) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Theme Utilities
 */
require get_stylesheet_directory() . '/inc/utils.php';

/**
 * String Translations
 */
require get_stylesheet_directory() . '/inc/string-translation.php';

/**
 * Custom Post Types
 */
require get_stylesheet_directory() . '/inc/custom-post-types.php';
