<?php

session_start(); 
require_once 'config.php'; 

$email = htmlspecialchars($_POST['email']);

$type ="Administrateur";

$update = $bdd->prepare('UPDATE utilisateurs SET type = ? WHERE email = ?');
    $update->execute(array($type,$email));

    header('Location: ../views/admin_verif.php?reg_err=success');die();
