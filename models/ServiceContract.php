<?php

class ServiceContract
{
    public static function checkPrivateAccess()
    {
        $role = Auth::getRole();
        if ($role == Auth::ROLE_GUEST) {
            header("Location: /");
        }
    }

    /**
     * @param $id int <p>id авиалинии</p>
     * @return array <p>массив контрактов, заключенных с данной авиалинией</p>
     */
    public static function getContractsForAirline($id)
    {
        // Соединение с БД
        $db = DB::getConnection();
        // Текст запроса к БД
        $sql = 'SELECT * FROM AirlineServiceContract WHERE AirlineID = :id';
        // Получение результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        // Указываем, что хотим получить данные в виде массива
        $result->setFetchMode(PDO::FETCH_ASSOC);
        // Выполнение коменды
        $result->execute();
        return self::getFetch($result);
    }

    public static function getContractsById($id)
    {
        // Соединение с БД
        $db = DB::getConnection();
        // Текст запроса к БД
        $sql = 'SELECT * FROM AirlineServiceContract WHERE ContractID = :id';
        // Получение результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        // Указываем, что хотим получить данные в виде массива
        $result->setFetchMode(PDO::FETCH_ASSOC);
        // Выполнение коменды
        $result->execute();
        return $result->fetch();
    }

    public static function getContractsForUser($id)
    {
        // Соединение с БД
        $db = DB::getConnection();
        // Текст запроса к БД
        $sql = 'SELECT * FROM AirlineServiceContract WHERE AirlineID = :id OR ServiceID = :id';
        // Получение результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        // Указываем, что хотим получить данные в виде массива
        $result->setFetchMode(PDO::FETCH_ASSOC);
        // Выполнение коменды
        $result->execute();
        return self::getFetch($result);
    }

    public static function getUnconfirmedContractsForAirline($id)
    {
        // Соединение с БД
        $db = DB::getConnection();
        // Текст запроса к БД
        $sql = 'SELECT * FROM AirlineServiceContract WHERE AirlineID = :id AND AirlineConfirmed = 0 AND ServiceConfirmed = 1';
        // Получение результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        // Указываем, что хотим получить данные в виде массива
        $result->setFetchMode(PDO::FETCH_ASSOC);
        // Выполнение коменды
        $result->execute();
        // Получение и возврат результатов
        return self::getFetch($result);
    }

    public static function getUnconfirmedContractsForService($id)
    {
        // Соединение с БД
        $db = DB::getConnection();
        // Текст запроса к БД
        $sql = 'SELECT * FROM AirlineServiceContract WHERE ServiceID = :id AND ServiceConfirmed = 0 AND AirlineConfirmed = 1';
        // Получение результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        // Указываем, что хотим получить данные в виде массива
        $result->setFetchMode(PDO::FETCH_ASSOC);
        // Выполнение коменды
        $result->execute();
        // Получение и возврат результатов
        return self::getFetch($result);
    }


    const NOT_SET = 0;
    const ACTIVE = 1;
    const WAITING_AIRLINE_CONFIRM = 2;
    const WAITING_SERVICE_CONFIRM = 3;


    public static function getContractStatus($contractId)
    {
        // Соединение с БД
        $db = DB::getConnection();
        // Текст запроса к БД
        $sql = 'SELECT ServiceConfirmed, AirlineConfirmed FROM AirlineServiceContract WHERE ContractID = :id';
        // Получение результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':id', $contractId, PDO::PARAM_INT);
        // Указываем, что хотим получить данные в виде массива
        $result->setFetchMode(PDO::FETCH_ASSOC);
        // Выполнение коменды
        $result->execute();
        // Получение и возврат результатов
        $row = $result->fetch();
        if ($row) {
            if ($row['AirlineConfirmed'] == 0 && $row['ServiceConfirmed'] == 1) {
                return self::WAITING_AIRLINE_CONFIRM;
            } elseif ($row['AirlineConfirmed'] == 1 && $row['ServiceConfirmed'] == 0) {
                return self::WAITING_SERVICE_CONFIRM;
            } elseif ($row['AirlineConfirmed'] == 1 && $row['ServiceConfirmed'] == 1) {
                return self::ACTIVE;
            } else {
                return self::NOT_SET;
            }
        }
        return self::NOT_SET;
    }


    const NONE = 0;
    const BOTH = 1;
    const AIRLINE = 2;
    const SERVICE = 3;


    public static function create($airlineId, $serviceId, $startDate, $endDate, $acceptMode = self::NONE)
    {
        $airlineConfirm = 0;
        $serviceConfirm = 0;
        //$sql = "INSERT INTO AirlineServiceContract(AirlineID, ServiceID, StartDate, EndDate, AirlineConfirmed, ServiceConfirmed) VALUES (:airlineId, :serviceId, ':startDate', ':endDate', :airlineConfirm, :serviceConfirm)";
        $sql = "INSERT INTO AirlineServiceContract(AirlineID, ServiceID, StartDate, EndDate, AirlineConfirmed, ServiceConfirmed) VALUES (:airlineId, :serviceId, :startDate, :endDate, :airlineConfirm, :serviceConfirm)";
        if ($acceptMode == self::BOTH) {
            $airlineConfirm = 1;
            $serviceConfirm = 1;
        } elseif ($acceptMode == self::AIRLINE) {
            $airlineConfirm = 1;
        } elseif ($acceptMode == self::SERVICE) {
            $serviceConfirm = 1;
        }
        $db = DB::getConnection();
        $result = $db->prepare($sql);
        $result->bindParam(':airlineId', $airlineId, PDO::PARAM_INT);
        $result->bindParam(':serviceId', $serviceId, PDO::PARAM_INT);
        $result->bindParam(':startDate', $startDate, PDO::PARAM_STR);
        $result->bindParam(':endDate', $endDate, PDO::PARAM_STR);
        $result->bindParam(':airlineConfirm', $airlineConfirm, PDO::PARAM_INT);
        $result->bindParam(':serviceConfirm', $serviceConfirm, PDO::PARAM_INT);
        return $result->execute();
    }

    public static function confirmByAirline($contractId)
    {
        $db = DB::getConnection();
        $sql = "UPDATE AirlineServiceContract SET AirlineConfirmed = b'1' WHERE ContractID = :contractId";
        $result = $db->prepare($sql);
        $result->bindParam(':contractId', $contractId, PDO::PARAM_INT);
        return $result->execute();
    }

    public static function confirmByService($contractId)
    {
        $db = DB::getConnection();
        $sql = "UPDATE AirlineServiceContract SET ServiceConfirmed = b'1' WHERE ContractID = :contractId";
        $result = $db->prepare($sql);
        $result->bindParam(':contractId', $contractId, PDO::PARAM_INT);
        return $result->execute();
    }

    private static function getFetch($result)
    {
        $i = 0;
        $list = array();
        while ($row = $result->fetch()) {
            $list[$i]['ContractID'] = $row['ContractID'];
            $list[$i]['ServiceID'] = $row['ServiceID'];
            $list[$i]['AirlineID'] = $row['AirlineID'];
            $list[$i]['AirlineConfirmed'] = $row['AirlineConfirmed'];
            $list[$i]['ServiceConfirmed'] = $row['ServiceConfirmed'];
            $i++;
        }
        return $list;
    }
}