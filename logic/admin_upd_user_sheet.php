<?php
session_start();
include "db.php";

if($_POST['action'] == "Сохранить"){
    $order_id = $_POST['order_id'];
    $creator_id = $_POST['creator'];
    $order_time = $_POST['order_time'];
    $location = $_POST['location'];
    $type = $_POST['type'];

    updUser($mysqli, $order_id, $creator_id, $order_time, $location, $type);

}
else
    if($_POST['action'] == "Удалить"){
        $order_id = $_POST['order_id'];

        delUser($mysqli, $order_id);

    }


$user_list = getUserList($mysqli);
$_SESSION['user_list'] = $user_list;

header('Location: /view/admin_user_sheet.php');

?>