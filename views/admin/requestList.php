<?
View::startBody("Список пользователей, для авторизации");
$path = array(
    ["name" => "Управление пользователями", "path" => "admin/requests"],
);
?>
    <div class="col-md-12">
        <? View::getNavigationPath($path); ?>
        <table class="table">
            <tr>
                <th>UserID</th>
                <th>Login</th>
                <th>Email</th>
                <th>UserType</th>
                <th>IsValidated</th>
                <th>Действия</th>
            </tr>
            <?
            foreach ($userList as $user) {
                ?>
                <tr>
                    <th><?= $user["UserID"] ?></th>
                    <th><?= $user["Login"] ?></th>
                    <th><?= $user["Email"] ?></th>
                    <th><?= $user["UserType"] ?></th>
                    <th><?= $user["IsValidated"] ?></th>
                    <th>
                        <form method="post" class="form-inline">
                            <div class="form-group">
                                <button type="submit" name="accept" class="btn btn-success"
                                        value="<?= $user["UserID"] ?>">Принять
                                </button>
                            </div>
                        </form>
                    </th>
                </tr>
                <?
            }
            ?>
        </table>
    </div>
<?
View::endBody();
?>