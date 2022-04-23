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
            <a  href="/appinfo/homepage/homepage.php"><img src="/appinfo/auth/logo_infinite.png" alt="logo"></a>
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
    </header>

        <div id = "title">
             <titre1>Modifier votre profil</titre1>
             <img class = "forme1"src="forme1.png"></img>
            </div>

        <div id="container">

        <div class="login-form">
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

                    }
                }
                ?>
            </div>

        
            <div class="text-center">

                <form class = "form-profil" method="POST" action = "./model/modify_profil.php" >

                    <h1 class="p-5">Bonjour <?php echo $data['pseudo']; ?> !</h1>

                  
                    <h1>Pseudo : <input type="pseudo" name="pseudo" class="form-control" value= "<?php echo $data['pseudo']; ?>" required="required"></h1>

                    <h1>Votre email : <input type="email" name="email" class="form-control" value= "<?php echo $data['email']; ?>" required="required"></h1>

                    <h1>Nouveau mot de passe : <input type="password" name="password" class="form-control" value= "" required="required"></h1>

                    <h1>Confirmation mot de passe : <input type="password" name="password_retype" class="form-control" value= "" required="required"></h1>

                    <button type = "submit" class="btn btn-danger btn-lg">Modifier</button> 

                </form>

                <a class="button" href="./model/deconnexion.php" >Déconnexion</a> 


            </div>

            <div id = pp>


            <img class = "avatar"src="./<?php echo $file_name; ?>.jpg"></img>

            <form class = "form-img" method="POST" action = "./model/modify_profilpic.php" enctype="multipart/form-data" >

            <label class="file">
                <input type="file" name = "picture" id="avatar" value ="salut"  accept="image/jpg">
                <span class="file-custom"></span>
            </label>    

            <button type="submit" class="btn btn-primary btn-block">Modifier la photo</button>

            </form>


            </div>
            
        </div> 
         

  </div>
  </body>

  
</html>
