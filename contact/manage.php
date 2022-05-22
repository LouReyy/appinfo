<?php
if ($_SERVER['REQUEST_METHOD']=='POST'){//Si POST a été utilisé
    
    if (empty($_POST['nom'])){
        $err_nom="Veuillez saisir votre nom";
    }
    
    if (empty($_POST['prenom'])){
        $err_prenom="Veuillez saisir votre prénom";
    }
   
    if (empty($_POST['mail'])){
        $err_mail="Veuillez saisir votre mail";
    }
   
    if (empty($_POST['num'])){
        $err_num="Veuillez saisir votre téléphone";
    }
    
    if (empty($_POST['question'])){
        $err_msg="Veuillez saisir votre message";
    }
    
    include("PageContact.php");

    }
    




?>