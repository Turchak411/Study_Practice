<?
View::startBody("Авторизация")
?>
    <div class="row">
        <div class="col-md-6">
            <form method="post" class="form-horizontal">
                <div class="form-group">
                    <label for="login" control-label text-center">Login</label>
                    <input type="text" name="login" class="form-control" id="login" placeholder="Login"
                           value="<?= $login ?>">
                </div>
                <div class="form-group">
                    <label for="password" class="control-label text-center">Password</label>
                    <input type="password" name="password" class="form-control" id="password" placeholder="Password"
                           value="<?= $password ?>">
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
    <!--<link rel="stylesheet" href="/template/css/style_profile.css">-->
<?
View::endBody() ?>