<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Регистрация</title>
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
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="form-control" value="<?= $email?>">
        </div>
        <div class="form-group">
            <label for="password">Пароль</label>
            <input type="password" name="password" id="password" class="form-control" value="<?= $password?>">
            <label for="confirmPassword">Повтор пароля</label>
            <input type="password" name="confirmPassword" id="confirmPassword" class="form-control" value="<?= $confirmPassword?>">
        </div>
        <div class="form-group">
            <div class="radio">
                <label>
                    <input type="radio" name="type" value="owner" id="type" checked>
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
            <button type="submit" name="reg" class="btn btn-warning">Зарегистрироваться</button>
        </div>
    </form>
</div>
</body>
</html>