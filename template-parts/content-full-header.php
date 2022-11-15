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

<article id="post-<?php the_ID(); ?>" class="w-full space-y-6 md:space-y-12">

<header class="entry-header<?php print($background_image ? ' py-0 ' : ' py-20 lg:py-0 h-auto lg:h-80 ');?>grid grid-cols-header-small lg:grid-cols-header blockhaus-banner-gradient overflow-hidden mt-14 lg:mt-0">

		<?php 

		if ( has_post_thumbnail() && $background_image ):?>
		<?php 
		the_title( '<h1 class="w-fit mx-auto lg:mx-0 col-start-2 row-start-1 text-primary-default place-self-center justify-self-start text-gigantic font-black leading-tight">', '</h1>' );
		
		the_post_thumbnail( 'full', ['class' => !$contain_image ? 'col-start-3 row-start-1 h-80 object-contain p-6' : 'col-span-full w-full row-start-1 h-80 object-cover'] ); ?>
		<?php else:
		the_title( '<h1 class="w-fit mx-auto lg:mx-0 z-0 col-start-2 row-start-1 text-primary-default place-self-center justify-self-start text-gigantic font-black leading-tight">', '</h1>' );
		endif;?>
	</header><!-- .page-header -->

	<div class="space-y-6 w-11/12 md:w-2/3 mx-auto overflow-hidden">
		<?php
		the_content();

		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'blockhaus' ),
				'after'  => '</div>',
			)
		);
		?>
	</div><!-- .entry-content -->

</article><!-- #post-<?php the_ID(); ?> -->
