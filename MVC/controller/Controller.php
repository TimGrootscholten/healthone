<?php

namespace MVC\controller;

use MVC\model\Model;
use MVC\view\View;

class Controller
{
    private $view;
    private $model;

    public function __construct()
    {
        $this->model = new Model();
        $this->view = new View($this->model);
    }

    public function checkLogin()
    {
        if (isset($_POST['email']) && isset($_POST['password'])) {
            $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
            $password = filter_input(INPUT_POST, 'password');
            $this->model->checkLogin($email, $password);

            if (isset($_SESSION['role']) && $_SESSION['role'] === 'arts') {
                $this->showDashboard();
            } else {
                $this->view->showLogin();
            }
        } else {
            $this->view->showLogin();
        }
    }

    public function logoutAction()
    {
        $this->model->logout();;
    }

    public function search($what)
    {
        $searchValue = filter_input(INPUT_POST, "value", FILTER_SANITIZE_STRING);
        if ($what == 'patient') {
            $searchresult = $this->model->getPation($searchValue);
        } elseif ($what == 'medicijn') {
            $searchresult = $this->model->getMedicijn($searchValue);
        }
        $this->view->showCreate($searchresult);
    }

    public function patientWijzigen()
    {
        $id = $_REQUEST['patientWijzigen'];
        $patientInfo = $this->model->getPatientById($id);
        $this->view->showPatientInfo($patientInfo);
    }

    public function patientVerwijderen()
    {
        $id = $_REQUEST['patientVerwijderen'];
        $this->model->deletePatientById($id);
        $this->showPatient();
    }

    public function showPatient()
    {

        $patienten = $this->model->getPatienten();
        $this->view->showPatienten($patienten);
    }

    public function patientUpdaten()
    {
        $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
        $naam = filter_input(INPUT_POST, 'naam', FILTER_SANITIZE_STRING);
        $adres = filter_input(INPUT_POST, 'adres', FILTER_SANITIZE_STRING);
        $woonplaats = filter_input(INPUT_POST, 'woonplaats', FILTER_SANITIZE_STRING);
        $geboortedatum = filter_input(INPUT_POST, 'geboortedatum', FILTER_SANITIZE_STRING);
        $zknummer = filter_input(INPUT_POST, 'zknummer', FILTER_SANITIZE_STRING);
        $soortverzekering = filter_input(INPUT_POST, 'soortverzekering', FILTER_SANITIZE_STRING);
        $result = $this->model->updatePatient($id, $naam, $adres, $woonplaats, $geboortedatum, $zknummer, $soortverzekering);
        if ($result) {
            $this->showPatient();
        } else {
            echo 'Er ging iets fout';
        }
    }

    public function PatientCreate()
    {
        $naam = filter_input(INPUT_POST, 'naam', FILTER_SANITIZE_STRING);
        $adres = filter_input(INPUT_POST, 'adres', FILTER_SANITIZE_STRING);
        $woonplaats = filter_input(INPUT_POST, 'woonplaats', FILTER_SANITIZE_STRING);
        $geboortedatum = filter_input(INPUT_POST, 'geboortedatum', FILTER_SANITIZE_STRING);
        $zknummer = filter_input(INPUT_POST, 'zknummer', FILTER_SANITIZE_STRING);
        $soortverzekering = filter_input(INPUT_POST, 'soortverzekering', FILTER_SANITIZE_STRING);
        $this->model->insertPatient($naam, $adres, $woonplaats, $geboortedatum, $zknummer, $soortverzekering);
        $this->showPatient();
    }

    public function medicijnWijzigen()
    {
        $id = $_REQUEST['medicijnWijzigen'];
        $medicijnInfo = $this->model->getMedicijnById($id);
        $this->view->showMedicijnInfo($medicijnInfo);
    }

    public function medicijnVerwijderen()
    {
        $id = $_REQUEST['medicijnVerwijderen'];
        $this->model->deleteMedicijnById($id);
        $this->showMedicijn();
    }

    public function showMedicijn()
    {
        $Medicijnen = $this->model->getMedicijnen();
        $this->view->showMedicijnen($Medicijnen);
    }

    public function medicijnUpdaten()
    {
        $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
        $naam = filter_input(INPUT_POST, 'naam', FILTER_SANITIZE_STRING);
        $werking = filter_input(INPUT_POST, 'werking', FILTER_SANITIZE_STRING);
        $bijwerking = filter_input(INPUT_POST, 'bijwerking', FILTER_SANITIZE_STRING);
        $verzekerd = filter_input(INPUT_POST, 'verzekerd', FILTER_SANITIZE_NUMBER_INT);
        $result = $this->model->updateMedicijn($id, $naam, $werking, $bijwerking, $verzekerd);
        if ($result) {
            $this->showMedicijn();
        } else {
            echo 'Er ging iets fout';
        }
    }

    public function medicijnCreate()
    {
        $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
        $naam = filter_input(INPUT_POST, 'naam', FILTER_SANITIZE_STRING);
        $werking = filter_input(INPUT_POST, 'werking', FILTER_SANITIZE_STRING);
        $bijwerking = filter_input(INPUT_POST, 'bijwerking', FILTER_SANITIZE_STRING);
        $verzekerd = filter_input(INPUT_POST, 'verzekerd', FILTER_SANITIZE_NUMBER_INT);
        $this->model->insertMedicijn($id, $naam, $werking, $bijwerking, $verzekerd);
        $this->showMedicijn();
    }

    public function createVerwijderen($what)
    {
        if ($what == 'medicijn') {
            $id = $_REQUEST['CMedicijnVerwijderen'];
            $cookieNaam = 'medicijn[' . $id . ']';
        } else {
            $cookieNaam = 'patient';
        }
        $this->model->removeCookie($cookieNaam);
        $this->show('create');
    }

    public function show($value)
    {
        $value = 'show' . $value;
        $this->view->$value([null, false]);
    }

    public function createRecept()
    {
        $patientId = filter_input(INPUT_POST, 'patientId', FILTER_SANITIZE_NUMBER_INT);
        $medicijnId = filter_input(INPUT_POST, 'medicijnId');
        $notities = filter_input(INPUT_POST, 'notitie', FILTER_SANITIZE_STRING);
        $herhaling = filter_input(INPUT_POST, 'herhaling');

        $this->model->createRecept($patientId, $medicijnId, $notities, $herhaling);
        $this->showDashboard();
    }

    public function showDashboard()
    {
        $recepten = $this->model->getRecepten();
        $this->view->showDashboard($recepten);
    }

    public function showReceptInfo()
    {
        $id = $_REQUEST['receptInfo'];
        $info = $this->model->showReceptById($id);
        $this->view->showReceptInfo($info);
    }
}
