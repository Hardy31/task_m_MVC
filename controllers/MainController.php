<?php

namespace controllers;
use lib\DB;
//use tm\core\Controller;

class MainController extends Controller {

    public function indexAction() {
        echo 'строка 10 МайнКонфиг';
        $db = new DB;

        echo 'строка 13 МайнКонфиг';
        $title = 'ТИТЛ - AccountControllet';

        $vars = [

            'name' => 'Вася',
            'age' => 88,
            //'array' => [1,2,3,],

        ];

        echo 'страница main';
        $this->view->render($title = '', $vars=[]);
    }



}


?>