<?php

$host = "localhost";
$user = "root";
$passwd = "1111";
$dbname = "photoroom";

$mysqli = new mysqli($host,$user, $passwd, $dbname);

$code_for_md5 = "qwe175xzc";



function getUserList($mysqli){
    $sql = "SELECT id, name, phone FROM `user` WHERE id > 1 AND user.flag_del = 0;";
    $result = $mysqli->query($sql);
    $user_list = $result->fetch_all();

    return $user_list;
};

function getOrderList($mysqli){
    $sql = "SELECT id_price, user.name, creator.name, order_time, location, user.id, creator.id 
            FROM `price_list` 
            JOIN user on user.id = user_id
            JOIN creator on creator.id = creator_id
            WHERE price_list.flag_del = 0;";
    $result = $mysqli->query($sql);

    $order_list = $result->fetch_all();

    return $order_list;
};


?>