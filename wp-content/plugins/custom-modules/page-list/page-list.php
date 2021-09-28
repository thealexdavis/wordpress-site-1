<?php

class PageListClass extends FLBuilderModule {

    public function __construct()
    {
        parent::__construct(array(
            'name'            => __( 'Page List', 'fl-builder' ),
            'description'     => __( 'Build a page list block', 'fl-builder' ),
            'group'           => __( 'Optima Modules', 'fl-builder' ),
            'category'        => __( 'Content', 'fl-builder' ),
            'dir'             => CUSTOM_DIR . 'page-list/',
            'url'             => CUSTOM_URL . 'page-list/',
            'icon'            => 'button.png',
            'editor_export'   => true, // Defaults to true and can be omitted.
            'enabled'         => true, // Defaults to true and can be omitted.
            'partial_refresh' => false, // Defaults to false and can be omitted.
        ));
    }
}

FLBuilder::register_module( 'PageListClass', array(
     'slide-1'      => array(
        'title'         => __( 'Block 1', 'fl-builder' ),
        'sections'      => array(
            'my-section-1'  => array(
                'title'         => __( 'Box Contents', 'fl-builder' ),
                'fields'        => array(
					'slide1_cta1' => array(
						'type'          => 'link',
						'label'         => __('CTA', 'fl-builder')
					)
					'title_1' => array(
					    'type'          => 'text',
					    'label'         => __( 'Title', 'fl-builder' ),
					    'default'       => '',
					    'maxlength'     => '',
					    'size'          => '',
					    'placeholder'   => __( '', 'fl-builder' ),
					    'class'         => '',
					    'description'   => __( 'Title of the block, in blue', 'fl-builder' ),
					    'help'          => __( '', 'fl-builder' )
					),
                    'thumbnail_1' => array(
					    'type'          => 'photo',
					    'label'         => __('Image', 'fl-builder'),
					    'show_remove'   => false,
					),
					'copy_1' => array(
					    'type'          => 'editor',
					    'label'         => __('Content', 'fl-builder'),
					    'media_buttons' => true,
					    'wpautop'       => true
					),
                )
            )
        )
    ),
    'slide-2'      => array(
        'title'         => __( 'Block 2', 'fl-builder' ),
        'sections'      => array(
            'my-section-2'  => array(
                'title'         => __( 'Box Contents', 'fl-builder' ),
                'fields'        => array(
					'slide2_cta1' => array(
						'type'          => 'link',
						'label'         => __('CTA', 'fl-builder')
					)
					'title_2' => array(
						'type'          => 'text',
						'label'         => __( 'Title', 'fl-builder' ),
						'default'       => '',
						'maxlength'     => '',
						'size'          => '',
						'placeholder'   => __( '', 'fl-builder' ),
						'class'         => '',
						'description'   => __( 'Title of the block, in blue', 'fl-builder' ),
						'help'          => __( '', 'fl-builder' )
					),
					'thumbnail_2' => array(
						'type'          => 'photo',
						'label'         => __('Image', 'fl-builder'),
						'show_remove'   => false,
					),
					'copy_2' => array(
						'type'          => 'editor',
						'label'         => __('Content', 'fl-builder'),
						'media_buttons' => true,
						'wpautop'       => true
					),
                )
            )
        )
    ),
    'slide-3'      => array(
        'title'         => __( 'Block 3', 'fl-builder' ),
        'sections'      => array(
            'my-section-3'  => array(
                'title'         => __( 'Box Contents', 'fl-builder' ),
                'fields'        => array(
					'slide3_cta1' => array(
						'type'          => 'link',
						'label'         => __('CTA', 'fl-builder')
					)
					'title_3' => array(
						'type'          => 'text',
						'label'         => __( 'Title', 'fl-builder' ),
						'default'       => '',
						'maxlength'     => '',
						'size'          => '',
						'placeholder'   => __( '', 'fl-builder' ),
						'class'         => '',
						'description'   => __( 'Title of the block, in blue', 'fl-builder' ),
						'help'          => __( '', 'fl-builder' )
					),
					'thumbnail_3' => array(
						'type'          => 'photo',
						'label'         => __('Image', 'fl-builder'),
						'show_remove'   => false,
					),
					'copy_3' => array(
						'type'          => 'editor',
						'label'         => __('Content', 'fl-builder'),
						'media_buttons' => true,
						'wpautop'       => true
					),
                )
            )
        )
    ),
     'slide-4'      => array(
        'title'         => __( 'Block 4', 'fl-builder' ),
        'sections'      => array(
            'my-section-4'  => array(
                'title'         => __( 'Box Contents', 'fl-builder' ),
                'fields'        => array(
					'slide4_cta1' => array(
						'type'          => 'link',
						'label'         => __('CTA', 'fl-builder')
					)
					'title_4' => array(
						'type'          => 'text',
						'label'         => __( 'Title', 'fl-builder' ),
						'default'       => '',
						'maxlength'     => '',
						'size'          => '',
						'placeholder'   => __( '', 'fl-builder' ),
						'class'         => '',
						'description'   => __( 'Title of the block, in blue', 'fl-builder' ),
						'help'          => __( '', 'fl-builder' )
					),
					'thumbnail_4' => array(
						'type'          => 'photo',
						'label'         => __('Image', 'fl-builder'),
						'show_remove'   => false,
					),
					'copy_4' => array(
						'type'          => 'editor',
						'label'         => __('Content', 'fl-builder'),
						'media_buttons' => true,
						'wpautop'       => true
					),
                )
            )
        )
    ),
    'slide-general'      => array(
        'title'         => __( 'General Settings', 'fl-builder' ),
        'sections'      => array(
            'my-section-6'  => array(
                'title'         => __( 'General Settings', 'fl-builder' ),
                'fields'        => array(
	                'hero_size' => array(
					    'type'          => 'select',
					    'label'         => __( 'Featured Text Style', 'fl-builder' ),
					    'default'       => '1',
					    'options'       => array(
					        '1'      => __( 'Horizontal', 'fl-builder' ),
					    )
					),
					'undercopy' => array(
						'type'          => 'editor',
						'label'         => __('Copy for Under Boxes', 'fl-builder'),
						'media_buttons' => true,
						'wpautop'       => true
					),
                )
            )
        )
    ),
) );