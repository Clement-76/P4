<?php

namespace ClementPatigny;

class Autoloader {
    static function register() {
        spl_autoload_register([__CLASS__, 'autoload']);
    }
    
    static function autoload($class) {
        $class = str_replace('ClementPatigny\\', '', $class);
        $class = lcfirst($class);
        require $class . '.php';
    }
}