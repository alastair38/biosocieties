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
				
				$header_image = get_field(get_post_type() . '_header', 'options');
				$contain_image = get_field($post_type . '_contain_header', 'options');
				?>
	
			
			

			<header class="entry-header<?php print($background_image ? ' py-0 ' : ' py-20 lg:py-0 h-auto lg:h-80 ');?>grid grid-cols-header-small lg:grid-cols-header blockhaus-banner-gradient overflow-hidden mt-14 lg:mt-0">

<?php 

if ( $header_image ):?>
<div class="mx-auto lg:mx-0 z-0 col-start-2 row-start-1 text-primary-default place-self-center justify-self-start">
<?php 
single_post_title( '<h1 class="z-0 text-xl lg:text-gigantic text-current font-black leading-tight">', '</h1>' );?>
</div>
<?php
the_post_thumbnail( 'full', ['class' => $contain_image ? 'col-start-3 row-start-1 hidden m-0 lg:block lg:h-80 object-contain p-6' : 'col-span-full w-full row-start-1 hidden lg:h-80 object-cover'] ); ?>
<?php else:?>
<div class="mx-auto flex items-center lg:mx-0 text-primary-default lg:h-80 col-start-2 row-start-1 text-current place-self-center justify-self-start">
<?php single_post_title( '<h1 class="text-xl lg:text-gigantic z-0 text-primary-default font-black leading-tight">', '</h1>' );?>

</div>
<?php endif;?>
	</header><!-- .page-header -->

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
