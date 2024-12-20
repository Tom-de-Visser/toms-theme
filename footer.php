<?php
/**
 * The theme's footer.
 *
 * @package toms
 */

$socials = get_field( 'socials', 'options' );
?>
		</main>

		<footer class="flex flex-col gap-4 justify-center items-center px-6 md:px-12 lg:px-24">
			<div class="grid grid-cols-2 gap-4 md:grid-cols-4 my-16 pt-24 md:mx-12 lg:mx-24">
				<div>
					<?php dynamic_sidebar( 'footer-1' ); ?>
				</div>
				<div>
					<?php dynamic_sidebar( 'footer-2' ); ?>
				</div>
				<div>
					<?php dynamic_sidebar( 'footer-3' ); ?>
				</div>
				<div>
					<?php dynamic_sidebar( 'footer-4' ); ?>
				</div>
			</div>

			<?php
			if ( ! empty( $socials ) ) {
				?>
				<div class="md:hidden">
					<ul class="flex gap-4 items-center">
						<?php
						foreach ( $socials as $social => $url ) {
							?>
							<li>
								<a href="<?php echo esc_url( $url ); ?>" aria-label="<?php echo esc_attr( $social ); ?>" rel="noreferrer noopener" target="_blank">
									<i data-feather="<?php echo esc_attr( $social ); ?>"></i>
								</a>
							</li>
							<?php
						}
						?>
					</ul>
				</div>
				<?php
			}
			?>

			<div class="py-8">
				<?php toms_credits(); ?>
			</div>
		</footer>
	<?php wp_footer(); ?>
	</body>
</html>
