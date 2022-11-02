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
			
			<header class="entry-header h-80 grid grid-cols-header bg-gradient-to-t from-accent-default to-slate-900 overflow-hidden">

				<?php 
				
				$header_image = get_field(get_post_type() . '_header', 'options');
				$contain_image = get_field($post_type . '_contain_header', 'options');
				?>
	
				<?php 
				if($header_image):?>
				<h1 class="page-title z-0 w-fit col-start-2 row-start-1 row-span-1 place-self-center justify-self-start bg-primary-default has-gigantic-font-size px-6 font-black"><?php single_post_title();?></h1>
				<img class="<?php print($contain_image ? 'col-start-3 row-start-1 h-80 object-contain p-6' : 'col-span-full w-full row-start-1 h-80 object-cover');?>" src="<?php echo $header_image['url'];?>" src="<?php echo $header_image['url'];?>" alt="<?php echo $header_image['alt'];?>">
			
				<?php else:?>
				
				<h1 class="page-title z-0 w-fit col-start-2 row-start-1 row-span-1 place-self-center justify-self-start text-gigantic font-black text-primary-default"><?php single_post_title();?></h1>
			
				<?php endif;
				?>
			</header><!-- .page-header -->

				<div class="pt-20 lg:py-6 bg-primary-default grid my-12 rounded-md w-11/12 md:w-2/3 mx-auto grid-cols-1 md:grid-cols-4 gap-6">

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
				get_template_part( 'template-parts/content', get_post_type() );

			endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>
		</div>
	</main><!-- #main -->

<?php
get_sidebar();
get_footer();
