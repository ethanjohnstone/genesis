<?php

// Namespaces
use SilverStripe\Admin\CMSMenu;
use SilverStripe\CampaignAdmin\CampaignAdmin;
use SilverStripe\Forms\HTMLEditor\TinyMCEConfig;

// Custom editor styles
TinyMCEConfig::get("cms")
    ->addButtonsToLine(1, "styleselect")
    ->setOptions([
        "importcss_append" => true,
        "style_formats" => []
    ]);


CMSMenu::remove_menu_class(CampaignAdmin::class);