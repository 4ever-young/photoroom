<?php
    $dir = '/OSPanel/domains/photoroom/for_gloss/';
    $all_files = scandir($dir);
    //var_dump($all_files);
    $count = 2;
    $gloss = [[]];


    foreach ($all_files as $file){
        //var_dump($file);
        if ($file!='.'&&$file!='..') {
            echo "./for_gloss/".$file;
            //$file = file_get_contents('./for_gloss/file_test.html');

            $page = strip_tags($file); // минус теги
            //strpos_all - все вхождения

            str_replace(".", "", $page);
            str_replace(",", "", $page);
            str_replace(":", "", $page);
            str_replace("-", "", $page);

            $line = explode(" ",$page);
            $num_for_gloss = 0;

            foreach ($line as $word) {
                if (array_key_exists($word, $gloss)){
                    $gloss[$word][1] = $gloss[$word][1] + 1;
                } else {
                    $gloss[$word][0] = $word;
                    $gloss[$word][1] = 1;
                    $gloss[$word][2] = $file;
                }
            }
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
    <title>Мастера JoiL</title>
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

            <br><br><br>
            <?php
            foreach ($gloss as $word) {

                $str = '<a href="for_gloss/'.$word[2].'">'.$word[1].'</a> <br>';
                echo $str;
            }
            //var_dump($gloss);
            ?>
            <br><br><br><br><br><br>

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
