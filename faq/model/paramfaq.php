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
    $div = "newquestion";
    $chantier = "Chantier/PageChantier.php";

}


else{
   
    $div = "none";
    $chantier = "VotreChantier/votrechantier.php";

}


 
?>