<?php

namespace core;

 class View {

    public $patch;
    public $route;
    public $layout = 'default';

    public function __construct($route) {
        $this->route = $route;
        $this->patch = $route['controller'].'/'.$route['action'];
        echo $this->patch;
        var_dump ($this->route);

    }

    public function render ($title, $vars = [])
    {
        extract($vars);
        echo $this->patch;
        echo $this->patch;
        if (file_exists('views/' . $this->patch . '.php')) {
            ob_start();
            require 'views/' . $this->patch . '.php';
            $content = ob_get_clean();
            require 'views/layouts/' . $this->layout . '.php';
        } else {
            echo 'вид не найден view-Action' . $this->path;
        }
    }

    public function redirect($url){
        header('location: '.$url);
        exit;
    }

    public static function errorCode($code){
            http_response_code($code);
            require 'views/errors/'.$code.'.php';
            exit;
        }

 }





?>