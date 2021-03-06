<?php

  if( function_exists('acf_add_local_field_group') ):

    acf_add_local_field_group(array (
        'key' => 'group_5874d6d74fa6d',
        'title' => 'Page Modules',
        'fields' => array (
            array (
                'key' => 'field_5874d6f15c2a2',
                'label' => 'Modules',
                'name' => 'modules',
                'type' => 'repeater',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array (
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'collapsed' => '',
                'min' => '',
                'max' => '',
                'layout' => 'table',
                'button_label' => 'Add Section',
                'sub_fields' => array (
                    array (
                        'key' => 'field_5874d7105c2a3',
                        'label' => 'Layout',
                        'name' => 'layout',
                        'type' => 'select',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array (
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'choices' => array (
                            'Title' => 'Title',
                            '3-Column' => '3-Column',
                            'Arbitrary Content' => 'Arbitrary Content',
                            'Brand Grid' => 'Brand Grid',
                            'Impact Quote' => 'Impact Quote',
                            'Image Left' => 'Image Left',
                            'Image Right' => 'Image Right',
                            'Definition Graphic' => 'Definition Graphic',
                            'Bio' => 'Bio',
                        ),
                        'default_value' => array (
                        ),
                        'allow_null' => 0,
                        'multiple' => 0,
                        'ui' => 0,
                        'ajax' => 0,
                        'return_format' => 'value',
                        'placeholder' => '',
                    ),
                    array (
                        'key' => 'field_5874d9a15c2a6',
                        'label' => 'Title',
                        'name' => 'title',
                        'type' => 'text',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => array (
                            array (
                                array (
                                    'field' => 'field_5874d7105c2a3',
                                    'operator' => '==',
                                    'value' => 'Title',
                                ),
                            ),
                        ),
                        'wrapper' => array (
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'default_value' => '',
                        'placeholder' => '',
                        'prepend' => '',
                        'append' => '',
                        'maxlength' => 50,
                    ),
                    array (
                        'key' => 'field_5874da5f5c2a7',
                        'label' => 'Content',
                        'name' => 'content',
                        'type' => 'wysiwyg',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => array (
                            array (
                                array (
                                    'field' => 'field_5874d7105c2a3',
                                    'operator' => '==',
                                    'value' => 'Arbitrary Content',
                                ),
                                array (
                                    'field' => 'field_5874d7105c2a3',
                                    'operator' => '==',
                                    'value' => 'Image Left',
                                ),
                                array (
                                    'field' => 'field_5874d7105c2a3',
                                    'operator' => '==',
                                    'value' => 'Image Right',
                                ),
                                array (
                                    'field' => 'field_5874d7105c2a3',
                                    'operator' => '==',
                                    'value' => 'Bio',
                                ),
                            ),
                        ),
                        'wrapper' => array (
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'default_value' => '',
                        'tabs' => 'all',
                        'toolbar' => 'full',
                        'media_upload' => 1,
                    ),
                    array (
                        'key' => 'field_5874dbc95c2ab',
                        'label' => 'Left Block',
                        'name' => 'left_block',
                        'type' => 'wysiwyg',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => array (
                            array (
                                array (
                                    'field' => 'field_5874d7105c2a3',
                                    'operator' => '==',
                                    'value' => '3-Column',
                                ),
                            ),
                        ),
                        'wrapper' => array (
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'default_value' => '',
                        'tabs' => 'all',
                        'toolbar' => 'full',
                        'media_upload' => 1,
                    ),
                    array (
                        'key' => 'field_5874dca95c2ac',
                        'label' => 'Center Block',
                        'name' => 'center_block',
                        'type' => 'wysiwyg',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => array (
                            array (
                                array (
                                    'field' => 'field_5874d7105c2a3',
                                    'operator' => '==',
                                    'value' => '3-Column',
                                ),
                            ),
                        ),
                        'wrapper' => array (
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'default_value' => '',
                        'tabs' => 'all',
                        'toolbar' => 'full',
                        'media_upload' => 1,
                    ),
                    array (
                        'key' => 'field_5874dccd5c2ad',
                        'label' => 'Right Block',
                        'name' => 'right_block',
                        'type' => 'wysiwyg',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => array (
                            array (
                                array (
                                    'field' => 'field_5874d7105c2a3',
                                    'operator' => '==',
                                    'value' => '3-Column',
                                ),
                            ),
                        ),
                        'wrapper' => array (
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'default_value' => '',
                        'tabs' => 'all',
                        'toolbar' => 'full',
                        'media_upload' => 1,
                    ),
                    array (
                        'key' => 'field_5874dcea5c2ae',
                        'label' => 'Headline',
                        'name' => 'headline',
                        'type' => 'text',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => array (
                            array (
                                array (
                                    'field' => 'field_5874d7105c2a3',
                                    'operator' => '==',
                                    'value' => 'Bio',
                                ),
                                array (
                                    'field' => 'field_5874d7105c2a3',
                                    'operator' => '==',
                                    'value' => 'Brand Grid',
                                ),
                            ),
                        ),
                        'wrapper' => array (
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'default_value' => '',
                        'placeholder' => '',
                        'prepend' => '',
                        'append' => '',
                        'maxlength' => '',
                    ),
                    array (
                        'key' => 'field_5874dd3e5c2b0',
                        'label' => 'Background Image',
                        'name' => 'background_image',
                        'type' => 'image',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => array (
                            array (
                                array (
                                    'field' => 'field_5874d7105c2a3',
                                    'operator' => '==',
                                    'value' => 'Arbitrary Content',
                                ),
                                array (
                                    'field' => 'field_5874d7105c2a3',
                                    'operator' => '==',
                                    'value' => 'Impact Quote',
                                ),
                                array (
                                    'field' => 'field_5874d7105c2a3',
                                    'operator' => '==',
                                    'value' => 'Definition Graphic',
                                ),
                            ),
                        ),
                        'wrapper' => array (
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'return_format' => 'url',
                        'preview_size' => 'thumbnail',
                        'library' => 'all',
                        'min_width' => '',
                        'min_height' => '',
                        'min_size' => '',
                        'max_width' => '',
                        'max_height' => '',
                        'max_size' => '',
                        'mime_types' => '',
                    ),
                    array (
                        'key' => 'field_5874de105c2b3',
                        'label' => 'Brand Logos',
                        'name' => 'brand_logos',
                        'type' => 'repeater',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => array (
                            array (
                                array (
                                    'field' => 'field_5874d7105c2a3',
                                    'operator' => '==',
                                    'value' => 'Brand Grid',
                                ),
                            ),
                        ),
                        'wrapper' => array (
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'collapsed' => '',
                        'min' => '',
                        'max' => '',
                        'layout' => 'row',
                        'button_label' => 'Add Logo',
                        'sub_fields' => array (
                            array (
                                'key' => 'field_5874de245c2b4',
                                'label' => 'Logo',
                                'name' => 'logo',
                                'type' => 'image',
                                'instructions' => '',
                                'required' => 0,
                                'conditional_logic' => array (
                                    array (
                                        array (
                                            'field' => 'field_5874d7105c2a3',
                                            'operator' => '==',
                                            'value' => 'Title',
                                        ),
                                    ),
                                ),
                                'wrapper' => array (
                                    'width' => '',
                                    'class' => '',
                                    'id' => '',
                                ),
                                'return_format' => 'id',
                                'preview_size' => 'thumbnail',
                                'library' => 'all',
                                'min_width' => '',
                                'min_height' => '',
                                'min_size' => '',
                                'max_width' => '',
                                'max_height' => '',
                                'max_size' => '',
                                'mime_types' => '',
                            ),
                        ),
                    ),
                    array (
                        'key' => 'field_5874dede5c2b7',
                        'label' => 'Impact Quote',
                        'name' => 'impact_quote',
                        'type' => 'repeater',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => array (
                            array (
                                array (
                                    'field' => 'field_5874d7105c2a3',
                                    'operator' => '==',
                                    'value' => 'Impact Quote',
                                ),
                            ),
                        ),
                        'wrapper' => array (
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'collapsed' => '',
                        'min' => '',
                        'max' => '',
                        'layout' => 'table',
                        'button_label' => 'Add Quote',
                        'sub_fields' => array (
                            array (
                                'key' => 'field_5874def05c2b8',
                                'label' => 'Category',
                                'name' => 'category',
                                'type' => 'text',
                                'instructions' => '',
                                'required' => 0,
                                'conditional_logic' => 0,
                                'wrapper' => array (
                                    'width' => '',
                                    'class' => '',
                                    'id' => '',
                                ),
                                'default_value' => '',
                                'placeholder' => '',
                                'prepend' => '',
                                'append' => '',
                                'maxlength' => '',
                            ),
                            array (
                                'key' => 'field_5874df045c2b9',
                                'label' => 'Quote',
                                'name' => 'quote',
                                'type' => 'textarea',
                                'instructions' => '',
                                'required' => 0,
                                'conditional_logic' => 0,
                                'wrapper' => array (
                                    'width' => '',
                                    'class' => '',
                                    'id' => '',
                                ),
                                'default_value' => '',
                                'placeholder' => '',
                                'maxlength' => '',
                                'rows' => '',
                                'new_lines' => 'wpautop',
                            ),
                            array (
                                'key' => 'field_5874df1f5c2ba',
                                'label' => 'Person',
                                'name' => 'person',
                                'type' => 'text',
                                'instructions' => '',
                                'required' => 0,
                                'conditional_logic' => 0,
                                'wrapper' => array (
                                    'width' => '',
                                    'class' => '',
                                    'id' => '',
                                ),
                                'default_value' => '',
                                'placeholder' => '',
                                'prepend' => '',
                                'append' => '',
                                'maxlength' => '',
                            ),
                        ),
                    ),
                    array (
                        'key' => 'field_5874df755c2bb',
                        'label' => 'Image Half',
                        'name' => 'image_half',
                        'type' => 'image',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => array (
                            array (
                                array (
                                    'field' => 'field_5874d7105c2a3',
                                    'operator' => '==',
                                    'value' => 'Image Left',
                                ),
                                array (
                                    'field' => 'field_5874d7105c2a3',
                                    'operator' => '==',
                                    'value' => 'Image Right',
                                ),
                                array (
                                    'field' => 'field_5874d7105c2a3',
                                    'operator' => '==',
                                    'value' => 'Bio',
                                ),
                            ),
                        ),
                        'wrapper' => array (
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'return_format' => 'url',
                        'preview_size' => 'thumbnail',
                        'library' => 'all',
                        'min_width' => '',
                        'min_height' => '',
                        'min_size' => '',
                        'max_width' => '',
                        'max_height' => '',
                        'max_size' => '',
                        'mime_types' => '',
                    ),
                ),
            ),
        ),
        'location' => array (
            array (
                array (
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'default',
                ),
            ),
            array (
                array (
                    'param' => 'page_type',
                    'operator' => '==',
                    'value' => 'front_page',
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => '',
        'active' => 1,
        'description' => '',
    ));

  endif;