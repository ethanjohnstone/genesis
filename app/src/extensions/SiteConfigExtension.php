<?php

namespace Genesis;

use SilverStripe\ORM\DataExtension;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\TextField;
use SilverStripe\AssetAdmin\Forms\UploadField;
use SilverStripe\Assets\Image;

class SiteConfigExtension extends DataExtension
{
    private static $db = [
        'GACode' => 'Varchar(16)',
        'ContactEmail' => 'Varchar(255)',
        'TwitterUsername' => 'Varchar(255)'
    ];

    private static $has_one = [
        'OGPhoto' => Image::class
    ];

    public function updateCMSFields(FieldList $fields)
    {
        // The client should never be changing this.
        $fields->removeByName('Theme');
        $fields->addFieldsToTab('Root.Main', [
            TextField::create('GACode', 'Google Analytics Code')
                ->setDescription('Account number to be used all across the site (in the format <strong>UA-XXXXX-X</strong>)'),
            TextField::create('ContactEmail', 'Contact Email')
                ->setDescription('This is the email address that will receive contact form entries'),
            TextField::create('TwitterUsername', 'Twitter username')
                ->setDescription('This is the twitter user name for sharing integration. Please ensure that it\'s without the @ symbol'),
            UploadField::create('OGPhoto', 'Open graph protocol image')
                ->setFolderName('og-images')
                ->setDescription('The image that is shown when you share to facebook by default')
        ]);
    }
}