<?php

namespace Helpers;

require __DIR__ . '/../../autoloader.php';

class Debug
{
    public static function dd($arg)
    {
        echo "<pre>";
        var_dump($arg);
        echo "</pre>";
        die();
    }

    public static function d($arg)
    {
        echo "<pre>";
        var_dump($arg);
        echo "</pre>";
    }


}
