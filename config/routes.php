<?php
/**
 * Массив маршрутов
 * Структура
 * 'контроллер' => 'контроллер/метод',
 */
return array(
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