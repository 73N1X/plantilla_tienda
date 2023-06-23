<?php

require_once __DIR__ . '/../includes/app.php';

use MVC\Router;
use Controllers\ShopController;
use Controllers\AdminController;
use Controllers\LoginController;
use Controllers\PagesController;
use Controllers\ConfiguratorController;

$router = new Router();
//Main Pages
$router->get('/', [PagesController::class, 'index']);
$router->post('/', [PagesController::class, 'index']);
$router->get('/contacto', [PagesController::class, 'contacto']);
$router->post('/contacto', [PagesController::class, 'contacto']);

//Shop
$router->get('/shop', [ShopController::class, 'shop']);
$router->post('/shop', [ShopController::class, 'shop']);
$router->get('/configurator', [ConfiguratorController::class, 'index']);
$router->post('/configurator', [ConfiguratorController::class, 'index']);

//admin
$router->get('/login', [LoginController::class, 'index']);
$router->post('/login', [LoginController::class, 'index']);
$router->get('/dashboard', [AdminController::class, 'dashboard']);
$router->post('/dashboard', [AdminController::class, 'dashboard']);
$router->get('/newacc', [LoginController::class, 'newacc']);
$router->post('/newacc', [LoginController::class, 'newacc']);


$router->cr();