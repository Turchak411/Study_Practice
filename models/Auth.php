<?php

class Auth
{
    const ROLE_GUEST = 0;
    const ROLE_ADMIN = 1;
    const ROLE_MODERATOR = 2;
    const ROLE_AIRLINE = 3;
    const ROLE_SERVICE = 4;

    /**
     * Запоминаем пользователя
     * @param integer $userId <p>id пользователя</p>
     */
    public static function authorize($userId)
    {
        // Записываем идентификатор пользователя в сессию
        $_SESSION['user'] = $userId;
    }
    /**
     * Возвращает идентификатор пользователя, если он авторизирован.<br/>
     * Иначе перенаправляет на страницу входа
     * @return string <p>Идентификатор пользователя</p>
     */
    public static function checkLogged()
    {
        // Если сессия есть, вернем идентификатор пользователя
        if (isset($_SESSION['user'])) {
            return $_SESSION['user'];
        }
        return false;
    }
    /**
     *  Выход пользователя из системы
     */
    public static function logout()
    {
        unset($_SESSION['user']);
    }
    /**
     * Проверяет является ли пользователь гостем
     * @return boolean <p>Результат выполнения метода</p>
     */
    public static function isGuest()
    {
        if (isset($_SESSION['user'])) {
            return false;
        }
        return true;
    }

    /**
     * Возвращает текущую роль пользователя
     * @return int <p>Возвращает константу типа пользователя</p>
     */
    public static function getRole()
    {
        $id = self::checkLogged();
        if ($id)
        {
            $db = DB::getConnection();

            $sql = "SELECT UserType FROM Users WHERE UserID = :id";

            // Подготавливаем запрос
            $result = $db->prepare($sql);
            // Задаем параметры
            $result->bindParam(':id', $id, PDO::PARAM_INT);
            // Указываем, что хотим получить данные в виде массива
            $result->setFetchMode(PDO::FETCH_ASSOC);
            // Выполнение запроса
            if ($result->execute())
            {
                $userData = $result->fetch();
                switch ($userData["UserType"])
                {
                    case "admin": return self::ROLE_ADMIN;
                    case "moderator": return self::ROLE_MODERATOR;
                    case "airline": return self::ROLE_AIRLINE;
                    case "service": return self::ROLE_SERVICE;
                }
            }
        }
        return self::ROLE_GUEST;
    }
}