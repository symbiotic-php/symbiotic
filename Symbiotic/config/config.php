<?php

// root folder of the project
$base_path = dirname(__DIR__, 2);

// Full version config
$config = include $base_path . '/vendor/symbiotic/full/src/config.sample.php';

$config['debug'] = true;
$config['symbiosis'] = false;
$config['default_host'] = 'localhost';
$config['public_path'] = $base_path . '/public';
$config['storage_path'] = $base_path . '/Symbiotic/storage';

// Directory for your personal modules
$config['packages_paths'][] = $base_path . '/Symbiotic/modules';

// Auth
$config['auth'] = [
    'users' => [
        /**
         * Uncomment the user section to log in through the basic authorization of the framework,
         * it is recommended to change the password!
         */
        /* [
             'login' => 'admin',
             // 1234
             'password' => '$2y$10$fblGNBFYBjC9a3L6d0.lle1BoVFdMlMOzN6/NWjqBb8wFlJZt9P8C',
             'access_group' => \Symbiotic\Auth\UserInterface::GROUP_ADMIN,
         ]*/
    ]
];

// Autoloader for custom modules directories
array_unshift($config['bootstrappers'], \Symbiotic\Autoload\AutoloadBootstrap::class);

// Config for Bootstrap
$config['autoloader'] = [
    'scan_dirs' => []
];
foreach ($config['packages_paths'] as $v) {
    $config['autoloader']['scan_dirs'][] = $v;
}

// Installing a session on file storage for Roadrunner mode (CLI)
if (\_S\is_console()) {
    $config['session'] = [
        'driver' => 'file',
        'minutes' => 1200,
        'name' => session_name(),
        'path' => session_save_path(),
        'namespace' => '5a8309dedb810d2322b6024d536832ba',
        'secure' => false,
        'httponly' => true,
        'same_site' => null,
    ];
}


return $config;
