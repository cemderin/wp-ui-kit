<?php

    namespace WPUIKIT;

    class Page extends Finalizer {
        protected $pageTitle = null;
        protected $menuTitle = null;
        protected $capability = 'manage_options';
        protected $menuSlug = null;
        protected $function = '';
        protected $iconUrl = null;
        protected $position = null;
        protected $subpages = array();

        public function __construct(
            $pageTitle,
            $menuTitle = null,
            $capability = null,
            $menuSlug = null,
            $function = null,
            $iconUrl = null,
            $position = null,
            $subpages = null
        ) {
            parent::__construct();
            $this->setPageTitle($pageTitle);

            if($menuTitle) $this->setMenuTitle($menuTitle);
            if(!$menuTitle) $this->setMenuTitle($pageTitle);

            if($capability) $this->setCapability($capability);

            if($menuSlug) $this->setMenuSlug($menuSlug);
            if(!$menuSlug) $this->setMenuSlug($pageTitle);

            if($function) $this->setFunction($function);
            if(!$function) $this->setFunction(function() {});

            if($iconUrl) $this->setIconUrl($iconUrl);

            if($position) $this->setPosition($position);

            if($subpages) $this->setSubpages($subpages);

        }

        /**
         * @return null
         */
        public function getPageTitle()
        {
            return $this->pageTitle;
        }

        /**
         * @param null $pageTitle
         */
        public function setPageTitle($pageTitle)
        {
            $this->pageTitle = $pageTitle;
        }

        /**
         * @return null
         */
        public function getMenuTitle()
        {
            return $this->menuTitle;
        }

        /**
         * @param null $menuTitle
         */
        public function setMenuTitle($menuTitle)
        {
            $this->menuTitle = $menuTitle;
        }

        /**
         * @return null
         */
        public function getCapability()
        {
            return $this->capability;
        }

        /**
         * @param null $capability
         */
        public function setCapability($capability)
        {
            $this->capability = $capability;
        }

        /**
         * @return null
         */
        public function getMenuSlug()
        {
            return $this->menuSlug;
        }

        /**
         * @param null $menuSlug
         */
        public function setMenuSlug($menuSlug)
        {
            $this->menuSlug = sanitize_title($menuSlug);
        }

        /**
         * @return null
         */
        public function getFunction()
        {
            return $this->function;
        }

        /**
         * @param null $function
         */
        public function setFunction($function)
        {
            $this->function = $function;
        }

        /**
         * @return null
         */
        public function getIconUrl()
        {
            return $this->iconUrl;
        }

        /**
         * @param null $iconUrl
         */
        public function setIconUrl($iconUrl)
        {
            $this->iconUrl = $iconUrl;
        }

        /**
         * @return null
         */
        public function getPosition()
        {
            return $this->position;
        }

        /**
         * @param null $position
         */
        public function setPosition($position)
        {
            $this->position = $position;
        }

        /**
         * @return array
         */
        public function getSubpages()
        {
            return $this->subpages;
        }

        /**
         * @param array $subpages
         */
        public function setSubpages($subpages)
        {
            $this->subpages = $subpages;
        }

        public function addSubpage(Subpage $subpage) {
            $subpage->setParentSlug($this->getMenuSlug());

            $this->subpages[] = $subpage;
        }



        public function finalize() {
            add_menu_page(
                $this->pageTitle,
                $this->menuTitle,
                $this->capability,
                $this->menuSlug,
                $this->function,
                $this->iconUrl,
                $this->position
            );
        }
    }