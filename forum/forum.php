<?php

session_start(); 
require_once 'config.php'; 

if(isset($_SESSION['user'])){
        $editprofil ="landing.php";
        $title = "Profil";
    }
    else{
        $editprofil ="index.php";
        $title = "Connexion";

    }

    $req = $bdd->prepare('SELECT * FROM utilisateurs WHERE token = ?');
    $req->execute(array($_SESSION['user']));
    $data = $req->fetch();

    $pseudo_user = $data['pseudo'];

    $req2= $bdd->prepare('SELECT * FROM message WHERE pseudo_user = ?');
    $req2->execute(array($pseudo_user));
    $data2 = $req2->fetchAll();
    $file = "../auth/profil_picture/" . hash('sha256',  $data['email']). ".jpg" ; 


    if(file_exists($file)){

        $file_name = "/appinfo/auth/profil_picture/" . hash('sha256',  $data['email'] );
    }
    else{
        $file_name = "/appinfo/auth/pp";

    }
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


    <div id = divgauche>

        

        <img id = "forme1"src="/appinfo/auth/forme1.png"></img>
        <h1>Nouveau Topic</h1>


        <div id = "newmessages">

            <form action="envoi_message.php" method="post">

            <input type="topic" name="topic" class="topic_msg" placeholder="Topic" required="required" autocomplete="off"> </input>

                <textarea type="content" name="content" class="content_msg" placeholder="Content" required="required" autocomplete="off"> </textarea>

                <button type = submit >Envoyer</button>

            </form>

        </div>


                
    </div>

    <div id = divdroite>

    <div id = "lestopics">
        <ul class="navbar">
         <li>
             <a href="#">Les Topics</a>


       
         

         <ul>
        
         <?php
        foreach($data2 as $row){?>
        <li><a href="#"> <?php echo $row['topic']  ?></a></li>

        <?php } ?>

        </ul>

        </li>


         <li>
            <a href="#">Mes messages</a>
        

        </li>

        <li>
            <a href="#">Recents</a>
        

        </li>

        </ul>

        

        <input id="searchbar"  type="text" name="search" placeholder="Recherche">

    </div>

    <div id = droite>


        

        <?php
            foreach($data2 as $row){

        ?>
                <div id = messages>

                    <div class = photo>
                        <img class = "pp" src="<?php echo $file_name; ?>.jpg"> </img>
                     </div>

                 <div class = content>

                    <topic> <?php echo $row['topic']; ?> </topic>
                    <br>
                    <msg> <?php echo $row['content']; ?> </msg>

                 </div>
        
                <div class = info>
        
                    <date> <?php  echo $row['date_message']; ?> </date>
                    <br>
                    <pseudo> <?php  echo $row['pseudo_user']; ?> </pseudo>

                </div>
        
    
                 </div>
        <?php

            }
        ?>


</div>

</div>

</div>

   
</body>
</html>