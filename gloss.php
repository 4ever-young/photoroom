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

            </div>
        </div>
    </div>
</footer>

</body>
</html>
