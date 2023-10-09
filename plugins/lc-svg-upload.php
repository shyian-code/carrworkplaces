<?php
/*
Plugin Name: SVG Upload
Plugin URI: http://www.lewiscowles.co.uk
Description: Super PHP Plugin to add Full SVG Media support to WordPress, I should live in {$webroot}/wp-content/plugins/ folder ;)
Author: Lewis Cowles
Version: 1.5.8
Author URI: http://www.lewiscowles.co.uk/
*/

class SVGSupport {

	function __construct() {
		add_action( 'admin_init', array( $this, 'add_svg_upload' ) );

		add_action( 'load-post.php', array( $this, 'add_editor_styles' ) );
		add_action( 'load-post-new.php', array( $this, 'add_editor_styles' ) );

		add_filter( 'wp_get_attachment_image_attributes', array( $this, 'add_svg_fallback' ), 10, 2 );
		add_filter( 'wp_get_attachment_image_src', array( $this, 'fix_wp_get_attachment_image_svg' ), 10, 4 );
	}

	public function add_svg_upload() {
		ob_start();
		add_action( 'wp_ajax_adminlc_mce_svg.css', array( $this, 'tinyMCE_svg_css' ) );
		add_filter( 'image_send_to_editor', array( $this, 'remove_dimensions_svg' ), 10 );

		add_filter( 'upload_mimes', array( $this, 'filter_mimes' ) );
		add_action( 'shutdown', array( $this, 'on_shutdown' ), 0 );
		add_filter( 'final_output', array( $this, 'fix_template' ) );
	}

	public function add_svg_fallback($atts, $attachment) {
		if (get_post_mime_type( $attachment->ID ) == 'image/svg+xml' && ($full_size = wp_get_attachment_image_src( $attachment->ID, 'full' )) && !empty( $full_size[0] )) {
			$upload_dir = wp_upload_dir();
			$alt = array_shift(glob(str_replace($upload_dir['baseurl'], $upload_dir['basedir'], preg_replace('#'.preg_quote(pathinfo($full_size[0], PATHINFO_EXTENSION)).'$#', "{png,jpg,gif}", $full_size[0])), GLOB_BRACE));
			if($alt) $atts['onError'] = "this.onerror=null;this.src='".str_replace($upload_dir['basedir'], $upload_dir['baseurl'], $alt)."';";
		}
		return $atts;
	}

	public function add_editor_styles() {
		add_filter( 'mce_css', array( $this, 'filter_mce_css' ) );
	}

	public function filter_mce_css( $mce_css ) {
		global $current_screen;
		$mce_css .= ', ' . '/wp-admin/admin-ajax.php?action=adminlc_mce_svg.css';
		return $mce_css;
	}

	public function remove_dimensions_svg( $html = '' ) {
		return str_ireplace( array( ' width="1"', ' height="1"' ), '', $html );
	}
	
	public function fix_wp_get_attachment_image_svg($image, $attachment_id, $size, $icon) {
		if (is_array($image) && preg_match('/\.svg$/i', $image[0]) && $image[1] == 1) {
			if(is_array($size)) {
				$image[1] = $size[0];
				$image[2] = $size[1];
			} elseif(($xml = simplexml_load_file($image[0])) !== false) {
				$attr = $xml->attributes();
				$viewbox = explode(' ', $attr->viewBox);
				$image[1] = isset($attr->width) && preg_match('/\d+/', $attr->width, $value) ? (int) $value[0] : (count($viewbox) == 4 ? (int) $viewbox[2] : null);
				$image[2] = isset($attr->height) && preg_match('/\d+/', $attr->height, $value) ? (int) $value[0] : (count($viewbox) == 4 ? (int) $viewbox[3] : null);
			} else {
				$image[1] = $image[2] = null;
			}
		}
		return $image;
	}
	
	public function tinyMCE_svg_css() {
		header( 'Content-type: text/css' );
		echo 'img[src$=".svg"] { width: 100%; height: auto; }';
		exit();
	}

	public function filter_mimes( $mimes = array() ){
		$mimes[ 'svg' ] = 'image/svg+xml';
		return $mimes;
	}

	public function on_shutdown() {
		$final = '';
		$ob_levels = count( ob_get_level() );
		for ( $i = 0; $i < $ob_levels; $i++ ) {
			$final .= ob_get_clean();
		}
		echo apply_filters( 'final_output', $final );
	}

	public function fix_template( $content = '' ) {
		$content = str_replace(
			'<# } else if ( \'image\' === data.type && data.sizes && data.sizes.full ) { #>',
			'<# } else if ( \'svg+xml\' === data.subtype ) { #>
				<img class="details-image" src="{{ data.url }}" draggable="false" />
			<# } else if ( \'image\' === data.type && data.sizes && data.sizes.full ) { #>',
			$content
		);
		$content = str_replace(
			'<# } else if ( \'image\' === data.type && data.sizes ) { #>',
			'<# } else if ( \'svg+xml\' === data.subtype ) { #>
				<div class="centered">
					<img src="{{ data.url }}" class="thumbnail" draggable="false" />
				</div>
			<# } else if ( \'image\' === data.type && data.sizes ) { #>',
			$content
		);
		return $content;
	}
}
new SVGSupport();