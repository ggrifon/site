<?php

namespace Controllers;

use Models\Role;
use Models\User;

class UserController
{
    /**
     * Страница пользователя
     *
     * @param $id
     * @return string
     */
    public function getById($id)
    {
        $user = (new User())->getById($id);
        return \View::render('users/show', compact('user'));
    }

}