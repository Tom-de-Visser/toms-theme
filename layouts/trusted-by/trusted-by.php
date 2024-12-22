<?php
/**
 * The trusted by layout's template file.
 *
 * @package toms
 */

$layout_name = 'trusted-by';

$trusted_by_title = get_sub_field( $layout_name . '_title' );
$companies        = get_sub_field( $layout_name . '_companies' );
?>
<section class="<?php echo esc_attr( $layout_name ); ?> my-32 md:mx-12 lg:mx-24">
	<div class="flex flex-col gap-2 text-center">
		<?php
		if ( $trusted_by_title ) {
			?>
			<h2 class="text-xl mb-4"><?php echo wp_kses_post( $trusted_by_title ); ?></h2>
			<?php
		}
		?>

		<?php
		if ( $companies ) {
			?>
			<div class="grid grid-cols-2 md:grid-cols-4 gap-4">
				<?php
				foreach ( $companies as $company ) {
					?>
					<div class="w-40 h-12 filter grayscale hover:grayscale-0 transition duration-300 p-2">
						<?php
						if ( $company[ $layout_name . '_link' ] ) {
							?>
							<a href="<?php echo esc_url( $company[ $layout_name . '_link' ]['url'] ); ?>">
								<img class="object-contain size-full" src="<?php echo esc_url( $company[ $layout_name . '_logo' ]['url'] ); ?>" alt="<?php echo esc_attr( $company[ $layout_name . '_logo' ]['alt'] ); ?>">
							</a>
							<?php
						} else {
							?>
							<img src="<?php echo esc_url( $company[ $layout_name . '_logo' ]['url'] ); ?>" alt="<?php echo esc_attr( $company[ $layout_name . '_logo' ]['alt'] ); ?>">
							<?php
						}
						?>
					</div>
					<?php
				}
				?>
			</div>
			<?php
		}
		?>
	</div>
</section>
