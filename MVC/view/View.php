<?php

namespace MVC\view;

use MVC\view\Login;
use MVC\view\Dashboard;
use MVC\view\Create;
use MVC\view\Medicijnen;
use MVC\view\Patienten;
use MVC\view\ReceptenInfo;



class View
{
    private $login;
    private $Dashboard;
    private $Create;
    private $Medicijnen;
    private $Patienten;
    private $ReceptenInfo;



    public function __construct()
    {
        $this->login = new \MVC\view\Login();
        $this->Dashboard = new \MVC\view\Dashboard();
        $this->Create = new \MVC\view\Create();
        $this->Medicijnen = new \MVC\view\Medicijnen();
        $this->Patienten = new \MVC\view\Patienten();
        $this->ReceptenInfo = new \MVC\view\ReceptenInfo();
    }

    public function showheader()
    {
        echo <<<EOF
    <header>
     <form method='post' action='index.php'>
        <div class='topnav nav-tabs'>
            <input type='submit' name='dashboard' value='Dashboard'>
            <input type='submit' name='create' value='Create'>
            <input type='submit' name='getMedicijnen' value='Medicijnen'>
            <input type='submit' name='getPatienten' value='Patiënten'>
            <input type='submit' name='logout' value='Log-out'>
        </div>
      </from>
    </header>
EOF;
    }

    public function showLogin()
    {
        $this->login->showLogin();
    }    

    //dashboard
    public function showDashboard($recepten)
    {
        $this->showheader();
        $this->Dashboard->showDashboard($recepten);
    }

    //create
    public function showCreate($searchresult)
    {
        $this->showheader();
        $this->Create->showCreate($searchresult);
    }

    //medicijnen
    public function showMedicijnen($medicijnen)
    {
        $this->showheader();
        $this->Medicijnen->showMedicijnen($medicijnen);
    }

    public function showMedicijnInfo($medicijnInfo)
    {
        $this->showheader();
        $this->Medicijnen->showMedicijnInfo($medicijnInfo);
    }

    public function showMedicijnCreate()
    {
        $this->showheader();
        $this->Medicijnen->showMedicijnCreate();
    }

    //patient
    public function showPatienten($patienten)
    {
        $this->showheader();
        $this->Patienten->showPatienten($patienten);
    }

    public function showPatientInfo($patientInfo)
    {
        $this->showheader();
        $this->Patienten->showPatientInfo($patientInfo);
    }

    public function showPatientCreate()
    {
        $this->showheader();
        $this->Patienten->showPatientCreate();
    }
    public function showReceptInfo($info)
    {
        $this->showheader();
        $this->ReceptenInfo->ReceptenInfo($info);
     
    }
    /*
     *   <textarea name='Text1' cols='150' placeholder='Werking' rows='4'></textarea><br>
        <textarea name='Text1' cols='150' placeholder='Bijwerkingen' rows='4'></textarea><br>
        <textarea name='Text1' cols='150' placeholder='Notities' rows='4'></textarea>
     */
}
