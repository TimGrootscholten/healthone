<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" data="style" type="text/css" href="css/style.css" />
  <link rel="stylesheet" data="style" type="text/css" href="css/styleCreate.css" />
  <title>Health One</title>
</head>

<body>
  <header>
    <div class="topnav nav-tabs">
      <a href="Dashboard.php"> Dashboard</a>
      <a class="active">Create</a>
      <a href="index.php">Log-out</a>
    </div>
  </header>
  <main>
    <form>
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