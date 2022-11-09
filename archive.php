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

?>

	<!-- <main id="primary" class="pt-20 lg:p-6 bg-primary-default my-12 rounded-md w-11/12 md:w-3/4 mx-auto grid-cols-1 md:grid-cols-3 gap-6"> -->
		<main class="main-content lg:pb-20 bg-neutral-light-100">
			<?php 
					$header_image = get_field($post_type . '_header', 'options');
					$contain_image = get_field($post_type . '_contain_header', 'options');
					
					?>
			<!-- <header class="col-span-full"> -->

		

			<header class="entry-header<?php print($header_image ? ' py-0 ' : ' py-20 lg:py-0 h-auto lg:h-80 ');?>grid grid-cols-header-small lg:grid-cols-header bg-gradient-to-t from-accent-default to-slate-900 overflow-hidden mt-14 lg:mt-0">

	<?php 

if ( $header_image ):?>
<div class="mx-auto lg:mx-0 z-0 col-start-2 row-start-1 text-primary-default place-self-center justify-self-start">
<?php 
the_archive_title( '<h1 class="z-0 text-xl lg:text-gigantic text-current font-black leading-tight">', '</h1>' );?>
</div>
<?php
	the_post_thumbnail( 'full', ['class' => $contain_image ? 'col-start-3 row-start-1 m-0 hidden lg:block lg:h-80 object-contain p-6' : 'col-span-full w-full row-start-1 h-80 object-cover'] ); ?>
<?php else:?>
<div class="mx-auto lg:mx-0 text-primary-default col-start-2 row-start-1 text-current place-self-center justify-self-start">
<?php the_archive_title( '<h1 class="text-xl lg:text-gigantic z-0 col-start-2 row-start-1 text-primary-default place-self-center justify-self-start font-black leading-tight">', '</h1>' );?>

	</div>
<?php endif;?>
		</header><!-- .page-header -->


			<div class="py-6 grid my-6 lg:my-12 w-11/12 lg:w-2/3 mx-auto grid-cols-1 <?php print ($post_type === 'journal_editions') ? ' md:grid-cols-2' : ' md:grid-cols-3';?> gap-6">
				
			<?php $description = get_field($post_type . '_page_description', "options");

			if($description):?>

			<p class="col-span-full"><?php echo $description;?></p>

			<?php endif;
			if($post_type === 'articles-and-reviews'):

			$taxonomies = get_terms( array(
				'taxonomy' => 'articles_and_reviews_tax',
				'hide_empty' => true
			) );
			
			if ( !empty($taxonomies) ) :
				$output = '<ul class="col-span-full flex flex-wrap gap-2 lg:gap-6 mb-6 lg:mb-12">';
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
