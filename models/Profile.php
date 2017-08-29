<?php

class Profile
{
    public static function isNeedEditAirlineProfile($id)
    {
        $db = DB::getConnection();

        $sql = "SELECT count(*) AS Count FROM Airlines WHERE AirlineID = :id";

        // Подготавливаем запрос
        $result = $db->prepare($sql);
        // Задаем параметры
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        // Указываем, что хотим получить данные в виде массива
        $result->setFetchMode(PDO::FETCH_ASSOC);
        // Выполнение запроса
        $result->execute();
        if ($result->fetch()["Count"] == 0)
            return true;
        return false;
    }

    public static function isUserValidated($id)
    {
        $db = DB::getConnection();

        $sql = "SELECT IsValidated FROM Users WHERE UserID = :id";

        // Подготавливаем запрос
        $result = $db->prepare($sql);
        // Задаем параметры
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        // Указываем, что хотим получить данные в виде массива
        $result->setFetchMode(PDO::FETCH_ASSOC);
        // Выполнение запроса
        $result->execute();
        if ($result->fetch()["IsValidated"] == 1)
            return true;
        return false;
    }

    public static function checkPrivateAccess()
    {
        $role = Auth::getRole();
        if ($role == Auth::ROLE_GUEST)
        {
            header("Location: /");
        }
    }
}