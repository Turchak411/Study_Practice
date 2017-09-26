<?
$id = $airplaneInfo['AirplaneID'];
$name = $airplaneInfo['Name'];
$productionDate = $airplaneInfo['ProductionDate'];
$operations = $airplaneInfo['MaxOperatingDays'];
$owner = $airplaneInfo['Owner'];
View::startBody("Самолет - " . $name);

$path = array(
    ["name" => "профиль", "path" => "profile"],
    ["name" => "самолеты", "path" => "airplanes"],
    ["name" => $name, "path" => $id],
);
?>
    <div class="col-md-12">
        <? View::getNavigationPath($path) ?>
        <h1>Информация о самолете <span class="text-accent"><?= $name ?></span></h1>
        <section id="info">
            <p>Авиалиния: <?= $owner ?></p>
            <p>Название: <?= $name ?></p>
            <p>Дата создания: <?= $productionDate ?></p>
            <p>Ограничения: <?= $operations ?></p>
        </section>
    </div>
<?
View::endBody();
?>