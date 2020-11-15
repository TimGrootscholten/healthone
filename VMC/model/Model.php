<?php


namespace model;
include_once('VMC/model/Patient.php');
class Model
{
    private $database;

    private function makeConnection(){
        $this->database = new \PDO('mysql:host=localhost;dbname=healthone', "root", "");
    }
    public function checkLogin($email, $password){
        $this->makeConnection();
        $selection = $this->database->prepare("SELECT * FROM auth WHERE email = :email AND password = :password");
        $selection->bindParam(":email", $email);
        $selection->bindParam(":password", $password);
        $selection->execute();
        return $selection->rowCount();
    }
}