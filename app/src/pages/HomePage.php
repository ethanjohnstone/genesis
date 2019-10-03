<?php

namespace App\Pages;

use App\Controllers\HomePageController;
use Page;

class HomePage extends Page
{
    private static $table_name = "Homepage";
    private static $singular_name = "Homepage";
    private static $plural_name = "Homepages";
    private static $controller_name = HomePageController::class;
}