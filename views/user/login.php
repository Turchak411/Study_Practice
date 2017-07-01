<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Авторизация</title>
    <link rel="stylesheet" href="/template/css/bootstrap.css">
    <link rel="stylesheet" href="/template/css/bootstrap-theme.css">
</head>
<body>
<div class="container">
    <form method="post" class="form-horizontal">
        <div class="form-group">
            <label for="login">Логин пользователя</label>
            <input type="text" name="login" id="login" class="form-control" value="<?= $login?>">
        </div>
        <div class="form-group">
            <label for="password">Пароль</label>
            <input type="password" name="password" id="password" class="form-control" value="<?= $password?>">
        </div>
        <div class="form-group">
            <button type="submit" name="log" class="btn btn-warning">Войти</button>
        </div>
    </form>
</div>
</body>
</html>