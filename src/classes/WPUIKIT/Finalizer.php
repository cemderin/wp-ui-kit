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
            add_action('admin_menu', array($this, 'finalize'));
        }
    }