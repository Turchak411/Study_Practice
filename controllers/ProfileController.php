<?php

class ProfileController extends BaseController
{
    function __construct()
    {
        Profile::checkPrivateAccess();
    }

    public function actionIndex()
    {
        $id = Auth::getId();
        $role = Auth::getRole();

        if (!Profile::isUserValidated($id)) {
            return self::Render('profile', 'waitingForConfirmation');
        }

        if ($role == Auth::ROLE_AIRLINE) {
            if (Profile::isNeedEditAirlineProfile($id)) {
                header("Location: /profile/edit");
                return true;
            }
            return self::Render('profile', 'index');
        } elseif ($role == Auth::ROLE_SERVICE) {
            if (Profile::isNeedEditServiceProfile($id)) {
                header("Location: /profile/edit");
                return true;
            }
        }
        return self::Render('profile', 'index');
    }

    public function actionEdit()
    {
        print_r($_POST);
        $role = Auth::getRole();
        if ($role == Auth::ROLE_AIRLINE) {
            $name = '';
            $country = '';
            $city = '';
            $airlineInfo = Airline::getAirlineInfo(Auth::getId());
            print_r($airlineInfo);
            if ($airlineInfo) {
                $name = $airlineInfo['Name'];
                $country = $airlineInfo['Country'];
                $city = $airlineInfo['City'];
            }
            if (isset($_POST['editInfo'])) {
                $id = Auth::getId();
                $name = $_POST['name'];
                $country = $_POST['country'];
                $city = $_POST['city'];
                if (Airline::editInfo($id, $name, $country, $city)) {
                    //TODO: Убрать вывод
                    echo "da";
                } else {
                    echo "net";
                }
            }
            return self::Render('profile', 'editAirlineInfo', compact('name', 'country', 'city'));
        } elseif ($role == Auth::ROLE_SERVICE) {
            $name = '';
            $country = '';
            $city = '';
            $serviceInfo = Service::getServiceInfo(Auth::getId());
            print_r($serviceInfo);
            if ($serviceInfo) {
                $name = $serviceInfo['Name'];
                $country = $serviceInfo['Country'];
                $city = $serviceInfo['City'];
            }
            if (isset($_POST['editInfo'])) {
                $id = Auth::getId();
                $name = $_POST['name'];
                $country = $_POST['country'];
                $city = $_POST['city'];
                if (Service::editInfo($id, $name, $country, $city)) {
                    //TODO: Убрать вывод
                    echo "da";
                } else {
                    echo "net";
                }
            }
            return self::Render('profile', 'editServiceInfo', compact('name', 'country', 'city'));
        } elseif ($role == Auth::ROLE_ADMIN) {
            return self::Render('profile', 'edit', compact('name', 'country', 'city'));
        } elseif ($role == Auth::ROLE_MODERATOR) {
            return self::Render('profile', 'edit', compact('name', 'country', 'city'));
        }
        return true;
    }

    public function actionAirplanesInfo($airplaneID = -1)
    {
        $id = Auth::getId();
        if ($airplaneID >= 0) {
            $airplaneInfo = Airplane::getAirPlaneInfo($airplaneID);
            if ($airplaneInfo) {
                echo "<code>";
                print_r($airplaneInfo);
                echo "</code>";
                if ($id != $airplaneInfo['Owner']) {
                    //TODO: Добавить Error по доступу
                    echo "Вы не можете редактировать информацию об этом самолете";
                }
            } else
                echo "Такого самолета нет";
            return self::Render('profile', 'showAirplaneInfo', compact('airplaneInfo'));
        } else {
            $airplanes = Airplane::getAirplaneListForAirline($id);
            return self::Render('profile', 'showAirplanesList', compact('airplanes'));
        }
    }

    public function actionAddAirplane()
    {
        $id = Auth::getId();
        $date = '';
        $limit = '';
        echo "<code>";
        print_r($_POST);
        echo "</code>";
        if (isset($_POST['add'])) {
            $date = $_POST['date'];
            $limit = $_POST['limit'];
            $sd = Airplane::addAirplane($id, $date, $limit);
            print_r($sd);
            echo $sd ? "DA" : "NET";
        }

        return self::Render('profile', 'addAirplane', compact('date', 'limit'));
    }

    public function actionContractsInfo($contractID = -1)
    {
        //Profile::checkValidation();
        $id = Auth::getId();
        $date = '';
        $limit = '';
        echo "<code>";
        print_r($_POST);
        echo "</code>";
        if (isset($_POST['add'])) {
            $date = $_POST['date'];
            $limit = $_POST['limit'];
            $sd = Airplane::addAirplane($id, $date, $limit);
            print_r($sd);
            echo $sd ? "DA" : "NET";
        }

        return self::Render('profile', 'addAirplane', compact('date', 'limit'));
    }

    public function actionAddContract()
    {
        $services = Service::getServicesList();
        return self::Render('profile', 'addContract', compact('services'));
    }
}