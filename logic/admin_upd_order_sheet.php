<?php
session_start();
include "db.php";

$order_list = getOrderList($mysqli);
$_SESSION['order_list'] = $order_list;



header('Location: /view/admin_order_sheet.php');

?>
