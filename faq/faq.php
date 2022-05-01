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
    $div = "newquestion";

}


else{
   
    $div = "none";
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
            <a class="cta" href= "/appinfo/auth/<?php  echo $editprofil?> "> <?php echo $title ?></a>

            <?php
           

           if(isset($_SESSION['type']) && ($_SESSION['type']) == "Administrateur"){
            
            ?>
            <a class="cta" href= "/appinfo/admin/admin.php">Admin</a>

            <?php }?>
        </header>

    <div id = containercentre>
        <img id = "forme1"src="/appinfo/auth/forme1.png"></img>
        <h1>Foire Aux Questions (FAQ) </h1>
    </div>


        <div id = "<?php echo $div ?>">
        

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
                            case 'supp':
                                ?>
                                    <div class="alert alert-supp">
                                        <strong>Succès</strong> La question a bien été supprimée
                                    </div>
                                <?php

                    }
                }
                ?>
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



$i = 0;
foreach($data2 as $row){

$i++;


?>

<div id = 'question<?php echo $i ?>' class = question>

    <?php 

    if(isset($_SESSION['type']) && ($_SESSION['type']) == "Administrateur"){

        $button = "button2";

    }
    else{
        $button = "button2invisible";

    }
    ?>


             <div id = 'topic<?php echo $i ?>' class = topic>

                 <topic> <?php echo $row['topic']; ?> </topic>

                 <a  class="<?php echo $button ?>"  href="./supprimer-question.php?id=<?php echo $row['id_question']?>">Supprimer</a> 

                    <img id = 'fleche<?php echo $i ?>' src ="fleche.png" class = fleche>
             </div>

             <div id = 'content<?php echo $i ?>' class = content>
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