<?php

/**
 * Created by PhpStorm.
 * User: Pavel
 * Date: 02.07.2017
 * Time: 17:22
 */
class Airline
{
    /**
     * @return array
     */
    public static function getAirlineList()
    {
        // Соединение с БД
        $db = DB::getConnection();
        // Текст запроса к БД
        $sql = 'SELECT * FROM Airlines';

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
            $productsList[$i]['AirlineID'] = $row['AirlineID'];
            $productsList[$i]['Name'] = $row['Name'];
            $productsList[$i]['Country'] = $row['Country'];
            $productsList[$i]['City'] = $row['City'];
            $productsList[$i]['Rating'] = $row['Rating'];
            $i++;
        }
        return $productsList;
    }
}