<?
View::startBody("Данные профиля");
$path = array(
    ["name" => "профиль", "path" => "profile"],
    ["name" => "Редактировать", "path" => "edit"],
);
?>
    <div class="col-md-12">
        <? View::getNavigationPath($path) ?>
        <form method="post">
            <div class="form-group">
                <label for="name">Название сервиса</label>
                <input type="text" id="name" name="name" class="form-control" value="<?= $name ?>">
                <?
                if (isset($errors['nameError'])) {
                    echo '<p class="text-danger">'.$errors['nameError'].'</p>';
                }
                ?>
            </div>
            <div class="form-group">
                <label for="country">Страна</label>
                <input type="text" id="country" name="country" class="form-control" value="<?= $country ?>">
                <?
                if (isset($errors['countryError'])) {
                    echo '<p class="text-danger">'.$errors['countryError'].'</p>';
                }
                ?>
            </div>
            <div class="form-group">
                <label for="city">Город</label>
                <input type="text" id="city" name="city" class="form-control" value="<?= $city ?>">
                <?
                if (isset($errors['cityError'])) {
                    echo '<p class="text-danger">'.$errors['cityError'].'</p>';
                }
                ?>
            </div>
            <button class="btn btn-success" name="editInfo">Сохранить изменения</button>
            <?
            if (isset($errors) && empty($errors)) {
                echo '<p class="text-success">Данные успешно изменены</p>';
            }
            ?>
        </form>
    </div>
<?
View::endBody();
?>