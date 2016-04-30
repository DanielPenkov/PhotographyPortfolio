<?php
use Cake\Routing\RouteBuilder;
use Cake\Routing\Router;

Router::plugin('Admin', function (RouteBuilder $routes) {
    $routes->connect('/', ['plugin' => 'Admin', 'controller' => 'pictures', 'action' => 'index']);
    $routes->extensions(['json']);
    $routes->fallbacks('InflectedRoute');
});
