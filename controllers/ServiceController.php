<?php

class ServiceController extends BaseController
{
    public function actionIndex()
    {
        $services = Service::getServicesList();
        return self::Render('service', 'index', compact('services'));
    }

    public function actionShow($id)
    {
        $serviceInfo = Service::getServiceInfo($id);
        return self::Render('service', 'show', compact('serviceInfo'));
    }
}