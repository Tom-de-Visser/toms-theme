<?php
/**
 * The event card template file.
 *
 * @package toms
 */

$event_id          = ! empty( $args['event'] ) ? $args['event'] : get_the_ID();
$event_title       = get_the_title( $event_id );
$event_date        = get_field( 'date', $event_id );
$event_price       = get_field( 'price', $event_id );
$event_location    = get_field( 'location', $event_id );
$event_booking_url = get_field( 'booking_url', $event_id );
$event_description = get_field( 'description', $event_id );
$event_image       = get_the_post_thumbnail_url( $event_id, 'medium' );

if ( strtotime( $event_date ) < time() ) {
	return;
}
?>
<article class="grid gap-4 p-6 bg-white shadow-sm border border-gray-200 md:grid-rows-subgrid md:row-start-1 md:row-end-4">
	<header class="row-start-1 row-end-2">
		<?php
		if ( $event_image ) {
			?>
			<img class="object-cover w-full h-48 mb-4" src="<?php echo esc_url( $event_image ); ?>" alt="<?php echo esc_attr( $event_title ); ?>">
			<?php
		}
		?>
		<h3 class="font-bold text-lg"><?php echo esc_html( $event_title ); ?></h3>
		<time class="text-gray-500 text-sm" datetime="<?php echo esc_attr( $event_date ); ?>">
			<?php echo esc_html( date_i18n( get_option( 'date_format' ), strtotime( $event_date ) ) ); ?>
		</time>
		<div class="grid grid-cols-1 gap-1 mt-2">
			<?php
			if ( $event_price ) {
				?>
				<span class="flex gap-1 text-sm items-center"><i data-feather="dollar-sign" class="size-3"></i><?php echo esc_html( $event_price ); ?></span>
				<?php
			}

			if ( $event_location ) {
				?>
				<span class="flex gap-1 text-sm items-center"><i data-feather="map-pin" class="size-3">></i><?php echo esc_html( $event_location ); ?></span>
				<?php
			}
			?>
		</div>
	</header>
	<div class="row-start-2 row-end-3">
		<?php echo wp_kses_post( $event_description ); ?>
	</div>
	<footer class="row-start-3 row-end-4">
		<a class="button" href="<?php echo esc_url( $event_booking_url ); ?>" target="_blank">
			<?php esc_html_e( 'Get tickets', 'toms' ); ?>
			<i data-feather="external-link"></i>
		</a>
	</footer>
</article>
