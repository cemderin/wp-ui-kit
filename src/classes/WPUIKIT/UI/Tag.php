<?php

    namespace WPUIKIT\UI;

    class Tag extends AbstractElement {
        protected $tag = 'div';
        protected $classes = array();

        public function __construct($children = null, $tag = null, $classes = null) {
            parent::__construct($children);

            if($tag) $this->setTag($tag);
            if($classes) $this->setClasses($classes);


        }

        /**
         * @return string
         */
        public function getTag()
        {
            return $this->tag;
        }

        /**
         * @param string $tag
         */
        public function setTag($tag)
        {
            $this->tag = $tag;
        }

        /**
         * @return array
         */
        public function getClasses()
        {
            return $this->classes;
        }

        /**
         * @param array $classes
         */
        public function setClasses($classes)
        {
            $this->classes = $classes;
        }





        public function render() {
            return implode(PHP_EOL, array(
                $this->generateOpenTag(),
                $this->children,
                '</'. $this->tag.'>'
            ));
        }

        protected function generateOpenTag() {
            return implode('', array(
                '<'. $this->getTag().' class="'. implode(' ', $this->getClasses()) .'">'
            ));
        }
    }