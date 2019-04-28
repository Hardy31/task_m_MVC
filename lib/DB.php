<?php

namespace lib;
use PDO;

class DB
{

    public function __construct()
    {
        $db_config =  require 'config/db.php';
        var_dump($db_config);
        $pdo = new PDO ('mysql:host='.$db_config['dbhost'].';dbname='.$db_config['dbname'].';charset=utf8', $db_config['dbuser'],$db_config['dbpassword']);
        
        var_dump ($pdo);
    }




    /*
        public static function  connect () {
           $db_config =  require 'config/db.php';
           var_dump($db_config);

            echo $db_config['dbhost'].'<db>';
            echo $db_config['dbname'].'<db>';
            echo $db_config['dbuser'].'<db>';
            echo $db_config['dbpassword'].'<db>';





            $c = 'mysql:host='.$db_config['dbhost'].';dbname='.$db_config['dbname'].';charset=utf8, '.$db_config['dbuser'].', '.$db_config['dbpassword'];
            echo $c;

            $pdo = new PDO ('mysql:host='.$db_config['dbhost'].';dbname='.$db_config['dbname'].';charset=utf8', $db_config['dbuser'],$db_config['dbpassword']);
            echo $pdo;
            var_dump ($pdo);

                             //mysql:host=localhost;dbname=task_manager;charset=utf8

    /*
            echo '<br>';
            echo 'Загрузился class DB.php';
            echo '<br>';
            var_dump ($pdo);

    */
        //return $pdo;





















}


