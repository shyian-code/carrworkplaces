<?php

/* Change upload directory
=================================== */
// define( 'UPLOADS', 'media' );


/* =================================================================
	Admin Simplification.

	Generally speaking, you shouldn't have to change these
	settings which simplify the admin screen. However a particular
	WordPress build may call for some of these items, so uncomment
	as your needs require.

	@v3.0 Move from ns-functions.php
 ================================================================= */
/******************************************************************************
 * Included Functions
 ******************************************************************************/
// Include all additional shortcodes
include_once get_stylesheet_directory() . '/inc/shortcodes.php';

//Helpers function
//require_once get_stylesheet_directory() . '/inc/helpers.php';

add_action( 'admin_menu', 'ns_admin_simplify' );
function ns_admin_simplify() {
    remove_meta_box( 'commentsdiv', 'page', 'normal' ); 		// Comments meta box
    remove_meta_box( 'authordiv', 'page', 'normal' ); 			// Author meta box
    remove_meta_box( 'tagsdiv-post_tag', 'page', 'side' ); 		// Post tags meta box
    // remove_meta_box( 'categorydiv', 'page', 'side' ); 		// Category meta box
    // remove_meta_box( 'postexcerpt', 'page', 'normal' ); 		// Excerpt meta box
    // remove_meta_box( 'formatdiv', 'page', 'normal' ); 		// Post format meta box
    remove_meta_box( 'trackbacksdiv', 'page', 'normal' ); 		// Trackbacks meta box
    // remove_meta_box( 'postcustom', 'page', 'normal' ); 		// Custom fields meta box
    remove_meta_box( 'commentstatusdiv', 'page', 'normal' ); 	// Comment status meta box
    // remove_meta_box( 'postimagediv', 'page', 'side' ); 		// Featured image meta box
    // remove_meta_box( 'pageparentdiv', 'page', 'side' ); 		// Page attributes meta box
    // remove_menu_page('index.php'); 							// Dashboard
    // remove_menu_page('edit.php'); 							// Posts
    // remove_menu_page('upload.php');							// Media
    remove_menu_page('link-manager.php'); 						// Links
    // remove_menu_page('edit.php?post_type=page'); 			// Pages
    remove_menu_page('edit-comments.php'); 						// Comments
    // remove_menu_page('themes.php'); 							// Appearance
    // remove_menu_page('plugins.php'); 						// Plugins
    // remove_menu_page('users.php'); 							// Users
    // remove_menu_page('tools.php'); 							// Tools
    // remove_menu_page('options-general.php'); 				// Settings
}


/* =================================================================
Menus & Image Size

NS-base-theme utilizes 'primary' & 'footer' menus for the mainnav
and footer navigation. You may add more if your build requires theme.

You may also add image sizes here, and adjust the dimensions to your
design.

=================================== */

add_action( 'after_setup_theme', 'ns_theme_setup', 11 );

add_theme_support('post-thumbnails');
add_theme_support( 'html5', array( 'gallery', 'caption' ) );
add_theme_support( 'html5', array( 'search-form' ) );

function ns_theme_setup() {
	register_nav_menus(array('primary' => 'Primary Navigation'));
	register_nav_menus(array('login' => 'Login Navigation'));
	register_nav_menus(array('footer' => 'Footer Navigation'));
	register_nav_menus(array('legal' => 'Legal Navigation'));
	// register_nav_menus(array('social-media' => 'Social Media Navigation'));
	// register_nav_menus(array('blog' => 'Blog Navigation'));

	// add_action( 'admin_menu', 'ns_build_wp_menu', 999 );

	// add_image_size( 'home', 940, 360, true );
	// add_image_size( 'feature', 940, 240, true );
	// add_image_size( 'bio', 250, 250, true );

	add_image_size( 'thumbnail', 300, 300, true );
    add_image_size( 'plans-pricing', 378, 317, true );
    add_image_size( 'location-card', 282, 285, true );
	// add_image_size( 'square', 455, 455, true );
	// add_image_size( 'hero-small', 340, 253, true );
	// add_image_size( 'hero-medium', 530, 398, true );
	// add_image_size( 'hero-large', 1300, 600, true );

	add_image_size( 'card', 700, 464, true );
    add_image_size( 'team-member', 392, 555, true );
	// add_image_size( 'hero-small', 680, 506, true );
	add_image_size( 'hero-medium', 2600, 720, true );
	add_image_size( 'hero-large', 2600, 1200, true );
}



