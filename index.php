<?php
use Models\User;
use Models\Model; // Подключил Класс Model для создания обьекта $test

echo '<pre>';


spl_autoload_register();
/*
 * Проверка работы SQL запроса.
 * Формирую массив данных для проверки
 */
$test = new Model();
$data = array(
    'id' => '3',
    'name' => 'Orange',
    'roles' => '5',
    );
$test->insert($data);

//require './router.php';

/*
$user = new User();


$id = 2;
$userData = $user->getById($id);

$userData['name'] = 'Igor';

$user->update($userData);


var_dump($user);
*/
