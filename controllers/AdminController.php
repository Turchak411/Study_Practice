<?php

/**
 * Created by PhpStorm.
 * User: Pavel
 * Date: 05.07.2017
 * Time: 18:06
 */
class AdminController extends BaseController
{
    public function actionRequestList()
    {
        $userList = Admin::getRegistrationRequestList();
        return self::Render('admin', 'requestList', compact('userList'));
    }
    public function actionRequest($id)
    {
        var_dump($id);
        $userList = Admin::getRequestByID($id);
        var_dump($userList);
        print_r($userList);
        return true;
    }
}