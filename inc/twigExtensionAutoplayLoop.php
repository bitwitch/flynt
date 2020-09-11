<?php

namespace Pixel;

use Twig_Extension;
use Twig_SimpleFunction;

class TwigExtensionAutoplayLoop extends Twig_Extension {

    public function getName() {
        return 'twig_extension_autoplay_loop';
    }

    public function getFunctions() {
        return array(
            new Twig_SimpleFunction('autoplayLoop', [$this, 'autoplayLoop']),
        );
    }

    public function autoplayLoop($iframe) {
        // Use preg_match to find iframe src.
        preg_match('/src="(.+?)"/', $iframe, $matches);
        $src = $matches[1];

        // Add extra parameters to src and replace HTML.
        $params = array(
            'autoplay'       => 1,
            'mute'           => 1,
            'controls'       => 0,
            'loop'           => 1,
            //'enablejsapi'    => 1,
            'playsinline'    => 1,
            'modestbranding' => 1,
        );

        $new_src = add_query_arg($params, $src);
        $iframe = str_replace($src, $new_src, $iframe);

        // Add extra attributes to iframe HTML.
        $attributes = 'frameborder="0"';
        $iframe = str_replace('></iframe>', ' ' . $attributes . '></iframe>', $iframe);

        return $iframe;
	}
}
