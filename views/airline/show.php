<?
View::startBody("Контракты");
$id = $airlineInfo['AirlineID'];
$name = $airlineInfo['Name'];
$country = $airlineInfo['Country'];
$city = $airlineInfo['City'];
$rating = $airlineInfo['Rating'];
$path = array(
    ["name" => "авиалинии", "path" => "airlines"],
    ["name" => $name, "path" => $id],
);
?>
    <div class="col-md-12">
        <? View::getNavigationPath($path) ?>
        <h1>Информация о сервисе <span class="text-accent"><?= $name?></span></h1>
        <section id="info">
            <p>Название: <span><?= $name?></span></p>
            <p>Страна: <span><?= $country?></span></p>
            <p>Город: <span><?= $city?></span></p>
            <p>Рейтинг: <span><?= $rating?></span></p>
        </section>
    </div>
<?
View::endBody();
?>