<?php

$host = "localhost";
$user = "root";
$passwd = "1111";
$dbname = "photoroom";

$mysqli = new mysqli($host,$user, $passwd, $dbname);

$code_for_md5 = "qwe175xzc";

function getCreatorList($mysqli){
    $sql = "SELECT id, name FROM `creator`";
    $result = $mysqli->query($sql);
    $creator_list = $result->fetch_all();

    return $creator_list;
}

function getCategoryList($mysqli){
    $sql = "SELECT id, name FROM `category`";
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
    $sql = "SELECT id_price, user.name, creator.name, order_time, location, user.id, creator.id, category.name, creator.city
            FROM `price_list` 
            JOIN user on user.id = user_id
            JOIN creator on creator.id = creator_id
            JOIN category on price_list.type = category.id
            WHERE price_list.flag_del = 0;";
    $result = $mysqli->query($sql);

    $order_list = $result->fetch_all();

    return $order_list;
};

function getOrderListFilter($mysqli, $category, $city, $location, $creator){
    $sql = "SELECT id_price, user.name, creator.name, order_time, location, user.id, creator.id, category.name, creator.city
            FROM `price_list` 
            JOIN user on user.id = user_id
            JOIN creator on creator.id = creator_id
            JOIN category on price_list.type = category.id
            WHERE price_list.flag_del = 0 ";

    if($category != "") $sql .= " AND category.id = '".$category."'";
    if($city != "")     $sql .= " AND creator.city = '".$city."'";
    if($location != "") $sql .= " AND price_list.location = '".$location."'";
    if($creator != "")  $sql .= " AND creator.id = '".$creator."'";

    $result = $mysqli->query($sql);

    $order_list = $result->fetch_all();

    return $order_list;
};


function getOrder($mysqli, $order_id){
    $sql = "SELECT id_price, user.name, creator.name, order_time, location, user.id, creator.id, category.name, creator.city
            FROM `price_list` 
            JOIN user on user.id = user_id
            JOIN creator on creator.id = creator_id
            JOIN category on price_list.type = category.id
            WHERE price_list.flag_del = 0 
            AND id_price = ".$order_id;
    $result = $mysqli->query($sql);

    $order_list = $result->fetch_all();

    return $order_list;
};


function updOrder($mysqli, $order_id, $creator_id, $order_time, $location, $type, $user_id){

    $sql_check = "SELECT * FROM price_list WHERE id_price  = '$order_id' and flag_del = 0";
    $request = $mysqli->query($sql_check);
    $result_order = $request->fetch_assoc();
    $sql_check = "SELECT * FROM user WHERE id = '$user_id' and flag_del = 0";
    $request = $mysqli->query($sql_check);
    $result_user = $request->fetch_assoc();
    if (isset($result_order['id_price']) and isset($result_user['id'])) {
        $sql = "UPDATE price_list 
            SET creator_id = '$creator_id',
            order_time = '$order_time',
            location = '$location',
            type = '$type'
             
            WHERE id_price = '$order_id'";
        $request = $mysqli->query($sql);
    }

    return 1;
};

function delOrder($mysqli, $order_id){
    $sql = "UPDATE price_list SET flag_del = 1 WHERE id_price = '$order_id';";
    $request = $mysqli->query($sql);

    return 1;
};

function updUser($mysqli, $user_id, $name, $phone){

    $sql_check = "SELECT * FROM user WHERE id = '$user_id' and flag_del = 0";
    $request = $mysqli->query($sql_check);
    $result = $request->fetch_all();
    if (isset($result['id'])){
        $sql = "UPDATE user 
            SET name = '$name',
            phone    = '$phone'
             
            WHERE id = '$user_id'";
        $request = $mysqli->query($sql);
    }

    return 1;
};

function delUser($mysqli, $user_id){
    $sql = "SELECT avatar FROM user WHERE id = '$user_id';";
    $request = $mysqli->query($sql);
    $avatar = $request->fetch_All();
    unlink('../images/user_avatars/'.$avatar[0][0].".jpg");

    $sql = "UPDATE user SET flag_del = 1 WHERE id = '$user_id';";
    $request = $mysqli->query($sql);
    $sql = "UPDATE price_list SET flag_del = 1 WHERE user_id = '$user_id';";
    $request = $mysqli->query($sql);


    return 1;
};

?>