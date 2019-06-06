<?php

    namespace WPUIKIT;

    class Setting extends AbstractClass {
        protected $id = null;
        protected $title = null;
        protected $function = null;
        protected $page = null;
        protected $section = null;
        protected $args = null;

        protected $settingGroup = null;
        protected $settingName = null;
        protected $settingArgs = null;


        public function __construct($title, $id = null, $page = null, $secion = null, $args = null, $settingGroup = null, $settingName = null, $settingArgs = null) {

            $this->setTitle($title);

            if($id) $this->setId($id);
            if(!$id) $this->setId($this->getTitle());

            if($page) $this->setPage($page);
            if(!$page) $this->setPage('general');

            if($secion) $this->setSection($secion);
            if(!$secion) $this->setSection('default');

            if($settingGroup) $this->setSettingGroup($settingGroup);
            if(!$settingGroup) $this->setSettingGroup($this->getPage());

            if($settingName) $this->setSettingName($settingName);
            if(!$settingName) $this->setSettingName($this->getTitle());

            if($settingArgs) $this->setSettingArgs($settingArgs);
            if(!$settingArgs) $this->setSettingArgs(array(
                'type' => 'string',
                'sanitize_callback' => 'sanitize_text_field',
                'default' => null
            ));

            if($args) $this->setArgs($args);
            if(!$args) $this->setArgs(array(
                'label_for' => $this->getSettingName()
            ));

            $this->_register();
        }

        /**
         * @return null
         */
        public function getId()
        {
            return $this->id;
        }

        /**
         * @param null $id
         */
        public function setId($id)
        {
            $this->id = sanitize_title($id);
        }

        /**
         * @return null
         */
        public function getTitle()
        {
            return $this->title;
        }

        /**
         * @param null $title
         */
        public function setTitle($title)
        {
            $this->title = $title;
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
        public function getPage()
        {
            return $this->page;
        }

        /**
         * @param null $page
         */
        public function setPage($page)
        {
            $this->page = $page;
        }

        /**
         * @return null
         */
        public function getSection()
        {
            return $this->section;
        }

        /**
         * @param null $section
         */
        public function setSection($section)
        {
            $this->section = $section;
        }

        /**
         * @return null
         */
        public function getArgs()
        {
            return $this->args;
        }

        /**
         * @param null $args
         */
        public function setArgs($args)
        {
            $this->args = $args;
        }

        /**
         * @return null
         */
        public function getSettingGroup()
        {
            return $this->settingGroup;
        }

        /**
         * @param null $settingGroup
         */
        public function setSettingGroup($settingGroup)
        {
            $this->settingGroup = $settingGroup;
        }

        /**
         * @return null
         */
        public function getSettingName()
        {
            return $this->settingName;
        }

        /**
         * @param null $settingName
         */
        public function setSettingName($settingName)
        {
            $this->settingName = sanitize_title($settingName);
        }

        /**
         * @return null
         */
        public function getSettingArgs()
        {
            return $this->settingArgs;
        }

        /**
         * @param null $settingArgs
         */
        public function setSettingArgs($settingArgs)
        {
            $this->settingArgs = $settingArgs;
        }

        public function renderEcho()
        {
            echo $this->render();
        }

        public function render() {
            // return '<input class="regular-text" type="text" name="'.$this->getSettingName().'" id="'.$this->getSettingName().'" value="'.get_option($this->getSettingName()).'">';
            return wp_dropdown_pages(
                    array(
                        'name' => $this->getSettingName(),
                        'echo' => 0,
                        'show_option_none' => __('&mdash; Select &mdash;'),
                        'option_none_value' => '0',
                        'selected' => get_option($this->getSettingName())
                    )
                );
        }


        protected function _register() {
            add_action('admin_init', function() {
                register_setting(
                    $this->getSettingGroup(),
                    $this->getSettingName(),
                    $this->getSettingArgs()
                );

                add_settings_field(
                    $this->getId(),
                    $this->getTitle(),
                    array($this, 'renderEcho'),
                    $this->getPage(),
                    $this->getSection(),
                    $this->getArgs()
                );
            });
        }
    }