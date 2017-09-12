<?
View::startBody("Авторизация")
?>
    <div class="row">
        <div class="col-md-6">
            <form method="post" class="form-horizontal">
                <div class="form-group">
                    <label for="login" class="col-sm-5 control-label text-center">Login</label>
                    <div class="col-sm-5">
                        <input type="text" name="login" class="form-control" id="login" placeholder="Login"
                               value="<?= $login ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="email" class="col-sm-5 control-label text-center">E-mail</label>
                    <div class="col-sm-5">
                        <input type="email" name="email" class="form-control" id="email" placeholder="E-mail"
                               value="<?= $email ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="password" class="col-sm-5 control-label text-center">Password</label>
                    <div class="col-sm-5">
                        <input type="password" name="password" class="form-control" id="password" placeholder="Password"
                               value="<?= $password ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="confirmPassword" class="col-sm-5 control-label text-center">Confirm password</label>
                    <div class="col-sm-5">
                        <input type="password" name="confirmPassword" class="form-control" id="confirmPassword"
                               placeholder="Confirm password"
                               value="<?= $confirmPassword ?>">
                    </div>
                </div>
                <div class="form-group">
                    <div class="radio col-sm-offset-6">
                        <label>
                            <input type="radio" name="type" value="airline" id="type" checked>
                            Компания
                        </label>
                    </div>
                    <div class="radio col-sm-offset-6">
                        <label>
                            <input type="radio" name="type" value="service" id="type">
                            Сервис
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <button type="submit" name="reg" class="btn btn-success col-sm-offset-5">Зарегистрироваться</button>
                </div>
            </form>
        </div>
    </div>
<?
View::endBody();
?>