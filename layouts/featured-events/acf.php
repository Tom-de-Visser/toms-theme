<?php
/**
 * The Featured events layout.
 *
 * @package toms
 */

$layout_name = 'featured-events';

$layouts[] = array(
	'key'        => 'layout_' . $layout_name,
	'name'       => $layout_name,
	'label'      => __( 'Featured events', 'toms' ),
	'display'    => 'block',
	'sub_fields' => array(
		array(
			'key'   => 'field_' . $layout_name . '_title',
			'label' => __( 'Title', 'toms' ),
			'name'  => $layout_name . '_title',
			'type'  => 'text',
		),
		array(
			'key'   => 'field_' . $layout_name . '_description',
			'label' => __( 'Description', 'toms' ),
			'name'  => $layout_name . '_description',
			'type'  => 'textarea',
		),
		array(
			'key'           => 'field_' . $layout_name . '_events',
			'label'         => __( 'Events', 'toms' ),
			'name'          => $layout_name . '_events',
			'type'          => 'relationship',
			'post_type'     => 'event',
			'return_format' => 'id',
		),
		array(
			'key'   => 'field_' . $layout_name . '_button',
			'label' => __( 'Button', 'toms' ),
			'name'  => $layout_name . '_button',
			'type'  => 'link',
		),
	),
);
