<?php

session_start(); 

if(isset($_SESSION['user'])){
    $editprofil ="views/landing.php";
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
    <link rel="stylesheet" href="memo.css" media="screen" type="text/css" />
    <title>Memory</title>
</head>
<body>

<div id = "container1">
<header>
            <div id ="logoimg">
            <a  href="/appinfo/homepage/homepage.php"><img src="/appinfo/auth/img/logo_infinite.png" alt="logo"></a>
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

<main>
<h1> Memory <hr/></h1>

<div id="jeu">
    <table id="tabledejeu">
           <tr>
            <td><img src="face.png" class = img1>
            </td>
            

            <td><img src="face.png" class = img1>
            <td><img src="face.png" class = img1>
            <td><img src="face.png" class = img1>
            <td><img src="face.png" class = img1>
           </tr>
           <tr>
            <td><img src="face.png" class = img1>
            <td><img src="face.png" class = img1>
            <td><img src="face.png" class = img1>
            <td><img src="face.png" class = img1>
            <td><img src="face.png" class = img1>
           </tr>
           <tr>
            <td><img src="face.png" class = img1>
            <td><img src="face.png" class = img1>
            <td><img src="face.png" class = img1>
            <td><img src="face.png" class = img1>
            <td><img src="face.png" class = img1>
           </tr>
           <tr>
            <td><img src="face.png" class = img1>
            <td><img src="face.png" class = img1>
            <td><img src="face.png" class = img1>
            <td><img src="face.png" class = img1>
            <td><img src="face.png" class = img1>
           </tr>
    </table>
    
    
    <h3> Nombre de coups:</h3>
    <h3> Temps: </h3>
</div>

<h2> Regle du jeu <hr></h2>
<p>Vous devez retrouver toutes les paires du jeu!</p>
<p>Pour cela retourner 2 cartes et si elles sont identiques, vous avez former une paire. Sinon, les cartes se retournent et vous devez repiocher.</p>
<p>Mais attention, n'oubliez pas les positions des cartes que vous avez deja vu!</p>
</main>

<script src="/appinfo/memory/js/memory.js"></script>

</body>
</html>
