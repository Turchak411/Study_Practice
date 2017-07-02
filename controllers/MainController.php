<?php

class MainController extends BaseController
{
    public function actionIndex()
    {
        return self::Render("main", "index");
    }

    public function actionMain()
    {
        return self::Render("main", "main");
    }
}