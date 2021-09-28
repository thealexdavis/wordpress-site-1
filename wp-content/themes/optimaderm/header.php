<!doctype html>

<!--[if lt IE 7]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8 lt-ie7"><![endif]-->
<!--[if (IE 7)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8"><![endif]-->
<!--[if (IE 8)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9"><![endif]-->
<!--[if gt IE 8]><!--> <html <?php language_attributes(); ?> class="no-js"><!--<![endif]-->

<head>
	<!-- Google Tag Manager -->
		<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
		new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
		j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
		'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
		})(window,document,'script','dataLayer','GTM-KTBX8P3');</script>
		<!-- End Google Tag Manager -->
  	<meta charset="utf-8">

	<?php // force Internet Explorer to use the latest rendering engine available ?>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	
	<meta name="HandheldFriendly" content="True">
	<meta name="MobileOptimized" content="320">
	<meta name="viewport" content="width=device-width, initial-scale = 1.0, maximum-scale=1.0, user-scalable=no" />
	<meta name="facebook-domain-verification" content="aajmwprr4aztqh4llbwwah0nyncekn" />
	<title><?php wp_title( '|', true, 'right' ); ?></title>

	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
	<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="https://kit.fontawesome.com/a12c727493.js" crossorigin="anonymous"></script>
	
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/styles/css/slick.css">
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/styles/css/hamburgers.min.css">
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/styles/css/main.css">
	
	
	<?php wp_head(); ?>
	
	<?php
		global $post;
		if (!empty($post)){
			$post_slug=$post->post_name;
		}
    ?>
	
	<script type="text/javascript" src="https://www.bugherd.com/sidebarv2.js?apikey=1jzk2vfxk9krgzrpq3rfta" async="true"></script>
	
	<!--[if lt IE 9]>
    	<script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script>
	<![endif]-->
	
</head>

<?php
	$loginclass = "";
	if ( !is_user_logged_in() ) {
		$loginclass = "user";
	}
?>

<body id="optima" class="<?php echo $loginclass; ?>" data-id="<?php echo get_the_id(); ?>">
	<!-- Google Tag Manager (noscript) -->
		<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-KTBX8P3"
		height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
		<!-- End Google Tag Manager (noscript) -->
	
	<header id="header" class="headroom headroom--top headroom--bottom">
		
		<div id="search_frame">
			<div class="bgclick"></div>
			<a class="search_close" title="Search"><i class="fal fa-times" aria-hidden="true" title="Close the Search Bar"></i></a>
			<?php echo get_search_form(); ?>
		</div>
		
		<div class="container">
			<?php wp_nav_menu(array(
				'container' => false,                           // remove nav container
				'container_class' => 'menu cf',                 // class of container (should you choose to use it)
				'menu' => __( 'Utility Navigation', 'optimaderm' ),  // nav name
				'menu_class' => 'nav utility_nav cf',               // adding custom nav class
				'theme_location' => 'utility_nav',                 // where it's located in the theme
				'before' => '',                                 // before the menu
				'after' => '',                                  // after the menu
				'link_before' => '',                            // before each link
				'link_after' => '',                             // after each link
				'depth' => 0,                                   // limit the depth of the nav
				'fallback_cb' => ''                             // fallback function (if there is one)
			)); ?>
			<?php
				$custom_logo_id = get_theme_mod( 'custom_logo' );
				$logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
				if ( has_custom_logo() ) {
					echo '<a href="/" class="logo"><img src="'. esc_url( $logo[0] ) .'" alt="Optima Dermatology"></a>';
				}
			?>
			<?php include 'elements/navigation.php'; ?>
		</div>
	</header>