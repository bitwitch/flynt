<?php

/*
Example usage:

Compressed
<img src="{{ image.src|quality(50) }}"/>

Note: Timber implements a resize filter so you can also do something like:
<img src="{{ image.src|resize(800)|quality(50) }}"/>

*/

namespace Pixel;

use Twig_Extension;
use Twig_SimpleFilter;

class TwigExtensionImageQuality extends Twig_Extension {

    public function getName() {
        return 'twig_extension_image_quality';
    }

    public function getFilters() {
        return array(
            new Twig_SimpleFilter('quality', array($this, 'quality')),
        );
    }

    public function quality($src, $quality) {
		$date     = date('Y/m');
		$path     = pathinfo($src);
		$dir      = wp_upload_dir($date);
		$filename = '/' . $path['filename'] . '-q' . $quality . '.' . $path['extension'];

		$img = wp_get_image_editor($src);

        if ($quality < 0 || $quality > 100) {
            $quality = 70;
        }

		$img->set_quality($quality);

		$newImg = $img->save($dir['path'] . $filename);

		return $dir['url'] . $filename;
	}
}

