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
                $errors[] = "Пользователь с таким логином уже зарегистрирован";
            }
            if (User::checkEmailExists($email)) {
                $errors[] = "Пользователь с такой почтой уже зарегистрирован";
            }
            if (!$errors) {
                if (!User::checkLogin($login)) {
                    $errors[] = "Длинна логина должна быть не менее 6 симовлов";
                }
                if (!User::checkPassword($password)) {
                    $errors[] = "Длинна пароля должна быть не менее 6 симовлов";
                }
                if (!User::checkPasswordConfirm($password, $confirmPassword)) {
                    $errors[] = "Пароли не совпадают";
                }
                if (!User::checkEmail($email)) {
                    $errors[] = "Email введен неправильно";
                }
                //TODO: проверка типа
                print_r($errors);
                if (!$errors) {
                    $result = User::register($login, $email, $password, $type);
                    if ($result) {
                        $userId = User::checkUserData($login, $password);
                        if ($userId) {
                            Auth::authorize($userId);
                            echo "Привет, " . $userId;
                        }
                    } else {
                        echo "we";
                    }
                }
            }
            if ($errors) {
                echo "<code>";
                print_r($errors);
                echo "</code>";
            }
        }
        echo "<code>";
        print_r($_SESSION);
        echo "</code>";
        return self::Render('user', 'register', compact('login', 'email', 'password', 'confirmPassword', 'type'));
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
                $errors[] = "Пользователя с таким логином не существует";
            }

            if (!$errors) {
                $userId = User::checkUserData($login, $password);
                if ($userId) {
                    Auth::authorize($userId);
                    header("Location: /");
                } else {
                    $errors[] = "Неверный пароль";
                }
            }
            if ($errors) {
                //TODO: Вывод ошибок
                echo "<code>";
                print_r($errors);
                echo "</code>";
            }
        }
        return self::Render('user', 'login', compact('login', 'password'));
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