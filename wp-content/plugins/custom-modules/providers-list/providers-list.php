<?php

function providerList(){
    $argsProviders = array(
        'post_parent' => 0,
        'post_type'   => 'provider', 
        'numberposts' => -1,
        'post_status' => 'publish' 
    );
    $stackaltget = get_posts( $argsProviders );
    $stackaltsarray = array();
    foreach($stackaltget as $stackaltpage){
        $newstackalt = array($stackaltpage->ID => get_the_title($stackaltpage->ID));
        $stackaltsarray = $stackaltsarray + $newstackalt;
    }
    return $stackaltsarray;
}

class ProviderListClass extends FLBuilderModule {

    public function __construct()
    {
        parent::__construct(array(
            'name'            => __( 'Provider List', 'fl-builder' ),
            'description'     => __( 'Build a provider list block', 'fl-builder' ),
            'group'           => __( 'Optima Modules', 'fl-builder' ),
            'category'        => __( 'Content', 'fl-builder' ),
            'dir'             => CUSTOM_DIR . 'providers-list/',
            'url'             => CUSTOM_URL . 'providers-list/',
            'icon'            => 'button.png',
            'editor_export'   => true, // Defaults to true and can be omitted.
            'enabled'         => true, // Defaults to true and can be omitted.
            'partial_refresh' => false, // Defaults to false and can be omitted.
        ));
    }
}

FLBuilder::register_module( 'ProviderListClass', array(
    'my-tab-1'      => array(
        'title'         => __( 'Provider Block', 'fl-builder' ),
        'sections'      => array(
            'my-section-1'  => array(
                'title'         => __( 'Providers', 'fl-builder' ),
                'fields'        => array(
                    'provideroptions' => array(
                        'type'          => 'select',
                        'label'         => __( 'Select a provider to include. Hold the Control key on Windows and Command key on Mac to select multiple options.', 'fl-builder' ),
                        'options'       => providerList(),
                        'multi-select'  => true
                    ),
                )
            )
        )
    )
) );