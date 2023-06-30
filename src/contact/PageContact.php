
<?php
session_start(); //essai de modif

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
    if(isset($_SESSION['type'])){
        if(($_SESSION['type'] == "Administrateur")){
    
            $chantier = "VotreChantier/votrechantier.php";
        }
    }
?>






<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="PageContact.css" media="screen" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

</head>
<body>
    <div class="container">
    <header>
            <div id ="logoimg">
            <a  href="/homepage/homepage.php"><img src="/auth/img/logo_infinite.png" alt="logo"></a>
            </div>  
            <nav>
                <ul class="nav__links">
                    <li><a href="/homepage/homepage.php">Accueil</a></li>
                    <li><a href="/<?php echo $chantier ?>" >Votre chantier</a></li>
                    <li><a href="/forum/forum.php">Forum</a></li>
                    <li><a href="/faq/faq.php">FAQ</a></li>
                    <li><a href="/contact/contact_essai.php">Contactez-nous</a></li>
                    <li><a href="/notre_solution/notre_solution.php">Notre solution</a></li>

                </ul>
            </nav>
            <div id="logomemo">
                <a href="/memory/memory.php"><img src="/memory/memoryim.png" alt="memory"></a>
            </div>
            <a class="cta" href= "/auth/<?php echo $editprofil?> "> <?php echo $title ?></a>

            <?php
           

           if(isset($_SESSION['type']) && ($_SESSION['type']) == "Administrateur"){
            
            ?>
            <a class="cta" href= "/admin/admin.php">Admin</a>

            <?php }?>
        </header>
        <div class="equipe">
            <a>Notre équipe</a>
            <div class="barre"></div>
        </div>
        <form>
            <div class="content">
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
                    <button type="submit">Envoyer <!--Le boutton ne fait pas parti du div<formulaire> -->
                </div>

            </div>
            
        </form>
    </div>
    <?php include("views/footer.php") ?>
    
</body>
</html>