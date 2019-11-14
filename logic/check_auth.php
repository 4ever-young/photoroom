<?php

include "db.php";

if($_POST['action_button'] == 'auth'){

    $phone = filter_var(trim($_POST['phone']),
        FILTER_SANITIZE_STRING);
    $password = filter_var(trim($_POST['password']),
        FILTER_SANITIZE_STRING);

    session_start();
    setcookie('phone', $phone, time()+3600, "/");

    $password = md5($password."qwe175xzc");

    $res = $mysqli->query("SELECT id, name, pas FROM `user` where `phone` = '$phone' ");
    $user = $res->fetch_assoc();

    if ($user['pas'] == $password){

        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_name'] = $user['name'];

        setcookie('user', $user['name'], time()+3600, "/");

        header('Location: /');
    }
    else {
        if ($user){
            header('Location: /view/auth.php?err=1');
        } else {
            header('Location: /view/auth.php?err=2');
        }
    }
}

if ($_POST['action_button'] == 'reg'){

    $name = filter_var(trim($_POST['name']),
        FILTER_SANITIZE_STRING);
    $phone = filter_var(trim($_POST['phone']),
        FILTER_SANITIZE_STRING);
    $password = filter_var(trim($_POST['password']),
        FILTER_SANITIZE_STRING);

    $password = md5($password."qwe175xzc");

    setcookie('name', $name, time()+3600, "/");
    setcookie('phone', $phone, time()+3600, "/");


    $res = $mysqli->query("SELECT phone FROM `user` WHERE phone = '$phone'");
    $check = $res->fetch_assoc();

    if(!$check){
        session_start();

        $mysqli->query("INSERT INTO `user` (`name`, `pas`, `phone`) VALUES ('$name', '$password','$phone')");

        $res = $mysqli->query("SELECT id, name, pas FROM `user` where `phone` = '$phone' ");
        $user = $res->fetch_assoc();

        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_name'] = $user['name'];

        setcookie('user', $name, time()+3600, "/");

        header('Location: /');
    }
    else {
        header('Location: /view/auth.php?err=3');
    }

}

?>