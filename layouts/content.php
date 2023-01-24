<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package blockhaus
 */
$external_link = get_field('external_link');
?>

<article id="post-<?php the_ID(); ?>" class="relative flex <?php print ((get_post_type() === 'journal_editions') || is_author()) ? 'flex-row items-center' : 'flex-col justify-between';?> gap-2 rounded-md shadow-md">


	<a class="hover:ring-2 hover:ring-yellow-400 focus:ring-2 focus:ring-yellow-400 overflow-hidden w-full h-full rounded-md flex <?php print ((get_post_type() === 'journal_editions') || is_author()) ? 'flex-row' : 'flex-col';?>" 
	
	<?php 
	if($external_link) {?>
		rel="external" href="<?php echo esc_url( $external_link );?>"
	 <?php } else {?>
		href="<?php echo esc_url( get_permalink() );?>"
	<?php }?>
	class="entry-header absolute bg-primary-default p-2 bottom-2 right-2 left-2">
			
			<?php 
if(('video' === get_post_type())):
	blockhaus_post_thumbnail('full', 'aspect-video object-top'); 
elseif(('journal_editions' === get_post_type())):?>
	<img src="<?php echo get_template_directory_uri() . '\assets\images\defaults\biosocieties-covers.png'?>" alt="A selection of BioSocieties journals covers fanned out" width="128px" height="166px" class="w-32 object-contain h-full aspect-square p-2 bg-accent-default">
<?php elseif(('articles-and-reviews' === get_post_type())):
	blockhaus_post_thumbnail('full', 'h-60 object-top'); ?>
<?php elseif(is_author()):
	blockhaus_post_thumbnail('profile', 'aspect-square flex h-full w-20 md:w-40'); 
else: 
	blockhaus_post_thumbnail('blog', 'flex w-full object-cover'); 
endif;

?>
	<div class="<?php print ((get_post_type() === 'articles-and-reviews')) ? 'bg-neutral-dark-900 text-primary-default' : 'bg-primary-default';?> flex flex-col flex-1 justify-center gap-2 p-3">
		<?php
		if ( is_singular() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		elseif(('post' === get_post_type())):
			echo '<h2 class="text-base">Blog: ' . get_the_title() . '</h2>';
		else:
			echo '<h2 class="text-base">' . get_the_title() . '</h2>';
		endif;

		$featured = get_field('featured_article');

		// if($featured === 'yes'):
		// 	echo '<span class="absolute text-sm top-2 right-2 rounded-full px-2 bg-primary-default">FEATURED</span>';
		// endif;
		
		if ( ('journal_editions' === get_post_type()) && has_excerpt() ) :
			?>
			<span class="entry-meta text-sm italic">
				<?php
				the_excerpt();
			
				?>
			</span><!-- .entry-meta -->
		<?php endif;

		if ( 'post' === get_post_type() ) :
			?>
			<div class="entry-meta text-sm italic">
				<?php
				blockhaus_posted_on();
			
				?>
			</div><!-- .entry-meta -->
		<?php endif; ?>
		</div>
		</a><!-- .entry-header -->

	
	

</article><!-- #post-<?php the_ID(); ?> -->
