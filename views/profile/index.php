<?
View::startBody("Профиль пользователя")
?>
    <div class="profile-navigate">
        <a href="/profile/contracts" class="btn btn-default">Контракты</a>
        <a href="/profile/airplanes" class="btn btn-default">Самолеты</a>
        <a href="/profile/edit" class="btn btn-default">Изменить профиль</a>
    </div>
<div class="col-md-12">
</div>
    <form method="post" class="form-horizontal">
        <div class="form-group">
            <label for="login" class="col-sm-5 control-label text-center">Login</label>
            <div class="col-sm-3">
                <input type="text" name="login" class="form-control" id="login" placeholder="Login"
                       value="<?= $login ?>">
            </div>
        </div>
        <div class="form-group">
            <label for="email" class="col-sm-5 control-label text-center">Email</label>
            <div class="col-sm-3">
                <input type="email" name="email" class="form-control" id="email" placeholder="Email"
                       value="<?= $email ?>">
            </div>
        </div>
        <div class="form-group">
            <label for="password" class="col-sm-5 control-label text-center">Password</label>
            <div class="col-sm-3">
                <input type="text" name="password" class="form-control" id="password" placeholder="Password"
                       value="<?= $password ?>">
            </div>
        </div>
        <div class="form-group">
            <button type="submit" name="log" class="btn btn-success">Принять</button>
        </div>
    </form>
<?
View::endBody()
?>