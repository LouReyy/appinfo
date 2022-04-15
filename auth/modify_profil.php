<?php

session_start(); 
    require_once 'config.php'; 

if(!isset($_SESSION['user'])){
    header('Location:index.php');
    die();
}

$pseudo = htmlspecialchars($_POST['pseudo']);
$email = htmlspecialchars($_POST['email']);
$password = htmlspecialchars($_POST['password']);
$password_retype = htmlspecialchars($_POST['password_retype']);


if($password === $password_retype){ 
                            
                            
    $cost = ['cost' => 12];
    $password = password_hash($password, PASSWORD_BCRYPT, $cost);

    $update = $bdd->prepare('UPDATE utilisateurs SET pseudo = ?,password = ? WHERE email = ?');
    $update->execute(array($pseudo,$password,$email));

    header('Location:landing.php?reg_err=success');die();

}else{
    header('Location: landing.php?reg_err=password'); die();}





?>