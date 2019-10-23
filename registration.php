<?php
if($_POST['sent'] == 'out'){
    unset($_COOKIE['user']);
    setcookie('user', null, -1, '/');
    session_start();
    unset($_SESSION['user_id']);
}
else
if($_POST['sent'] == 'come'){
    $phone = filter_var(trim($_POST['phone']),
        FILTER_SANITIZE_STRING);
    $password = filter_var(trim($_POST['password']),
        FILTER_SANITIZE_STRING);

    $password = md5($password."qwe175xzc");

    $mysql = new mysqli('localhost','root', '1111', 'photoroom');

    $res = $mysql->query("SELECT id, name, pas FROM `user` where `phone` = '$phone' ");
    $user = $res->fetch_assoc();

    if ($user['pas']==$password){
        session_start();

        $_SESSION['user_id'] = $user['id'];

        setcookie('user', $user['name'], time()+3600, "/");

        header('Location: /');
    }
    else {
        if ($user){
            // echo "Проверьте правльность пароля";
            $err = 1;
        } else {
            //echo "Аккаунт не зарегистрирован. Перейти к регистрации?";
            $err = 2;
        }
    }
}
else if ($_POST['sent'] == 'reg'){

    $name = filter_var(trim($_POST['name']),
        FILTER_SANITIZE_STRING);
    $phone = filter_var(trim($_POST['phone']),
        FILTER_SANITIZE_STRING);
    $password = filter_var(trim($_POST['password']),
        FILTER_SANITIZE_STRING);

    $password = md5($password."qwe175xzc");
    $mysql = new mysqli('localhost','root', '1111', 'photoroom');

    $res = $mysql->query("SELECT phone FROM `user` WHERE phone = '$phone'");
    $check = $res->fetch_assoc();
    if(!$check){
        session_start();

        $mysql->query("INSERT INTO `user` (`name`, `pas`, `phone`) VALUES ('$name', '$password','$phone')");

        $res = $mysql->query("SELECT id, name, pas FROM `user` where `phone` = '$phone' ");
        $user = $res->fetch_assoc();

        $_SESSION['user_id'] = $user['id'];

        setcookie('user', $name, time()+3600, "/");

        header('Location: /');
        $mysql->close();
    }
    else {
        $err = 3;
        $mysql->close();
    }

}
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

<script>
    $(document).ready(function () {
        $('#registration_button').click(function (event) {
            var str = '<img src="images/ico/block-icon.png"> \n' +
                '                <h4>Авторизация</h4>\n' +
                '                <form name="form" action="" method="post">\n' +
                '\n' +
                '                    <div class="row">\n' +
                '                        <div class="form-group col-sm-12">\n' +
                '                            <label for="name" class="h4">Имя</label>\n' +
                '                            <input type="text" class="form-control" name="name" id="name" placeholder="Enter name" required>\n' +
                '                        </div>\n' +
                '                        <div class="form-group col-sm-12">\n' +
                '                            <label for="phone" class="h4">Телефон</label>\n' +
                '                            <input type="text" class="form-control" name="phone" id="phone" placeholder="+7 (---) (---) (-- --)" required>\n' +
                '                        </div>\n' +
                '                        <div class="form-group col-sm-12">\n' +
                '                            <label for="password" class="h4">Пароль</label>\n' +
                '                            <input type="password" class="form-control" name="password" id="pas" placeholder="Enter password" required>\n' +
                '                        </div>\n' +
                '                    </div>\n' +
                '                    <div class="row">\n' +
                '                        <div class="form-group col-sm-6">\n' +
                '                            <button type="submit" id="registration_button_use" class="btn btn-success btn-lg pull-center" name="sent" value="reg">Зарегистрироваться</button>\n' +
                '                        </div>\n' +
                '                        <div class="form-group col-sm-6">\n' +
                '                            <button type="button" id="come_button" class="btn btn-success btn-lg pull-center" name="sent" value="come">Войти с учетной записи</button>\n' +
                '                        </div>\n' +
                '                    </div>\n' +
                '                </form>';
            $("#action_reg_block").html(str);

            $('#come_button').click(function (event) {
                window.location.reload();
            });
            <?php
            if ($err==3)  echo "$('#err').html('Этот номер телефона уже авторизован!')";
            ?>
        });
    });
</script>

<section id="feat">
    <div class="container">
        <div class="row features">
            <?php
            if(!isset($_COOKIE['user'])):
            ?>

            <div class="col-md-12 text-center wow fadeInUp" data-wow-delay="500ms" id="action_reg_block">
                <img src="images/ico/block-icon.png">
                <h4>Авторизация</h4>
                <form name="form" action="" method="post">
                    <div class="row">
                        <div class="form-group col-sm-12">
                            <label for="phone" class="h4">Телефон</label>
                            <input type="text" class="form-control" name="phone" id="phone" placeholder="Enter phone" required <?php if($_POST['phone']) {echo 'value="'.$_POST['phone'].'" '; } ?>>
                        </div>
                        <div class="form-group col-sm-12">
                            <label for="email" class="h4">Пароль</label>
                            <input type="password" class="form-control" name="password" id="password" placeholder="Enter password" required>
                        </div>
                    </div>

                        <?php
                        if ($err == 1){
                            echo '<div class="form-group col-sm-12" style="color: red">Проверьте правльность пароля</div>';
                            //$err = 1;
                        } else if($err == 2){
                            echo '<div class="form-group col-sm-12" style="color: red">Аккаунт не зарегистрирован. Перейти к регистрации?</div>';
                            //$err = 2;
                        } else if($err==3){
                            echo '<div class="form-group col-sm-12" style="color: red">Этот номер телефона уже авторизован!</div>';
                        }
                        ?>


                    <div class="row">
                        <div class="form-group col-sm-6">
                            <button type="button" id="registration_button" class="btn btn-success btn-lg pull-center" name="sent" value="reg">Зарегистрироваться</button>
                        </div>
                        <div class="form-group col-sm-6">
                            <button type="submit" id="come_button_use" class="btn btn-success btn-lg pull-center" name="sent" value="come">Войти с учетной записи</button>
                        </div>
                    </div>
                </form>

            </div>

            <?php

            endif;
            if(isset($_COOKIE['user'])):

            ?>

                <div class="col-md-12 text-center wow fadeInUp" data-wow-delay="500ms" id="action_reg_block">

                    <img src="images/ico/unblock-icon.png">
                    <h4><?php echo $_COOKIE['user']; ?>, Вы уже авторизованы!</h4>
                    <form name="form" action="" method="post">
                        <div class="row">
                            <div class="form-group col-sm-12">
                                <button type="submit" id="exit" class="btn btn-success btn-lg pull-center" name="sent" value="out">Выйти из учетной записи</button>
                            </div>
                        </div>
                    </form>

                </div>

            <?php
            endif;
            ?>

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
                <p class="text-right social">

                </p>
            </div>
        </div>
    </div>
</footer>

</body>
</html>
