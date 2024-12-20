<?php
/**
 * The theme's dropdown walker class.
 *
 * @package toms
 */

/**
 * The dropdown walker class.
 */
class Toms_Dropdown_Walker extends Walker_Nav_Menu {
	/**
	 * Starts the list before the elements are added.
	 *
	 * @param string $output Used to append additional content (passed by reference).
	 * @param int    $depth Depth of menu item. Used for padding.
	 * @param object $args An object of wp_nav_menu() arguments.
	 * @return void
	 */
	public function start_lvl( &$output, $depth = 0, $args = null ) {
		$indent  = str_repeat( "\t", $depth );
		$output .= "\n$indent<ul class='submenu absolute whitespace-nowrap border p-4 hidden group-hover/has-submenu:flex'>\n";
	}

	/**
	 * Starts the element output.
	 *
	 * @param string $output Used to append additional content (passed by reference).
	 * @param object $item The current menu item.
	 * @param int    $depth Depth of the item.
	 * @param object $args An object of wp_nav_menu() arguments.
	 * @param int    $id Current item ID.
	 * @return void
	 */
	public function start_el( &$output, $item, $depth = 0, $args = null, $id = 0 ) {
		$indent = $depth ? str_repeat( "\t", $depth ) : '';

		$classes   = empty( $item->classes ) ? array() : (array) $item->classes;
		$classes[] = 'menu-item-' . $item->ID;
		$classes   = array_filter( $classes ); // Remove any empty classes.

		if ( in_array( 'menu-item-has-children', $classes, true ) ) {
			$classes[] = 'group/has-submenu relative';
		}

		$atts = array(
			'title'  => ! empty( $item->attr_title ) ? $item->attr_title : '',
			'target' => ! empty( $item->target ) ? $item->target : '',
			'href'   => ! empty( $item->url ) ? $item->url : '',
		);

		$atts       = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args );
		$attributes = '';

		// The attributes need to be sanitized to prevent security issues, and converted to a string format suitable for HTML output.
		foreach ( $atts as $attr => $value ) {
			if ( ! empty( $value ) ) {
				$value       = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
				$attributes .= ' ' . $attr . '="' . $value . '"';
			}
		}

		$title = apply_filters( 'the_title', $item->title, $item->ID );
		$title = apply_filters( 'nav_menu_item_title', $title, $item, $args );

		$item_output = "{$args->before}<a{$attributes}>{$args->link_before}{$title}{$args->link_after}</a>{$args->after}";

		$output .= $indent . '<li class="' . implode( ' ', $classes ) . '">';
		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}

	/**
	 * Ends the element output.
	 *
	 * @param string $output The output.
	 * @param object $item The item.
	 * @param int    $depth The depth.
	 * @param object $args The arguments.
	 * @return void
	 */
	public function end_el( &$output, $item, $depth = 0, $args = null ) {
		$output .= "</li>\n";
	}

	/**
	 * Ends the list output.
	 *
	 * @param string $output The output.
	 * @param int    $depth The depth.
	 * @param object $args The arguments.
	 * @return void
	 */
	public function end_lvl( &$output, $depth = 0, $args = null ) {
		$indent  = str_repeat( "\t", $depth );
		$output .= "$indent</ul>\n";
	}
}
