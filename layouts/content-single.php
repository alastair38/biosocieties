<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package blockhaus
 */

	
?>


	

	<article id="post-<?php the_ID(); ?>" class="w-full space-y-6 md:space-y-12">

	<?php 

get_template_part('components/content', 'full-width-post-header');

?>

	
	<div class="space-y-6 w-11/12 lg:w-2/3 mx-auto overflow-hidden">
		<?php

if ( has_post_thumbnail() && (get_post_type() !== 'video') ): ?>
	<?php the_post_thumbnail( 'full', ['class' => 'w-1/3 object-contain mr-6 mt-6 float-left rounded-md shadow-md'] ); ?>

<?php endif;

		the_content();

		if ( comments_open() || get_comments_number() ) :
		echo '<aside class="p-4 lg:p-10 border border-neutral-light-500 rounded-md">
		<h2 class="text-xl">Comments</h2>';
		comments_template();
		echo '</aside>';
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
	get_template_part( 'components/content', 'share-buttons' );

	endif;?>
</div><!-- .entry-content -->
</article><!-- #post-<?php the_ID(); ?> -->
