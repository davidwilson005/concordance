<?php

// autoload classes using PS-4 namespaces
spl_autoload_register(function ($class) {

    // base directory for the namespace prefix
    $baseDir = __DIR__ . '/src/';

    // get the filepath by replacing the namespace separators with directory separators
    $filepath = $baseDir . str_replace('\\', DIRECTORY_SEPARATOR, $class) . '.php';

    // make sure the filepath exists before trying to require it
    if (file_exists($filepath)) {
        require $filepath;
    }
});
