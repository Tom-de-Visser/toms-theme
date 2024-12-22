<?php
/**
 * Register ACF fields for reviews.
 *
 * @package toms
 */

/**
 * Register ACF fields for reviews.
 *
 * @return void
 */
function toms_add_review_fields(): void {
	acf_add_local_field_group(
		array(
			'key'                   => 'group_review_fields',
			'title'                 => __( 'Review', 'toms' ),
			'fields'                => array(
				array(
					'key'      => 'field_review_stars',
					'label'    => __( 'Stars', 'toms' ),
					'name'     => 'stars',
					'type'     => 'number',
					'min'      => 1,
					'max'      => 5,
					'required' => true,
					'wrapper'  => array(
						'width' => '20',
					),
				),
				array(
					'key'      => 'field_review_text',
					'label'    => __( 'Text', 'toms' ),
					'name'     => 'text',
					'type'     => 'textarea',
					'required' => true,
					'wrapper'  => array(
						'width' => '80',
					),
				),
				array(
					'key'        => 'field_review_reviewer',
					'label'      => __( 'Reviewer', 'toms' ),
					'name'       => 'reviewer',
					'type'       => 'group',
					'sub_fields' => array(
						array(
							'key'      => 'field_review_reviewer_name',
							'label'    => __( 'Name', 'toms' ),
							'name'     => 'name',
							'type'     => 'text',
							'required' => true,
						),
						array(
							'key'     => 'field_review_reviewer_company',
							'label'   => __( 'Company', 'toms' ),
							'name'    => 'company',
							'type'    => 'text',
							'wrapper' => array(
								'width' => '50',
							),
						),
						array(
							'key'     => 'field_review_project_url',
							'label'   => __( 'Project URL', 'toms' ),
							'name'    => 'project_url',
							'type'    => 'url',
							'wrapper' => array(
								'width' => '50',
							),
						),
					),
				),
			),
			'location'              => array(
				array(
					array(
						'param'    => 'post_type',
						'operator' => '==',
						'value'    => 'review',
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
add_action( 'acf/include_fields', 'toms_add_review_fields' );
