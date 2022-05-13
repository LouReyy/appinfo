<?php


session_start(); 
    require_once 'config.php'; 
    if(!isset($_SESSION['user'])){
        header('Location: ../auth/index.php?login_err=notconnected'); die();}

    

    $req = $bdd->prepare('SELECT * FROM utilisateurs WHERE token = ?');
    $req->execute(array($_SESSION['user']));
    $data = $req->fetch();


    $content = htmlspecialchars($_POST['content']);
    $topic = htmlspecialchars($_POST['topic']);
    


    echo  $topic . $content  ;
   
    $insert = $bdd->prepare('INSERT INTO question(topic,content) VALUES(:topic, :content)');
    $insert->execute(array('topic' =>$topic , 'content' => $content ));

    header('Location: /appinfo/faq/faq.php?reg_err=success'); die();