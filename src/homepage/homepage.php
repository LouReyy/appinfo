<?php

include("model/setup_homepage.php");


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="css/homepage.css" media="screen" type="text/css" />
    <title>Tech4Health</title>
</head>
<body>
<header>
            <div id ="logoimg">
            <a  href="/homepage/homepage.php"><img src="/auth/img/logo_infinite.png" alt="logo"></a>
            </div>  
            <nav>
                <ul class="nav__links">
                    <li><a href="/homepage/homepage.php">Accueil</a></li>
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

        <main>
		
            <h1> Bienvenue 
            <hr/>
            </h1>
            <br>
            <div id="container">
                <div id="enfantimage">
                    <img src="eolienne1.png">
                </div>
                <div id="enfanttexte">
                    <div class="boxdetexte">
                    <h2><img src="deco1.png" align="left">L'environnement</h2>
                    <p>Soucieux de l'environnement et du développement humain nous avons pensé une solution afin d'agir pour la cause des ouvriers. Les journées de travail sont donc souvent très longues ; souvent plus de 12 heures quotidiennes, quelquefois 15 heures. Ce rythme effréné couplé à de mauvaises conditions de travail peut être fatal pour un homme en développement  </p>
                    </div>
                </div>
    </div>
    <div id="container">
                <div id="enfanttexte">
                    <div class="boxdetexte">
                    <h2>
                    <img src="deco2.png" align="left">
                    Les ouvriers ? </h2><br>
                    <p>Bienvenue sur notre site Internet, que vous soyez architecte, maitre d'ouvre ou encore ouvrier alors ce site est fait pour vous ! En effet, notre projet est d'analyser l'impact sur la santé d'un chantier et de ses dérives. Le constat est sans appel, les conditions de travail sont en désaccord avec les droits humains à l'image des dérives au Qatar avec la création des stades. Inscrivez -vous sur notre site Internet afin d'avoir un aperçu des statistiques de votre chantier.</p>
                    </div>
                </div>
                <div id="enfantimage">
                    <img src="chantier1.png">
                </div>
            </div>

    <h1>
        Nos services
        <hr />
    </h1>
<br>
    <div id="containerpartie2">

        <div class="chantier">
            <img src="grues.jpg" alt="">
            <h2>Votre chantier</h2>
            <p>Accéder à cette section pour découvrir les informations sur votre chantier : Localisation, les dates & la nature du chantier.</p>
            <a class = btn_forum href = "/appinfo/Chantier/PageChantier.php">Accès au chantier</a>

        </div>


        <div class="stats">
            <img src="stats2.jpg" alt="">
            <h2>Statistiques</h2>
            <p>Accéder à cette page afin de constater les statistiqes de votre chantier, l'environnement de travail des ouvriers est notre priorité.</p>
            <a class = btn_forum href = "/appinfo/Chantier/PageChantier.php">Accès aux statistiques</a>

        </div>
    

        <div class="forum" >
            <img src="forum.jpg" alt="">

            <h2>Forum</h2>
            <p>Sur cette page, vous trouverez un ensemble de questions-réponses pour différents sujets.</p>
            <a class = btn_forum href = "/appinfo/forum/forum.php">Accès au forum</a>

        </div>
    </div>
    </main> 
</body>

<footer class="footer">
    <div class="container">
        <div class="row">
            <div class=" footer-col">
                <img src="infinite.png" class="logo">
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


</html>