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
            <label>Voornaam</label>
            <input type="text" class="form-control" name="voornaam"
                   placeholder="Naam">
        </div>
        <div class="form-group">
            <label>Achternaam</label>
            <input type="text" class="form-control" name="achternaam"
                   placeholder="Achternaam">
        </div>
        <div class="form-group">
            <label>Soort arts</label>
            <input type="text" class="form-control" name="soortArts"
                   placeholder="Arst"
        </div>
        <div class="form-group">
            <label>Straat + nummer</label>
            <input type="text" class="form-control" name="straat"
                   placeholder="Straat + nummer">
        </div>
        <div class="form-group">
            <label>Postcode</label>
            <input type="text" class="form-control" name="postcode"
                   placeholder="Postcode">
        </div>
        <div class="form-group">
            <label>Plaats</label>
            <input type="text" class="form-control" name="plaats"
                   placeholder="Plaats">
        </div>
        <div class="form-group">
            <label>Email addres</label>
            <input type="text" class="form-control" name="email"
                   aria-describedby="emailHelp"
                   placeholder="Enter email">
        </div>
        <div class="form-group">
            <label>Telefoonnummer</label>
            <input type="text" class="form-control" name="telefoonnummer"
                   placeholder="Enter Telefoonnummer">
        </div>
        <div class="form-group">
            <label>Wachtwoord</label>
            <input type="password" class="form-control" name="password"
                   placeholder="Enter wachtwoord">
        </div>

        <input type="submit" name="register" value="Register" class="btn btn-primary">
    </form>
</main>
</body>
</html>
<?php

try {
    $db = new PDO("mysql:host=localhost;dbname=healthone", "root");
    if (isset($_POST["register"])) {
        $voornaam = filter_input(INPUT_POST, "voornaam", FILTER_SANITIZE_STRING);
        $achternaam = filter_input(INPUT_POST, "achternaam", FILTER_SANITIZE_STRING);
        $soortArts = filter_input(INPUT_POST, "soortArts", FILTER_SANITIZE_STRING);
        $straat = filter_input(INPUT_POST, "straat", FILTER_SANITIZE_STRING);
        $postcode = filter_input(INPUT_POST, "postcode", FILTER_SANITIZE_STRING);
        $plaats = filter_input(INPUT_POST, "plaats", FILTER_SANITIZE_STRING);
        $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
        $telefoonnummer = filter_input(INPUT_POST, "telefoonnummer", FILTER_SANITIZE_NUMBER_INT);
        $password = sha1($_POST['password']);
        $query = $db->prepare("INSERT INTO auth(voornaam, achternaam, soortArts, straat, postcode, plaats, email, telefoonnummer, password) VALUES(:voornaam, :achternaam, :soortArts, :straat, :postcode, :plaats, :email, :telefoonnummer, :password)");

        $query->bindParam("voornaam", $voornaam);
        $query->bindParam("achternaam", $achternaam);
        $query->bindParam("soortArts", $soortArts);
        $query->bindParam("straat", $straat);
        $query->bindParam("postcode", $postcode);
        $query->bindParam("plaats", $plaats);
        $query->bindParam("email", $email);
        $query->bindParam("telefoonnummer", $telefoonnummer);
        $query->bindParam("password", $password);
        $query->execute();
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
