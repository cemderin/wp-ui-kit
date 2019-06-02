<?php
	
	/**
	 * Plugin name: WP UI Kit
	 * Plugin URI: https://github.com/cemderin/wp-ui-kit
	 * Description: Seamless WordPress admin interfaces
	 * Version: 0.0.0
	 * Author: Cem Derin
	 * Author URI: https://cemderin.com
	 */

	$autoloader = array(
        __DIR__,
        'autoloader.php'
    );

    $autoloader = implode(DIRECTORY_SEPARATOR, $autoloader);

    require_once $autoloader;
    require_once 'functions.php';