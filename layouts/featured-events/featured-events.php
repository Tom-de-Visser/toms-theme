<?php
/**
 * The Featured events layout's template file.
 *
 * @package toms
 */

$layout_name = 'featured-events';

$events_title       = get_sub_field( $layout_name . '_title' );
$events_description = get_sub_field( $layout_name . '_description' );
$featured_events    = get_sub_field( $layout_name . '_events' );
$events_button      = get_sub_field( $layout_name . '_button' );

if ( empty( $featured_events ) ) {
	return;
}
?>
<section class="<?php echo esc_attr( $layout_name ); ?> my-32 md:mx-12 lg:mx-24">
	<div class="flex flex-col gap-2">
		<?php
		if ( $events_title ) {
			?>
			<h2 class="text-2xl"><?php echo wp_kses_post( $events_title ); ?></h2>
			<?php
		}

		if ( $events_description ) {
			?>
			<div>
				<?php echo wp_kses_post( $events_description ); ?>
			</div>
			<?php
		}
		?>

		<div class="grid grid-cols-1 md:grid-cols-2 grid-rows-[auto_1fr_auto] my-6 lg:grid-cols-3 gap-2">
			<?php
			foreach ( $featured_events as $event ) {
				toms_template_part( 'event', 'card', array( 'event' => $event ) );
			}
			?>
		</div>

		<?php
		if ( $events_button ) {
			?>
			<a href="<?php echo esc_url( $events_button['url'] ); ?>" class="button"><?php echo esc_html( $events_button['title'] ); ?></a>
			<?php
		}
		?>
	</div>
</section>
