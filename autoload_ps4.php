<?php

// autoload classes using PS-4 namespaces
spl_autoload_register(function ($class) {

    // base directory for the namespace prefix
    $baseDir = __DIR__ . '/src/';

    $filepath = $baseDir . str_replace('\\', '/', $class) . '.php';

    // check if the filepath exists
    if (file_exists($filepath)) {
        require $filepath;
    }
});
