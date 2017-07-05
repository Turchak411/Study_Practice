<?php

class ProfileController extends BaseController
{
    function __construct()
    {
        Profile::checkPrivateAccess();
    }

    public function actionIndex()
    {
        if (Profile::isNeedEditAirlineFrofile(1))
        {
            header("Location: /profile/edit");
            return true;
        }
        if (!Profile::isUserValidated(1))
        {
            return self::Render('profile', 'waitingForConfirmation');
        }

        return self::Render('profile', 'index');
    }

    public function actionEdit()
    {
        return self::Render('profile', 'edit');
    }
}