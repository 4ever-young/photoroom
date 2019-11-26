<?php
include "../logic/db.php";
session_start();

if(!isset($_SESSION['user_name'])) {
    header('Location: /../view/order_not_auth.php');
}

$sql = "SELECT creator.name creator, price_list.type, price_list.location, price_list.date, price_list.status FROM price_list 
        JOIN creator on creator_id = creator.id
        WHERE user_id = ".$_SESSION['user_id']."
        AND price_list.flag_del = 0 ";

$res = $mysqli->query($sql);

$list = $res->fetch_all();

include "../tmp/header.html";
?>


<section id="feat">
    <div class="container">
        <div class="row features">
            <div class="col-md-12 text-center wow fadeInUp" data-wow-delay="500ms" id="action_reg_block">
                <img src="../images/ico/bookmark-icon.png">

                <h4>Список заказов</h4>

                <table class="table">
                    <tr>
                        <th class="text-center"> № </th>
                        <th class="text-center"> Фотограф </th>
                        <th class="text-center"> Тип съемки </th>
                        <th class="text-center"> Место </th>
                        <th class="text-center"> Заказано на </th>
                        <th class="text-center"> Статус </th>
                    </tr>
                    <?php
                    $counter = 1;
                    foreach ($list as $el){
                        echo "<tr>";
                        echo "<td> ".$counter."</td>";
                        echo "<td> ".$el[0]."</td>";
                        echo "<td> ".$el[1]."</td>";
                        echo "<td> ".$el[2]."</td>";
                        echo "<td> ".$el[3]."</td>";

                        if($el[4] == 0) echo "<td> В обработке </td>";
                        if($el[4] == 1) echo "<td> Одобрено </td>";
                        if($el[4] == 2) echo "<td> Заверщено </td>";
                        echo "</tr>";
                        $counter++;
                    }

                    ?>
                </table>
            </div>
        </div>
    </div>
</section>

<?php
include "../tmp/footer.html";
?>
