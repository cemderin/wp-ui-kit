<?php

    namespace WPUIKIT;

    class Submenu extends Menu {
        protected $parentSlug = null;

        public function __construct(
            $pageTitle,
            $menuTitle = null,
            $capability = null,
            $menuSlug = null,
            $function = null,
            $iconUrl = null
        ) {
            parent::__construct(
                $pageTitle,
                $menuTitle,
                $capability,
                $menuSlug,
                $function,
                $iconUrl
            );
        }

        /**
         * @return null
         */
        public function getParentSlug()
        {
            return $this->parentSlug;
        }

        /**
         * @param null $parentSlug
         */
        public function setParentSlug($parentSlug)
        {
            $this->parentSlug = $parentSlug;
        }

        protected function _register() {

            add_action('admin_menu', function() {
                add_submenu_page(
                    $this->parentSlug,
                    $this->pageTitle,
                    $this->menuTitle,
                    $this->capability,
                    $this->menuSlug,
                    $this->function
                );
            });

        }
    }