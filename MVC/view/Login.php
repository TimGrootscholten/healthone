<?php


namespace MVC\view;


class Login
{
    public function showLogin()
    {
        setcookie("token", null);
        echo "<style>";
        include 'css/style.css';
        include "css/styleIndex.css";
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
</html>
EOF;
    }

}