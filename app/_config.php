<?php

// Namespaces
use SilverStripe\Forms\HTMLEditor\TinyMCEConfig;

// Custom editor styles
TinyMCEConfig::get('cms')
    ->addButtonsToLine(1, 'styleselect')
    ->setOption('importcss_append', true);