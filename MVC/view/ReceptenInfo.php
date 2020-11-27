<?php


namespace MVC\view;


class ReceptenInfo
{
    public function ReceptenInfo($info)
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
          
EOF;
        $this->patient($info);
        echo <<<EOF
            </tr>
            </tbody>
            </table>
            
            <h2>Medicijn gegevens</h2>
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
        $this->medicijn($info);
        echo "
        </tbody>
        </table>";
        $this->extraInfo($info);
        echo"
        </main>
        </body>
        </html>
";

        echo "<style>";
        include 'css/style.css';
        include "css/styleCreate.css";
        echo "</style>";
    }

    public function patient($info)
    {
        $patient = $info[1];
        echo "
  
            <th>" . $patient['id'] . "</th>
            <td>" . $patient['naam'] . "</td>
            <td>" . $patient['adres'] . "</td>
            <td>" . $patient['woonplaats'] . "</td>
            <td>" . $patient['zknummer'] . "</td>
            <td>" . $patient['geboortedatum'] . "</td>
            <td>" . $patient['soortverzekering'] . "</td>
        ";
    }

    public function medicijn($info)
    {
        foreach ($info[2] as $medicijn) {
            echo "
                <tr>
                <th>" . $medicijn['id'] . "</th>
                <td>" . $medicijn['naam'] . "</td>
                <td>" . $medicijn['werking'] . "</td>
                <td>" . $medicijn['bijwerking'] . "</td>
                <td>" . $medicijn['verzekerd'] . "</td>
                <td>
            </tr>";
        }
    }
    public function extraInfo($info){
        if($info[0]['herhaling'] == 1){
            $info[0]['herhaling'] = 'Dit is een herhalings recept';
        }else  $info[0]['herhaling'] = 'Dit is geen herhalings recept';

        if($info[0]['notitie'] !== null){
            echo"
            <div class='form-group'>
                <h2>Notitie</h2>
                <h5 class='border'>". $info[0]['notitie']."</h5>
            </div>
            ";
        }
        echo"
        
        <div class='form-group'style='padding-bottom:3em;' >
            <h5 class='border'>". $info[0]['herhaling']."</h5>
        </div>
        ";
    }
    
}
?>
