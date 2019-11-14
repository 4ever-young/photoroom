<?php
require_once ('../tmp/header.html');
?>

<section id="feat">
    <div class="container">
        <div class="row features">
            <div class="col-md-12 text-center wow fadeInUp" data-wow-delay="500ms" id="action_reg_block">
                <img src="../images/ico/block-icon.png">
                <h4>Авторизация</h4>
                <form name="form" action="../logic/check_auth.php" method="post">
                    <div class="row">
                        <div class="form-group col-sm-12">
                            <label for="phone" class="h4">Телефон</label>
                            <input type="text" class="form-control" name="phone" id="phone" placeholder="Enter phone" required <?php if($_COOKIE['phone']) {echo 'value="'.$_COOKIE['phone'].'" '; } ?>>
                        </div>
                        <div class="form-group col-sm-12">
                            <label for="email" class="h4">Пароль</label>
                            <input type="password" class="form-control" name="password" id="password" placeholder="Enter password" required>
                        </div>
                    </div>

        <?php
        if ($_GET['err'] == 1){
            echo '<div class="form-group col-sm-12" style="color: red">Проверьте правльность пароля</div>';
            //$err = 1;
        }
        if($_GET['err'] == 2){
            echo '<div class="form-group col-sm-12" style="color: red">Аккаунт не зарегистрирован. Перейти к регистрации?</div>';
            //$err = 2;
        }
        unset($_GET['err']);
        ?>

                    <div class="row">
                        <div class="form-group col-sm-6">
                                <a href="reg.php"><button type="button" id="action" class="btn btn-success btn-lg pull-center" name="action" value="reg">Зарегистрироваться</button></a>
                        </div>
                        <div class="form-group col-sm-6">
                            <button type="submit" id="auth_button_use" class="btn btn-success btn-lg pull-center" name="action_button" value="auth">Войти с учетной записи</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</section>

<?php
require_once ('../tmp/footer.html');
?>