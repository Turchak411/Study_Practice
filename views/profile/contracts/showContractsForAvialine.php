<?
View::startBody("Контракты");
$path = array(
    ["name" => "профиль", "path" => "profile"],
    ["name" => "контракты", "path" => "contracts"],
);
?>
    <div class="col-md-12">
        <? View::getNavigationPath($path); ?>
        <h1>Контракты</h1>
        <p>Вы можете <a href="/profile/contracts/add">заключить контракт</a>, перейдя по этой ссылке</p>
        <?
        if (!empty($unconfirmedContracts)) {
            ?>
            <section id="confirm">
                <h2>Запросы на подтверждение</h2>
                <table class="table">
                    <tr>
                        <th>Номер контракта</th>
                        <th>Сервис</th>
                        <th>Действия</th>
                    </tr>
                    <?
                    foreach ($unconfirmedContracts as $contract) {
                        ?>
                        <tr>
                            <td><?= $contract['ContractID'] ?></td>
                            <td><?= $contract['ServiceID'] ?></td>
                            <td>
                                <form method="post" class="form-inline">
                                    <div class="form-group">
                                        <button type="submit" name="accept" class="btn btn-success">Принять</button>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" name="reject" class="btn btn-danger">Отклонить</button>
                                    </div>
                                    <input type="hidden" name="id" value="<?= $contract['ContractID'] ?>">
                                </form>
                            </td>
                        </tr>
                        <?
                    }
                    ?>
                </table>
            </section>
            <?
        }
        ?>
        <section id="contracts">
            <h2>Контракты с вашей авиалинией</h2>
            <?
            if (!empty($contracts)) {
                ?>
                <table class="table">
                    <tr>
                        <th>Номер</th>
                        <th>Сервис</th>
                        <th>Действия</th>
                    </tr>
                    <?
                    foreach ($contracts as $contract) {
                        ?>
                        <tr>
                            <td><?= $contract['ContractID'] ?></td>
                            <td><?= $contract['ServiceID'] ?></td>
                            <td>
                                <a href="/profile/contracts/<?= $contract['ContractID'] ?>" class="btn btn-info">Подробнее</a>
                            </td>
                        </tr>
                        <?
                    }
                    ?>
                </table>
                <?
            } else {
                ?>
                <p>Подтвержденных контрактов с вашей авиалинией не найдено!</p>
                <?
            }
            ?>
        </section>
    </div>
<?
View::endBody();
?>