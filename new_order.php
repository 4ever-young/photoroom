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

            <?php
            if(isset($_COOKIE['user'])) {
            ?>

                <div class="col-md-12 text-center wow fadeInUp" data-wow-delay="500ms">
                    <img src="images/ico/camera-icon.png">
                    <h4>Запись на фотоссессию</h4>

                    <form name="form" action="new_order_after.php" method="post">

                        <div class="row">
                            <div class="form-group col-sm-6">
                                <label for="date" class="h4">Дата</label>
                                <input type="date" name="date" class="form-control" id="date" required>
                            </div>
                            <div class="form-group col-sm-6">
                                <label for="time" class="h4">Время</label>
                                <input type="time" name="time" class="form-control" id="time" required>
                            </div>
                            <div class="form-group col-sm-6" aria-required="true">
                                <label for="type" class="h4">Тип съемки</label>
                                <select name="type" class="form-control">
                                    <option value="1">Свадебная</option>
                                    <option value="2" selected="selected">Праздник</option>
                                    <option value="3">Вечеринка</option>
                                    <option value="4">Вечеринка</option>
                                    <option value="5">С ребенком</option>
                                    <option value="6">Школьная/студенческая</option>
                                    <option value="7">Видеосъемка</option>
                                    <option value="8">Съемка с воздуха</option>
                                    <option value="9">Другое</option>
                                </select>
                            </div>
                            <div class="form-group col-sm-6">
                                <label for="location" class="h4 ">Локация</label>
                                <select name="location" class="form-control">
                                    <option value="1">Центр</option>
                                    <option value="2" selected="selected">Город</option>
                                    <option value="3">Выезд за город</option>
                                    <option value="4">На берегу</option>
                                    <option value="5">Другое</option>
                                </select>
                            </div>
                            <div class="form-group col-sm-12">
                                <label for="creator" class="h4 ">Фотограф</label>
                                <select name="creator_id" class="form-control">
                                <?php
                                $mysql = new mysqli('localhost','root', '1111', 'photoroom');

                                $res = $mysql->query("SELECT id, name FROM `creator`");
                                $creators = $res->fetch_all();

                                $strimg = "";
                                foreach ($creators as $creator){
                                    echo '<option value="'.$creator[0].'">'.$creator[1].'</option>';


                                }



                                ?>
                                </select>
                                <?php

                                ?>
                            </div>
                        </div>

                        <button type="submit" id="form-submit" class="btn btn-success btn-lg pull-center" name="done" value="Готово">Отправить заявку</button>

                    </form>

            <?php
            }
            else {
                ?>

                <div class="col-md-12 text-center wow fadeInUp" data-wow-delay="500ms">
                    <img src="images/ico/block-icon.png">
                    <h4>Запись на фотоссессию доступна только<br><a href="registration.php" style="color: red">авторизованным</a>
                        пользователям</h4>
                </div>

                <?php
            }
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

            </div>
        </div>
    </div>
</footer>

</body>
</html>

