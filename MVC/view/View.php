<?php

namespace view;
include_once('MVC/model/Model.php');

class View
{

    private $model;

    public function __construct($model)
    {
        $this->model = $model;
    }

    public function showLogin()
    {
        setcookie("token", null);
        echo "<style>";
        include 'css/style.css';
        include "css/styleIndex.css";
        echo "</style>";
        echo "<!DOCTYPE html>
<html lang='en'>

<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css'>
    <title>Health One</title>
</head>
<body>
<header>
        <img src='../../img/logo.png' alt='Logo'>
</header>
<main>
    <form method='post' action='index.php'>
        <div class='form-group'>
            <label for='exampleInputEmail1'>Email address</label>
            <input value='h.bannink@big.nl' type='email' class='form-control' name='email'
                   aria-describedby='emailHelp'
                   placeholder='Enter email'>
        </div>
        <div class='form-group'>
            <label for='exampleInputPassword1'>Password</label>
            <input value='harry' type='password' class='form-control' name='password'
                   placeholder='Password'>
        </div>
        <input type='submit' name='auth' value='Login' class='btn btn-primary'>
    </form>
</main>
</body>
</html>";
    }

    public function showDashboard()
    {
        echo "<style>";
        include 'css/style.css';
        include "css/styleDashboard.css";
        echo "</style>";
        echo "<!DOCTYPE html>
<html lang='en'>

<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css'>
    <title>Health One</title>
</head>

<body>
<header>
   <form method='post' action='index.php'>
    <div class='topnav nav-tabs'>
        <input type='submit' name='dashboard' value='Dashboard' class='active'>
        <input type='submit' name='create' value='Create'>
        <input type='submit' name='log-out' value='Log-out'>
    </div>
</from>
</header>
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
</html>";
    }

    public function showCreate($searchValue){
        $value = $searchValue[0];
        $searchSucces= $searchValue[1];
        echo "<style>";
        include 'css/style.css';
        include "css/styleCreate.css";
        echo "</style>";

        echo "
         <form method='post' action='index.php'>
            <input type='text' class='form-control' name='value'
                   placeholder='search'>
        <input type='submit' name='test' class='btn btn-primary'>
    </form>";
        echo "
        <!DOCTYPE html>
<html lang='en'>

<head>
  <meta charset='UTF-8'>
  <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css'>
  <meta name='viewport' content='width=device-width, initial-scale=1.0'>
  <title>Health One</title>
</head>

<body>
 <header>
   <form method='post' action='index.php'>
    <div class='topnav nav-tabs'>
        <input type='submit' name='dashboard' value='Dashboard'>
        <input type='submit' name='create' value='Create' class='active'>
        <input type='submit' name='log-out' value='Log-out'>
    </div>
</from>
</header>
  <main>
    <form>
          <h2>Patiënten gegevens</h2>
          <div class='container'>
            <div class='item'>
              <input class='form-control mr-sm-2' value='' type='text' placeholder='Naam'>
              <input class='form-control mr-sm-2' type='text' placeholder='Geboorte datum'>
              <input class='form-control mr-sm-2' type='text' placeholder='Geslacht'>
            </div>
            <div class='item'>
              <input class='form-control mr-sm-2' type='text' placeholder='Patiënt nummer'>
              <input class='form-control mr-sm-2' type='text' placeholder='Adres'>
            </div>
          </div>
          <h2>Recept gegevens</h2>
          <div class='container'>
            <div class='item'>
              <input class='form-control mr-sm-2' type='text' placeholder='Id'>
              <input class='form-control mr-sm-2' type='text' placeholder='Naam'>
              <input class='form-control mr-sm-2' type='text' placeholder='Type recept'>
            </div>
            <div class='item'>
              <input class='form-control mr-sm-2' type='text' placeholder='Dosiring'>
              <input class='form-control mr-sm-2' type='text' placeholder='Verzekerings type'>
              <input class='form-control mr-sm-2' type='text' placeholder='Docker'>
            </div>
          </div>
          <textarea name='Text1' cols='150' placeholder='Werking' rows='4'></textarea><br>
          <textarea name='Text1' cols='150' placeholder='Bijwerkingen' rows='4'></textarea><br>
          <textarea name='Text1' cols='150' placeholder='Notities' rows='4'></textarea>
    </form>
  </main>

</body>

</html>";
    }

    public function showReceptInfo(){

        echo "
         <form class='receptInfo' style='display: none;'>
        <h2>Patiënten gegevens</h2>
        <div class='container'>
            <div class='item'>
                <input class='form-control mr-sm-2' type='text' placeholder='Naam'>
                <input class='form-control mr-sm-2' type='text' placeholder='Geboorte datum'>
                <input class='form-control mr-sm-2' type='text' placeholder='Geslacht'>
            </div>
            <div class='item'>
                <input class='form-control mr-sm-2' type='text' placeholder='Patiënt nummer'>
                <input class='form-control mr-sm-2' type='text' placeholder='Adres'>
            </div>
        </div>
        <h2>Recept gegevens</h2>
        <div class='container'>
            <div class='item'>
                <input class='form-control mr-sm-2' type='text' placeholder='Id'>
                <input class='form-control mr-sm-2' type='text' placeholder='Naam'>
                <input class='form-control mr-sm-2' type='text' placeholder='Type recept'>
            </div>
            <div class='item'>
                <input class='form-control mr-sm-2' type='text' placeholder='Dosiring'>
                <input class='form-control mr-sm-2' type='text' placeholder='Verzekerings type'>
                <input class='form-control mr-sm-2' type='text' placeholder='Docker'>
            </div>
        </div>
        <textarea name='Text1' cols='150' placeholder='Werking' rows='4'></textarea><br>
        <textarea name='Text1' cols='150' placeholder='Bijwerkingen' rows='4'></textarea><br>
        <textarea name='Text1' cols='150' placeholder='Notities' rows='4'></textarea>
    </form>";
    }
}