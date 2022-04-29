<?php


session_start(); 
require_once '../auth/model/config.php'; 



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
    <link rel="stylesheet" href="/appinfo/admin/ajouter_user.css" media="screen" type="text/css" />
    <title>Document</title>
</head>
<body>

<header>
            <div id ="logoimg">
            <a  href="/appinfo/homepage/homepage.php"><img src="../auth/logo_infinite.png" alt="logo"></a>
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


        <div id = container-title>
                

            <img id = "forme1"src="/appinfo/auth/forme1.png"></img>

            <h1 class="text-center">Ajouter un Utilisateur</h1>

        </div>



        <div id = gauche>

            

                <form action="../auth/model/inscription_traitement.php" method="post">      
                    <div class="form-group">
                        <input type="text" name="pseudo" class="form-control" placeholder="Pseudo" required="required" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <input type="email" name="email" class="form-control" placeholder="Email" required="required" autocomplete="off">
                    </div>
                    <div class="form-group">
                      <input type="password" name="password" class="form-control" placeholder="Mot de passe" required="required" autocomplete="off">
                    </div>
                    <div class="form-group">
                       <input type="password" name="password_retype" class="form-control" placeholder="Re-tapez le mot de passe" required="required" autocomplete="off">
                    </div>

                    <label for="pet-select">Choix du role:</label>

                    <select name="type" id="type-select">
                        <option value="">Choisissez une option</option>
                        <option value="Utilisateur">Utilisateur</option>
                        <option value="Gestionnaire">Gestionnaire</option>
                        <option value="Administrateur">Administrateur</option>
    
                    </select>




                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block">Ajouter un utilisateur</button>
                        
                        
                    </div>   
                    

                </form>

               

            </div> 
           

           



        </div>


    
</body>
</html>