<?php
    namespace WPUIKIT;

    class Subpage extends Page {
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

        public function finalize() {
            add_submenu_page(
                $this->parentSlug,
                $this->pageTitle,
                $this->menuTitle,
                $this->capability,
                $this->menuSlug,
                $this->function
            );

        }
    }