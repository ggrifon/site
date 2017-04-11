<?php
use Models\User;

echo '<pre>';

spl_autoload_register();

//require './router.php';


$user = new User();


$id = 2;
$userData = $user->getById($id);

$userData['name'] = 'Igor';

$user->update($userData);



var_dump($user);













