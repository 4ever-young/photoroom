<?php
$err = isset($err) ? $err : 0; // тип ошибки заполнения полей


?>

<script>
    $(document).ready(function () {
        $('#registration_button').click(function (event) {
            var str = '<img src="images/ico/block-icon.png"> \n' +
                '                <h4>Авторизация</h4>\n' +
                '                <form name="form" action="" method="post">\n' +
                '\n' +
                '                    <div class="row">\n' +
                '                        <div class="form-group col-sm-12">\n' +
                '                            <label for="name" class="h4">Имя</label>\n' +
                '                            <input type="text" class="form-control" name="name" id="name" placeholder="Enter name" required>\n' +
                '                        </div>\n' +
                '                        <div class="form-group col-sm-12">\n' +
                '                            <label for="phone" class="h4">Телефон</label>\n' +
                '                            <input type="text" class="form-control" name="phone" id="phone" placeholder="+7 (---) (---) (-- --)" required>\n' +
                '                        </div>\n' +
                '                        <div class="form-group col-sm-12">\n' +
                '                            <label for="password" class="h4">Пароль</label>\n' +
                '                            <input type="password" class="form-control" name="password" id="pas" placeholder="Enter password" required>\n' +
                '                        </div>\n' +
                '                    </div>\n' +
                '                    <div class="row">\n' +
                '                        <div class="form-group col-sm-6">\n' +
                '                            <button type="submit" id="registration_button_use" class="btn btn-success btn-lg pull-center" name="action_button" value="reg">Зарегистрироваться</button>\n' +
                '                        </div>\n' +
                '                        <div class="form-group col-sm-6">\n' +
                '                            <button type="button" id="auth_button" class="btn btn-success btn-lg pull-center" name="action_button" value="auth">Войти с учетной записи</button>\n' +
                '                        </div>\n' +
                '                    </div>\n' +
                '                </form>';
            $("#action_reg_block").html(str);

            $('#auth_button').click(function (event) {
                window.location.reload();
            });
            <?php
            if ($err == 3)  echo "$('#err').html('Этот номер телефона уже авторизован!')";
            ?>
        });
    });
</script>

<section id="feat">
    <div class="container">
        <div class="row features">
            <?php
            if(!isset($_COOKIE['user'])):
                ?>

                <div class="col-md-12 text-center wow fadeInUp" data-wow-delay="500ms" id="action_reg_block">
                    <img src="images/ico/block-icon.png">
                    <h4>Авторизация</h4>
                    <form name="form" action="" method="post">
                        <div class="row">
                            <div class="form-group col-sm-12">
                                <label for="phone" class="h4">Телефон</label>
                                <input type="text" class="form-control" name="phone" id="phone" placeholder="Enter phone" required <?php if($_POST['phone']) {echo 'value="'.$_POST['phone'].'" '; } ?>>
                            </div>
                            <div class="form-group col-sm-12">
                                <label for="email" class="h4">Пароль</label>
                                <input type="password" class="form-control" name="password" id="password" placeholder="Enter password" required>
                            </div>
                        </div>

                        <?php
                        if ($err == 1){
                            echo '<div class="form-group col-sm-12" style="color: red">Проверьте правльность пароля</div>';
                            //$err = 1;
                        } else if($err == 2){
                            echo '<div class="form-group col-sm-12" style="color: red">Аккаунт не зарегистрирован. Перейти к регистрации?</div>';
                            //$err = 2;
                        } else if($err==3){
                            echo '<div class="form-group col-sm-12" style="color: red">Этот номер телефона уже авторизован!</div>';
                        }
                        ?>


                        <div class="row">
                            <div class="form-group col-sm-6">
                                <button type="button" id="registration_button" class="btn btn-success btn-lg pull-center" name="action_button" value="reg">Зарегистрироваться</button>
                            </div>
                            <div class="form-group col-sm-6">
                                <button type="submit" id="auth_button_use" class="btn btn-success btn-lg pull-center" name="action_button" value="auth">Войти с учетной записи</button>
                            </div>
                        </div>
                    </form>

                </div>

            <?php

            endif;
            if(isset($_COOKIE['user'])):

                ?>

                <div class="col-md-12 text-center wow fadeInUp" data-wow-delay="500ms" id="action_reg_block">

                    <img src="images/ico/unblock-icon.png">
                    <h4><?php echo $_COOKIE['user']; ?>, Вы уже авторизованы!</h4>
                    <form name="form" action="" method="post">
                        <div class="row">
                            <div class="form-group col-sm-12">
                                <button type="submit" id="exit" class="btn btn-success btn-lg pull-center" name="action_button" value="exit">Выйти из учетной записи</button>
                            </div>
                        </div>
                    </form>

                </div>

            <?php
            endif;
            ?>

        </div>
    </div>
</section>
