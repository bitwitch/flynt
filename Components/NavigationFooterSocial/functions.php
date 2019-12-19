<?php

namespace Flynt\Components\NavigationFooterSocial;

use Flynt\Components;
use ACFComposer\ACFComposer;
use Timber\Menu;

function getACFLayout() {
    return [
        'name'  => 'navigationFooterSocial',
        'label' => 'Navigation: Footer Social',
        'sub_fields' => getFields()
    ];
}

function getFields() {
    return [
        [
            'label' => 'Heading',
            'name' => 'heading',
            'type' => 'text'
        ],
        [
            'label' => 'Subheading',
            'name' => 'subheading',
            'type' => 'textarea'
        ],
        [
            'label' => 'Legal Disclaimer',
            'name' => 'disclaimer',
            'type' => 'textarea'
        ],
        [
            'label' => 'Copyright',
            'name' => 'copyright',
            'type' => 'text'
        ],
        [
            'label' => 'Legal Links',
            'name' => 'legal_links',
            'type' => 'repeater',
            'sub_fields' => [
                [
                    'label' => 'Link URL',
                    'name' => 'url',
                    'type' => 'text'
                ],
                [
                    'label' => 'Link Label',
                    'name' => 'label',
                    'type' => 'text'
                ]
            ]
        ]
    ];
}

function getFieldsFooterIcons() {
    return [
        [
            'label' => 'Icon',
            'name' => 'icon',
            'type' => 'image',
            'return_format' => 'array',
            'preview_size'  => 'thumbnail',
            'library'       => 'all',
            'instructions'  => 'Recommended aspect ratio: 1 (e.g. 100x100)'
        ]
    ];
}

// add the acf field icon to each menu items data array
add_filter('wp_nav_menu_objects', function ($items, $args) {
	foreach($items as &$item) {
		$icon = get_field('icon', $item);
		if($icon) {
			$item->social_icon = $icon;
		}
	}
	return $items;
}, 10, 2);

add_action('Flynt/afterRegisterComponents', function () {
    // Nav menu fields
    ACFComposer::registerFieldGroup([
        'name' => 'navigationFooterSocial',
        'title' => 'Navigation: Footer Social',
        'style' => 'seamless',
        'fields' => Components\NavigationFooterSocial\getFields(),
        'location' => [
            [
                [
                    'param' => 'nav_menu',
                    'operator' => '==',
                    'value' => 'location/navigation_footer'
                ]
            ]
        ]
    ]);

    // Nav menu ITEM fields (logo for each link)
    ACFComposer::registerFieldGroup([
        'name' => 'footerIcons',
        'title' => 'Footer Icons',
        'style' => 'seamless',
        'fields' => Components\NavigationFooterSocial\getFieldsFooterIcons(),
        'location' => [
            [
                [
                    'param' => 'nav_menu_item',
                    'operator' => '==',
                    'value' => 'location/navigation_footer'
                ]
            ]
        ]
    ]);

});

add_action('init', function () {
    register_nav_menus([
        'navigation_footer' => __('Navigation Footer', 'flynt')
    ]);
});

add_filter('Flynt/addComponentData?name=NavigationFooterSocial', function ($data) {
    $menu = new Menu('navigation_footer');
    $wp_menu = wp_get_nav_menu_object($menu->id);

    $data['maxLevel'] = 0;
    $data['menu'] = $menu;

    $data['heading']     = get_field('heading', $wp_menu);
    $data['subheading']  = get_field('subheading', $wp_menu);
    $data['disclaimer']  = get_field('disclaimer', $wp_menu);
    $data['copyright']   = get_field('copyright', $wp_menu);
    $data['legal_links'] = get_field('legal_links', $wp_menu);

    return $data;
});

