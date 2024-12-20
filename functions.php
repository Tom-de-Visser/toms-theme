<?php
/**
 * The theme's functions and definitions.
 *
 * @package toms
 */

define( 'THEME_DIR', get_template_directory() );
define( 'THEME_URI', get_template_directory_uri() );
define( 'IMAGE_URI', THEME_URI . '/assets/images' );

require_once 'includes/classes/class-toms-dropdown-walker.php';
require_once 'includes/classes/class-toms-offcanvas-walker.php';
require_once 'includes/helpers.php';
require_once 'includes/bootstrap.php';
require_once 'includes/accessibility.php';
require_once 'includes/cpts.php';

if ( class_exists( 'acf' ) ) {
	require_once 'includes/acf.php';
}
