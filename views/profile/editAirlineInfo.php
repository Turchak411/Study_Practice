<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="/template/css/bootstrap.css">
    <link rel="stylesheet" href="/template/css/bootstrap-theme.css">
</head>
<body>
<div class="container">
    <form method="post">
        <div class="form-group">
            <label for="name">Название компании</label>
            <input type="text" id="name" name="name" class="form-control" value="<?= $name ?>">
        </div>
        <div class="form-group">
            <label for="country">Страна</label>
            <input type="text" id="country" name="country" class="form-control" value="<?= $country ?>">
        </div>
        <div class="form-group">
            <label for="city">Город</label>
            <input type="text" id="city" name="city" class="form-control" value="<?= $city ?>">
        </div>
        <button class="btn btn-success" name="editInfo">Сохранить изменения</button>
    </form>
</div>
</body>
</html>