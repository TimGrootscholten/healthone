<?php

namespace controller;
include_once "MVC/view/View.php";

use model\Model;
use view\View;

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
        $this->view->$value([null, null, null]);
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
        } elseif ($what == 'recept') {
            $searchresult = $this->model->getRecept($searchValue);
        }
        $this->view->showCreate($searchresult);
    }
}