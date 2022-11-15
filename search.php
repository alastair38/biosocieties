<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package blockhaus
 */

get_header();
?>

	<main id="primary" class="main-content space-y-6 md:space-y-12 bg-neutral-light-100">

		<?php if ( have_posts() ) : 
		
		$header_image = get_field('search_header', 'options');
		$transparent =  get_field('search_page_transparent_header', 'options');
		$background =  get_field('search_choose_background', 'options');
		if(!$background):
			$background = 'no';
		endif;
				
		?>
	
<header class="entry-header<?php print($header_image ? ' py-0 ' : ' py-20 lg:py-20 h-auto lgh-80 ');?>grid grid-cols-header-small lg:grid-cols-header blockhaus-banner-gradient overflow-hidden mt-14 lg:mt-0 gap-y-6">

<?php 

if ( $header_image ):?>
<div class="mx-auto lg:mx-0 z-0 col-start-2 row-start-1 text-primary-default place-self-center justify-self-start">
<h1 class="z-0 text-xl lg:text-gigantic text-current font-black leading-tight">
	<?php
	/* translators: %s: search query. */
	printf( esc_html__( 'Search Results for: %s', 'blockhaus' ), '<span class="underline decoration-accent-secondary decoration-4">' . get_search_query() . '</span>' );
	?>
</h1>
</div>
<?php
the_post_thumbnail( 'full', ['class' => $contain_image ? 'col-start-3 row-start-1 m-0 hidden lg:block lg:h-80 object-contain p-6' : 'col-span-full w-full row-start-1 h-80 object-cover'] ); ?>
<?php else:?>
<div class="mx-auto lg:mx-0 text-primary-default col-start-2 row-start-1 text-current place-self-center justify-self-start">
<h1 class="z-0 text-xl lg:text-gigantic text-current font-black leading-tight">
	<?php
	/* translators: %s: search query. */
	printf( esc_html__( 'Search Results for: %s', 'blockhaus' ), '<span class="underline decoration-accent-secondary decoration-4">' . get_search_query() . '</span>' );
	?>
</h1>

</div>

<?php endif;?>
	</header><!-- .page-header -->

	<div class="p-6 md:p-12 w-11/12 md:w-3/4 mx-auto space-y-6">

			<?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				/**
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */
				get_template_part( 'template-parts/content', 'search' );

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
