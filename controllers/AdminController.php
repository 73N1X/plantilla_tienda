<?php
namespace Controllers;

use MVC\Router;
use Model\Users;

class AdminController {
    public static function dashboard(Router $router){

        $router->render('admin/dashboard', [
            
        ]);
    }
}