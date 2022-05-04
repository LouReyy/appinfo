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
    <title>Document</title>
    <link rel="stylesheet" href="Chantier.css" media="screen" type="text/css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/chart.min.js" integrity="sha512-QSkVNOCYLtj73J4hbmVoOV6KVZuMluZlioC+trLpewV8qMjsWqlIQvkn1KGX2StWvPMdWGBqim1xlC8krl1EKQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.anychart.com/releases/8.10.0/js/anychart-base.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"/>
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
                    <li><a href="/appinfo/contact/contact.php">Contactez-nous</a></li>
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

        <div class="noms_onglets">
            <div class="onglets active" data-anim="1">
                <div class="Actif">
                <h1>Fréquence cardiaque</h1>
                </div>
            </div> 
            <!--La syntaxe "data-" permet de rajouter un attribut qui sera utilisé ensuite avec javascript-->
            <div class="onglets" data-anim="2">
                <div class="ongletInactif">
                    <h1>Niveau de bruit</h1>
                </div>   
            </div> <!--idem-->
            <div class="onglets" data-anim="3">
                <div class="ongletInactif">
                    <h1>Température</h1>
                </div> 
            </div> <!--idem-->
        </div>

        <div class="contenu activeContenu" data-anim="1">
            <!--Classe représentant le contenu de l'onglet 1 (il a donc le même attribut que son titre)-->
            <h3>Votre Fréquence Cardiaque</h3>
            <hr>
            <p>Graphique de la fréquence cardiaque</p>
            
            <div id="graph1">
                    <script src="Chantier_Courbe.js"></script>
            </div>
        </div>
        <div class="contenu" data-anim="2">
            <!--Classe représentant le contenu de l'onglet 2 (il a donc le même attribut que son titre)-->
            <h3>Votre exposition aux bruits</h3>
            <hr>
            <p>Niveau de bruit en dB</p>
            <div id="graph2">
                <script src="data2.js"></script>
            </div>  
        </div> 

        <div class="contenu" data-anim="3">
            <!--Classe représentant le contenu de l'onglet 3 (il a donc le même attribut que son titre)-->
            <h3>La température de votre environnement</h3>
            <hr>
            <p>On affiche la température et son évolution</p>
            <div id="graph3">
                <script src="data3.js"></script>
            </div>   
    </div>
    <script src="Chantier.js"></script>
</body>

<footer class="footer">
    <div class="container">
        <div class="row">
            <div class=" footer-col">
                <img src="../auth/logo_infinite.png" class="logo">
                </div>
            <div class=" footer-col">
                <h4>NAVIGATION</h4>
                <ul>
                    <li><a href= "/appinfo/homepage/homepage.php">Accueil</a></li>
                    <li><a href= "/appinfo/Chantier/Chantier.php">Votre chantier</a></li>
                    <li><a href= "/appinfo/forum/forum.php">Forum</a></li>
                    <li><a href= "/appinfo/contact/contact_essai.html">Contactez-nous</a></li>
                </ul>
            </div>
            <div class=" footer-col">
                <h4>PLUS D'INFOS</h4>
                <ul>
                    <li><a href= "/appinfo/auth/views/inscription.php">Inscription</a></li>
                    <li><a href= "/appinfo/auth/model/connexion.php">Connexion</a></li>
                    <li><a href= "/appinfo/cgu/cgu.php">Mentions Légales</a></li>
                    <li><a href= "/appinfo/faq/faq.php">FAQ</a></li>
                </ul>
            </div>
            <div class=" footer-col">
                <h4>SUIVEZ-NOUS</h4>
                <div class="social-links">
                    <a href= "#"><i class="fab fa-facebook-f"></i></a>
                    <a href= "#"><i class="fab fa-twitter"></i></a>
                    <a href= "#"><i class="fab fa-instagram"></i></a>
                    <a href= "#"><i class="fab fa-linkedin-in"></i></a>
                </div>
                
            </div>
        </div>
    </div>
    
</footer>
</html>