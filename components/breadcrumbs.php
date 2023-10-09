<?php if ( is_page() && $post->post_parent > 0 || is_single() ) {
	if ( function_exists('yoast_breadcrumb') ) {

		yoast_breadcrumb('<p id="breadcrumbs">','</p>');
	} 
} ?>