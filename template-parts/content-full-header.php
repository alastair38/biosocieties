<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package blockhaus
 */

$transparent =  get_field('transparent_image_layout');
$background =  get_field('choose_background');
if(!$background):
	$background = 'no';
endif;

?>

<article id="post-<?php the_ID(); ?>" class="w-full space-y-12">

	<header class="entry-header grid grid-cols-header text-primary-default space-y-6 py-20 bg-gradient-to-t from-accent-default to-slate-900 overflow-hidden">

		<?php 

		the_title( '<h1 class="w-fit col-start-2 row-start-1 text-current place-self-end justify-self-start text-gigantic font-black leading-tight">', '</h1>' );
		if ( has_post_thumbnail() ):
		if($transparent):?>
		<?php the_post_thumbnail( 'full', ['class' => 'h-80 place-self-end p-2 col-start-2 row-start-1 object-cover'] ); ?>
		
		<?php else: ?>
			<?php the_post_thumbnail( 'full', ['class' => 'h-80 w-full col-span-full row-start-1 object-cover'] ); ?>
		
		<?php endif;
		endif;
	?>
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
