<?
View::startBody("Запрос на создание контракта");
?>
    <div class="col-md-12">
        <form method="post" class="form-horizontal">
            <div class="form-group">
                <label for="service" class="control-label text-center">Сервис</label>
                <select name="service" class="form-control" id="service">
                    <?
                    foreach ($services as $service) {
                        echo "<option value='" . $service['ServiceID'] . "'>" . trim($service['Name']) . "</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="dateStart" class="control-label text-center">Дата начала контракта</label>
                <input type="date" name="dateStart" class="form-control" id="dateStart" placeholder="Login"
                       value="<?= $currentData ?>" min="<?= $currentData ?>">
            </div>
            <div class="form-group">
                <label for="dateEnd" class="control-label text-center">Дата завершения контракта</label>
                <input type="date" name="dateEnd" class="form-control" id="dateEnd" placeholder="Login"
                       value="<?= $endDate ?>" min="<?= $currentData ?>">
            </div>
            <div class="form-group">
                <button type="submit" name="confirm" class="btn btn-success">Заключить контракт</button>
            </div>
        </form>
    </div>
<?
View::endBody();
?>