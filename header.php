<?php
/**
 * The theme's header.
 *
 * @package toms
 */

$site_logo = get_field( 'branding_logo', 'option' );
?>
<!doctype html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<?php wp_head(); ?>
	</head>

	<body <?php body_class(); ?>>
		<?php wp_body_open(); ?>

		<header id="site-header" class="bg-white shadow-sm h-24 px-6 md:px-12 fixed flex z-20 items-center w-full justify-between">
			<a href="/">
				<?php
				if ( $site_logo ) {
					?>
					<img src="<?php echo esc_url( $site_logo['url'] ); ?>" alt="<?php echo esc_attr( $site_logo['alt'] ); ?>" class="h-8">
					<?php
				} else {
					bloginfo( 'name' );
				}
				?>
			</a>

			<nav class="hidden md:flex">
				<?php toms_nav_menu(); ?>
			</nav>

			<button id="off-canvas-toggler" class="md:hidden" aria-label="<?php esc_attr_e( 'Toggle navigation', 'toms' ); ?>">
				<i data-feather="menu"></i>
			</button>
		</header>

		<div id="off-canvas" class="md:hidden transition-transform ease-out duration-300 bg-white p-6 overflow-auto fixed pointer-events-none z-10 w-full top-[var(--toms-header-height)] h-[calc(100dvh-var(--toms-header-height))] translate-x-full shadow-lg">
			<?php toms_off_canvas_menu(); ?>
		</div>

		<main class="px-6 md:px-12 lg:px-24">
