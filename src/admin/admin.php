<?php include("./model/setup.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/admin.css" media="screen" type="text/css" />
    <title>Gestion des Utilisateurs</title>
    <link rel="icon" type="image/png" href="../homepage/img/InfiniteMeasures.png" />

</head>
<body>
    



<?php include("views/header.php");
include("views/menu_deroulant_tel.php");
 ?>

        <div id ="container">


            <div id = container-title>
                

                <img id = "forme1"src="img/forme1.png"></img>

                <h1 class="text-center">Gestion des Utilisateurs</h1>

            </div>

           
                    

        



            <div id = users>

                <div id = title>

                    <img class = img_user src = "img/user.png">

                    <titre>Liste des utilisateurs</titre>

                    <form method ="GET" class = "search">
                        <input id="searchbar"  type="text" name="search" placeholder="Recherche...">
        
                    </form>

                    
                    <a class = button1 href = "views/ajouter_user.php" >Ajouter un utilisateur</a>
                    

                </div>

                <div class="msg-form">
                    <?php 
                    if(isset($_GET['reg_err']))
                    {
                    $err = htmlspecialchars($_GET['reg_err']);

                    switch($err)
                    {
                        case 'supp':
                        ?>
                            <div class="alert alert-supp">
                                <strong>Succès</strong> L'utilisateur a bien été supprimé
                            </div>
                        <?php
                        break;

                        case 'ban':
                        ?>
                            <div class="alert alert-ban">
                                <strong>Erreur</strong>  L'utilisateur a bien été banni
                            </div>
                            <?php 
                            break;
                            case 'success':
                                ?>
                                    <div class="alert alert-success">
                                        <strong>Succès</strong> Profil modifié !
                                    </div>
                                <?php
                                break;
        
                                case 'password':
                                ?>
                                    <div class="alert alert-danger">
                                        <strong>Erreur</strong> mot de passe différent
                                    </div>
                                    <?php 
        

                    }
                    }
                    ?>
                </div>

                <div id = header>

                <photo>Photo</photo>
                <pseudo>Pseudo</pseudo>
                <emailu>Email</emailu>
                <type>Fonction</type>
                <action>Action</action>
                </div>


                <?php

                if(isset($_GET['search']) AND !empty($_GET['search'])){

                    $search = htmlspecialchars($_GET['search']);
                    $topic = $search;

                    $req2= $bdd->prepare('SELECT * FROM utilisateurs WHERE pseudo = ? OR email = ? OR type = ?');
                    $req2->execute(array($topic,$topic,$topic));
                    $data2 = $req2->fetchAll();
                }
                else{

                     $req2= $bdd->prepare('SELECT * FROM utilisateurs');
                    $req2->execute();
                    $data2 = $req2->fetchAll();

                }




                $i = 0;
                foreach($data2 as $row){
    

    
                if(file_exists( "../auth/profil_picture/" . hash('sha256',  $row['email']). ".jpg")){

                    $file_name = "../auth/profil_picture/" . hash('sha256',  $row['email'] );

                }

                 else{
                    $file_name = "../auth/img/pp";

                }


                ?>

                
                
                <div id = 'user'>


                    <div class = photo>
                        <img class = "pp" src="<?php echo $file_name; ?>.jpg"> </img>
                        <img class = "line" src="img/Line4.png"> </img>
                    </div>


                    <div class = content>
   
                        <nom name = "pseudo"><t><?php echo $row['pseudo'] ?> </t></nom>
                        <email><t> <?php echo $row['email'] ?> </t></email>
                        <fonction><t><?php echo $row['type']?> </t></fonction>

        
   
                    </div>
    


                    <div class = button>

                     <a  class="button2"  href="model/supprimer.php?id=<?php echo $row['id']?>">Supprimer</a> 
                     <a class="button2" href="model/bannir.php?id=<?php echo $row['id']?>" >Bannir</a> 
                     <a class="button3" href="views/modifier_user.php?id=<?php echo $row['id']?>" >Modifier</a> 

                    </div>


                </div>

                <?php

                if(isset($_GET['search']) AND !empty($_GET['search'])){

                    ?>

                <table>
                    <thead>
                        <tr>
                            <th colspan="2">Tableau de l'utilisateur : <?php echo $row['pseudo'] ?> </th>
                        </tr>
                    </thead>
                    <tbody> 
                        <tr>
                            <td>ID</td> 
                            <td><?php echo $row['id'] ?></td> 
                        </tr>
                        <tr>
                            <td>Pseudo </td> 
                            <td><?php echo $row['pseudo'] ?></td> 
                        </tr>
                        <tr>
                            <td>Email </td>
                            <td><?php echo $row['email']?></td>
                        </tr>
                        <tr>
                            <td>Password crypté </td>
                            <td><?php echo $row['password'] ?></td>
                        </tr>
                        <tr>
                            <td>Token </td>
                            <td><?php echo $row['token'] ?></td>

                        </tr>
                        <tr>
                            <td>date d'inscription  </td>
                            <td><?php echo $row['date_inscription'] ?></td>
                        </tr>
                        <tr>
                            <td>Fonction </td>
                            <td> <?php echo $row['type'] ?></td>
                        </tr>
                    </tbody>
                </table>





             




                <?php

                }

                }

                ?>

                

        
            </div>




        </div>

    </body>
    <script src = js/admin.js></script>

</html>
