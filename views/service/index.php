<?
View::startBody("Список сервисов");
$path = array(
    ["name" => "сервисы", "path" => "services"],
);
?>
    <div class="col-md-12">
        <? View::getNavigationPath($path) ?>
        <section id="info">
            <table class="table">
                <tr>
                    <th>Название сервиса</th>
                    <th>Страна</th>
                    <th>Город</th>
                    <th>Рейтинг</th>
                </tr>
                <?
                foreach ($services as $service) {
                    ?>
                    <tr>
                        <td><a href="/services/<?= $service["ServiceID"] ?>"><?= $service["Name"] ?></a></td>
                        <td><?= $service["Country"] ?></td>
                        <td><?= $service["City"] ?></td>
                        <td><?= $service["Rating"] ?></td>
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