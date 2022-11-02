<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package blockhaus
 */

?>


	

	<article id="post-<?php the_ID(); ?>" class="w-full space-y-12">
	
	<header class="entry-header grid grid-cols-header relative h-80 bg-gradient-to-t from-accent-default to-secondary overflow-hidden">

		<?php 
		
		the_title( '<h1 class="page-title z-0 mb-6 w-fit col-start-2 row-start-1 place-self-end justify-self-start text-huge leading-tight text-primary-default">', '</h1>' );
		
	?>
		</header><!-- .page-header -->

	
	<div class="space-y-6 w-11/12 md:w-2/3 mx-auto overflow-hidden">
		<?php

if ( has_post_thumbnail() ): ?>
	<?php the_post_thumbnail( 'full', ['class' => 'w-1/3 object-contain mr-6 mt-6 float-left rounded-md shadow-md'] ); ?>

<?php endif;

		the_content();

		if ( comments_open() || get_comments_number() ) :
			comments_template();
		endif;

		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'blockhaus' ),
				'after'  => '</div>',
			)
		);
		?>

	
<p class="entry-meta italic clear-both pt-6">
				<?php
				blockhaus_posted_on();
				blockhaus_posted_by();
				?>
			</p><!-- .entry-meta -->
	
	<?php $social_sharing = get_field('sharing_enabled');
	if($social_sharing):
	// if sharing is enabled on the content item, show the social media share buttons
	get_template_part( 'template-parts/content', 'share-buttons' );

	endif;?>
</div><!-- .entry-content -->
</article><!-- #post-<?php the_ID(); ?> -->
