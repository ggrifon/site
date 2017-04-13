<?php
use Models\User;
use Models\Model; // Подключил Класс Model для создания обьекта $test

echo '<pre>';


spl_autoload_register();
/*
 * Проверка работы SQL запроса.
 * Формирую массив данных для проверки
 */

$nedata = array(
    'name' => 'Orange',
    'roles' => '5',
);
$test = new User();
$test->insert($nedata);

//require './router.php';

/*
$user = new User();


$id = 2;
$userData = $user->getById($id);

$userData['name'] = 'Igor';

$user->update($userData);


var_dump($user);
*/
