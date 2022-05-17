<?php

session_start(); 





if(isset($_SESSION['user'])){

        $editprofil ="landing.php";
        $title = "Profil";

}


else{
    $editprofil ="index.php";
    $title = "Connexion";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/appinfo/auth/css/edit_password.css" media="screen" type="text/css" />
    <title>Document</title>
</head>
<body>
    



<header>
            <div id ="logoimg">
            <a  href="/appinfo/homepage/homepage.php"><img src="/appinfo/auth/img/logo_infinite.png" alt="logo"></a>
        </div>  
            <nav>
                <ul class="nav__links">
                    <li><a href="/appinfo/homepage/homepage.php">Accueil</a></li>
                    <li><a href="/appinfo/Chantier/Chantier.php">Votre chantier</a></li>
                    <li><a href="/appinfo/forum/forum.php">Forum</a></li>
                    <li><a href="/appinfo/faq/faq.php">FAQ</a></li>
                    <li><a href="/appinfo/contact/contact_essai.html">Contactez-nous</a></li>
                </ul>
            </nav>
            <a class="cta" href= "/appinfo/auth/<?php  echo $editprofil?> "> <?php echo $title ?></a>

            <?php
           

           if(isset($_SESSION['type']) && ($_SESSION['type']) == "Administrateur"){
            
            ?>
            <a class="cta" href= "/appinfo/admin/admin.php">Admin</a>

            <?php }?>
        </header>

        <div id ="container">

            <div class="login-form">
            <h1>Mot de passe oublié</h1>
                <img id = "forme1"src="/appinfo/auth/img/forme1.png"></img>
               
            </div>

            <p> Pas de panique ! Renseignez votre email ci-dessous et nous vous enverons par email les informations pour vous creer un nouveau mot de passe.</p>

            <div class="form-group">
                <form action="/appinfo/auth/model/forgot.php" method="POST">
                    <input type="email" name="email" class="form-control" placeholder="Adresse Email" required="required" autocomplete="off">
                    <button type="submit" class="btn btn-primary btn-block">Reinitialiser mon mot de passe </button>
                 </form>
            </div>

            <div class="msg-form">
                <?php 
                if(isset($_GET['reg_err']))
                {
                    $err = htmlspecialchars($_GET['reg_err']);

                    switch($err)
                    {
                        case 'success':
                        ?>
                            <div class="alert alert-success">
                                <strong>Succès</strong> Un mail de Reinitialisation vous a été envoyé !
                              
                            </div>
                        <?php
                        break;
                        case 'user':
                            ?>
                                <div class="alert alert-success">
                                    <strong>Erreur</strong> L'utilisateur n'existe pas !
                                  
                                </div>
                            <?php
                            break;
                    }
                }
                        ?>
                   
                
             </div>

        </div>

    </div>
</body>
</html>