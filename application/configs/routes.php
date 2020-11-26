<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$route = new Zend_Controller_Router_Route_Static(
    'home',
    array(
        'controller'    => 'index',
        'action'        => 'index'
    )
);
$router->addRoute('home', $route);
$route = new Zend_Controller_Router_Route_Static(
    'login',
    array(
        'controller'    => 'index',
        'action'        => 'login'
    )
);
$router->addRoute('login', $route);
$route = new Zend_Controller_Router_Route_Static(
    'addAlbum',
    array(
        'controller'    => 'album',
        'action'        => 'add'
    )
);
$router->addRoute('addAlbum', $route);

$route = new Zend_Controller_Router_Route_Static(
    'logout',
    array(
        'controller'    => 'index',
        'action'        => 'logout'
    )
);
$router->addRoute('logout', $route);

$route = new Zend_Controller_Router_Route(
    'editAlbum/:id',
    array(
        'controller' => 'album',
        'action'     => 'edit'
    )
);
 
$router->addRoute('editAlbum', $route);
