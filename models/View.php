<?php

class View
{
    public static function startBody($title = "")
    {
        BaseController::Render('layouts', 'header', compact('title'));
    }
    public static function endBody()
    {
        require_once ROOT."/views/layouts/footer.php";
    }
}