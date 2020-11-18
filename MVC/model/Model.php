<?php


namespace model;

use PDO;


class Model
{
    private $database;

    public function checkLogin($email, $password)
    {
        $this->makeConnection();
        $selection = $this->database->prepare("SELECT * FROM auth WHERE email = :email AND password = :password");
        $selection->bindParam(":email", $email);
        $selection->bindParam(":password", $password);
        $selection->execute();
        if ($selection->rowCount() == 1) {
            $result = $selection->fetch(PDO::FETCH_ASSOC);
            setcookie("token", $result['id']);
        }
        return $selection;
    }

    private function makeConnection()
    {
        $this->database = new \PDO('mysql:host=localhost;dbname=healthone', "root", "");
    }

    public function getPation($searchValue)
    {
        $this->makeConnection();
        $selection = $this->database->prepare('SELECT * FROM patienten WHERE id = :searchvalue OR naam = :searchvalue OR adres = :searchvalue OR zknummer = :searchvalue OR geboortedatum = :searchvalue');
        $selection->bindParam(":searchvalue", $searchValue);
        $selection->execute();
        if ($selection->rowCount() == 1) {
            $result = $selection->fetch(PDO::FETCH_ASSOC);
            return [$result, true, 'patient'];
        } else {
            return [null, false, 'patient'];
        }

    }

    public function getRecept($searchValue)
    {
        $this->makeConnection();
        $selection = $this->database->prepare('SELECT * FROM medicijnen WHERE id = :searchvalue OR naam = :searchvalue');
        $selection->bindParam(":searchvalue", $searchValue);
        $selection->execute();
        if ($selection->rowCount() == 1) {
            $result = $selection->fetch(PDO::FETCH_ASSOC);
            return [$result, true, 'recept'];
        } else {
            return [null, false, 'recept'];
        }

    }
}