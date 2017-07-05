<?php

/**
 * Created by PhpStorm.
 * User: Pavel
 * Date: 02.07.2017
 * Time: 17:13
 */
class AirlineController extends BaseController
{
    public function actionIndex()
    {
        $airlines = Airline::getAirlineList();
        print_r($airlines);
        return self::Render('airline', 'index', compact('airlines'));
    }

    public function actionShow($id)
    {
        
    }
}