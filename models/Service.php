<?php

class Service
{
    /**
     * @return array Возвращает  список Сервисов
     */
    public static function getServicesList()
    {
        // Соединение с БД
        $db = DB::getConnection();
        // Текст запроса к БД
        $sql = 'SELECT * FROM Services';

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
            $productsList[$i]['ServiceID'] = $row['ServiceID'];
            $productsList[$i]['Name'] = $row['Name'];
            $productsList[$i]['Country'] = $row['Country'];
            $productsList[$i]['City'] = $row['City'];
            $productsList[$i]['Rating'] = $row['Rating'];
            $i++;
        }
        return $productsList;
    }

    public static function getServiceInfo($id)
    {
        $db = DB::getConnection();
        $sql = 'SELECT * FROM Services WHERE ServiceID = :id';
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        if ($result->execute()) {
            return $result->fetch();
        }
        return false;
    }

    public static function editInfo($id, $name, $country, $sity)
    {
        $db = DB::getConnection();
        if (!self::getServiceInfo($id)) {
            $sql = 'INSERT INTO Services(ServiceID, Name, Country, City) VALUES (:id, :name, :country, :city)';
        } else {
            $sql = 'UPDATE Services SET Name = :name, Country = :country, City = :city WHERE ServiceID = :id';
        }
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->bindParam(':name', $name, PDO::PARAM_STR);
        $result->bindParam(':country', $country, PDO::PARAM_STR);
        $result->bindParam(':city', $sity, PDO::PARAM_STR);
        return $result->execute();
    }
}