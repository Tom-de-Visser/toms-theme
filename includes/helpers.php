<?php
/**
 * The theme's helper functions.
 *
 * @package toms
 */

/**
 * Dump and die.
 *
 * @param mixed $value The value to dump.
 * @return void
 */
function toms_dd( mixed $value ): void {
	var_dump( $value ); // phpcs:ignore
	die();
}

/**
 * Markup for some credits to the site builder.
 *
 * @param bool $should_echo Whether to echo or return the markup.
 * @return string A link that opens a mail to the site builder.
 */
function toms_credits( $should_echo = true ): string {
	$mail_to      = 'sayhi@tomdevisser.dev';
	$mail_subject = rawurlencode( 'Website Inquiry from ' . get_bloginfo( 'name' ) );
	$href         = 'mailto:' . $mail_to . '?subject=' . $mail_subject;
	ob_start();
	?>
	<a href="<?php echo esc_attr( $href ); ?>" aria-label="E-mail Tom, the site's developer">Built by Tom de Visser</a>
	<?php
	$credits = ob_get_clean();

	if ( $should_echo ) {
		echo wp_kses(
			$credits,
			array(
				'a' => array(
					'href'       => array(),
					'aria-label' => array(),
				),
			)
		);
	}

	return $credits;
}

/**
 * Dump, die, and debug.
 *
 * @param mixed $value The value to dump.
 * @return void
 */
function toms_ddd( mixed $value ): void {
	echo '<pre>';
	var_dump( $value ); // phpcs:ignore
	echo '</pre>';
	die();
}

/**
 * A helper for retrieving the navigation menu.
 *
 * @param string $theme_location The theme location.
 * @return void
 */
function toms_nav_menu( string $theme_location = 'primary' ): void {
	wp_nav_menu(
		array(
			'container'      => false,
			'menu_class'     => 'gap-8 relative hidden md:flex',
			'theme_location' => $theme_location,
			'walker'         => new Toms_Dropdown_Walker(),
		)
	);
}

/**
 * A helper for retrieving the navigation menu.
 *
 * @param string $theme_location The theme location.
 * @return void
 */
function toms_off_canvas_menu( string $theme_location = 'off-canvas' ): void {
	wp_nav_menu(
		array(
			'container'      => false,
			'menu_class'     => 'flex flex-col gap-2 relative md:hidden',
			'theme_location' => $theme_location,
			'walker'         => new Toms_OffCanvas_Walker(),
		)
	);
}

/**
 * A helper for registering post types.
 *
 * @param string $name The post type name.
 * @param string $singular The singular name.
 * @param string $plural The plural name.
 * @param array  $args The post type arguments.
 * @return void
 */
function toms_register_post_type( string $name, string $singular, string $plural, array $args ): void {
	$labels = array(
		'name'               => $singular,
		'singular_name'      => $singular,
		'plural_name'        => $plural,
		'menu_name'          => $plural,
		'name_admin_bar'     => $singular,
		'archives'           => $singular . ' ' . __( 'Archives', 'toms' ),
		'attributes'         => $singular . ' ' . __( 'Attributes', 'toms' ),
		'all_items'          => __( 'All', 'toms' ) . ' ' . $plural,
		'add_new'            => __( 'Add New', 'toms' ),
		'add_new_item'       => __( 'Add New', 'toms' ) . ' ' . $singular,
		'edit_item'          => __( 'Edit', 'toms' ) . ' ' . $singular,
		'new_item'           => __( 'New', 'toms' ) . ' ' . $singular,
		'view_item'          => __( 'View', 'toms' ) . ' ' . $singular,
		'search_items'       => __( 'Search', 'toms' ) . ' ' . $plural,
		'not_found'          => __( 'No', 'toms' ) . ' ' . $plural . ' ' . __( 'found', 'toms' ),
		'not_found_in_trash' => __( 'No', 'toms' ) . ' ' . $plural . ' ' . __( 'found in Trash', 'toms' ),
	);

	$default_args = array(
		'labels'             => $labels,
		'public'             => ! empty( $args['public'] ) ? $args['public'] : true,
		'publicly_queryable' => ! empty( $args['publicly_queryable'] ) ? $args['publicly_queryable'] : true,
		'show_ui'            => ! empty( $args['show_ui'] ) ? $args['show_ui'] : true,
		'show_in_menu'       => ! empty( $args['show_in_menu'] ) ? $args['show_in_menu'] : true,
		'show_in_nav_menus'  => ! empty( $args['show_in_nav_menus'] ) ? $args['show_in_nav_menus'] : true,
		'show_in_admin_bar'  => ! empty( $args['show_in_admin_bar'] ) ? $args['show_in_admin_bar'] : true,
		'query_var'          => ! empty( $args['query_var'] ) ? $args['query_var'] : true,
		'show_in_rest'       => ! empty( $args['show_in_rest'] ) ? $args['show_in_rest'] : true,
		'has_archive'        => ! empty( $args['has_archive'] ) ? $args['has_archive'] : true,
		'hierarchical'       => ! empty( $args['hierarchical'] ) ? $args['hierarchical'] : false,
		'menu_icon'          => ! empty( $args['menu_icon'] ) ? $args['menu_icon'] : 'dashicons-admin-post',
		'supports'           => ! empty( $args['supports'] ) ? $args['supports'] : array( 'title', 'editor', 'thumbnail' ),
	);

	$args = wp_parse_args( $args, $default_args );

	register_post_type( $name, $args );
}
