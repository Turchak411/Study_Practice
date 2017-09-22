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
                    <th>Название авиалинии</th>
                    <th>Страна</th>
                    <th>Город</th>
                    <th>Рейтинг</th>
                </tr>
                <?
                foreach ($airlines as $airline) {
                    ?>
                    <tr>
                        <td><a href="/airlines/<?= $airline["AirlineID"] ?>"><?= $airline["Name"] ?></a></td>
                        <td><?= $airline["Country"] ?></td>
                        <td><?= $airline["City"] ?></td>
                        <td><?= $airline["Rating"] ?></td>
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