<?php
session_start();
require_once 'tmp/header.html';

?>

        <nav class="pushy pushy-left">
            <ul class="list-unstyled">
                <li><a href="logic/authorization.php">Войти</a></li>
                <li><a href="#">Главная</a></li>
                <li><a href="#feat">Компетенции</a></li>
                <li><a href="#about">О нас</a></li>
                <li><a href="#news">Наша команда</a></li>
                <li><a href="#history">Прайс-лист</a></li>
                <li><a href="#contact">Напишите нам!</a></li>
                <li><a href="view/gloss.php">Наш глоссарий</a></li>
            </ul>
        </nav>


<?php

if ($_SESSION['user_id'] == 1){
    ?>
    <section id="feat">
        <div class="container">
            <div class="row features">
                <div class="col-md-4 text-center wow fadeInUp" data-wow-delay="100ms">
                    <a href="logic/admin_upd_user_sheet.php" style="color: #535353"><img src="images/ico/bookmark-icon.png"></a>
                    <h4><a href="logic/admin_upd_user_sheet.php" style="color: red">Редактирование книги пользователей</a> </h4>
                    <p>  </p>
                </div>
                <div class="col-md-4 text-center wow fadeInUp" data-wow-delay="300ms">
                    <a href="logic/admin_upd_order_sheet.php" style="color: #535353"><img src="images/ico/pensil-icon.png"></a>
                    <h4><a href="logic/admin_upd_order_sheet.php" style="color: red"> Редактирование списка заказов</a> </h4>
                    <p>  </p>
                </div>
                <div class="col-md-4 text-center wow fadeInUp" data-wow-delay="500ms">
                    <a href="" style="color: #535353"><img src="images/ico/camera-icon.png"></a>
                    <h4><a href="" style="color: red">Редактирование контента (фотографий)</a></h4>
                    <p>  </p>
                </div>
            </div>
        </div>
    </section>
    <?php
}
else{
    ?>
    <section id="feat">
        <div class="container">
            <div class="row features">
                <div class="col-md-4 text-center wow fadeInUp" data-wow-delay="100ms">
                    <a href="tmp/gallery.html" style="color: #535353"><img src="images/ico/bookmark-icon.png"></a>
                    <h4><a href="tmp/gallery.html" style="color: red">Посмотрите наши работы</a> </h4>
                    <p>Обратите внимание на фотографии с прошлых съемок, возможно некоторые варианты станут Вам интересны. Также вы можете обсудить свои варианты лично с фотографом</p>
                </div>
                <div class="col-md-4 text-center wow fadeInUp" data-wow-delay="300ms">
                    <a href="logic/new_order.php" style="color: #535353"><img src="images/ico/pensil-icon.png"></a>
                    <h4><a href="logic/new_order.php" style="color: red">Опишите свою идею</a> </h4>
                    <p>Креатив - всегда круто! Опытные специалисты помогут вам реализовать самые безбашенные идеи и раскрыть Ваш потенциал</p>
                </div>
                <div class="col-md-4 text-center wow fadeInUp" data-wow-delay="500ms">
                    <a href="view/all_orders.php" style="color: #535353"><img src="images/ico/camera-icon.png"></a>
                    <h4><a href="view/all_orders.php" style="color: red">Просмотрите свои заказы</a></h4>
                    <p>Решившись на съемку - главное не переживать. Скила наших ребят достаточно, чтобы помочь Вам расслабиться и получить удовольствие!</p>
                </div>
            </div>
        </div>
    </section>
<?php
}

?>

        <section id="about" class="number wow fadeInUp" data-wow-delay="300ms">
            <div class="container-fluid">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 opaline col-md-offset-6">
                            <div class="row">
                                <div class="col-md-offset-1 col-md-10">
                                    <h3>Самая крупная мастерская</h3>
                                    <h5>Текущий состав - 16 профессионалов разных направлений</h5>
                                    <p>Помогут вам реализовать все ваши задумки в мире фотографии и видео</p>
                                </div>
                            </div>
                            <div class="row text-center">

                                <div class="col-md-4 boxes col-xs-6 col-xs-offset-3 col-lg-4 col-lg-offset-1 col-md-offset-1 col-sm-6 wow fadeInUp">
                                    <h5>Сделано фотографий</h5>
                                    <h3>67294</h3>
                                </div>
                                <div class="col-md-4 boxes col-xs-6 col-xs-offset-3 col-lg-4 col-lg-offset-2 col-md-offset-2 col-sm-6 wow fadeInUp" data-wow-delay="300ms">
                                    <h5>Довольных заказчиков</h5>
                                    <h3>1473</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="news" class="blog wow fadeInUp" data-wow-delay="300ms">
            <div class="container">
                <div class="row">
                    <div class="col-md-7">
                        <h2>Давайте знакомиться</h2>
                        <p>
                            Наши ребята - фотографы и видеографы с многолетним стажем. В зависимости от предпочтений, Вы можете заказать работу у нужного мастера, будь то Уличная съемка, Свадебная фотография, Деловой фотосет или даже професссиональная съемка своего Клипа!
                        </p>
                        <p>
                            <i>Единственное, на чем Вы должны быть сконцентрированы во время съемки - собственные желания, остальное исполнитель работы берет на себя!</i>
                        </p>
                        <br><br>
                        <a class="btn btn-danger btn-lg" href=""> К странице с мастерами </a>
                    </div>
                    <div class="col-md-5">
                        <a href="#">
                            <img src="images/photo/img_block3.jpg" alt="" class="img-responsive">
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <section id="history" class="story wow fadeInUp" data-wow-delay="300ms">

            <div class="container-fluid">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 opaline">
                            <div class="row">
                                <div class="col-md-10 col-md-offset-1">
                                    <h4> Официальные цены мастерской</h4>
                                    <p><?php
                                        $array = [
                                            ["id" => "1",
                                                "name" => "Уличная съемка",
                                                "price" => "2000"],
                                            ["id" => "2",
                                                "name" => "Свадебная фотография",
                                                "price" => "7000"],
                                            ["id" => "3",
                                                "name" => "Фотография с ребенком",
                                                "price" => "5000"],
                                            ["id" => "4",
                                                "name" => "Обработка ваших фото",
                                                "price" => "500"],
                                        ];
                                        ?>
                                        <table class="lead">
                                            <?php
                                            foreach($array as $arr){
                                            ?>
                                            <tr>
                                                <td> <?php echo $arr['name'] ?>  <td>
                                                <td> - </td>
                                                <td> <?php echo $arr['price'] ?>  <td>
                                            </tr>
                                            <? } ?> 
                                        
                                        </table></p>
                                    <br><br>

                                    <a class="btn btn-danger btn-lg" href=""> К странице с расценками </a>
                                    <p><i style="color: #555555">Цены на экслюзивные работы<br>
                                    оговариваются лично с мастером</i></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

      <br><br>

        <section id="contact" class="prefooter wow fadeInUp" data-wow-delay="300ms">

            <div class="container-fluid">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8">
                            <h3>Связаться с нами</h3>
                            <p>Оставьте свою почту, и мы свяжемся с вами в течение дня</p>
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="text" class="form-control" placeholder="Введите Email здесь...">
                                    <br>
                                    <button type="button" class="btn btn-danger">Отправить</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

      <br><br>

<?php
require_once 'tmp/footer.html';
?>

