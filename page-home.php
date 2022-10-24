<?php
/**
 * * Template Name: Home Page Template
 *
 * @package blockhaus
 */

get_header();
?>

	<main id="primary" class="main-content bg-neutral-light-100">

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', 'home' );

		endwhile; // End of the loop.
		?>

	</main><!-- #main -->

<?php

get_footer();
