<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package blockhaus
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */

function blockhaus_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.

	$consentPanel = get_field('consent_panel_settings', 'options');
	$theme = $consentPanel['theme'];
	
	$classes[] = 'flex flex-col h-full w-full bg-neutral-light-100 bg-cover bg-fixed ' . $theme;

	return $classes;
}
add_filter( 'body_class', 'blockhaus_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function blockhaus_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'blockhaus_pingback_header' );


function ns_google_analytics() { 
	
	if(function_exists('get_field')):
	
		$analytics = get_field('analytics_settings', 'option');
		$analyticsSet = $analytics['analytics_cookies_set'];
		$analyticsTrackingCode = $analytics['analytics_tracking'];
	
	endif;
	
	if($analyticsSet):
// Clarity id fh8fj24caq
	$gaCode = $analyticsTrackingCode;?>
	<script type="text/javascript">
    (function(c,l,a,r,i,t,y){
        c[a]=c[a]||function(){(c[a].q=c[a].q||[]).push(arguments)};
        t=l.createElement(r);t.async=1;t.src="https://www.clarity.ms/tag/"+i;
				t.setAttribute('data-cookiecategory', "analytics");
			
        y=l.getElementsByTagName(r)[0];y.parentNode.insertBefore(t,y);
    })(window, document, "clarity", "script", "<?php echo $gaCode; ?>");
</script>
	<!-- <script type="text/plain" data-cookiecategory="analytics" async src="https://www.googletagmanager.com/gtag/js?id=<?php // echo $gaCode; ?>"></script>
	<script type="text/plain" data-cookiecategory="analytics">
	window.dataLayer = window.dataLayer || [];
	function gtag(){dataLayer.push(arguments);}
	gtag('js', new Date());
	 
	gtag('config', '<?php // echo $gaCode; ?>');
	</script> -->
	<?php endif;
	}
	 
	add_action( 'wp_head', 'ns_google_analytics', 10 );
	
	/**
 * Modify YouTube oEmbeds to use youtube-nocookie.com
 
 */

	function youtube_embed_nocookies( $new_url, $url = null ) {
	
		// Search for youtu to return true for both youtube.com and youtu.be URLs
		if ( strpos( $url, 'youtu' ) ) {
			$new_url = preg_replace( '/youtube\.com\/(v|embed)\//s', 'youtube-nocookie.com/$1/', $new_url );

		}
	
		return $new_url;
	}
	add_filter( 'embed_oembed_html', 'youtube_embed_nocookies', 10, 2 );


if(function_exists('get_field')):

	$social_media = get_field('social_media_settings', 'option');
	$enhancedPrivacy = $social_media['enhanced_privacy'];

endif;

if($enhancedPrivacy):
function filter_youtube_embed( $cached_html, $url = null ) {

	
		
		$cached_html = str_replace('<iframe ','<div class="p-6 w-1/2 mx-auto privacy-message">When viewing an embedded video tracking cookies will be set by the video provider. To protect your privacy we ask specific consent before viewing videos on this website. By clicking the button below, you agree to enable the cookies that allow for the video to play.<button onclick="showVideo(this)" class="bg-primary-default px-3 py-1 w-fit mx-auto rounded-md shadow-md">Accept and Load Video</button></div><iframe hidden ',$cached_html);
		
		
	return $cached_html;
}
add_filter( 'embed_oembed_html', 'filter_youtube_embed', 10, 2 );
endif;