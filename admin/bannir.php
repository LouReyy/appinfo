<?php

require_once("../auth/model/config.php");
session_start(); 


$id = $_GET['id'];

$check = $bdd->prepare('SELECT pseudo, email, password FROM utilisateurs WHERE id = ?');
        $check->execute(array($id));
        $data = $check->fetch();


$pseudo = $data['pseudo'];
$email = $data['email'];
$password = $data['password'];


$insert = $bdd->prepare('INSERT INTO users_banned(pseudo, email, password) VALUES(:pseudo, :email, :password)');
        $insert->execute(array(
                'pseudo' => $pseudo,
                'email' => $email,
                'password' => $password,
                
            ));
      



$check2 = $bdd->prepare('DELETE FROM utilisateurs WHERE id = ? ');
        $check2->execute(array($id));
        $data2 = $check2->fetch();



header('Location: /appinfo/admin/admin.php?reg_err=ban');die();

?>