<?php

namespace Flynt\Components\GridHighlights;

function getACFLayout() {
    return [
        'name'  => 'gridHighlights',
        'label' => 'Grid: Highlights',
        'sub_fields' => [
            [
                'label' => 'Highlights',
                'name'  => 'highlights',
                'type'  => 'repeater',
                'sub_fields' => [
                    [
                        'label' => 'Image',
                        'name'  => 'image',
                        'type'  => 'image',
                        'return_format' => 'array',
                        'preview_size' => 'medium',
                        'library' => 'all',
                        'instructions' => 'Recommended aspect ratio: 1.5 (e.g. 1200x800)'
                    ],
                    [
                        'label' => 'Tagline',
                        'name'  => 'tagline',
                        'type'  => 'text'
                    ],
                    [
                        'label' => 'Title',
                        'name'  => 'title',
                        'type'  => 'text'
                    ],
                    [
                        'label' => 'Body',
                        'name'  => 'body',
                        'type'  => 'wysiwyg',
                        'tabs' => 'visual,text',
                        'toolbar' => 'full',
                        'media_upload' => 1,
                        'delay' => 1,
                        'wrapper' => [
                            'class' => 'autosize'
                        ]
                    ]
                ]
            ]
        ]
    ];
}
