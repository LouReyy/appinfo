<?php

session_start(); 
require_once '../auth/model/config.php'; 

if(isset($_SESSION['user'])){

    $editprofil ="views/landing.php";
    $title = "Profil";

}
else{
    $editprofil ="index.php";
    $title = "Connexion";
}

if(isset($_SESSION['type'])){
    $chantier = "Chantier/PageChantier.php";}
else{
    $chantier = "VotreChantier/votrechantier.php";
}
 
?>