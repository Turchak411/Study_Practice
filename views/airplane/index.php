<?
View::startBody("Список самолетов");
$path = array(
    ["name" => "самолеты", "path" => "airplanes"],
);
?>
    <div class="col-md-12">
        <? View::getNavigationPath($path) ?>
        <section id="info">
            <table class="table">
                <tr>
                    <th>Название самолета</th>
                    <th>Дата производства</th>
                    <th>Ограничение количества операций</th>
                    <th>Владелец</th>
                </tr>
                <?
                foreach ($airplanes as $airplane) {
                    ?>
                    <tr>
                        <td><a href="/airplanes/<?= $airplane["AirplaneID"] ?>"><?= $airplane["Name"] ?></a></td>
                        <td><?= $airplane["ProductionDate"] ?></td>
                        <td><?= $airplane["MaxOperatingDays"] ?></td>
                        <td><?= $airplane["Owner"] ?></td>
                    </tr>
                    <?
                }
                ?>
            </table>
        </section>
    </div>
<?
View::endBody();
?>