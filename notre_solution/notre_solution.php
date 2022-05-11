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

if(isset($_SESSION['type'])){
    $chantier = "Chantier/PageChantier.php";}
else{
    $chantier = "VotreChantier/votrechantier.php";
}
 
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="notre_solution.css" media="screen" type="text/css" />
    <title>Notre solution</title>
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
            <div id="logomemo">
                <a href="/appinfo/memory/memory.php"><img src="../memory/memoryim.png" alt="memory"></a>
            </div>

            <a class="cta" href= "/appinfo/auth/<?php  echo $editprofil?> "> <?php echo $title ?></a>

            <?php
           

           if(isset($_SESSION['type']) && ($_SESSION['type']) == "Administrateur"){
            
            ?>
            <a class="cta" href= "/appinfo/admin/admin.php">Admin</a>

            <?php }?>
        </header>

        <div id ="containercentre">
            <h1>Notre solution Tech4Health</h1>
            <hr>
        </div>

		<div id="container">
			<div id="enfantimage">
				<img src="boitier.png">
			</div>
			<div id="enfanttexte">
				<div class="boxdetexte">
				<h2>Informations sur notre boitier Tech4Health :</h2>
				<p>Voici notre boitier éléctronique permettant la gestion et la visualisation de nos données environnementales. Celui-ci communique par Bluetooth à nos différents capteurs présents au sein du chantier étudié.</p>
				</div>
			</div>
        </div>
        <div id="container">
			<div id="enfantimage">
				<img src="bracelet.png">
			</div>
			<div id="enfanttexte">
				<div class="boxdetexte">
				<h2>
				Informations sur notre bracelet Tech4Health :</h2><br>
				<p>Voici notre bracelet éléctronique permettant la prise de la frequence cardiaque. Celui-ci communique l'information a notre boitier. </p>
				</div>
			</div>

		</div>
        <div id="container">
			<div id="enfantimage">
				<img src="capteurs.webp">
			</div>
			<div id="enfanttexte">
				<div class="boxdetexte">
				<h2>
				Informations sur notre boitier de capteurs Tech4Health :</h2><br>
				<p>Voici notre boitier éléctronique contenant l'ensemble des capteurs suivants  : Humidite, temperature et CO2 </p>
				</div>
			</div>

		</div>

        <div id="containerpartie2">

            <div class="chantier">
                <img src="/appinfo/homepage/grues.jpg" alt="">
                <h2>Votre chantier</h2>
                <p>Accéder à cette section pour découvrir les informations sur votre chantier : Localisation, les dates & la nature du chantier.</p>
                <a class = btn_forum href = "/appinfo/Chantier/PageChantier.php">Accès au chantier</a>

             </div>


            <div class="stats">
                <img src="/appinfo/homepage/stats2.jpg" alt="">
                <h2>Statistiques</h2>
                <p>Accéder à cette page afin de constater les statistiqes de votre chantier, l'environnement de travail des ouvriers est notre priorité.</p>
                <a class = btn_forum href = "/appinfo/Chantier/PageChantier.php">Accès aux statistiques</a>

            </div>
    

            <div class="forum" >
                <img src="/appinfo/homepage/forum.jpg" alt="">

                <h2>Forum</h2>
                <p>Sur cette page, vous trouverez un ensemble de questions-réponses pour différents sujets.</p>
                <a class = btn_forum href = "/appinfo/forum/forum.php">Accès au forum</a>

            </div>
        </div>
</body>

<footer class="footer">
    <div class="container">
        <div class="row">
            <div class=" footer-col">
                <img src="/appinfo/homepage/infinite.png" class="logo">
                </div>
            <div class=" footer-col">
                <h4>NAVIGATION</h4>
                <ul>
                    <li><a href= "/appinfo/homepage/homepage.php">Accueil</a></li>
                    <li><a href= "/appinfo/<?php echo $chantier ?>">Votre chantier</a></li>
                    <li><a href= "/appinfo/forum/forum.php">Forum</a></li>
                    <li><a href= "/appinfo/faq/faq.php">FAQ</a></li>
                    <li><a href= "/appinfo/contact/contact_essai.php">Contactez-nous</a></li>
                    <li><a href= "/appinfo/notre_solution/notre_solution.php">Notre solution</a></li>
                </ul>
            </div>
            <div class=" footer-col">
                <h4>PLUS D'INFOS</h4>
                <ul>
                    <li><a href= "/appinfo/auth/views/inscription.php">Inscription</a></li>
                    <li><a href= "/appinfo/auth/model/connexion.php">Connexion</a></li>
                    <li><a href= "/appinfo/cgu/cgu.php">Mentions Légales</a></li>
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
