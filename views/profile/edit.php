<?
View::startBody("Авторизация");
?>
    <form method="post">
        <div class="form-group">
            <label for="name">Название компании</label>
            <input type="text" id="name" class="form-control">
        </div>
        <div class="form-group">
            <label for="country">Страна</label>
            <input type="text" id="country" class="form-control">
        </div>
        <div class="form-group">
            <label for="city">Город</label>
            <input type="text" id="city" class="form-control">
        </div>
        <button class="btn btn-success">Сохранить изменения</button>
    </form>
<?
View::endBody();
?>