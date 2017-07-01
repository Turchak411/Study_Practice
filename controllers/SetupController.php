<?php

/**
 * Created by PhpStorm.
 * User: Pavel
 * Date: 01.07.17
 * Time: 18:56
 */
class SetupController extends BaseController
{
    public function actionIndex()
    {
        $file_handle = fopen(ROOT . "/config/DbScheme.sql", "r");
        $str = "";
        while (!feof($file_handle)) {
            $line = fgets($file_handle);
            $str .= $line;
        }
        fclose($file_handle);
        $setupArr = explode(';', $str);
        print_r($setupArr);
        $db = DB::getConnection();
        foreach ($setupArr as $setup) {
            if (empty($setup))
                continue;
            echo $setup;
            echo "<br>";
            $result = $db->query(trim($setup));
            echo "<br>";
        }
        return self::Render('setup', 'index');
    }

}