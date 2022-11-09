<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package blockhaus
 */

$block_content = do_blocks( '
<!-- wp:acf/showcase-grid {"id":"block_63511e5ac1f56","name":"acf/showcase-grid","data":{"layout_alt":"1","_layout_alt":"field_63514c2dae525","showcase_title":"Reviews","_showcase_title":"field_63512569962da","showcase_description":"Read our latest reviews","_showcase_description":"field_63512585962db","showcase_link":"http://biosocieties.local/articles-and-reviews/","_showcase_link":"field_635125a2962dc","items":"4","_items":"field_6350221b6eac0","grid_columns":"4","_grid_columns":"field_63503203e3172","content_type":"articles_and_reviews","_content_type":"field_635022572d252"},"align":"","mode":"preview","backgroundColor":"neutral-dark-100","textColor":"primary-default"} /-->'
);

echo $block_content;

?>


