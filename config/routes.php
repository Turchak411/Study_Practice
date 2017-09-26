<?php
/**
 * Массив маршрутов
 * Структура
 * 'контроллер' => 'контроллер/метод',
 */
return array(
    'user/registration' => 'user/registration',
    'user/logout' => 'user/logout',
    'user/login' => 'user/login',
    'profile/edit' => 'profile/edit',
    'profile/airplanes/([0-9]+)' => 'profile/airplanesInfo/$1',
    'profile/airplanes/add' => 'profile/addAirplane',
    'profile/contracts/([0-9]+)/add' => 'profile/addContractAirplane/$1',
    'profile/contracts/([0-9]+)' => 'profile/contract/$1',
    'profile/contracts/add' => 'profile/addContract',
    'profile/contracts' => 'profile/contractList',
    'profile/airplanes' => 'profile/airplanesList',
    'profile' => 'profile/index',
    'airlines/([0-9]+)' => 'airline/show/$1',
    'airlines' => 'airline/index',
    'airplanes/([0-9]+)' => 'airplane/show/$1',
    'airplanes' => 'airplane/index',
    'services/([0-9]+)' => 'service/show/$1',
    'services' => 'service/index',
    'admin/requests/([0-9]+)' => 'admin/request/$1',
    'admin/requests' => 'admin/request',
    'admin' => 'admin/index',
    'setup' => 'setup/index',
    '' => 'main/index'
);