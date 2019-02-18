<?php

namespace {{namespace}};

use SilverStripe\AssetAdmin\Forms\UploadField;
use SilverStripe\Assets\Image;
use SilverStripe\ORM\DataObject;
use SilverStripe\SiteConfig\SiteConfig;

class QuickLink extends DataObject
{
    private static $singular_name = "Quick Link";
    private static $table_name = 'QuickLink';

    private static $db = [
        'SortOrder' => 'Int'
    ];

    private static $default_sort = ['SortOrder' => 'ASC'];

    private static $has_one = [
        'Image' => Image::class,
        'SiteConfig' => SiteConfig::class
    ];

    private static $owns = [
        'Image'
    ];

    public function getCMSFields()
    {

        $fields = parent::getCMSFields();

        $fields->removeByName('SortOrder');

        $fields->addFieldsToTab('Root.Main', [
            UploadField::create('Image')
                ->setFolderName('Images')
        ]);

        return $fields;
    }
}