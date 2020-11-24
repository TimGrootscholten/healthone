<?php


namespace MVC\model;

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
            return ['patient', true, $result];
        } else {
            return [null, false, null];
        }

    }

    public function getMedicijn($searchValue)
    {
        $this->makeConnection();
        $selection = $this->database->prepare('SELECT * FROM medicijnen WHERE id = :searchvalue OR naam = :searchvalue');
        $selection->bindParam(":searchvalue", $searchValue);
        $selection->execute();
        if ($selection->rowCount() == 1) {
            $result = $selection->fetch(PDO::FETCH_ASSOC);
            return ['medicijn', true, $result];
        } else {
            return [null, false, null];
        }

    }

    /*
     * Patienten
     */

    public function getPatienten()
    {
        $this->makeConnection();
        $selection = $this->database->query('SELECT * FROM patienten');
        $selection->execute();
        $result = $selection->fetchAll(PDO::FETCH_ASSOC);
        if ($result !== null) return $result;
        return null;
    }

    public function getPatientById($id)
    {
        $this->makeConnection();
        $selection = $this->database->prepare('SELECT * FROM patienten WHERE id =:id');
        $selection->bindParam(":id", $id);
        $selection->execute();
        $result = $selection->fetch(PDO::FETCH_ASSOC);
        if ($result !== null) return $result;
        return null;
    }

    public function updatePatient($id, $naam, $adres, $woonplaats, $geboortedatum, $zknummer, $soortverzekering)
    {
        $this->makeConnection();
        $selection = $this->database->prepare("UPDATE patienten SET naam = :naam, adres=:adres, woonplaats = :woonplaats,
            zknummer=:zknummer, geboortedatum=:geboortedatum, soortverzekering=:soortverzekering 
            WHERE patienten.id = :id ");
        $selection->bindParam(":id", $id);
        $selection->bindParam(":naam", $naam);
        $selection->bindParam(":adres", $adres);
        $selection->bindParam(":woonplaats", $woonplaats);
        $selection->bindParam(":zknummer", $zknummer);
        $selection->bindParam(":geboortedatum", $geboortedatum);
        $selection->bindParam(":soortverzekering", $soortverzekering);
        $result = $selection->execute();
        if ($result == 1) {
            return true;
        }
        return null;
    }

    public function deletePatientById($id)
    {
        $this->makeConnection();
        $selection = $this->database->prepare('DELETE FROM patienten WHERE patienten.id =:id');
        $selection->bindParam(":id", $id);
        $result = $selection->execute();
        return $result;
    }

    public function insertPatient($naam, $adres, $woonplaats, $geboortedatum, $zknummer, $soortverzekering)
    {
        $this->makeConnection();
        if ($naam != '' && $adres != '' && $woonplaats != '' && $geboortedatum != '' && $zknummer != '' && $soortverzekering != '') {
            $selection = $this->database->prepare("INSERT INTO patienten (id, naam, adres, woonplaats, zknummer, geboortedatum, soortverzekering) 
                VALUES (NULL, :naam, :adres, :woonplaats, :zknummer, :geboortedatum, :soortverzekering)");
            $selection->bindParam(":naam", $naam);
            $selection->bindParam(":adres", $adres);
            $selection->bindParam(":woonplaats", $woonplaats);
            $selection->bindParam(":zknummer", $zknummer);
            $selection->bindParam(":geboortedatum", $geboortedatum);
            $selection->bindParam(":soortverzekering", $soortverzekering);
            $selection->execute();
        }
    }

    /*
    * Medicijnen
    */

    public function getMedicijnen()
    {
        $this->makeConnection();
        $selection = $this->database->query('SELECT * FROM medicijnen');
        $selection->execute();
        $result = $selection->fetchAll(PDO::FETCH_ASSOC);
        if ($result !== null) return $result;
        return null;
    }

    public function getMedicijnById($id)
    {
        $this->makeConnection();
        $selection = $this->database->prepare('SELECT * FROM medicijnen WHERE id =:id');
        $selection->bindParam(":id", $id);
        $selection->execute();
        $result = $selection->fetch(PDO::FETCH_ASSOC);
        if ($result !== null) return $result;
        return null;
    }

    public function updateMedicijn($id, $naam, $werking, $bijwerking, $verzekerd)
    {
        $this->makeConnection();
        $selection = $this->database->prepare("UPDATE medicijnen SET naam = :naam, werking=:werking,
            bijwerking=:bijwerking, verzekerd=:verzekerd WHERE medicijnen.id = :id ");
        $selection->bindParam(":id", $id);
        $selection->bindParam(":naam", $naam);
        $selection->bindParam(":werking", $werking);
        $selection->bindParam(":bijwerking", $bijwerking);
        $selection->bindParam(":verzekerd", $verzekerd);
        $result = $selection->execute();
        if ($result == 1) {
            return true;
        }
        return null;
    }

    public function deleteMedicijnById($id)
    {
        $this->makeConnection();
        $selection = $this->database->prepare('DELETE FROM medicijnen WHERE medicijnen.id =:id');
        $selection->bindParam(":id", $id);
        $result = $selection->execute();
        return $result;
    }

    public function insertMedicijn($id, $naam, $werking, $bijwerking, $verzekerd)
    {
        $this->makeConnection();
        if ($naam != '' && $werking != '' && $bijwerking != '' && $verzekerd != '') {
            $selection = $this->database->prepare("INSERT INTO medicijnen (id, naam, werking, bijwerking, verzekerd) 
                VALUES (NULL, :naam, :werking, :bijwerking, :verzekerd)");
            $selection->bindParam(":naam", $naam);
            $selection->bindParam(":werking", $werking);
            $selection->bindParam(":bijwerking", $bijwerking);
            $selection->bindParam(":verzekerd", $verzekerd);
            $selection->execute();
        }
    }

    public function removeCookie($cookieNaam){
        setcookie($cookieNaam, null);
    }
}