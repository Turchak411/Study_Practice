<?
View::startBody("Контракты");
$contractId = $contractInfo['ContractID'];
$path = array(
    ["name" => "профиль", "path" => "profile"],
    ["name" => "контракты", "path" => "contracts"],
    ["name" => "контракт №" . $contractId, "path" => "contracts/" . $contractId],
);
?>
    <div class="col-md-12">
        <? View::getNavigationPath($path) ?>
        <h1>Информация о контракте <span class="text-accent">№<?= $contractInfo['ContractID'] ?></span></h1>
        <section id="info">
            <p>Авиалиния: </p>
            <p>Сервис: </p>
            <p>Дата начала договора: <?= $contractInfo['StartDate'] ?></p>
            <p>Дата окончания договора: <?= $contractInfo['EndDate'] ?></p>
            <p>Подтверждено авиалинией: </p>
            <p>Подтверждено сервисом: </p>
            <p>Договор активен: </p>
        </section>
        <section id="airplane-manage">
            <h2>Самолеты на обслуживании</h2>
            <p>Вы можете <a href="/profile/contracts/<?= $contractInfo['ContractID'] ?>/add">заказать обслуживание</a>
                самолетов</p>
            <?
            if (!empty($airplanes)) {
                ?>
                <table class="table">
                    <tr>
                        <th>Номер</th>
                        <th>Номер Контракта</th>
                        <th>Самолет</th>
                        <th>Стоимость</th>
                    </tr>
                    <?
                    foreach ($airplanes as $airplane) {
                        ?>
                        <tr>
                            <td><?= $airplane['ID'] ?></td>
                            <td><?= $airplane['ContractID'] ?></td>
                            <td><?= $airplane['AirplaneID'] ?></td>
                            <td><?= $airplane['Cost'] ?></td>
                        </tr>
                        <?
                    }
                    ?>
                </table>
                <?
            } else {
                ?>
                <p>Обслуживание самолетов данной фирмой не производится!</p>
                <?
            }
            ?>
        </section>
    </div>
<?
View::endBody();
?>