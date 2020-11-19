<?php


spl_autoload_register('loadClass');

function loadClass($class)
{
    include $class . ".php";
}
$controller = new MVC\controller\Controller();
/*als hij een poging doet om inteloggen*/
if (isset($_POST['auth'])) { 
    $controller->checkLogin();
} elseif (isset($_POST['create'])) {
    $controller->show('Create');
} elseif (isset($_POST['dashboard'])) {
    $controller->show('Dashboard');
} elseif (isset($_POST['receptInfo'])) {
    $controller->show('ReceptInfo');
} elseif (isset($_POST['log-out'])) {
    $controller->show('Login');
} elseif (isset($_POST['zoekPatient'])) {
    $controller->search('patient');
} elseif (isset($_POST['zoekMedicijn'])) {
    $controller->search('medicijn');
} elseif (isset($_POST['getMedicijnen'])) {
    $controller->show('Medicijnen');
} elseif (isset($_POST['getPatienten'])) {
    $controller->showPastient();
} elseif (isset($_POST['patientWijzigen'])) {
    $controller->patientWijzigen();
}elseif (isset($_POST['patientVerwijderen'])) {

}

/*laat de login zien */
else {
    $controller->show('Login');
}