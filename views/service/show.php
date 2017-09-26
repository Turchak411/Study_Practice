<?
View::startBody("Контракты");
$id = $serviceInfo['ServiceID'];
$name = $serviceInfo['Name'];
$country = $serviceInfo['Country'];
$city = $serviceInfo['City'];
$rating = $serviceInfo['Rating'];
$path = array(
    ["name" => "сервисы", "path" => "services"],
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