<?php

namespace App\Extensions;

use SilverStripe\Assets\Image;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\TextField;
use SilverStripe\AssetAdmin\Forms\UploadField;
use SilverStripe\ORM\DataExtension;
use SilverStripe\Forms\DropdownField;

class OpenGraphExtension extends DataExtension {
    // OpenGraph fields
    private static $db = [
        "OpenGraphEnabled" => "Boolean",
        "OpenGraphTitle" => "Text",
        "OpenGraphType" => "Text",
        "OpenGraphDescription" => "Text"
    ];

    // 1:1 Relations
    private static $has_one = [
        "OpenGraphImage" => Image::class
    ];

    // Relation ownership
    private static $owns = [
        "OpenGraphImage"
    ];

    public function updateCMSFields (FieldList $fields) {
        $fields -> addFieldsToTab ("Root.OpenGraph", [
            DropdownField::create ("OpenGraphEnabled", "Enabled", [
                true => "Yes",
                false => "No"
            ]),
            TextField::create ("OpenGraphTitle", "Title"),
            TextField::create ("OpenGraphDescription", "Description"),
            DropdownField::create ("OpenGraphType", "Type", [
                "website" => "Website",
                "article" => "Article"
            ]),
            UploadField::create ("OpenGraphImage", "Image")
        ]);

        return $fields;
    }
}