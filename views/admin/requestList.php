<?
View::startBody("Список пользователей, для авторизации")
?>
<div class="container">
    <table class="table">
        <tr>
            <th>UserID</th>
            <th>Login</th>
            <th>Email</th>
            <th>UserType</th>
            <th>IsValidated</th>
        </tr>
        <?
        foreach ($userList as $user) {
            ?>
            <tr>
                <th><?=$user["UserID"]?></th>
                <th><?= $user["Login"] ?></th>
                <th><?= $user["Email"] ?></th>
                <th><?= $user["UserType"] ?></th>
                <th><?= $user["IsValidated"] ?></th>
            </tr>
            <?
        }
        ?>
    </table>
</div>
<?
View::endBody()
?>