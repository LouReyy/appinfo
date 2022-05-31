<?php

session_start(); 
    require_once 'config.php'; 

if(!isset($_SESSION['user'])){
    header('Location:../index.php');
    die();
}


$req = $bdd->prepare('SELECT * FROM utilisateurs WHERE email = ?');
$req->execute(array($_GET['email']));
$data = $req->fetch();


 $nomfichier = hash('sha256',  $data['email'] );



 $nomdufichier= $_FILES['picture']['name'];

 $extension=strrchr($nomdufichier,'.');

 echo $extension;


 if($extension == '.jpg'){




    if (isset($_FILES['picture']['tmp_name']) and strlen($_FILES['picture']['tmp_name'])) {
         $retour = copy( $_FILES['picture']['tmp_name'] , '../profil_picture/' . $nomfichier . '.jpg');
         header('Location: /admin/admin.php');die();

        if($retour) {
            header('Location: /admin/admin.php');die();

            
         
        }
    }
}


?>