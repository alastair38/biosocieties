<?php
/**
 * Articles and reviews links component
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package blockhaus
 */

// Check rows existexists.
if( have_rows('articles-and-reviews_page_links', 'options') ):?>
	<ul class="col-start-2 flex flex-wrap gap-2 justify-center lg:justify-start lg:gap-6 place-self-start justify-self-start">
	<?php	// Loop through rows.
		while( have_rows('articles-and-reviews_page_links', 'options') ) : the_row();?>

<li><a class="rounded-full px-3 py-1 bg-neutral-dark-900 text-primary-default hover:bg-neutral-dark-100 focus:bg-neutral-dark-100" rel="external" href="<?php the_sub_field('page_url');?>"><?php the_sub_field('page_name');?></a></li>

		<?php // End loop.
		endwhile;

	// No value.
	else :
		// Do something...
		echo '</ul>';
	endif;
