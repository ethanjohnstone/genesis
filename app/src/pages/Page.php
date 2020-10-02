<?php

namespace {

    use SilverStripe\CMS\Model\SiteTree;
    use SilverStripe\Forms\TextField;
    use SilverStripe\Security\Permission;

    class Page extends SiteTree
    {
        private static $db = [
            "SeoTitle" => "Text"
        ];

        private static $has_one = [];

        public function getCMSFields()
        {
            $fields = parent::getCMSFields();

            $fields->addFieldsToTab("Root.Main", [
                TextField::create("SeoTitle")
                    ->setDescription("For if you're wanting to add some fancy flare to your page titles.")
            ], "MenuTitle");

            return $fields;
        }

        public function IsAdmin()
        {
            return Permission::check("ADMIN");
        }
    }
}
