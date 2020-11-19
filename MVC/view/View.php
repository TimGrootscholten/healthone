<?php

namespace MVC\view;

use MVC\view\Login;
use MVC\view\Dashboard;
use MVC\view\Create;
use MVC\view\Medicijnen;
use MVC\view\Patienten;


class View
{


    private $login;
    private $Dashboard;
    private $Create;
    private $Medicijnen;
    private $Patienten;


    public function __construct()
    {
        $this->login = new \MVC\view\Login();
        $this->Dashboard = new \MVC\view\Dashboard();
        $this->Create = new \MVC\view\Create();
        $this->Medicijnen = new \MVC\view\Medicijnen();
        $this->Patienten = new \MVC\view\Patienten();
    }

    public function showheader(){
        echo <<<EOF
 <header>
   <form method='post' action='index.php'>
    <div class='topnav nav-tabs'>
        <input type='submit' name='dashboard' value='Dashboard' '>
        <input type='submit' name='create' value='Create'>
        <input type='submit' name='getMedicijnen' value='Medicijnen'>
        <input type='submit' name='getPatienten' value='Patiënten'>
        <input type='submit' name='log-out' value='Log-out'>
    </div>
</from>
</header>
EOF;
    }

    public function showLogin(){
        $this->login->showLogin();
    }

    public function showDashboard(){
        $this->showheader();
        $this->Dashboard->showDashboard();
    }

    public function showCreate($searchValue){
        $this->showheader();
        $this->Create->showCreate($searchValue);
    }

    public function showMedicijnen(){
        $this->showheader();
        $this->Medicijnen->showMedicijnen();
    }

    public function showPatienten($patienten){
        $this->showheader();
        $this->Patienten->showPatienten($patienten);
    }

    public function showPatientInfo($patientInfo){
        $this->showheader();
        $this->Patienten->showPatientInfo($patientInfo);
    }

    public function showReceptInfo()
    {

        echo "
         <form class='receptInfo' style='display: none;'>
        <h2>Patiënten gegevens</h2>
        <div class='container'>
            <div class='item'>
                <input class='form-control mr-sm-2' type='text' placeholder='Naam'>
                <input class='form-control mr-sm-2' type='text' placeholder='Geboorte datum'>
                <input class='form-control mr-sm-2' type='text' placeholder='Geslacht'>
            </div>
            <div class='item'>
                <input class='form-control mr-sm-2' type='text' placeholder='Patiënt nummer'>
                <input class='form-control mr-sm-2' type='text' placeholder='Adres'>
            </div>
        </div>
        <h2>Recept gegevens</h2>
        <div class='container'>
            <div class='item'>
                <input class='form-control mr-sm-2' type='text' placeholder='Id'>
                <input class='form-control mr-sm-2' type='text' placeholder='Naam'>
                <input class='form-control mr-sm-2' type='text' placeholder='Type recept'>
            </div>
            <div class='item'>
                <input class='form-control mr-sm-2' type='text' placeholder='Dosiring'>
                <input class='form-control mr-sm-2' type='text' placeholder='Verzekerings type'>
                <input class='form-control mr-sm-2' type='text' placeholder='Docker'>
            </div>
        </div>
      
    </form>";
    }
    /*
     *   <textarea name='Text1' cols='150' placeholder='Werking' rows='4'></textarea><br>
        <textarea name='Text1' cols='150' placeholder='Bijwerkingen' rows='4'></textarea><br>
        <textarea name='Text1' cols='150' placeholder='Notities' rows='4'></textarea>
     */
}