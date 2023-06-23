<?php
namespace MVC;

class Router {
    public $routesGET = [];
    public $routesPOST = [];

    public function get($url, $fn){
        $this->routesGET[$url] = $fn;
    }
    public function post($url, $fn){
        $this->routesPOST[$url] = $fn;
    }

    public function cr(){
        session_start();
        $auth = $_SESSION['login'] ?? null;
        $admin = isset($_SESSION['role']) && $_SESSION['role'] == 'admin' ? true : false;

        $protectedRoutes = [];

        $actualUrl = $_SERVER['REQUEST_URI'] === '' ? '/' : $_SERVER['REQUEST_URI'];
        $method = $_SERVER['REQUEST_METHOD'];

        if($method === 'GET'){
            $actualUrl = explode('?', $actualUrl)[0];
            $fn = $this->routesGET[$actualUrl] ?? null;
        }else{
            $actualUrl = explode('?', $actualUrl)[0];
            $fn = $this->routesPOST[$actualUrl] ?? null;
        }

        if(in_array($actualUrl, $protectedRoutes) && !$auth){
            header('Location: /');
        }
        if($fn){
            call_user_func($fn, $this);
        }else{
            echo 'Pagina no encontrada';
        }
    }

    public function render($view, $data = []){
        foreach ($data as $key => $value){
            $$key = $value;
        }
        ob_start();
        include __DIR__ . "/views/$view.php";
        $content = ob_get_clean();
        include __DIR__ . "/views/layout.php";
    }

}