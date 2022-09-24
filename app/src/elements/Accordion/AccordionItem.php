<?php

namespace App\Elements\Accordion;

use SilverStripe\ORM\DataObject;
use SilverStripe\Forms\TextField;
use SilverStripe\Control\Director;
use SilverStripe\Forms\LiteralField;
use App\Elements\Accordion\AccordionElement;
use SilverStripe\Forms\HTMLEditor\HTMLEditorField;

class AccordionItem extends DataObject
{
    private static $table_name = "AccordionItems";

    private static $singular_name = "Accordion item";
    private static $plural_name = "Accordion items";

    private static $db = [
        "SortOrder" => "Int",
        "Title" => "Text",
        "AnchorReference" => "Varchar(30)",
        "Content" => "HTMLText"
    ];

    private static $default_sort = "SortOrder";

    private static $has_one = [
        "AccordionElement" => AccordionElement::class
    ];

    public function getCMSFields()
    {
        $fields = parent::getCMSFields();

        $fields->removeByName([
            "SortOrder",
            "AccordionElementID"
        ]);

        $fields->addFieldsToTab("Root.Main", [
            TextField::create("Title"),
            TextField::create("AnchorReference")
                ->setDescription("To help build a shareable link to this item"),
            HTMLEditorField::create("Content")
        ]);

        if (!empty($this->AnchorReference)){
            $link = $this->ShareLink();
            $fields->addFieldToTab("Root.Main", LiteralField::create("ShareLink", "<p>$link</p>"), "Content");
        }

        return $fields;
    }

    public function ShareLink()
    {
        
        return $this->AccordionElement()->getPage()->absoluteLink() . "#{$this->AnchorReference}";
    }
}