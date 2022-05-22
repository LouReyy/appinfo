


<?php include("PageContact.php")?>
<?php
require_once __DIR__.'/config.php';



if (count($_POST)!=0){
    $headers = 'Content-type: text/html; charset=utf-8'."\r\n";
    $nom=$_POST["nom"];
    $prenom=$_POST["prénom"];
    $mail=$_POST["mail"];
    $telephone=$_POST["téléphone"];
    $question=$_POST["question"];
    $objet="Question";
    $message="Question de $nom $prenom <br>mail : $mail<br>téléphone : $telephone<br>$question";
    $reception="tech4healthg9c@gmail.com";
    if (mail($reception, $objet, $message, $headers)) {
        echo "l'email a bien été envoyé à $reception...";
    } else {
        echo "Email sending failed...";
    }
    


}



?>