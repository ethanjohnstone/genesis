<?php

namespace {

    use SilverStripe\CMS\Model\SiteTree;
    use SilverStripe\Security\Permission;

    class Page extends SiteTree
    {
        private static $db = [];
        private static $has_one = [];

        public function IsAdmin()
        {
            return Permission::check("ADMIN");
        }
    }
}
