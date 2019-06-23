<?php

use SilverStripe\ORM\DataExtension;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\TextField;
use SilverStripe\Forms\CheckboxField;

class SiteConfigExtension extends DataExtension
{
    private static $db = [
        "GoogleTagManagerCode" => "Varchar(16)",
        "ContactPhoneNumber" => "Varchar(255)",
        "ContactFormEmail" => "Varchar(255)",
        "Copyright" => "Text",

        "MaintenanceActive" => "Boolean",
        "MaintenanceTitle" => "Text",
        "MaintenanceMessage" => "Text"
    ];

    private static $defaults = [
        "ContactPhoneNumber" => "027 123 456",
        "ContactFormEmail" => "support@baa.co.nz",
        "Copyright" => "© 2019 {{name}}",

        "MaintenanceTitle" => "Under maintenance",
        "MaintenanceMessage" => "Please check back later."
    ];

    public function updateCMSFields(FieldList $fields) {
        // Remove Theme
        $fields->removeByName("Theme");

        // Add fields
        $fields->addFieldsToTab("Root.Main", [
            TextField::create("GoogleTagManagerCode", "Google Tag Manager account")
                ->setDescription("Account number to be used all across the site (in the format <strong>GTM-XXXXXX</strong>)"),
            TextField::create("ContactPhoneNumber", "Phone Number")
                ->setDescription("This is how the phone number will be displayed throughout the website"),
            TextField::create("ContactFormEmail", "Contact Email")
                ->setDescription("This is the email address that will receive contact form entries, you can also view these entries from the contact admin in the left menu"),
            TextField::create("Copyright", "Copyright")
                ->setDescription("This copyright note will be displayed throughout the website")
        ]);

        // Add maitenance related fields
        $fields->addFieldsToTab("Root.Maintenance", [
            CheckboxField::create ("MaintenanceActive", "Maintenance mode enabled")
                -> setDescription ("Enables a site-wide maintenance mode for non logged-in users"),
            TextField::create ("MaintenanceTitle", "Maintenance title")
                -> setDescription ("The title to display to users who are trying to access the site while maintenance mode is enabled"),
            TextField::create ("MaintenanceMessage", "Maintenance message")
                -> setDescription ("The message to display to users who are trying to access the site while maintenance mode is enabled")
        ]);
    }
}