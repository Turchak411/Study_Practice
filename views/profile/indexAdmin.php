<?
View::startBody("Профиль пользователя");
$path = array(
    ["name" => "профиль", "path" => "profile"],
);
?>
    <div class="col-md-12">
        <? View::getNavigationPath($path) ?>
        <h1>Профиль администратора</h1>
        <section id="manage">
            <h2>Управление пользователями</h2>
            <p>В данном пункте вы можете управлять пользователями</p>
            <a href="/admin/requests" class="btn btn-info">Перейти к управлению</a>
        </section>
    </div>
<?
View::endBody()
?>