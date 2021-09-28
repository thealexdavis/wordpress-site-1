<?php

class FeaturedTextClass extends FLBuilderModule {

    public function __construct()
    {
        parent::__construct(array(
            'name'            => __( 'Featured Text', 'fl-builder' ),
            'description'     => __( 'Build a featured text block', 'fl-builder' ),
            'group'           => __( 'Optima Modules', 'fl-builder' ),
            'category'        => __( 'Content', 'fl-builder' ),
            'dir'             => CUSTOM_DIR . 'featured-text/',
            'url'             => CUSTOM_URL . 'featured-text/',
            'icon'            => 'button.png',
            'editor_export'   => true, // Defaults to true and can be omitted.
            'enabled'         => true, // Defaults to true and can be omitted.
            'partial_refresh' => false, // Defaults to false and can be omitted.
        ));
    }
}

FLBuilder::register_module( 'FeaturedTextClass', array(
     'slide-1'      => array(
        'title'         => __( 'Block 1', 'fl-builder' ),
        'sections'      => array(
            'my-section-1'  => array(
                'title'         => __( 'Box Contents', 'fl-builder' ),
                'fields'        => array(
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
					'subtitle_1' => array(
						'type'          => 'text',
						'label'         => __( 'Subtitle', 'fl-builder' ),
						'default'       => '',
						'maxlength'     => '',
						'size'          => '',
						'placeholder'   => __( '', 'fl-builder' ),
						'class'         => '',
						'description'   => __( 'Subtitle of the block, in blue', 'fl-builder' ),
						'help'          => __( '', 'fl-builder' )
					),
                    'thumbnail_1' => array(
					    'type'          => 'photo',
					    'label'         => __('Thumbnail Image', 'fl-builder'),
					    'show_remove'   => false,
					),
					'copy_1' => array(
					    'type'          => 'editor',
					    'label'         => __('Content', 'fl-builder'),
					    'media_buttons' => true,
					    'wpautop'       => true
					),
					'slide1_cta1_type' => array(
					    'type'          => 'select',
					    'label'         => __( 'Select CTA Type', 'fl-builder' ),
					    'default'       => '1',
					    'options'       => array(
					        '1'      => __( 'None', 'fl-builder' ),
					        '2'      => __( 'Button', 'fl-builder' ),
					        '3'      => __( 'Ghost Button', 'fl-builder' ),
					        '4'      => __( 'Link', 'fl-builder' ),
					    )
					),
					'slide1_cta1_text' => array(
					    'type'          => 'text',
					    'label'         => __( 'CTA Text', 'fl-builder' ),
					    'default'       => '',
					    'maxlength'     => '',
					    'size'          => '',
					    'placeholder'   => __( 'Learn More', 'fl-builder' ),
					    'class'         => '',
					    'description'   => __( 'Will default to "Learn More" if nothing is entered', 'fl-builder' ),
					    'help'          => __( '', 'fl-builder' )
					),
					'slide1_cta1' => array(
					    'type'          => 'link',
					    'label'         => __('CTA', 'fl-builder')
					)
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
					'subtitle_2' => array(
						'type'          => 'text',
						'label'         => __( 'Subtitle', 'fl-builder' ),
						'default'       => '',
						'maxlength'     => '',
						'size'          => '',
						'placeholder'   => __( '', 'fl-builder' ),
						'class'         => '',
						'description'   => __( 'Subtitle of the block, in blue', 'fl-builder' ),
						'help'          => __( '', 'fl-builder' )
					),
                    'thumbnail_2' => array(
					    'type'          => 'photo',
					    'label'         => __('Thumbnail Image', 'fl-builder'),
					    'show_remove'   => false,
					),
					'copy_2' => array(
					    'type'          => 'editor',
					    'label'         => __('Content', 'fl-builder'),
					    'media_buttons' => true,
					    'wpautop'       => true
					),
					'slide2_cta1_type' => array(
					    'type'          => 'select',
					    'label'         => __( 'Select CTA Type', 'fl-builder' ),
					    'default'       => '1',
					    'options'       => array(
					        '1'      => __( 'None', 'fl-builder' ),
					        '2'      => __( 'Button', 'fl-builder' ),
					        '3'      => __( 'Ghost Button', 'fl-builder' ),
					        '4'      => __( 'Link', 'fl-builder' ),
					    )
					),
					'slide2_cta1_text' => array(
					    'type'          => 'text',
					    'label'         => __( 'CTA Text', 'fl-builder' ),
					    'default'       => '',
					    'maxlength'     => '',
					    'size'          => '',
					    'placeholder'   => __( 'Learn More', 'fl-builder' ),
					    'class'         => '',
					    'description'   => __( 'Will default to "Learn More" if nothing is entered', 'fl-builder' ),
					    'help'          => __( '', 'fl-builder' )
					),
					'slide2_cta1' => array(
					    'type'          => 'link',
					    'label'         => __('CTA', 'fl-builder')
					)
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
					'subtitle_3' => array(
						'type'          => 'text',
						'label'         => __( 'Subtitle', 'fl-builder' ),
						'default'       => '',
						'maxlength'     => '',
						'size'          => '',
						'placeholder'   => __( '', 'fl-builder' ),
						'class'         => '',
						'description'   => __( 'Subtitle of the block, in blue', 'fl-builder' ),
						'help'          => __( '', 'fl-builder' )
					),
                    'thumbnail_3' => array(
					    'type'          => 'photo',
					    'label'         => __('Thumbnail Image', 'fl-builder'),
					    'show_remove'   => false,
					),
					'copy_3' => array(
					    'type'          => 'editor',
					    'label'         => __('Content', 'fl-builder'),
					    'media_buttons' => true,
					    'wpautop'       => true
					),
					'slide3_cta1_type' => array(
					    'type'          => 'select',
					    'label'         => __( 'Select CTA Type', 'fl-builder' ),
					    'default'       => '1',
					    'options'       => array(
					        '1'      => __( 'None', 'fl-builder' ),
					        '2'      => __( 'Button', 'fl-builder' ),
					        '3'      => __( 'Ghost Button', 'fl-builder' ),
					        '4'      => __( 'Link', 'fl-builder' ),
					    )
					),
					'slide3_cta1_text' => array(
					    'type'          => 'text',
					    'label'         => __( 'CTA Text', 'fl-builder' ),
					    'default'       => '',
					    'maxlength'     => '',
					    'size'          => '',
					    'placeholder'   => __( 'Learn More', 'fl-builder' ),
					    'class'         => '',
					    'description'   => __( 'Will default to "Learn More" if nothing is entered', 'fl-builder' ),
					    'help'          => __( '', 'fl-builder' )
					),
					'slide3_cta1' => array(
					    'type'          => 'link',
					    'label'         => __('CTA', 'fl-builder')
					)
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
					'subtitle_4' => array(
						'type'          => 'text',
						'label'         => __( 'Subtitle', 'fl-builder' ),
						'default'       => '',
						'maxlength'     => '',
						'size'          => '',
						'placeholder'   => __( '', 'fl-builder' ),
						'class'         => '',
						'description'   => __( 'Subtitle of the block, in blue', 'fl-builder' ),
						'help'          => __( '', 'fl-builder' )
					),
                    'thumbnail_4' => array(
					    'type'          => 'photo',
					    'label'         => __('Thumbnail Image', 'fl-builder'),
					    'show_remove'   => false,
					),
					'copy_4' => array(
					    'type'          => 'editor',
					    'label'         => __('Content', 'fl-builder'),
					    'media_buttons' => true,
					    'wpautop'       => true
					),
					'slide4_cta1_type' => array(
					    'type'          => 'select',
					    'label'         => __( 'Select CTA Type', 'fl-builder' ),
					    'default'       => '1',
					    'options'       => array(
					        '1'      => __( 'None', 'fl-builder' ),
					        '2'      => __( 'Button', 'fl-builder' ),
					        '3'      => __( 'Ghost Button', 'fl-builder' ),
					        '4'      => __( 'Link', 'fl-builder' ),
					    )
					),
					'slide4_cta1_text' => array(
					    'type'          => 'text',
					    'label'         => __( 'CTA Text', 'fl-builder' ),
					    'default'       => '',
					    'maxlength'     => '',
					    'size'          => '',
					    'placeholder'   => __( 'Learn More', 'fl-builder' ),
					    'class'         => '',
					    'description'   => __( 'Will default to "Learn More" if nothing is entered', 'fl-builder' ),
					    'help'          => __( '', 'fl-builder' )
					),
					'slide4_cta1' => array(
					    'type'          => 'link',
					    'label'         => __('CTA', 'fl-builder')
					)
                )
            )
        )
    ),
     'slide-5'      => array(
        'title'         => __( 'Block 5', 'fl-builder' ),
        'sections'      => array(
            'my-section-5'  => array(
                'title'         => __( 'Box Contents', 'fl-builder' ),
                'fields'        => array(
					'title_5' => array(
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
					'subtitle_5' => array(
						'type'          => 'text',
						'label'         => __( 'Subtitle', 'fl-builder' ),
						'default'       => '',
						'maxlength'     => '',
						'size'          => '',
						'placeholder'   => __( '', 'fl-builder' ),
						'class'         => '',
						'description'   => __( 'Subtitle of the block, in blue', 'fl-builder' ),
						'help'          => __( '', 'fl-builder' )
					),
                    'thumbnail_5' => array(
					    'type'          => 'photo',
					    'label'         => __('Thumbnail Image', 'fl-builder'),
					    'show_remove'   => false,
					),
					'copy_5' => array(
					    'type'          => 'editor',
					    'label'         => __('Content', 'fl-builder'),
					    'media_buttons' => true,
					    'wpautop'       => true
					),
					'slide5_cta1_type' => array(
					    'type'          => 'select',
					    'label'         => __( 'Select CTA Type', 'fl-builder' ),
					    'default'       => '1',
					    'options'       => array(
					        '1'      => __( 'None', 'fl-builder' ),
					        '2'      => __( 'Button', 'fl-builder' ),
					        '3'      => __( 'Ghost Button', 'fl-builder' ),
					        '4'      => __( 'Link', 'fl-builder' ),
					    )
					),
					'slide5_cta1_text' => array(
					    'type'          => 'text',
					    'label'         => __( 'CTA Text', 'fl-builder' ),
					    'default'       => '',
					    'maxlength'     => '',
					    'size'          => '',
					    'placeholder'   => __( 'Learn More', 'fl-builder' ),
					    'class'         => '',
					    'description'   => __( 'Will default to "Learn More" if nothing is entered', 'fl-builder' ),
					    'help'          => __( '', 'fl-builder' )
					),
					'slide5_cta1' => array(
					    'type'          => 'link',
					    'label'         => __('CTA', 'fl-builder')
					)
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
					        '1'      => __( 'Horizontal Large Text with Icons', 'fl-builder' ),
							'2'      => __( '2x2 Grid with Titles', 'fl-builder' ),
							'3'      => __( 'Horizontal Normal With Thumbnails', 'fl-builder' ),
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