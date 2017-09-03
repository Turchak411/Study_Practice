<?
View::startBody("Профиль пользователя")
?>
     <div class="container">
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
    </div>

<?
View::endBody()
?>