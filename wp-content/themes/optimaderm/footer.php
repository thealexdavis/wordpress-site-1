<footer id="footer">
	<div class="container">
		<div class="col-sm-15 first">
			<div class="col-sm-15">
				<?php wp_nav_menu(array(
					'container' => false,                           // remove nav container
					'container_class' => 'menu cf',                 // class of container (should you choose to use it)
					'menu' => __('Footer Nav Column 1', 'optimaderm'),  // nav name
					'menu_class' => 'nav firstlist desktop cf',               // adding custom nav class
					'theme_location' => 'footer_nav_col_1',                 // where it's located in the theme
					'before' => '',                                 // before the menu
					'after' => '',                                  // after the menu
					'link_before' => '',                            // before each link
					'link_after' => '',                             // after each link
					'depth' => 0,                                   // limit the depth of the nav
					'fallback_cb' => ''                             // fallback function (if there is one)
				)); ?>
			</div>
			<div class="col-sm-15">
				<?php wp_nav_menu(array(
					'container' => false,                           // remove nav container
					'container_class' => 'menu cf',                 // class of container (should you choose to use it)
					'menu' => __('Footer Nav Column 2', 'optimaderm'),  // nav name
					'menu_class' => 'nav next desktop cf',               // adding custom nav class
					'theme_location' => 'footer_nav_col_2',                 // where it's located in the theme
					'before' => '',                                 // before the menu
					'after' => '',                                  // after the menu
					'link_before' => '',                            // before each link
					'link_after' => '',                             // after each link
					'depth' => 0,                                   // limit the depth of the nav
					'fallback_cb' => ''                             // fallback function (if there is one)
				)); ?>
			</div>
		</div>
		<div class="col-sm-15 last">
			<div class="top">
				<?php
				$custom_logo_id = get_theme_mod('custom_logo');
				$logo = wp_get_attachment_image_src($custom_logo_id, 'full');
				if (has_custom_logo()) {
					echo '<a href="/" class="logo"><img src="' . esc_url($logo[0]) . '" alt="Optima Dermatology"></a>';
				}
				?>
				<a href="tel:8552779689" class="phone"><i class="fas fa-phone-alt"></i> (855) 277–9689</a>
			</div>
			<div class="bottom">
				<div class="btns">
					<?php
					if (is_active_sidebar('footer_cta')) :
						dynamic_sidebar('footer_cta');
					endif;
					?>
					<?php wp_nav_menu(array(
						'container' => false,                           // remove nav container
						'container_class' => 'menu cf',                 // class of container (should you choose to use it)
						'menu' => __('Social Media', 'optimaderm'),  // nav name
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
				<div class="copyright">
					<p>&copy; Optima Dermatology <?php echo date("Y"); ?>. All Rights Reserved.</p>
				</div>
			</div>
		</div>
	</div>
</footer>

<?php wp_footer(); ?>
<script src="<?php echo get_template_directory_uri(); ?>/js/slick.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/headroom.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/jQuery.headroom-min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/custom.js"></script>

</body>

</html>