<?
View::startBody("Профиль пользователя");
$path = array(
    ["name" => "профиль", "path" => "profile"],
);
?>
    <div class="col-md-12">
        <? View::getNavigationPath($path) ?>
        <h1>Профиль пользователя</h1>
        <section id="contracts">
            <h2>Контракты</h2>
            <p>В данном пункте вы можете открыть запрос на создание контракта, на обслуживание авиалинии сервисом</p>
            <a href="/profile/contracts" class="btn btn-info">Перейти в контракты</a>
        </section>
    </div>
<?
View::endBody()
?>