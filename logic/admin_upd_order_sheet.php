<?php
session_start();
include "db.php";

if($_POST['action'] == "Сохранить"){
    $order_id = $_POST['order_id'];
    $creator_id = $_POST['creator'];
    $order_time = $_POST['order_time'];
    $location = $_POST['location'];
    $type = $_POST['type'];

    updOrder($mysqli, $order_id, $creator_id, $order_time, $location, $type);

}
else
if($_POST['action'] == "Удалить"){
    $order_id = $_POST['order_id'];

    delOrder($mysqli, $order_id);

}

$order_list = getOrderList($mysqli);
$_SESSION['order_list'] = $order_list;
$creators = getCreatorCreatorId($mysqli);
$_SESSION['creators'] = $creators;

header('Location: /view/admin_order_sheet.php');

?>
