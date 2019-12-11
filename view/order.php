<?php
session_start();

include "../logic/db.php";

$order_id = $_GET['id'];
$order = getOrder($mysqli, $order_id);

require_once('../tmp/header.html');
    ?>


    <section id="feat">
        <div class="container">
            <div class="row features">
                <div class="col-md-16 text-center wow fadeInUp" data-wow-delay="500ms" id="action_reg_block">

                    <img src="../images/ico/bookmark-icon.png">

                    <h4>Просмотр заказа</h4>
                
                    <table class="table">
                        <tr>
                            <th class="text-center"> № заказа</th>
                            <th class="text-center"> Пользователь</th>
                            <th class="text-center"> Фотограф</th>
                            <th class="text-center"> Время заказа</th>
                            <th class="text-center"> Город </th>
                            <th class="text-center"> Локация</th>
                            <th class="text-center"> Съемка</th>
                        </tr>
                        <tr>
                            <?php
                            foreach ($order as $item) {

                                echo "<td>$item[0]</td>";
                                echo "<td>$item[1]</td>";
                                echo "<td>$item[2]</td>";
                                echo "<td>$item[3]</td>";
                                echo "<td>$item[8]</td>";
                                echo "<td>$item[4]</td>";
                                echo "<td>$item[7]</td>";
                            }
                            
                            ?>
                        </tr>
                    </table>



                </div>
            </div>
        </div>
    </section>


    <?php
require_once('../tmp/footer.html');

?>
