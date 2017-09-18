<?php
/**
 * Массив маршрутов
 * Структура
 * 'контроллер' => 'контроллер/метод',
 */
return array(
    'profile/edit' => 'profile/edit',
    'profile/airplanes/([0-9]+)' => 'profile/airplanesInfo/$1',
    'profile/airplanes/add' => 'profile/addAirplane',
    'profile/services/add' => 'profile/addServiceConcract',//TODO: надо бы удалить и перенести в сервисы
    'profile/contracts/([0-9]+)/add' => 'profile/addContractAirplane/$1',
    'profile/contracts/([0-9]+)' => 'profile/contract/$1',
    'profile/contracts/add' => 'profile/addContract',
    'profile/contracts' => 'profile/contract',
    'profile/airplanes' => 'profile/airplanesInfo',
    'profile/services' => 'profile/servicesInfo',//TODO: надо бы удалить и перенести в сервисы
    'profile' => 'profile/index',
    'admin/requests/([0-9]+)' => 'admin/request/$1',
    'admin/requests' => 'admin/request',
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