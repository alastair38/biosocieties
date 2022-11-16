<?php
/**
 * Featured Articles component
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package blockhaus
 */

$articles = get_posts(array(
					'numberposts'   => -1,
					'post_type'     => 'articles-and-reviews',
					'meta_key'      => 'featured_article',
					'meta_value'    => 'yes'
			));?>
	
			<aside class="bg-neutral-dark-100 py-6 ">
				<h2 class="w-11/12 mx-auto text-xl font-black text-primary-default">Featured</h2>
			<div class="grid gap-6 my-6 w-11/12  mx-auto grid-cols-1 md:grid-cols-5">
	
		 <?php foreach($articles as $item):
			$external_link = get_field('external_link', $item->ID);
			?>
			
				
				<div class="relative flex rounded-md overflow-hidden shadow-md">
					<a class="w-full text-sm flex" href="
					<?php if($external_link) {
					echo esc_url( $external_link );
					} else { echo get_the_permalink($item->ID); }?>
					
					">
					<?php echo get_the_post_thumbnail($item->ID, 'portrait', array( 'class' => 'w-full' ));?>
					
					 <span class="absolute bottom-2 left-2 right-2 bg-primary-default text-secondary px-1 py-1 lg:py-2" > <?php echo get_the_title($item->ID);?></span>
					</a>
					
				</div>
		 <?php endforeach;
		 wp_reset_postdata();
		 ?>
		</div>
		 </aside>