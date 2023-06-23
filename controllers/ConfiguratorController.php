<?php
namespace Controllers;

use MVC\Router;
use Model\Items;

class ConfiguratorController {
    public static function index(Router $router){
        $itemsByCategory = [];
        $items = Items::all();
        foreach($items as $item){
            $category = $item->category;
            if(!isset($itemsByCategory[$category])){
                $itemsByCategory[$category] = [];
            }
            $itemsByCategory[$category][] = $item;
        }

        $router->render('shop/configurator', [
            'itemsByCategory' => $itemsByCategory
        ]);
    }
}