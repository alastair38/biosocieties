<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package blockhaus
 */

$post_type = get_post_type();
 
get_header();
?>

	<main id="primary" class="main-content space-y-6 md:space-y-12 bg-neutral-light-100">

		
	
<header class="entry-header py-20 lg:py-20 h-auto h-48 lg:h-80 grid grid-cols-header-small lg:grid-cols-header blockhaus-banner-gradient overflow-hidden mt-14 lg:mt-0 gap-y-6">


<div class="mx-auto lg:mx-0 text-primary-default col-start-2 row-start-1 text-current place-self-center justify-self-start">
<h1 class="z-0 text-xl lg:text-gigantic text-current font-black leading-tight">
	<?php
	/* translators: %s: search query. */
	printf( esc_html__( 'Search Results for: %s', 'blockhaus' ), '<span class="underline decoration-accent-secondary decoration-4">' . get_search_query() . '</span>' );
	?>
</h1>

</div>

	</header><!-- .page-header -->

	<div class="grid my-6 lg:my-12 w-11/12 lg:w-2/3 mx-auto grid-cols-1 <?php print ($post_type === 'journal_editions') ? ' md:grid-cols-2' : ' md:grid-cols-3';?> gap-6">
		
	<?php if ( have_posts() ) : 
		
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				/**
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */
				get_template_part( 'layouts/content', 'content' );

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
