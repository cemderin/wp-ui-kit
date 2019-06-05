<?php

    namespace WPUIKIT;

    use WPUIKIT\UI\AbstractElement;

    class Menu extends AbstractClass {
        protected $pageTitle = null;
        protected $menuTitle = null;
        protected $capability = 'manage_options';
        protected $menuSlug = null;
        protected $function = null;
        protected $iconUrl = null;
        protected $position = null;
        protected $submenus = array();

        /**
         * @var AbstractElement
         */
        protected $renderElement = null;

        public function __construct(
            $pageTitle,
            $menuTitle = null,
            $capability = null,
            $menuSlug = null,
            $function = null,
            $iconUrl = null,
            $position = null,
            $renderElement = null
        ) {
            $this->_register();

            $this->setPageTitle($pageTitle);

            if($menuTitle) $this->setMenuTitle($menuTitle);
            if(!$menuTitle) $this->setMenuTitle($pageTitle);

            if($capability) $this->setCapability($capability);

            if($menuSlug) $this->setMenuSlug($menuSlug);
            if(!$menuSlug) $this->setMenuSlug($pageTitle);

            if($function) $this->setFunction($function);
            if(!$function) $this->setFunction(array($this, 'output'));

            if($iconUrl) $this->setIconUrl($iconUrl);

            if($position) $this->setPosition($position);

            if($renderElement) $this->setRenderElement($renderElement);
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
         * @return string
         */
        public function getCapability()
        {
            return $this->capability;
        }

        /**
         * @param string $capability
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

        protected function _register() {

            add_action('admin_menu', function() {
                add_menu_page(
                    $this->pageTitle,
                    $this->menuTitle,
                    $this->capability,
                    $this->menuSlug,
                    $this->function,
                    $this->iconUrl,
                    $this->position
                );
            });

        }

        /**
         * @return AbstractElement
         */
        public function getRenderElement()
        {
            return $this->renderElement;
        }

        /**
         * @param AbstractElement $renderElement
         */
        public function setRenderElement($renderElement)
        {
            $this->renderElement = $renderElement;
        }

        /**
         * @return array
         */
        public function getSubmenus()
        {
            return $this->submenus;
        }

        /**
         * @param array $submenus
         */
        public function setSubmenus($submenus)
        {
            foreach($submenus as $submenu) {
                $submenu->setParentSlug($this->getMenuSlug());
            }

            $this->submenus = $submenus;
        }

        /**
         * @param Submenu $submenu
         */
        public function addSubmenu(Submenu $submenu) {
            $submenu->setParentSlug($this->getMenuSlug());
            $this->submenus[] = $submenu;
        }





        public function output() {
            if($this->getRenderElement()) echo $this->getRenderElement();
        }
    }