<?php


session_start(); 
    require_once 'config.php'; 
    if(!isset($_SESSION['user'])){
        header('Location:index.php');
        die();
    }

    

    $check = $bdd->prepare('SELECT pseudo, email, password FROM utilisateurs WHERE email = ?');

        $check->execute(array($_SESSION['user']));
        $data = $check->fetch();
        $row = $check->rowCount();

    $content = htmlspecialchars($_POST['content']);

    echo $content . $data ;
   
    $insert = $bdd->prepare('INSERT INTO message(content) VALUES(:content)');
    $insert->execute(array(
    'content' => $content,));






?>