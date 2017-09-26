<?php

class AirplaneContract
{
    public static function checkPrivateAccess()
    {
        $role = Auth::getRole();
        if ($role == Auth::ROLE_GUEST) {
            header("Location: /");
        }
    }

    public static function getAirplanesForContract($id)
    {
        // Соединение с БД
        $db = DB::getConnection();
        // Текст запроса к БД
        $sql = 'SELECT * FROM AirplaneServiceContract WHERE ContractID = :id';
        // Получение результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        // Указываем, что хотим получить данные в виде массива
        $result->setFetchMode(PDO::FETCH_ASSOC);
        // Выполнение коменды
        $result->execute();
        return self::getFetch($result);
    }

    public static function getNotServedAirplanesForContract($id)
    {
        // Соединение с БД
        $db = DB::getConnection();
        // Текст запроса к БД
        $sql = "SELECT *
FROM Airplanes
WHERE AirplaneID NOT IN (
  SELECT AirplaneID
  FROM AirplaneServiceContract
) AND Owner = (SELECT AirlineID
               FROM AirlineServiceContract
               WHERE ContractID  = :id);";
        // Получение результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        // Указываем, что хотим получить данные в виде массива
        $result->setFetchMode(PDO::FETCH_ASSOC);
        // Выполнение коменды
        $result->execute();
        $i = 0;
        $list = array();
        while ($row = $result->fetch()) {
            $list[$i]['AirplaneID'] = $row['AirplaneID'];
            $list[$i]['Name'] = $row['Name'];
            $list[$i]['ProductionDate'] = $row['ProductionDate'];
            $list[$i]['MaxOperatingDays'] = $row['MaxOperatingDays'];
            $list[$i]['Owner'] = $row['Owner'];
            $i++;
        }
        return $list;
    }

    public static function create($contractId, $airplaneId, $cost)
    {
        $sql = "INSERT INTO AirplaneServiceContract(ContractID, AirplaneID, Cost) VALUES (:contractId, :airplaneId, :cost)";
        $db = DB::getConnection();
        $result = $db->prepare($sql);
        $result->bindParam(':contractId', $contractId, PDO::PARAM_INT);
        $result->bindParam(':airplaneId', $airplaneId, PDO::PARAM_INT);
        $result->bindParam(':cost', $cost, PDO::PARAM_INT);
        return $result->execute();
    }

    private static function getFetch($result)
    {
        $i = 0;
        $list = array();
        while ($row = $result->fetch()) {
            $list[$i]['ID'] = $row['ID'];
            $list[$i]['ContractID'] = $row['ContractID'];
            $list[$i]['AirplaneID'] = $row['AirplaneID'];
            $list[$i]['Cost'] = $row['Cost'];
            $i++;
        }
        return $list;
    }
}