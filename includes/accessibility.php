<?php
/**
 * The theme's accessibility functions.
 *
 * @package toms
 */

/**
 * Add aria-expanded attribute to submenus.
 *
 * @param array   $atts The HTML attributes applied to the item's `<a>` element.
 * @param WP_Post $item The current menu item.
 * @return array The HTML attributes applied to the item's `<a>` element.
 */
function toms_add_aria_expanded_to_submenus( array $atts, WP_Post $item ): array {
	if ( in_array( 'menu-item-has-children', $item->classes, true ) ) {
		$atts['aria-expanded'] = 'false';
	}

	return $atts;
}
add_filter( 'nav_menu_link_attributes', 'toms_add_aria_expanded_to_submenus', 10, 2 );
