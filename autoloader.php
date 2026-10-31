<?php

/**
 * PSR-4 style autoloader: each namespace prefix maps to its own base directory.
 */
spl_autoload_register(function (string $class): void {
    $prefixes = [
        'Backbone\\' => __DIR__ . '/framework/src/',
        'App\\' => __DIR__ . '/app/',
    ];

    foreach ($prefixes as $prefix => $base_dir) {
        $len = strlen($prefix);

        if (strncmp($prefix, $class, $len) !== 0) {
            continue;
        }

        $relative_class = substr($class, $len);
        $file = $base_dir . str_replace('\\', '/', $relative_class) . '.php';

        if (file_exists($file)) {
            require $file;
        }

        return;
    }
});
