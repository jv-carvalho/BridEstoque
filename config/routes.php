<?php

use Cake\Http\Middleware\CsrfProtectionMiddleware;
use Cake\Routing\RouteBuilder;
use Cake\Routing\Router;
use Cake\Routing\Route\DashedRoute;
use Cake\Core\Plugin;

Router::defaultRouteClass(DashedRoute::class);

Router::scope('/', function (RouteBuilder $routes) {

    $routes->registerMiddleware('csrf', new CsrfProtectionMiddleware([
        'httpOnly' => true
    ]));
    $routes->applyMiddleware('csrf');

    
    $routes->connect('/', ['controller' => 'Pages', 'action' => 'display', 'home']);
    $routes->connect('/users', ['controller' => 'Users', 'action' => 'index']);
    $routes->connect('/consumos', ['controller' => 'Consumos', 'action' => 'index']);
    $routes->connect('/produtos', ['controller' => 'Produtos', 'action' => 'index']);
    $routes->connect('/compras', ['controller' => 'Compras', 'action' => 'index']);
    $routes->connect('/itemcompras', ['controller' => 'ItemCompras', 'action' => 'index']);
    $routes->connect('/fornecedores', ['controller' => 'Fornecedores', 'action' => 'index']);
    $routes->connect('/unidademedidas', ['controller' => 'UnidadeMedidas', 'action' => 'index']);

    $routes->fallbacks(DashedRoute::class);
});

Plugin:: routes();