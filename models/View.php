<?php

class View
{
    public static function startBody($title = "")
    {
        BaseController::Render('layouts', 'header', compact('title'));
    }

    public static function endBody()
    {
        require_once ROOT . "/views/layouts/footer.php";
    }

    public static function getNavigationPath($pathArrays)
    {
        echo "<div class='profile-navigate''>";
        echo "<p>";
        if (!empty($pathArrays)) {
            $count = count($pathArrays) - 1;
            $path = "";
            for ($i = 0; $i < $count; $i++) {
                $path = $path . "/" . $pathArrays[$i]["path"];
                echo "<a href='" . $path . "'>" . $pathArrays[$i]["name"] . "</a> / ";
            }
            echo $pathArrays[$count]["name"];
        }
        echo "</p>";
        echo "</div>";
    }
}