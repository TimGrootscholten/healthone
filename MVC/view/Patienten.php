<?php


namespace MVC\view;

class Patienten
{
    public function showPatienten($patienten)
    {
        echo "<style>";
        include 'css/style.css';
        include "css/styleDashboard.css";
        echo "<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css'>";
        echo "</style>";

        echo "
<!DOCTYPE html>
<html lang='en'>

<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css'>
    <title>Health One</title>
</head>

<body>
<main>
    <div class='recepts'>
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
                <th>Wijzigen</th>
                <th>Verwijderen</th>
            </tr>
            </thead>
            <tbody>";
        foreach ($patienten as $patient) {
            echo "
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
                <input type='hidden' name='patientWijzigen' value=" . $patient['id'] . ">
                <input class='btn btn-warning' type='submit' value='Wijzigen'/></form></td>
                <td> <form action='index.php' method='post'>
                <input type='hidden' name='patientVerwijderen' value=" . $patient['id'] . ">
                <input class='btn btn-danger' type='submit' value='X'/></form></td>
                                       
            </tr>";
        }
        echo "
         </tbody>
        </table>
    </div>
</main>
</body>

</html>
        ";
    }

    public function showPatientInfo($patientInfo){
        echo "<form method='post' >
        <table>
            <tr><td></td><td>
                <input type=\"hidden\" name=\"id\" value=".$patientInfo['id']."/></td></tr>
             <tr><td>   <label for=\"naam\">Patient naam</label></td><td>
                <input type=\"text\" name=\"naam\" value= '" . $patientInfo['naam'] . "'/></td></tr>
            <tr><td>
                <label for=\"adres\">adres</label></td><td>
                <input type=\"text\" name=\"adres\" value = '" . $patientInfo["adres"] . "'/></td></tr>
            <tr><td>
                <label for=\"woonplaats\">woonplaats</label></td><td>
                <input type=\"text\" name=\"woonplaats\" value= '" . $patientInfo['woonplaats'] . "'/></td></tr>
            <tr><td>
                <label for=\"geboortedatum\">geboortedatum</label></td><td>
                <input type=\"text\" name=\"geboortedatum\" value= '" . $patientInfo['geboortedatum'] . "'/></td></tr>
            <tr><td>
                <label for=\"zknummer\">zknummer</label></td><td>
                <input type=\"text\" name=\"zknummer\" value= '" . $patientInfo['zknummer'] . "'/></td></tr>
                 <tr><td>
                <label for=\"soortverzekering\">soortverzekering</label></td><td>
                <input type=\"text\" name=\"soortverzekering\" value= '" . $patientInfo['soortverzekering'] . "'/></td></tr>
            <tr><td>
                <input type='submit' name='update' value='opslaan'></td><td>
            </td></tr></table>
            </form>
        </body>
        </html>";
    }
}