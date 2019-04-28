<?php
class QueryBuilder {
    protected $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    function select ($tabl, $key, $value)
    {


        echo $tabl;
        echo '<br>';
        echo $key;
        echo '<br>';
        echo $value;
        echo '<br>';
        $condition = $key.' = \''.$value.'\'';
        echo $condition;


        $request = "SELECT * FROM {$tabl} WHERE {$condition}";   //подготовили запрос
        echo $request;
        $statement = $this->pdo->prepare($request);
        $statement->execute();
        $arrs = $statement->fetchAll(PDO::FETCH_ASSOC);

        //var_dump($arrs);

        return $arrs;
    }




    function create ($tabl, $data)
    {


        // подготовка плейсходлера
        $key_data = array_keys($data);
        //var_dump($key_data);
        $key_name = implode(', ',$key_data);
        //var_dump($key_name);
        $key_value = ':'.implode(', :',$key_data);
        //var_dump($key_value);

        $request = "INSERT INTO {$tabl} ( {$key_name}) VALUES ({$key_value})";
        //echo $request;
        $sth = $this->pdo->prepare($request);
        $sth->execute($data);
        //var_dump($sth);
    }


//функция поиска в БД
    function select_condit ($tabl, $key, $value)
    {


        echo $tabl;
        echo '<br>';
        echo $key;
        echo '<br>';
        echo $value;
        echo '<br>';
        $condition = $key.' = \''.$value.'\'';
        echo $condition;


        $request = "SELECT * FROM {$tabl} WHERE {$condition}";   //подготовили запрос
        echo $request;
        $statement = $this->pdo->prepare($request);
        $statement->execute();
        $arrs = $statement->fetchAll(PDO::FETCH_ASSOC);

        //var_dump($arrs);

        return $arrs;
    }

//функция удаления из  БД
    function delete ($tabl, $key, $value)
    {


        $condition = $key.' = \''.$value.'\'';
        // echo $condition;
        $request = "DELETE FROM {$tabl} WHERE {$condition}";   //подготовили запрос
        //echo $request;
        $statement = $this->pdo->prepare($request);
        $statement->execute();


    }


//функция функция изменения  в БД
//$data - массив содержащий все поля таблици
//$key - массив содержащий один элемент

    function update ($tabl, $data, $key)
    {


        $glues ='';

        foreach ($data as  $key_data => $value_data){   //формирую запрос
            $glue = $key_data.'=:'.$key_data;
            $glues = $glues.", ".$glue;
            //echo $glues;
            //echo '<br>';

        }

        $glues = substr($glues,2);              //Удаляю первые два символа


        //echo $glues;
        //echo '<br>';
        $request = "UPDATE {$tabl} SET {$glues} WHERE {$key}";   //подготовили запрос
        //echo $request;
        $statement = $this->pdo->prepare($request);
        $statement->execute($data);
        //var_dump($statement);

    }

//функция поиска в таблице users по id имя пользователя
    function search_by_id_name ($value)
    {

        $sql = 'mysql:host=localhost;dbname=task_manager;charset=utf8';
        $access_root = 'root';
        $pw_root = '9959095';
        $tabl = 'users';
        $key = 'id_user';

        $pdo = new PDO($sql, $access_root, $pw_root);       //подключение к БД
//var_dump($pdo);



        $condition = $key.' = \''.$value.'\'';
        //echo $condition;


        $request = "SELECT * FROM {$tabl} WHERE {$condition}";   //подготовили запрос
        //echo $request;
        $statement = $this->pdo->prepare($request);
        $statement->execute();
        $arrs = $statement->fetchAll(PDO::FETCH_ASSOC);

        //var_dump($arrs);

        return $arrs[0]['name'];
    }
}