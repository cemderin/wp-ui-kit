<?php

    namespace WPUIKIT;

    use WPUIKIT\UI\AbstractElement;
    use WPUIKIT\UI\Tag;

    class Notice extends AbstractClass {
        /**
         * @var AbstractElement
         */
        protected $message = null;

        public function __construct($message) {
            $this->setMessage($message);

            $this->_register();
        }

        /**
         * @return AbstractElement
         */
        public function getMessage()
        {
            return $this->message;
        }

        /**
         * @param AbstractElement $message
         */
        public function setMessage($message)
        {
            if(is_string($message)) $message = new Tag($message, 'p');
            $this->message = $message;
        }

        protected function _register() {
            add_action('admin_notices', function() {
                $this->output();
            });
        }

        public function output() {
            // if($this->getMessage()) echo $this->getMessage();

            echo new Tag($this->getMessage(), null, array('notice notice-success'));
        }

    }