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

    echo ($_SESSION['user']);
    echo $data['pseudo']

   
?>