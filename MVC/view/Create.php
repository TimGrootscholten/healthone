<?php


namespace MVC\view;


class Create
{

    public function showCreate($searchValue)
    {
        if ($searchValue[2] == 'patient') {
            $this->patient = $searchValue[0];
            echo 'patient value<br>';
        } elseif ($searchValue[2] == 'medicijn') {
            $this->medicijn = $searchValue[0];
        }
        if (!$this->patient == null) {
            $patient = true;
            echo 'patient true';

        } else $patient = false;
        if (!$this->medicijn == null) {
            $medicijn = true;
        } else $medicijn = false;
        echo "<style>";
        include 'css/style.css';
        include "css/styleCreate.css";
        echo "</style>";

        echo <<<EOF
        <!DOCTYPE html>
<html lang='en'>

<head>
  <meta charset='UTF-8'>
  <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css'>
  <meta name='viewport' content='width=device-width, initial-scale=1.0'>
  <title>Health One</title>
</head>

<body>
  <main>
    <form>
          <h2>Patiënten gegevens</h2>
EOF;
        if ($patient) {
            echo $this->patient['id'] . $this->patient['naam'] . $this->patient['adres'] . $this->patient['woonplaats'] . $this->patient['zknummer'] . $this->patient['geboortedatum'] . $this->patient['soortverzekering'];
        } elseif (!$patient) {
            echo "niet gevonden";
        }
        echo "
          <form method='post' action='index.php'>
            <input type='text' class='form-control' name='value'
                   placeholder='Zoek patiënten'>
        <input type='submit' name='zoekPatient' value='Zoeken' class='btn btn-primary'>
          <h2>Recept gegevens</h2>";
        if ($medicijn) {
            echo $this->medicijn['id'] . $this->medicijn['naam'] . $this->medicijn['werking'] . $this->medicijn['bijwerking'];
        } elseif (!$medicijn) {
            echo "niet gevonden";
        }

        echo <<<EOF
</form>
    <form method='post' action='index.php'>
            <input type='text' class='form-control' name='value'
                   placeholder='Zoek medicijn'>
        <input type='submit' name='zoekMedicijn' value='Zoeken' class='btn btn-primary'>
  </main>

</body>

</html>
EOF;
    }
}