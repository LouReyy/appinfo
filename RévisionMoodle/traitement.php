<?php
session_start();

if ($_SERVER['REQUEST_METHOD']=='POST'){

    if(empty($_POST['nom'])){
        $erreur_nom = "Veuillez entrer votre nom SVP ";
    }
    else{
        $_SESSION['nom'] = "";
        setcookie('nom', $_POST['nom'], time() + (1000), "/");
    }


    if(empty($_POST['prenom'])){
        $erreur_prenom="Veuillez entrer votre prénom SVP ";
    }
    else{
        $_SESSION['prenom'] = "";
        setcookie('prenom', $_POST['prenom'], time() + (1000), "/");
    }


    if(empty($_POST['dateNaissance'])){
        $erreur_date="Veuillez entrer votre date de naissance SVP ";
    }
    else{
        $_SESSION['dateNaissance'] = "";
        setcookie('date', $_POST['dateNaissance'], time() + (1000), "/");
    }


    if(empty($_POST['email'])){
        $erreur_mail="Veuillez entrer votre email SVP ";
    }
    else{
        $_SESSION['email'] = "";
        setcookie('email', $_POST['email'], time() + (1000), "/");
    }


    if(empty($_POST['emailConfirmation'])){
        $erreur_mail2="Veuillez confirmer votre mail SVP ";
    }
    else{
        $_SESSION['emailConfirmation'] = "";
        setcookie('emailConfirmation', $_POST['emailConfirmation'], time() + (1000), "/");
    }
    include ("index.php");
    if ((isset($_POST['nom']))&&(isset($_POST['prenom']))&&(isset($_POST['dateNaissance']))&&(isset($_POST['email']))&&(isset($_POST['emailConfirmation']))){
        echo "Vous avez bien rempli le formulaire";
        
        setcookie("nom","", time()-3600,"/");
        unset($_COOKIE['nom']);
        setcookie("prenom","", time()-3600,"/");
        unset($_COOKIE['prenom']);
        setcookie("dateNaissance","", time()-3600,"/");
        unset($_COOKIE['dateNaissance'] );
        setcookie("email","", time()-3600,"/");
        unset($_COOKIE['email'] );
        setcookie("emailConfirmation","", time()-3600,"/");
        unset($_COOKIE['emailConfirmation']);
        session_destroy();

       }


}



?>