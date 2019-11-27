<?php
session_start();
require_once('../tmp/header.html');
?>


<section id="feat">
    <div class="container">
        <div class="row features">
            <div class="col-md-12 text-center wow fadeInUp" data-wow-delay="500ms" id="action_reg_block">
                <img src="../images/ico/bookmark-icon.png">

                <h4>Список пользователей</h4>

                <table class="table">
                    <tr>
                        <th class="text-center"> id </th>
                        <th class="text-center"> Имя </th>
                        <th class="text-center"> Номер телефона </th>
                        <th class="text-center"> Редактирование </th>
                        <th class="text-center"> Удаление </th>
                    </tr>

                    <?php
                    foreach ($_SESSION['user_list'] as $user){
                        echo "<tr>";

                        echo "<td>$user[0]</td>";
                        echo "<td>$user[1]</td>";
                        echo "<td>$user[2]</td>";



                    ?>

                        <div class="btn-group">


                            <td><a href="#edit<?php echo $user[0]; ?>" data-toggle="modal">
                                    <input type="button" class="button_rewrite" value="&#9998;"></a>
                            </td>
                            <td><a href="#delete<?php echo $user[0]; ?>" data-toggle="modal">
                                    <input type="button" class="button_delete" value="&#10006;"></a>
                            </td>
                        </div>
                        <?php
                        echo "</tr>";
                        ?>


                        <div class="modal fade" id="edit<?php echo $user[0]; ?>" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        <h4 class="modal-title" id="myModalLabel">Пользователь <?php echo $user[1];?></h4>
                                    </div>
                                    <div class="modal-body">
                                        <form action="../logic/admin_upd_user_sheet.php" method="post">
                                            <input type="text" name="user_id" class="form-control" style="display: none;" value="<?php echo $user[0]; ?>">

                                            <div class="form-group">
                                                <label class="col-form-label"> Имя </label>
                                                <input type="text" name="name" class="form-control" value="<?php echo $user[1]; ?>" placeholder="Имя" required>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-form-label"> Телефон </label>
                                                <input type="text" name="phone" class="form-control" value="<?php echo $user[2]; ?>" placeholder="Телефон" required>
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


                        <div class="modal fade" id="delete<?php echo $user[0]; ?>" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        <h4 class="modal-title" id="myModalLabel">Предупреждение</h4>
                                    </div>
                                    <div class="modal-body">
                                        Вы действительно хотите удалить пользователя <?php echo $user[1]?>,<br>
                                        а также все его записи фотосессий?
                                    </div>
                                    <div class="modal-footer">
                                        <form action="../logic/admin_upd_user_sheet.php" method="post">
                                            <input type="text" name="user_id" class="form-control" style="display: none;" value="<?php echo $user[0]; ?>">
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
