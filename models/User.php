<?php

class User
{
    /**
     * Регистрация пользователя
     * @param string $name <p>Имя</p>
     * @param string $email <p>E-mail</p>
     * @param string $password <p>Пароль</p>
     * @return boolean <p>Результат выполнения метода</p>
     */
    public static function register($login, $email, $password, $type)
    {
        // Соединение с БД
        $db = DB::getConnection();
        // Текст запроса к БД
        $sql = 'INSERT INTO Users (Login, Email, Password, UserType) VALUES (:login, :email, :password, :usertype)';

        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':login', $login, PDO::PARAM_STR);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->bindParam(':password', $password, PDO::PARAM_STR);
        $result->bindParam(':usertype', $type, PDO::PARAM_STR);
        return $result->execute();
    }
    /**
     * Проверяем существует ли пользователь с заданными $login и $password
     * @param string $login <p>Логин пользователя</p>
     * @param string $password <p>Пароль</p>
     * @return mixed : integer user id or false
     */
    public static function checkUserData($login, $password)
    {
        // Соединение с БД
        $db = DB::getConnection();
        // Текст запроса к БД
        $sql = 'SELECT * FROM Users WHERE Login = :login AND password = :password';
        // Получение результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':login', $login, PDO::PARAM_STR);
        $result->bindParam(':password', $password, PDO::PARAM_STR);
        $result->execute();
        // Обращаемся к записи
        $user = $result->fetch();
        if ($user) {
            // Если запись существует, возвращаем id пользователя
            return $user['UserID'];
        }
        return false;
    }
    /**
     * Проверяет логин: не меньше, чем 6 символов
     * @param string $name <p>Логин</p>
     * @return boolean <p>Результат выполнения метода</p>
     */
    public static function checkLogin($name)
    {
        if (strlen($name) >= 6) {
            return true;
        }
        return false;
    }
    /**
     * Проверяет имя: не меньше, чем 6 символов
     * @param string $password <p>Пароль</p>
     * @return boolean <p>Результат выполнения метода</p>
     */
    public static function checkPassword($password)
    {
        if (strlen($password) >= 6) {
            return true;
        }
        return false;
    }
    /**
     * Проверяет совпадают ли пароли
     * @param string $password <p>Пароль</p>
     * @return boolean <p>Результат выполнения метода</p>
     */
    public static function checkPasswordConfirm($password, $confirmPassword)
    {
        if ($password == $confirmPassword) {
            return true;
        }
        return false;
    }
    /**
     * Проверяет email
     * @param string $email <p>E-mail</p>
     * @return boolean <p>Результат выполнения метода</p>
     */
    public static function checkEmail($email)
    {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return true;
        }
        return false;
    }
    /**
     * Проверяет не занят ли email другим пользователем
     * @param string $email <p>E-mail</p>
     * @return boolean <p>Результат выполнения метода</p>
     */
    public static function checkEmailExists($email)
    {
        // Соединение с БД
        $db = DB::getConnection();
        // Текст запроса к БД
        $sql = 'SELECT COUNT(*) FROM Users WHERE Email = :email';
        // Получение результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->execute();
        if ($result->fetchColumn())
            return true;
        return false;
    }
    /**
     * Проверяет не занят ли логин другим пользователем
     * @param string $login <p>Логин</p>
     * @return boolean <p>Результат выполнения метода</p>
     */
    public static function checkLoginExists($login)
    {
        // Соединение с БД
        $db = DB::getConnection();
        // Текст запроса к БД
        $sql = 'SELECT COUNT(*) FROM Users WHERE Login = :login';
        // Получение результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':login', $login, PDO::PARAM_STR);
        $result->execute();
        if ($result->fetchColumn())
            return true;
        return false;
    }
    /**
     * Возвращает пользователя с указанным id
     * @param integer $id <p>id пользователя</p>
     * @return array <p>Массив с информацией о пользователе</p>
     */
    public static function getUserById($id)
    {
        // Соединение с БД
        $db = DB::getConnection();
        // Текст запроса к БД
        $sql = 'SELECT * FROM Users WHERE UserID = :id';
        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        // Указываем, что хотим получить данные в виде массива
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $result->execute();
        return $result->fetch();
    }
}