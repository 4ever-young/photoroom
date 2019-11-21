<?php

include "db.php";

session_start();

if ( !isset($_SESSION['user_id']) )
    header('Location: /view/auth.php');

if ( isset($_SESSION['user_id']) )
    header('Location: /view/auth_success.php');

if($_POST['action_button'] == 'exit'){
    unset($_COOKIE['user']);
    setcookie('user', null, -1, '/');
    session_start();
    unset($_SESSION['user_id']);
    unset($_SESSION['user_name']);

    header('Location: /');
}





?>