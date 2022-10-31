<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package blockhaus
 */

?>

<article id="post-<?php the_ID(); ?>" class="overflow-hidden relative bg-primary-default flex <?php print (get_post_type() === 'journal_editions') ? ' flex-row items-center' : ' flex-col';?> gap-2 rounded-md shadow-md">
<?php 
if(('video' === get_post_type())):
	blockhaus_post_thumbnail('full', 'aspect-video object-top'); 
else: 
	blockhaus_post_thumbnail('full', 'aspect-square object-top'); 
endif;

$external_link = get_field('external_link');


?>
	<a class="flex flex-col gap-2 p-6" href="<?php 
	
	if($external_link) {
		echo esc_url( $external_link );
		} else {
			echo esc_url( get_permalink() );
			}?> " class="entry-header absolute bg-primary-default p-2 bottom-2 right-2 left-2">
		<?php
		if ( is_singular() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		else :
			the_title( '<h2 class="text-base font-bold">', '</h2>' );
		endif;
		$featured = get_field('featured_article');

		if($featured === 'yes'):
			echo '<span class="absolute text-sm top-2 right-2 rounded-full px-2 bg-primary-default">FEATURED</span>';
		endif;

		if ( 'post' === get_post_type() ) :
			?>
			<div class="entry-meta text-sm italic">
				<?php
				blockhaus_posted_on();
			
				?>
			</div><!-- .entry-meta -->
		<?php endif; ?>
		</a><!-- .entry-header -->

	
	

</article><!-- #post-<?php the_ID(); ?> -->