/* =================================================================
	Scripts

	Make ajdustments / additions as necessary. If you are using
	Google Fonts, add them in here in the 'google-fonts' section.
 ================================================================= */

add_action( 'wp_enqueue_scripts', function() {

	/* filetime() portion is important! It will automatically flush out the old css or js file when you make a new change to said file! */

	/* All Public Pages
	------------------------ */
	wp_deregister_script('jquery');
	wp_register_script('jquery', get_stylesheet_directory_uri() . '/js/vendor/jquery-1.11.3.min.js', false, false, false);
	wp_enqueue_script('jquery');

    wp_register_script('jquery-ui', '//ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js', false, null, true );
    wp_enqueue_script('jquery-ui');
	// wp_deregister_script('jquery');
	// wp_register_script('jquery', get_stylesheet_directory_uri() . '/js/vendor/jquery-3.2.1.min.js', false, false, false);
	// wp_enqueue_script('jquery');

	wp_register_script('slick-js', get_stylesheet_directory_uri() . '/js/vendor/slick.min.js', null, '1.8.1', true);
    wp_enqueue_script('slick-js');

    wp_register_script('scrollspy-js', get_stylesheet_directory_uri() . '/js/vendor/scrollspy.min.js', array('jquery'), false, false);
	wp_enqueue_script('scrollspy-js');

	// wp_register_script('slick-lightbox-js', get_stylesheet_directory_uri() . '/js/vendor/slick-lightbox.min.js', array('jquery'), false, false);
	// wp_enqueue_script('slick-lightbox-js');

	wp_register_script('site-js', get_stylesheet_directory_uri() . '/js/site-min.js', array('jquery'), filemtime( get_stylesheet_directory() . '/js/site-min.js'), false);
	wp_enqueue_script('site-js');

    wp_enqueue_script( 'custom-js', get_stylesheet_directory_uri() . '/js/custom.js', null, null, true ); /* This should go first */

	wp_register_script('crb-js', get_stylesheet_directory_uri() . '/js/crb-js.js', array('jquery'), filemtime( get_stylesheet_directory() . '/js/crb-js.js'), false);
	wp_enqueue_script('crb-js');

	// wp_register_style('google-fonts', 'https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i', array(), false, 'all');
	// wp_enqueue_style('google-fonts');

	wp_register_style('theme-css', get_stylesheet_directory_uri() . '/css/theme.css', array(), filemtime( get_stylesheet_directory() . '/css/theme.css'), 'all');
	wp_enqueue_style('theme-css');

	wp_register_style('crb-styles', get_stylesheet_directory_uri() . '/css/crb-styles.css', array(), filemtime( get_stylesheet_directory() . '/css/crb-styles.css'), 'all');
	wp_enqueue_style('crb-styles');

	wp_register_style('font-awesome', get_stylesheet_directory_uri() . '/css/font-awesome.css', array(), filemtime( get_stylesheet_directory() . '/css/font-awesome.css'), 'all');
	wp_enqueue_style('font-awesome');

	wp_register_style('style', get_stylesheet_directory_uri() . '/style.css', array('theme-css'), filemtime( get_stylesheet_directory() . '/style.css'), 'all');
	wp_enqueue_style('style');
});

/* Backend Admin Styles */
add_action( 'admin_enqueue_scripts', function() {
	wp_enqueue_style('admin-css' , get_stylesheet_directory_uri().'/css/backend.css');
} );
add_editor_style( 'css/backend.css' );



