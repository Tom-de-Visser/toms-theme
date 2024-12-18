<?php
/**
 * The theme's functions and definitions.
 *
 * @package toms
 */

define( 'THEME_DIR', get_template_directory() );
define( 'THEME_URI', get_template_directory_uri() );
define( 'IMAGE_URI', THEME_URI . '/assets/images' );

require 'includes/bootstrap.php';

if ( class_exists( 'acf' ) ) {
	require 'includes/acf.php';
}
