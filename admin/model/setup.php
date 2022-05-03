<?php


session_start(); 
require_once 'config.php'; 



if(isset($_SESSION['user'])){

    $editprofil ="landing.php";
    $title = "Profil";
}

else{
    $editprofil ="index.php";
    $title = "Connexion";
}

    $file_name = "/appinfo/auth/pp";
        
        

?>