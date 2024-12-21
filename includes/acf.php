<?php
/**
 * Include custom ACF fields.
 *
 * @package toms
 */

if ( ! function_exists( 'acf_add_local_field_group' ) ) {
	return;
}

require_once get_template_directory() . '/includes/acf/layouts.php';
require_once get_template_directory() . '/includes/acf/theme-settings.php';
require_once get_template_directory() . '/includes/acf/post-types/event.php';
