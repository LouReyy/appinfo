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

if(isset($_SESSION['type']) && ($_SESSION['type']) == "Administrateur"){
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
            <a class="cta" href= "/appinfo/auth/<?php  echo $editprofil?> "> <?php echo $title ?></a>

            <?php
           

           if(isset($_SESSION['type']) && ($_SESSION['type']) == "Administrateur"){
            
            ?>
            <a class="cta" href= "/appinfo/admin/admin.php">Admin</a>

            <?php }?>
        </header>

        <div id ="containercentre">
        <img id = "forme1"src="/appinfo/auth/forme1.png"></img>
        <h1>Notre solution Tech4Health</h1>
        </div>

		<div id="container">
			<div id="enfantimage">
				<img src="boitier.png">
			</div>
			<div id="enfanttexte">
				<div class="boxdetexte">
				<h2>Informations sur notre boitier Tech4Health :</h2>
				<p>Voici notre boitier éléctronique permettant la gestion et la visualisation de nos données environnementales.</p>
				<p>Celui-ci communique par Bluetooth à nos différents capteurs présents au sein du chantier étudié.</p>
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
				<p>Voici notre bracelet éléctronique permettant la prise de la frequence cardiaque.</p>
				<p>Celui-ci communique l'information a notre boitier. </p>
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
				<p>Voici notre boitier éléctronique contenant l'ensemble des capteurs suivants:</p>
				<p>Humidite, temperature et CO2 </p>
				</div>
			</div>

		</div>
