<?php


namespace MVC\view;


class Dashboard
{
    public function showDashboard()
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
    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css'>
    <title>Health One</title>
</head>

<body>
<main>
    <div class='recepts'>

        <div class='search'>
            <form>
                <input class='form-control mr-sm-2' type='search' placeholder='Search' aria-label='Search'>
                <button class='btn btn-outline-success my-2 my-sm-0' type='submit'>Search</button>
            </form>
        </div>
        <table class='table'>
            <thead>
            <tr>
                <th>ID</th>
                <th>Datum</th>
                <th>Naam</th>
                <th>Type</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <th>345092</th>
                <td>29-03-2003</td>
                <td>Tim Grootscholten</td>
                <td>Eenmalig</td>
            </tr>
            </tbody>
        </table>
    </div>
</main>
</body>

</html>
</html>
EOF;
    }
}