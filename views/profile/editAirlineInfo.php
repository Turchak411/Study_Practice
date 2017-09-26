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
            <label for="name">Название компании</label>
            <input type="text" id="name" name="name" class="form-control" value="<?= $name ?>">
            <?
            if (isset($errors['nameError']))
            {
                echo '<p class="text-danger">Пожалуйста, введите корректное название.</p>';
            }
            ?>
        </div>
        <div class="form-group">
            <label for="country">Страна</label>
            <input type="text" id="country" name="country" class="form-control" value="<?= $country ?>">
            <?
            if (isset($errors['countryError']))
            {
                echo '<p class="text-danger">Пожалуйста, проверьте корректность ввода названия страны.</p>';
            }
            ?>
        </div>
        <div class="form-group">
            <label for="city">Город</label>
            <input type="text" id="city" name="city" class="form-control" value="<?= $city ?>">
            <?
            if (isset($errors['cityError']))
            {
                echo '<p class="text-danger">Пожалуйста, проверьте корректность ввода названия города.</p>';
            }
            ?>
        </div>
        <button class="btn btn-success" name="editInfo">Сохранить изменения</button>
        <?
        if (isset($errors) && empty($errors))
        {
            echo '<p class="text-success">Данные успешно изменены</p>';
        }
        ?>
    </form>
</div>
<?
View::endBody();
?>