<?php

session_start(); 
require_once("../model/config.php");

if(!isset($_SESSION['user'])){
    header('Location:../index.php');
    die();
}



$pseudo = htmlspecialchars($_POST['pseudo']);
$email = htmlspecialchars($_POST['email']);
$password = htmlspecialchars($_POST['password']);
$password_retype = htmlspecialchars($_POST['password_retype']);
$type = htmlspecialchars($_POST['type']);
$id_chantier = htmlspecialchars($_POST['id_chantier']);

if($_POST['type'] == "Administrateur"){

    include("../model/mail.php");


    $link = 'https://appinfofinal.herogu.garageisep.com/auth/views/admin_verif.php?email='.$email;
    $to_email = "tech4healthg9c@gmail.com";
    $from_email = "tech4healthg9c@gmail.com";
    $subject = "Demande Administrateur";
    $body = '<a href="'.$link.'">Un utilisateur souhaite s inscrire en tant qu administrateur !</a>' .
    '<br> son email a renseigner :"'.$email.'" ';
    $name = $pseudo;



   

    $admin ="true";

    }

$type = htmlspecialchars($_POST['type']);


$pattern = '/(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$/';
        if (!(preg_match($pattern, $password))) {
            header('Location: ../views/landing.php?reg_err=robust'); die();}



if($password === $password_retype){ 
                            
                            
    $cost = ['cost' => 12];
    $password = password_hash($password, PASSWORD_BCRYPT, $cost);


    $update = $bdd->prepare('UPDATE utilisateurs SET pseudo = ?,password = ?, type = ?,id_chantier = ? WHERE email = ?');
    $update->execute(array($pseudo,$password,$type,$email,$id_chantier));

    if($admin == "true"){
        if (smtpmailer($to_email,$from_email,$name, $subject, $body, )) {
            echo "l'email a bien été envoyé à $to_email...";
            header('Location: ../views/inscription.php?reg_err=admin');

        } else {
            echo "Email sending failed...";
            if (!empty($error)) echo $error;
            die();
        
        }
    }else{
             header('Location:../views/inscription.php?reg_err=success');
    }
    die();


}


?>