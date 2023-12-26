<?php
require_once "exists_user.php";

function getCurrentUser(){
    if (PHP_SESSION_ACTIVE == session_status()){
        if (isset($_SESSION['username'])){ //Проверяем, есть ли элемент 'username' в массиве сессии
            if (existsUser($_SESSION['username'])){ //Проверяем существует ли пользователь с заданным логином
                return $_SESSION['username'];
            }
        }
    }
    return false;
}

