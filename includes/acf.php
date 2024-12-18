<?php
/**
 * Register ACF layouts.
 *
 * @package toms
 */

if ( function_exists( 'acf_add_local_field_group' ) ) {
	/**
	 * Register ACF layouts.
	 *
	 * @return void
	 */
	function toms_add_acf_layouts(): void {
		$layouts = toms_get_layouts();

		acf_add_local_field_group(
			array(
				'key'                   => 'group_layouts',
				'title'                 => 'Layouts Group',
				'fields'                => array(
					array(
						'key'          => 'field_layouts',
						'label'        => __( 'Layouts', 'toms' ),
						'name'         => 'layouts',
						'type'         => 'flexible_content',
						'layouts'      => $layouts,
						'button_label' => __( 'Add new layout', 'toms' ),
					),
				),
				'location'              => array(
					array(
						array(
							'param'    => 'post_type',
							'operator' => '==',
							'value'    => 'page',
						),
					),
				),
				'position'              => 'acf_after_title',
				'label_placement'       => 'top',
				'instruction_placement' => 'label',
				'active'                => true,
				'hide_on_screen'        => array(
					0 => 'the_content',
				),
			),
		);

		acf_add_options_page(
			array(
				'page_title' => __( 'Theme Settings', 'strl' ),
				'menu_title' => __( 'Theme Settings', 'strl' ),
				'menu_slug'  => 'theme-settings',
				'capability' => 'edit_posts',
				'redirect'   => false,
			),
		);

		acf_add_local_field_group(
			array(
				'key'                   => 'field_theme_settings',
				'title'                 => __( 'Theme Settings', 'strl' ),
				'fields'                => array(),
				'location'              => array(
					array(
						array(
							'param'    => 'options_page',
							'operator' => '==',
							'value'    => 'theme-settings',
						),
					),
				),
				'menu_order'            => 0,
				'label_placement'       => 'top',
				'instruction_placement' => 'label',
				'active'                => true,
			)
		);
	}
	add_action( 'acf/include_fields', 'toms_add_acf_layouts' );
}

/**
 * Collect all layouts from the layouts directory.
 *
 * @return array $layouts All layouts.
 */
function toms_get_layouts(): array {
	$layouts     = array();
	$layouts_dir = THEME_DIR . '/layouts';
	$layout_dirs = array_diff( scandir( $layouts_dir ), array( '..', '.' ) );

	foreach ( $layout_dirs as $dir ) {
		$acf_file = "$layouts_dir/$dir/acf.php";

		if ( file_exists( $acf_file ) ) {
			include_once $acf_file;
		}
	}

	return $layouts;
}

if ( function_exists( 'acf_add_local_field_group' ) ) {
	/**
	 * Register ACF fields for custom post types.
	 *
	 * @return void
	 */
	function toms_add_acf_fields(): void {
		acf_add_local_field_group(
			array(
				'key'                   => 'group_reviews',
				'title'                 => 'Reviews Group',
				'fields'                => array(),
				'location'              => array(
					array(
						array(
							'param'    => 'post_type',
							'operator' => '==',
							'value'    => 'post',
						),
					),
				),
				'position'              => 'acf_after_title',
				'label_placement'       => 'top',
				'instruction_placement' => 'label',
				'active'                => true,
				'hide_on_screen'        => array(
					0 => 'featured_image',
				),
			),
		);
	}
	add_action( 'acf/include_fields', 'toms_add_acf_fields' );
}
