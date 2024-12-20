<?php
/**
 * The hero layout's template file.
 *
 * @package toms
 */

$layout_name = 'hero';
$hero_title  = get_sub_field( $layout_name . '_title' );
?>
<section class="<?php echo esc_attr( $layout_name ); ?> pt-24 md:mx-12 lg:mx-24">
	<h1><?php echo wp_kses_post( $hero_title ); ?></h1>
</section>
