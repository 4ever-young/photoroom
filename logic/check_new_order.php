<?php

if (isset($_POST["done"])) {

    session_start();
    include "../logic/db.php";

    $time = filter_var(trim($_POST['time']),
        FILTER_SANITIZE_STRING);
    $time = date('H:i:s');
    //$time = time($time);
    $date = filter_var(trim($_POST['date']),
        FILTER_SANITIZE_STRING);
    $type = filter_var(trim($_POST['type']),
        FILTER_SANITIZE_STRING);
    $location = filter_var(trim($_POST['location']),
        FILTER_SANITIZE_STRING);
    $creator_id = filter_var(trim($_POST['creator_id']),
        FILTER_SANITIZE_STRING);
    $user_id = $_SESSION['user_id'];

    $sql = "INSERT INTO `price_list` 
            (`id_price`, `user_id`, `creator_id`, `order_time`, `status`, `type`, `location`, `date`, `time`, `flag_del`)
            VALUES 
            (NULL, '$user_id', '$creator_id', now(), 0,'$type', '$location', '$date', '$time', 0)";


    $mysqli->query($sql);
    $mysqli->close();


    require_once('../tmp/header.html');
    require_once ('../tmp/new_order_after.html');
    require_once ('../tmp/footer.html');


}

else header('Location: /');

?>
