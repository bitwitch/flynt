<?php

namespace Flynt\Components\NavigationHeaderSinglePage;

use Flynt\Components;
use ACFComposer\ACFComposer;
use Timber\Menu; 

function getFields() { 
    return [
        [
            'label' => 'Back to home text',
            'name' => 'back_text',
            'type' => 'text'
        ],
        [
            'label' => 'Logo',
            'name' => 'logo',
            'type' => 'image',
            'return_format' => 'array',
            'preview_size'  => 'medium',
            'library'       => 'all',
            'instructions'  => 'Recommended aspect ratio: 1 (e.g. 600x600)'
        ]
    ];
}

add_action('Flynt/afterRegisterComponents', function () {
    // Nav menu fields
    ACFComposer::registerFieldGroup([
        'name' => 'navigationHeaderSinglePage',
        'title' => 'Navigation: Header Single Page',
        'style' => 'seamless',
        'fields' => Components\NavigationHeaderSinglePage\getFields(),
        'location' => [
            [
                [
                    'param' => 'nav_menu',
                    'operator' => '==',
                    'value' => 'location/navigation_single_page'
                ]
            ]
        ]
    ]);
});

add_action('init', function () {
    register_nav_menus([
        'navigation_single_page' => __('Navigation Single Page', 'flynt')
    ]);
});

add_filter('Flynt/addComponentData?name=NavigationHeaderSinglePage', function ($data) {
    $menu = new Menu('navigation_single_page');
    $wp_menu = wp_get_nav_menu_object($menu->id);

    $data['maxLevel'] = 0;
    $data['menu'] = $menu; 

    $data['back_text'] = get_field('back_text', $wp_menu); 
    $data['logo'] = get_field('logo', $wp_menu); 

    return $data;
});


