<?php
/**
 * Adds SEO descriptions for archive pages and singular post types pages. This function depends on descriptions being set for taxonomies and the Blockhaus Functionality plugin being activated to provide options for CPT archive descriptions
 *
 * @package blockhaus
 */


// function blockhaus_meta_description() {

//   global $post;
//   if ( is_singular() && !is_front_page() ) {
//       $post_description = strip_tags($post->post_content);
//       // $post_description = strip_shortcodes( $post->post_content );
//       $post_description = str_replace( array("\n", "\r", "\t"), ' ', $post_description );
//       $post_description = mb_substr( $post_description, 0, 310, 'utf8' );
//       $post_description = normalize_whitespace($post_description);
//       echo '<meta name="description" content="' . $post_description . '" />' . "\n";
//   }
  
//   if ( is_home() && !is_front_page() ) {
//   		$blog_page_description = get_field("post_page_description", "options");
//       if($blog_page_description):
//   		$blog_page_description = strip_tags($blog_page_description);
//   		$blog_page_description = normalize_whitespace($blog_page_description);
//       echo '<meta name="description" content="' . $blog_page_description . '" />' . "\n";
//       endif;
//   }
  
//   if ( is_front_page() ) {
//       echo '<meta name="description" content="' . get_bloginfo( "description" ) . '" />' . "\n";
//   }
//   if ( is_category() ) {
//       $category_description = strip_tags(category_description());
//       if($category_description):
//       $category_description = normalize_whitespace($category_description);
//       echo '<meta name="description" content="' . $category_description . '" />' . "\n";
//       endif;
//   }

//   if ( is_tax() ) {
//       $term_description = strip_tags(term_description());
//       if($term_description):
//       $term_description = normalize_whitespace($term_description);
//       echo '<meta name="description" content="' . $term_description . '" />' . "\n";
//       endif;
//   }

//     // get registered public custom post types
//     $args = array(
//       'public'   => true,
//       '_builtin' => false
//      );
  
  
//     $output = 'names'; // 'names' or 'objects' (default: 'names')
//     $operator = 'and'; // 'and' or 'or' (default: 'and')
      
//     $post_types = get_post_types( $args, $output, $operator );
    
//     // loop through all registered public custom post types and add them to the $types_to_search array
  
//     if ( $post_types ) { // If there are any custom public post types.
//         foreach ( $post_types  as $post_type ) { // loop through
//           if ( is_post_type_archive($post_type) ) { // check if on the archive page for that post type
//             $description = get_field($post_type . "_page_description", "options"); // get post type page description from options page
//             if($description): // if description exists, add it to the head
//             $description = strip_tags($description);
//             $description = normalize_whitespace($description);
//             echo '<meta name="description" content="' . $description . '" />' . "\n";
//             endif;
//         }
//       }
//     }
// }
// add_action( 'wp_head', 'blockhaus_meta_description');

function blockhaus_opengraph() {
  global $post;
    if(is_singular()) {
    if(has_post_thumbnail($post->ID)) {
    $img_src = wp_get_attachment_image_src(get_post_thumbnail_id( $post->ID ), 'large');
    $img = $img_src[0];
    } else {
    $default_img = get_field('page_header', 'options');
    $img = $default_img['sizes']['social'];
    }
    if(has_excerpt()) {
    $excerpt = strip_tags($post->post_excerpt);
    $excerpt = str_replace("", "'", $excerpt);
    } else {
      $excerpt = strip_tags($post->post_content);
      $excerpt = str_replace("", "'", $excerpt);
      $excerpt = substr($excerpt, 0, 160);
    }
    ?>
    <meta name="description" content="<?php echo $excerpt; ?>"/>
    <meta property="og:title" content="<?php echo the_title(); ?>"/>
    <meta property="og:description" content="<?php echo $excerpt; ?>"/>
    <meta property="og:type" content="article"/>
    <meta property="og:url" content="<?php echo the_permalink(); ?>"/>
    <meta property="og:site_name" content="<?php echo get_bloginfo(); ?>"/>
    <meta property="og:image" content="<?php echo $img; ?>"/>
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:url" content="<?php echo the_permalink(); ?>" />
    <meta name="twitter:title" content="<?php echo the_title(); ?>" />
    <meta name="twitter:description" content="<?php echo $excerpt; ?>" />
    <meta name="twitter:image" content="<?php echo $img; ?>" />
    <?php
    }
    
    if(is_archive() && !is_author()) {
      
      $post_type = get_post_type();
      
      $img_src = get_field($post_type . '_page_header', 'options');
      if($img_src) {
      $img = $img_src['sizes']['social'];
      } else {
      $default_img = get_field('page_header', 'options');
      $img = $default_img['sizes']['social'];
      }
      
     
        $excerpt = get_field($post_type . '_page_description', 'option');
        if($excerpt) {
        $excerpt = strip_tags($excerpt);
        } else {
        $excerpt = get_bloginfo( "description" );
        }
     
        
      
      
      $permalink = get_post_type_archive_link($post_type);
      ?>
      <meta name="description" content="<?php echo $excerpt; ?>"/>
      <meta property="og:title" content="<?php echo the_archive_title(); ?>"/>
      <meta property="og:description" content="<?php echo $excerpt; ?>"/>
      <meta property="og:type" content="article"/>
      <meta property="og:url" content="<?php echo $permalink; ?>"/>
      <meta property="og:site_name" content="<?php echo get_bloginfo(); ?>"/>
      <meta property="og:image" content="<?php echo $img; ?>"/>
      <meta name="twitter:card" content="summary_large_image" />
      <meta name="twitter:url" content="<?php echo $permalink; ?>" />
      <meta name="twitter:title" content="<?php echo the_archive_title(); ?>" />
      <meta name="twitter:description" content="<?php echo $excerpt; ?>" />
      <meta name="twitter:image" content="<?php echo $img; ?>" />
      <?php
      }  if(is_author()) {
      
      
        $curauth = $post->post_author;
        
        $excerpt = get_field('profile_biography', 'user_' . $curauth);
        $excerpt = strip_tags($excerpt);
        $excerpt = substr($excerpt, 0, 160);

        $author_img = get_field('profile_image', 'user_' . $curauth);
        $img = $author_img['sizes']['social'];
        
            
        if(!$img) {
          $default_img = get_field('page_header', 'options');
          $img = $default_img['sizes']['social'];
        }
                
        if(!$excerpt) {
          $excerpt = get_bloginfo( "description" );
        }

        $permalink = get_author_posts_url($curauth);
        ?>
        <meta name="description" content="<?php echo $excerpt; ?>"/>
        <meta property="og:title" content="<?php echo the_archive_title(); ?>"/>
        <meta property="og:description" content="<?php echo $excerpt; ?>"/>
        <meta property="og:type" content="article"/>
        <meta property="og:url" content="<?php echo $permalink; ?>"/>
        <meta property="og:site_name" content="<?php echo get_bloginfo(); ?>"/>
        <meta property="og:image" content="<?php echo $img; ?>"/>
        <meta name="twitter:card" content="summary_large_image" />
        <meta name="twitter:url" content="<?php echo $permalink; ?>" />
        <meta name="twitter:title" content="<?php echo the_archive_title(); ?>" />
        <meta name="twitter:description" content="<?php echo $excerpt; ?>" />
        <meta name="twitter:image" content="<?php echo $img; ?>" />
        <?php
        } else {
        return;
      }
  }

  add_action('wp_head', 'blockhaus_opengraph', 10);