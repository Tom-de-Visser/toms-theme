<?php
/**
 * The hero layout's template file.
 *
 * @package toms
 */

$layout_name = 'hero';

$hero_title    = get_sub_field( $layout_name . '_title' );
$hero_pretitle = get_sub_field( $layout_name . '_pretitle' );
$hero_text     = get_sub_field( $layout_name . '_text' );
$hero_button   = get_sub_field( $layout_name . '_button' );
?>
<section class="<?php echo esc_attr( $layout_name ); ?> my-16 pt-24 md:mx-12 lg:mx-24">
	<div class="flex flex-col gap-6">
		<div class="flex flex-col">
			<?php
			if ( $hero_pretitle ) {
				?>
				<span class="text-sm text-gray-500"><?php echo wp_kses_post( $hero_pretitle ); ?></span>
				<?php
			}
			?>

			<h1 class="text-2xl"><?php echo wp_kses_post( $hero_title ); ?></h1>

			<?php
			if ( $hero_text ) {
				?>
				<p><?php echo wp_kses_post( $hero_text ); ?></p>
				<?php
			}
			?>
		</div>

		<?php
		if ( $hero_button ) {
			?>
			<a href="<?php echo esc_url( $hero_button['url'] ); ?>" class="button"><?php echo esc_html( $hero_button['title'] ); ?></a>
			<?php
		}
		?>
	</div>
</section>
