<?php
session_start();
include "db.php";

$user_list = getUserList($mysqli);
$_SESSION['user_list'] = $user_list;

header('Location: /view/admin_user_sheet.php');

?>