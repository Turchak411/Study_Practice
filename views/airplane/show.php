<?
View::startBody("Контракты");
$id = $airplaneInfo['AirplaneID'];
$name = $airplaneInfo['Name'];
$productionDate = $airplaneInfo['ProductionDate'];
$maxOperatingDays = $airplaneInfo['MaxOperatingDays'];
$owner = $airplaneInfo['Owner'];
$path = array(
    ["name" => "самолеты", "path" => "airplanes"],
    ["name" => $name, "path" => $id],
);
?>
    <div class="col-md-12">
        <? View::getNavigationPath($path) ?>
        <h1>Информация о самолете <span class="text-accent"><?= $name?></span></h1>
        <section id="info">
            <p>Название: <span><?= $name?></span></p>
            <p>Дата производства: <span><?= $productionDate?></span></p>
            <p>Количество операций: <span><?= $maxOperatingDays?></span></p>
            <p>Владелец: <span><?= $owner?></span></p>
        </section>
    </div>
<?
View::endBody();
?>