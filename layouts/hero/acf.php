<?php
/**
 * The default hero layout.
 *
 * @package toms
 */

$layout_name = 'hero';

$layouts[] = array(
	'key'        => 'layout_' . $layout_name,
	'name'       => $layout_name,
	'label'      => __( 'Hero', 'toms' ),
	'display'    => 'block',
	'sub_fields' => array(
		array(
			'key'   => 'field_' . $layout_name . '_pretitle',
			'label' => __( 'Pretitle', 'toms' ),
			'name'  => $layout_name . '_pretitle',
			'type'  => 'text',
		),
		array(
			'key'      => 'field_' . $layout_name . '_title',
			'label'    => __( 'Title', 'toms' ),
			'name'     => $layout_name . '_title',
			'type'     => 'text',
			'required' => true,
		),
		array(
			'key'   => 'field_' . $layout_name . '_text',
			'label' => __( 'Text', 'toms' ),
			'name'  => $layout_name . '_text',
			'type'  => 'text',
		),
		array(
			'key'   => 'field_' . $layout_name . '_button',
			'label' => __( 'Button', 'toms' ),
			'name'  => $layout_name . '_button',
			'type'  => 'link',
		),
	),
);
