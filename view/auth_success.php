<?php

session_start();
include "../tmp/header.html";
include "../assets/js/OpenWeatherMap.js"
?>



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