/* =================================================================
	Proxy Custom Posts Setup

	This is designed for proxy-style sites, where each CPT is essentially
	identical, but named differently, and each CPT will have the option
	to upload a file, or be given an external link.

	Generally these CPT don't
	have their own wp_editor or single page, but there's an option for that.

	To add a new custom post type (CPT), simply add to the array below the format:

	$customposts = array(
		'postname' => 		array('label' => 'Post Type Name'),
	);

	1. CPT's are added in the admin in the order they appear in the array.

	2. The only required field is 'label'. The rest of the fields are set to the following defaults:

	'public' => false,
	'show_ui' => true,
	'show_in_menu' => true,
	'show_in_nav_menus' => true,
	'capability_type' => 'page',
	'hierarchical' => true,
	'query_var' => true,
	'has_archive' => false,
	'rewrite' => false,
	'exclude_from_search' => true,
	'supports' => array('title','editor','page-attributes')

	3. If you need to change a feature or ability a CPT, simply add it to your
	post declaration in the $customposts array. It accepts the same paramaters as
	defined here: https://codex.wordpress.org/Function_Reference/register_post_type

	4. Example: Your post needs taxonomy support and Thumbnail support. Do the following:

	 $customposts = array(
		'postname' => 		array('label' => 'Post Type Name'),
								  'taxonomies' => array('category'),
								  'supports' => array('title','editor','page-attributes','thumbnail')
								 ),
	);

 ================================================================= */

global $customposts;
$customposts = array(

	'bios' => array(
		'label' => 'Team Members',
		'menu_icon' => 'dashicons-groups',
		'public' => true,
		'exclude_from_search' => false,
		'has_archive' => true,
		'supports' => array(
			'title',
			'page-attributes',
			'thumbnail'
		)
	),

	// 'jobs' => array(
	// 	'label' => 'Job Vacancies',
	// 	'menu_icon' => 'dashicons-id-alt',
	// 	'public' => true,
	// 	'exclude_from_search' => false,
	// 	'has_archive' => true,
	// 	'rewrite' => array(
	// 		'slug' => 'contact-us/careers/vacancies',
	// 	),
	// 	'supports' => array(
	// 		'title',
	// 		'page-attributes',
	// 		'editor'
	// 	)
	// ),

	// 'locations' => array(
	// 	'label' => 'Locations',
	// 	'menu_icon' => 'dashicons-admin-site',
	// 	'public' => true,
	// 	'exclude_from_search' => false,
	// 	'has_archive' => true,
	// 	'supports' => array(
	// 		'title',
	// 		'page-attributes',
	// 		'thumbnail'
	// 	)
	// )
);




/* =================================================================
	Custom Post Taxonomies.

	Creating custom taxonomies has been greatly simplified with
	the function ns_register_taxonomy.

	Call it once for each Custom Tax you need to create, using
	the format below.

	@param  string 			$tan(arg)			(REQUIRED)  The slug of the new Taxonomy type.
	@param  array/string  	$posttypes 			(REQUIRED)  An array of post types to attach the Taxonomy to.
												Also accepts one posttype as a string.
	@param  string 			$tax_name 			(REQUIRED)  Plural name of Taxonomy (e.g., Companies)
	@param  string 			$tax_singular_name 	(Optional) 	Singular name of Taxonomy. Defaults to $tax_name. (e.g., Company)
	@param  array           $args               (Optional)  Any other paramaters that register_taxonomy() takes. see:
												https://codex.wordpress.org/Function_Reference/register_taxonomy
	@return void

 ================================================================= */

// ns_register_taxonomy('company', array( 'video', ' visual' ), 'Companies', 'Company');



/* =================================================================
	Register widget area.

	@link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar

 ================================================================= */

// function twentyseventeen_widgets_init() {
// 	register_sidebar( array(
// 		'name'          => __( 'Sidebar', 'twentyseventeen' ),
// 		'id'            => 'sidebar-1',
// 		'description'   => __( 'Add widgets here to appear in your sidebar.', 'twentyseventeen' ),
// 		'before_widget' => '<section id="%1$s" class="widget %2$s">',
// 		'after_widget'  => '</section>',
// 		'before_title'  => '<h3 class="widget-title">',
// 		'after_title'   => '</h3>',
// 	) );

// 	register_sidebar( array(
// 		'name'          => __( 'Footer 1', 'twentyseventeen' ),
// 		'id'            => 'sidebar-2',
// 		'description'   => __( 'Add widgets here to appear in your footer.', 'twentyseventeen' ),
// 		'before_widget' => '<section id="%1$s" class="widget %2$s">',
// 		'after_widget'  => '</section>',
// 		'before_title'  => '<h3 class="widget-title">',
// 		'after_title'   => '</h3>',
// 	) );

