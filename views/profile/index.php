<!doctype html>
<html lang="ru">
<div style="text-align:center">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Авторизация</title>
        <link rel="stylesheet" href="/template/css/bootstrap.css">
        <link rel="stylesheet" href="/template/css/bootstrap-theme.css">
        <link rel="stylesheet" href="/template/css/style_profile.css">
        <h1><?= $login?>>
            <small>Profile</small>
        </h1>
        <br<br<br><br>
    </head>
    <body>
    <div class="container">
        <form method="post" class="form-horizontal">
            <div class="form-group">
                <label for="login" class="col-sm-5 control-label text-center">Login</label>
                <div class="col-sm-3">
                    <input type="login" name="login" class="form-control" id="login" placeholder="Login"
                           value="<?= $login?>">
                </div>
            </div>
            <div class="form-group">
                <label for="email" class="col-sm-5 control-label text-center">Email</label>
                <div class="col-sm-3">
                    <input type="email" name="email" class="form-control" id="email" placeholder="Email"
                           value="<?= $email?>">
                </div>
            </div>
            <div class="form-group">
                <label for="password" class="col-sm-5 control-label text-center">Password</label>
                <div class="col-sm-3">
                    <input type="text" name="login" class="form-control" id="login" placeholder="Password"
                           value="<?= $password?>">
                </div>
            </div>
            <div class="form-group">
                <button type="submit" name="log" class="btn btn-success">Принять</button>
            </div>
        </form>
    </div>
    </body>
</html>