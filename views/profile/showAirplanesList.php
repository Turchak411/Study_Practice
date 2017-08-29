<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Профиль</title>
    <link rel="stylesheet" href="/template/css/bootstrap.css">
    <link rel="stylesheet" href="/template/css/bootstrap-theme.css">
    <link rel="stylesheet" href="/template/css/style_profile.css">
</head>
<body>
<div class="container">
    <table class="table">
        <?
        foreach ($airplanes as $airplane) {
            ?>
            <tr>
                <td><?= $airplane['AirplaneID'] ?></td>
                <td><?= $airplane['ProductionDate'] ?></td>
                <td><?= $airplane['MaxOperatingDays'] ?></td>
                <td><?= $airplane['Owner'] ?></td>
            </tr>
            <?
        }
        ?>

    </table>
</div>
</body>
</html>