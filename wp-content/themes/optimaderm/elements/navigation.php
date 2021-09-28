<nav aria-label="Main">
	<?php wp_nav_menu(array(
		'container' => false,                           // remove nav container
		'container_class' => 'menu cf',                 // class of container (should you choose to use it)
		'menu' => __( 'Main Navigation', 'optimaderm' ),  // nav name
		'menu_class' => 'nav main_nav desktop cf',               // adding custom nav class
		'theme_location' => 'main_nav',                 // where it's located in the theme
		'before' => '',                                 // before the menu
		'after' => '',                                  // after the menu
		'link_before' => '',                            // before each link
		'link_after' => '',                             // after each link
		'depth' => 0,                                   // limit the depth of the nav
		'fallback_cb' => ''                             // fallback function (if there is one)
	)); ?>
	<button class="hamburger hamburger--squeeze" type="button" aria-label="Menu" aria-controls="navigation">
	  <span class="hamburger-box">
		<span class="hamburger-inner"></span>
	  </span>
	</button>
	
</nav>

<div id="mobile_nav">
	<div class="contents">
		<?php wp_nav_menu(array(
			'container' => false,                           // remove nav container
			'container_class' => 'menu cf',                 // class of container (should you choose to use it)
			'menu' => __( 'Main Navigation', 'optimaderm' ),  // nav name
			'menu_class' => 'nav main_nav desktop cf',               // adding custom nav class
			'theme_location' => 'main_nav',                 // where it's located in the theme
			'before' => '',                                 // before the menu
			'after' => '',                                  // after the menu
			'link_before' => '',                            // before each link
			'link_after' => '',                             // after each link
			'depth' => 0,                                   // limit the depth of the nav
			'fallback_cb' => ''                             // fallback function (if there is one)
		)); ?>
		<?php wp_nav_menu(array(
			'container' => false,                           // remove nav container
			'container_class' => 'menu cf',                 // class of container (should you choose to use it)
			'menu' => __( 'Utility Navigation', 'banknewport' ),  // nav name
			'menu_class' => 'nav utility_nav cf',               // adding custom nav class
			'theme_location' => 'utility_nav',                 // where it's located in the theme
			'before' => '',                                 // before the menu
			'after' => '',                                  // after the menu
			'link_before' => '',                            // before each link
			'link_after' => '',                             // after each link
			'depth' => 0,                                   // limit the depth of the nav
			'fallback_cb' => ''                             // fallback function (if there is one)
		)); ?>
		<?php wp_nav_menu(array(
			'container' => false,                           // remove nav container
			'container_class' => 'menu cf',                 // class of container (should you choose to use it)
			'menu' => __( 'Social Media', 'optimaderm' ),  // nav name
			'menu_class' => 'social cf',               // adding custom nav class
			'theme_location' => 'footer_nav_col_3',                 // where it's located in the theme
			'before' => '',                                 // before the menu
			'after' => '',                                  // after the menu
			'link_before' => '',                            // before each link
			'link_after' => '',                             // after each link
			'depth' => 0,                                   // limit the depth of the nav
			'fallback_cb' => ''                             // fallback function (if there is one)
		)); ?>
	</div>
</div>