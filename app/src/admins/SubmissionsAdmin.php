<?php

namespace App\Admins;

use App\Models\ContactSubmission;
use SilverStripe\Admin\ModelAdmin;

class SubmissionsAdmin extends ModelAdmin
{
    private static $menu_title = "Form Submissions";
    private static $url_segment = "submissions-admin";

    private static $managed_models = [
        ContactSubmission::class
    ];
}