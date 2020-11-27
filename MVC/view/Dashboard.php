<?php

namespace MVC\view;

class Dashboard
{
    public function showDashboard($recepten)
    {
        echo "<style>";
        include 'css/style.css';
        include "css/styleDashboard.css";
        echo "</style>";
        echo <<<EOF
        <!DOCTYPE html>
        <html lang='en'>
        
        <head>
            <meta charset='UTF-8'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
            <title>Health One</title>
        </head>
        
        <body>
            <main>
                <div class='recepts'>
                    <table class='table'>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Datum</th>
                                <th>Naam</th>
                                <th>zk nummer</th>
                                <th>Type</th>
                                <th>Medicijn(en) id</th>
                                <th>Soortverzekering</th>
                            </tr>
                        </thead>
                        <tbody> 
EOF;
        $this->recepten($recepten);
        echo <<<EOF
                        </tbody>
                    </table>
                </div>
            </main>
        </body>
        
        </html>
EOF;
    }
    private function recepten($recepten)
    {
        for ($i = 0; count($recepten[0]) - 1 >= $i; $i++) {
            if ($recepten[0][$i]['herhaling'] == 1) {
                $recepten[0][$i]['herhaling'] = 'Herhaling';
            } else $recepten[0][$i]['herhaling'] = 'Eenmalig';
            echo "
            <tr>
                <th>" . $recepten[0][$i]['id'] . "</th>
                <td>" . $recepten[0][$i]['date'] . "</td>
                <td>" . $recepten[1][$i]['naam'] . "</td>
                <td>" . $recepten[1][$i]['zknummer'] . "</td>
                <td>" . $recepten[0][$i]['herhaling'] . "</td>
                <td>" . implode(", ", json_decode($recepten[0][$i]['medicijnenId'])) . "</td>
                <td>" . $recepten[1][$i]['soortverzekering'] . "</td>
                <td>
                <form action='index.php' method='post'>
                <input type='hidden' name='receptInfo' value=" . $recepten[0][$i]['id'] . ">
                <input class='btn btn-primary' type='submit' value='Info'/>
                </form>
                
                </td>
                </tr>
                ";
            
        }
    }
}
