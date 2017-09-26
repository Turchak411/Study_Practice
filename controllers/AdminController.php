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

    public function actionRequest($id = -1)
    {
        if (isset($_POST['accept'])) {
            $userId = $_POST['accept'];
            Admin::acceptUser($userId);
        }
        if ($id >= 0) {
            var_dump($id);
            $userList = Admin::getRequestByID($id);
            var_dump($userList);
            print_r($userList);

        } else {
            $userList = Admin::getRegistrationRequestList();
            return self::Render('admin', 'requestList', compact('userList'));
        }
        return true;
    }
}