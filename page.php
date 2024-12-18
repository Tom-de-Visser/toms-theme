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
		<h1 class="text-xl font-bold"><?php the_title(); ?></h1>
		<?php the_content(); ?>
		<?php
	}
}

get_footer();
