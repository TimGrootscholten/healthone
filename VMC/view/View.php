<?php

namespace view;
include_once('VMC/model/Model.php');
include_once('VMC/model/Patient.php');

class View
{

    private $model;

    public function __construct($model)
    {
        $this->model = $model;
    }

    public function showLogin(){
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
    <a href='Dashboard.php'>
        <img src='../../img/logo.png' alt='Logo'>
    </a>
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
}