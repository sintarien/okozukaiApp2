<?php
use Cake\Routing\Route\DashedRoute;
use Cake\Routing\RouteBuilder;
use Cake\Routing\Router;

$routes->setRouteClass(DashedRoute::class);

$routes->scope('/', function (RouteBuilder $builder) {

    Router::scope('/',function($routes){
        $routes->setExtensions(['json']);
        $routes->connect('/moneys/get',['controller'=>'Moneys','action'=>'get'])->setMethods(['GET']);
        $routes->connect('/moneys/test',['controller'=>'Moneys','action'=>'test'])->setMethods(['GET']);
        $routes->connect('/moneys/regist',['controller'=>'Moneys','action'=>'regist'])->setMethods(['POST']);
        // $routes->resources('moneys');
        });

    $builder->connect('/', ['controller' => 'Pages', 'action' => 'display', 'home']);
    $builder->connect('/pages/*', 'Pages::display');
    $builder->fallbacks();
});


