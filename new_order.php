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
    <title>Новый заказ JoiL</title>
    <!-- Bootstrap core CSS -->
    <link href="bootstrap/css/theme.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="style.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,300,700,100' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Raleway:300,700,900,500' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/typicons/2.0.7/typicons.min.css">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/pushy.css">
    <link rel="stylesheet" href="assets/css/masonry.css">
    <link rel="stylesheet" href="assets/css/animate.css">
    <link rel="stylesheet" href="assets/css/magnific-popup.css">

</head>
<body class="">
<!-- Pushy Menu -->


<!-- Site Overlay -->
<div class="site-overlay"></div>

<header id="home">
    <div class="container-fluid-dop">
        <!-- change the image in style.css to the class header .container-fluid [approximately row 50] -->
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
                    <span class="typcn typcn-camera-outline x3"></span>
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
                    <span class="typcn typcn-camera-outline x3"></span>
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
                <p class="text-right social"><i class="typcn typcn-social-facebook-circular"></i><i class="typcn typcn-social-twitter-circular"></i><i class="typcn typcn-social-tumbler-circular"></i></p>
            </div>
        </div>
    </div>
</footer>
<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="assets/js/jquery.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="https://netdna.bootstrapcdn.com/twitter-bootstrap/2.0.4/js/bootstrap-scrollspy.js"></script>
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="assets/js/ie10-viewport-bug-workaround.js"></script>
<script src="http://masonry.desandro.com/masonry.pkgd.js"></script>
<script src="assets/js/masonry.js"></script>
<script src="assets/js/pushy.min.js"></script>
<script src="assets/js/jquery.magnific-popup.min.js"></script>
<script src="assets/js/wow.min.js"></script>
<script src="assets/js/scripts.js"></script>
</body>
</html>

<script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-34344036-1', 'auto');
    ga('send', 'pageview');

</script>
