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
                        <th class="text-center"> № в базе говно в унитазе </th>
                        <th class="text-center"> Имя </th>
                        <th class="text-center"> Номер телефона </th>
                        <th class="text-center"> Редактирование </th>
                        <th class="text-center"> Удаление </th>
                    </tr>

                    <?php
                    foreach ($_SESSION['user_list'] as $user){
                        echo "<tr>";
                        foreach ($user as $item)
                            echo "<td> $item </td>";
                        echo '<td><input type="button" class="button_rewrite" value="&#9998;"></td>';
                        echo '<td><input type="button" class="button_delite" value="&#10006;"></td>';
                        echo "</tr>";
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
