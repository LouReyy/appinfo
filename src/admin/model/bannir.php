<?php

require_once 'config.php'; 
session_start(); 


$id = $_GET['id'];

$check = $bdd->prepare('SELECT pseudo, email, password FROM utilisateurs WHERE id = ?');
        $check->execute(array($id));
        $data = $check->fetch();


$pseudo = $data['pseudo'];
$email = $data['email'];
$password = $data['password'];


$insert = $bdd->prepare('INSERT INTO users_banned(pseudo, email, password,id) VALUES(:pseudo, :email, :password,id)');
        $insert->execute(array(
                'pseudo' => $pseudo,
                'email' => $email,
                'password' => $password,
                'id' => $id
                
            ));
      



$check2 = $bdd->prepare('DELETE FROM utilisateurs WHERE id = ? ');
        $check2->execute(array($id));
        $data2 = $check2->fetch();



header('Location: ../admin.php?reg_err=ban');die();

?>