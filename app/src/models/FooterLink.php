<?php

namespace Genesis;

use SilverStripe\AssetAdmin\Forms\UploadField;
use SilverStripe\Assets\Image;
use SilverStripe\ORM\DataObject;
use SilverStripe\SiteConfig\SiteConfig;

class FooterLink extends DataObject
{
    private static $singular_name = "Footer Link";
    private static $table_name = 'FooterLink';

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