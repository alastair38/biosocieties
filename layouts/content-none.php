<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package blockhaus
 */

?>

<div class="space-y-6">
	<p>No content matched your search query. Please try refining your keywords and searching again.</p>
	<div class="flex"><?php echo blockhaus_custom_form("Search..."); ?></div>
	
</div><!-- #post-<?php the_ID(); ?> -->
