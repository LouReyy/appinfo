<?php


session_start(); 
require_once 'config.php'; 

if(!isset($_SESSION['type']) && ($_SESSION['type']) != "Administrateur"){

header('Location: https://appinfofinal.herogu.garageisep.com/homepage/homepage.php'); die();}



if(isset($_SESSION['user'])){

    $editprofil ="/auth/views/landing.php";
    $title = "Profil";
}



else{
    $editprofil ="/auth/index.php";
    $title = "Connexion";
    
}

    $file_name = "/auth/img/pp";

    if(isset($_SESSION['type'])){
        $chantier = "Chantier/PageChantier.php";    }
    else{
        $chantier = "VotreChantier/votrechantier.php";
    }
    if(isset($_SESSION['type'])){
        if(($_SESSION['type'] == "Administrateur")){
    
            $chantier = "VotreChantier/votrechantier.php";
        }
    }

    
        
        

?>