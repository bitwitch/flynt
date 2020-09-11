<?php

namespace Flynt\Components\LayoutSinglePage;

function getACFLayout() {
    return [
        'name'  => 'layoutSinglePage',
        'label' => 'Layout: Single Page',
        'sub_fields' => [
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
                'instructions' => 'Enter whatever content you like.'
            ]
        ]
    ];
}
