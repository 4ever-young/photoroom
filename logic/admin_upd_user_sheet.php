<?php
session_start();
include "db.php";
if($_SESSION['user_id'] == 1) {

    if ($_POST['action'] == "Сохранить") {
        $user_id = $_POST['user_id'];
        $name = $_POST['name'];
        $phone = $_POST['phone'];

        updUser($mysqli, $user_id, $name, $phone);

    } else
        if ($_POST['action'] == "Удалить") {
            $order_id = $_POST['user_id'];

            delUser($mysqli, $order_id);

        }


    $user_list = getUserList($mysqli);
    $_SESSION['user_list'] = $user_list;

    header('Location: /view/admin_user_sheet.php');
}
else header('Location: /index.php');
?>