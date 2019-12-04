<?php
session_start();
require_once('../tmp/header.html');
?>


<section id="feat">
    <div class="container">
        <div class="row features">
            <div class="col-md-12 text-center wow fadeInUp" data-wow-delay="500ms" id="action_reg_block">

                <img src="../images/ico/bookmark-icon.png">

                <h4>Список заказов</h4>

                <table class="table">
                    <tr>
                        <th class="text-center"> № заказа </th>
                        <th class="text-center"> Пользователь </th>
                        <th class="text-center"> Фотограф </th>
                        <th class="text-center"> Время заказа </th>
                        <th class="text-center"> Локация </th>
                        <th class="text-center"> Съемка </th>
                        <th class="text-center"> Редактирование </th>
                        <th class="text-center"> Удаление </th>
                    </tr>

                    <?php
                    $creators = $_SESSION['creators'];
                    $counter = 0;
                    foreach ($_SESSION['order_list'] as $order){
                        echo "<tr>";
                        echo "<td>$order[0]</td>";
                        echo "<td>$order[1]</td>";
                        echo "<td>$order[2]</td>";
                        echo "<td>$order[3]</td>";
                        echo "<td>$order[4]</td>";
                        echo "<td>$order[7]</td>";
                        echo '';
                        //echo '<td><input type="button" class="button_delete" data-whatever="?price_id='.$_SESSION['order_list'][$counter][0].'"
                        //        data-toggle="modal" data-target="#myModal" value="&#10006;"></td>';
                        // <td><a href=""><input type="button" class="button_rewrite" value="&#9998;"></a></td>



                        ?>
                        <div class="btn-group">


                            <td><a href="#edit<?php echo $order[0]; ?>" data-toggle="modal">
                                    <input type="button" class="button_rewrite" value="&#9998;"></a>
                            </td>
                            <td><a href="#delete<?php echo $order[0]; ?>" data-toggle="modal">
                                    <input type="button" class="button_delete" value="&#10006;"></a>
                            </td>
                        </div>

                        <?php
                        echo "</tr>";
                        ?>

                        <!-- Модальное окно редактирования -->

                        <div class="modal fade" id="edit<?php echo $order[0]; ?>" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        <h4 class="modal-title" id="myModalLabel">Изменение заказа №<?php echo $order[0];?></h4>
                                    </div>
                                    <div class="modal-body">
                                        <form action="../logic/admin_upd_order_sheet.php" method="post">
                                            <input type="text" name="order_id" class="form-control" style="display: none;" value="<?php echo $order[0]; ?>">
                                            <input type="text" name="user_id" class="form-control" style="display: none;" value="<?php echo $order[5]; ?>">
                                            <div class="form-group">
                                                <label class="col-form-label">Фотограф</label>
                                                <select name="creator" class="form-control">
                                                    <?php
                                                    foreach ($creators as $creator){
                                                        echo '<option value="'.$creator[0].'"';
                                                        if ($order[6] == $creator[0]) echo ' selected="selected" ';
                                                        echo '">'.$creator[1].'</option>';
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-form-label">Время заказа</label>
                                                <input type="date" name="order_time" class="form-control" value="<?php echo $order[3]; ?>" placeholder="Дата заказа" required>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-form-label">Локация</label>
                                                <select name="location" class="form-control">
                                                    <option value="Центр" <?php if($order[4] == "Центр") echo ' selected="selected" ';?>>Центр</option>
                                                    <option value="Город" <?php if($order[4] == "Город") echo ' selected="selected" ';?>>Город</option>
                                                    <option value="Выезд за город" <?php if($order[4] == "Выезд за город") echo ' selected="selected" ';?>>Выезд за город</option>
                                                    <option value="На берегу" <?php if($order[4] == "На берегу") echo ' selected="selected" ';?>>На берегу</option>
                                                    <option value="Другое">Другое</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-form-label">Тип съемки</label>
                                                <select name="type" class="form-control">
                                                    <option value="Свадебная" <?php if($order[7] == "Свадебная") echo ' selected="selected" ';?>>Свадебная</option>
                                                    <option value="Выходная фотосессия" <?php if($order[7] == "Выходная фотосессия") echo ' selected="selected" ';?>>Выходная фотосессия</option>
                                                    <option value="День рождения" <?php if($order[7] == "День рождения") echo ' selected="selected" ';?>>День рождения</option>
                                                    <option value="Вечеринка" <?php if($order[7] == "Вечеринка") echo ' selected="selected" ';?>>Вечеринка</option>
                                                    <option value="С ребенком" <?php if($order[7] == "С ребенком") echo ' selected="selected" ';?>>С ребенком</option>
                                                    <option value="Выпускной" <?php if($order[7] == "Выпускной") echo ' selected="selected" ';?>>Выпускной</option>
                                                    <option value="Видеосъемка" <?php if($order[7] == "Видеосъемка") echo ' selected="selected" ';?>>Видеосъемка</option>
                                                    <option value="Съемка с воздуха" <?php if($order[7] == "Съемка с воздуха") echo ' selected="selected" ';?>>Съемка с воздуха</option>
                                                    <option value="Другое">Другое</option>
                                                </select>
                                            </div>
                                    </div>
                                    <div class="modal-footer">
                                        <input class="button_rewrite" type="submit" name="action" value="Сохранить">
                                        </form>
                                        <input class="button_rewrite" type="button" data-dismiss="modal" value="Нет">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Модальное окно удаления -->

                        <div class="modal fade" id="delete<?php echo $order[0]; ?>" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        <h4 class="modal-title" id="myModalLabel">Предупреждение</h4>
                                    </div>
                                    <div class="modal-body">
                                        Вы действительно хотите удалить заказ №<?php echo $order[0]?> от пользователя <?php echo $order[1]?>?<br>
                                        <input type="text" name="order_id" class="form-control" style="display: none;"  value="<?php echo $order[0]; ?>">
                                    </div>
                                    <div class="modal-footer">
                                        <form action="../logic/admin_upd_order_sheet.php" method="post">
                                            <input type="text" name="order_id" class="form-control" style="display: none;" value="<?php echo $order[0]; ?>">
                                            <input type="submit" class="button_delete" name="action" value="Удалить">
                                        </form>
                                        <input type="button" class="button_rewrite" data-dismiss="modal" value="Нет">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <?php
                    }
                    ?>
                </table>

            </div>
        </div>
    </div>
</section>


<?php
require_once('../tmp/footer.html');
?>
