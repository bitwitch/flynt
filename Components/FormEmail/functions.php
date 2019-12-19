<?php

namespace Flynt\Components\FormEmail;

function getACFLayout() {
    return [
        'name'  => 'formEmail',
        'label' => 'Form: Email',
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
                'name' => 'contentHtml',
                'label' => 'Content',
                'type' => 'wysiwyg',
                'tabs' => 'visual,text',
                'toolbar' => 'full',
                'media_upload' => 1,
                'delay' => 1,
                'wrapper' => [
                    'class' => 'autosize'
                ],
                'instructions' => 'Enter your call to action, add a form, whatever you like.'
            ]
        ]
    ];
}
