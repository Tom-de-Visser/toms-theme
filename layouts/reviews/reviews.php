<?php
/**
 * The reviews layout's template file.
 *
 * @package toms
 */

$layout_name = 'reviews';

$reviews_title = get_sub_field( $layout_name . '_title' );

$args = array(
	'post_type'      => 'review',
	'posts_per_page' => -1,
);

$reviews = new WP_Query( $args );

if ( ! $reviews->have_posts() ) {
	return;
}
?>
<section class="<?php echo esc_attr( $layout_name ); ?> my-32 md:mx-12 lg:mx-24">
	<div class="flex flex-col gap-6">
		<?php
		if ( $reviews_title ) {
			?>
			<h2 class="text-2xl"><?php echo wp_kses_post( $reviews_title ); ?></h2>
			<?php
		}
		?>
	</div>

	<div class="swiper-reviews">
		<div class="swiper-wrapper">
			<?php
			while ( $reviews->have_posts() ) {
				$reviews->the_post();
				toms_template_part( 'review', 'slide' );
			}
			wp_reset_postdata();
			?>
		</div>

		<div class="flex justify-between gap-2 items-center">
			<div class="flex gap-2">
				<button class="swiper-button-prev-review" aria-label="Previous review">
					<i data-feather="arrow-left"></i>
				</button>
				<button class="swiper-button-next-review" aria-label="Next review">
					<i data-feather="arrow-right"></i>
				</button>
			</div>

			<div class="review-pagination !w-fit"></div>
		</div>
	</div>
</section>
