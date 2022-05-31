<?php

session_start(); 

if(isset($_SESSION['user'])){
    $editprofil ="landing.php";
    $title = "Profil";
    }
    else{
        $editprofil ="../index.php";
        $title = "Connexion";

    }
    if(isset($_SESSION['type'])){
        $chantier = "Chantier/PageChantier.php";    }
    else{
        $chantier = "VotreChantier/votrechantier.php";
    }



        if(file_exists( "profil_picture/" . hash('sha256',  $_SESSION['email']). ".jpg")){
        
            $file_name = "profil_picture/" . hash('sha256',  $_SESSION['email'] );
            }
        
            else{
            $file_name = "img/pp";
            
    
        }


?>