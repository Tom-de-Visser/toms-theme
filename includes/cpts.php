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
	toms_register_post_type( 'project', 'Project', 'Projects', array( 'menu_icon' => 'dashicons-portfolio' ) );
	toms_register_post_type( 'event', 'Event', 'Events', array( 'menu_icon' => 'dashicons-calendar' ) );
	toms_register_post_type( 'review', 'Review', 'Reviews', array( 'menu_icon' => 'dashicons-editor-quote' ) );
}
add_action( 'init', 'toms_post_types' );
