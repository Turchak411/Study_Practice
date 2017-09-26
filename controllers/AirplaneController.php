<?php

class AirplaneController extends BaseController
{
    public function actionIndex()
    {
        $airplanes = Airplane::getAirPlaneList();
        return self::Render('airplane', 'index', compact('airplanes'));
    }

    public function actionShow($id)
    {
        $airplaneInfo = Airplane::getAirPlaneInfo($id);
        return self::Render('airplane', 'show', compact('airplaneInfo'));
    }
}