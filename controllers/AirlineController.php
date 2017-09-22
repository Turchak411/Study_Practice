<?php

class AirlineController extends BaseController
{
    public function actionIndex()
    {
        $airlines = Airline::getAirlineList();
        return self::Render('airline', 'index', compact('airlines'));
    }

    public function actionShow($id)
    {
        $airlineInfo = Airline::getAirlineInfo($id);
        return self::Render('airline', 'show', compact('airlineInfo'));
    }
}