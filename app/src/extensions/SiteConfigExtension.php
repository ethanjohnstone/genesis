<?php

namespace App\Extensions;

use SilverStripe\AssetAdmin\Forms\UploadField;
use SilverStripe\Assets\Image;
use SilverStripe\Forms\DropdownField;
use SilverStripe\ORM\DataExtension;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\TextField;
use SilverStripe\Forms\CheckboxField;
use SilverStripe\SiteConfig\SiteConfig;
use SilverStripe\View\ArrayData;

class SiteConfigExtension extends DataExtension
{
    private static $db = [
        "GoogleTagManagerCode" => "Varchar(16)",
        "ContactPhoneNumber" => "Varchar(255)",
        "ContactFormEmail" => "Varchar(255)"
    ];

    private static $defaults = [
        "ContactPhoneNumber" => "027 123 456",
        "ContactFormEmail" => "support@baa.co.nz"
    ];

    public function updateCMSFields(FieldList $fields)
    {
        // Remove Theme


        // Add fields
        $fields->addFieldsToTab("Root.Main", [
            TextField::create("GoogleTagManagerCode", "GTM account")
                ->setDescription("Google tag manager account number to be used all across the site (in the format <strong>GTM-XXXXXX</strong>)"),
            TextField::create("ContactPhoneNumber", "Phone Number")
                ->setDescription("This is how the phone number will be displayed throughout the website"),
            TextField::create("ContactFormEmail", "Contact Email")
                ->setDescription("This is the email address that will receive contact form entries, you can also view these entries from the contact admin in the left menu"),
        ]);
    }
}