<?php

spl_autoload_register();

$output = require './router.php';

echo $output;

/*echo '<pre>';

$user = ['id' => 12312, 123123 => 123123];
$a = 'переменная а';
$b = 'переменная b';

$data = compact('user', 'b');

test($data);

function test($data)
{
    extract($data);

    var_dump($user, $b);
}*/















