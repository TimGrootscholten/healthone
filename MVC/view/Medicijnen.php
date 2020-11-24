<?php


namespace MVC\view;


class Medicijnen
{
    public function showMedicijnen($Medicijnen)
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
                <th>Werking</th>
                <th>Bijwerking</th>
                <th>Verzekerd</th>

            </tr>
            </thead>
            <tbody>";
        foreach ($Medicijnen as $medicijn) {
            echo "
            <tr>
                <th>" . $medicijn['id'] . "</th>
                <td>" . $medicijn['naam'] . "</td>
                <td>" . $medicijn['werking'] . "</td>
                <td>" . $medicijn['bijwerking'] . "</td>
                <td>" . $medicijn['verzekerd'] . "</td>
                <td>
                <form action='index.php' method='post'>
                <input type='hidden' name='medicijnWijzigen' value=" . $medicijn['id'] . ">
                <input class='btn btn-warning' type='submit' value='Wijzigen'/></form></td>
                <td> <form action='index.php' method='post'>
                <input type='hidden' name='medicijnVerwijderen' value=" . $medicijn['id'] . ">
                <input class='btn btn-danger' type='submit' value='X'/></form></td>
                                       
            </tr>";
        }
        echo "
           
         </tbody>
        </table>
          <form action='index.php' method='post'>
         <input type='submit' class='btn btn-primary' name='medicijnMaken' value='Create'>
         </form>
    </div>
</main>
</body>

</html>
        ";
    }

    public function showMedicijnInfo($medicijnInfo)
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
      <td> <input type=\"hidden\" name=\"id\" value=" . $medicijnInfo['id'] . "/> 
      <label for=\"naam\">Naam</label></td>
      <td><input class='form-control' type=\"text\" name=\"naam\" value= '" . $medicijnInfo['naam'] . "'/></td>
    </tr>
    <tr>
      <td><label for=\"werking\">Werking</label></td>
      <td><textarea class='form-control' rows='3' type=\"text\" name=\"werking\" >" . $medicijnInfo['werking'] . "</textarea></td>
    </tr>
    <tr>
      <td><label for=\"bijwerking\">Bijwerking</label></td>
      <td><textarea class='form-control' rows='3' type=\"text\" name=\"bijwerking\">" . $medicijnInfo['bijwerking'] . "</textarea></td>
    </tr>
    <tr>
      <td><label for=\"verzekerd\">Verzekerd</label></td>
      <td><input class='form-control' type=\"number\" name=\"verzekerd\" value= '" . $medicijnInfo['verzekerd'] . "'/></td>
    </tr>
  </tbody>
</table>
    <input type='submit' class='btn btn-primary' name='medicijnUpdaten' value='opslaan'>
    </form>
</main>
</body>
</html>
        
        
        
        ";
    }

    public function showMedicijnCreate()
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
      <label for=\"naam\">medicijn naam</label></td>
      <td><input class='form-control' type=\"text\" name=\"naam\"/></td>
    </tr>
    <tr>
      <td><label for=\"werking\">werking</label></td>
      <td><textarea class='form-control' rows='3' type=\"text\" name=\"werking\" ></textarea></td>
    </tr>
    <tr>
      <td><label for=\"bijwerking\">bijwerking</label></td>
      <td><textarea class='form-control' rows='3' type=\"text\" name=\"bijwerking\"></textarea></td>
    </tr>
      <tr>
      <td> <label for=\"verzekerd\">verzekerd</label></td>
      <td><input class='form-control' type=\"text\" name=\"verzekerd\"/></td>
    </tr>  
  </tbody>
</table>
    <input type='submit' class='btn btn-primary' name='medicijnCreate' value='opslaan'>
    </form>
</main>
</body>
</html>";
    }
}