<?php
/**
 * Register ACF theme settings.
 *
 * @package toms
 */

/**
 * Register ACF theme settings.
 *
 * @return void
 */
function toms_add_theme_settings(): void {
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
			'fields'                => array(
				array(
					'key'       => 'field_theme_settings_general_tab',
					'label'     => __( 'General', 'strl' ),
					'name'      => 'general_tab',
					'type'      => 'tab',
					'placement' => 'left',
				),
				array(
					'key'        => 'field_theme_settings_branding',
					'label'      => __( 'Branding', 'strl' ),
					'name'       => 'branding',
					'type'       => 'group',
					'sub_fields' => array(
						array(
							'key'   => 'field_theme_settings_branding_primary_color',
							'label' => __( 'Primary color', 'strl' ),
							'name'  => 'primary_color',
							'type'  => 'color_picker',
						),
						array(
							'key'   => 'field_theme_settings_branding_logo',
							'label' => __( 'Logo', 'strl' ),
							'name'  => 'logo',
							'type'  => 'image',
						),
					),
				),
				array(
					'key'       => 'field_theme_settings_socials_tab',
					'label'     => __( 'Socials', 'strl' ),
					'name'      => 'socials_tab',
					'type'      => 'tab',
					'placement' => 'left',
				),
				array(
					'key'        => 'field_theme_settings_socials',
					'label'      => __( 'Socials', 'strl' ),
					'name'       => 'socials',
					'type'       => 'group',
					'sub_fields' => array(
						array(
							'key'   => 'field_theme_settings_socials_github',
							'label' => __( 'GitHub', 'strl' ),
							'name'  => 'github',
							'type'  => 'url',
						),
						array(
							'key'   => 'field_theme_settings_socials_linkedin',
							'label' => __( 'LinkedIn', 'strl' ),
							'name'  => 'linkedin',
							'type'  => 'url',
						),
						array(
							'key'   => 'field_theme_settings_socials_instagram',
							'label' => __( 'Instagram', 'strl' ),
							'name'  => 'instagram',
							'type'  => 'url',
						),
					),
				),
			),
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
add_action( 'acf/include_fields', 'toms_add_theme_settings' );
