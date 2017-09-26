<?
View::startBody("Добавление самолета на обслуживание");
$path = array(
    ["name" => "профиль", "path" => "profile"],
    ["name" => "контракты", "path" => "contracts"],
    ["name" => "контракт №" . $contractId, "path" => "contracts/" . $contractId],
    ["name" => "добавление", "path" => "add"],
);
?>
    <div class="col-md-12">
        <? View::getNavigationPath($path) ?>
        <form method="post" class="form-horizontal">
            <div class="form-group">
                <label for="airplane" class="control-label text-center">Обслуживаемый самолет</label>
                <select name="airplane" class="form-control" id="airplane">
                    <?
                    foreach ($airplanes as $airplane) {
                        echo "<option value='" . $airplane['AirplaneID'] . "'>" . $airplane['Name'] . "</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="cost" class="control-label text-center">Стоимость обслуживания</label>
                <input type="number" name="cost" class="form-control" id="cost" placeholder="Login"
                       value="<?= $cost ?>" min="0">
            </div>
            <div class="form-group">
                <button type="submit" name="addAirplane" class="btn btn-success">Добавить самолет</button>
            </div>
        </form>
    </div>
<?
View::endBody();
?>