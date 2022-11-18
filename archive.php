<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package blockhaus
 */

get_header();

$post_type = get_post_type();
$post_type_obj = get_post_type_object( $post_type );

?>

	<!-- <main id="primary" class="pt-20 lg:p-6 bg-primary-default my-12 rounded-md w-11/12 md:w-3/4 mx-auto grid-cols-1 md:grid-cols-3 gap-6"> -->
		<main class="main-content lg:pb-20 bg-neutral-light-100">
			<?php 
					
					get_template_part('components/content', 'full-width-header');

			if($post_type === 'articles-and-reviews'): 
				
				get_template_part('components/content', 'featured-articles');

		 endif; ?>

			<div class="grid my-6 lg:my-12 w-11/12 lg:w-2/3 mx-auto grid-cols-1 <?php print ($post_type === 'journal_editions') ? ' md:grid-cols-2' : ' md:grid-cols-3';?> gap-6">

			<div class="col-span-full"><?php echo blockhaus_custom_form("Search " . $post_type_obj->labels->name . " ..."); ?></div>
				
			<?php $description = get_field($post_type . '_page_description', "options");

			if($description):?>

			<p class="col-span-full"><?php echo $description;?></p>

			<?php endif;
		

			if ( have_posts() ) :
			/* Start the Loop */
			while ( have_posts() ) :
			the_post();

			// 	/*
			// 	 * Include the Post-Type-specific template for the content.
			// 	 * If you want to override this in a child theme, then include a file
			// 	 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
			// 	 */
			get_template_part( 'layouts/content', get_post_type() );

			endwhile;

			the_posts_navigation(
				array(
					'prev_text' => '<span aria-hidden="true" class="nav-subtitle font-bold"><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
					<path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
				</svg></span> <span class="nav-title pl-2">Older content</span>',
					'next_text' => '<span class="nav-title pl-2">Newer content</span><span aria-hidden="true" class="nav-subtitle font-bold"><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
					<path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
				</svg></span>',
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
