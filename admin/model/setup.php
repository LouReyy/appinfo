<?php


session_start(); 
require_once 'config.php'; 



if(isset($_SESSION['user'])){

    $editprofil ="views/landing.php";
    $title = "Profil";
}

else{
    $editprofil ="index.php";
    $title = "Connexion";
}

    $file_name = "/appinfo/auth/pp";

    if(isset($_SESSION['type'])){
        $chantier = "Chantier/PageChantier.php";    }
    else{
        $chantier = "VotreChantier/votrechantier.php";
    }
        
        

?>