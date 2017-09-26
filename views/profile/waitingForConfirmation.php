<?
View::startBody("Проверка модератором");
$path = array(
    ["name" => "профиль", "path" => "profile"],
);
?>
    <div class="col-md-12">
        <? View::getNavigationPath($path) ?>
        <h2>Ваш запрос на регистрацию находится в процессе обработки</h2>
        <p>Вы можете изменить свои даные на странице <a href="/profile/edit">редактирования профиля</a></p>
    </div>
<?
View::endBody()
?>