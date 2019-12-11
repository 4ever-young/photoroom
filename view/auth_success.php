<?php

session_start();
include "../tmp/header.html";

?>

<script>
    $(document).ready(function(){
        $.get(
            /*"https://api.weather.yandex.ru/v1/informers?lat=48.6989565916574&lon=44.50919093218168&lang=ru_RU",
            {
                "X-Yandex-API-Key" : "028a142b-3ac0-4d46-8531-8e86ef27bc3d"
            }*/
            "http://api.openweathermap.org/data/2.5/weather",
            {
                "id" : "472755",
                "appid" : "70e1ed322b02acbc57d443dd91065f3e"
            },

            function (data) {
                let out = '';
                out += 'Погода: <b>'+data.weather[0].main+'</b><br>';
                out += '<p style="text-align:center"><img src="https://openweathermap.org/img/w/'+data.weather[0].icon+'.png"></p>';

                out += 'Температура: <b>'+Math.round(data.main.temp-273)+'&#176;C</b><br>';
                out += 'Влажноть: <b>' + data.main.humidity + '%</b><br>';
                out += 'Давление: <b>' + Math.round(data.main.pressure*0.75006375) + 'мм.рт.ст.</b><br>';
                out += 'Видимость: <b>' + (data.visibility/1000) + 'км.</b><br>';
                console.log(data);
                console.log(out);
                $('#weather').html(out);
            }
        );
    });
</script>

<section id="feat">
    <div class="container">
        <div class="row features">
            <div id="weather" class="col-md-4 text-center wow fadeInUp">
            </div>

            <div class="col-md-8 text-center wow fadeInUp" data-wow-delay="500ms" id="action_reg_block">


                <?php
                if ($_SESSION['avatar']){
                    echo '<img src="../images/user_avatars/'.$_SESSION['avatar'].'.jpg">';

                }
                else{
                    echo '<img src="../images/ico/unblock-icon.png">';
                }
                ?>
                <h4><?php echo $_SESSION['user_name']; ?>, Вы уже авторизованы!</h4>
                <form name="form" action="../logic/authorization.php" method="post">
                    <div class="row">
                        <div class="form-group col-sm-12">
                            <button type="submit" id="exit" class="btn btn-success btn-lg pull-center" name="action_button"
                                    value="exit">Выйти из учетной записи
                            </button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</section>
<?php

    include "../tmp/footer.html";
?>