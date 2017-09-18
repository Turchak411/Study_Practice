<?
View::startBody("Контракты")
?>
<? $contracts ?>
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
<?
View::endBody();
?>