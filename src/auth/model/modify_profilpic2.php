<?php

session_start(); 
    require_once 'config.php'; 

if(!isset($_SESSION['user'])){
    header('Location:../index.php');
    die();
}


$req = $bdd->prepare('SELECT * FROM utilisateurs WHERE token = ?');
$req->execute(array($_SESSION['user']));
$data = $req->fetch();


 $nomfichier = hash('sha256',  $data['email'] );



 $nomdufichier= $_FILES['picture']['name'];

 $extension=strrchr($nomdufichier,'.');

 echo $extension;


 if($extension == '.jpg'){




    if (isset($_FILES['picture']['tmp_name']) and strlen($_FILES['picture']['tmp_name'])) {
         $retour = copy( $_FILES['picture']['tmp_name'] , '../profil_picture/' . $nomfichier . '.jpg');
        if($retour) {
            echo '<p>La photo a bien été envoyée.</p>';
            echo '<img src="' . $_FILES['picture']['name'] . '">';
            header('Location: ../views/landing.php?reg_err=success');die();
        }
    }else{
        header('Location: ../views/landing.php?reg_err=picture');die();
    }

}
 else{
    header('Location: ../views/landing.php?reg_err=file');die();

}


?>