<?php

class UserController extends BaseController
{
    public function actionRegistration()
    {
        $login = '';
        $email = '';
        $password = '';
        $confirmPassword = '';
        $type = '';

        if (isset($_POST['reg'])) {
            $login = $_POST['login'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $confirmPassword = $_POST['confirmPassword'];
            $type = $_POST['type'];

            $errors = false;
            if (User::checkLoginExists($login)) {
                $errors['loginError'] = "Пользователь с таким логином уже зарегистрирован";
            }
            if (User::checkEmailExists($email)) {
                $errors['emailError'] = "Пользователь с такой почтой уже зарегистрирован";
            }
            if (!$errors) {
                if (!User::checkLogin($login)) {
                    $errors['loginLengthError'] = "Длинна логина должна быть не менее 6 симовлов";
                }
                if (!User::checkPassword($password)) {
                    $errors['passwordLengthError'] = "Длинна пароля должна быть не менее 6 симовлов";
                }
                if (!User::checkPasswordConfirm($password, $confirmPassword)) {
                    $errors['passwordCheckError'] = "Пароли не совпадают";
                }
                if (!User::checkEmail($email)) {
                    $errors['emailCheckError'] = "Email введен неправильно";
                }
                if (!$errors) {
                    $result = User::register($login, $email, $password, $type);
                    if ($result) {
                        $userId = User::checkUserData($login, $password);
                        if ($userId) {
                            Auth::authorize($userId);
                            header("Location: /profile");
                        }
                    }
                }
            }
        }
        return self::Render('user', 'register', compact('login', 'email', 'password', 'confirmPassword', 'type', 'errors'));
    }

    public function actionLogin()
    {
        if (Auth::checkLogged()) {
            header("Location: /");
        }
        $login = '';
        $password = '';

        if (isset($_POST['log'])) {
            $login = $_POST['login'];
            $password = $_POST['password'];

            $errors = false;
            if (!User::checkLoginExists($login)) {
                $errors['loginError'] = "Пользователя с таким логином не существует";
            }

            if (!$errors) {
                $userId = User::checkUserData($login, $password);
                if ($userId) {
                    Auth::authorize($userId);
                    header("Location: /");
                } else {
                    $errors['passwordError'] = "Неверный пароль";
                }
            }
        }
        return self::Render('user', 'login', compact('login', 'password', 'errors'));
    }

    public function actionLogout()
    {
        if (Auth::checkLogged()) {
            Auth::logout();
        }
        header("Location: /");
        return true;
    }
}