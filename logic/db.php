<?php

$host = "localhost";
$user = "root";
$passwd = "1111";
$dbname = "photoroom";

$mysqli = new mysqli($host,$user, $passwd, $dbname);

$code_for_md5 = "qwe175xzc";

function getCreatorCreatorId($mysqli){
    $sql = "SELECT id, name FROM `creator`";
    $result = $mysqli->query($sql);
    $creator_list = $result->fetch_all();

    return $creator_list;
}

function getUserList($mysqli){
    $sql = "SELECT id, name, phone FROM `user` WHERE id > 1 AND user.flag_del = 0;";
    $result = $mysqli->query($sql);
    $user_list = $result->fetch_all();

    return $user_list;
};

function getOrderList($mysqli){
    $sql = "SELECT id_price, user.name, creator.name, order_time, location, user.id, creator.id, price_list.type
            FROM `price_list` 
            JOIN user on user.id = user_id
            JOIN creator on creator.id = creator_id
            WHERE price_list.flag_del = 0;";
    $result = $mysqli->query($sql);

    $order_list = $result->fetch_all();

    return $order_list;
};


function updOrder($mysqli, $order_id, $creator_id, $order_time, $location, $type){
    $sql = "UPDATE price_list 
            SET creator_id = '$creator_id',
            order_time = '$order_time',
            location = '$location',
            type = '$type'
             
            WHERE id_price = '$order_id'";
    $request = $mysqli->query($sql);

    return 1;
};

function delOrder($mysqli, $order_id){
    $sql = "UPDATE price_list SET flag_del = 1 WHERE id_price = '$order_id';";
    $request = $mysqli->query($sql);

    return 1;
};

function updUser($mysqli, $user_id, $name, $phone){
    $sql = "UPDATE user 
            SET name = '$name',
            phone    = '$phone'
             
            WHERE id = '$user_id'";
    $request = $mysqli->query($sql);

    return 1;
};

function delUser($mysqli, $user_id){
    $sql = "UPDATE user SET flag_del = 1 WHERE id = '$user_id';";
    $request = $mysqli->query($sql);
    $sql = "UPDATE price_list SET flag_del = 1 WHERE user_id = '$user_id';";
    $request = $mysqli->query($sql);

    return 1;
};

?>