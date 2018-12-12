<?php

use ACFComposer\ACFComposer;

add_action('acf/init', function () {
    ACFComposer::registerFieldGroup([
        'name' => 'postComponents',
        'title' => 'Post Components',
        'style' => 'seamless',
        'fields' => [
            [
                'name' => 'postComponents',
                'label' => 'Post Components',
                'type' => 'flexible_content',
                'button_label' => 'Add Component',
                'layouts' => [
                    'Flynt/Components/BlockImage/Fields/Layout',
                    'Flynt/Components/BlockWysiwyg/Fields/Layout',
                ],
            ],
        ],
        'location' => [
            [
                [
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'post',
                ],
            ],
        ],
    ]);
});
