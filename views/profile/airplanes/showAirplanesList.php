<?
View::startBody("Список самолетов");
$path = array(
    ["name" => "профиль", "path" => "profile"],
    ["name" => "самолеты", "path" => "airplanes"],
);
?>
    <div class="col-md-12">
        <? View::getNavigationPath($path) ?>
        <h1>Самолеты</h1>
        <p>Вы можете <a href="/profile/airplanes/add">добавить самолет</a>, перейдя по этой ссылке</p>

        <section id="airplanes">
            <h2>Список ваших самолетов</h2>
            <?
            if (!empty($airplanes)) {
                ?>
                <table class="table">
                    <tr>
                        <th>Название</th>
                        <th>Дата создания</th>
                        <th>Ограничение операций</th>
                        <th>Действия</th>
                    </tr>
                    <?
                    foreach ($airplanes as $airplane) {
                        ?>
                        <tr>
                            <td><?= $airplane['Name'] ?></td>
                            <td><?= $airplane['ProductionDate'] ?></td>
                            <td><?= $airplane['MaxOperatingDays'] ?></td>
                            <td><a href="/profile/airplanes/<?= $airplane['AirplaneID']?>" class="btn btn-info">Подробнее</a></td>
                        </tr>
                        <?
                    }
                    ?>
                </table>
                <?
            } else {
                ?>
                <p>В вашей компании самолеты еще не добавлены!</p>
                <?
            }
            ?>
        </section>
    </div>
<?
View::endBody();
?>