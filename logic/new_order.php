<?php

include "../logic/db.php";
session_start();

if(isset($_SESSION['user_name'])) {
    header('Location: /../view/order_with_auth.php');
}
else {
    header('Location: /../view/order_not_auth.php');
}

?>