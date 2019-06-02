<?php
    /**
     * Common autoloader
     */
    try {
        spl_autoload_register(function($className) {
            $classPath = str_replace('\\', DIRECTORY_SEPARATOR, $className);

            $filePath = array(
                __DIR__,
                'classes',
                $classPath.'.php'
            );

            $filePath = implode(DIRECTORY_SEPARATOR, $filePath);

            if(file_exists($filePath)) return require_once $filePath;

            throw new Exception('Class '. $className.' not found at '. $filePath);

        });
    } catch(Exception $e) {

    }