<?php

/**
 * Created by PhpStorm.
 * User: Pavel
 * Date: 01.07.17
 * Time: 18:08
 */
class ProfileController extends BaseController
{
    public function actionIndex()
    {
        return self::Render('profile', 'index');
    }
}