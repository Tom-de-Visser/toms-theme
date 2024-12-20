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

		while ( have_rows( 'layouts' ) ) {
			the_row();

			$layout = get_row_layout();
			get_template_part( 'layouts/' . $layout . '/' . $layout );
		}
	}
}

get_footer();
