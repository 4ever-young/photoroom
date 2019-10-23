<?php
    $name = filter_var(trim($_POST['name']),
        FILTER_SANITIZE_STRING);
    $phone = filter_var(trim($_POST['phone']),
        FILTER_SANITIZE_STRING);
    $password = filter_var(trim($_POST['password']),
        FILTER_SANITIZE_STRING);

    $password = md5($password."qwe175xzc");
    $mysql = new mysqli('localhost','root', '1111', 'photoroom');


    $mysql->query("INSERT INTO `user` (`name`, `pas`, `phone`) VALUES ('$name', '$password','$phone')");

    setcookie('user', $name, time()+3600, "/");
    $mysql->close();


    exit();

?>