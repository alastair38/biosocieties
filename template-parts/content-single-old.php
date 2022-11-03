<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package blockhaus
 */

	$background_image = get_field('background_image_layout');
	$contain_image = get_field('contain_image_layout');
?>


	
	<article id="post-<?php the_ID(); ?>" class="w-full space-y-12">

	<header class="entry-header grid grid-cols-header h-80 bg-gradient-to-t from-accent-default to-slate-900 overflow-hidden">

		<?php 

		if ( has_post_thumbnail() && $background_image ):?>
		<?php 
		the_title( '<h1 class="w-fit z-0 col-start-2 row-start-1 text-current bg-primary-default px-2 place-self-center justify-self-start text-gigantic font-black leading-tight">', '</h1>' );
		
		the_post_thumbnail( 'full', ['class' => $contain_image ? 'col-start-3 row-start-1 h-80 object-contain p-6' : 'col-span-full w-full row-start-1 h-80 object-cover'] ); ?>
		<?php else:
		the_title( '<h1 class="w-fit z-0 col-start-2 row-start-1 text-primary-default place-self-center justify-self-start text-gigantic font-black leading-tight">', '</h1>' );
		endif;?>
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
	
	<?php $social_sharing = get_field('sharing_enabled');
	if($social_sharing):
	// if sharing is enabled on the content item, show the social media share buttons
	get_template_part( 'template-parts/content', 'share-buttons' );

	endif;?>
</div><!-- .entry-content -->
</article><!-- #post-<?php the_ID(); ?> -->