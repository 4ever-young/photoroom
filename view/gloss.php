<?php
    $dir = '/OSPanel/domains/photoroom/view';
    $all_files = scandir($dir);
    $gloss = [];
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

    include "../tmp/header.html";

?>


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

<?php
include "../tmp/footer.html";
?>