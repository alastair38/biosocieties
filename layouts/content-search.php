<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package blockhaus
 */

$post_type = get_post_type();
$post_type_obj = get_post_type_object( $post_type );
$external_link = get_field('external_link');
?>

<article id="post-<?php the_ID(); ?>" class="space-y-6">
	<header class="entry-header">

		<?php if ( 'post' !== get_post_type() ) :
					echo '<span aria-label="Content type: ' . $post_type_obj->labels->name . ' " class="post-type inline-flex mb-6 bg-highlight px-3 py-1 rounded-full uppercase has-small-font-size">' . $post_type_obj->labels->name . '</span>';
				else:
					echo '<span aria-label="Content type: News and features" class="post-type inline-flex mb-6 bg-highlight px-3 py-1 rounded-full uppercase has-small-font-size">News and features</span>';
		endif; ?>

		<?php the_title(sprintf( '<h2 class="has-large-font-size">', '%s' ), '</h2>');
 		?>

		<?php if ( 'post' === get_post_type() ) :?>
		<div class="entry-meta flex gap-2">
		
			<?php
			blockhaus_posted_on();

			?>


		</div><!-- .entry-meta -->
		<?php endif;?>
	</header><!-- .entry-header -->

	<?php if(has_excerpt()):?>
	<div class="entry-summary">
		<?php the_excerpt(); ?>

	</div><!-- .entry-summary -->
	<?php endif;?>
	
	<footer class="entry-footer">
		
	<a class="py-1 px-4 border border-current inline-flex rounded-full hover:bg-primary-default transition-colors duration-200 hover:ring-4 hover:ring-offset focus:ring-4 focus:ring-offset" aria-label="<?php the_title();?>" href="<?php 
	
	if($external_link) {
		echo esc_url( $external_link );
		} else {
			echo esc_url( get_permalink() );
			}?>" rel="bookmark">View <?php echo $post_type_obj->labels->singular_name;?></a>
	</footer><!-- .entry-footer -->
	<hr>
</article><!-- #post-<?php the_ID(); ?> -->
