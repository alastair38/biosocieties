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
	
			<aside class="py-6 lg:py-12 px-6 lg:px-20">
				<h2 class="w-11/12 mx-auto text-xl px-2 text-neutral-dark-100 font-black">Featured</h2>
			<div class="grid gap-6 mt-6 w-11/12 py-4 px-2 md:py-1 scroll-px-4 overflow-x-auto mx-auto grid-flow-col auto-cols-[60%] md:auto-cols-auto md:grid-flow-row md:grid-cols-5 overscroll-contain snap-x">
	
		 <?php foreach($articles as $item):
			$external_link = get_field('external_link', $item->ID);
			?>
			
				
				<div class="relative flex rounded-md snap-center shadow-md">
					<a class="w-full h-full text-sm flex rounded-md overflow-hidden hover:ring-2 hover:ring-yellow-400 focus:ring-2 focus:ring-yellow-400" 
					
					<?php 
					if($external_link) {?>
						rel="external" href="<?php echo esc_url( $external_link );?>"
					<?php } else {?>
						href="<?php echo esc_url( get_permalink($item->ID) );?>"
					<?php }?>
					>
					<?php echo get_the_post_thumbnail($item->ID, 'large', array( 'class' => 'w-full' ));?>
					
					 <span class="absolute lg:min-h-[7rem] bottom-0 left-0 right-0 text-primary-default bg-neutral-dark-900 text-primary-default px-1 py-1 lg:py-2 lg:px-2 flex items-center font-serif rounded-b-md" > <?php echo get_the_title($item->ID);?></span>
					</a>
					
				</div>
		 <?php endforeach;
		 wp_reset_postdata();
		 ?>
		</div>
		 </aside>
		 <hr class="w-1/2 mx-auto border-accent-default">