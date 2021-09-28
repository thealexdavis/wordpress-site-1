<?php

class HeroClass extends FLBuilderModule {

    public function __construct()
    {
        parent::__construct(array(
            'name'            => __( 'Hero Module', 'fl-builder' ),
            'description'     => __( 'Build a hero', 'fl-builder' ),
            'group'           => __( 'Optima Modules', 'fl-builder' ),
            'category'        => __( 'Header', 'fl-builder' ),
            'dir'             => CUSTOM_DIR . 'hero/',
            'url'             => CUSTOM_URL . 'hero/',
            'icon'            => 'button.png',
            'editor_export'   => true, // Defaults to true and can be omitted.
            'enabled'         => true, // Defaults to true and can be omitted.
            'partial_refresh' => false, // Defaults to false and can be omitted.
        ));
    }
}

FLBuilder::register_module( 'HeroClass', array(
    'my-tab-1'      => array(
        'title'         => __( 'Hero Content', 'fl-builder' ),
        'sections'      => array(
            'my-section-1'  => array(
                'title'         => __( 'Section 1', 'fl-builder' ),
                'fields'        => array(
                    'hero_bg' => array(
					    'type'          => 'photo',
					    'label'         => __('Hero Background', 'fl-builder'),
					    'show_remove'   => false,
					),
					'mobile_hero_bg' => array(
					    'type'          => 'photo',
					    'label'         => __('Mobile Hero Background (Optional)', 'fl-builder'),
					    'show_remove'   => false,
					),
					'background_color' => array(
					    'type'          => 'color',
					    'label'         => __( 'Background Color', 'fl-builder' ),
					    'default'       => '369cc6',
					    'show_reset'    => true,
					    'show_alpha'    => true
					),
                    'title' => array(
						'type'          => 'text',
						'label'         => __( 'Title', 'fl-builder' ),
						'default'       => '',
						'maxlength'     => '400',
						'size'          => '40',
						'placeholder'   => __( 'Title', 'fl-builder' ),
						'class'         => '',
						'description'   => __( '', 'fl-builder' ),
						'help'          => __( '', 'fl-builder' )
					),
					'subtitle' => array(
						'type'          => 'text',
						'label'         => __( 'Subtitle', 'fl-builder' ),
						'default'       => '',
						'maxlength'     => '400',
						'size'          => '40',
						'placeholder'   => __( 'Subtitle', 'fl-builder' ),
						'class'         => '',
						'description'   => __( '', 'fl-builder' ),
						'help'          => __( '', 'fl-builder' )
					),
					'text_color' => array(
					    'type'          => 'select',
					    'label'         => __( 'Dark or Light Text', 'fl-builder' ),
					    'default'       => '1',
					    'options'       => array(
					        '1'      => __( 'Dark', 'fl-builder' ),
					        '2'      => __( 'Light', 'fl-builder' ),
					    )
					),
					'ctabox_link' => array(
					    'type'          => 'link',
					    'label'         => __('CTA Callout Link', 'fl-builder')
					),
					'ctabox_text' => array(
					    'type'          => 'text',
					    'label'         => __( 'CTA Callout Link Text', 'fl-builder' ),
					    'default'       => '',
					    'maxlength'     => '400',
					    'size'          => '40',
					    'placeholder'   => __( 'CTA Text', 'fl-builder' ),
					    'class'         => 'cta',
					    'description'   => __( 'If left blank, will default to Learn More', 'fl-builder' ),
					    'help'          => __( 'This is what the clickable link text will display', 'fl-builder' )
					),
                )
            )
        )
    )
) );