<?php

    namespace WPUIKIT\UI;

    abstract class AbstractElement {
        protected $children;

        public function __construct($children = null) {
            // if($children && !is_array($children)) $children = array($children);
            if($children) $this->setChildren($children);
        }

        public function getChildren() {
            return $this->children;
        }

        public function setChildren($children) {
            $this->children = $children;
        }

        public function addChild($child) {
            $this->children[] = $child;
        }

        public function render() {
            if(!is_array($this->getChildren())) $this->setChildren(array());

            return implode(PHP_EOL, array_map(function($child) {
                return (string)$child;
            }, $this->getChildren()));
        }

        public function __toString() {
            return $this->render();
        }
    }