<?php

namespace App\Extensions;

use SilverStripe\ORM\DataExtension;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\TextField;

class SiteConfigExtension extends DataExtension
{
    private static $db = [
        "GoogleTagManagerCode" => "Varchar(16)"
    ];

    public function updateCMSFields(FieldList $fields)
    {
        // Remove Theme
        $fields->removeByName([
            "Theme",
            "Tagline"
        ]);

        // Add fields
        $fields->addFieldsToTab("Root.Analytics", [
            TextField::create("GoogleTagManagerCode", "GTM account")
                ->setDescription("Google tag manager account number to be used all across the site (in the format <strong>GTM-XXXXXX</strong>)"),
        ]);
    }
}