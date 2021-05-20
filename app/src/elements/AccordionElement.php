<?php

namespace App\Elements;

use DNADesign\Elemental\Models\BaseElement;

class AccordionElement extends BaseElement
{
  private static $table_name = "AccordionElements";
  private static $singular_name = "Accordions";
  private static $plural_name = "Accordions";
  private static $db = [];

  public function getType()
  {
    return self::singular_name();
  }
}
