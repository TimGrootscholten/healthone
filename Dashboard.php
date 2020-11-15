<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" data="style" type="text/css" href="css/style.css"/>
    <link rel="stylesheet" data="style" type="text/css" href="css/styleDashboard.css"/>
    <title>Health One</title>
</head>

<body>
<header>
    <div class="topnav nav-tabs">
        <a class="active">Dashboard</a>
        <a href="Create.php">Create</a>
        <a href="index.php">Log-out</a>
    </div>
</header>
<main>
    <div class="recepts">

        <div class="search">
            <form>
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
        <table class="table">
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
            <tr>
                <th>345092</th>
                <td>29-03-2003</td>
                <td>Tim Grootscholten</td>
                <td>Eenmalig</td>
            </tr>
            <tr>
                <th>345092</th>
                <td>29-03-2003</td>
                <td>Tim Grootscholten</td>
                <td>Eenmalig</td>
            </tr>
            <tr>
                <th>345092</th>
                <td>29-03-2003</td>
                <td>Tim Grootscholten</td>
                <td>Eenmalig</td>
            </tr>
            </tbody>
        </table>
    </div>


    <form class="receptInfo" style="display: none;">
        <h2>Patiënten gegevens</h2>
        <div class="container">
            <div class="item">
                <input class="form-control mr-sm-2" type="text" placeholder="Naam">
                <input class="form-control mr-sm-2" type="text" placeholder="Geboorte datum">
                <input class="form-control mr-sm-2" type="text" placeholder="Geslacht">
            </div>
            <div class="item">
                <input class="form-control mr-sm-2" type="text" placeholder="Patiënt nummer">
                <input class="form-control mr-sm-2" type="text" placeholder="Adres">
            </div>
        </div>
        <h2>Recept gegevens</h2>
        <div class="container">
            <div class="item">
                <input class="form-control mr-sm-2" type="text" placeholder="Id">
                <input class="form-control mr-sm-2" type="text" placeholder="Naam">
                <input class="form-control mr-sm-2" type="text" placeholder="Type recept">
            </div>
            <div class="item">
                <input class="form-control mr-sm-2" type="text" placeholder="Dosiring">
                <input class="form-control mr-sm-2" type="text" placeholder="Verzekerings type">
                <input class="form-control mr-sm-2" type="text" placeholder="Docker">
            </div>
        </div>
        <textarea name="Text1" cols="150" placeholder="Werking" rows="4"></textarea><br>
        <textarea name="Text1" cols="150" placeholder="Bijwerkingen" rows="4"></textarea><br>
        <textarea name="Text1" cols="150" placeholder="Notities" rows="4"></textarea>
    </form>

</main>
</body>

</html>
<?php


try {
    $db = new PDO("mysql:host=localhost;dbname=healthone", "root");
    if (isset($_COOKIE["token"])) {
        $query = $db->prepare("SELECT * FROM auth WHERE id = :id");
        $query->bindParam("id", $_COOKIE['token']);
        $query->execute();
        if ($query->rowCount() == 1) {
            $result = $query->fetch(PDO::FETCH_ASSOC);
            if ($result['role'] == 'arts' || $result['role'] == 'apotheek'){
                echo $result['role'];
                recepten($db);
            }
        } else {
            echo "niet binnen";
        }
    }
} catch (PDOException $e) {
    die("Error!: " . $e->getMessage());
}
function recepten($db){

}


?>