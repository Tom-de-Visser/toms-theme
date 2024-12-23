<?php
/**
 * The trusted by layout.
 *
 * @package toms
 */

$layout_name = 'trusted-by';

$layouts[] = array(
	'key'        => 'layout_' . $layout_name,
	'name'       => $layout_name,
	'label'      => __( 'Trusted by', 'toms' ),
	'display'    => 'block',
	'sub_fields' => array(
		array(
			'key'   => 'field_' . $layout_name . '_title',
			'label' => __( 'Title', 'toms' ),
			'name'  => $layout_name . '_title',
			'type'  => 'text',
		),
		array(
			'key'        => 'field_' . $layout_name . '_companies',
			'label'      => __( 'Companies', 'toms' ),
			'name'       => $layout_name . '_companies',
			'type'       => 'repeater',
			'required'   => true,
			'sub_fields' => array(
				array(
					'key'      => 'field_' . $layout_name . '_logo',
					'label'    => __( 'Logo', 'toms' ),
					'name'     => $layout_name . '_logo',
					'type'     => 'image',
					'required' => true,
					'wrapper'  => array(
						'width' => '25',
					),
				),
				array(
					'key'   => 'field_' . $layout_name . '_link',
					'label' => __( 'Link', 'toms' ),
					'name'  => $layout_name . '_link',
					'type'  => 'link',
				),
			),
		),
	),
);
