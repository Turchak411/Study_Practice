<?php
/**
 * Массив маршрутов
 * Структура
 * 'контроллер' => 'контроллер/метод',
 */
return array(
    'profile/edit' => 'profile/edit',
    'profile/airplanes/([0-9]+)' => 'profile/airplanesInfo/$1',
    'profile/contracts/([0-9]+)' => 'profile/contractsInfo/$1',
    'profile/airplanes/add' => 'profile/addAirplane',
    'profile/contracts/add' => 'profile/addContract',
    'profile/airplanes' => 'profile/airplanesInfo',
    'profile/contracts' => 'profile/contractsInfo',
    'profile' => 'profile/index',
    'admin/request/([0-9]+)' => 'admin/request/$1',
    'admin/requests' => 'admin/requestList',
    'admin' => 'admin/index',
    'user/registration' => 'user/registration',
    'user/logout' => 'user/logout',
    'user/login' => 'user/login',
    'airlines' => 'airline/index',
    'airline/([0-9]+)' => 'airline/show/$1',
    'setup' => 'setup/index',
    'airplane' => 'airplane/index',
    'main/main' => 'main/main',
    '' => 'main/index'
);