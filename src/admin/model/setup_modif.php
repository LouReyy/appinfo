<?php


session_start(); 
require_once 'config.php'; 



if(isset($_SESSION['user'])){

    $editprofil ="views/landing.php";
    $title = "Profil";
}

else{
    $editprofil ="index.php";
    $title = "Connexion";
}
if(isset($_SESSION['type'])){
    $chantier = "Chantier/PageChantier.php";    }
else{
    $chantier = "VotreChantier/votrechantier.php";
}
?>

<?php

$id = $_GET['id'];


$check = $bdd->prepare('SELECT * FROM utilisateurs WHERE id = ? ');
        $check->execute(array($id));
        $data = $check->fetch();

$pseudo = htmlspecialchars($data['pseudo']);
$email = htmlspecialchars($data['email']);
$password = htmlspecialchars($data['password']);
$password_retype = htmlspecialchars($data['password']);
$type = htmlspecialchars($data['type']);




if(file_exists(dirname(__FILE__,3) . "\auth/profil_picture/".hash('sha256',  $data['email']) . ".jpg")){

    $file_name = "/appinfo/auth/profil_picture/" . hash('sha256',  $data['email'] );

}

else{
    $file_name = "/appinfo/auth/img/pp";

}



?>