<?php
/**
 * Bootstrapping the theme, setting it up for success.
 *
 * @package toms
 */

add_filter( 'xmlrpc_enabled', '__return_false' );

/**
 * Turn off the file editors.
 *
 * @return void
 */
function toms_disable_file_editor(): void {
	define( 'DISALLOW_FILE_EDIT', true );
}
add_action( 'after_setup_theme', 'toms_disable_file_editor' );

/**
 * Allow SVG uploads.
 *
 * @param array $mimes The allowed mime types.
 * @return array The new allowed mime types.
 */
function toms_allow_svg_uploads( array $mimes ): array {
	$mimes['svg'] = 'image/svg+xml';
	return $mimes;
}
add_filter( 'upload_mimes', 'toms_allow_svg_uploads' );

/**
 * Unregister widgets.
 *
 * @return void
 */
function toms_unregister_widgets(): void {
	unregister_widget( 'WP_Widget_Archives' );
	unregister_widget( 'WP_Widget_Block' );
	unregister_widget( 'WP_Widget_Calendar' );
	unregister_widget( 'WP_Widget_Categories' );
	unregister_widget( 'WP_Widget_Links' );
	unregister_widget( 'WP_Widget_Media_Audio' );
	unregister_widget( 'WP_Widget_Media_Gallery' );
	unregister_widget( 'WP_Widget_Media_Image' );
	unregister_widget( 'WP_Widget_Media_Video' );
	unregister_widget( 'WP_Widget_Meta' );
	unregister_widget( 'WP_Widget_Pages' );
	unregister_widget( 'WP_Widget_Recent_Comments' );
	unregister_widget( 'WP_Widget_Recent_Posts' );
	unregister_widget( 'WP_Widget_RSS' );
	unregister_widget( 'WP_Widget_Search' );
	unregister_widget( 'WP_Widget_Tag_Cloud' );
}
add_action( 'widgets_init', 'toms_unregister_widgets' );

/**
 * Set a custom excerpt length.
 *
 * @param int $length The length of the excerpt.
 * @return int The new length of the excerpt.
 */
function toms_custom_excerpt_length( int $length ): int {
	return $length;
}
add_filter( 'excerpt_length', 'toms_custom_excerpt_length', 999 );

/**
 * Set the allowed blocks to an empty array.
 *
 * @param array $allowed_blocks The allowed blocks.
 * @return array The new allowed blocks.
 */
function toms_allowed_blocks( array $allowed_blocks ): array {
	$allowed_blocks = array();
	return $allowed_blocks;
}
add_filter( 'allowed_block_types_all', 'toms_allowed_blocks' );

/**
 * Remove the comments menu page.
 *
 * @return void
 */
function toms_remove_admin_menus(): void {
	remove_menu_page( 'edit-comments.php' );
}
add_action( 'admin_menu', 'toms_remove_admin_menus' );

/**
 * Remove comment support from posts and pages.
 *
 * @return void
 */
function toms_remove_comment_support(): void {
	remove_post_type_support( 'post', 'comments' );
	remove_post_type_support( 'page', 'comments' );
	remove_post_type_support( 'attachment', 'comments' );
}
add_action( 'init', 'toms_remove_comment_support', 100 );

/**
 * Remove comments from the admin bar.
 *
 * @return void
 */
function toms_remove_comments_from_admin_bar(): void {
	global $wp_admin_bar;
	$wp_admin_bar->remove_menu( 'comments' );
}
add_action( 'wp_before_admin_bar_render', 'toms_remove_comments_from_admin_bar' );

/**
 * Setup the theme by removing unnecessary features and adding support for others.
 *
 * @return void
 */
function toms_setup_theme(): void {
	add_filter( 'use_block_editor_for_post', '__return_false', 10 );
	add_filter( 'use_block_editor_for_post_type', '__return_false', 10 );
	add_filter( 'use_widgets_block_editor', '__return_false' );
	remove_action( 'admin_print_styles', 'print_emoji_styles' );
	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
	remove_action( 'wp_print_styles', 'print_emoji_styles' );
	remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
	remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
	remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );

	add_theme_support( 'menus' );
	add_theme_support( 'excerpt' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption', 'style', 'script' ) );

	register_nav_menus(
		array(
			'primary'    => __( 'Primary Menu', 'toms' ),
			'off-canvas' => __( 'Off-canvas Menu', 'toms' ),
		)
	);
}
add_action( 'after_setup_theme', 'toms_setup_theme' );

/**
 * Load the theme's assets.
 *
 * @return void
 */
function toms_load_assets(): void {
	wp_dequeue_style( 'wp-block-library' );
	wp_deregister_style( 'wp-block-library' );
	wp_deregister_style( 'global-styles' );

	wp_enqueue_style( 'toms-style-main', get_bloginfo( 'stylesheet_directory' ) . '/dist/main.css', array(), time() );
	wp_enqueue_script( 'feather-icons', 'https://unpkg.com/feather-icons', array(), time(), true );
	wp_enqueue_script( 'toms-script-main', get_bloginfo( 'stylesheet_directory' ) . '/dist/main.js', array( 'feather-icons' ), time(), true );
}
add_action( 'wp_enqueue_scripts', 'toms_load_assets' );

/**
 * Register the theme's widget areas.
 *
 * @return void
 */
function tom_register_sidebars(): void {
	$footer_areas = 4;

	for ( $i = 1; $i <= $footer_areas; $i++ ) {
		register_sidebar(
			array(
				'id'            => 'footer-' . $i,
				'name'          => __( 'Footer', 'toms' ) . ' ' . $i,
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<span class="widget-title">',
				'after_title'   => '</span>',
			)
		);
	}
}
add_action( 'widgets_init', 'tom_register_sidebars' );

/**
 * Adds a custom button to the TinyMCE editor.
 *
 * @param array $buttons The buttons.
 * @return array The new buttons.
 */
function toms_mce_button( array $buttons ): array {
	// Add the button to the list of TinyMCE buttons.
	$buttons[] = 'toms_button';
	return $buttons;
}
add_filter( 'mce_buttons', 'toms_mce_button' );

/**
 * Register the TinyMCE plugin.
 *
 * @param array $plugins The plugins.
 * @return array The new plugins.
 */
function toms_register_button( array $plugins ): array {
	// Specify the script that handles the button functionality.
	$plugins['toms_button'] = get_template_directory_uri() . '/dist/tinymce.js';
	return $plugins;
}
add_filter( 'mce_external_plugins', 'toms_register_button' );
