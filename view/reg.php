<?php
    include "../tmp/header.html";
?>

<section id="feat">
    <div class="container">
        <div class="row features">
            <div class="col-md-12 text-center wow fadeInUp" data-wow-delay="500ms" id="action_reg_block">
                <img src="../images/ico/block-icon.png">
                <h4>Регистрация</h4>
                    <form name="form" action="../logic/check_auth.php" method="post">
                        <div class="row">
                                <div class="form-group col-sm-12">
                                        <label for="name" class="h4">Имя</label>
                                        <input type="text" class="form-control" name="name" id="name" placeholder="Enter name" required <?php if($_COOKIE['name']) {echo 'value="'.$_COOKIE['name'].'" '; } ?>>
                                    </div>
                                <div class="form-group col-sm-12">
                                        <label for="phone" class="h4">Телефон</label>
                                        <input type="text" class="form-control" name="phone" id="phone" placeholder="+7 (---) (---) (-- --)" required <?php if($_COOKIE['phone']) {echo 'value="'.$_COOKIE['phone'].'" '; } ?>>
                                    </div>
                                <div class="form-group col-sm-12">
                                        <label for="password" class="h4">Пароль</label>
                                        <input type="password" class="form-control" name="password" id="pas" placeholder="Enter password" required>
                                    </div>
                            </div>
                        <?php
                        if($_GET['err'] == 3){
                            ?>
                                <div class="form-group col-sm-12" style="color: red">
                                    Этот номер телефона уже авторизован!
                                    <a href="">Забыли пароль?</a>
                                </div>
                            <?php
                            unset($_GET['err']);
                        }
                        ?>
                        <div class="row">
                                <div class="form-group col-sm-6">
                                    <button type="submit" id="registration_button_use" class="btn btn-success btn-lg pull-center" name="action_button" value="reg">Зарегистрироваться</button>
                                </div>
                                <div class="form-group col-sm-6">
                                    <a href="auth.php"><button type="button" id="action" class="btn btn-success btn-lg pull-center" name="action" value="reg">Войти с учетной записи</button></a>
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