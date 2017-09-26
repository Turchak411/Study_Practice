<?
View::startBody("Профиль пользователя");
$path = array(
    ["name" => "профиль", "path" => "profile"],
);
?>
    <div class="col-md-12">
        <? View::getNavigationPath($path) ?>
        <h1>Профиль пользователя</h1>
    </div>
<?
View::endBody()
?>