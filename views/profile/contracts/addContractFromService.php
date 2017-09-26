<?
View::startBody("Запрос на создание контракта");
$path = array(
    ["name" => "профиль", "path" => "profile"],
    ["name" => "контракты", "path" => "contracts"],
    ["name" => "запрос", "path" => "add"],
);
?>
    <div class="col-md-12">
        <? View::getNavigationPath($path) ?>
        <form method="post" class="form-horizontal">
            <div class="form-group">
                <label for="airline" class="control-label">Авиалиния</label>
                <select name="airline" class="form-control" id="airline">
                    <?
                    foreach ($airlines as $airline) {
                        echo "<option value='" . $airline['AirlineID'] . "'>" . trim($airline['Name']) . "</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="dateStart" class="control-label">Дата начала контракта</label>
                <input type="date" name="dateStart" class="form-control" id="dateStart" placeholder="Login"
                       value="<?= $currentData ?>" min="<?= $currentData ?>">
            </div>
            <div class="form-group">
                <label for="dateEnd" class="control-label">Дата завершения контракта</label>
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