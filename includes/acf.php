<?php
/**
 * Include custom ACF fields.
 *
 * @package toms
 */

if ( ! function_exists( 'acf_add_local_field_group' ) ) {
	return;
}

/**
 * Global fields.
 */
require_once get_template_directory() . '/includes/acf/layouts.php';
require_once get_template_directory() . '/includes/acf/theme-settings.php';

/**
 * Custom post types.
 */
require_once get_template_directory() . '/includes/acf/post-types/event.php';
require_once get_template_directory() . '/includes/acf/post-types/review.php';
