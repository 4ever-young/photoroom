<?php
require_once ('../tmp/header.html');
$mysql = new mysqli('localhost','root', '1111', 'photoroom');

$res = $mysql->query("SELECT id, name FROM `creator`");
$creators = $res->fetch_all();
?>

<section id="feat">
    <div class="container">
        <div class="row features">

            <div class="col-md-12 text-center wow fadeInUp" data-wow-delay="500ms">
                <img src="../images/ico/camera-icon.png">
                <h4>Запись на фотоссессию</h4>

                <form name="form" action="../logic/check_new_order.php" method="post">

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
                                <option value="Свадебная">Свадебная</option>
                                <option value="Выходная фотосессия">Выходная фотосессия</option>
                                <option value="День рождения" selected="selected">День рождения</option>
                                <option value="Вечеринка">Вечеринка</option>
                                <option value="С ребенком">С ребенком</option>
                                <option value="Выпускной">Выпускной</option>
                                <option value="Видеосъемка">Видеосъемка</option>
                                <option value="Съемка с воздуха">Съемка с воздуха</option>
                                <option value="Другое">Другое</option>
                            </select>
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="location" class="h4 ">Локация</label>
                            <select name="location" class="form-control">
                                <option value="Центр">Центр</option>
                                <option value="Город" selected="selected">Город</option>
                                <option value="Выезд за город">Выезд за город</option>
                                <option value="На берегу">На берегу</option>
                                <option value="Другое">Другое</option>
                            </select>
                        </div>
                        <div class="form-group col-sm-12">
                            <label for="creator" class="h4 ">Фотограф</label>
                            <select name="creator_id" class="form-control">
                                <?php

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
