<?php

use controller\Controller;
include_once 'MVC/controller/Controller.php';
$controller = new Controller();

/*als hij een poging doet om inteloggen*/
if(isset($_POST['auth'])){
    $controller->checkLogin();
}
elseif(isset($_POST['create'])){
    $controller->show('Create');
}
elseif (isset($_POST['dashboard'])){
    $controller->show('Dashboard');
}
elseif(isset($_POST['receptInfo'])){
    $controller->show('ReceptInfo');
}
elseif(isset($_POST['log-out'])){
    $controller->show('Login');
}
elseif (isset($_POST['zoekPatient'])){
    $controller->search('patient');
}
elseif (isset($_POST['zoekRecept'])){
$controller->search('recept');
}
/*laat de login zien */
else {
    $controller->show('Login');
}