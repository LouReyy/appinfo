<?php

session_start(); 
require_once '../auth/model/config.php'; 




if(isset($_SESSION['user'])){

    $editprofil ="/auth/views/landing.php";
    $title = "Profil";

}


else{
    $editprofil ="/auth/index.php";
    $title = "Connexion";
}

if($_SESSION['type'] == "Administrateur"){
    $div = "newquestion";
    $chantier = "Chantier/PageChantier.php";

}


else{
   
    $div = "none";
    $chantier = "VotreChantier/votrechantier.php";

}

if(isset($_SESSION['email'])){

    if(file_exists( "../auth/profil_picture/" . hash('sha256',  $_SESSION['email']). ".jpg")){
    
        $file_name = "../auth/profil_picture/" . hash('sha256',  $_SESSION['email'] );
        }
    }
        else{
        $file_name = "../auth/img/pp";
        

    }




 
?>