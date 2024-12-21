<?php
/**
 * Register ACF layouts.
 *
 * @package toms
 */

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
}
add_action( 'acf/include_fields', 'toms_add_acf_layouts' );

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
