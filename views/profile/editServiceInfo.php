<?
View::startBody("Авторизация");
?>
    <form method="post">
        <div class="form-group">
            <label for="name">Название сервиса</label>
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
<?
View::endBody();
?>