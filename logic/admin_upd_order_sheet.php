<?php
session_start();
include "db.php";
if($_SESSION['user_id'] == 1){

    if($_POST['action'] == "Сохранить"){
        $order_id = $_POST['order_id'];
        $user_id = $_POST['user_id'];
        $creator_id = $_POST['creator'];
        $order_time = $_POST['order_time'];
        $location = $_POST['location'];
        $type = $_POST['type'];

        updOrder($mysqli, $order_id, $creator_id, $order_time, $location, $type, $user_id);

    }
    else
    if($_POST['action'] == "Удалить"){
        $order_id = $_POST['order_id'];

        delOrder($mysqli, $order_id);

    }


    $order_list = getOrderList($mysqli);
    $_SESSION['order_list'] = $order_list;

    $creators = getCreatorList($mysqli);
    $categories = getCategoryList($mysqli);
    $_SESSION['categories'] = $categories;
    $_SESSION['creators'] = $creators;


    if($_GET){

        setcookie("category", $_GET['category'], time()+3600);
        $_SESSION['filter_category'] = $_GET['category'];
        $_SESSION['filter_city'] = $_GET['city'];
        $_SESSION['filter_location'] = $_GET['location'];
        $_SESSION['filter_creator'] = $_GET['creator'];

        $order_list = getOrderListFilter($mysqli, $_GET['category'], $_GET['city'], $_GET['location'], $_GET['creator']);
        $_SESSION['order_list'] = $order_list;


        header('Location: /view/admin_order_sheet.php');
    }
    else{
        header('Location: /view/admin_order_sheet.php');
    }

}
else header('Location: /index.php');
?>
