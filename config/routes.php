<?php
/**
 * Routes configuration
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different URLs to chosen controllers and their actions (functions).
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

use Cake\Core\Plugin;
use Cake\Routing\RouteBuilder;
use Cake\Routing\Router;

/**
 * The default class to use for all routes
 *
 * The following route classes are supplied with CakePHP and are appropriate
 * to set as the default:
 *
 * - Route
 * - InflectedRoute
 * - DashedRoute
 *
 * If no call is made to `Router::defaultRouteClass()`, the class used is
 * `Route` (`Cake\Routing\Route\Route`)
 *
 * Note that `Route` does not do any inflections on URLs which will result in
 * inconsistently cased URLs when used with `:plugin`, `:controller` and
 * `:action` markers.
 *
 */
Router::defaultRouteClass('DashedRoute');

Router::scope('/', function (RouteBuilder $routes) {
    /**
     * Here, we are connecting '/' (base path) to a controller called 'Pages',
     * its action called 'display', and we pass a param to select the view file
     * to use (in this case, src/Template/Pages/home.ctp)...
     */
    $routes->connect('/', ['controller' => 'Pages', 'action' => 'landing', 'landing']);
    $routes->connect('/contacts', ['controller' => 'Pages', 'action' => 'contacts', 'contact']);

    $routes->connect('/portraits', ['controller' => 'Categories', 'action' => 'view', 1]);
    $routes->connect('/portraits/cv-linkedin', ['controller' => 'Albums', 'action' => 'view', 1]);
    $routes->connect('/portraits/cv', ['controller' => 'Albums', 'action' => 'view', 1]);
    $routes->connect('/portraits/men', ['controller' => 'Albums', 'action' => 'view', 8]);
    $routes->connect('/portraits/couples', ['controller' => 'Albums', 'action' => 'view', 9]);
    $routes->connect('/portraits/women', ['controller' => 'Albums', 'action' => 'view', 6]);

    $routes->connect('/events', ['controller' => 'Categories', 'action' => 'view', 2]);
    $routes->connect('/events/party', ['controller' => 'Albums', 'action' => 'view', 10]);
    $routes->connect('/events/christening', ['controller' => 'Albums', 'action' => 'view', 11]);
    $routes->connect('/events/confirmation', ['controller' => 'Albums', 'action' => 'view', 12]);
    $routes->connect('/events/public_events', ['controller' => 'Albums', 'action' => 'view', 13]);

    $routes->connect('/children', ['controller' => 'Categories', 'action' => 'view', 3]);
    $routes->connect('/children/christmas', ['controller' => 'Albums', 'action' => 'view', 15]);
    $routes->connect('/children/studio', ['controller' => 'Albums', 'action' => 'view', 16]);
    $routes->connect('/children/clients-place', ['controller' => 'Albums', 'action' => 'view', 17]);
    $routes->connect('/children/spring', ['controller' => 'Albums', 'action' => 'view', 21]);

    $routes->connect('/business', ['controller' => 'Categories', 'action' => 'view', 4]);
    $routes->connect('/business/product-photography', ['controller' => 'Albums', 'action' => 'view', 18]);
    $routes->connect('/business/property-photography', ['controller' => 'Albums', 'action' => 'view', 19]);
    $routes->connect('/business/other-business', ['controller' => 'Albums', 'action' => 'view', 20]);

    $routes->connect('/maternity', ['controller' => 'Albums', 'action' => 'view', 3]);
    $routes->connect('/landscapes', ['controller' => 'Albums', 'action' => 'view', 5]);
    $routes->connect('/weddings', ['controller' => 'Albums', 'action' => 'view', 14]);




    
    $routes->connect('/business/:id',
        ['controller' => 'Sessions', 'action' => 'view'],
        ['id' => '\d+', 'pass' => ['id']]);

    $routes->connect('/cv/:id',
        ['controller' => 'Sessions', 'action' => 'view'],
        ['id' => '\d+', 'pass' => ['id']]);
    $routes->connect('/cv-linkedin/:id',
        ['controller' => 'Sessions', 'action' => 'view'],
        ['id' => '\d+', 'pass' => ['id']]);
    
    $routes->connect('/children/:id',
        ['controller' => 'Sessions', 'action' => 'view'],
        ['id' => '\d+', 'pass' => ['id']]);
    
    $routes->connect('/maternity/:id',
        ['controller' => 'Sessions', 'action' => 'view'],
        ['id' => '\d+', 'pass' => ['id']]);
    
    $routes->connect('/landscapes/:id',
        ['controller' => 'Sessions', 'action' => 'view'],
        ['id' => '\d+', 'pass' => ['id']]);
    
    $routes->connect('/women/:id',
        ['controller' => 'Sessions', 'action' => 'view'],
        ['id' => '\d+', 'pass' => ['id']]);

    $routes->connect('/men/:id',
        ['controller' => 'Sessions', 'action' => 'view'],
        ['id' => '\d+', 'pass' => ['id']]);

    $routes->connect('/couples/:id',
        ['controller' => 'Sessions', 'action' => 'view'],
        ['id' => '\d+', 'pass' => ['id']]);
    
    $routes->connect('/party/:id',
        ['controller' => 'Sessions', 'action' => 'view'],
        ['id' => '\d+', 'pass' => ['id']]);
    
    $routes->connect('/christening/:id',
        ['controller' => 'Sessions', 'action' => 'view'],
        ['id' => '\d+', 'pass' => ['id']]);
    
    $routes->connect('/confirmation/:id',
        ['controller' => 'Sessions', 'action' => 'view'],
        ['id' => '\d+', 'pass' => ['id']]);

    $routes->connect('/public_events/:id',
        ['controller' => 'Sessions', 'action' => 'view'],
        ['id' => '\d+', 'pass' => ['id']]);

    $routes->connect('/weddings/:id',
        ['controller' => 'Sessions', 'action' => 'view'],
        ['id' => '\d+', 'pass' => ['id']]);

    $routes->connect('/christmas/:id',
        ['controller' => 'Sessions', 'action' => 'view'],
        ['id' => '\d+', 'pass' => ['id']]);

    $routes->connect('/spring/:id',
        ['controller' => 'Sessions', 'action' => 'view'],
        ['id' => '\d+', 'pass' => ['id']]);

    $routes->connect('/studio/:id',
        ['controller' => 'Sessions', 'action' => 'view'],
        ['id' => '\d+', 'pass' => ['id']]);

    $routes->connect('/clients-place/:id',
        ['controller' => 'Sessions', 'action' => 'view'],
        ['id' => '\d+', 'pass' => ['id']]);

    $routes->connect('/property-photography/:id',
        ['controller' => 'Sessions', 'action' => 'view'],
        ['id' => '\d+', 'pass' => ['id']]);

    $routes->connect('/product-photography/:id',
        ['controller' => 'Sessions', 'action' => 'view'],
        ['id' => '\d+', 'pass' => ['id']]);

    $routes->connect('/other-business/:id',
        ['controller' => 'Sessions', 'action' => 'view'],
        ['id' => '\d+', 'pass' => ['id']]);




    /**
     * Connect catchall routes for all controllers.
     *
     * Using the argument `DashedRoute`, the `fallbacks` method is a shortcut for
     *    `$routes->connect('/:controller', ['action' => 'index'], ['routeClass' => 'DashedRoute']);`
     *    `$routes->connect('/:controller/:action/*', [], ['routeClass' => 'DashedRoute']);`
     *
     * Any route class can be used with this method, such as:
     * - DashedRoute
     * - InflectedRoute
     * - Route
     * - Or your own route class
     *
     * You can remove these routes once you've connected the
     * routes you want in your application.
     */
    $routes->fallbacks('DashedRoute');
});


/**
 * Load all plugin routes.  See the Plugin documentation on
 * how to customize the loading of plugin routes.
 */
Plugin::routes();
