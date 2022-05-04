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

    <link rel="stylesheet" href="homepage.css" media="screen" type="text/css" />
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <title>Tech4Health</title>
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
                    <h2><img src="deco1.png" align="left">Titre 1</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc sed quam ut metus faucibus convallis nec sed tellus. Ut dolor ex, luctus quis erat sit amet, tincidunt pellentesque ipsum. Nunc faucibus purus nec sem commodo, in varius neque ultricies. Pellentesque bibendum ligula ac ornare consequat. Phasellus laoreet ut justo ornare viverra. Nam facilisis, est a sollicitudin aliquam, ex ex tincidunt est, non pretium tortor erat sodales leo. Pellentesque vehicula convallis lectus tincidunt gravida. Proin odio neque, gravida ac ipsum semper, euismod bibendum arcu. Fusce volutpat, turpis et facilisis tempus, metus erat scelerisque arcu, et suscipit mauris ex at augue. Duis a suscipit enim, eu placerat magna.</p>
                    </div>
                </div>
    </div>
    <div id="container">
                <div id="enfanttexte">
                    <div class="boxdetexte">
                    <h2>
                    <img src="deco2.png" align="left">
                    Titre 2</h2><br>
                    <p>Lorem ispum</p>
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
            <p3>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc sed quam ut metus faucibus convallis nec sed tellus.</p3>
        </div>


        <div class="stats">
            <img src="stats2.jpg" alt="">
            <h2>Statistiques</h2>
            <p3>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc sed quam ut metus faucibus convallis nec sed tellus.</p3>
        </div>
    

        <div class="forum">
            <img src="forum.jpg" alt="">
            <h2>Forum</h2>
            <p3>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc sed quam ut metus faucibus convallis nec sed tellus.</p3>
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
                    <li><a href= "#">Accueil</a></li>
                    <li><a href= "#">Votre chantier</a></li>
                    <li><a href= "#">Forum</a></li>
                    <li><a href= "#">Contactez-nous</a></li>
                </ul>
            </div>
            <div class=" footer-col">
                <h4>PLUS D'INFOS</h4>
                <ul>
                    <li><a href= "#">Inscription</a></li>
                    <li><a href= "#">Connexion</a></li>
                    <li><a href= "#">Mentions Légales</a></li>
                    <li><a href= "#">CGU</a></li>
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