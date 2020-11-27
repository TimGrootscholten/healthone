<?php

namespace MVC\view;

class Create
{
    private $idPatient = array();
    private $idMedicijn = array();

    public function showCreate($searchresult)
    {
        echo <<<EOF
            <!DOCTYPE html>
            <html lang='en'>

            <head>
                <meta charset='UTF-8'>
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
                <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                <title>Health One</title>
            </head>

            <body>
                <main>
                <h2>Patiënt gegevens</h2>
                <form method='post' action='index.php'>
                    <input type='text' class='form-control' name='value' placeholder='Zoek patiënten'>
                    <input type='submit' name='zoekPatient' value='Zoeken' class='btn btn-primary'>
                </form>
              
EOF;
        $this->patient($searchresult);
        echo <<<EOF
                </tbody>
                </table>
                
                <h2>Medicijn gegevens</h2>
                <form method='post' action='index.php'>
                    <input type='text' class='form-control' name='value' placeholder='Zoek medicijn'>
                    <input type='submit' name='zoekMedicijn' value='Zoeken' class='btn btn-primary'>
                </form>
                
EOF;
        $this->medicijn($searchresult);
        echo "
            </tbody>
            </table>
            <form method='post' action='index.php'>
            <div class='form-check'>
                <input type='checkbox' name='herhaling' class='form-check-input' id='check'>
                <label class='form-check-label' for='check'>Herhalings recept</label>
                </div>
                <textarea rows='3' placeholder='Notities' name='notitie' style='margin-top: 1em' ></textarea>
                <input type='hidden' name='patientId' value=".json_encode($this->idPatient).">
                <input type='hidden' name='medicijnId' value=". json_encode($this->idMedicijn).">
                <input type='submit'  name='createSubmit' value='Create' class='btn btn-primary'>
            </form>
            </main>
            </body>
            </html>
";

        echo "<style>";
        include 'css/style.css';
        include "css/styleCreate.css";
        echo "</style>";
    }

    public function patient($searchresult)
    {
        if($searchresult[1] == 'patient'){
            $patient = $searchresult[0];
            array_push($this->idPatient, $patient['id']);
            echo "
            <table class='table'>
            <thead>
            <tr>
                <th>ID</th>
                <th>Naam</th>
                <th>Adres</th>
                <th>Woonplaats</th>
                <th>Zknummer</th>
                <th>Geboortedatum</th>
                <th>Soortverzekering</th>

            </tr>
            </thead>
            <tbody>

            <tr>
                <th>" . $patient['id'] . "</th>
                <td>" . $patient['naam'] . "</td>
                <td>" . $patient['adres'] . "</td>
                <td>" . $patient['woonplaats'] . "</td>
                <td>" . $patient['zknummer'] . "</td>
                <td>" . $patient['geboortedatum'] . "</td>
                <td>" . $patient['soortverzekering'] . "</td>
                
                <td> 
                <form action='index.php' method='post'>
                <input type='hidden' name='CPatientVerwijderen' value=" . $patient['id'] . ">
                <input class='btn btn-danger' type='submit' value='X'/>
                </form>
                </td>
                                       
            </tr>";
        }elseif (isset($_COOKIE['patient'])) {
            $patient = (array)json_decode($_COOKIE['patient']);
            array_push($this->idPatient, $patient['id']);
    
            echo "
            <table class='table'>
            <thead>
            <tr>
                <th>ID</th>
                <th>Naam</th>
                <th>Adres</th>
                <th>Woonplaats</th>
                <th>Zknummer</th>
                <th>Geboortedatum</th>
                <th>Soortverzekering</th>

            </tr>
            </thead>
            <tbody>

            <tr>
                <th>" . $patient['id'] . "</th>
                <td>" . $patient['naam'] . "</td>
                <td>" . $patient['adres'] . "</td>
                <td>" . $patient['woonplaats'] . "</td>
                <td>" . $patient['zknummer'] . "</td>
                <td>" . $patient['geboortedatum'] . "</td>
                <td>" . $patient['soortverzekering'] . "</td>
                
                <td> 
                <form action='index.php' method='post'>
                <input type='hidden' name='CPatientVerwijderen' value=" . $patient['id'] . ">
                <input class='btn btn-danger' type='submit' value='X'/>
                </form>
                </td>
                                       
            </tr>";
        }
    }

    public function medicijn($searchresult)
    {
        if (isset($_COOKIE['medicijn']) || $searchresult[1] == 'medicijn') {
            echo <<<EOF
 <table class='table'>
            <thead>
            <tr>
                <th>ID</th>
                <th>Naam</th>
                <th>Werking</th>
                <th>Bijwerking</th>
                <th>Verzekerd</th>

            </tr>
            </thead>
            <tbody>

EOF;
            if($searchresult[1] == 'medicijn'){
                foreach($searchresult[0] as $medicijn){
                    array_push($this->idMedicijn, $medicijn['id']);
                    echo "
                    <tr>
                    <th>" . $medicijn['id'] . "</th>
                    <td>" . $medicijn['naam'] . "</td>
                    <td>" . $medicijn['werking'] . "</td>
                    <td>" . $medicijn['bijwerking'] . "</td>
                    <td>" . $medicijn['verzekerd'] . "</td>
                    <td>
                    <td> <form action='index.php' method='post'>
                    <input type='hidden' name='CMedicijnVerwijderen' value=" . $medicijn['id'] . ">
                <input class='btn btn-danger' type='submit' value='X'/></form></td>
                
                </tr>";
                }
            }else{
                foreach ($_COOKIE['medicijn'] as $id => $value) {
                    $id = htmlspecialchars($id);
                    $medicijn = (array)json_decode($value);
                    array_push($this->idMedicijn, $medicijn['id']);
                    


                    echo "
                    <tr>
                    <th>" . $medicijn['id'] . "</th>
                    <td>" . $medicijn['naam'] . "</td>
                    <td>" . $medicijn['werking'] . "</td>
                    <td>" . $medicijn['bijwerking'] . "</td>
                    <td>" . $medicijn['verzekerd'] . "</td>
                    <td>
                    <td> <form action='index.php' method='post'>
                    <input type='hidden' name='CMedicijnVerwijderen' value=" . $id . ">
                <input class='btn btn-danger' type='submit' value='X'/></form></td>
                
                </tr>";
                }
            }
        }
    }
}