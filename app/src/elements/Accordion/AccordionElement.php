<?php

namespace App\Elements\Accordion;

use App\Elements\Accordion\AccordionItem;
use DNADesign\Elemental\Models\BaseElement;
use SilverStripe\Forms\GridField\GridField;
use Symbiote\GridFieldExtensions\GridFieldOrderableRows;
use SilverStripe\Forms\GridField\GridFieldConfig_RecordEditor;

class AccordionElement extends BaseElement
{
  private static $table_name = "AccordionElements";
  private static $singular_name = "Accordions";
  private static $plural_name = "Accordions";
  private static $inline_editable = false;

  private static $db = [];

  private static $has_many = [
      "Items" => AccordionItem::class
  ];

  public function getCMSFields()
  {
    $fields = parent::getCMSFields();

    $fields->removeByName([
      "Items"
    ]);

    $fields->addFieldsToTab("Root.Main", [
      GridField::create(
        "Items", 
        "Items", 
        $this->Items(), 
        GridFieldConfig_RecordEditor::create()
          ->addComponent(new GridFieldOrderableRows ("SortOrder")))
    ]);

    return $fields;
  }

  public function getType()
  {
    return self::singular_name();
  }
}
