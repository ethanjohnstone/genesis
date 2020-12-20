<?php

// Namespaces
use SilverStripe\Forms\HTMLEditor\TinyMCEConfig;

ini_set('date.timezone', 'Pacific/Auckland');

// Custom editor styles
TinyMCEConfig::get('cms')
    ->addButtonsToLine(1, 'styleselect')
    ->setOptions([
        'importcss_append' => true,
        'style_formats' => []
    ]);
