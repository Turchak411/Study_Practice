<?php

class Contract
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
        // Получение и возврат результатов
        $i = 0;
        $contractList = array();
        while ($row = $result->fetch()) {
            $contractList[$i]['ContractID'] = $row['ContractID'];
            $contractList[$i]['ServiceID'] = $row['ServiceID'];
            $contractList[$i]['AirlineID'] = $row['AirlineID'];
            $i++;
        }
        return $contractList;
    }
}