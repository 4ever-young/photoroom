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

            <table>
                <tr>
                    <th> № </th>
                    <th> Фотограф </th>
                    <th> Тип съемки </th>
                    <th> Место </th>
                    <th> Заказано на </th>
                    <th> Статус </th>
                </tr>
            <?php
            $counter = 1;
            foreach ($list as $el){
                /*echo $counter; $counter++;
                foreach ($el as $item) {
                    echo "<td>".$item."</td>";
                }*/

                echo "<tr>";
                echo "<td> ".$counter."</td>";
                echo "<td> ".$el[0]."</td>";
                echo "<td> ".$el[1]."</td>";
                echo "<td> ".$el[2]."</td>";
                echo "<td> ".$el[3]."</td>";
                echo "<td> ".$el[4]."</td>";
                echo "</tr>";
            }

            ?>
            </table>

        </div>
    </div>
</section>
<?php
include "../tmp/footer.html";
?>
