<?php

class AdminController extends BaseController
{
    function __construct()
    {
        Admin::checkPrivateAccess();
    }

    public function actionIndex()
    {
        return true;
    }
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