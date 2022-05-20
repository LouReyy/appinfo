<?php 
session_start();

   if(empty($_POST['nom'])) {
      $_SESSION['nom'] = "Merci de remplir votre nom SVP"; 
    }
    else{
        $_SESSION['nom'] = "";
        setcookie('nom', $_POST['nom'], time() + (1000), "/");
    }
   if(empty($_POST['prenom'])) {
    $_SESSION['prenom'] = "Merci de remplir votre prenom SVP";
 
}
else{
    $_SESSION['prenom'] = "";
    setcookie('prenom', $_POST['prenom'], time() + (1000), "/");
}
 if(empty($_POST['dateNaissance'])) {
    $_SESSION['dateNaissance'] = "Merci de remplir votre date de naissance SVP";
  
}
else{
    $_SESSION['dateNaissance'] = "";
    setcookie('dateNaissance', $_POST['dateNaissance'], time() + (1000), "/");
}

   if(empty($_POST['email']) OR !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
    $_SESSION['email'] = "Merci de remplir votre email SVP";
      
    }
    else{
        $_SESSION['email']  = "";
        setcookie('email', $_POST['email'], time() + (1000), "/");
    }
   if(empty($_POST['emailConfirmation']) OR !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
    $_SESSION['emailConfirmation'] = "Merci de confirmer votre email SVP";
 }
 else{
    $_SESSION['emailConfirmation'] = "";
    setcookie('emailConfirmation', $_POST['emailConfirmation'], time() + (1000), "/");
}
 if(empty($_POST['nom'])||empty($_POST['prenom'])||empty($_POST['dateNaissance'])||empty($_POST['email'])||empty($_POST['emailConfirmation'])){
    header("Location:index.php");  
 }

    else{
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

 

?>