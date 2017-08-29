<?php

class Airplane
{
    /**
     * @return array Возвращает  список Самолетов
     */
    public static function getAirPlaneList()
    {
        // Соединение с БД
        $db = DB::getConnection();
        // Текст запроса к БД
        $sql = 'SELECT * FROM Airplanes';

        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        // Указываем, что хотим получить данные в виде массива
        $result->setFetchMode(PDO::FETCH_ASSOC);
        // Выполнение коменды
        $result->execute();
        // Получение и возврат результатов
        $i = 0;
        $productsList = array();
        while ($row = $result->fetch()) {
            $productsList[$i]['AirplaneID'] = $row['AirplaneID'];
            $productsList[$i]['ProductionDate'] = $row['ProductionDate'];
            $productsList[$i]['MaxOperatingDays'] = $row['MaxOperatingDays'];
            $productsList[$i]['Owner'] = $row['Owner'];
            $i++;
        }
        return $productsList;
    }

    public static function getAirplaneListForAirline($id)
    {
        // Соединение с БД
        $db = DB::getConnection();
        // Текст запроса к БД
        $sql = 'SELECT * FROM Airplanes WHERE Owner = :id';

        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        // Указываем, что хотим получить данные в виде массива
        $result->setFetchMode(PDO::FETCH_ASSOC);
        // Выполнение коменды
        $result->execute();
        // Получение и возврат результатов
        $i = 0;
        $productsList = array();
        while ($row = $result->fetch()) {
            $productsList[$i]['AirplaneID'] = $row['AirplaneID'];
            $productsList[$i]['ProductionDate'] = $row['ProductionDate'];
            $productsList[$i]['MaxOperatingDays'] = $row['MaxOperatingDays'];
            $productsList[$i]['Owner'] = $row['Owner'];
            $i++;
        }
        return $productsList;
    }

    public static function getAirPlaneInfo($id)
    {
        $db = DB::getConnection();
        $sql = 'SELECT * FROM Airplanes WHERE AirplaneID = :id';
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        if ($result->execute()) {
            return $result->fetch();
        }
        return false;
    }

    /**
     * @return bool Возвращает True, при успешном добавлении информации о самолете в базу данных.
     * В случае ошибки возвращает False
     */
    public static function addAirplane($ownerID, $date, $limit)
    {
        $db = DB::getConnection();
        $sql = 'INSERT INTO Airplanes(ProductionDate, MaxOperatingDays, Owner) VALUES (:date, :limit, :owner)';
        $result = $db->prepare($sql);
        $result->bindParam(':date', $date, PDO::PARAM_STR);
        $result->bindParam(':limit', $limit, PDO::PARAM_INT);
        $result->bindParam(':owner', $ownerID, PDO::PARAM_INT);
        return $result->execute();
    }
}