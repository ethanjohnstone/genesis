<?php

namespace App\Pages;

use App\Controllers\ContactPageController;
use Page;

class ContactPage extends Page
{
    private static $table_name = "ContactPages";
    private static $singular_name = "Contact Page";
    private static $plural_name = "Contact Pages";
    private static $controller_name = ContactPageController::class;
}