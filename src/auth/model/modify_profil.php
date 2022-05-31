<?php

session_start(); 
require_once("config.php");

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

if($type == "Administrateur"){

    include("mail.php");


    $link = 'https://appinfofinal.herogu.garageisep.com/auth/views/admin_verif.php?email='.$email;
    $to_email = "tech4healthg9c@gmail.com";
    $from_email = "tech4healthg9c@gmail.com";
    $subject = "Demande Administrateur";
    $body = '<a href="'.$link.'">Un utilisateur souhaite s inscrire en tant qu administrateur !</a>' .
    '<br> son email a renseigner :"'.$email.'" ';
    $name = $pseudo;
    $admin ="true";

}
else{

$admin ="false";
}
if($type == "Gestionnaire"){

    include("mail.php");


    $link = 'https://appinfofinal.herogu.garageisep.com/auth/views/gest_verif.php?email='.$email;
    $to_email = "tech4healthg9c@gmail.com";
    $from_email = "tech4healthg9c@gmail.com";
    $subject = "Demande de Gestionnaire";
    $body = '<a href="'.$link.'">Un utilisateur souhaite s inscrire en tant que gestionnaire !</a>' .
    '<br> son email a renseigner :"'.$email.'" ';
    $name = $pseudo;
   

    $gest ="true";

}
else{
    $gest ="false";
}

echo($type);
echo($id_chantier);



$pattern = '/(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$/';
        if (!(preg_match($pattern, $password))) {
            header('Location: ../views/landing.php?reg_err=robust'); die();}



if($password === $password_retype){ 
                            
                            
    $cost = ['cost' => 12];
    $password = password_hash($password, PASSWORD_BCRYPT, $cost);

    if(isset($id_chantier) && $type == "Gestionnaire"){

        $req= $bdd->prepare('SELECT * FROM chantier WHERE id_chantier = ?');
        $req->execute(array($id_chantier));
        $data = $req->fetch();
    

        var_dump($data);
  

        if(isset($data['nom'])){
            header('Location:../views/landing.php?reg_err=chantieryes');
            die();

        }

        $update = $bdd->prepare('UPDATE utilisateurs SET pseudo = ?,password = ?, type = ?,id_chantier = ? WHERE email = ?');
        $update->execute(array($pseudo,$password,$type,$id_chantier,$email));

}
if(isset($id_chantier) && $type == "Utilisateur"){

    $req= $bdd->prepare('SELECT * FROM chantier WHERE id_chantier = ?');
    $req->execute(array($id_chantier));
    $data = $req->fetch();
 

    var_dump($data);
    echo("sqalut");


    if(!isset($data['nom'])){
        header('Location:../views/landing.php?reg_err=chantierno');
        die();

    }

    $update = $bdd->prepare('UPDATE utilisateurs SET pseudo = ?,password = ?, type = ?,id_chantier = ? WHERE email = ?');
        $update->execute(array($pseudo,$password,$type,$id_chantier,$email));


}
if($type == "Administrateur"){
    $update = $bdd->prepare('UPDATE utilisateurs SET pseudo = ?,password = ?, type = ? WHERE email = ?');
    $update->execute(array($pseudo,$password,$type,$email));


}


    if($admin == "true"){
        if (smtpmailer($to_email,$from_email,$name, $subject, $body, )) {
            echo "l'email a bien été envoyé à $to_email...";
            header('Location: ../views/landing.php?reg_err=admin');
            die();

        } else {
            echo "Email sending failed...";
            if (!empty($error)) echo $error;
            die();
        
        }
    
    }
    if($gest == "true"){
        if (smtpmailer($to_email,$from_email,$name, $subject, $body, )) {
            echo "l'email a bien été envoyé à $to_email...";
            header('Location: ../views/landing.php?reg_err=gest');
            die();

        } else {
            echo "Email sending failed...";
            die();
        
        }
    }
    
    //header('Location: ../views/landing.php?reg_err=success');

    
    die();


}


?>