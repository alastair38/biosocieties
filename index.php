<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package blockhaus
 */

get_header();
?>

	<!-- <main id="primary" class="pt-20 lg:p-6 bg-primary-default my-12 rounded-md w-11/12 md:w-3/4 mx-auto grid-cols-1 md:grid-cols-3 gap-6"> -->

	<main class="main-content lg:pb-20">

		<?php
		if ( have_posts() ) :

			if ( is_home() && ! is_front_page() ) :?>
			<?php 
				
			
	get_template_part('components/content', 'full-width-header');?>

				<div class="bg-primary-default grid my-6 md:my-12 rounded-md w-11/12 lg:w-2/3 mx-auto grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

				<?php
			endif;

			$description = get_field(get_post_type() . '_page_description', "options");

			if($description):?>

			
			<p class="py-6 col-span-full"><?php echo $description;?></p>

			<?php endif;

			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				/*
				 * Include the Post-Type-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
				 */
				get_template_part( 'layouts/content', get_post_type() );

			endwhile;

			the_posts_navigation(
				array(
					'next_text' => '<span aria-hidden="true" class="nav-subtitle font-bold"><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
					<path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
				</svg></span><span class="nav-title pl-2">Newer content</span>',
					'prev_text' => '<span class="nav-title pl-2">Older content</span><span aria-hidden="true" class="nav-subtitle font-bold"><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
					<path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
				</svg></span> ',
					
				)
			);

		else :

			get_template_part( 'layouts/content', 'none' );

		endif;
		?>
		</div>
	</main><!-- #main -->

<?php

get_footer();
