<?
View::startBody("Авторизация");
?>
    <form method="post" class="form-horizontal">
        <div class="form-group">
            <label for="date" class="control-label text-center">Дата производства</label>
            <input type="date" name="date" class="form-control" id="date" placeholder="Login"
                   value="<?= $date ?>">
        </div>
        <div class="form-group">
            <label for="limit" class="control-label text-center">Лимит</label>
            <input type="number" name="limit" class="form-control" id="limit" placeholder="Количество операций"
                   value="<?= $limit ?>">
        </div>
        <div class="form-group">
            <label for="service" class="control-label text-center">Сервис</label>
            <select name="service" class="form-control" id="service">
                <? foreach ($services as $service) {
                    echo "<option>" . trim($service['Name']) . "</option>";
                }
                ?>
            </select>
        </div>
        <div class="form-group">
            <label for="airplane" class="control-label text-center">Самолет</label>
            <select name="airplane" class="form-control" id="airplane">
                <option>Самолет 1</option>
                <option>Самолет 2</option>
                <option>Самолет 3</option>
                <option>Самолет 4</option>
                <option>Самолет 5</option>
            </select>
        </div>
        <div class="form-group">
            <button type="submit" name="add" class="btn btn-success">Добавить</button>
        </div>
    </form>
<?
View::endBody();
?>