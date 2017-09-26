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
            return self::Render('profile', 'indexAirline');
        } elseif ($role == Auth::ROLE_SERVICE) {
            if (Profile::isNeedEditServiceProfile($id)) {
                header("Location: /profile/edit");
                return true;
            }
            return self::Render('profile', 'indexService');
        } elseif ($role == Auth::ROLE_ADMIN) {
            return self::Render('profile', 'indexAdmin');
        }
        return self::Render('profile', 'index');
    }

    public function actionEdit()
    {
        $role = Auth::getRole();
        $id = Auth::getId();
        if ($role == Auth::ROLE_AIRLINE) {
            $name = '';
            $country = '';
            $city = '';
            $airlineInfo = Airline::getAirlineInfo(Auth::getId());
            if ($airlineInfo) {
                $name = $airlineInfo['Name'];
                $country = $airlineInfo['Country'];
                $city = $airlineInfo['City'];
            }
            if (isset($_POST['editInfo'])) {
                $name = $_POST['name'];
                $country = $_POST['country'];
                $city = $_POST['city'];

                // Выполнение проверки правильности заполненных полей:
                $errors = array();
                if ($_POST['name'] == '') {
                    $errors["nameError"] = 'Пожалуйста, введите корректное имя.';
                }
                if ($_POST['country'] == '') {
                    $errors["countryError"] = 'Пожалуйста, проверьте корректность ввода названия страны.';
                }
                if ($_POST['city'] == '') {
                    $errors["cityError"] = 'Пожалуйста, проверьте корректность ввода названия города.';
                }
                if (empty($errors)) {
                    Airline::editInfo($id, $name, $country, $city);
                }
            }
            return self::Render('profile', 'editAirlineInfo', compact('name', 'country', 'city', 'errors'));
        } elseif ($role == Auth::ROLE_SERVICE) {
            $name = '';
            $country = '';
            $city = '';
            $serviceInfo = Service::getServiceInfo(Auth::getId());
            if ($serviceInfo) {
                $name = $serviceInfo['Name'];
                $country = $serviceInfo['Country'];
                $city = $serviceInfo['City'];
            }
            if (isset($_POST['editInfo'])) {
                $name = $_POST['name'];
                $country = $_POST['country'];
                $city = $_POST['city'];

                $errors = array();
                if ($_POST['name'] == '') {
                    $errors["nameError"] = 'Пожалуйста, введите корректное имя.';
                }
                if ($_POST['country'] == '') {
                    $errors["countryError"] = 'Пожалуйста, проверьте корректность ввода названия страны.';
                }
                if ($_POST['city'] == '') {
                    $errors["cityError"] = 'Пожалуйста, проверьте корректность ввода названия города.';
                }
                if (empty($errors)) {
                    Service::editInfo($id, $name, $country, $city);
                }
            }
            return self::Render('profile', 'editServiceInfo', compact('name', 'country', 'city', 'errors'));
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
        $airplaneInfo = Airplane::getAirPlaneInfo($airplaneID);
        if (!$airplaneInfo) {
            header("Location: /profile/airplanes");
        }
        if ($id != $airplaneInfo['Owner']) {
            return self::Render('profile/airplanes', 'accessDenied', compact('airplaneInfo'));
        }
        return self::Render('profile/airplanes', 'showAirplaneInfo', compact('airplaneInfo'));
    }

    public function actionAirplanesList()
    {
        $role = Auth::getRole();
        if ($role != Auth::ROLE_AIRLINE) {
            //Возвращаем пользователя на страницу профиля
            header("Location: /profile");
        }
        $id = Auth::getId();
        $airplanes = Airplane::getAirplaneListForAirline($id);
        return self::Render('profile/airplanes', 'showAirplanesList', compact('airplanes'));
    }

    public function actionAddAirplane()
    {
        $role = Auth::getRole();
        if ($role != Auth::ROLE_AIRLINE) {
            //Возвращаем пользователя на страницу профиля
            header("Location: /profile");
        }
        $name = '';
        $date = '';
        $limit = '';
        if (isset($_POST['add'])) {
            $id = Auth::getId();
            $date = $_POST['date'];
            $limit = $_POST['limit'];
            $name = $_POST['name'];
            // Выполнение проверки правильности заполненных полей:
            $errors = array();
            if (!self::validateDate($_POST['date'])) {
                $errors["dateError"] = 'Пожалуйста, корректно введите дату, в формета (Год-Месяц-День)';
            }
            if ($_POST['limit'] == '') {
                $errors["limitError"] = 'Пожалуйста, проверьте корректность ввода лимита операций.';
            }
            if ($_POST['name'] == '') {
                $errors["nameError"] = 'Пожалуйста, проверьте корректность ввода названия.';
            }
            if (empty($errors)) {
                if (Airplane::addAirplane($id, $name, $date, $limit)) {
                    header("Location: /profile/airplanes");
                }
            }
        }
        return self::Render('profile/airplanes', 'addAirplane', compact('date', 'limit', 'name', 'errors'));
    }

    private function validateDate($date, $format = 'Y-m-d')
    {
        $d = DateTime::createFromFormat($format, $date);
        return $d && $d->format($format) == $date;
    }

    public function actionContract($contractID = -1)
    {
        $contractInfo = ServiceContract::getContractsById($contractID);
        if (!$contractInfo) {
            header("Location: /profile/contracts");
        }
        $airplanes = AirplaneContract::getAirplanesForContract($contractID);
        return self::Render('profile/contracts', 'showContractInfo', compact('contractInfo', 'airplanes'));
    }

    public function actionContractList()
    {
        $id = Auth::getId();
        if (Auth::getRole() == Auth::ROLE_AIRLINE) {
            if (isset($_POST['accept'])) {
                ServiceContract::confirmByAirline($_POST['id']);
            }
            $contracts = ServiceContract::getContractsForUser($id);
            $unconfirmedContracts = ServiceContract::getUnconfirmedContractsForAirline($id);
            return self::Render('profile/contracts', 'showContractsForAvialine', compact('contracts', 'unconfirmedContracts'));
        } elseif (Auth::getRole() == Auth::ROLE_SERVICE) {
            if (isset($_POST['accept'])) {
                ServiceContract::confirmByService($_POST['id']);
            }
            $contracts = ServiceContract::getContractsForUser($id);
            $unconfirmedContracts = ServiceContract::getUnconfirmedContractsForService($id);
            return self::Render('profile/contracts', 'showContractsForService', compact('contracts', 'unconfirmedContracts'));
        }
        return true;

    }

    public function actionAddContract()
    {
        $currentData = date("Y-m-d");
        $endDate = date("Y-m-d", strtotime("+1 year"));
        $services = Service::getServicesList();
        if (isset($_POST['confirm'])) {
            $serviceId = $_POST['service'];
            $currentData = $_POST['dateStart'];
            $endDate = $_POST['dateEnd'];
            $id = Auth::getId();
            $result = ServiceContract::create($id, $serviceId, $currentData, $endDate, ServiceContract::AIRLINE);
            if ($result)
                header("Location: /profile/contracts");
            else
                //TODO: Вывод ошибки
                echo "NET NET";

        }
        return self::Render('profile/contracts', 'addContract', compact('services', 'currentData', 'endDate'));
    }

    public function actionAddContractAirplane($contractId = 0)
    {
        $cost = 0;
        if (isset($_POST['addAirplane'])) {
            $airplaneId = $_POST['airplane'];
            $cost = $_POST['cost'];
            $result = AirplaneContract::create($contractId, $airplaneId, $cost);
            if ($result) {
                //TODO: Вывести ошибку об успешном заключении контракта
                echo "DADA";
            } else {
                echo "NETNET";
            }
        }
        $airplanes = AirplaneContract::getNotServedAirplanesForContract($contractId);
        return self::Render('profile/contracts', 'addAirplaneToContract', compact('airplanes', 'cost'));
    }
}