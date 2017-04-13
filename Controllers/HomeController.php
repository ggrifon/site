<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 21.03.2017
 * Time: 19:10
 */

namespace Controllers;


use Models\User;

class HomeController
{
    public function index()
    {
        return \View::render('home');
    }
}