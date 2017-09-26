<?
View::startBody("Авторизация");
?>
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-6 col-md-offset-2">
                <form method="post" class="form-horizontal">
                    <div class="form-group">
                        <label for="login" control-label text-center">Логин пользователя</label>
                        <input type="text" name="login" class="form-control" id="login" placeholder="Login"
                               value="<?= $login ?>" required minlength="6">
                        <?
                        if (isset($errors['loginError'])) {
                            echo '<p class="text-danger">' . $errors['loginError'] . '</p>';
                        }
                        ?>
                    </div>
                    <div class="form-group">
                        <label for="password" class="control-label text-center">Пароль</label>
                        <input type="password" name="password" class="form-control" id="password" placeholder="Password"
                               value="<?= $password ?>" required minlength="6">
                        <?
                        if (isset($errors['passwordError'])) {
                            echo '<p class="text-danger">' . $errors['passwordError'] . '</p>';
                        }
                        ?>
                    </div>
                    <div class="form-group">
                        <button type="submit" name="log" class="btn btn-success">Войти</button>
                    </div>
                    <div class="form-group">
                        <p>Не зарегистрированы? <a href="/user/registration">Создайте аккаунт</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?
View::endBody() ?>