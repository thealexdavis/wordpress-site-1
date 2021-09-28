<?php

	add_action('pre_get_posts', 'kill_taxonomy_archive');
	function kill_taxonomy_archive($qry) {
	
		if (is_admin()) return;
	
		if (is_tax('provtype')){
			$qry->set_404();
		}
	}

	function careersShortcode() {
		$careersList = "";
		$handle = curl_init();

		$url = "https://boards-api.greenhouse.io/v1/boards/optimadermatologycareers/jobs?content=true";

		// Set the url
		curl_setopt($handle, CURLOPT_URL, $url);
		// Set the result output to be a string.
		curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);

		$output = curl_exec($handle);

		curl_close($handle);
		$outputArray = json_decode($output);
		$allLocations = array();
		$allDepartments = array();
		$locationsSelect = "<option value='all'>All Offices</option>";
		$departmentsSelect = "<option value='all'>All Departments</option>";
		foreach($outputArray->jobs as $job){
			if($job->departments[0]->name == ""){
				$job->departments[0]->name = "Interested in our Company?";
			}
			// $careersList .= '<div class="job" data-date="'.$job->updated_at.'" data-dept="'.$job->departments[0]->name.'" data-loc="'.$job->location->name.'"><a href="'.$job->absolute_url.'" target="_blank">'.$job->title.'</a><p>'.$job->location->name.'</p></div>';
			$jobsArray[] = array("date"=>$job->updated_at, "dept"=>$job->departments[0]->name, "location"=>$job->location->name, "url"=>$job->absolute_url, "title"=>$job->title);
			if (!in_array($job->departments[0]->name, $allDepartments) && $job->departments[0]->name !== "Recruiting" && $job->departments[0]->name !== "Interested in our Company?"){				
				array_push($allDepartments, $job->departments[0]->name);
				$departmentsSelect .= '<option value="'.$job->departments[0]->name.'">'.$job->departments[0]->name.'</option>';
			}
			if (!in_array($job->location->name, $allLocations)){
				array_push($allLocations, $job->location->name);
				$locationsSelect .= '<option value="'.$job->location->name.'">'.$job->location->name.'</option>';
			}
		}
		sort($allDepartments);
		array_push($allDepartments, "Recruiting", "Interested in our Company?");
		$departmentsSelect .= '<option value="Recruiting">Recruiting</option>';
		$departmentsSelect .= '<option value="Interested in our Company?">Interested in our Company?</option>';
		foreach($allDepartments as $department){
			$careersList .= '<h3 class="jobtitle" data-dept="'.$department.'">'.$department.'</h3>';
			// echo $department;
			foreach($jobsArray as $job){
				if($department == $job['dept']){
					$careersList .= '<div class="job" data-date="'.$job['date'].'" data-dept="'.$job['dept'].'" data-loc="'.$job['location'].'"><a href="'.$job['url'].'" target="_blank">'.$job['title'].'</a><p>'.$job['location'].'</p></div>';
				}
			}
		}
		return '<div class="filters_wrap"><form id="careers_filter" action="/dermatology-jobs/" method="post"><div class="filter selectfilter"><label for="departmentfilter">Department</label><select id="departmentfilter">'.$departmentsSelect.'</select></div><div class="filter selectfilter"><label for="locationsfilter">Office</label><select id="locationsfilter">'.$locationsSelect.'</select></div></div></form>'.$careersList;
	}
	add_shortcode('careers', 'careersShortcode');

	add_image_size( 'hero-img', 1600, 200, array( 'center', 'center' ) );

	add_image_size( 'location-img', 1920, 450, array( 'center', 'center' ) );

	add_action( 'init', 'optima_add_excerpts_to_pages' );
	function optima_add_excerpts_to_pages() {
		add_post_type_support( 'page', 'excerpt' );
	}

	//REGISTERING CUSTOMIZER OPTIONS
	function footer_logo_register( $wp_customize ) {
		$wp_customize->add_setting( 'footer_logo' ); // Add setting for logo uploader

		// Add control for logo uploader (actual uploader)
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'footer_logo', array(
			'label'    => __( 'Footer Logo', 'optimaderm' ),
			'section'  => 'title_tagline',
			'settings' => 'footer_logo',
		) ) );
	}
	add_action( 'customize_register', 'footer_logo_register' );

	add_theme_support( 'custom-logo' );

	//REGISTERING NAV
	register_nav_menus(
		array(
			'main_nav' => __('Main Nav','optimaderm'),
			'utility_nav' => __('Utility Nav','optimaderm'),
			'footer_nav_col_1' => __('Footer Nav Column 1','optimaderm'),
			'footer_nav_col_2' => __('Footer Nav Column 2','optimaderm'),
			'footer_nav_col_3' => __('Social Media','optimaderm'),
		)
	);

	//REGISTERING THUMBNAILS
	add_theme_support( 'post-thumbnails' );

	//REGISTERING POST TYPE
	function create_post_type() {
		register_post_type( 'location',
			array(
				'labels' => array(
					'name' => __( 'Locations' ),
					'singular_name' => __( 'Location' )
				),
			'public' => true,
			'has_archive' => false,
			'supports' => array( 'title', 'editor', 'thumbnail' ),
			'menu_icon' => 'dashicons-location',
			'rewrite' => array('slug' => 'locations/%state_region%'),
			'taxonomies' => array('post_tag','state_region'),
			)
		);
		register_post_type( 'provider',
			array(
				'labels' => array(
					'name' => __( 'Providers' ),
					'singular_name' => __( 'Provider' )
				),
			'public' => true,
			'has_archive' => false,
			'supports' => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
			'menu_icon' => 'dashicons-groups',
			'rewrite' => array('slug' => 'provider'),
			'taxonomies' => array('post_tag'),
			)
		);
	}
	add_action( 'init', 'create_post_type' );

	function wpa_location_post_link( $post_link, $id = 0 ){
		$post = get_post($id);
		if ( is_object( $post ) ){
			$terms = wp_get_object_terms( $post->ID, 'state_region' );
			if( $terms ){
				return str_replace( '%state_region%' , $terms[0]->slug , $post_link );
			}
		}
		return $post_link;
	}
	add_filter( 'post_type_link', 'wpa_location_post_link', 1, 3 );

	//REGISTER TAXONOMY
	function themes_taxonomy() {
		register_taxonomy(
			'state_region',  //The name of the taxonomy. Name should be in slug form (must not contain capital letters or spaces).
			'location',        //post type name
			array(
				'hierarchical' => true,
				'label' => 'State',  //Display name
				'query_var' => true,
				'rewrite' => array(
					'slug' => 'state_region', // This controls the base slug that will display before each term
					'with_front' => false // Don't display the category base before
				)
			)
		);
		register_taxonomy(
			'specialty',  //The name of the taxonomy. Name should be in slug form (must not contain capital letters or spaces).
			'provider',        //post type name
			array(
				'hierarchical' => true,
				'label' => 'Services',  //Display name
				'query_var' => true,
				'rewrite' => array(
					'slug' => 'specialty', // This controls the base slug that will display before each term
					'with_front' => false // Don't display the category base before
				)
			)
		);
		register_taxonomy(
			'gender',  //The name of the taxonomy. Name should be in slug form (must not contain capital letters or spaces).
			'provider',        //post type name
			array(
				'hierarchical' => true,
				'label' => 'Gender',  //Display name
				'query_var' => true,
				'rewrite' => array(
					'slug' => 'gender', // This controls the base slug that will display before each term
					'with_front' => false // Don't display the category base before
				)
			)
		);
		register_taxonomy(
			'provtype',  //The name of the taxonomy. Name should be in slug form (must not contain capital letters or spaces).
			'provider',        //post type name
			array(
				'hierarchical' => true,
				'label' => 'Type',  //Display name
				'query_var' => true,
				'rewrite' => array(
					'slug' => 'provtype', // This controls the base slug that will display before each term
					'with_front' => false // Don't display the category base before
				)
			)
		);
	}
	add_action( 'init', 'themes_taxonomy');

	//WIDGETS
	function optima_widgets() {
		register_sidebar( array(
			'name'          => 'Footer CTAs',
			'id'            => 'footer_cta',
			'before_widget' => '',
			'after_widget'  => '',
		));
	}
	add_action( 'widgets_init', 'optima_widgets' );

	//META FIELDS
	function meta_styles(){
		global $post;
		wp_enqueue_style( 'metastyles', get_template_directory_uri() . '/styles/css/metastyles.css' );
	}
	add_action( 'admin_print_styles', 'meta_styles' );
	function prfx_image_enqueue() {
		global $post;
			wp_enqueue_media();

			// Registers and enqueues the required javascript.
			wp_register_script( 'meta-box-image', get_template_directory_uri() . '/js/metascripts.js', array( 'jquery' ) );
			wp_localize_script( 'meta-box-image', 'meta_image',
				array(
					'title' => __( 'Choose or Upload an Image', 'careers_thingtitle' ),
					'button' => __( 'Use this image', 'careers_thingtitle' ),
				)
			);
			wp_enqueue_script( 'meta-box-image' );
	}
	add_action( 'admin_enqueue_scripts', 'prfx_image_enqueue' );


	function custom_meta_boxes() {
		add_meta_box( 'locations_info', __( 'Locations Info', 'locations-domain' ), 'locations_callback', 'location' );
		add_meta_box( 'providers_info', __( 'Providers Info', 'providers-domain' ), 'providers_callback', 'provider' );
	}
	include 'lib/meta/location.php';
	include 'lib/meta/provider.php';
	include 'lib/meta/save.php';
	add_action( 'add_meta_boxes', 'custom_meta_boxes' );

	//TINYMCE BUTTONS
	function optima_mce_buttons($buttons) {
		array_unshift($buttons, 'styleselect');
		return $buttons;
	}
	add_filter('mce_buttons_2', 'optima_mce_buttons');

	function optima_mce_before_init_insert_formats( $init_array ) {


		$style_formats = array(

			array(
				'title' => 'Hyperlink with Arrows',
				'block' => 'span',
				'classes' => 'arrows',
				'wrapper' => false,
			),
			array(
				'title' => '2 Column List',
				'block' => 'ul',
				'classes' => 'twocol',
				'wrapper' => true,
			),
			array(
				'title' => '3 Column List',
				'block' => 'ul',
				'classes' => 'threecol',
				'wrapper' => true,
			),
			array(
				'title' => '4 Column List',
				'block' => 'ul',
				'classes' => 'fourcol',
				'wrapper' => true,
			),
			array(
				'title' => 'Blue Outline Button',
				'block' => 'a',
				'classes' => 'btn',
				'wrapper' => true,
			),
			array(
				'title' => 'Blue Button',
				'block' => 'a',
				'classes' => 'blue btn',
				'wrapper' => true,
			),
			array(
				'title' => 'Orange Outline Button',
				'block' => 'a',
				'classes' => 'orangeoutline btn',
				'wrapper' => true,
			),
			array(
				'title' => 'Orange Button',
				'block' => 'a',
				'classes' => 'orange btn',
				'wrapper' => true,
			),
		);
		$init_array['style_formats'] = json_encode( $style_formats );

		return $init_array;

	}
	// Attach callback to 'tiny_mce_before_init'
	add_filter( 'tiny_mce_before_init', 'optima_mce_before_init_insert_formats' );
?>
