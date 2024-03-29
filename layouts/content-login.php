<?php
/**
 * Template part for displaying login page in page-login.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package blockhaus
 */

?>

<article id="post-<?php the_ID(); ?>" class="p-6 w-11/12 md:w-3/4 mx-auto space-y-6">
	<header class="entry-header sr-only">
		<?php 
		if( !is_user_logged_in()): 
			the_title( '<h1 class="has-gigantic-font-size font-black">', '</h1>' ); 
		else:
			echo '<h1 class="has-gigantic-font-size font-black">Logged in</h1>';
		endif;
		?>
		
	</header><!-- .entry-header -->

	

	<div class="space-y-6">
		<div class="bg-neutral-light-100 p-20 rounded-md">
		<?php
		the_content();

		$args = array(
			'id_username' => 'user',
			'id_password' => 'pass',
		);

		if( !is_user_logged_in() ) {

			wp_login_form( $args );
			echo '<div class="flex gap-6 items-center justify-center mt-6"><a class="password-reset underline decoration-highlight decoration-2 hover:decoration-secondary focus:decoration-secondary" href="' . wp_lostpassword_url( ) . '" title="Lost Password">Click this link to reset your password</a></div>';
			
		} else {

			$current_user = wp_get_current_user();
		
			echo '<div class="flex flex-col gap-6 items-center justify-center mt-6">
			<p>Hi, ' . $current_user->display_name . '</p>
			<a class="bg-primary-default py-1 px-12 rounded-md shadow-md border border-current cursor-pointer hover:ring-2 hover:ring-yellow-400 focus:ring-2 focus:ring-yellow-400" href="' . esc_url( wp_logout_url() ) . '">Logout</a></div>';
		}

		// wp_link_pages(
		// 	array(
		// 		'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'blockhaus' ),
		// 		'after'  => '</div>',
		// 	)
		// );
		?>
		</div>
	</div><!-- .entry-content -->

</article><!-- #post-<?php the_ID(); ?> -->
