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
                        <th>Авиалиния</th>
                        <th>Статус</th>
                        <th>Действия</th>
                    </tr>
                    <?
                    foreach ($unconfirmedContracts as $contract) {
                        ?>
                        <tr>
                            <td><?= $contract['ContractID'] ?></td>
                            <td><?= $contract['AirlineID'] ?></td>
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
            <h2>Контракты с вашем сервисом</h2>
            <?
            if (!empty($contracts)) {
                ?>
                <table class="table">
                    <tr>
                        <th>Авиалиния</th>
                        <th>Действия</th>
                        <th>Статус</th>
                    </tr>
                    <?
                    foreach ($contracts as $contract) {
                        switch (ServiceContract::getContractStatus($contract['ContractID'])) {
                            case ServiceContract::ACTIVE:
                                $status = "success";
                                $statusText = "Подтвержден";
                                break;
                            case ServiceContract::WAITING_AIRLINE_CONFIRM:
                                $status = "warning";
                                $statusText = "Ожидает подтверждение авиалинии";
                                break;
                            case ServiceContract::WAITING_SERVICE_CONFIRM:
                                $status = "warning";
                                $statusText = "Ожидает подтверждение сервиса";
                                break;
                            default:
                                $status = "danger";
                                $statusText = "Не подтвержден";
                                break;
                        }
                        ?>
                        <tr>
                            <td><?= $contract['AirlineID'] ?></td>
                            <td>
                                <a href="/profile/contracts/<?= $contract['ContractID'] ?>" class="btn btn-info">Подробнее</a>
                            </td>
                            <td class="<?= $status ?>"><?= $statusText ?></td>
                        </tr>
                        <?
                    }
                    ?>
                </table>
                <?
            } else {
                ?>
                <p>Подтвержденных контрактов с вашем сервисом не найдено!</p>
                <?
            }
            ?>
        </section>
    </div>
<?
View::endBody();
?>