<?php
require_once 'get_current_user.php';

session_start();

if (getCurrentUser() === false){
    header('Location: login.php');
    exit;
}

if (isset($_POST['birthday']) && !empty($_POST['birthday'])){
    $_SESSION['birthday'] = $_POST['birthday'];
}

header('Location: index.php');
