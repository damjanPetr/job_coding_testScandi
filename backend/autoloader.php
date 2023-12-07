<?php

require_once __DIR__ . '/config/config.php';

spl_autoload_register(function ($class_name): void {

    $file = __DIR__ . DIRECTORY_SEPARATOR . 'app' . DIRECTORY_SEPARATOR . $class_name . '.php';
    $file = str_replace('\\', DIRECTORY_SEPARATOR, $file);


    if (file_exists($file)) {
        require_once $file;
    };

});
