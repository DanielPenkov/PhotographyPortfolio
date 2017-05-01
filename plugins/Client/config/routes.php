<?php
use Cake\Routing\RouteBuilder;
use Cake\Routing\Router;

Router::plugin('Client', function (RouteBuilder $routes) {
    $routes->connect('/', ['plugin' => 'Client', 'controller' => 'ProofGalleryImages', 'action' => 'index']);
    $routes->extensions(['json']);
    $routes->fallbacks('InflectedRoute');
});
