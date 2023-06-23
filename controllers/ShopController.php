<?php
namespace Controllers;

use MVC\Router;
use Model\Items;

class ShopController {
    public static function shop(Router $router){
        $items = Items::all();


        $router->render('shop/index', [
            'items' => $items
        ]);
    }
}