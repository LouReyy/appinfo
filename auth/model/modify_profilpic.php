<?php

session_start(); 
    require_once 'config.php'; 

if(!isset($_SESSION['user'])){
    header('Location:index.php');
    die();
}


$req = $bdd->prepare('SELECT * FROM utilisateurs WHERE token = ?');
$req->execute(array($_SESSION['user']));
$data = $req->fetch();

echo $data['email'];

 $nomfichier = hash('sha256',  $data['email'] );

 echo $nomfichier;

 var_dump($_FILES);


    if (isset($_FILES['picture']['tmp_name'])) {
         $retour = copy( $_FILES['picture']['tmp_name'] , './profil_picture/' . $nomfichier . '.jpg');
        if($retour) {
            echo '<p>La photo a bien été envoyée.</p>';
            echo '<img src="' . $_FILES['picture']['name'] . '">';
            header('Location: landing.php');die();
        }
    }


?>