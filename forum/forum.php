<?php

session_start(); 
require_once 'config.php'; 

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

        <img class = "line" src ="line4.png">

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
                                <strong>Succès</strong> Message envoyé !
                            </div>
                        <?php
                        break;

                        case 'notconnected':
                        ?>
                            <div class="alert alert-danger">
                                <strong>Erreur</strong> Vous devez être connecté pour poster un message
                            </div>
                            <?php 
                            break;

                    }
                }
                ?>
            </div>


                
    </div>

    <div id = divdroite>

    <div id = "lestopics">
        <ul class="navbar">
         <li>
             <a class = "onglets active" href="./forum.php" data-anim="1">Les Topics</a>

         <ul>
        
         <?php

             $req2= $bdd->prepare('SELECT topic FROM message');
             $req2->execute();
             $data2 = $req2->fetchAll();

             
        foreach($data2 as $row){?>
        <li><a href="./test.php?param=<?php echo $row['topic']?>" ><?php echo $row['topic']  ?></a></li>

        



        <?php } ?>

        </ul>

        </li>


         <li>
            <a class = "onglets" href="#" data-anim="2">Mes messages</a>
        

        </li>

        <li>
            <a class = "onglets" href="#" data-anim="3">Recents</a>
        

        </li>

        </ul>

        <form method ="GET">
        <input id="searchbar"  type="text" name="search" placeholder="Recherche...">
        
        </form>



    </div>


    <div id = droite>

        <div class="contenu activeContenu" data-anim="1">

        <?php






        $editprofil ="index.php";
        $title = "Connexion";



        if(isset($_GET['search']) AND !empty($_GET['search'])){

            $search = htmlspecialchars($_GET['search']);
            $topic = $search;
            
        }elseif (isset($_GET['param'])){
            $topic = htmlspecialchars($_GET['param']);
        }
        else{
            $topic = "Bienvenue";
        }

        
       


        $req2= $bdd->prepare('SELECT * FROM message WHERE topic = ?');
        $req2->execute(array($topic));
        $data2 = $req2->fetchAll();

        
        foreach($data2 as $row){

        $pseudo = $row['pseudo_user'];
  
        $req= $bdd->prepare('SELECT * FROM utilisateurs WHERE pseudo = ?');
        $req->execute(array($pseudo));
        $data = $req->fetchAll();

        foreach($data as $row2){

            $file_name = "../auth/profil_picture/". hash('sha256',  $row2['email'] );
            }

          //  if(file_exists($file)){

           //     $file_name = "../auth/profil_picture/" . hash('sha256',  $row2['email'] );
        
         //   }
        
         //   else{
         //       $file_name = "../auth/pp";
        
         //   }



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


        <div class="contenu" data-anim="2">

        <?php

        if(isset($_SESSION['user'])){

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

        foreach($data2 as $row){

        $pseudo = $row['pseudo_user'];
  
        $req= $bdd->prepare('SELECT * FROM utilisateurs WHERE pseudo = ?');
        $req->execute(array($pseudo));
        $data = $req->fetchAll();

        foreach($data as $row2){
            $file_name = "/appinfo/auth/profil_picture/" . hash('sha256',  $row2['email'] );
    
            }

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
    }

        else{

             echo "Connectez vous pour voir vos messages"

             ?>

             <a class="cta" href= "../auth/">Connexion</a>

        <?php

        }
    
        ?>

        </div>

        <div class="contenu" data-anim="3">

        <?php

        $topic = "Bienvenue";

        $req2= $bdd->prepare('SELECT * FROM message ORDER BY date_message DESC ');
        $req2->execute();
        $data2 = $req2->fetchAll();


        foreach($data2 as $row){

            $pseudo = $row['pseudo_user'];
      
            $req= $bdd->prepare('SELECT * FROM utilisateurs WHERE pseudo = ?');
            $req->execute(array($pseudo));
            $data = $req->fetchAll();
    
            foreach($data as $row2){
                $file_name = "/appinfo/auth/profil_picture/" . hash('sha256',  $row2['email'] );
        
                }
    
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

</div>

   
</body>

<script src= forum.js></script>

</html>