<?php

namespace {{namespace}};

use SilverStripe\ORM\DataExtension;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\TextField;

class SiteConfigExtension extends DataExtension
{
    private static $db = [
        "GoogleAnalyticsCode" => "Varchar(16)",
        "ContactPhoneNumber" => "Varchar(255)",
        "ContactFormEmail" => "Varchar(255)",
        "Copyright" => "Text"
    ];

    private static $defaults = [
        "ContactPhoneNumber" => "027 123 456",
        "ContactFormEmail" => "support@baa.co.nz",
        "Copyright" => "© 2019 {{name}}"
    ];

    public function updateCMSFields(FieldList $fields) {
        // Remove Theme
        $fields->removeByName("Theme");

        // Add fields
        $fields->addFieldsToTab("Root.Main", [
            TextField::create("GoogleAnalyticsCode", "Google Analytics account")
                ->setDescription("Account number to be used all across the site (in the format <strong>UA-XXXXX-X</strong>)"),
            TextField::create("ContactPhoneNumber", "Phone Number")
                ->setDescription("This is how the phone number will be displayed throughout the website."),
            TextField::create("ContactFormEmail", "Contact Email")
                ->setDescription("This is the email address that will receive contact form entries, you can also view these entries from the contact admin in the left menu."),
            TextField::create("Copyright", "Copyright")
                ->setDescription("This copyright note will be displayed throughout the website.")
        ]);
    }
}