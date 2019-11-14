<?php
require_once ('../tmp/header.html');
?>

<section id="feat">
    <div class="container">
        <div class="row features">

            <div class="col-md-12 text-center wow fadeInUp" data-wow-delay="500ms">
                <img src="../images/ico/camera-icon.png">
                <h4>Запись на фотоссессию</h4>

                <form name="form" action="" method="post">

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
                        </div>
                    </div>

                    <button type="submit" id="form-submit" class="btn btn-success btn-lg pull-center" name="done" value="Готово">Отправить заявку</button>

                </form>
            </div>

        </div>
    </div>
</section>

<?php
require_once ('../tmp/footer.html');
?>
