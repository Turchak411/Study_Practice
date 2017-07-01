<?php

class BaseController
{

    /**
     * Метод отображения страницы
     * @param $controller Имя контроллера для отображения представления
     * @param $view Имя Представления
     * @param $viewBag Массив переменных в представлении
     * @return bool Возвращает True, если представление было подключени, false, если произошла ошибка
     */
    public static function Render($controller, $view, $viewBag = [])
    {
        extract($viewBag);
        $path = ROOT . '/views/'.$controller.'/'.$view.'.php';
        // Если такой файл существует, подключаем его
        if (is_file($path)) {
            //TODO: переработать загрузку шаблонов
            //require_once(ROOT . '/views/layouts/header.php');
            require_once($path);
            //require_once(ROOT . '/views/layouts/footer.php');
            return true;
        }
        return false;
    }
}