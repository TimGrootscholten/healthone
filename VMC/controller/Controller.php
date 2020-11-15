<?php
namespace controller;
include_once "VMC/view/View.php";
use view\View;
include_once "VMC/model/Patient.php";
use model\Model;

class Controller
{
    private $view;
    private $model;
    public function __construct(){
        $this->model = new Model();
        $this->view = new View($this->model);
    }
    public function showLogin(){
        $this->view->showLogin();
    }
    public function checkLogin(){
        $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
        $password = sha1($_POST['password']);
        if ($result=$this->model->checkLogin($email, $password) == 1){
            echo "binnwn";
        }else{
            $this->view->showLogin();
        }
    }
}