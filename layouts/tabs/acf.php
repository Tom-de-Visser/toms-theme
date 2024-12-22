<?php
/**
 * The default tabs layout.
 *
 * @package toms
 */

$layout_name = 'tabs';

$layouts[] = array(
	'key'        => 'layout_' . $layout_name,
	'name'       => $layout_name,
	'label'      => __( 'Tabs', 'toms' ),
	'display'    => 'block',
	'sub_fields' => array(
		array(
			'key'   => 'field_' . $layout_name . '_title',
			'label' => __( 'Title', 'toms' ),
			'name'  => $layout_name . '_title',
			'type'  => 'text',
		),
		array(
			'key'          => 'field_' . $layout_name . '_tabs',
			'label'        => __( 'Tabs', 'toms' ),
			'name'         => $layout_name . '_tabs',
			'type'         => 'repeater',
			'layout'       => 'block',
			'button_label' => __( 'Add tab', 'toms' ),
			'required'     => true,
			'sub_fields'   => array(
				array(
					'key'      => 'field_' . $layout_name . '_tab_title',
					'label'    => __( 'Tab title', 'toms' ),
					'name'     => 'title',
					'type'     => 'text',
					'required' => true,
				),
				array(
					'key'      => 'field_' . $layout_name . '_tab_content',
					'label'    => __( 'Tab content', 'toms' ),
					'name'     => 'content',
					'type'     => 'wysiwyg',
					'required' => true,
				),
			),
		),
	),
);
