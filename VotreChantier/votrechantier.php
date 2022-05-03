<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="votrechantier.css">
    <link rel="stylesheet" href="/appinfo/auth/index.css" media="screen" type="text/css" />
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
        
    <h1 >Exemple de chantier</h1>
    <div class = "DivGrid">
        <div><img class="image1" src ="chantier.jpeg"  ></div>
        <div class = "deux">
            <div class = "Grid1">
                <img class="image2" src ="ecologie 1.png" >
                <h1 class = "Deux_2">Chantier de la ville de Paris</h1>
            </div>
            <p class = "center"><b>Dates</b> : du 29 novembre à mai 2022
                Nature des travaux : adaptation des pistes cyclables.
                <br> <br> <b>Impacts</b> : la piste provisoire actuelle ou la piste cyclable principale, 
                seront ponctuellement et alternativement fermées par tronçon pour permettre 
                l’adaptation des marquages.
                </p>
        </div>
    </div>
    <h1 >Caractéristiques du chantier</h1>
    <div class = "Grid_chantier">
        <div class = "Gauche">
            <h1 class = "Deux_2">Localisation</h1>
                <img class = "Image_3" src="image 13.png">
        </div>
        <div class = "Center_barre"><div class = "Barre"></div>
        </div>
        <div class = "Droite">
            <h1 class = "Deux_2">Qualité environementale</h1>
                <p class = "texte">Niveau de bruit ambiant moyen 
                    Pollution sonore <br><br>Conditions de travail des ouvriers : </p>
                    <ul>
                        <li class = "liste">Bruit</li>
                        <li class = "liste">Temperature</li>
                        <li class = "liste">Frequence Cardiaque.</li>
                      </ul>
        </div>
    </div>
    <div class = "Grid_last">

        <div class = "Premier_element">
            <img class = "Image_bottom" src="Rectangle 278.png">
            <div class = "container">
                <h2>Votre Chantier</h2>
                <p>Lorem Ipsum is simply dummy text 
                    of the printing and typesetting industry. 
                    Lorem Ipsum has been the industry's standard </p>
            </div>
            
        </div>

        <div class = "Premier_element">
            <img class = "Image_bottom" src="Rectangle 279.png">
            <div class = "container">
                <h2>Votre Chantier</h2>
                <p>Lorem Ipsum is simply dummy text 
                    of the printing and typesetting industry. 
                    Lorem Ipsum has been the industry's standard </p>
            </div>
            
        </div>

        <div class = "Premier_element">
            <img class = "Image_bottom" src="Rectangle 280.png">
            <div class = "container">
                <h2>Votre Chantier</h2>
                <p>Lorem Ipsum is simply dummy text 
                    of the printing and typesetting industry. 
                    Lorem Ipsum has been the industry's standard </p>
            </div>
            
        </div>

        



    </div>
 

</body>
</html>