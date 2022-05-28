<?php

session_start(); 
    require_once 'config.php'; 

if(!isset($_SESSION['user'])){
    header('Location:../index.php');
    die();
}


 $nomfichier = hash('sha256',  $_SESSION['id_chantier'] );
 $nomdufichier= $_FILES['picture']['name'];

 $extension=strrchr($nomdufichier,'.');

 echo $extension;


 echo($_FILES['picture']['tmp_name']);


 if($extension == '.jpg'){


    if (isset($_FILES['picture']['tmp_name']) and strlen($_FILES['picture']['tmp_name'])) {
         $retour = copy( $_FILES['picture']['tmp_name'] , '../img_chantier/test1.jpg');
        if($retour) {
            echo '<p>La photo a bien été envoyée.</p>';
            echo '<img src="' . $_FILES['picture']['name'] . '">';
            header('Location: PageGestionnaire.php');die();
        }
    }else{
        header('Location: PageGestionnaire.php?reg_err=picture');die();
    }

}
 else{
    header('Location: PageGestionnaire.php?reg_err=file');die();

}


?>