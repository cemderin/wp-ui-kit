<?php

    namespace WPUIKIT;

    /**
     * Finalizer class
     *
     * The pattern called "finalizing" in the WP UI Kit context is a class which registers an admin_init action to
     * provide the latest representation of it's own instance
     *
     * @package WPUIKIT
     */
    abstract class Finalizer {
        protected $finalizerAction = 'admin_menu';

        /**
         * @return string
         */
        public function getFinalizerAction()
        {
            return $this->finalizerAction;
        }

        /**
         * @param string $finalizerAction
         */
        public function setFinalizerAction($finalizerAction)
        {
            $this->finalizerAction = $finalizerAction;
        }

        /**
         * The finalize method, registers the latest state as WordPress entity
         * @return void
         */
        abstract public function finalize();

        /**
         * Finalizer constructor.
         * Registers the finalizer
         */
        public function __construct() {
            add_action($this->getFinalizerAction(), array($this, 'finalize'));
        }
    }