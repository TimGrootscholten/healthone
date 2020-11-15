<?php

use controller\Controller;
include_once 'VMC/controller/Controller.php';
$controller = new Controller();

/*als hij een poging doet om inteloggen*/
if(isset($_POST['auth'])){
    $controller->checkLogin($_POST["auth"]);
}
/*laat de login zien */
else
{
    $controller->showLogin();
}



