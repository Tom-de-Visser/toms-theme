<?php
/**
 * Register ACF fields for events.
 *
 * @package toms
 */

/**
 * Register ACF fields for events.
 *
 * @return void
 */
function toms_add_event_fields(): void {
	acf_add_local_field_group(
		array(
			'key'                   => 'group_event_fields',
			'title'                 => __( 'Event', 'toms' ),
			'fields'                => array(
				array(
					'key'           => 'field_event_date',
					'label'         => __( 'Date', 'toms' ),
					'name'          => 'date',
					'type'          => 'date_time_picker',
					'first_day'     => 1,
					'return_format' => 'Y-m-d H:i:s',
					'wrapper'       => array(
						'width' => '50',
					),
				),
				array(
					'key'     => 'field_event_price',
					'label'   => __( 'Price', 'toms' ),
					'name'    => 'price',
					'type'    => 'text',
					'wrapper' => array(
						'width' => '50',
					),
				),
				array(
					'key'     => 'field_event_location',
					'label'   => __( 'Location', 'toms' ),
					'name'    => 'location',
					'type'    => 'text',
					'wrapper' => array(
						'width' => '50',
					),
				),
				array(
					'key'     => 'field_event_booking_url',
					'label'   => __( 'Booking URL', 'toms' ),
					'name'    => 'booking_url',
					'type'    => 'url',
					'wrapper' => array(
						'width' => '50',
					),
				),
				array(
					'key'     => 'field_event_description',
					'label'   => __( 'Description', 'toms' ),
					'name'    => 'description',
					'type'    => 'wysiwyg',
					'toolbar' => 'basic',
				),
			),
			'location'              => array(
				array(
					array(
						'param'    => 'post_type',
						'operator' => '==',
						'value'    => 'event',
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
add_action( 'acf/include_fields', 'toms_add_event_fields' );
