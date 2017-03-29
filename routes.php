<?php


return array(
    '/users' => 'UserController/all',
    '/user/:num' => 'UserController/getById/1',
    '/register' => 'RegisterController/index',
    '/register/user' => 'RegisterController/user',
    '/register/company' => 'RegisterController/company',
    '/auth' => 'AuthController/index',
    '/' => 'HomeController/index',
);