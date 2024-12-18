<?php
/**
 * Register this website's custom post types.
 *
 * @package toms
 */

/**
 * Registers all custom post types.
 *
 * @return void
 */
function toms_post_types(): void {
	toms_register_post_type( 'example', 'Example', 'Examples', array() );
}
add_action( 'init', 'toms_post_types' );
