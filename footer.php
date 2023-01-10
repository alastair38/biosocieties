<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package blockhaus
 */

?>

<footer class="bg-neutral-light-100">


<div class="p-6 place-items-center">
<div class="flex justify-center">

<div class="p-6 flex items-center gap-6">
	<p class="font-black">Follow us on</p>
  <?php echo blockhaus_display_social_profiles();?>
</div>

</div>	

<?php

// Check rows exists.
if( have_rows('details', 'option') ):?>
<div class="py-6">
<!-- <p class="font-bold text-center">Funders</p> -->
	<ul class="flex gap-12 justify-center w-1/2 mx-auto">
<?php	// Loop through rows.
	while( have_rows('details', 'option') ) : the_row();

			// Load sub field value.
			$logo_img = get_sub_field('logo');
			$name = get_sub_field('name');
			$url = get_sub_field('web_url');
			// echo '<code class="text-white">';
			// print_r($logo_img);
			// echo '</code>';
			?>
			<li class="flex-1 flex flex-col gap-4 items-center justify-center">
				<a class="flex-1" href="<?php echo $url;?>">
				<img class="object-contain w-3/5 mx-auto h-full" src="<?php echo $logo_img['sizes']['medium'];?>" alt="<?php echo $logo_img['alt'];?>"/>
			</a>
			</li>
			


		<?php // Do something...

	// End loop.
	endwhile; 
else :
	// Do something...
endif;

?>
	</ul>
	</div>
<p class="flex justify-center p-6">
		<?php
				/* translators: 1: Theme name, 2: Theme author. */
				printf( esc_html_e( bloginfo('name') . ' &copy; ' . date("Y") , 'Blockhaus' ), 'Blockhaus' );
				?>
</p>

</div>

	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
