<?php
/**
 * Author template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package blockhaus
 */

get_header();

$curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author));

$biography = get_field('profile_biography', 'user_' . $curauth->ID);
$biographyPlus = get_field('profile_biography_extra', 'user_' . $curauth->ID);
$image = get_field('profile_image', 'user_' . $curauth->ID);
$quote = get_field('profile_quote', 'user_' . $curauth->ID);
$links = get_field('profile_links', 'user_' . $curauth->ID);
?>

	<!-- <main id="primary" class="pt-20 lg:p-6 bg-primary-default my-12 rounded-md w-11/12 md:w-3/4 mx-auto grid-cols-1 md:grid-cols-3 gap-6"> -->

	<main class="main-content lg:pb-20 bg-neutral-light-100">

	<header class="entry-header h-80 grid grid-cols-header-small lg:grid-cols-header blockhaus-banner-gradient overflow-hidden mt-14 lg:mt-0 gap-y-6">


	<div class="mx-auto lg:mx-0 text-primary-default col-start-2 row-start-1 text-current place-self-center justify-self-start flex items-center gap-6">
	<?php if($image):?>
 <figure>
	 <img class="rounded-full" src="<?php echo $image['sizes']['thumbnail'];?>" width="<?php echo $image['sizes']['thumbnail-width'];?>" height="<?php echo $image['sizes']['thumbnail-height'];?>" alt="<?php echo $image['alt'];?>"/>
 </figure>
<?php endif;?>
	<h1 class="text-lg lg:text-gigantic z-0 col-start-2 row-start-1 text-primary-default place-self-center justify-self-start font-black leading-tight"><?php the_archive_title();?></h1>
	</div>
	

</header><!-- .page-header -->
<?php 

	?>

				<div class="my-6 md:my-12 rounded-md w-11/12 lg:w-2/3 mx-auto space-y-6">

				<div class="col-span-full space-y-6">
				

					<?php 

					if($biography):?>
						<div>
						<?php echo $biography;?>
					</div>
					<?php endif;
					
					if($biographyPlus):?>
						<div>
						<?php echo $biographyPlus;?>
					</div>
					<?php endif;
					
					if( have_rows('links', 'user_' . $curauth->ID) ): ?>
					<div class="grid grid-cols-1 lg:grid-cols-2 gap-6 border rounded-md p-6">
						<h2 class="col-span-full font-bold w-full">Publications and interviews</h2>
				
				
						<?php while( have_rows('links', 'user_' . $curauth->ID) ): the_row(); 
						$image = get_sub_field('link_image');
						?>
				
								<article >
									<a class="hover:ring-2 hover:ring-yellow-400 focus:ring-2 focus:ring-yellow-400 bg-primary-default overflow-hidden h-full flex flexcol gap-2 items-center rounded-md shadow-md" href="<?php the_sub_field('link_url'); ?>">
									<figure class="aspect-square flex h-full w-1/4">
									<?php if($image):?>
										<img class="h-full" src="<?php echo $image['url']?>" alt=""/>
									<?php else:?>
										<img class="h-full" src="<?php echo get_template_directory_uri() . '\assets\images\defaults\square_bw.jpg'?>" alt=""/>
									<?php endif;?>
									</figure>
								
								<div class="flex flex-col gap-1 text-sm p-2">
								<span><?php the_sub_field('link_text'); ?></span>
								<span class="italic"><?php the_sub_field('link_publication'); ?></span>
								</div>
								</a>
								
								</article>
				
						<?php endwhile; ?>
				
					
				
				<?php endif;?>
					
					
				


				</div>


			<?php 

if ( have_posts() ) :?>
			<div class="grid grid-cols-1 gap-6 py-12">
			<h2 class="col-span-full text-xl font-black">BioSocieties website articles</h2>
			<?php while ( have_posts() ) :
				the_post();

				/*
				 * Include the Post-Type-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
				 */
				get_template_part( 'layouts/content', get_post_type() );

			endwhile;?>
			</div>
			<?php 
			the_posts_navigation(
				array(
					'prev_text' => '<span aria-hidden="true" class="nav-subtitle font-bold"><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
					<path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
				</svg></span> <span class="nav-title pl-2">Older content</span>',
					'next_text' => '<span class="nav-title pl-2">Newer content</span><span aria-hidden="true" class="nav-subtitle font-bold"><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
					<path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
				</svg></span>',
				)
			);

		else :

		endif;
		?>
		</div>
	</main><!-- #main -->

<?php

get_footer();
