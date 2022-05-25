<?php


session_start(); 
    require_once 'config.php'; 
    if(!isset($_SESSION['user'])){
        header('Location: /auth/index.php?login_err=notconnected'); die();}

    

    $req = $bdd->prepare('SELECT * FROM utilisateurs WHERE token = ?');
    $req->execute(array($_SESSION['user']));
    $data = $req->fetch();


    $content = htmlspecialchars($_POST['content']);
    $topic = htmlspecialchars($_POST['topic']);
    $pseudo_user = $data['pseudo'];


   
    $insert = $bdd->prepare('INSERT INTO message(topic,content,pseudo_user) VALUES(:topic, :content  , :pseudo_user)');
    $insert->execute(array('topic' =>$topic , 'content' => $content, 'pseudo_user' => $pseudo_user ));

    header('Location: ../forum.php?reg_err=success'); die();



    






?>