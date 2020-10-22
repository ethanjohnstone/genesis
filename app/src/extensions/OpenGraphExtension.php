<?php

namespace App\Extensions;

use SilverStripe\Assets\Image;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\TextField;
use SilverStripe\AssetAdmin\Forms\UploadField;
use SilverStripe\ORM\DataExtension;
use SilverStripe\Forms\DropdownField;
use SilverStripe\SiteConfig\SiteConfig;
use SilverStripe\View\ArrayData;

class OpenGraphExtension extends DataExtension
{
    // OpenGraph fields
    private static $db = [
        "OpenGraphTitle" => "Text",
        "OpenGraphType" => "Text",
        "OpenGraphDescription" => "Text"
    ];

    private static $defaults = [
        "OpenGraphType" => "website"
    ];

    // 1:1 Relations
    private static $has_one = [
        "OpenGraphImage" => Image::class
    ];

    // Relation ownership
    private static $owns = [
        "OpenGraphImage"
    ];

    public function updateCMSFields(FieldList $fields)
    {
        $fields->addFieldsToTab("Root.OpenGraph", [
            TextField::create("OpenGraphTitle", "Title"),
            TextField::create("OpenGraphDescription", "Description"),
            DropdownField::create("OpenGraphType", "Type", [
                "website" => "Website",
                "article" => "Article"
            ]),
            UploadField::create("OpenGraphImage", "Image")
        ]);

        return $fields;
    }

    public function OpenGraphInfo()
    {
        $config = SiteConfig::current_site_config();
        $data = [
            "Type" => !empty($this->owner->OpenGraphType) ? $this->owner->OpenGraphType : !empty($config->OpenGraphType) ? $config->OpenGraphType : 'website',
            "Title" => !empty($this->owner->OpenGraphTitle) ? $this->owner->OpenGraphTitle : $this->owner->Title,
            "SiteName" => $config->Title,
            "Url" => $this->owner->AbsoluteLink(),
            "Description" => !empty($this->owner->OpenGraphDescription) ?? $this->owner->OpenGraphDescription
        ];

        $image = ($this->owner->OpenGraphImageID !== 0) ? $this->owner->OpenGraphImage() : $config->OpenGraphImage();

        $data['Image'] = [
            "Url" => $image->AbsoluteLink(),
            "Width" => $image->Width,
            "Height" => $image->Height
        ];

        return new ArrayData($data);
    }
}