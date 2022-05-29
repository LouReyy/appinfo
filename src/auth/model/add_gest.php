<?php

session_start(); 
require_once 'config.php'; 

$email = htmlspecialchars($_POST['email']);

$req = $bdd->prepare('SELECT * from utilisateurs WHERE email = ?');
$req->execute(array($email));
$data = $req->fetch();

var_dump($data);

if(isset($data['email'])){


$type ="Gestionnaire";

$update = $bdd->prepare('UPDATE utilisateurs SET type = ? WHERE email = ?');
    $update->execute(array($type,$email));

 

    header('Location: /auth/views/gest_verif.php?reg_err=success');die();
    }
    else{
        header('Location: /auth/views/gest_verif.php?reg_err=user');die();

    }
