<?php
/**
 * Full width header component
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package blockhaus
 */

if(is_archive()):
	$header_image = get_field($post_type . '_header', 'options');
	$contain_image = get_field($post_type . '_contain_header', 'options');
	$title = get_the_archive_title();
elseif ( is_home() && ! is_front_page() ) :
	$header_image = get_field($post_type . '_header', 'options');
	$contain_image = get_field($post_type . '_contain_header', 'options');
	$title = single_post_title('',false);
else:
	$header_image = get_field('background_image_layout');
	$contain_image = get_field('contain_image_layout');
	$title = get_the_title();
endif;

?>

<header class="entry-header<?php print($header_image ? ' py-0 ' : ' h-48 lg:h-80 ');?>grid grid-cols-header-small lg:grid-cols-header blockhaus-banner-gradient overflow-hidden mt-14 lg:mt-0 gap-y-6">

	<?php if ( $header_image ):?>

		<div class="mx-auto lg:mx-0 z-0 col-start-2 row-start-1 text-primary-default <?php print($post_type === 'articles-and-reviews' ? 'place-self-end' : 'place-self-center');?> justify-self-start">
		<h1 class="text-xl lg:text-gigantic z-0 col-start-2 row-start-1 text-primary-default place-self-center justify-self-start font-black leading-tight"><?php echo $title;?></h1>
		</div>

	<?php
	the_post_thumbnail( 'full', ['class' => $contain_image ? 'col-start-3 row-start-1 m-0 hidden lg:block lg:h-80 object-contain p-6' : 'col-span-full w-full row-start-1 h-80 object-cover'] ); ?>
	<?php else:?>

		<div class="mx-auto lg:mx-0 text-primary-default col-start-2 row-start-1 text-current <?php print($post_type === 'articles-and-reviews' ? 'place-self-end' : 'place-self-center');?> justify-self-start">
		<h1 class="text-xl lg:text-gigantic z-0 col-start-2 row-start-1 text-primary-default place-self-center justify-self-start font-black leading-tight"><?php echo $title;?></h1>
		</div>
		
	<?php endif;

	if($post_type === 'articles-and-reviews'):

	get_template_part('components/content', 'articles-links');

	endif;?>

</header><!-- .page-header -->