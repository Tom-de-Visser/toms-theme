<?php
/**
 * The default reviews layout.
 *
 * @package toms
 */

$layout_name = 'reviews';

$layouts[] = array(
	'key'        => 'layout_' . $layout_name,
	'name'       => $layout_name,
	'label'      => __( 'Reviews', 'toms' ),
	'display'    => 'block',
	'sub_fields' => array(
		array(
			'key'   => 'field_' . $layout_name . '_title',
			'label' => __( 'Title', 'toms' ),
			'name'  => $layout_name . '_title',
			'type'  => 'text',
		),
		array(
			'key'     => 'field_' . $layout_name . '_reviews',
			'label'   => __( 'Reviews', 'toms' ),
			'name'    => 'reviews',
			'type'    => 'message',
			'message' => __( 'Add reviews in the Reviews post type.', 'toms' ),
		),
	),
);
