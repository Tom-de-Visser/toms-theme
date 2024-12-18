<?php
/**
 * The default hero layout.
 *
 * @package toms
 */

$layout_name = 'hero';

$layout = array(
	'key'        => 'layout_' . $layout_name,
	'name'       => $layout_name,
	'label'      => __( 'Hero', 'toms' ),
	'display'    => 'block',
	'sub_fields' => array(
		array(
			'key'   => 'field_' . $layout_name . '_title',
			'label' => __( 'Title', 'toms' ),
			'name'  => $layout_name . '_title',
			'type'  => 'text',
		),
	),
);
