<?
View::startBody("Добавление самолета");
$path = array(
    ["name" => "профиль", "path" => "profile"],
    ["name" => "самолеты", "path" => "airplanes"],
    ["name" => "добавить", "path" => "add"],
);
?>
    <div class="col-md-12">
        <? View::getNavigationPath($path) ?>
            <form method="post" class="form-horizontal">
                <div class="form-group">
                    <label for="name" class="control-label text-center">Дата производства</label>
                    <input type="text" name="name" class="form-control" id="name" placeholder="Название"
                           value="<?= $name ?>" required>
                    <?
                    if (isset($errors['nameError'])) {
                        echo '<p class="text-danger">'.$errors["nameError"].'</p>';
                    }
                    ?>
                </div>
                <div class="form-group">
                    <label for="date" class="control-label text-center">Дата производства</label>
                    <input type="date" name="date" class="form-control" id="date" placeholder="Дата"
                           value="<?= $date ?>" required>
                    <?
                    if (isset($errors['dateError'])) {
                        echo '<p class="text-danger">'.$errors["dateError"].'</p>';
                    }
                    ?>
                </div>
                <div class="form-group">
                    <label for="limit" class="control-label text-center">Лимит</label>
                    <input type="number" name="limit" class="form-control" id="limit" placeholder="Количество операций"
                           value="<?= $limit ?>" required>
                    <?
                    if (isset($errors['limitError'])) {
                        echo '<p class="text-danger">'.$errors["limitError"].'</p>';
                    }
                    ?>
                </div>
                <div class="form-group">
                    <button type="submit" name="add" class="btn btn-success">Добавить</button>
                    <?
                    if (isset($errors) && empty($errors)) {
                        echo '<p class="text-success">Данные успешно изменены</p>';
                    }
                    ?>
                </div>
            </form>
    </div>
<?
View::endBody();
?>