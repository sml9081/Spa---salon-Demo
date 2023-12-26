<?php

function checkPassword($login, $password){
    if (true === existsUser($login)){ //проверка существует ли пользователь с таким логином
        $users = getUsersList();

        foreach ($users as $user){ //перебираем логин пользователей
            if ($login == $user['login']){
                if (password_verify($password, $user['password'])){ //если логин пользователя найден проверяем хэш пароля пользователя
                    return true;
                }
            }
        }
    }
    return false;
}

