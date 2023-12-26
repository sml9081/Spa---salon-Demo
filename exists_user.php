<?php
require_once "get_user_list.php";

function existsUser($login){
    if (in_array( $login, array_column(getUsersList(), 'login'))){
        return true;
    }
    else{
        return false;
    }
}

