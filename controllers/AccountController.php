<?php

namespace controllers;
//use tm\core\Controller;

class AccountController extends Controller {


    public function loginAction() {

        echo 'страница входа (файл контроллерс/Акогте Контроллерс)';
        //функция подготовки данных для передачи в соответствующий вид
        $this->view->render('страница авторизации AccountControllet');
    }

    public function registerAction() {

        echo 'страница регистрации';
        $this->view->render('страница регистрации AccountControllet');
    }

}


?>
