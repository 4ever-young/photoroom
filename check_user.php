<?php
    $phone = filter_var(trim($_POST['phone']),
        FILTER_SANITIZE_STRING);
    $password = filter_var(trim($_POST['password']),
        FILTER_SANITIZE_STRING);

    $password = md5($password."qwe175xzc");

    $mysql = new mysqli('localhost','root', '1111', 'photoroom');

    $res = $mysql->query("SELECT name, pas FROM `user` where `phone` = '$phone' ");
    $user = $res->fetch_assoc();

    if ($user['pas']==$password){
        setcookie('user', $user['name'], time()+3600, "/");
        //header('Location: /registration.php');
    }
    else {
        if ($user){
            echo "Проверьте правльность пароля";
        } else {
            echo "Аккаунт не зарегистрирован. Перейти к регистрации?";
        }
        exit();
    }

?>