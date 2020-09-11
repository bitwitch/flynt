<?php

namespace Flynt\Components\HeroCta;

function getACFLayout() {
    return [
        'name'  => 'heroCta',
        'label' => 'Hero: CTA',
        'sub_fields' => [
            [
                'name' => 'heading',
                'label' => 'Heading',
                'type' => 'text'
            ],
            [
                'name' => 'body',
                'label' => 'Body',
                'type' => 'textarea'
            ],
            [
                'name' => 'formHeading',
                'label' => 'Form Heading',
                'type' => 'text'
            ],
            [
                'name' => 'contentHtml',
                'label' => 'Email Form',
                'type' => 'wysiwyg'
            ],
            [
                'label' => 'Background Image',
                'name' => 'image',
                'type' => 'image',
                'return_format' => 'array',
                'preview_size'  => 'thumbnail',
                'library'       => 'all'
            ]
        ]
    ];
}

