<?php

class Admin
{
    public static function getRegistrationRequestList()
    {
        // Соединение с БД
        $db = DB::getConnection();
        // Текст запроса к БД
        $sql = 'SELECT * FROM Users WHERE IsValidated = 0';

        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        // Указываем, что хотим получить данные в виде массива
        $result->setFetchMode(PDO::FETCH_ASSOC);
        // Выполнение коменды
        $result->execute();
        // Получение и возврат результатов
        $i = 0;
        $userList = array();
        while ($row = $result->fetch()) {
            $userList[$i]['UserID'] = $row['UserID'];
            $userList[$i]['Login'] = $row['Login'];
            $userList[$i]['Email'] = $row['Email'];
            $userList[$i]['UserType'] = $row['UserType'];
            $userList[$i]['IsValidated'] = $row['IsValidated'];
            $i++;
        }
        return $userList;
    }

    public static function getRequestByID($id)
    {
        // Соединение с БД
        $db = DB::getConnection();
        // Текст запроса к БД
        $sql = 'SELECT * FROM Users WHERE IsValidated = 0 AND UserID  = :id';
        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        // Задаем параметры в запрос
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        // Указываем, что хотим получить данные в виде массива
        $result->setFetchMode(PDO::FETCH_ASSOC);
        // Выполнение коменды
        $result->execute();
        // Получение и возврат результатов
        return $result->fetch();
    }

    public static function acceptUser($id)
    {

    }

    public static function checkPrivateAccess()
    {
        $role = Auth::getRole();
        if ($role != Auth::ROLE_ADMIN && $role != Auth::ROLE_MODERATOR)
        {
            header("Location: /");
        }
    }
}