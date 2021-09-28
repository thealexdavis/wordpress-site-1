<?php

function locationList(){
	$args = array(
		'post_parent' => 0,
		'post_type'   => 'location', 
		'numberposts' => -1,
		'post_status' => 'publish' 
	);
	$stackget = get_posts( $args );
	$stacksarray = array(0 => '-- SELECT LOCATION --');
	foreach($stackget as $stackpage){
		$newstack = array($stackpage->ID => get_the_title($stackpage->ID));
		$stacksarray = $stacksarray + $newstack;
// 		$stacksarray = array_merge_recursive($stacksarray, array($stackpage->ID => get_the_title($stackpage->ID)));
	}
	return $stacksarray;
}

class LocationClass extends FLBuilderModule {

    public function __construct()
    {
        parent::__construct(array(
            'name'            => __( 'Location', 'fl-builder' ),
            'description'     => __( 'Build a location block', 'fl-builder' ),
            'group'           => __( 'Optima Modules', 'fl-builder' ),
            'category'        => __( 'Content', 'fl-builder' ),
            'dir'             => CUSTOM_DIR . 'location/',
            'url'             => CUSTOM_URL . 'location/',
            'icon'            => 'button.png',
            'editor_export'   => true, // Defaults to true and can be omitted.
            'enabled'         => true, // Defaults to true and can be omitted.
            'partial_refresh' => false, // Defaults to false and can be omitted.
        ));
    }
}

FLBuilder::register_module( 'LocationClass', array(
    'my-tab-1'      => array(
        'title'         => __( 'Location Block', 'fl-builder' ),
        'sections'      => array(
            'my-section-1'  => array(
                'title'         => __( 'Location', 'fl-builder' ),
                'fields'        => array(
                    'location' => array(
						'type'          => 'select',
						'label'         => __( 'Select a location to reference', 'fl-builder' ),
						'options'       => locationList()
					),
                )
            )
        )
    )
) );