<?php 
    session_start();
    require_once './model/config.php'; 


    if(!isset($_SESSION['user'])){
        header('Location:index.php');
        die();

        $editprofil ="index.php";
        $title = "Connexion";
    }
    else{
        $editprofil ="landing.php";
        $title = "Profil";
    }
    if(isset($_SESSION['type'])){
        $chantier = "Chantier/PageChantier.php";    }
    else{
        $chantier = "VotreChantier/votrechantier.php";
    }
    
    $req = $bdd->prepare('SELECT * FROM utilisateurs WHERE token = ?');
    $req->execute(array($_SESSION['user']));
    $data = $req->fetch();

    
   
    if(file_exists( "./profil_picture/" . hash('sha256',  $data['email']). ".jpg")){

        $file_name = "./profil_picture/" . hash('sha256',  $data['email'] );

    }

    else{
        $file_name = "./pp";

    }


    
?>
<!doctype html>
<html lang="en">
  <head>
    <title>Espace membre</title>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="edit.css" media="screen" type="text/css" />


    
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
                    <li><a href="/appinfo/<?php echo $chantier ?>" >Votre chantier</a></li>
                    <li><a href="/appinfo/forum/forum.php">Forum</a></li>
                    <li><a href="/appinfo/faq/faq.php">FAQ</a></li>
                    <li><a href="/appinfo/contact/contact_essai.php">Contactez-nous</a></li>
                    <li><a href="/appinfo/notre_solution/notre_solution.php">Notre solution</a></li>
                    <li><a href="/appinfo/cgu/cgu.php">CGU</a></li>

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

    <div id = "title">
             <titre1>Modifier votre profil</titre1>
             <img class = "forme1"src="forme1.png"></img>
    </div>


        

        
    <div id = gauche>

        <form action="../auth/model/modify_profil.php" method="post">      
            <div class="form-group">
            <t>Pseudo : </t><input type="text" name="pseudo" class="form-control" placeholder="Pseudo" value= "<?php echo $data['pseudo']; ?>"  required="required" autocomplete="off">
            </div>
            <div class="form-group">
                <t>Email : </t><input type="email" name="email" class="form-control" placeholder="Email" value= "<?php echo $data['email']; ?>"  required="required" autocomplete="off">
            </div>
            <div class="form-group">
            <t>Mot de passe : </t><input type="password" name="password" class="form-control" placeholder="Nouveau Mot de passe" required="required" autocomplete="off">
            </div>
            <div class="form-group">
            <input type="password" name="password_retype" class="form-control" placeholder="Re-tapez le mot de passe" required="required" autocomplete="off">
            </div>

            <div class="form-group">

                <label for="pet-select">Choix du role:</label>

                <select name="type" id="type-select">
                    <option value=""><?php echo $data['type']; ?> </option>
                    <option value="Utilisateur">Utilisateur</option>
                    <option value="Gestionnaire">Gestionnaire</option>
                    <option value="Administrateur">Administrateur</option>
                </select>
            </div>





            <div class="button1">
                <button type="submit" class="btn_gauche">Modifier</button>

                <a class="button" href="./model/deconnexion.php" >Déconnexion</a> 

            </div>   

            
    

        </form>

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
                         break;

                         case 'picture':
                         ?>
                             <div class="alert alert-danger">
                                 <strong>Erreur</strong> Vous n'avez pas importer de fichier
                             </div>
                             <?php 
                             break;

                             case 'file':
                             ?>
                                 <div class="alert alert-danger">
                                     <strong>Erreur</strong> Vous pouvez charger que des fichier .jpg
                                 </div>
                                 <?php 

                    }
                }
                ?>
            </div> 

    </div>


    <img class = line src = ../admin/img/line4.png>




        <div id = pp>

            <img class = "avatar"src="./<?php echo $file_name; ?>.jpg"></img>

            <form class = "form-img" method="POST" action = "./model/modify_profilpic.php" enctype="multipart/form-data" >

                <label class="file">
                    <input type="file" name = "picture" id="avatar"   accept="image/jpg">
                    <span class="file-custom"></span>
                </label>    

                <button type="submit" class="btn btn-primary btn-block">Modifier la photo</button>

            </form>


        </div>
            
    </div> 
         

  </div>
  </body>

  
</html>
