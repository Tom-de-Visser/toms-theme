<?php
/**
 * The tabs layout's template file.
 *
 * @package toms
 */

$layout_name = 'tabs';

$tabs_title    = get_sub_field( $layout_name . '_title' );
$tabs_repeater = get_sub_field( $layout_name . '_tabs' );

if ( empty( $tabs_repeater ) ) {
	return;
}
?>
<section class="<?php echo esc_attr( $layout_name ); ?> my-32 pt-24 md:mx-12 lg:mx-24">
	<div class="flex flex-col gap-6">
		<?php
		if ( $tabs_title ) {
			?>
			<h2 class="text-2xl"><?php echo wp_kses_post( $tabs_title ); ?></h2>
			<?php
		}
		?>

		<div class="flex gap-4" role="tablist" aria-label="Tabs">
			<?php
			foreach ( $tabs_repeater as $tab_index => $tab_fields ) {
				$tab_title = $tab_fields['title'];
				?>
				<button class="pb-2 border-b border-transparent aria-selected:border-gray-500 transition-colors duration-500" id="tab-<?php echo esc_attr( $tab_index ); ?>" role="tab" aria-selected="<?php echo 0 === $tab_index ? 'true' : 'false'; ?>" aria-controls="tab-panel-<?php echo esc_attr( $tab_index ); ?>" tabindex="<?php echo 0 === $tab_index ? 0 : -1; ?>" data-tab="<?php echo esc_attr( $tab_index ); ?>">
					<?php echo wp_kses_post( $tab_title ); ?>
				</button>
				<?php
			}
			?>
		</div>

		<?php
		foreach ( $tabs_repeater as $tab_index => $tab_fields ) {
			$tab_content = $tab_fields['content'];
			?>
			<div class="<?php echo 0 === $tab_index ? '' : 'hidden'; ?>" id="tab-panel-<?php echo esc_attr( $tab_index ); ?>" role="tabpanel" aria-labelledby="tab-<?php echo esc_attr( $tab_index ); ?>" tabindex="0" aria-hidden="<?php echo 0 === $tab_index ? 'false' : 'true'; ?>">
				<?php echo wp_kses_post( apply_filters( 'the_content', $tab_content ) ); ?>
			</div>
			<?php
		}
		?>
	</div>
</section>
