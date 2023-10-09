<?php /* Company Logo/Name */

$company_logo = get_field('company_logo', 'option');
$company_name = get_field('company_name', 'option');

$turn_off_search = get_field('turn_off_search', 'option');

if (false != $turn_off_search) {
	$search_icon = '<span class="search-button"><img src="'.get_stylesheet_directory_uri().'/img/icon-search.svg"></span>';
	$search_form = get_search_form(false);
} else {
	$search_icon = '';
	$search_form = '';
} ?>

<!DOCTYPE html>
<!--[if IE 8]>         <html class="no-js lt-ie10 lt-ie9"> <![endif]-->
<!--[if IE 9]>         <html class="no-js lt-ie10"> <![endif]-->
<!--[if gt IE 9]><!--> <html class="no-js" lang="en" xml:lang="en" xmlns= "http://www.w3.org/1999/xhtml"> <!--<![endif]-->
	<head>
		<!-- Global site tag (gtag.js) - Google Analytics -->
		<script async src="https://www.googletagmanager.com/gtag/js?id=UA-714226-1"></script>
		<script>
		  window.dataLayer = window.dataLayer || [];
		  function gtag(){dataLayer.push(arguments);}
		  gtag('js', new Date());

		  gtag('config', 'UA-714226-1');
		</script>

		<!-- Google Tag Manager -->
		<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
		new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
		j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
		'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
		})(window,document,'script','dataLayer','GTM-W9589QS');</script>
		<!-- End Google Tag Manager -->

	<title><?php
	if ( defined( 'WPSEO_FILE' ) ) :
		// Yoast is on, so just output wp_title
		wp_title();
	else:
		// Yoast is off, so build title manually
		wp_title( '|', true, 'right' ); ?><?php bloginfo( 'name' );
	endif;
	?></title>
	<meta http-equiv="Content-Language" content="en">
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="apple-touch-icon" sizes="57x57" href="/apple-icon-57x57.png">
	<link rel="apple-touch-icon" sizes="60x60" href="/apple-icon-60x60.png">
	<link rel="apple-touch-icon" sizes="72x72" href="/apple-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="76x76" href="/apple-icon-76x76.png">
	<link rel="apple-touch-icon" sizes="114x114" href="/apple-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="120x120" href="/apple-icon-120x120.png">
	<link rel="apple-touch-icon" sizes="144x144" href="/apple-icon-144x144.png">
	<link rel="apple-touch-icon" sizes="152x152" href="/apple-icon-152x152.png">
	<link rel="apple-touch-icon" sizes="180x180" href="/apple-icon-180x180.png">
	<link rel="icon" type="image/png" sizes="192x192"  href="/android-icon-192x192.png">
	<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="96x96" href="/favicon-96x96.png">
	<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
	<link rel="manifest" href="/manifest.json">
	<meta name="msapplication-TileColor" content="#ffffff">
	<meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
	<meta name="theme-color" content="#ffffff">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">

	<!--[if lt IE 9]>
		<?php /* HTML5 shiv should load as soon as possible to prevent FOUC */ ?>
		<script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<script>window.html5 || document.write('<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/vendor/html5shiv.js"><\/script>')</script>
	<![endif]-->
	<?php wp_head(); ?>
	<!--[if lt IE 9]>
		<?php /* Resond.min.js needs to come after css files */ ?>
		<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/vendor/respond.min.js"></script>
	<![endif]-->

</head>
<body <?php body_class(get_browser_mobile_classes()); ?>>
<?php wp_body_open ();?>
	<!-- Google Tag Manager (noscript) -->
	<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-W9589QS"
	height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
	<!-- End Google Tag Manager (noscript) -->

<!--    <b class="file-name-snippet">-->
<!--        --><?php //global $template;
//            print_r(basename($template));
//        ?>
<!--    </b>-->

<header itemscope itemtype="http://schema.org/Organization">
	<div class="header-wrapper">
		<div class="inner-wrapper clearfix">
			<div class="hamburger-menu">
				<span class="bun top"></span>
				<span class="patty middle"></span>
				<span class="bun bottom"></span>
			</div>

			<div class="logo clearfix">
				<a href="/">
					<span style="display:none;"><?php echo $company_name; ?></span>
					<?php echo wp_get_attachment_image( $company_logo, 'full' ); ?>
				</a>
			</div>

			<div class="navigation clearfix">
				<?php ns_nav_menu('primary','main-nav clearfix','nav','ns_cleaner_walker_nav_menu',true); ?>
				<?php ns_nav_menu('login','login-nav clearfix','nav','ns_cleaner_walker_nav_menu',true); ?>
			</div>

			<?php /* <div class="navigation clearfix">

				<div class="mobile">
					<?php  $show_section = get_field('show_section', 'option');
					if (false != $show_section) {

						if( have_rows('social_navigation', 'option') ): ?>
						<nav class="social-nav">
							<ul>
							<?php while( have_rows('social_navigation', 'option') ): the_row();
								$icon = get_sub_field('icon');
								$link = get_sub_field('link'); ?>

								<li><a href="<?php echo $link; ?>" target="_blank"><?php echo $icon; ?></a></li>
							<?php endwhile; ?>
							</ul>
						</nav>
						<?php endif;
					} ?>

					<?php ns_nav_menu('footer','footer-nav'); ?>
				</div>
			</div> */ ?>
		</div>
	</div>
</header>
<!--<div class="header-spacer"></div>-->

