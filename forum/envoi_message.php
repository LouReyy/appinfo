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


    $content = htmlspecialchars($_POST['content']);
    $topic = htmlspecialchars($_POST['topic']);
    $pseudo_user = $data['pseudo'];


    echo  $topic . $content  ;
   
    $insert = $bdd->prepare('INSERT INTO message(topic,content,pseudo_user) VALUES(:topic, :content  , :pseudo_user)');
    $insert->execute(array('topic' =>$topic , 'content' => $content, 'pseudo_user' => $pseudo_user ));

    






?>