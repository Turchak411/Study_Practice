<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="/template/css/bootstrap.css">
    <link rel="stylesheet" href="/template/css/bootstrap-theme.css">
</head>
<body>
<div class="container">
    <table class="table">
        <tr>
            <th>AirlineID</th>
            <th>Name</th>
            <th>Country</th>
            <th>City</th>
            <th>Rating</th>
        </tr>
        <?
        foreach ($airlines as $airline) {
            ?>
            <tr>
                <th><?=$airline["AirlineID"]?></th>
                <th><?= $airline["Name"] ?></th>
                <th><?= $airline["Country"] ?></th>
                <th><?= $airline["City"] ?></th>
                <th><?= $airline["Rating"] ?></th>
            </tr>
            <?
        }
        ?>
    </table>
</div>
</body>
</html>