// 	register_sidebar( array(
// 		'name'          => __( 'Footer 2', 'twentyseventeen' ),
// 		'id'            => 'sidebar-3',
// 		'description'   => __( 'Add widgets here to appear in your footer.', 'twentyseventeen' ),
// 		'before_widget' => '<section id="%1$s" class="widget %2$s">',
// 		'after_widget'  => '</section>',
// 		'before_title'  => '<h3 class="widget-title">',
// 		'after_title'   => '</h3>',
// 	) );
// }
// add_action( 'widgets_init', 'twentyseventeen_widgets_init' );



/* =================================================================
	Gravity Forms

		- Error Message
		- Ajax Spinner: https://thomasgriffin.io/change-default-gravity-forms-ajax-spinner/
		- Add "Add form" to ACF options page

 ================================================================= */

/* Ajax Spinner */
// add_filter( 'gform_ajax_spinner_url', 'ns_custom_gforms_spinner' );

// function ns_custom_gforms_spinner( $src ) {
//     return get_stylesheet_directory_uri() . '/img/spiffygif_24x24.gif';
// }



/* =================================================================
	Custom Editor Formats

		- Dropcap

 ================================================================= */

// function my_mce_buttons_2( $buttons ) {
// 	array_unshift( $buttons, 'styleselect' );
// 	return $buttons;
// }

// add_filter( 'mce_buttons_2', 'my_mce_buttons_2' );

// function my_mce_before_init_insert_formats( $init_array ) {

// 	$style_formats = array(

// 		array(
// 			'title' => 'List Tick',
// 			'inline' => 'span',
// 			'classes' => 'list-tick',
// 			'wrapper' => true,
// 		),

// 		array(
// 			'title' => 'Arrow Link',
// 			'inline' => 'span',
// 			'classes' => 'arrow-link',
// 			'wrapper' => true,
// 		),

// 		array(
// 			'title' => 'Button Link',
// 			'block' => 'div',
// 			'classes' => 'button',
// 			'wrapper' => true,
// 		)
// 	);
// 	$init_array['style_formats'] = json_encode( $style_formats );

// 	return $init_array;
// }

// add_filter( 'tiny_mce_before_init', 'my_mce_before_init_insert_formats' );



/**
 * Move Yoast to bottom
 *
 * @see https://gist.github.com/aderaaij/6767503
 */
function ns_move_yoast_to_bottom() {
	return 'low';
}
add_filter( 'wpseo_metabox_prio', 'ns_move_yoast_to_bottom');


/**
 * Output background image style
 *
 * @param array|string $img Image array or url
 * @param string $size Image size to retrieve
 * @param bool $echo Whether to output the the style tag or return it.
 *
 * @return string|void String when retrieving.
 */
function bg( $img = '', $size = '', $echo = true ) {

    if ( empty( $img ) ) {
        return false;
    }

    if ( is_array( $img ) ) {
        $url = $size ? $img['sizes'][$size] : $img['url'];
    } else {
        $url = $img;
    }

    $string = 'style="background-image: url(' . $url . ')"';

    if ( $echo ) {
        echo $string;
    } else {
        return $string;
    }
}


/**
 * NS Custom Functions
 */
function ns_background($background) {
	if ('white' == $background) {
		return ' white';
	} else if ('beige' == $background) {
		return ' beige';
	}
}

function ns_section_header($sub_field=true, $icon=false) {
	if (true != $sub_field)  {
		$section_header = get_field('section_header', 'option');
		$section_header_sub_text = get_field('sub_header_text', 'option');
	} else {
		$section_header = get_sub_field('section_header', 'option');
		$section_header_sub_text = get_sub_field('sub_header_text', 'option');
	}

	if (false != $icon) {
		$icon = get_sub_field('section_header_icon');

		$icon = '<img src="'.$icon.'">';
	} else {
		$icon = '';
	}

    if ('' != $section_header)
		$section_header =
            '<div class="section-header">'.
                $icon.'<h2 class="section-header__title">'.$section_header.'</h2>'.
                '<p class="section-header__sub-text">'.$section_header_sub_text.'</p>'.
            '</div>';
	else $section_header = '';

	return $section_header;
}

