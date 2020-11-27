<?php


namespace MVC\view;

class Patienten
{
    public function showPatienten($patienten)
    {
        echo "<style>";
        include 'css/style.css';
        include "css/styleDashboard.css";
        echo "</style>";

        echo "
<!DOCTYPE html>
<html lang='en'>

<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css' integrity='sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO' crossorigin='anonymous'>
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
                <input class='btn btn-warning' type='submit' value='Wijzigen'/>
                </form>

                </td>
                <td> 
                <form action='index.php' method='post'>
                <input type='hidden' name='patientVerwijderen' value=" . $patient['id'] . ">
                <input class='btn btn-danger' type='submit' value='X'/>
                </form>
                </td>
                                       
            </tr>";
        }
        echo "
           
        </tbody>
        </table>
          <form action='index.php' method='post'>
         <input type='submit' class='btn btn-primary' name='patientMaken' value='Create'>
         </form>
      </div>
</main>
</body>

</html>
        ";
    }

    public function showPatientInfo($patientInfo)
    {
        echo "<style>";
        include 'css/style.css';
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
<main class='wijzigen'>
    <form method='post' action='index.php' >
        <table class=' table'>
  <tbody>
    <tr>
      <td> <input type=\"hidden\" name=\"id\" value=" . $patientInfo['id'] . "/> 
      <label for=\"naam\">Patient naam</label></td>
      <td><input class='form-control' type=\"text\" name=\"naam\" value= '" . $patientInfo['naam'] . "'/></td>
    </tr>
    <tr>
      <td><label for=\"adres\">adres</label></td>
      <td><input class='form-control' type=\"text\" name=\"adres\" value = '" . $patientInfo['adres'] . "'/></td>
    </tr>
    <tr>
      <td><label for=\"woonplaats\">woonplaats</label></td>
      <td><input class='form-control' type=\"text\" name=\"woonplaats\" value= '" . $patientInfo['woonplaats'] . "'/></td>
    </tr>
      <tr>
      <td> <label for=\"geboortedatum\">geboortedatum</label></td>
      <td><input class='form-control' type=\"text\" name=\"geboortedatum\" value= '" . $patientInfo['geboortedatum'] . "'/></td>
    </tr>  
    <tr>
      <td> <label for=\"zknummer\">zknummer</label></td>
      <td><input class='form-control' type=\"text\" name=\"zknummer\" value= '" . $patientInfo['zknummer'] . "'/></td>
    </tr>  
    <tr>
      <td><label for=\"soortverzekering\">soortverzekering</label></td>
     <td><input class='form-control' type=\"text\" name=\"soortverzekering\" value= '" . $patientInfo['soortverzekering'] . "'/></td>
    </tr>
  </tbody>
</table>
    <input type='submit' class='btn btn-primary' name='patientUpdaten' value='opslaan'>
    </form>
</main>
</body>
</html>
        
        
        
        ";
    }

    public function showPatientCreate()
    {
        echo "<style>";
        include 'css/style.css';
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
<main class='wijzigen'>
    <form method='post' action='index.php' >
        <table class=' table'>
  <tbody>
    <tr>
      <td> <input type=\"hidden\" name=\"id\"/> 
      <label for=\"naam\">Patient naam</label></td>
      <td><input class='form-control' type=\"text\" name=\"naam\"/></td>
    </tr>
    <tr>
      <td><label for=\"adres\">adres</label></td>
      <td><input class='form-control' type=\"text\" name=\"adres\" /></td>
    </tr>
    <tr>
      <td><label for=\"woonplaats\">woonplaats</label></td>
      <td><input class='form-control' type=\"text\" name=\"woonplaats\"/></td>
    </tr>
      <tr>
      <td> <label for=\"geboortedatum\">geboortedatum</label></td>
      <td><input class='form-control' type=\"text\" name=\"geboortedatum\"/></td>
    </tr>  
    <tr>
      <td> <label for=\"zknummer\">zknummer</label></td>
      <td><input class='form-control' type=\"text\" name=\"zknummer\"/></td>
    </tr>  
    <tr>
      <td><label for=\"soortverzekering\">soortverzekering</label></td>
     <td><input class='form-control' type=\"text\" name=\"soortverzekering\" /></td>
    </tr>
  </tbody>
</table>
    <input type='submit' class='btn btn-primary' name='patientCreate' value='opslaan'>
    </form>
</main>
</body>
</html>";
    }
}