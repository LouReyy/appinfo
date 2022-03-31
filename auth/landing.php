<?php 
    session_start();
    require_once 'config.php'; 
    if(!isset($_SESSION['user'])){
        header('Location:index.php');
        die();
    }

    
    $req = $bdd->prepare('SELECT * FROM utilisateurs WHERE token = ?');
    $req->execute(array($_SESSION['user']));
    $data = $req->fetch();
   
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
            <a  href="/appinfo/homepage/homepage.html"><img src="/appinfo/auth/logo_infinite.png" alt="logo"></a>
        </div>  
                <nav>
                    <ul class="nav__links">
                        <li><a href="/appinfo/homepage/homepage.html">Accueil</a></li>
                        <li><a href="#">Votre chantier</a></li>
                        <li><a href="#">Forum</a></li>
                        <li><a href="/appinfo/contact/Page_onglets.html">Contactez-nous</a></li>
                    </ul>
                </nav>
             <a class="cta" href="/appinfo/auth/index.php">Connexion</a>
        </header>

        <div id = "title">
             <titre1>Modifier votre profil</titre1>
             <img class = "forme1"src="forme1.png"></img>
            </div>

        <div id="container">

        
            <div class="text-center">


                    <h1 class="p-5">Bonjour <?php echo $data['pseudo']; ?> !</h1>

                  
                    <h1>Pseudo : <input type="pseudo" name="" class="form-control" value= "<?php echo $data['pseudo']; ?>" required="required"></h1>

                    <h1>Votre email : <input type="email" name="" class="form-control" value= "<?php echo $data['email']; ?>" required="required"></h1>

                    <h1>Nouveau mot de passe : <input type="password" name="" class="form-control" value= "" required="required"></h1>

                    <h1>Confirmation mot de passe : <input type="password" name="" class="form-control" value= "" required="required"></h1>

                    <button1 href="modif.php" class="btn btn-danger btn-lg">Modifier</button1> 

                    <button2 href="deconnexion.php" class="btn btn-danger btn-lg">Déconnexion</button2> 


            </div>
            <div id = pp> 
            <img class = "avatar"src="pp.jpg"></img>

            
            <input type="file" id="avatar" value ="salut"  accept="image/png , image/jpeg">
            </div>
            
        </div> 
         

  </div>
  </body>

  
</html>
