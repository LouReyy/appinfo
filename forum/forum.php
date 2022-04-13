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

    echo "/appinfo/auth/$editprofil";
    echo $_SESSION['user'];
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="forum.css" media="screen" type="text/css" />
    <title>Forum</title>
</head>
<body>
<div id = "container1">
    <header>
        <div id ="logoimg">
            <a  href="/appinfo/homepage/homepage.php"><img src="/appinfo/auth/logo_infinite.png" alt="logo"></a>
        </div>
        <nav>
        <ul class="nav__links">
            <li><a href="/appinfo/homepage/homepage.php">Accueil</a></li>
            <li><a href="/appinfo/Chantier/Chantier.html">Votre chantier</a></li>
            <li><a href="/appinfo/forum/forum.php">Forum</a></li>
            <li><a href="/appinfo/contact/contact_essai.html">Contactez-nous</a></li>
        </ul>
    </nav>
     <a class="cta" href= "/appinfo/auth/<?php  echo $editprofil?> "> <?php echo $title ?></a>
    </header>


    <div id = test>

        <form action="envoi_message.php" method="post">

            <input type="content" name="content" class="content_msg" placeholder="Content" required="required" autocomplete="off">

            <button type = submit >Envoyer</button>

        </form>


                
    </div>

</div>

   
</body>
</html>