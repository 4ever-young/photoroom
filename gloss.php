<?php
    $dir = '/OSPanel/domains/photoroom/';
    $all_files = scandir($dir);
    $gloss = [[]];
    $mostpopular = 0;

    foreach ($all_files as $file){
        if ($file!='.' && $file!='..' && $file!='..' && $file!='.idea' && $file!='.git' && $file!='assets' && $file!='bootstrap' && $file!='images' && $file!='site' && $file!='gallery.php') {
            $filename = ".\\".$file; // создание пути обращения

            $page = file_get_contents(__DIR__.$filename);

            $page = strip_tags($page); // минус теги
            $page = preg_replace('/[^ a-zа-яё\d]/ui', '', $page); // уберем все, кроме русских букв

            $sequence = explode(" ",$page);

            foreach ($sequence as $word)
                if(strlen($word)>6) // уберем все предлоги, местоимения (все, что менее трех символов)
                    if (array_key_exists($word, $gloss)){
                        $gloss[$word][1] = $gloss[$word][1]+1;
                        if ($mostpopular < $gloss[$word][1])
                            $mostpopular = $gloss[$word][1];
                    } else {
                        $gloss[$word][0] = $word;
                        $gloss[$word][1] = 1;
                        $gloss[$word][2] = $file;
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
            <h4 style="text-align: center">Наиболее упортребляемые слова на сайте</h4><br>
            <?php
            foreach ($gloss as $word) {
                if ($word != "" && $word != " " && $word != "" && ($word[1]> ($mostpopular-($mostpopular/1.5))) ){ // деление - оптимальное вычленение самых популярных
                    $str = '<a href="'.$word[2].'">'.$word[0]." </a> - ".$word[1].' раз <br>';
                    echo $str;
                }
            }
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
