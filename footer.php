<?php
/**
 * The theme's footer.
 *
 * @package toms
 */

$socials = get_field( 'socials', 'options' );
?>
		</main>

		<footer class="flex flex-col gap-4 justify-center items-center p-6">
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

			<div>
				<?php toms_credits(); ?>
			</div>
		</footer>
	<?php wp_footer(); ?>
	</body>
</html>
