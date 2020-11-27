<?php
session_start();
spl_autoload_register('loadClass');

function loadClass($class)
{
    include $class . ".php";
}
$controller = new MVC\controller\Controller();
/*als hij een poging doet om inteloggen*/
if (isset($_POST['auth'])) {
    $controller->checkLogin();
} else if (isset($_POST['logout'])) {
    $controller->logoutAction();
}
if (isset($_SESSION['role']) && $_SESSION['role'] == "arts") {
    //header
    if (isset($_POST['create'])) {
        $controller->show('Create');
    } elseif (isset($_POST['dashboard'])) {
        $controller->showDashboard();
    } elseif (isset($_POST['getPatienten'])) {
        $controller->showPatient();
    } elseif (isset($_POST['getMedicijnen'])) {
        $controller->showMedicijn();
    } elseif (isset($_POST['log-out'])) {
        $controller->show('Login');
    }

    //Dashboard
    elseif (isset($_POST['receptInfo'])) {
        $controller->showReceptInfo();
    }
    //create
    elseif (isset($_POST['zoekPatient'])) {
        $controller->search('patient');
    } elseif (isset($_POST['zoekMedicijn'])) {
        $controller->search('medicijn');
    } elseif (isset($_POST['CMedicijnVerwijderen'])) {
        $controller->createVerwijderen('medicijn');
    } elseif (isset($_POST['CPatientVerwijderen'])) {
        $controller->createVerwijderen('patient');
    } elseif (isset($_POST['createSubmit'])) {
        $controller->createRecept();
    }

    //medicijnen
    elseif (isset($_POST['medicijnWijzigen'])) {
        $controller->medicijnWijzigen();
    } elseif (isset($_POST['medicijnVerwijderen'])) {
        $controller->medicijnVerwijderen();
    } elseif (isset($_POST['medicijnUpdaten'])) {
        $controller->medicijnUpdaten();
    } elseif (isset($_POST['medicijnMaken'])) {
        $controller->show('medicijnCreate');
    } elseif (isset($_POST['medicijnCreate'])) {
        $controller->medicijnCreate();
    }

    //patient
    elseif (isset($_POST['patientWijzigen'])) {
        $controller->patientWijzigen();
    } elseif (isset($_POST['patientVerwijderen'])) {
        $controller->patientVerwijderen();
    } elseif (isset($_POST['patientUpdaten'])) {
        $controller->patientUpdaten();
    } elseif (isset($_POST['patientMaken'])) {
        $controller->show('PatientCreate');
    } elseif (isset($_POST['patientCreate'])) {
        $controller->patientCreate();
    }
}
/*laat de login zien */ else {
    $controller->show('Login');
}
