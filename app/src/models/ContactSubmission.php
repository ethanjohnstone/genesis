<?php

namespace App\Models;

use SilverStripe\ORM\DataObject;
use SilverStripe\Forms\TextField;
use SilverStripe\Forms\TextareaField;

class ContactSubmission extends DataObject
{
    private static $table_name = "ContactSubmissions";
    private static $singular_name = "Contact Submission";
    private static $plural_name = "Contact Submissions";

    private static $db = [
        "Name" => "Varchar(100)",
        "Email" => "Varchar(150)",
        "Phone" => "Varchar(30)",
        "Message" => "Text"
    ];

    private static $default_sort = "Created DESC";
    
    private static $summary_fields = [
        "Created", "Name", "Email", "Phone", "Message"
    ];

    public function getCMSFields()
    {
        $fields = parent::getCMSFields();

        $fields->addFieldsToTab("Root.Main", [
            TextField::create("Created")
                ->setReadonly(true),
            TextField::create('Name')
                ->setReadonly(true),
            TextField::create('Email')
                ->setReadonly(true),
            TextField::create('Phone')
                ->setReadonly(true),
            TextareaField::create('Message')
                ->setReadonly(true)
        ]);

        return $fields;
    }
}