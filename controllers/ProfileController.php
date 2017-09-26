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
                // Выполнение проверки правильности заполненных полей:
                $errors = array();

                $id = Auth::getId();

                if ($_POST['name'] == '') {
                    $errors[] = 'Пожалуйста, введите корректное имя.';
                } else {
                    $name = $_POST['name'];
                }

                if ($_POST['country'] == '') {
                    $errors[] = 'Пожалуйста, проверьте корректность ввода названия страны.';
                } else {
                    $country = $_POST['country'];
                }

                if ($_POST['city'] == '') {
                    $errors[] = 'Пожалуйста, проверьте корректность ввода названия города.';
                } else {
                    $city = $_POST['city'];
                }

                if(empty($errors)) {
                    Airline::editInfo($id, $name, $country, $city);
                    echo '<div style="color: green;">Информация успешно обновлена!</div><hr>';
                } else {
                    echo '<div style="color: red;">' . array_shift($errors) . '</div><hr>';
                }

                /*
                if (Airline::editInfo($id, $name, $country, $city)) {
                    //TODO: Убрать вывод
                    echo "da";
                } else {
                    echo "net";
                }
                */
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
        //TODO: Рендер изображения и вывод инфо
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

    public function actionContract($contractID = -1)
    {
        $contractInfo = ServiceContract::getContractsById($contractID);
        $airplanes = AirplaneContract::getAirplanesForContract($contractID);
        return self::Render('profile/contracts', 'showContractInfo', compact('contractInfo', 'airplanes'));
    }

    public function actionContractList()
    {
        $id = Auth::getId();
        if (isset($_POST['accept'])) {

        }
        if (isset($_POST['reject'])) {

        }
        echo Auth::getRole();
        if (Auth::getRole() == Auth::ROLE_AIRLINE)
        {
            $contracts = ServiceContract::getContractsForUser($id);
            $unconfirmedContracts = ServiceContract::getUnconfirmedContractsForAirline($id);
            return self::Render('profile/contracts', 'showContractsForAvialine', compact('contracts', 'unconfirmedContracts'));
        } elseif (Auth::getRole() == Auth::ROLE_SERVICE)
        {
            $contracts = ServiceContract::getContractsForUser($id);
            $unconfirmedContracts = ServiceContract::getUnconfirmedContractsForService($id);
            return self::Render('profile/contracts', 'showContractsForService', compact('contracts', 'unconfirmedContracts'));
        }
        return true;

    }
    /*
        public function actionAddServiceConcract()
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

            return self::Render('profile', 'addServiceContract', compact('date', 'limit'));
        }
    */
    /*
    public function actionServicesInfo()
    {
        $id = Auth::getId();
        $contracts = ServiceContract::getContractsForAirline($id);

        $date = '';
        $limit = '';
        //TODO: убрать
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

        return self::Render('profile', 'showServicesContractList', compact('date', 'limit', 'contracts'));
    }
    */

    public function actionAddContract()
    {
        $currentData = date("Y-m-d");
        $endDate = date("Y-m-d", strtotime("+1 year"));
        $services = Service::getServicesList();
        if (isset($_POST['confirm'])) {
            $serviceId = $_POST['service'];
            $currentData = $_POST['dateStart'];
            $endDate = $_POST['dateEnd'];
            //TODO: Добавить проверку на валидность даты
            $id = Auth::getId();
            $result = ServiceContract::create($id, $serviceId, $currentData, $endDate, ServiceContract::AIRLINE);
            if ($result)
                echo "DA";
            else
                echo "NET NET";

        }
        return self::Render('profile/contracts', 'addContract', compact('services', 'currentData', 'endDate'));
    }

    public function actionAddContractAirplane($contractId = 0)
    {
        if ($contractId > 0) {
            $cost = 0;
            if (isset($_POST['addAirplane'])) {
                $airplaneId = $_POST['airplane'];
                $cost = $_POST['cost'];
                $result = AirplaneContract::create($contractId, $airplaneId, $cost);
                if ($result) {
                    echo "DADA";
                } else {
                    echo "NETNET";
                }
            }
            $airplanes = AirplaneContract::getNotServedAirplanesForContract($contractId);
            return self::Render('profile/contracts', 'addAirplaneToContract', compact('airplanes', 'cost'));
        } else {
            throw new Exception("Контракт не найден", 404);
        }
        $currentData = date("Y-m-d");
        $endDate = date("Y-m-d", strtotime("+1 year"));
        $services = Service::getServicesList();
        if (isset($_POST['confirm'])) {
            $serviceId = $_POST['service'];
            $currentData = $_POST['dateStart'];
            $endDate = $_POST['dateEnd'];
            //TODO: Добавить проверку на валидность датыzz
            $id = Auth::getId();
            $result = ServiceContract::create($id, $serviceId, $currentData, $endDate, ServiceContract::AIRLINE);
            if ($result)
                echo "DA";
            else
                echo "NET NET";

        }
        return self::Render('profile/contracts', 'addContract', compact('services', 'currentData', 'endDate'));
    }
}