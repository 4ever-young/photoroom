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
                        <th class="text-center"> Редактирование </th>
                        <th class="text-center"> Удаление </th>
                    </tr>

                    <?php
                    $counter = 0;
                    foreach ($_SESSION['order_list'] as $order){
                        //id="delete $item['id']
                        echo "<tr>";
                        echo "<td>$order[0]</td>";
                        echo "<td>$order[1]</td>";
                        echo "<td>$order[2]</td>";
                        echo "<td>$order[3]</td>";
                        echo "<td>$order[4]</td>";
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
                                        <h4 class="modal-title" id="myModalLabel">Изменение</h4>
                                    </div>
                                    <div class="modal-body">
                                        <form action="../logic/admin_upd_order_sheet.php" method="post">

                                            <div class="form-group">
                                                <label class="col-form-label">Пользователь</label>
                                                <input type="text" name="name" class="form-control" value="<?php echo $order[1]; ?>" placeholder="Пользователь" required>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-form-label">Автор</label>
                                                <input type="text" name="creator" class="form-control" value="<?php echo $order[2]; ?>" placeholder="Автор"        required>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-form-label">Время заказа</label>
                                                <input type="text" name="order_time" class="form-control" value="<?php echo $order[3]; ?>" placeholder="Время заказа" required>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-form-label">Локация</label>
                                                <input type="text" name="location" class="form-control" value="<?php echo $order[4]; ?>" placeholder="Локация"      required>
                                                <input type="text" name="creator_id" class="form-control" style="display: none;" value="<?php echo $order[5]; ?>">
                                                <input type="text" name="user_id" class="form-control" style="display: none;"  value="<?php echo $order[6]; ?>">
                                            </div>
                                    </div>
                                    <div class="modal-footer">
                                        <input class="button_rewrite" type="submit" name="edit" value="Сохранить">
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
                                    </div>
                                    <div class="modal-footer">
                                        <form action="../logic/admin_upd_order_sheet.php" method="post">
                                            <input type="submit" class="button_delete" name="edit" value="Удалить">
                                        </form>
                                        <input type="button" class="button_rewrite" data-dismiss="modal" value="Нет">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <?php
                        $counter++;
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
