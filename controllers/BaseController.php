<?php

class BaseController
{

    /**
     * Метод отображения страницы
     * @param $controller string Имя контроллера для отображения представления
     * @param $view string Имя Представления
     * @param $viewBag array Массив переменных в представлении
     * @return bool Возвращает True, если представление было подключени, false, если произошла ошибка
     */
    public static function Render($controller, $view, $viewBag = [])
    {
        extract($viewBag);
        $path = ROOT . '/views/'.$controller.'/'.$view.'.php';
        // Если такой файл существует, подключаем его
        if (is_file($path)) {
            require_once($path);
            return true;
        }
        return false;
    }
}