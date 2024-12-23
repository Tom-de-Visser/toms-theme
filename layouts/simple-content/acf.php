<?php
/**
 * The simple content layout.
 *
 * @package toms
 */

$layout_name = 'simple-content';

$layouts[] = array(
	'key'        => 'layout_' . $layout_name,
	'name'       => $layout_name,
	'label'      => __( 'Simple content', 'toms' ),
	'display'    => 'block',
	'sub_fields' => array(
		array(
			'key'   => 'field_' . $layout_name . '_title',
			'label' => __( 'Title', 'toms' ),
			'name'  => $layout_name . '_title',
			'type'  => 'text',
		),
		array(
			'key'      => 'field_' . $layout_name . '_content',
			'label'    => __( 'Content', 'toms' ),
			'name'     => $layout_name . '_content',
			'type'     => 'wysiwyg',
			'required' => true,
			'toolbar'  => 'basic',
		),
		array(
			'key'   => 'field_' . $layout_name . '_button',
			'label' => __( 'Button', 'toms' ),
			'name'  => $layout_name . '_button',
			'type'  => 'link',
		),
	),
);
