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
	
	<header class="entry-header grid grid-cols-header text-primary-default space-y-6 py-20 bg-gradient-to-t from-accent-default to-slate-900 overflow-hidden">

		<?php 
		
		the_title( '<h1 class="page-title w-fit col-start-2 row-start-1 text-current place-self-end justify-self-start text-gigantic font-black leading-tight">', '</h1>' );
		
	?>
	<p class="entry-meta col-start-2 gap-2 row-start-2 items-center place-self-start flex italic w-full">
		<?php
			blockhaus_posted_on();
			blockhaus_posted_by();
		?>

	<?php

	if(comments_open()):
		$comments = get_comments_number();
	?>
	<span class="flex items-center gap-2 italic ml-auto"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
		<path stroke-linecap="round" stroke-linejoin="round" d="M20.25 8.511c.884.284 1.5 1.128 1.5 2.097v4.286c0 1.136-.847 2.1-1.98 2.193-.34.027-.68.052-1.02.072v3.091l-3-3c-1.354 0-2.694-.055-4.02-.163a2.115 2.115 0 01-.825-.242m9.345-8.334a2.126 2.126 0 00-.476-.095 48.64 48.64 0 00-8.048 0c-1.131.094-1.976 1.057-1.976 2.192v4.286c0 .837.46 1.58 1.155 1.951m9.345-8.334V6.637c0-1.621-1.152-3.026-2.76-3.235A48.455 48.455 0 0011.25 3c-2.115 0-4.198.137-6.24.402-1.608.209-2.76 1.614-2.76 3.235v6.226c0 1.621 1.152 3.026 2.76 3.235.577.075 1.157.14 1.74.194V21l4.155-4.155" />
	</svg>
	 <?php print ($comments === '1') ? $comments . ' comment' : $comments . ' comments';?></span> 
	<?php endif;?>
</p><!-- .entry-meta -->
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
