<?php

// @ts-ignore
namespace {{namespace}};

use SilverStripe\CMS\Model\SiteTree;
use SilverStripe\Forms\GridField\GridField;
use SilverStripe\Forms\GridField\GridFieldConfig_RecordEditor;
use SilverStripe\Forms\LiteralField;
use SilverStripe\Forms\TreeDropdownField;
use SilverStripe\ORM\DataExtension;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\TextField;
use SilverStripe\AssetAdmin\Forms\UploadField;
use SilverStripe\Assets\Image;

class SiteConfigExtension extends DataExtension
{
    private static $db = [
        'GACode' => 'Varchar(16)',
        'PhoneNumber' => 'Varchar(255)',
        'ContactFormEmail' => 'Varchar(255)',
        'LocationLine1' => 'Varchar(256)',
        'LocationLine2' => 'Varchar(256)',
        'LocationLink' => 'Varchar(256)',
        'FacebookURL' => 'Varchar(256)', // multitude of ways to link to Facebook accounts, best to leave it open.
        'SnapchatUsername' => 'Varchar(256)',
        'InstagramLink' => 'Varchar(256)',
        'LinkedInLink' => 'Varchar(256)',
        'YoutubeLink' => 'Varchar(256)',
        'TwitterUsername' => 'Varchar(256)',
        'CallToActionLabel' => 'Varchar(256)',
        'CallToActionExternalLink' => 'Varchar(256)'
    ];

    private static $has_one = [
        'OGPhoto' => Image::class,
        'CallToActionInternalLink' => SiteTree::class
    ];

    private static $has_many = [
        'FooterLogos' => FooterLogo::class,
        'QuickLinks' => QuickLink::class,
        'FooterLinks' => FooterLink::class
    ];

    private static $owns = [
        'OGPhoto',
        'FooterLogos'
    ];

    public function updateCMSFields(FieldList $fields)
    {
        // The client should never be changing this.
        $fields->removeByName('Theme');

        $fields->addFieldsToTab('Root.Main', [
            TextField::create('GoogleAnalyticsCode', 'Google Analytics account')
                ->setDescription('Account number to be used all across the site (in the format <strong>UA-XXXXX-X</strong>)'),

            TextField::create('PhoneNumber', 'Phone Number')
                ->setDescription('This is how the phone number will be displayed throughout the website'),
            TextField::create('ContactFormEmail', 'Contact Email')
                ->setDescription('This is the email address that will receive contact form entries, you can also view these entries from the contact admin in the left menu.'),
            TextField::create('LocationLine1', 'Location')
                ->setDescription('This is the start of your physical location, e.g. "L2, 286 Victoria St"'),
            TextField::create('LocationLine2', 'Location Second')
                ->setDescription('This is the end of your physical location, e.g. Hamilton, NZ'),
            TextField::create('LocationLink', 'Location Link')
                ->setDescription('This is a link to the Google Maps location, e.g. https://goo.gl/maps/UCtJHeD9h472'),
            UploadField::create('OGPhoto')
                ->setFolderName('og-images')
                ->setDescription('The image that is shown when you share to facebook by default')
        ]);

        $fields->addFieldsToTab('Root.SocialMedia', [
            TextField::create('FacebookURL', 'Facebook UID or username')
                ->setDescription('Facebook link (everything after the "http://facebook.com/", eg http://facebook.com/<strong>username</strong> or http://facebook.com/<strong>pages/108510539573</strong>)'),
            TextField::create('InstagramLink', 'Instagram link')
                ->setDescription('The whole link for your profile for example "https://www.instagram.com/blacksheepcreativenz/"'),
            TextField::create('LinkedInLink', 'LinkedIn link'),
            TextField::create('YoutubeLink', 'YouTube link'),
            TextField::create('SnapchatUsername', 'Snapchat username'),
            TextField::create('TwitterUsername', 'Twitter username')
                ->setDescription('Twitter link (everything after the "http://twitter.com/", eg http://twitter.com/<strong>username</strong> )')
        ]);

        $fields->addFieldsToTab('Root.CallToAction', [
            TextField::create('CallToActionLabel'),
            LiteralField::create(
                'NoteOverride',
                '<div class="message good notice">Note: If you specify an External Link, the Internal Link will be ignored.</div>'
            ),
            TreeDropdownField::create(
                'CallToActionInternalLinkID',
                'Internal Link',
                SiteTree::class
            ),
            LiteralField::create(
                'Note',
                '<p>Use this to specify a link to a page either on this site (Internal Link) or another site (External Link).</p>'
            ),
            TextField::create('CallToActionExternalLink', 'External link')
        ]);


        $gridFieldConfig = new GridFieldConfig_RecordEditor();
        $list = $this->owner->FooterLogos();
        $gridField = new GridField('FooterLogos', 'FooterLogos', $list, $gridFieldConfig);
        $fields->addFieldToTab('Root.FooterLogos', $gridField);

        $gridFieldConfig = new GridFieldConfig_RecordEditor();
        $list = $this->owner->QuickLinks();
        $gridField = new GridField('QuickLinks', 'QuickLinks', $list, $gridFieldConfig);
        $fields->addFieldToTab('Root.QuickLinks', $gridField);

        $gridFieldConfig = new GridFieldConfig_RecordEditor();
        $list = $this->owner->FooterLinks();
        $gridField = new GridField('FooterLinks', 'FooterLinks', $list, $gridFieldConfig);
        $fields->addFieldToTab('Root.FooterLinks', $gridField);
    }

    public function getCallToActionLink()
    {
        if ($this->owner->CallToActionExternalLink) {
            $url = parse_url($this->owner->CallToActionExternalLink);
            // if no scheme set in the link, default to http
            if (!isset($url['scheme'])) {
                return '//' . $this->owner->CallToActionExternalLink;
            }
            return $this->owner->CallToActionExternalLink;
        } elseif ($this->owner->CallToActionInternalLinkID) {
            return $this->owner->CallToActionInternalLink()->Link();
        }
    }
}