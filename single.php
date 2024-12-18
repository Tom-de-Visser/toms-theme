<?php
/**
 * The theme's single post template.
 *
 * @package toms
 */

get_header();

if ( have_posts() ) {
	while ( have_posts() ) {
		the_post();
		?>
		<article>
			<header>
				<h1><?php the_title(); ?></h1>
			</header>
			<div>
				<?php the_content(); ?>
			</div>
		</article>
		<?php
	}
}

get_footer();
