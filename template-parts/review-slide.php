<?php
/**
 * The event card template file.
 *
 * @package toms
 */

$review_id = ! empty( $args['review'] ) ? $args['review'] : get_the_ID();

$review_stars    = get_field( 'stars', $review_id );
$review_text     = get_field( 'text', $review_id );
$review_reviewer = get_field( 'reviewer', $review_id );

$review_image = get_the_post_thumbnail_url( $review_id, 'medium' );

if ( empty( $review_text ) ) {
	return;
}
?>
<article class="grid gap-4 py-6 bg-white md:grid-rows-subgrid md:row-start-1 md:row-end-4 swiper-slide">
	<header>
		<?php
		if ( ! empty( $review_stars ) ) {
			?>
			<span class="flex gap-1" aria-label="<?php echo esc_attr( $review_stars ); ?> stars">
				<?php
				for ( $i = 0; $i < $review_stars; $i++ ) {
					?>
					<i data-feather="star" class="size-3 text-yellow-500"></i>
					<?php
				}
				?>
			</span>
			<?php
		}
		?>
	</header>

	<div>
		<?php echo wp_kses_post( $review_text ); ?>
	</div>

	<footer>
		<?php
		if ( ! empty( $review_reviewer ) ) {
			if ( ! empty( $review_reviewer['name'] ) ) {
				?>
				<p class="text-sm text-gray-700"><?php echo esc_html( $review_reviewer['name'] ); ?></p>
				<?php
			}

			if ( ! empty( $review_reviewer['company'] ) ) {
				?>
				<p class="text-sm text-gray-400"><?php echo esc_html( $review_reviewer['company'] ); ?></p>
				<?php
			}

			if ( ! empty( $review_reviewer['project_url'] ) ) {
				?>
				<a class="text-xs text-gray-500 animated-underline" href="<?php echo esc_url( $review_reviewer['project_url'] ); ?>">
					<?php echo esc_html( $review_reviewer['project_url'] ); ?>
				</a>
				<?php
			}
		}
		?>
	</footer>
</article>
