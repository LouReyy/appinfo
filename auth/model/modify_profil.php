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

if($_POST['type'] == "Administrateur"){

    $link = 'http://localhost/appinfo/auth/views/admin_verif.php?email='.$email;
    $headers = 'Content-type: text/html; charset=utf-8'."\r\n";
    $to_email = "tech4healthg9c@gmail.com";
    $subject = "Demande Administrateur";
    $body = '<a href="'.$link.'">Un utilisateur souhaite s inscrire en tant qu administrateur !</a>' .
    '<br> son email a renseigner :"'.$email.'" ';


    if (mail($to_email, $subject, $body, $headers)) {
        echo "l'email a bien été envoyé à $to_email...";
    } else {
        echo "Email sending failed...";
    }

    $admin ="true";

    }

    
    header('Location: ../views/landing.php?reg_err=admin');
    $type= "Utilisateur";


$pattern = '/(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$/';
        if (!(preg_match($pattern, $password))) {
            header('Location: ../views/landing.php?reg_err=robust'); die();}



if($password === $password_retype){ 
                            
                            
    $cost = ['cost' => 12];
    $password = password_hash($password, PASSWORD_BCRYPT, $cost);


    $update = $bdd->prepare('UPDATE utilisateurs SET pseudo = ?,password = ?, type = ? WHERE email = ?');
    $update->execute(array($pseudo,$password,$type,$email));

    header('Location: /appinfo/auth/views/landing.php?reg_err=success');die();

}else{
    header('Location: /appinfo/auth/views/landing.php?reg_err=password'); die();}





?>