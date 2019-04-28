<?php

namespace controllers;
use core\View;

abstract class Controller {

    public $route;
    public $view;

    public function __construct($route) {

        echo 'Конструктор абстрактного класса Контролллер';
        var_dump ($route);
        $this->view = new View ($route);

       var_dump($this->view );
    }



}


?>