<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" data="style" type="text/css" href="css/style.css"/>
    <link rel="stylesheet" data="style" type="text/css" href="css/styleIndex.css"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <title>Health One</title>
</head>

<body>
<header>
    <a href="Dashboard.php">
        <img src="./img/logo.png" alt="Logo">
    </a>
</header>
<main>
    <form method="post" action="">
        <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input value="h.bannink@big.nl" type="email" class="form-control" name="email"
                   aria-describedby="emailHelp"
                   placeholder="Enter email">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input value="harry" type="password" class="form-control" name="password"
                   placeholder="Password">
        </div>
        <input type="submit" name="auth" value="Login" class="btn btn-primary">
    </form>
</main>
</body>
</html>
<?php
try {
    $db = new PDO("mysql:host=localhost;dbname=healthone", "root");
    if (isset($_POST["auth"])) {
        $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
        $password = sha1($_POST['password']);
        $query = $db->prepare("SELECT * FROM auth WHERE email = :email AND password = :password");
        $query->bindParam("email", $email);
        $query->bindParam("password", $password);
        $query->execute();
        if ($query->rowCount() == 1) {
            $result = $query->fetch(PDO::FETCH_ASSOC);
            setcookie("token", $result['id']);
            redirect("Dashboard.php");
        } else {
            echo "niet binnen";
        }
    }
} catch (PDOException $e) {
    die("Error!: " . $e->getMessage());
}
function redirect($url)
{
    ob_start();
    header('Location: ' . $url);
    ob_end_flush();
    die();
}

?>
