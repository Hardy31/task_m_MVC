<?php



/*
ini_set('display_errors', 1);
error_reporting(E_ALL);
*/

namespace core;
use core\View;

//echo ROOTS;
//define('ROOTS', dirname(__FILE__));
//include __DIR__.'/core/Router.php';
//require (ROOTS.'/core/Router.php');
require (ROOTS.'/config/routes.php');

class Router
{

    protected $routes = [];
    protected $params = [];

    public function __construct(){
        //echo '<br>';
        //echo 'Загрузился class Router.php';
       // echo '<br>';
        //echo ROOTS.'/config/routes.php';
        //echo '<br>';
        $routesPath =  ROOTS.'/config/routes.php';
        //echo '<br>';
        //echo $routesPath;
        $routesPath = require $routesPath;
        //print_r ($routesPath) ;
        //var_dump ($routesPath) ;
        foreach ($routesPath as $key => $value) {
            $this->add($key, $value);
        }

        //$this->routes = include ($routesPath);
        var_dump($this->params);

    }

    public function add($route, $params) {
        //var_dump($route) ;
        $route = '#^'.$route.'$#';
        $this->routes[$route] = $params;
        //var_dump($this->routes[$route]) ;
    }
    public function match() {
        $url = trim($_SERVER['REQUEST_URI'], '/');
         foreach ($this->routes as $route =>$params) {
             if (preg_match($route, $url, $matches)) {
                 $this->params = $params;
                 return true;
             }

         }
         return false;
    }

    public function run() {
       // echo 'start Router->run';
        //print_r($this->routes);
        //echo 'Class Routes, metod run';
        $this->match();
        //echo 'controllrt:   -  ';
        //echo $this->params['controller'];
        //echo '<br>'.'<br>';
        //echo 'action:   -  '.$this->params['action'].'<br>'.'<br>';


        if ($this->match()) {

            //echo $this->match().'<br>'.'<br>';

            $patch = '\controllers\\'.ucfirst($this->params['controller']).'Controller';
            echo 'Присваиваем  $patch =';
            echo $patch.'<br>'.'<br>';

            echo 'Совподение найдено'.'<br>';
            // проверка на наличие класса и метода
            if (class_exists($patch)) {

                //echo class_exists($patch).'<br>'.'<br>';

                $action = $this->params['action'].'Action';
                echo $action.'<br>'.'<br>'.'<br>'.'<br>';
                if (method_exists($patch, $action)) {
                    //Класс и метод найден!                    ;
                    $controller = new $patch($this->params);
                    $controller->$action();

                }else{
                    //echo method_exists($patch, $action).'<br>'.'<br>';
                    View::errorCode(404);
                    //echo 'не найден метод:'.$action;
                }
            }else {
                //print_r (class_exists($patch));
                //echo '<br>';
                echo 'не найден контроллер: '.$patch;
            }

        }else{

            View::errorCode(404);
            //echo 'Маршрут не найден';
        }

    }
}












































?>

