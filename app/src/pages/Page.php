<?php

namespace {

    use SilverStripe\CMS\Model\SiteTree;
    use SilverStripe\Forms\TextField;
    use SilverStripe\Security\Permission;

    class Page extends SiteTree
    {
        private static $db = [];

        private static $has_one = [];

        public function getCMSFields()
        {
            $fields = parent::getCMSFields();

            $fields->addFieldsToTab("Root.Main", [
            ], "MenuTitle");

            return $fields;
        }

        public function IsAdmin()
        {
            return Permission::check("ADMIN");
        }
    }
}
