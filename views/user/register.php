<?
View::startBody("Регистрация");
?>
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-6 col-md-offset-2">
                <form method="post" class="form-horizontal">
                    <div class="form-group">
                        <label for="login" class="control-label">Логин</label>
                        <input type="text" name="login" class="form-control" id="login" placeholder="Login"
                               value="<?= $login ?>" required minlength="6">
                        <?
                        if (isset($errors['loginError'])) {
                            echo '<p class="text-danger">'.$errors['loginError'].'</p>';
                        }
                        if (isset($errors['loginLengthError'])) {
                            echo '<p class="text-danger">'.$errors['loginLengthError'].'</p>';
                        }
                        ?>
                    </div>
                    <div class="form-group">
                        <label for="email" class="control-label">E-mail</label>
                        <input type="email" name="email" class="form-control" id="email" placeholder="E-mail"
                               value="<?= $email ?>" required>
                        <?
                        if (isset($errors['emailError'])) {
                            echo '<p class="text-danger">'.$errors['emailError'].'</p>';
                        }
                        if (isset($errors['emailCheckError'])) {
                            echo '<p class="text-danger">'.$errors['emailCheckError'].'</p>';
                        }
                        ?>
                    </div>
                    <div class="form-group">
                        <label for="password" class="control-label">Пароль</label>
                        <input type="password" name="password" class="form-control" id="password" placeholder="Password"
                               value="<?= $password ?>" required minlength="6">
                        <?
                        if (isset($errors['passwordLengthError'])) {
                            echo '<p class="text-danger">'.$errors['passwordLengthError'].'</p>';
                        }
                        ?>
                    </div>
                    <div class="form-group">
                        <label for="confirmPassword" class="control-label">Повтор пароля</label>
                        <input type="password" name="confirmPassword" class="form-control" id="confirmPassword"
                               placeholder="Confirm password"
                               value="<?= $confirmPassword ?>" required minlength="6">
                        <?
                        if (isset($errors['passwordCheckError'])) {
                            echo '<p class="text-danger">'.$errors['passwordCheckError'].'</p>';
                        }
                        ?>
                    </div>
                    <div class="form-group">
                        <div class="radio">
                            <label>
                                <input type="radio" name="type" value="airline" id="type" checked>
                                Компания
                            </label>
                        </div>
                        <div class="radio">
                            <label>
                                <input type="radio" name="type" value="service" id="type">
                                Сервис
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" name="reg" class="btn btn-success">Зарегистрироваться</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?
View::endBody();
?>