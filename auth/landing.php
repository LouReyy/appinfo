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

    
  </head>
  <body>
        <div class="container">
        
            <div class="text-center">
                    <h1 class="p-5">Bonjour <?php echo $data['pseudo']; ?> !</h1>
                    <hr />
                    <a href="deconnexion.php" class="btn btn-danger btn-lg">Déconnexion</a>
            </div>
        </div>   
  </body>
</html>
