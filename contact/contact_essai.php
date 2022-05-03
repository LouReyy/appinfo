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

    if(isset($_SESSION['type']) && ($_SESSION['type']) == "Administrateur"){
        $chantier = "Chantier/PageChantier.php";    }
    else{
        $chantier = "VotreChantier/votrechantier.php";
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="contact_essai.css" media="screen" type="text/css" />
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <header>
        <div id ="logoimg">
        <a  href="/appinfo/homepage/homepage.php"><img src="../auth/logo_infinite.png" alt="logo"></a>
        </div>  
        <nav>
            <ul class="nav__links">
                <li><a href="/appinfo/homepage/homepage.php">Accueil</a></li>
                <li><a href="/appinfo/<?php echo $chantier ?>" >Votre chantier</a></li>
                <li><a href="/appinfo/forum/forum.php">Forum</a></li>
                <li><a href="/appinfo/faq/faq.php">FAQ</a></li>
                <li><a href="/appinfo/contact/contact_essai.php">Contactez-nous</a></li>
                <li><a href="/appinfo/notre_solution/notre_solution.php">Notre solution</a></li>

            </ul>
        </nav>
        <a class="cta" href= "/appinfo/auth/<?php  echo $editprofil?> "> <?php echo $title ?></a>

        <?php
       

       if(isset($_SESSION['type']) && ($_SESSION['type']) == "Administrateur"){
        
        ?>
        <a class="cta" href= "/appinfo/admin/admin.php">Admin</a>

        <?php }?>
    </header>
    <div class="container">
        <div class="boite">
            <h2>Notre équipe</h2>
            <div class="ligne"></div>
        </div>
        <div class="boite">
            <form action="contact.php" method="post">
                <h1>Contactez-nous</h1>
                <div class="trait"></div>
                <div class="formulaire">
                    <div class="gauche">
                        <div class="case">
                            <label>Nom</label>
                            <input type="text" name="nom" >
                            <i class="fa-solid fa-user"></i>
                        </div>
        
                        <div class="case">
                            <label>Prénom</label>
                            <input type="text" name="prénom">
                            <i class="fa-solid fa-user"></i>
                        </div>
        
                        <div class="case">
                            <label>Mail</label>
                            <input type="text" name="mail">
                            <i class="fa-solid fa-envelope"></i>
                        </div>
        
                        <div class="case">
                            <label>Téléphone</label>
                            <input type="tel" name="téléphone">
                            <i class="fa-solid fa-mobile"></i>
                        </div>
                        <!--<div class="choix">
                            <label>Quel est votre poste ?</label><br>
                            <input type="radio"><label>Utilisateur</label><br>
                            <input type="radio"><label>Gestionaire</label><br>
                            <input type="radio"><label>Administrateur</label><br>
                            <input type="radio"><label>Visiteur</label>
        
        
                        </div>-->
                    </div>
        
                    <div class="droite"> <!--Zone de texte pour la question-->
                        <div class="case">
                            <label >Message</label>
                            <textarea type= "zoneText" name="question" id="" cols="30" rows="10"></textarea>
                            <i class="fa-solid fa-circle-question"></i>
                        
                        </div>
                    </div>
                </div>
                <div class="envoyer">
                    <input type="submit"> <!--Le boutton ne fait pas parti du div<formulaire> -->
                </div>
            </form>
        </div>
    </div>
    


    
</body>
</html>