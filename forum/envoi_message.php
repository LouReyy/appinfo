<?php

echo "test" ; 

session_start(); 
    require_once 'config.php'; 

    $content = htmlspecialchars($_POST['content']);
   


    $check = $bdd->prepare('SELECT id_message, topic, content,pseudo_user, date_mesage, type FROM message WHERE content = ?');
        $check->execute(array($content));
        $data = $check->fetch();
        $row = $check->rowCount();


        $insert = $bdd->prepare('INSERT INTO message(id_message, topic, content,pseudo_user, date_mesage) VALUES(:topic, :content, )');
                            $insert->execute(array(
                                'content' => $content,
                                'topic' => $topic,
                                'pseudo_user' => $pseudo_user,
                            ));



?>