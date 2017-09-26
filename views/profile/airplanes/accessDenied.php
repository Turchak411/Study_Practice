<?
View::startBody("Добавление самолета");
$name = $airplaneInfo['Name'];
$id = $airplaneInfo['AirplaneID'];
$path = array(
    ["name" => "профиль", "path" => "profile"],
    ["name" => "самолеты", "path" => "airplanes"],
    ["name" => $name, "path" => $id],
);
?>
    <div class="col-md-12">
        <? View::getNavigationPath($path) ?>
        <h1>Информация о самолете <span class="text-accent"><?= $name ?></span></h1>
        <p class="text-danger">К сожалению, вы не можнтн редактировать информацию о данном самолете</p>
    </div>
<?
View::endBody();
?>