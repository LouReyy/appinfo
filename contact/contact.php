<?php include("contact_essai.html")?>
<?php

if (count($_POST)!=0){
    $nom=$_POST["nom"];
    $prenom=$_POST["prénom"];
    $mail=$_POST["mail"];
    echo ("Votre nom est $nom, votre prénom est $prenom et votre mail est $mail");
    


}

?>