<?php

// root folder of the project
$baseDir = dirname(__DIR__);

require_once $baseDir . '/vendor/autoload.php';

// You can override the configuration parameters in the intermediate config
$symbioticConfig = include $baseDir . '/Symbiotic/config/config.php';

/**
 * When installing the symbiotic/full package, a cached container is available
 * Initialization in this case occurs through the Builder:
 */
if (class_exists(\Symbiotic\Core\ContainerBuilder::class) && isset($symbioticConfig['storage_path'])) {
    $cache = new \Symbiotic\Cache\FilesystemCache($symbioticConfig['storage_path'] . '/cache/core');
    $core = (new \Symbiotic\Core\ContainerBuilder($cache))
        ->buildCore($symbioticConfig);
} else {
    // Basic construction of the Core container
    $core = new \Symbiotic\Core\Core($symbioticConfig);
}

// Starting request processing
$core->run();

// Then the initialization code and the work of another framework can go on when the symbiosis mode is enabled...
// $laravel->handle();




