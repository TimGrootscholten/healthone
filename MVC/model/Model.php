<?php


namespace MVC\model;

use PDO;

class Model
{
    private $database;

    public function checkLogin($email, $password){
        $this->makeConnection();
        $password = strtoupper(hash("sha256", $password));
        $selection = $this->database->prepare("SELECT * FROM auth WHERE email = :email AND password = :password");
        $selection->bindParam(":email",$email);
        $selection->bindParam(":password", $password);
        $selection->execute();
        if ($selection->rowCount() == 1) {
            $result = $selection->fetch(PDO::FETCH_ASSOC);
            $_SESSION['user'] = $result['voornaam'];
            $_SESSION['role'] = $result['role'];
        }
        
        
        
        
        // if($result) {
        //     $selection->setFetchMode(\PDO::FETCH_CLASS, \model\User::class);
        //     $user = $selection->fetch();
        //     if ($user) {
        //         $gehashtpassword = strtoupper(hash("sha256", $password));
        //         if ($user->getPassword() == $gehashtpassword) {
        //             $_SESSION['user'] = $user->getUsername();
        //             $_SESSION['role'] = $user->getRole();
        //         }
        //     }
        // }
    }

    public function logout(){
        session_unset();
        session_destroy();
    }

    // public function checkLogin($email, $password)
    // {
    //     $this->makeConnection();
    //     $selection = $this->database->prepare("SELECT * FROM auth WHERE email = :email AND password = :password");
    //     $selection->bindParam(":email", $email);
    //     $selection->bindParam(":password", $password);
    //     $selection->execute();
    //     if ($selection->rowCount() == 1) {
    //         $result = $selection->fetch(PDO::FETCH_ASSOC);
    //         setcookie("token", $result['id']);
    //     }
    //     return $selection;
    // }

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
            setcookie("patient", json_encode($result));
            return [$result, 'patient'];
        }
        return [null, null];
    }

    public function getMedicijn($searchValue)
    {
        $this->makeConnection();
        $selection = $this->database->prepare('SELECT * FROM medicijnen WHERE id = :searchvalue OR naam = :searchvalue');
        $selection->bindParam(":searchvalue", $searchValue);
        $selection->execute();
        if ($selection->rowCount() == 1) {
            $result = $selection->fetch(PDO::FETCH_ASSOC);
            @$i = count($_COOKIE['medicijn']) + 1;
            setcookie("medicijn[$i]", json_encode($result));
            $medicijnen = array();
            if (isset($_COOKIE['medicijn'])) {
                foreach ($_COOKIE['medicijn'] as $id => $value) {
                    $id = htmlspecialchars($id);
                    $medicijn = (array)json_decode($value);
                    array_push($medicijnen, $medicijn);
                }
            }
            array_push($medicijnen, $result);
            return [$medicijnen, 'medicijn'];
        }
        return [null, null];
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

    public function removeCookie($cookieNaam)
    {
        setcookie($cookieNaam, null);
    }

    public function createRecept($patientId, $medicijnId, $notities, $herhaling)
    {
        $this->makeConnection();
        if($herhaling == null){
            $herhaling = 0;
        }else{
            $herhaling = 1;
        }
        $date = date("Y-m-d");
        if($medicijnId !== '[]' && $patientId !== '' ){
            $selection = $this->database->prepare("INSERT INTO recepten (id, notitie, patientId, medicijnenId, herhaling, date) 
            VALUES (NULL, :notitie, :patientId, :medicijnId, :herhaling, :date)");
            $selection->bindParam('notitie', $notities);
            $selection->bindParam('patientId', $patientId);
            $selection->bindParam('medicijnId', $medicijnId);
            $selection->bindParam('herhaling', $herhaling);
            $selection->bindParam('date', $date);
            $selection->execute();
            setcookie("patient", null);
            foreach ($_COOKIE['medicijn'] as $id => $value) {
                $id = htmlspecialchars($id);
                setcookie("medicijn[$id]", null);
            }
        }

    }
    public function getRecepten(){
        $this->makeConnection();
        $selection = $this->database->query('SELECT * FROM recepten');
        $selection->execute();
        $result = $selection->fetchAll(PDO::FETCH_ASSOC);
        if ($result !== null){   
            $patienten = array();  
            foreach($result as $recept){
                $patient = $this->getPatientById($recept['patientId']);
                array_push($patienten, $patient);
            }

            return [$result, $patienten];  
        } 
        return null;
    }

    public function showReceptById($id){
        $this->makeConnection();
        $selection = $this->database->prepare('SELECT * FROM recepten WHERE recepten.id =:id');
        $selection->bindParam(":id", $id);
        $result = $selection->execute();
        $result = $selection->fetch(PDO::FETCH_ASSOC);
        if($result !== null){
            $patient =$this->getPatientById($result['patientId']);
            $medicijnId = json_decode($result['medicijnenId']);
            $medicijnen = array();
            foreach($medicijnId as $medicijn){
                $medicijn = $this->getMedicijnById($medicijn);
                array_push($medicijnen, $medicijn);
            }
            return [$result, $patient, $medicijnen];
        }
    }
}
