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

		

			<header class="entry-header flex flex-col gap-6 bg-neutral-dark-100 overflow-hidden py-20">

	<?php 

if ( $header_image ):?>
<div class="w-11/12 mx-auto z-0 text-primary-default">
<?php 
the_archive_title( '<h1 class="z-0 text-xl text-center lg:text-gigantic text-current font-black leading-tight">', '</h1>' );?>
</div>
<?php
	the_post_thumbnail( 'full', ['class' => $contain_image ? 'col-start-3 row-start-1 m-0 hidden lg:block lg:h-80 object-contain p-6' : 'col-span-full w-full row-start-1 h-80 object-cover'] ); ?>
<?php else:?>
<div class="w-11/12 mx-auto text-primary-default text-current">
<?php the_archive_title( '<h1 class="text-xl text-center lg:text-gigantic z-0 col-start-2 row-start-1 text-primary-default place-self-center justify-self-start font-black leading-tight">', '</h1>' );?>

	</div>
<?php endif;
		if($post_type === 'articles-and-reviews'):

			// $taxonomies = get_terms( array(
			// 	'taxonomy' => 'articles_and_reviews_tax',
			// 	'hide_empty' => false
			// ) );
			
			// if ( !empty($taxonomies) ) :
			// 	$output = '<ul class="col-start-2 flex flex-wrap gap-2 lg:gap-6 place-self-center justify-self-start">';
			// 	foreach( $taxonomies as $category ) {
					
				
						
			// 				$output.= '<li><a class="rounded-full px-3 py-1 bg-accent-default text-primary-default hover:bg-secondary focus:bg-secodnary" href="'. get_term_link($category->term_id) . '">
			// 					'. esc_html( $category->name ) .'</a></li>';
						
					
					
			// 	}
			// 	$output.='</ul>';
			// 	echo $output;
			// endif;

			

			// Check rows existexists.
			if( have_rows('articles-and-reviews_page_links', 'options') ):?>
			<ul class="w-11/12 mx-auto flex flex-wrap gap-2 justify-center lg:gap-6">
			<?php	// Loop through rows.
				while( have_rows('articles-and-reviews_page_links', 'options') ) : the_row();?>

<li><a class="rounded-full px-3 py-1 bg-accent-default text-primary-default hover:bg-secondary focus:bg-secondary" href="<?php the_sub_field('page_url');?>"><?php the_sub_field('page_name');?></a></li>

				<?php // End loop.
				endwhile;

			// No value.
			else :
				// Do something...
				echo '</ul>';
			endif;

		endif;
?>
		</header><!-- .page-header -->
			<?php 
			if($post_type === 'articles-and-reviews'): 

				$articles = get_posts(array(
					'numberposts'   => -1,
					'post_type'     => 'articles-and-reviews',
					'meta_key'      => 'featured_article',
					'meta_value'    => 'yes'
			));?>
	
			<aside class="bg-neutral-dark-100 py-6 ">
				<h2 class="w-11/12 mx-auto text-xl font-black text-primary-default">Featured</h2>
			<div class="grid gap-6 my-6 w-11/12  mx-auto grid-cols-1 md:grid-cols-5">
	
		 <?php foreach($articles as $item):
			$external_link = get_field('external_link', $item->ID);
			?>
			
				
				<div class="relative flex rounded-md overflow-hidden shadow-md">
					<a class="w-full text-sm flex" href="
					<?php if($external_link) {
					echo esc_url( $external_link );
					} else { echo get_the_permalink($item->ID); }?>
					
					">
					<?php echo get_the_post_thumbnail($item->ID, 'portrait', array( 'class' => 'w-full' ));?>
					
					 <span class="absolute bottom-2 left-2 right-2 bg-primary-default text-secondary px-1 py-1 lg:py-2" > <?php echo get_the_title($item->ID);?></span>
					</a>
					
				</div>
		 <?php endforeach;
		 wp_reset_postdata();
		 ?>
		</div>
		 </aside>

		 <?php endif; ?>

			<div class="py-6 grid my-6 lg:my-12 w-11/12 lg:w-2/3 mx-auto grid-cols-1 <?php print ($post_type === 'journal_editions') ? ' md:grid-cols-2' : ' md:grid-cols-3';?> gap-6">
				
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

			the_posts_navigation();

		else :

			get_template_part( 'layouts/content', 'none' );

		endif;
		?>
	

	</div>
	</main><!-- #main -->

<?php
get_sidebar();
get_footer();
