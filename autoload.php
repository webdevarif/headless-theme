<?php

// autoload.php
function headless_theme_include_file_auto_loader($class_name) {
    $namespace = 'Inc\\';
    // Use get_template_directory() instead of __DIR__ to ensure it works as a theme
    $base_dir = get_template_directory() . '/inc/';

    $class_name = str_replace($namespace, '', $class_name);
    $class_name = str_replace('\\', DIRECTORY_SEPARATOR, $class_name);

    $file = $base_dir . $class_name . '.php';

    if (file_exists($file)) {
        require_once $file;
    }
}

spl_autoload_register('headless_theme_include_file_auto_loader');
