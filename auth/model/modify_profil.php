<?php

session_start(); 
require_once("../model/config.php");

if(!isset($_SESSION['user'])){
    header('Location:index.php');
    die();
}



$pseudo = htmlspecialchars($_POST['pseudo']);
$email = htmlspecialchars($_POST['email']);
$password = htmlspecialchars($_POST['password']);
$password_retype = htmlspecialchars($_POST['password_retype']);
$type = htmlspecialchars($_POST['type']);


if($password === $password_retype){ 
                            
                            
    $cost = ['cost' => 12];
    $password = password_hash($password, PASSWORD_BCRYPT, $cost);

    $update = $bdd->prepare('UPDATE utilisateurs SET pseudo = ?,password = ?, type = ? WHERE email = ?');
    $update->execute(array($pseudo,$password,$type,$email));

    header('Location: /appinfo/auth/views/landing.php?reg_err=success');die();

}else{
    header('Location: /appinfo/auth/views/landing.php?reg_err=password'); die();}





?>