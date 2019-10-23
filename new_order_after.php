<?php
session_start();
if (isset($_POST["done"])) {

    if($_POST["date"] == ""){
        echo "Введите корректную дату!";
    }
    else if ($_POST["time"] = ""){
        echo "Введите корректное время!";
    }

    else{
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

        $mysql = new mysqli('localhost','root', '1111', 'photoroom');
        $mysql->query("INSERT INTO `price_list` (`id_price`, `type`, `location`, `creator_id`, `date`, `time`, `status`, `user_id`, `order_time`) VALUES (NULL ,'$type', '$location', '$creator_id', '$date', '$time', 0, '$user_id', now())");
        $mysql->close();


        $result_string = $_COOKIE["user"]. ", Ваша заявка отправленна и будет рассмотрена<br>в ближайшее время";
    }

}

?>

<?php
session_start();
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Фотомастерская JoiL</title>
    <link href="bootstrap/css/theme.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
    <link href='assets/css/googleapis.css' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="assets/css/cdnjs_2.7.css">
    <link rel="stylesheet" href="assets/css/maxcdn.css">

    <link rel="stylesheet" href="assets/css/pushy.css">
    <link rel="stylesheet" href="assets/css/masonry.css">
    <link rel="stylesheet" href="assets/css/animate.css">
    <link rel="stylesheet" href="assets/css/magnific-popup.css">

    <script src="assets/js/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>

    <script src="assets/js/ie10-viewport-bug-workaround.js"></script>
    <script src="assets/js/masonry.js"></script>
    <script src="assets/js/pushy.min.js"></script>
    <script src="assets/js/jquery.magnific-popup.min.js"></script>
    <script src="assets/js/wow.min.js"></script>
    <script src="assets/js/scripts.js"></script>
</head>

<body class="">

<div class="site-overlay"></div>

<header id="home">
    <div class="container-fluid-dop">

        <div class="container">
            <div class="row">
                <div class="col-md-2 col-xs-12">
                    <a href="index.php" class="thumbnail logo">
                        <img src="images/logo.png" alt="" class="img-responsive">
                    </a>
                </div>
            </div>
            <div style="text-align: center">
                <h1 style="color: whitesmoke"><small style="color: whitesmoke">Главная фотостудия Волгограда</small><br>
                    <strong>JoiL</strong></h1>
            </div>
        </div>
    </div>
</header>

<section id="feat">
    <div class="container">
        <div class="row features">
            <div class="col-md-12 text-center wow fadeInUp" data-wow-delay="500ms">
                <br>
                <span class="typcn typcn-camera-outline x3"></span>
                <h4><?php echo $result_string; ?></h4>
                <br>
                <h5> <a href="/index.php" style="color: red">На главную</a> </h5>
            </div>
        </div>
    </div>
</section>


<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h3>Фотомастерская JoiL</h3>
                <p>© 2019 Создано <a target="_blank" href="#">JoiL</a></p>
            </div>
            <div class="col-md-4">

            </div>
        </div>
    </div>
</footer>

</body>
</html>

