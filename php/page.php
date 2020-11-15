<?php

try {
    $db = new PDO("mysql:host=localhost;dbname=fietsenmaker", "root");

    if (isset($_POST['verzenden'])){
        $merk = filter_input(INPUT_POST, "merk", FILTER_SANITIZE_STRING);
        $type = filter_input(INPUT_POST, "type", FILTER_SANITIZE_STRING);
        $prijs = filter_input(INPUT_POST, "prijs", FILTER_SANITIZE_NUMBER_INT);
        $query = $db->prepare("INSERT INTO fietsen(merk,type,prijs) VALUES(:merk, :type, :prijs)");

        $query->bindParam("merk", $merk);
        $query->bindParam("type", $type);
        $query->bindParam("prijs", $prijs);
        if ($query->execute()){
            echo "De nieuwe gegevens zijn toegevoegd.";

        }else{
            echo "Er is een fout opgetreden!";
        }
        echo "<br>";

    }
} catch (PDOException $e) {
    die("Error!: " . $e->getMessage());
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Health One</title>
</head>
<body>
    <form method="post" action="">
        <label>Merk</label>
        <input type="text" name="merk"><br>
        <label>Type</label>
        <input type="text" name="type"><br>
        <label>prijs</label>
        <input type="text" name="prijs">
        <input type="submit" name="verzenden" value="opslaan">




    </form>
</body>


</html>

