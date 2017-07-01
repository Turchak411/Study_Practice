<?php

class MainController extends BaseController
{
    public function actionIndex()
    {
        return self::Render("main", "index");
    }
}