function ns_link_type($type, $sub_field=true) {

	if (true != $sub_field)
		$link = get_field($type.'_link', 'option');
	else $link = get_sub_field($type.'_link', 'option');

	if ('standard' == $type)
		$arrow = ' →';
	else $arrow = '';

	$add_link = $link['add_'.$type.'_link'];

	if (false != $add_link) {

		$link_type = $link['link_type'];
		$link_title = $link['link_title'];
		$new_window = $link['open_in_new_window'];

		if ('internal-page-link' == $link_type) {

			$link = $link['internal_page_link'];
		} else if ('external-page-link' == $link_type) {

			$link = $link['external_page_link'];
			$target = ' target="_blank"';
		} else if ('file-link' == $link_type) {

			$link = $link['file_link'];
			$target = ' target="_blank"';
		} else if ('manual-link' == $link_type) {

			$link = $link['manual_link'];
		}

		if('button' == $type) { // Manual override for external hero links
			if($new_window) {
				$target = ' target="_blank"';
			} else {
				$target = '';
			}
		}

		$link = '<div class="'.$type.'">
		            <a href="'.$link.'"'.$target.'>'.$link_title.$arrow.'</a>
		         </div>';
	}  else {
		$link = '';
	}

	return $link;
}

// Populate Gravity Form with Cookie
add_action('init', 'hubspot_utm_content_cookie');
function hubspot_utm_content_cookie() {
	if($_GET['utm_content']):
		setcookie('utm_content', $_GET['utm_content'], time() + 1800, '/');
		$_COOKIE['utm_content'] = $_GET['utm_content'];
	endif;

}

add_filter( 'gform_field_value_utm_content', 'populate_utm_content' );
function populate_utm_content( $value ) {
   return $_COOKIE['utm_content'];
}

add_action('init', 'hubspot_utm_campaign_cookie');
function hubspot_utm_campaign_cookie() {
	if($_GET['utm_campaign']):
		setcookie('utm_campaign', $_GET['utm_campaign'], time() + 1800, '/');
		$_COOKIE['utm_campaign'] = $_GET['utm_campaign'];
	endif;
}

add_filter( 'gform_field_value_utm_campaign', 'populate_utm_campaign' );
function populate_utm_campaign( $value ) {
   return $_COOKIE['utm_campaign'];
}


add_action('init', 'hubspot_utm_source_cookie');
function hubspot_utm_source_cookie() {
	if($_GET['utm_source']):
		setcookie('utm_source', $_GET['utm_source'], time() + 1800, '/');
		$_COOKIE['utm_source'] = $_GET['utm_source'];
	endif;
}

add_filter( 'gform_field_value_utm_source', 'populate_utm_source' );
function populate_utm_source( $value ) {
   return $_COOKIE['utm_source'];
}


add_action('init', 'hubspot_utm_medium_cookie');
function hubspot_utm_medium_cookie() {
	if($_GET['utm_medium']):
		setcookie('utm_medium', $_GET['utm_medium'], time() + 1800, '/');
		$_COOKIE['utm_medium'] = $_GET['utm_medium'];
	endif;
}

add_filter( 'gform_field_value_utm_medium', 'populate_utm_medium' );
function populate_utm_medium( $value ) {
   return $_COOKIE['utm_medium'];
}


/* Disable WordPress Admin Bar for all users */
//add_filter( 'show_admin_bar', '__return_true', 9999 );

add_filter( 'manage_pages_columns', 'page_column_views' );
add_action( 'manage_pages_custom_column', 'page_custom_column_views', 5, 2 );
function page_column_views( $defaults )
{
    $defaults['page-layout'] = __('Template');
    return $defaults;
}
function page_custom_column_views( $column_name, $id )
{
    if ( $column_name === 'page-layout' ) {
        $set_template = get_post_meta( get_the_ID(), '_wp_page_template', true );
        if ( $set_template == 'default' ) {
            echo 'Default';
        }
        $templates = get_page_templates();
        ksort( $templates );
        foreach ( array_keys( $templates ) as $template ) :
            if ( $set_template == $templates[$template] ) echo $template;
        endforeach;
    }
}
