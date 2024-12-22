<?php
/**
 * The simple content layout's template file.
 *
 * @package toms
 */

$layout_name = 'simple-content';

$content_title  = get_sub_field( $layout_name . '_title' );
$simple_content = get_sub_field( $layout_name . '_content' );
$content_button = get_sub_field( $layout_name . '_button' );
?>
<section class="<?php echo esc_attr( $layout_name ); ?> my-32 md:mx-16 lg:mx-48">
	<div class="flex flex-col gap-2">
		<?php
		if ( $content_title ) {
			?>
			<h2 class="text-2xl"><?php echo wp_kses_post( $content_title ); ?></h2>
			<?php
		}
		?>

		<div>
			<?php echo wp_kses_post( $simple_content ); ?>
		</div>

		<?php
		if ( $content_button ) {
			?>
			<a href="<?php echo esc_url( $content_button['url'] ); ?>" class="button"><?php echo esc_html( $content_button['title'] ); ?></a>
			<?php
		}
		?>
	</div>
</section>
