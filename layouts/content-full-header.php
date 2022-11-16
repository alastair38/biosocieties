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

<?php 

get_template_part('components/content', 'full-width-header');

?>

<!-- .page-header -->

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

</article>
