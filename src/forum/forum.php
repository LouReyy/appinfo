<?php

include("model/setup_forum.php");



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/forum.css">
    <title>Forum</title>
    <link rel="icon" type="image/png" href="../homepage/img/InfiniteMeasures.png" />

</head>
<body>

<?php

include("views/header.php");
include("views/menu_deroulant_tel.php");


?>







        <div id = divgauche>
            <h1>Nouveau Topic</h1>
            <hr>

            <?php 
            if (isset($_GET['topic'])){
                $value = $_GET['topic'];
                $focus = "autofocus";
            }
            else{
                $value = "";
                $focus ="";

            } 
            ?>




            <div id = "newmessages">

                <form action="./model/envoi_message.php" method="post">

                    <input type="topic" name="topic" class="topic_msg" placeholder="Topic" required="required" autocomplete="off" value= "<?php echo $value ?>">  </input>

                    <textarea <?php echo $focus ?> type="content" name="content" class="content_msg" placeholder="Content" required="required" autocomplete="off"> </textarea>

                    <button type = submit >Envoyer</button>

                </form>

            </div>

            <img class = "line" src ="img/Line4.png">

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
                            case 'supp':
                                ?>
                                    <div class="alert alert-supp">
                                        <strong>Succès</strong> Le message a bien été supprimé
                                    </div>
                                <?php

                    }
                }
                ?>
            </div>


                
        </div>

        <div id = divdroite>

            <div id = container-title>
                
                <h2 class="text-center">Forum</h2>
                <hr class = hr>

            </div>

            <div id = "lestopics">
                <ul class="navbar">
                    <li>
                    <a class = "onglets active"  data-anim="1">Les Topics</a>

                <ul>
        
                <?php

                $req2= $bdd->prepare('SELECT DISTINCT topic FROM message');
                $req2->execute();
                $data2 = $req2->fetchAll();

             
                foreach($data2 as $row){?>
                <li><a href="./forum.php?param=<?php echo $row['topic']?>" ><?php echo $row['topic']  ?></a></li>

        
            


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
                <input id="searchbar"  type="text" name="search" placeholder="Rechercher un forum">
        
            </form>



        </div>


    

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

            $pseudo =  $row['pseudo_user'];

  
            $req= $bdd->prepare('SELECT * FROM utilisateurs where pseudo = ?');
            $req->execute(array($pseudo));
            $data = $req->fetchAll();

        
    
                foreach($data as $row2){
                    if(file_exists( "../auth/profil_picture/" . hash('sha256',  $row2['email']). ".jpg")){
    
                        $file_name = "../auth/profil_picture/" . hash('sha256',  $row2['email'] );
                        }
                        else{
                        $file_name = "../auth/pp";
                        }
        
                

                if(isset($_SESSION['type']) && ($_SESSION['type']) == "Administrateur"){
                $button = "button2";
                }
                 else{
                $button = "button2invisible";
                }
                ?>


                <div id = messages>

                    <div class = photo>
                     <img class = "pp" src="<?php echo $file_name; ?>.jpg"> </img>
                    </div>

                    

                    <div class = content>

                        <topic> <?php echo $row['topic']; ?> </topic>
                        <msg> <?php echo $row['content']; ?> </msg>

                        <a  class="repondre" href="./forum.php?topic=<?php echo $row['topic']?>">Repondre</a> 


                    </div>
            
                    <div class = info>

                        <pseudo> <?php  echo $row['pseudo_user']; ?> </pseudo>
                        <br>
                        <date> <?php  echo $row['date_message']; ?> </date>

                        <t >  <a  class="<?php echo $button ?>" href="./model/supprimer_msg.php?id=<?php echo $row['id_message']?>" >Supprimer</a> </t> 

                    </div>
    
                </div>
                <?php

            
            
            }
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

    
            

        foreach($data2 as $row){

            $pseudo = $row['pseudo_user'];
  
            $req= $bdd->prepare('SELECT * FROM utilisateurs WHERE pseudo = ?');
            $req->execute(array($pseudo));
            $data = $req->fetchAll();

            foreach($data as $row2){
                if(file_exists( "../auth/profil_picture/" . hash('sha256',  $row2['email']). ".jpg")){

                    $file_name = "../auth/profil_picture/" . hash('sha256',  $row2['email'] );
                    }
                    else{
                    $file_name = "../auth/pp";
                    }
    
            }

            if(isset($_SESSION['type']) && ($_SESSION['type']) == "Administrateur"){

            $button = "button2";

            }
            else{
            $button = "button2invisible";
            }

            ?>
            <div id = messages>

                <div class = photo>
                    <img class = "pp" src="<?php echo $file_name; ?>.jpg"> </img>
                </div>

                <div class = content>

                    <topic> <?php echo $row['topic']; ?> </topic>
                    <msg> <?php echo $row['content']; ?> </msg>

                    <a  class="repondre" href="./forum.php?topic=<?php echo $row['topic']?>">Repondre</a> 


                </div>

                <div class = info>

                    <pseudo> <?php  echo $row['pseudo_user']; ?> </pseudo>
                    <br>

                    <date> <?php  echo $row['date_message']; ?> </date>

                    <t >  <a  class="<?php echo $button ?>" href="./model/supprimer_msg.php?id=<?php echo $row['id_message']?>" >Supprimer</a> </t> 

                </div>

            </div>
            <?php

        }
        }

        else{

            ?>

            <t> <?php echo "Connectez vous pour voir vos messages" ?></t>

             <a class="cta2" href= "../auth/">Connexion</a>

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
                    if(file_exists( "../auth/profil_picture/" . hash('sha256',  $row2['email']). ".jpg")){

                        $file_name = "../auth/profil_picture/" . hash('sha256',  $row2['email'] );
                        }
                        else{
                        $file_name = "../auth/pp";
                        }
        
                }

                if(isset($_SESSION['type']) && ($_SESSION['type']) == "Administrateur"){

                    $button = "button2";
    
                }
                else{
                    $button = "button2invisible";
    
                }
                
    
                ?>
                <div id = messages>

                    <div class = photo>
                        <img class = "pp" src="<?php echo $file_name; ?>.jpg"> </img>
                    </div>

                    <div class = content>

                        <topic> <?php echo $row['topic']; ?> </topic>
                        <msg> <?php echo $row['content']; ?> </msg>

                        <a  class="repondre" href="./forum.php?topic=<?php echo $row['topic']?>">Repondre</a> 


                    </div>

                    <div class = info>

                        <pseudo> <?php  echo $row['pseudo_user']; ?> </pseudo>
                        <br>
                        <date> <?php  echo $row['date_message']; ?> </date>

                        <t >  <a  class="<?php echo $button ?>" href="./model/supprimer_msg.php?id=<?php echo $row['id_message']?>" >Supprimer</a> </t> 

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



<script src= js/forum.js></script>

</html>

<?php

?>