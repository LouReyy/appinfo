


<?php

include("mail.php");



if (count($_POST)!=0){
   
    $nom=$_POST["nom"];
    $prenom=$_POST["prénom"];
    $mail=$_POST["mail"];
    $telephone=$_POST["téléphone"];
    $question=$_POST["question"];
    $objet="Question d'un Utilisateur";
    $message="Question de $nom $prenom <br>mail : $mail<br>téléphone : $telephone<br>$question";
    $reception="tech4healthg9c@gmail.com";
    $nom = "Tech4health" ;
    if (smtpmailer($reception,$reception,$nom, $objet, $message,)) {
        echo "l'email a bien été envoyé à $reception...";
        header('Location: ../contact_essai.php?reg_err=success'); die();
    } else {
        echo "Email sending failed...";
        header('Location: ../contact_essai.php?reg_err=error'); die();
    }
    if (!empty($error)) echo $error;

    
    


}



?>