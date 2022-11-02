<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package blockhaus
 */

get_header();

$header_image = get_field(get_post_type() . '_header', 'options');
$transparent =  get_field(get_post_type() . '_page_transparent_header', 'options');
$background =  get_field(get_post_type() . '_choose_background', 'options');
if(!$background):
	$background = 'no';
endif;
$post_type = get_post_type();
if($post_type === 'journal_editions'):
	$cols = 'md:grid-cols-3';
endif;

if($post_type === 'video'):
	$cols = 'md:grid-cols-2';
endif;

?>

	<!-- <main id="primary" class="pt-20 lg:p-6 bg-primary-default my-12 rounded-md w-11/12 md:w-3/4 mx-auto grid-cols-1 md:grid-cols-3 gap-6"> -->
		<main class="main-content lg:pb-20 bg-neutral-light-100">

			<!-- <header class="col-span-full"> -->

			<header class="entry-header grid grid-cols-header relative h-80 has-<?php echo $background;?>-background-color has-background bg-curves bg-fixed bg-cover overflow-hidden">

			<?php 

			the_archive_title( '<h1 class="page-title z-0 mb-6 w-fit col-start-2 row-start-1 place-self-end justify-self-start bg-primary-default has-gigantic-font-size px-6 font-black">', '</h1>' );
			if($header_image):
			if($transparent):?>
			<img class="h-80 place-self-end p-2 col-start-2 row-start-1 object-cover" src="<?php echo $header_image['url'];?>" alt="<?php echo $header_image['alt'];?>">
			<?php else: ?>

			<img class="h-80 w-full col-span-full row-start-1 object-cover" src="<?php echo $header_image['url'];?>" alt="<?php echo $header_image['alt'];?>">

			<?php endif;
			endif; ?>
			</header><!-- .page-header -->


			<div class="pt-20 lg:py-6 grid my-12 w-11/12 md:w-2/3 mx-auto grid-cols-1 <?php print (get_post_type() === 'journal_editions' || get_post_type() === 'video') ? ' md:grid-cols-2' : ' md:grid-cols-3';?> gap-6">
				
			<?php $description = get_field(get_post_type() . '_page_description', "options");

			if($description):?>

			<p class="col-span-full"><?php echo $description;?></p>

			<?php endif;
			if($post_type === 'articles-and-reviews'):

			$taxonomies = get_terms( array(
				'taxonomy' => 'articles_and_reviews_tax',
				'hide_empty' => true
			) );
			
			if ( !empty($taxonomies) ) :
				$output = '<ul class="col-span-full flex gap-6 mb-12">';
				foreach( $taxonomies as $category ) {
					
				
						
							$output.= '<li><a class="rounded-full px-3 py-1 bg-accent-default text-primary-default hover:bg-secondary focus:bg-secodnary" href="'. get_term_link($category->term_id) . '">
								'. esc_html( $category->name ) .'</a></li>';
						
					
					
				}
				$output.='</ul>';
				echo $output;
			endif;

			endif;
			
			?>

			<?php if ( have_posts() ) :
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
