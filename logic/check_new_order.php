<?php

if (isset($_POST["done"])) {

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

    $mysqli->query("INSERT INTO `price_list` (`id_price`, `type`, `location`, `creator_id`, `date`, `time`, `status`, `user_id`, `order_time`) VALUES (NULL ,'$type', '$location', '$creator_id', '$date', '$time', 0, '$user_id', now())");
    $mysqli->close();

    header('Location: tmp/new_order_after.html');


}

?>
