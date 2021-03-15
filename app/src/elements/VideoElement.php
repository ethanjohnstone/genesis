<?php

namespace App\Elements;

use DNADesign\Elemental\Models\BaseElement;

class VideoElement extends BaseElement
{
    private static $table_name = "VideoElements";
    private static $singular_name = "Video Element";
    private static $plural_name = "Video Element(s)";

    private static $db = [];

    public function getType() {
        return self::$singular_name;
    }
}