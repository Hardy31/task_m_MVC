<?php

//FRONT CONTROLLER

//1, общие настройки
//1,1 отображение ошибок

ini_set('display_errors', 1);
error_reporting(E_ALL);
define('ROOTS', dirname(__FILE__));

//2, подключение файлов системы
/*
 define('ROOT', dirname(__FILE__));
require_once(ROOT.'/core/Router.php');
 */
use  core\Router;
//use  database\DB;

//автоподгрузка загрузка
spl_autoload_register(function($class){
    //echo '<br>'. $class.'<br>';
    $path = str_replace('\\','/',$class.'.php');
   // echo '<br>'. $path.'<br>';
    if (file_exists($path)) {               //если существует файл с именем $path, то он загружается
        require $path;
    }
});








//include __DIR__.'/../function.php';
//include __DIR__.'/function.php';    // файл в этой же папке

//echo 'index php TM';
//var_dump($_SERVER['REQUEST_URI']);

//var_dump($_SERVER['SCRIPT_NAME']);


//include __DIR__.'/core/Router.php';
//echo __DIR__.'/core/Router.php';
$rut = new Router();
$rut->run();
//$datb = new database\DB();




//include 'index.view.php';
?>

