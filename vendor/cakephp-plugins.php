<?php
$baseDir = dirname(dirname(__FILE__));
return [
    'plugins' => [
        'Admin' => $baseDir . '/plugins/Admin/',
        'Bake' => $baseDir . '/vendor/cakephp/bake/',
        'CakeDC/Users' => $baseDir . '/vendor/cakedc/users/',
        'DebugKit' => $baseDir . '/vendor/cakephp/debug_kit/',
        'Migrations' => $baseDir . '/vendor/cakephp/migrations/'
    ]
];