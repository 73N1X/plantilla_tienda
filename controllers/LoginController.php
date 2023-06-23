<?php
namespace Controllers;

use MVC\Router;
use Model\Users;

class LoginController {
    public static function index(Router $router){
        $alerts = [];
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $auth = new Users($_POST);
            $alerts = $auth->validateLogin();
            if(empty($alerts)){
                $user = Users::where('mail', $auth->mail);
                if($user) {
                    if($user->valPassAndVerf($auth->password)){
                        session_start();
                        $_SESSION['id'] = $user->id;
                        $_SESSION['mail'] = $user->mail;
                        $_SESSION['role'] = $user->role;
                        if($_SESSION['role'] == 'admin') {
                            header('Loaction: /dashboard');
                        }else{
                            header('Location: /');
                        }
                    }
                }
            }
        }
        $router->render('admin/index', [
            'alerts' => $alerts
        ]);
    }

    public static function newacc(Router $router) {
        $user = new Users();
        $alerts = [];
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $user->sinc($_POST);
            $alerts = $user->validateNewAcc();
            if(empty($alerts)){
                $result = $user->userExist();
                if($result->num_rows) {
                    $alerts = Users::getAlerts();
                }else{
                    $user->hashPass();
                    $user->verified = '1';
                    $user->role = 'admin';
                    $user->save();
                }
            }
        }

        $router->render('admin/newacc', [

        ]);
    }
}