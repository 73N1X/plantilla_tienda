<?php
namespace Controllers;

use MVC\Router;
use Model\Items;

class PagesController {
    public static function index(Router $router) {
        $items = Items::all();

        $router->render('mainpage/index', [
            'items' => $items
        ]);
    }

    public static function contacto(Router $router) {


        $router->render('mainpage/contacto', [
            
        ]);
    }

    public static function offers(Router $router) {
        $items = Items::all();

        $router->render('mainpage/offers', [
            'items' => $items
        ]);
    }
}