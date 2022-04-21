<?php

session_start(); 
require_once '../auth/model/config.php'; 

if(isset($_SESSION['user'])){

        $editprofil ="landing.php";
        $title = "Profil";

}
else{
    $title = "Connexion";
}
 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="faq.css" media="screen" type="text/css" />
    <title>FAQ</title>
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

    <div id = containergauche>
        <img id = "forme1"src="/appinfo/auth/forme1.png"></img>
        <h1>Foire Aux Questions</h1>


        <div id = "newquestion">

             <form action="envoi_question.php" method="post">

                <input type="topic" name="topic" class="topic_question" placeholder="Ecrivez votre Question" required="required" autocomplete="off"> </input>

                <textarea type="content" name="content" class="content_question" placeholder="Content" required="required" autocomplete="off"> </textarea>

                <button type = submit >Envoyer</button>

            </form>

        </div>

        <div class="msg-form">
                <?php 
                if(isset($_GET['reg_err']))
                {
                    $err = htmlspecialchars($_GET['reg_err']);

                    switch($err)
                    {
                        case 'success':
                        ?>
                            <div class="alert alert-success">
                                <strong>Succès</strong> Question postée !
                            </div>
                        <?php
                        break;

                        case 'notconnected':
                        ?>
                            <div class="alert alert-danger">
                                <strong>Erreur</strong> Vous devez être connecté en mode Admin pour poster une question
                            </div>
                            <?php 
                            break;

                    }
                }
                ?>
            </div>

    </div>

        <div id = "droite">


        <form method ="GET">
        <input id="searchbar"  type="text" name="search" placeholder="Recherche...">
        
        </form>


        <?php


if(isset($_GET['search']) AND !empty($_GET['search'])){

    $search = htmlspecialchars($_GET['search']);
    $topic = $search;

    $req2= $bdd->prepare('SELECT * FROM question WHERE topic = ?');
        $req2->execute(array($topic));
        $data2 = $req2->fetchAll();
    
}else{
    $req2= $bdd->prepare('SELECT * FROM question');
    $req2->execute();
    $data2 = $req2->fetchAll();
}



$i = 1;
foreach($data2 as $row){


?>

<div id = ""question" . $i++ ."test" >


             <div class = topic>

                <topic> <?php echo $row['topic']; ?> </topic>
                <img class = fleche src ="fleche.png">
             </div>

             <div class = content>
                <qst> <?php echo $row['content']; ?> </qst>
                <br>
                <date> <?php echo $row['date_question']; ?> </date>
               
             </div>
</div>
            <?php

        }
    
        ?>

        </div>
    </div>



</div>


    
</body>


<script src= faq.js></script>

</html>