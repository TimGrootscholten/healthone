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

    public function show($value)
    {
        $value = 'show' . $value;
        $this->view->$value([null, false, 'patient']);
    }

    public function checkLogin()
    {
        $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
        $password = sha1($_POST['password']);
        if ($query = $this->model->checkLogin($email, $password)->rowCount() == 1) {
            $this->view->showDashboard();
        } else {
            $this->view->showLogin();
        }
    }

    public function search($what)
    {
        $searchValue = filter_input(INPUT_POST, "value", FILTER_SANITIZE_STRING);
        if ($what == 'patient') {
            $searchresult = $this->model->getPation($searchValue);
        } elseif ($what == 'medicijn') {
            $searchresult = $this->model->getRecept($searchValue);
        }
        $this->view->showCreate($searchresult);
    }

    public function showPastient(){
        $patienten = $this->model->getPatienten();
        $this->view->showPatienten($patienten);
    }

    public function patientWijzigen(){
        $id = $_REQUEST['patientWijzigen'];
        $patientInfo = $this->model->getPatientById($id);
        $this->view->showPatientInfo($patientInfo);
    }
}